<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Region;

class StoreController extends Controller
{
    public function view(Request $request){
        return view('addstore');
    }
    public function submit(Request $request){
        $request->validate([
            'store_name'=>'required',
        ]);
        $store= Store::create($_REQUEST);
        if($store->save()){
           
            $request->session()->flash('success','data upload hogya');
        }
        else{
            $request->session()->flash('error','something went wrong');
        }
        
            return back(); 
    }
    public function relationship(Request $request){
        $region_list= Region::all();
       
        return view ('storerelation',['region_list'=>$region_list]);
    }
    public function relationship_submit(Request $request){
        
        // print_r($_REQUEST);die;
        $store = new Store();
        $store->store_name = $request->store_name;
        $store->save();
        $store->regions()->attach($request->region_name);
        
    }
}
