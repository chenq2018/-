<?php 
    // 获取数据
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $className = $_POST['className'];
    $editId = $_POST['editId'];

    // 引入文件
    include_once '../../public/mysql.php';
    // 连接数据库
    $connect = connect();
    // sql语句
    $edit_sql = "update categories set ";
    // 去除原sql语句中的id
    unset($_POST['editId']);
    // 键值for循环
    foreach ($_POST as $key => $value) {
     	$edit_sql .= "{$key} = '{$value}',";
     } 
    // 截取最后一个，号，用substr($arr, 0, -1)
    $edit_sql = substr($edit_sql, 0, -1);
    $edit_sql .= " where id = {$editId}";

    // sql语句方法2
    // $sql = "update categories set name = '{$name}', slug = '{$slug}',classname = '{$classname}' where id = '{$id}'";

    // die($edit_sql);
    // 执行sql语句
    $edit_arr = mysqli_query($connect, $edit_sql);
    // die($edit_arr);
    // 设置返回
    $response = [
       "code" => 0,
       "msg"  => "操作失败" 
    ];
    // 返回数据
    if($edit_arr){
    	$response['code'] = 1;
    	$response['msg'] = "操作成功";
    	$response['data'] = $edit_arr;
    }

    header("Content-Type:application/json;charset=utf-8");
    echo json_encode($response);

 ?>