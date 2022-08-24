<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Product;
use Auth;
class AdminController extends Controller
{
    public function login(Request $request){
        return view('admin.login');
       }
       function check_login(Request $request){
        $request->validate([
        'email'=>'required',
            'password'=>'required',
        ]);
        $admin=Admin::where(['email'=>$request->email,'password'=>sha1($request->password)])->count();
        if ($admin>0){
            $adminData=Admin::where(['email'=>$request->email,'password'=>sha1($request->password)])->get();
            session(['adminData'=>$adminData]);
           
            return redirect('admin/dashboard');
        }else{
            return redirect('admin/login')->with('msg','invalid username or password ');
        }
    }
    function logout(){
        session()->forget(['adminData']);
        return redirect('admin/login');
    }
    public function register(){
        return view('admin.register');
        }
        public function registerAdmin(Request $request){
            $data=new Admin;
            $data->name=$request->name;
            $data->email=$request->email;
            $data->mobile=$request->mobile;
            $data->password=sha1($request->password);
            $data->type="admin";
            $data->save();
            return redirect('admin/login')->with('success','data has been added');
            }

            public function forgot_password(){
                return view('admin.forgot_password');
            }
            public function new_password(Request $request){
                $data=$request->all();
                //dd($data['email']);
                $data1=Admin::where('email',$data['email'])->count();
                if ($data1>0){
                    $admin=Admin::where('email',$data['email'])->first();
                    $admin->password=sha1($data['password']);
                    $admin->save();
                    return redirect('admin/login')->with('success','password has been updated');
                }else{
                    return redirect('admin/forgot-password');
                }

            }
        public function index(){
            $products = Product::all();
            //dd($products);
           return view('admin.dashboard',['products'=>$products]);
            }
            public function destroy($id){
                Product::where('id',$id)->delete();
                return redirect('admin/dashboard')->with('success','data has been deleted');
            }
}
