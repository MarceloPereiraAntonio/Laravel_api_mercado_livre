<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateRequest;
use App\Models\MeliToken;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $token = MeliToken::first();
        $auth = new AuthController;
        $products = Product::paginate(5);
        if($token == null){
            $auth->generateAccessToken();
        }
        return view('pages.product.index')->with('products', $products ?? '');
    }

    public function create()
    {
        $acessToken = new AuthController;
        if($acessToken->isTokenExpired()){
            $acessToken->refreshToken();
        }
        return view('pages.product.create')->with('categories', MeliApiController::getCategories());
    }

    public function store(StoreUpdateRequest $request)
    {
        $product = new Product;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->img_path = $imagePath; 
        $product->save();
        $response = MeliApiController::setNewItem($request);
        if($response['status'] == 400){
            $errors = [];
            foreach($response['cause'] as $item){
                $errors[] = $item['message'];
            }
            return redirect()->back()->withErrors($errors);
        }
        return redirect()->route('product.index')->with('success', 'Produto criado com sucesso!');
    }

}
