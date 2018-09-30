<?php 
   // 获取数据
   $name = $_POST['name'];
   // print_r($_POST);

   // 引入数据库文件
   include_once '../../public/mysql.php';
   // 连接数据库
   $connect = connect();
   // sql语句查看名称是否已经存在
   $check_sql = "select count(*) as count from categories where name = '{$name}'";
   // 执行sql语句
   $check_arr = query($connect, $check_sql);
   // print_r($check_arr);
   $checkCount = $check_arr[0]['count'];
   // 设置响应
   $response = [
      "code" => 0,
      "msg"  => "操作失败"
   ];
   // 判断名称是否存在
   if($checkCount > 0){
   	  $response['msg'] = '名称已存在，请重新起名称';
   } else {
   	  // $key = array_keys($_POST);
   	  // $value = array_values($_POST);
   	  // print_r($key);
   	  // insert into categories '键1，键2，键3' values '(值1，值2，值3)'
   	  // $add_sql = "insert into categories (". implode(',', $key) .") values ('". implode("','", $value) ."')";
   	  // die($add_sql);
   	  // 执行sql语句
   	  // $add_arr = query($connect, $add_sql);
   	  // print_r($add_arr);


        // 插入, 增删改返回的是booler类型
        // $sql = "insert into categories values (null, '$slug', '$name', '$classname')";
        

   	  $add_arr = add($connect, $_POST, "categories");
   	  // print_r($add_arr);

        // 获取添加的id值 
        $addId = mysqli_insert_id($connect);
        // print_r($addId);

   	  if($add_arr){
   	  	$response['code'] = 1;
   	  	$response['msg'] = "操作成功";
   	  	$response['data'] = $add_arr;
         $response['addId'] = $addId;
   	  }
   }

   header("Content-Type:application/json;charset=utf-8");
   echo json_encode($response);

 ?>