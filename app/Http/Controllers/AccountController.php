<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    function accountpanel()
    {
    $user = DB::table("users")->whereRaw("id=?",[Auth::user()->id])->first();
    return view("vidusach.account",compact("user"));
    }
    function managebook()
    {
    $data = DB::table("sach")->get();
    return view("vidusach.managebook",compact("data"));
    }

    function createbook(){
        $the_loai = DB::table('the_loai')->get();

        return view('vidusach.createbook', compact('the_loai'));
    }
   function addbook(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'id_the_loai' => 'required|integer',
            'nha_xuat_ban' => 'required|string|max:255',
            'nha_cung_cap' => 'nullable|string|max:255',
            'tac_gia' => 'nullable|string|max:255',
            'hinh_thuc_bia' => 'nullable|string|max:50',
            'mo_ta'=>'required|string|max:255',
            'gia_ban' => 'required|numeric',
            'file_anh_bia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
       
        $bookId = DB::table('sach')->insertGetId([
            'tieu_de' => $request->input('tieu_de'),
            'id_the_loai' => $request->input('id_the_loai'),
            'nha_xuat_ban' => $request->input('nha_xuat_ban'),
            'nha_cung_cap' => $request->input('nha_cung_cap'),
            'tac_gia' => $request->input('tac_gia'),
            'mo_ta'=> $request->input('mo_ta'),
            'hinh_thuc_bia' => $request->input('hinh_thuc_bia'),
            'gia_ban' => $request->input('gia_ban')
        ]);
    
        
        if ($request->hasFile("file_anh_bia")) {
           
            $fileName = $bookId . '.' . $request->file('file_anh_bia')->extension();
            
         
            $request->file('file_anh_bia')->storeAs('public/books', $fileName);
    
           
            DB::table('sach')->where('id', $bookId)->update(['file_anh_bia' => $fileName]);
        }
    
        return redirect()->route('bookcreate')->with('status', 'Thêm sách thành công!');
    }
    
    function saveaccountinfo(Request $request)
    {
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['nullable', 'string'] 
        ]);
        $id = $request->input('id'); 
        $data["name"] = $request->input("name");
        $data["phone"] = $request->input("phone");
        $data["email"] = $request->input("email");
        if($request->hasFile("photo"))
        {
   
        $fileName = Auth::user()->id . '.' . $request->file('photo')->extension(); 
    
        $request->file('photo')->storeAs('public/profile', $fileName);
        $data['photo'] = $fileName;
        }
        DB::table("users")->where("id",$id)->update($data);

        return redirect()->route('account')->with('status', 'Cập nhật thành công');
        }
    function editbook($id)
        {
           
            $sach = DB::table('sach')->where('id', $id)->first();
            
            $the_loai = DB::table('the_loai')->get();
        
            if (!$sach) {
                return redirect()->route('book.create')->with('error', 'Sách không tồn tại!');
            }
        
            return view('vidusach.editbook', compact('sach', 'the_loai'));
        }
    function deletebook(Request $request){
        $id=$request->input("id");
        DB::table("sach")->where("id",$id)->delete();
        $data = DB::table("sach")->get();
        return view("vidusach.managebook",compact("data"));
    }
    function updatebook(Request $request, $id)
{
    $request->validate([
        'tieu_de' => 'required|string|max:255',
        'id_the_loai' => 'required|integer',
        'nha_xuat_ban' => 'required|string|max:255',
        'nha_cung_cap' => 'nullable|string|max:255',
        'tac_gia' => 'nullable|string|max:255',
        'hinh_thuc_bia' => 'nullable|string|max:50',
        'mo_ta'=>'required|string|max:255',
        'gia_ban' => 'required|numeric',
        'file_anh_bia' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $sach = DB::table('sach')->where('id', $id)->first();
    if (!$sach) {
        return redirect()->route('book.create')->with('error', 'Sách không tồn tại!');
    }

    DB::table('sach')->where('id', $id)->update([
        'tieu_de' => $request->input('tieu_de'),
        'id_the_loai' => $request->input('id_the_loai'),
        'nha_xuat_ban' => $request->input('nha_xuat_ban'),
        'nha_cung_cap' => $request->input('nha_cung_cap'),
        'tac_gia' => $request->input('tac_gia'),
        'hinh_thuc_bia' => $request->input('hinh_thuc_bia'),
        'mo_ta'=> $request->input('mo_ta'),
        'gia_ban' => $request->input('gia_ban')
    ]);

    if ($request->hasFile("file_anh_bia")) {
        $fileName = $id . '.' . $request->file('file_anh_bia')->extension();
        $request->file('file_anh_bia')->storeAs('public/books', $fileName);

        DB::table('sach')->where('id', $id)->update(['file_anh_bia' => $fileName]);
    }

    return redirect()->route('bookedit',$id)->with('status', 'Cập nhật sách thành công!');
}
 }
