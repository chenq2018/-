<?php 
    // 获取id值
    $delId = $_POST['delId'];

    // 引入文件
    include_once '../../public/mysql.php';
    // 连接数据库
    $connect = connect();
    // sql语句
    $del_sql = "delete from categories where id = '{$delId}'";
    // 执行sql语句
    $del_arr = mysqli_query($connect, $del_sql);

    // 设置返回
    $response = [
       "code" => 0,
       "msg"  => "操作失败" 
    ];

    if($del_arr){
       $response["code"] = 1;
       $response["msg"] = "操作成功";
       $response['data'] = $del_arr;
    }

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);

 ?>