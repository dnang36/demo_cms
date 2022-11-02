<?php

namespace App\Console\Commands\crawler;

use App\Libs\CrawlerHelper;
use App\Models\admin\article;
use App\Models\admin\category;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Symfony\Component\DomCrawler\Crawler;

class CrawlAtricle extends Command
{
    protected $signature = 'crawler:data';

    protected $description = 'Command description';

    protected $home = 'https://vnexpress.net';

    public function handle()
    {
        $categories = $this->getCategory();
        foreach ($categories as $category) {
            $articleUrl = $this->getArticleUrl($category);
            foreach ($articleUrl as $url){
                try {
                    $this->info("url: $url");
                    $data = $this->getArticles($url);

                    $category = category::firstOrCreate([
                        'name'=>$data['category_id']],[
                            'slug'=>str_slug($data['category_id']),
                            'parent_id'=>0,
                            'description'=>$data['category_id'],
                            'content'=>$data['category_id'],
                        ]);
                    $this->info("cate: $category->name");

                    article::firstOrCreate([
                        'slug'=>$data['slug'],
                    ],[
                        'author_id' => 1,
                        'title' => $data['title'],
                        'thumb' => $data['thumb'],
                        'description' => $data['description'],
                        'content' => $data['content'],
                        'category_id'=>$category->id,
                        'status' => 0,
                    ]);
                    article::create($data);
                }
                catch (\Exception $err){
                    continue;
                }
            }
        }
    }

    public function getArticleUrl($url)
    {
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $url = $crawler->filter('.title-news a')->each(function (Crawler $node) {
            return $node->attr('href');
        });

        return $url;
    }

    public function getArticles($url)
    {
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $title = $crawler->filter('h1.title-detail')->text();
        $slug = str_slug($title);
        $description =$crawler->filter('p.description')->text();
        $thumb = $crawler->filter('.fig-picture img')->attr('data-src');
        $content = $crawler->filter('article.fck_detail')->text();
        $category_id = $crawler->filter('ul.breadcrumb li a')->text();
        $status = 0;

        return compact('title', 'slug', 'description', 'content', 'thumb','status','category_id');
    }

    public function getTag($url)
    {
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $tag = $crawler->filterXpath("//meta[@name='its_tag']")->extract(array('content'));;
        $tag = explode(', ',$tag[0]);
    }

    protected function getHtml(string $url): string
    {
        $html = (new Client([
            'verify' => false,
            'timeout' => 30, // 30 seconds
        ]))->get($url)
            ->getBody()->getContents();

        return $html;
    }

    protected function getCategory()
    {
        $home_html = $this->getHtml($this->home);
        $dom = new Crawler($home_html);

        $categories = CrawlerHelper::extractAttributes($dom, "#wrap-main-nav > nav > ul > li > a", ['text', 'href']);

        return array_map(function ($item) {
            return CrawlerHelper::makeFullUrl($this->home, $item['href']);
        }, $categories);
    }
}
