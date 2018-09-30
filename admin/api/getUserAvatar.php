<?php 
    // 获取id，从登陆界面获取
    session_start();
    $user_id = $_SESSION['user_id'];

    // 引入数据库文件
    include_once '../../public/mysql.php';
    // 连接数据库
    $connect = connect();
    // sql语句
    $avatar_sql = "select * from users where id = {$user_id}";
    // 执行sql语句
    $avatar_arr = query($connect, $avatar_sql);
    // print_r($avatar_arr);

    // 设置返回
    $response = [
       "code" => 0,
       "msg"  => "操作失败"
    ];

    // 返回
    if($avatar_arr){
    	$response['code'] = 1;
    	$response['msg'] = '操作成功';
    	$response['nickname'] = $avatar_arr[0]['nickname'];
    	$response['avatar'] = $avatar_arr[0]['avatar'];
    }

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);
 ?>