<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Image;
class ProductController extends Controller
{
    function createProduct(){
        return view('admin.product.create');
    }
    function search_product(Request $request){
     $name=$request->all();
     $data=Product::where('name',$name['recherche'])->count();
    if ($data>0){
        $product=Product::where('name',$name['recherche'])->first();
        return view('admin.product.show',['product'=>$product]);
    }else{
        return redirect('admin/dashboard')->with('error_message','le produit n existe pas ');
    }
    }
    public function editProduct($id){
        $product=product::find($id);
        return view('admin.product.edit',['product'=>$product]);
    }
    public function showProduct($id){
        $product=product::find($id);
        return view('admin.product.show',['product'=>$product]);
    }
    public function edit_quantité($id){
        $product=product::find($id);
        $product->quantité=$product->quantité+1;
        $product->save();
        return redirect('admin/dashboard')->with('success_message','quantité updated successfully ');
    }
    public function edit_quantité_moin($id){
        $product=product::find($id);
        $product->quantité=$product->quantité-1;
        $product->save();
        return redirect('admin/dashboard')->with('success_message','quantité updated successfully ');
    }
    function addEditProduct(Request $request,$id=null){
        if ($id==""){
            $title="add product";
            $product=new product;
            $message="product added successfully";
        }else{
            $title="edit product";
            $product= Product::find($id);
            $message="product updated successfully ";
        }
        if ($request->isMethod('post')){
            $data =$request->all();
           //dd(Auth::guard('admin')->user());            
         
           // save product details in product section 
          // upload product image
          if ($request->hasFile('product_image')){
            $image_tmp=$request->file('product_image');
            if ($image_tmp->isValid()){
                //upload image after resize 
                $extension=$image_tmp->getClientOriginalExtension();
                $imageName=rand(111,99999).'.'.$extension;
                $largeImagePath='admin/font/images/product_images/large/'.$imageName;
                $mediumImagePath='admin/font/images/product_images/medium/'.$imageName;
                $smallImagePath='admin/font/images/product_images/small/'.$imageName;
                Image::make($image_tmp)->resize(1000,1000)->save($largeImagePath);
                Image::make($image_tmp)->resize(500,500)->save($mediumImagePath);
                Image::make($image_tmp)->resize(250,250)->save($smallImagePath);
                $product->product_image= $imageName;
            }
          } 
          // $categoryDetails = Category::find($data['category_id']);
          
    //dd($categoryDetails[0]['id']);

        
        //  dd($adminType);
         
          
           $product->name =$data['name'];
           $product->prix_achat =$data['prix_achat'];
           $product->prix_vente =$data['prix_vente'];
           $product->quantité =$data['quantité'];
          
           $product->save();

             return redirect('admin/dashboard')->with('success_message',$message);
            

    }
}
}