<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\CustomHelper;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{

    public function create(Request $request)
    {
        // $product = new Product;
        // $product->name = 'God of War';
        // $product->price = 40;

        // $product->save();

        // $category = Category::find([3, 4]);
        // $product->categories()->attach($category);

        $categories = Category::all();
        return view('products.create', compact('categories'));
    }


    /**
     * Store a new user.
     *
     * @param  \App\Http\Requests\StoreProductRequest $request
     * @return Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        // validate form
        $request->validated();

        // create the product and get the last inserted product id
        $productID = Product::create([
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'cost' => $request->input('cost'),
        ])->id;

        $categories = $request->input('categories');

        foreach ($categories as $category)
        {

            $this->addProductCategory($productID, $category);
        }

        $message = [
            'message' => 'the product ' . $request->input('type') . ' was added', 
            'type' => 'success',
            'icon' => CustomHelper::getMessageIcon('success')

        ];

        return back()->with($message);

    }
    
    public function addProductCategory($product, $category)
    {
        ProductCategory::create([

            'product_id' => $product,
            'category_id' => $category

        ]);
    }
}
