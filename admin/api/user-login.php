<?php 
    // 获取登录信息
    $email = $_POST['email'];
    $password = $_POST['password'];

    // 引用数据库文件
    include_once '../../public/mysql.php';
    // 连接数据库
    $connect = connect();
    // sql语句
    $login_sql = "select * from users where email = '{$email}' and `password` = '{$password}' and `status` = 'activated'";
    // 执行sql语句
    $login_arr = query($connect, $login_sql);
    // print_r($login_arr);

    // 设置响应结果
    $response = [
        "code" => 0, 
        "msg"  => '操作失败'
    ];

    // 改变响应结果
    if($login_arr){
        // 开启session
        session_start();
        // 记录登录状态
        $_SESSION['login'] = 1;
        // 获取用户头像的id,获取的结果是唯一的
        $_SESSION['user_id'] = $login_arr[0]['id'];
        // $_SESSION['userinfo'] = $login_arr[0];
        $response['code'] = 1;
        $response['msg'] = '操作成功';
        $response['data'] = $login_arr;

    }

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);

 ?>