<?php 
  // 获取数据
  $currentPage = $_POST['currentPage'];
  $pageSize = $_POST['pageSize'];
  $offsetPage = ($currentPage - 1) * $pageSize;
  $status = $_POST['status'];
  $categoryId = $_POST['categoryId'];

  // 引入文件
  include_once '../../public/mysql.php';
  // 连接数据库
  $connect = connect();

  // where 1=1表示判断条件为空 
  $where = " where 1=1 ";
  // 判断where条件状态是否为所有状态
  if($status != 'all'){
     $where .= " and p.status = '{$status}' ";   
  } 

  // 判断where条件状态是否为所有文章
  if($categoryId != 'all'){
    // where 1=1表示判断条件为空 
     $where .= " and p.category_id = '{$categoryId}' ";   
  } 

  // sql语句
  $getPostsData_sql = "select p.id, p.title, p.created, p.`status`, u.nickname, c.name from posts p
                       left join users u on u.id = p.user_id
                       left join categories c on c.id = p.category_id"
                       .$where. 
                       "order by p.created desc
                       limit {$offsetPage}, {$pageSize}";
                       // die($getPostsData_sql);
  // 执行sql语句
  $getPostsData_arr = query($connect, $getPostsData_sql);
  // print_r($getPostsData_arr);

  // 查询结果总数
  $countNum_sql = "select count(*) as count from posts p where $where";
  $countNum_arr = query($connect, $countNum_sql);
  $count = $countNum_arr[0]['count'];
  // 总页数
  $countNum = ceil($count / $pageSize);

  // 返回设置
  $response = array(
    "code" => 0,
    "msg"  => '操作失败'
  );

  // 返回
  if($getPostsData_arr){
    $response['code'] = 1;
    $response['msg'] = "操作成功";
    $response['data'] = $getPostsData_arr;
    $response['countNum'] = $countNum;
  }

  header("Content-Type:application/json;charset=utf-8");
  echo json_encode($response);

 ?>