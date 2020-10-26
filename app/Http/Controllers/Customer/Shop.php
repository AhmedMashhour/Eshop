<?php

namespace App\Http\Controllers\Customer;
use App\Color;
use App\Country;
use App\Files;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Controller;
use App\Size;
use App\TradeMark;
use Illuminate\Http\Request;
use App\Department;
use App\Product;
class Shop extends Controller
{
   public  function index()
   {
        $products=Product::all();
        $countries=Country::all();
        $departments=Department::all();
       $cart=\App\Cart::where('customer_id',auth()->user()->id)->get();
       return view('style.home',
           [   'products'=>$products,
               'departments'=>$departments,
               'countries'=>$countries,
               'cart'=>$cart
           ]);
   }
    public function productDetails($id)
    {
        $products=Product::all();
        $countries=Country::all();
        $departments=Department::all();
        $p=Product::find($id);
        $size=Size::find($p->size_id);
        $color=Color::find($p->color_id);
        $cart=\App\Cart::where('customer_id',auth()->user()->id)->get();
        $pics=Files::where('relation_id',$p->id)->get();
        return view('style.productDetailes',
            [   'new_products'=>$products,
                'departments'=>$departments,
                'countries'=>$countries,
                'pro'=>$p,
                'size'=>$size,
                'color'=>$color,
                'cart'=>$cart,
                'pics'=>$pics
            ]);
    }
    public function allProducts()
    {
        $products=Product::all();
        $countries=Country::all();
        $departments=Department::all();
        $colors=Color::all();
        $brands=TradeMark::all();
        $sizes=Size::all();
        $cart=\App\Cart::where('customer_id',auth()->user()->id)->get();

        return view('style.products',
            [   'products'=>$products,
                'departments'=>$departments,
                'countries'=>$countries,
                'cart'=>$cart,
                'colors'=>$colors,
                'brands'=>$brands,
                'sizes'=>$sizes
            ]);
    }

    public function filter($dep,$id){
       $products=Product::where($dep,$id)->get();
        $countries=Country::all();
        $departments=Department::all();
        $colors=Color::all();
        $brands=TradeMark::all();
        $sizes=Size::all();
        $cart=\App\Cart::where('customer_id',auth()->user()->id)->get();

        return view('style.products',
            [   'products'=>$products,
                'departments'=>$departments,
                'countries'=>$countries,
                'cart'=>$cart,
                'colors'=>$colors,
                'brands'=>$brands,
                'sizes'=>$sizes
            ]);


    }

    public function search(){

       if (number_format(\request('department'))>0)
        $products=Product::where('department_id',\request('department'))->where('title',\request('keyword'))->get();
       else
           $products=Product::all();

        $countries=Country::all();
        $departments=Department::all();
        $colors=Color::all();
        $brands=TradeMark::all();
        $sizes=Size::all();
        $cart=\App\Cart::where('customer_id',auth()->user()->id)->get();

        return view('style.products',
            [   'products'=>$products,
                'departments'=>$departments,
                'countries'=>$countries,
                'cart'=>$cart,
                'colors'=>$colors,
                'brands'=>$brands,
                'sizes'=>$sizes
            ]);


    }

}
