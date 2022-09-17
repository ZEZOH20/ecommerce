<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return response()->json([
            'message' => 'api was displayed successfuly',
            "category" => $category
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
 
        $category = Category::create($request->all());

        return response()->json(
            [
                'message' => 'api was created successfuly',
                "category" => $category,
            ],
            200
        );
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
    public function update(StoreCategoryRequest $request, Category $category)
    {
      
        Category::find($category->id);
    
        $category->update($request->all());
        return response()->json([
            'message' => 'api was updated successfuly',
            "category" => $category
        ], 200);    

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete($category->id);    
       
    }
}



    /* create 

        $product=Category::firstOrCreate([
            'description'=>"i am new"
        ]);
        if($product->wasRecentlyCreated){
            return response()->json( [
                'message'=>'api was created successfuly',
                "category"=>$product 
            ],200);
        }else{
            return response()->json( [
                'message'=>'product did not created',
            ],404);
        }
        */