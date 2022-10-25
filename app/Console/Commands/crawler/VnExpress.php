<?php

namespace App\Console\Commands\crawler;

use App\Models\admin\article;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler;

class DanTriCrawler extends Command
{

    protected $signature = 'crawler:dantri';

    protected $description = 'Command description';


    public function handle()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://vnexpress.net/ba-uu-tien-cua-tan-bo-truong-nguyen-van-thang-4526405.html');
        $html = $response->getBody()->getContents();

        $crawler = new Crawler($html);

        $title = $crawler->filter('h1.title-detail')->each(function (Crawler $node) {
            return $node->text();
        })[0];

        $slug = str_slug($title);

        $description = $crawler->filter('p.description')->each(function (Crawler $node) {
            return $node->text();
        })[0];

        $thumb = $crawler->filter('div.fig-picture picture img')->each(function (Crawler $node){
            return $node->attr('src');
        })[0];

        $content = $crawler->filter('article.fck_detail')->each(function (Crawler $node){
            return $node->text();
        })[0];

        $data = [
            'title'=>$title,
            'author_id'=>1,
            'slug'=>$slug,
            'description'=>$description,
            'thumb'=>$thumb,
            'category_id'=>1,
            'tag_id'=>1,
            'status'=>0,
            'content'=>$content,
        ];

        DB::table('articles')->insert($data);
    }

}
