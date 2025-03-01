<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class vidulayoutController extends Controller
{
    function trang1()
    {
        return view("layouts.trang1");
    }
    function sach()
    {
        $data = DB::select("select * from sach order by gia_ban asc limit 0,8");
        return view("layouts.index", compact("data"));
    }
    function theloai($id)
    {
        $data = DB::select("select * from sach where id_the_loai = ?",[$id]);
        return view("layouts.index", compact("data"));
    }
    function thongtinsach($id)
    {
        $data = DB::table('sach')->where('id', $id)->first();
        return view("layouts.infor_sach", compact("data"));
    }
}