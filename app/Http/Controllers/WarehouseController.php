<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Warehouse;
class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouses=Warehouse::all();
         return response()->json($warehouses);
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
        $warehouse=new Warehouse;
        $warehouse->name=$request->name;
        $warehouse->location=$request->location;
        $warehouse->save();
        return response()->json(["message"=>"Warehouse Stored Successfully!"],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $warehouse=Warehouse::find($id);
       if(!empty($warehouse)){
        return response()->json($warehouse);
       }else{
        return response()->json(["message"=>"warehouse Not Found"],404);
       }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $warehouse=Warehouse::find($id);
        if(!empty($warehouse)){
        $warehouse->name=is_null($request->name)? $warehouse->name:$request->name;
        $warehouse->location=is_null($request->location)? $warehouse->location:$request->location;
        $warehouse->save();
        return  response()->json(["message"=>"Warehouse Updated"]);
        }else{
            return  response()->json(["message"=>"WarehouseNot Found"],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $warehouse=Warehouse::find($id);
        if(!empty($warehouse)){
            $warehouse->delete();
           return response()->json(["message"=>"Warehouse Deleted Successfully"]);
        }else{
            return  response()->json(["message"=>"WarehouseNot Found"],404);
        }
    }
}
