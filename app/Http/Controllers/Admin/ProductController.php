<?php

namespace App\Http\Controllers\Admin;
use App\Color;
use App\Country;
use App\Http\Controllers\controller;
use App\DataTables\ProductsDatatables;
use App\Manufact;
use App\TradeMark;
use Illuminate\Http\Request;
use \App\Product;
use \App\Size;
use \App\Weight;
use Illuminate\Support\Facades\Storage;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDatatables $product)
    {
        return $product->render('admin.products.index',['title'=>'Products Control']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $product=Product::create([
            'title'=>'',

        ]);
        if (!empty($product))
        {
            return redirect(aurl('products/'.$product->id.'/edit'));
        }

    }


    public function store()
    {

        $data=$this->validate(\request(),[
            'name'=>'required',
        ]);

        \App\Product::create($data);
        session()->flash('added','The New Product Added Successfully');
        return redirect(aurl('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function prepare_wight_size()
    {
        if(\request()->ajax() and \request()->has('dept_id'))
        {
            $dept_list=array_diff(explode(',',get_parent(\request('dept_id'))),[\request('dept_id')]);
            $size1=Size::where('is_public','yes')->whereIn('department_id',$dept_list)->pluck('name','id');
            $size2=Size::where('department_id',\request('dept_id'))->pluck('name','id');
            $sizes=array_merge(json_decode($size1,true),json_decode($size2,true));

            $product_size=new Size;
            $product_weight=new Weight;
            $product=Product::find(\request('idd'));
            $product_weight=Weight::find($product->weight_id);
            $product_size=Size::find($product->size_id);

            $wights=Weight::pluck('name','id');
            return view('admin.products.ajax.size_wight',['sizes'=>$sizes,'wights'=>$wights,
                'product_weight'=>$product_weight,
                'product_size'=>$product_size,'product'=>$product])->render();
        }else{
            return 'please chose a department';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trademarks=TradeMark::all();
        $currencies=Country::all();
        $manufacts=Manufact::all();
        $colors=Color::all();
        $product=\App\Product::find($id);
        $product_weight=Weight::where('id',$product->weight_id)->pluck('name','id');
        $product_size=Size::where('id',$product->size_id)->pluck('name','id');

        return view('admin.products.product',[
            'title'=>'Create Or Update Product  '.$product->title,
            'product'=>$product,
            'trademarks'=>$trademarks,
            'currencies'=>$currencies,
            'manufacts'=>$manufacts,
            'colors'=>$colors,
            'product_weight'=>$product_weight,
            'product_size'=>$product_size,
        ]);
    }
    public function multiDelete()
    {
        if (!request()->has('item'))
        {
            return back();
        }elseif ( is_array(request('item')))
        {
            foreach (\request('item') as $id)
            {
                $c=Product::find($id);
                $c->delete();
            }
        }
        else
        {
            $c=Product::find(\request('item'));
            $c->delete();
        }
        session()->flash('added','The Products Deleted Successfully');
        return redirect(aurl('products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function upload_files($id)
    {
        if (\request()->hasFile('file'))
        {

            $fid= up()->upload([

                'file'=>'file',
                'path'=>'products/'.$id,
                'upload_type'=>'files',
                'relation_id'=>$id,
                'file_type'=>'product',

            ]);
            return response(['status'=>true,'id'=>$fid],200);
        }
    }
    public function delete_product_image($id)
    {
        $product= Product::find($id);
        Storage::delete($product->photo);
        $product->photo=null;
        $product->save();
    }
    public function update_product_image($id)
    {
        $product= Product::where('id',$id)->update([
            'photo'=> up()->upload([

                'file'=>'file',
                'path'=>'products/'.$id,
                'upload_type'=>'single',
                'delete_file'=>'',

            ])
        ]);
        return response(['status'=>true],200);
    }

    public function deleteFile()
    {
        if (\request()->has('id'))
        {

            return up()->delete(\request('id'));
        }
    }
    public function update($id)
    {


        $data=$this->validate(\request(),[
            'title'=>'required|string',
            'content'=>'sometimes|nullable|',
            'department_id'=>'sometimes|nullable|numeric',
            'status'=>'sometimes|nullable',
            'price'=>'sometimes|nullable|numeric',
            'stock'=>'sometimes|nullable|numeric',
            'start_at'=>'sometimes|nullable|date',
            'end_at'=>'sometimes|nullable|date',
            'price_offer'=>'sometimes|nullable|numeric',
            'start_offer_at'=>'sometimes|nullable|date',
            'end_offer_at'=>'sometimes|nullable|date',
            'reason'=>'sometimes|nullable',
            'size'=>'sometimes|nullable',
            'weight'=>'sometimes|nullable',
            'currency_id'=>'sometimes|nullable|numeric',
            'color_id'=>'sometimes|nullable|numeric',
            'other_data'=>'sometimes|nullable',
            'size_id'=>'sometimes|nullable',
            'weight_id'=>'sometimes|nullable',
            'trademark_id'=>'sometimes|nullable|numeric',
            'manufact_id'=>'sometimes|nullable|numeric',

        ]);
        if (!empty(\request('size_id'))){
            $h=Size::query()->where('name',\request('size_id'))->get(['id']);
            $data['size_id']=$h[0]->id;
        }

        if (!empty(\request('weight_id'))){
            $h=Weight::query()->where('name',\request('weight_id'))->get(['id']);
            $data['weight_id']=$h[0]->id;
        }

        \App\Product::where('id',$id)->update($data);
        session()->flash('added','The Product Updated Successfully');
        return redirect(aurl('products'));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $c=Product::find($id);
        $c->delete();
        session()->flash('added','The Product Deleted Successfully');
        return redirect(aurl('products'));
    }
}
