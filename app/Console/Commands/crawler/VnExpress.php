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
//            return $thumb;
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

            DB::table('articles')->insert($data);
        });
//        dd($url);


    }
//
//    public function getArticles($url)
//    {
//        $client = new Client();
//        $response = $client->request('GET', 'https://vnexpress.net/nhiem-ky-thu-tuong-ngan-nhat-lich-su-anh-cua-ba-truss-4526069.html');
//        $html = $response->getBody()->getContents();
//
//        $crawler = new Crawler($html);
//
//        $title = $crawler->filter('h1.title-detail')->each(function (Crawler $node) {
//            return $node->text();
//        })[0];
//
//        $slug = str_slug($title);
//
//        $description = $crawler->filter('p.description')->each(function (Crawler $node) {
//            return $node->text();
//        })[0];
//
//        $thumb = $crawler->filter('div.fig-picture picture img')->each(function (Crawler $node){
//            return $node->attr('src');
//        })[0];
//
//        $content = $crawler->filter('article.fck_detail')->each(function (Crawler $node){
//            return $node->text();
//        })[0];
//
//        dd($slug);
//
//        $data = [
//            'title'=>$title,
//            'author_id'=>1,
//            'slug'=>$slug,
//            'description'=>$description,
//            'thumb'=>$thumb,
//            'category_id'=>1,
//            'tag_id'=>1,
//            'status'=>0,
//            'content'=>$content,
//        ];
//
//        DB::table('articles')->insert($data);
//    }
//
//    public function getCategory()
//    {
//        $client = new Client();
//        $response = $client->request('GET', 'https://vnexpress.net/the-gioi/');
//        $html = $response->getBody()->getContents();
//
//        $crawler = new Crawler($html);
//
//        $category = $crawler->filter('#wrap-main-nav > nav > ul > li > a',['text', 'href'])->each(function (Crawler $node){
//            return $node->attr('href');
//        });
//
//        dd($category);
//    }
//
//    public function getTag()
//    {
//        $client = new Client();
//        $response = $client->request('GET', 'https://vnexpress.net/cuu-11-nguoi-thoat-khoi-dam-chay-chung-cu-mini-4526980.html');
//        $html = $response->getBody()->getContents();
//
//        $crawler = new Crawler($html);
//
//        $tag = $crawler->filterXpath("//meta[@name='its_tag']")->extract(array('content'));;
//        $tag = explode(', ',$tag[0]);
//        dd($tag);
//    }

}
