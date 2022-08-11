<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index(Request $request)
    {
        return view('products.index');
    }

    public function searchResults(Request $request)
    {
        $sql = $this->getProductsResults($request);
        $jsonResponse = response()->json($sql);
        return $request->ajax() ? $jsonResponse : $jsonResponse;
    }

    public function getProductsResults(Request $request)
    {
        return ProductCategory::from('product_categories', 'pc')
                ->join('products AS p', 'p.id', '=', 'pc.product_id')
                ->join('categories AS c', 'c.id', '=', 'pc.category_id')
                ->select(
                    'p.id',
                    'p.type',
                    'p.description',
                    'p.cost',

                    'c.id',
                    'c.name',
                    'c.colour',

                    DB::raw("GROUP_CONCAT(c.`name`) AS `category_list`"),
                    DB::raw("GROUP_CONCAT(c.`colour`) AS `category_colours`"),

                    'pc.product_id',
                    'pc.category_id',

                )
                ->when($request->input('txtSearch'), fn ($query, $txtSearch) => $query->where('p.type', 'LIKE', '%' . $txtSearch . '%'))
                ->groupBy('p.type')
                ->get();



    }
   
}
