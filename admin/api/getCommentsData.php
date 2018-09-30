<?php 
   // 获取数据
   $currentPage = $_POST['currentPage'];
   $pageSize = $_POST['pageSize'];
   $offsetPage = ($currentPage - 1) * $pageSize;
   
   // 引入数据库文件
   include_once '../../public/mysql.php';
   // 连接数据库
   $connect = connect();
   // sql语句
   $getCommentsData_sql = "select c.id, c.author, c.content, c.created, c.`status`, p.title from  comments c
       left join posts p on p.id = c.post_id
       ORDER BY c.created DESC
       LIMIT {$currentPage}, {$pageSize}";
   // 执行sql语句
   $getCommentsData_arr = query($connect, $getCommentsData_sql);

   // 查询总数sql语句
   $count_sql = "select count(*) as countNum from comments";
   // 执行sql语句
   $count_arr = query($connect, $count_sql);
   $countNum = $count_arr[0]['countNum'];
   $count = ceil($countNum / $pageSize);

   // 设置响应
   $response = [
      "code" => 0,
      "msg"  => '操作失败'
   ];

   // 判断
   if($getCommentsData_arr){
   	  $response['code'] = 1;
   	  $response['msg'] = '操作成功';
   	  $response['data'] = $getCommentsData_arr;
      $response['count'] = $count;
   }

   header("Content-Type:application/json;charset=utf-8");
   echo json_encode($response);
 ?>