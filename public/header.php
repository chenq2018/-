<?php 
   // 引入数据库文件  
   // require_once '../config.php';
   // 连接数据库,定义的属性，不能加''号
   // $connect = mysqli_connect('localhost', 'root', 'root', 'baixiu');
   // // sql语句
   // $sql = 'select * from categories';
   // // 执行sql语句
   // $result = mysqli_query($connect, $sql);
   // // 查找结果
   // $arr = [];
   // while($res = mysqli_fetch_assoc($result)){
   //    $arr[] = $res;
   // }
   // print_r($arr);


   // 用封装方法
   // 引入文件,它在index页面中打开，所以目录是index.php目录
   include_once './public/mysql.php';
   // 连接数据库
   $connect = connect();
   // sql语句
   $header_sql = 'select * from categories';
   // 执行sql语句
   $header_arr = query($connect, $header_sql);

 ?>

<div class="header">
      <h1 class="logo"><a href="index.html"><img src="static/assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
        <!-- <li><a href="javascript:;"><i class="fa <?php echo $arr['classname'] ?>"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li> -->

        <?php foreach ($header_arr as $key => $value) { ?>
          <li><a href="./list.php?categoryID=<?php echo $value['id'] ?>"><i class="fa <?php echo $value['classname'] ?>"></i><?php echo $value['name'] ?></a></li>
        <?php } ?>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
</div>