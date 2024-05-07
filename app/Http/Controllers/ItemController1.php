<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Item::all();
        return response()->json($items);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item=new Item;
        $item->name=$request->name;
        $item->commercial_name=$request->commercial_name;
        $item->price=$request->price;
        $item->category_id=$request->category_id;
        $categoryName=Category::find($request->category_id)->name;
        $item->item_code=substr($item->name, 0, 1).substr($categoryName, 0, 1).substr($categoryName,-1).substr($request->commercial_name, 0, 1).str_pad(strlen($request->commercial_name),3,0,STR_PAD_LEFT);
 
        
        // $item->name="aga";
        // $item->commercial_name="dghfji";
        // $item->price=30.00;
        // $item->category_id=1;
        // $categoryName=Category::find( $item->category_id)->name;
        // $item->item_code=substr($item->name, 0, 1).substr($categoryName, 0, 1).substr($categoryName,-1).substr($request->commercial_name, 0, 1).str_pad(strlen($request->commercial_name),3,0,STR_PAD_LEFT);
        // dd( $item->item_code);
        $item->save();
        return response()->json(["message"=>"Item Stored Successfully!"],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=Item::find($id);
        if(!empty($item)){
         return response()->json($item);
        }else{
         return response()->json(["message"=>"Item Not Found"],404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {  
        $item=Item::find($id);
        if(!empty($item)){
        $item->name=is_null($request->name)? $item->name:$request->name;
        $item->commercial_name=is_null($request->commercial_name)? $item->commercial_name:$request->commercial_name;
        $item->price=is_null($request->price)? $item->price:$request->price;
        $item->category_id=is_null($request->category_id)? $item->category_id:$request->category_id;
        $categoryName=Category::find($item->category_id)->name;
        $item->item_code=is_null($request->item_code)? $item->item_code:substr($item->name, 0, 1).substr($categoryName, 0, 1).substr($categoryName,-1).substr($request->commercial_name, 0, 1).str_pad(strlen($request->commercial_name),3,0,STR_PAD_LEFT);
// dd( $item);

        $item->save();
        return  response()->json(["message"=>"Item Updated"]);
        }else{
            return  response()->json(["message"=>"Item Not Found"],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item=Item::find($id);
        if(!empty($item)){
            $item->delete();
           return response()->json(["message"=>"Item Deleted Successfully"]);
        }else{
            return  response()->json(["message"=>"Item Not Found"],404);
        }
    }
}
