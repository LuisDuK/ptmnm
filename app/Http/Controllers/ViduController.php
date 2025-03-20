<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TestSendEmail;
use App\Models\User;


class ViduController extends Controller
{    
    function testemail()
 {
    $user = User::find(1);
    $donHang = DB::select("select * from chi_tiet_don_hang c, sach s
    where c.sach_id = s.id
    and c.ma_don_hang = 7");
    $user->notify(new TestSendEmail($donHang));
 }

 }