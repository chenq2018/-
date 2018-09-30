<?php 
   // 获取数据
   $ids = $_POST['ids'];
   // print_r($_POST);

   // 引入数据库文件
   include_once '../../public/mysql.php';
   // 连接数据库
   $connect = connect();
   // sql语句查看名称是否已经存在
   $delAll_sql = "delete from categories where id in ('". implode("','", $ids) ."')";
   // 执行sql语句
   $delAll_arr = mysqli_query($connect, $delAll_sql);
   // print_r($check_arr);
   // 设置响应
   $response = [
      "code" => 0,
      "msg"  => "操作失败"
   ];

    if($delAll_arr){
       $response["code"] = 1;
       $response["msg"] = "操作成功";
       $response['data'] = $delAll_arr;
    }

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);

 ?>