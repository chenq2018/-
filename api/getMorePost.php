<?php 
   // 获取数据
   $categoryID = $_POST['categoryID'];
   $currentPage = $_POST['currentPage'];
   $pageSize = $_POST['pageSize'];
   $offset = ($currentPage - 1) * $pageSize;

   // 连接数据库
   // $connet = mysqli_connect('localhost', 'root', 'root', 'baixiu');
   // // sql语句
   // $sql = "select p.title, p.created, p.content, p.views, p.likes,p.feature, c.name, u.nickname,
   //         (select count(id) from comments where post_id = p.id) as commentsCount 
   //         from posts p         
   //         left join categories c on c.id = p.category_id
   //         left join users u on u.id = p.user_id
   //         where p.category_id = {$categoryID}
   //         order by p.created desc
   //         limit {$offset}, {$pageSize}";
   // // 执行sql语句
   // $result = mysqli_query($connet, $sql);
   // // 查询sql语句
   // $arr = [];
   // while($res = mysqli_fetch_assoc($result)){
   // 	  $arr[] = $res;
   // }
   // print_r($arr);


   // 用封装方法
   // 引入文件,它在index页面中打开，所以目录是index.php目录
   include_once '.././public/mysql.php';
   // 连接数据库
   $connect = connect();
   // sql语句
   $getMorePost_sql = "select p.id, p.title, p.created, p.content, p.views, p.likes,p.feature, c.name, u.nickname,
       (select count(id) from comments where post_id = p.id) as commentsCount 
       from posts p         
       left join categories c on c.id = p.category_id
       left join users u on u.id = p.user_id
       where p.category_id = {$categoryID}
       order by p.created desc
       limit {$offset}, {$pageSize}";
   // 执行sql语句
   $getMorePost_arr = query($connect, $getMorePost_sql); 

   // 判断页面是否到了最后一页
   // $sqlr = "select count(id) as postCount from posts p where p.category_id = {$categoryID}";
   // // 执行sql语句
   // $resultr = mysqli_query($connet, $sqlr);
   // // print_r($resultr);
   // $arra = [];
   // while($resu = mysqli_fetch_assoc($resultr)){
   // 	  $arra[] = $resu;
   // }


   // 用封装方法
   // 引入文件,它在index页面中打开，所以目录是index.php目录
   // sql语句
   $getMorePo_sql = "select count(id) as postCount from posts p where p.category_id = {$categoryID}";
   // 执行sql语句
   $getMorePo_arr = query($connect, $getMorePo_sql);
   // print_r($getMorePo_arr);
   $pageCount = $getMorePo_arr[0]['postCount'];

   // 返回数组1. code 2. msg 3. data
   $response = [
                 "code" => 0,   
                 "msg" => '操作失败'
               ];
    // 判断结果是否存在
    if($getMorePost_arr){
    	$response['code'] = 1;
    	$response['msg'] = '操作成功';
    	$response['data'] = $getMorePost_arr;
    	$response['pageCount'] = $pageCount;
    }; 

    // 设置以json格式输出
    header("Content-Type:application/json;charset=utf-8");
    // print_r($response);        
    // 输出结果
    echo json_encode($response);  
 ?>