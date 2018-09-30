<?php 
    // 引入数据库文件
    include_once '../../public/mysql.php';
    // 连接数据库
    $connect = connect();
    // sql语句
    $getCategory_sql = "select * from categories";
    // 执行sql语句
    $getCategory_arr = query($connect, $getCategory_sql);
    // 设置返回
    $response = [
       "code" => 0,
       "msg"  => "操作失败"
    ]; 
    // 返回结果
    if($getCategory_arr){
       $response["code"] = 1;
       $response["msg"] = "操作成功";
       $response["data"] = $getCategory_arr; 	 
    }
    // 设置header
    header("Content-Type:application/json;charset=utf-8");
    // 返回
    echo json_encode($response);

 ?>