<?php 
    // 封装数据库
    // $GLOBALS['host'] = "localhost";
    // $GLOBALS['user'] = "root";
    // $GLOBALS['pwd'] = "root";
    // $GLOBALS['db'] = "baixiu";
    
    // 验证session是否已经存在
    function checkSession(){
       session_start();
       if(!isset($_SESSION['login']) || $_SESSION['login'] != 1){
          header("location: ../admin/login.php");
       }
    }

    // 连接数据库
    function connect(){
       $connect = mysqli_connect('localhost', 'root', 'root', 'baixiu');
       return $connect; 
    }
 
    // 执行语句
    function query($connect, $sql){
        $result = mysqli_query($connect, $sql);

        $arr = [];

        while($res = mysqli_fetch_assoc($result)){
        	$arr[] = $res;
        } 

        return $arr;  
    }   

    // 增加处理
    function add($connect, $arr, $table){
      $key = array_keys($arr);
      $value = array_values($arr);
      // insert into categories '键1，键2，键3' values '(值1，值2，值3)'
      $add_sql = "insert into {$table} (". implode(',', $key) .") values ('". implode("','", $value) ."')";
      // 执行sql语句
      $add_arr = mysqli_query($connect, $add_sql);
      return $add_arr;
    }
 ?>