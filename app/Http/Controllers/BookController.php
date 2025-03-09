<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    function trang1()
    {
        return view("layouts.trang1");
    }
    
    function laythongtintheloai(){
        $the_loai_sach = DB::table("the_loai")->get();
        return view("qlsach.the_loai",compact("the_loai_sach"));
      }
    function laythongtinsach(){
        $sach = DB::table("sach")->select("tieu_de","tac_gia")
                    ->where("nha_xuat_ban","Văn Học")->get();
        
         return view("qlsach.thong_tin_sach",compact("sach"));        
      }
    function trang_them_1()
    {
        return view("qlsach.them_the_loai_1");
    }
    function trang_them_2()
    {
        return view("qlsach.them_the_loai_2");
    }
    function them_the_loai_1(Request $request)
    {
        $id_1 = $request->input("id_1");
        $the_loai_1 = $request->input("the_loai_1");
        if(!empty($id_1) && !empty($the_loai_1)) {
            $data = ["id"=>$id_1,"ten_the_loai"=>$the_loai_1];
            DB::table("the_loai")->insert($data); 
            
            $the_loai_sach = DB::table("the_loai")->get();
            return view("qlsach.the_loai",compact("the_loai_sach"));
        }else{
            return "Thêm thất bại";
        }
    }
    function them_the_loai_2(Request $request)
    {
        $id = $request->input("id");
        $the_loai = $request->input("the_loai");
       
        $data=[];
        foreach($id as $key=>$value){
            $data[] =["id"=>$value, "ten_the_loai"=> $the_loai[$key]];
        }
        if (!empty($data)) {
            DB::table("the_loai")->insert($data);
            
            $the_loai_sach = DB::table("the_loai")->get();
            return view("qlsach.the_loai",compact("the_loai_sach"));
        }else{
            return "Thêm thất bại";
        }
    }
}