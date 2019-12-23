<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $name = \Session::get('username');
        // dd($name);
        $name = $name['u_name'];
        return view('index/index');
    }

    // 退出登录
    public function exit()
    {
        $name = \Session::pull('username');
        echo '<script>alert("退出成功");window.location.href="/rbac/login"</script>';
    }
}
