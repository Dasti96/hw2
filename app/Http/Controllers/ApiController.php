<?php
    use Illuminate\Routing\Controller;


    class ApiController extends Controller{
        public function newsAPI(){
            $json = Http::get('https://newsapi.org/v2/top-headlines',[
                'country' => 'it',
                'category' => 'technology',
                'apiKey' => env('NEWS_APIKEY')
            ]);

            if($json->failed())
                abort(500);
            else
                return $json;
        }

        public function gamesAPI($search_value){
            $json = Http::get('https://api.rawg.io/api/games',[
                'search' => $search_value,
                'page_size' => '5',
                'key' => env('GAMES_APIKEY')
            ]);

            if($json->failed())
                abort(500);
            else
                return $json;
        }

    }
?>