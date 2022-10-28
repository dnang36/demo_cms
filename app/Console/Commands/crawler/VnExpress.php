<?php

namespace App\Console\Commands\crawler;

use App\Models\admin\article;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class VnExpress extends Command
{
    protected $signature = 'crawler:vnexpress';

    protected $description = 'Command description';

    protected $home = 'https://vnexpress.net/';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://vnexpress.net/the-gioi');
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $url = $crawler->filter('.title-news > a')->each(function (Crawler $node) {
            $article_url = $node->attr('href');
            $client = new Client();
            $response = $client->request('GET', $article_url);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);
//            $crawler->addHtmlContent($html);

            $title = $crawler->filter('.title-detail')->text();
            $slug = str_slug($title);
            $description = $crawler->filter('.description')->text();
            $content = $crawler->filter('.fck_detail')->text();
            try {
                $thumb = $crawler->filter('.fig-picture img')->attr('data-src');
            }
            catch (\Exception $err){
                $thumb = "ko co gi";
            }
//            return $title;
            $data = [
                'title'=>$title,
                'slug'=>$slug,
                'author_id'=>1,
                'description'=>$description,
                'content'=>$content,
                'tag_id'=>1,
                'category_id'=>1,
                'status'=>0,
                'thumb'=>$thumb,
            ];
//            dd($data);
//            DB::table('articles')->insert($data);
            $this->getCategory($this->home);
//            $this->getTag('https://vnexpress.net/cuu-11-nguoi-thoat-khoi-dam-chay-chung-cu-mini-4526980.html');
        });
//        dd($url);
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

        dd($content);
    }

    public function getCategory(string $url)
    {
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $name = $crawler->filter('#wrap-main-nav > nav > ul > li > a')->text();
        $slug = str_slug($name);
        $category = $crawler->filter('#wrap-main-nav > nav > ul > li > a')->each(function (Crawler $node) {
            return $node->attr('href');
        });
        dd($name);

        $data = [
            'parent_id'=>0,
            'name'=>$name,
            'slug'=>$slug,
            'description'=>0,
            'content'=>0,
        ];

        DB::table('categories')->insert($data);
    }

    public function getTag($url)
    {
        $client = new Client();
        $response = $client->request('GET', $url);
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $tag = $crawler->filterXpath("//meta[@name='its_tag']")->extract(array('content'));;
        $tag = explode(', ',$tag[0]);
        dd($tag);
    }

}
