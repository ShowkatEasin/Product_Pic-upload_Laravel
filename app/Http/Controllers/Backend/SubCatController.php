<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use File;
class SubCatController extends Controller
{
    public function index(){
        $cats = Product::all();
        return view("backend/subcat/add",compact("cats"));
    }

    public function add(Request $rqst){

        if($rqst->pic){
            $image = $rqst->file('pic');
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path("backend/subcatImage/".$customName);
            Image::make($image)->save($location);
        }


        $Subcat = new Product;
        $Subcat->name = $rqst->name;
        $Subcat->category = $rqst->category;
        $Subcat->brand = $rqst->brand;
        $Subcat->dis = $rqst->dis;
        $Subcat->image = $customName;
        $Subcat->status = $rqst->status;
        $Subcat->save();
        return redirect()->route("showsubcat");
    }

    public function show(){
        $subcats=Product::all();
        return view("backend.subcat.manage", compact("subcats"));
    }

    public function single($id){
        $subcats=Product::find($id);
        return view("frontend.single", compact("subcats"));
    }

    public function fshow(){
        $subcats=Product::where('status','1')->get();
        return view("frontend.dashboard", compact("subcats"));
    }

    public function delete($id){
        $subcat=Product::find($id);
        if(File::exists("backend/subcatImage/".$subcat->image)){
            File::delete("backend/subcatImage/".$subcat->image);
        }
        $subcat->delete();
        return back();
    }

    public function edit($id){
        $subcat=Product::find($id);
        return view("backend.subcat.edit", compact("subcat"));
        return back();
    }

    public function update(Request $rqst, $id){
        $subcat=Product::find($id);
        if($rqst->pic){
            if(File::exists("backend/subcatImage/".$subcat->image)){
                File::delete("backend/subcatImage/".$subcat->image);

            $image = $rqst->file('pic');
            $customName = rand().".".$image->getClientOriginalExtension();
            $location = public_path("backend/subcatImage/".$customName);
            Image::make($image)->save($location);
            $subcat->image =$customName;
            }
        }

        $subcat->name = $rqst->name;
        $subcat->category = $rqst->category;
        $subcat->brand = $rqst->brand;
        $subcat->dis = $rqst->dis;
        $subcat->status= $rqst->status;
        $subcat->update();
        return redirect()->route("showsubcat");
       
    }
}
