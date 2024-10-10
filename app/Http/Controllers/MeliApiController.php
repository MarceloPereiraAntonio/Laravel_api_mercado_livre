<?php

namespace App\Http\Controllers;

use App\Models\MeliToken;
use Illuminate\Support\Facades\Http;

class MeliApiController extends Controller
{

    public static function getCategories()
    {
        $model = MeliToken::first();
        $response = Http::withToken($model->access_token)->get("https://api.mercadolibre.com/categories/MLB263532");
        return $response->json();
    }

    public static function setNewItem($data)
    {
        $model = MeliToken::first();
        $response = Http::withToken($model->access_token)->post('https://api.mercadolibre.com/items', [
            "title"=> $data->name,
            "category_id"=>$data->category_id,
            "price"=>$data->price,
            "official_store_id"=>Null,
            "currency_id" => "BRL",
            "available_quantity"=> $data->stock,
            "buying_mode"=>"buy_it_now",
            "listing_type_id"=>"bronze",
            "condition"=>"new",
            "description"=>[
                "plain_text"=>"$data->description"
            ],
            "pictures"=> [
                [
                    "source"=> "https://w7.pngwing.com/pngs/775/698/png-transparent-hand-tool-tool-monochrome-wikimedia-commons-silhouette-thumbnail.png"
                ],
    
            ]
        ]);

        return $response->json();
    }
}
