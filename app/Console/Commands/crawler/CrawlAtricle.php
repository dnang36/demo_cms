<?php

namespace App\Console\Commands\crawler;

use App\Models\admin\article;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class CrawlAtricle extends Command
{

    protected $signature = 'crawler:data';


    protected $description = 'Command description';

    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://vnexpress.net/the-gioi');
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $link = $crawler->filter('.title-news > a')->each(function ($node) {
            return $node->attr("href");
        });

        foreach ($link as $l){
            $this->getArticles($l);
        }
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

        article::created($data);
//        dd($data);
    }
}
