<?php

namespace App\Http\Controllers\staff;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('root',0)->get();
        return view('backend.product.manage',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::where('status','active')->select('id','name')->get();
        $categories = Category::where('root',0)->where('status','active')->select('id','name')->get();
        return view('backend.product.create',compact('categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),[
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'brand_id' => 'required',
            'category_id' => 'required',
            'buing_price' => 'required',
            'selling_price' => 'required',
            'quantity' => 'required',
            'sku_code' => 'required',
            'thumbnail' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }else{
            try{
                //thumnail image
                $thumbnail = $request->file('thumbnail');
                $thumbnailName = date('Ymdhs.') . $thumbnail->getClientOriginalExtension();
                Image::make($thumbnail)->save(public_path('uploads/products/') . $thumbnailName);

                //Gallery images
                $images = $request->file('images');
                $i = 0 ;
                $fileName = [];
                foreach ($images as $image) {
                    $imageName = date('Ymdhs') . $i++ . '.' . $image->getClientOriginalExtension();
                    Image::make($image)->save(public_path('uploads/products/') . $imageName);
                    array_push($fileName, $imageName);
                }

                Post::create([
                    'name'              => $request->name,
                    'slug'              => $request->slug,
                    'category_id'       => $request->category_id,
                    'brand_id'          => $request->brand_id,
                    'model'             => $request->model,
                    'buing_price'       => $request->buing_price,
                    'selling_price'     => $request->selling_price,
                    'special_price'     => $request->special_price,
                    'special_price_from' => $request->special_price_from,
                    'special_price_to'  => $request->special_price_to,
                    'quantity'          => $request->quantity,
                    'sku_code'          => $request->sku_code,
                    'color'             => json_encode($request->color),
                    'size'              => json_encode($request->size),
                    'thumbnail'         => $thumbnailName,
                    'images'            => json_encode($fileName),
                    'warranty'          => $request->warranty,
                    'warranty_duration' => $request->warranty_duration,
                    'warranty_condition' => $request->warranty_condition,
                    'description'       => $request->description,
                    'status'            => $request->status,
                    'create_by'         => auth()->id()
                ]);
                return response()->json(['success' => 'Product Add Successfully!']);
            }catch(Exception $e){
                return response()->json(['unable' => $e->getMessage()]);
            }
        }
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
