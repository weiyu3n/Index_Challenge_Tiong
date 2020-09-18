<?php

use Illuminate\Database\Seeder;
use App\Models\memes;
use Goutte\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private $array = [];

    public function run() {
        $client = new Client();

        $array = array();
        for ($i = 1; $i <= 95; $i++) {
            $page = $client->request('GET','http://interview.funplay8.com/index.php?page='.$i);   
    
            $page->filter('.meme-name')->each(function($item){
                array_push($this->array, $item->text());
            });
        }


        $memes = [];
        $count = 0;
        $page = 1;
        foreach($this->array as $i)
        {
            if($count == 9)
            {
                $page++;
                $count = 0;
            }
            $count++;
            $memes[] = [
                'name' => $i,
                'url' => 'https://images.funplay8.com/test/'. str_replace(' ', '_', $i) .'.jpg',
                'page' => $page,
            ];
        }
        
        DB::table('memes')->truncate();
        DB::table('memes')->insert($memes);
    }

}
