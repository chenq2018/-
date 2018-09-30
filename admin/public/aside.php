<?php 
    // 头像方式2
   /*<img class="avatar" src="<?php echo S_SESSION['userinfo']['avatar'] ?>">*/
 ?>

<div class="aside">
    <div class="profile">
      <img class="avatar" src="../static/uploads/avatar.jpg">
      <!-- 头像方式2 -->
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li class="<?php echo $current_page == "index" ? "active" : "" ?>">
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li>

        <?php 
           // echo $current_page; 

           // 定义数组
           $pageArr = ["posts", "posts-add", "categories"];
           // 判断当前页面是否在数组中
           $bool = in_array($current_page, $pageArr);
           // var_dump($bool);


           // 如果当前页面的$current_page值在$pageArr中，那么ul就应该展开
           // 1. a标签的class需要去掉，给a标签添加一个属性 aria-expanded="true"
           // 2. 给ul多加一个classin, 也有一个属性aria-expanded="true"
         ?>

        <!-- <a href="#menu-posts" data-toggle="collapse"> -->
        <a href="#menu-posts" class="<?php echo $bool ? "" : "collapsed" ?>" data-toggle="collapse" <?php echo $bool ? 'aria-expanded="true"' : "" ?>>
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse <?php echo $bool ? "in" : "" ?>" <?php echo $bool ? 'aria-expanded="true"' : ""?>>
          <li class="<?php echo $current_page == "posts" ? "active" : "" ?>"><a href="posts.php">所有文章</a></li>
          <li class="<?php echo $current_page == "posts-add" ? "active" : "" ?>"><a href="post-add.php">写文章</a></li>
          <li class="<?php echo $current_page == "categories" ? "active" : "" ?>"><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li class="<?php echo $current_page == "comments" ? "active" : "" ?>">
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li class="<?php echo $current_page == "users" ? "active" : "" ?>">
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>

        <?php 
            $pageArr = ["nav-menus", "slides", "settings"];
            $bool = in_array($current_page, $pageArr);  
         ?>

        <a href="#menu-settings" class="<?php echo $bool ? "" : "collapsed" ?>" data-toggle="collapse" <?php echo $bool ? 'aria-expanded="true"' : "" ?>>
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse <?php echo $bool ? "in" : "" ?>" <?php echo $bool ? 'aria-expanded="true"' : ""?>>
          <li class="<?php echo $current_page == "nav-menus" ? "active" : "" ?>"><a href="nav-menus.php">导航菜单</a></li>
          <li class="<?php echo $current_page == "slides" ? "active" : "" ?>"><a href="slides.php">图片轮播</a></li>
          <li class="<?php echo $current_page == "settings" ? "active" : "" ?>"><a href="settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div>

  <script src="../../static/assets/vendors/jquery/jquery.js"></script>

  <!-- ajax获取数据 -->
  <script>
     $.ajax({
        type: "post",
        url: "../admin/api/getUserAvatar.php",
        dataType: "json",
        success: function(result){
          // 判断code是否为1
          if(result.code == 1){
             $('.profile').children('img').attr('src', result.avatar);
             $('.profile').children('h3').text(result.nickname);
          }
        }
     });
  </script>


  <!-- 方法二 地址栏和aside中的a标签地址相同时，高亮显示-->
  <script>
     // 获取所有a标签,后代选择器
     // var as = $('.aside a');
     // $.each(as, function(index, dom){
     //    // 此时有#锚点的a标签页会高亮，需要去除hash锚点a标签
     //    if(dom.pathname == location.pathname&&dom.hash == ''){
     //      $(this).parent().addClass('active');
     //      // 展开内容需要在class中添加in属性
     //      $(this).parent().parent().addClass('in');
     //    } //解决输入admin时仪表盘不高亮显示问题 
     //      else if(location.pathname == './admin/'){
     //      $(as[0]).parent().addClass('active');
     //    }

     // });
  </script>