<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\UserRoleModel;
use App\Model\HuserModel;
use App\Model\RolePermiModel;
use App\Model\PermiModel;

class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 判断用户是否登录
        $session = \Session::get('username');
        if(empty($session)){
            echo '<script>alert("请先登录");window.location.href="/rbac/login";</script>';exit;
        }else{
            // 如果有 把cookie取出来
            $u_name = \Session::get('username');
            // dd($u_name);
            // 查询当前用户是什么角色
            $user = new HuserModel;
            $role = new UserRoleModel;
            $userAll = $user->where(['u_name'=>$u_name])->join("user_role","user_role.u_id","=","huser.u_id")
            ->first()->toArray();
            // dd($userAll);
            // 根据查询出来的角色查询该角色对应的权限
            $r_id = $userAll['r_id'];
            $model = new RolePermiModel;
            $role_powerAll = $model->where(['r_id'=>$r_id])->join('permi','permi.p_id','=','role_permi.p_id')->get()->toArray();
            // dd($role_powerAll);
            // $url = request()->server();
            // dd($url);
            $power = new PermiModel;
            $data = "";
            foreach($role_powerAll as $k =>$v)
            {
                $url = request()->server('REDIRECT_URL');
                // dd($url);
                // $http = request()->server('HTTP_HOST');
                // $header = "http://".$http.$url;
                $path = $power::where(['p_id'=>$v['p_id']])->where(['p_url'=>$url])->first()->get()->toArray();
                // dd($path);
                // $data.=$path;
            }
            // dd($data);8
            if($data==''){
                echo '<script>alert("您的权限不够，请联系管理员");window.location.href="/"</script>';
            }
        }
        return $next($request);
    }
}
