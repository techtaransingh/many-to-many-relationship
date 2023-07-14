<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;
use App\Models\Store;

class RegionController extends Controller
{
    public function view(Request $request){
        return view('addregion');
    }
    public function submit(Request $request){
        $request->validate([
            'region_name'=>'required',
        ]);
        $region= Region::create($_REQUEST);
        if($region->save()){
           
            $request->session()->flash('success','data upload hogya');
        }
        else{
            $request->session()->flash('error','something went wrong');
        }
        
            return back(); 
    }
    public function relationship(Request $request){
        $store_list= Store::all();
       
        return view ('regionrelation',['store_list'=>$store_list]);
    }
    public function relationship_submit(Request $request){
        // print_r($_REQUEST);die;
        $region = new Region();
        $region->region_name=$request->region_name;
        $region->save();
        $region->stores()->attach($request->store_name);
    }
}
