<?php 
    // 验证session是否存在
    include_once '../public/mysql.php';
    checkSession();

 ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Posts &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <script>NProgress.start()</script>

  <div class="main">
    <!-- <nav class="navbar">
      <button class="btn btn-default navbar-btn fa fa-bars"></button>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="profile.php"><i class="fa fa-user"></i>个人中心</a></li>
        <li><a href="login.php"><i class="fa fa-sign-out"></i>退出</a></li>
      </ul>
    </nav> -->

    <?php 
       include_once './public/navbar.php'; 
     ?>

    <div class="container-fluid">
      <div class="page-title">
        <h1>所有文章</h1>
        <a href="post-add.php" class="btn btn-primary btn-xs">写文章</a>
      </div>
      <!-- 有错误信息时展示 -->
      <!-- <div class="alert alert-danger">
        <strong>错误！</strong>发生XXX错误
      </div> -->
      <div class="page-action">
        <!-- show when multiple checked -->
        <a class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
        <form class="form-inline">
          <select id="selectId" name="" class="form-control input-sm">
            <option value="all">所有分类</option>
            <!-- <option value="">未分类</option> -->
          </select>
          <select id="status" name="" class="form-control input-sm">
            <option value="all">所有状态</option>
            <option value="drafted">草稿</option>
            <option value="published">已发布</option>
            <option value="trashed">已废弃</option>
          </select>
          <!-- <button id="btn-filt" class="btn btn-default btn-sm">筛选</button> -->
          <input id="btn-filt" class="btn btn-default btn-sm" type="button" value="筛选"></button>
        </form>
        <ul class="pagination pagination-sm pull-right">
          <!-- <li><a href="#">上一页</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">下一页</a></li> -->
        </ul>
      </div>
      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th class="text-center" width="40"><input type="checkbox"></th>
            <th>标题</th>
            <th>作者</th>
            <th>分类</th>
            <th class="text-center">发表时间</th>
            <th class="text-center">状态</th>
            <th class="text-center" width="100">操作</th>
          </tr>
        </thead>
        <tbody>
          <!-- <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
          <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>随便一个名称</td>
            <td>小小</td>
            <td>潮科技</td>
            <td class="text-center">2016/10/07</td>
            <td class="text-center">已发布</td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr> -->
        </tbody>
      </table>
    </div>
  </div>

  <!-- <div class="aside">
    <div class="profile">
      <img class="avatar" src="../static/uploads/avatar.jpg">
      <h3 class="name">布头儿</h3>
    </div>
    <ul class="nav">
      <li>
        <a href="index.php"><i class="fa fa-dashboard"></i>仪表盘</a>
      </li>
      <li class="active">
        <a href="#menu-posts" data-toggle="collapse">
          <i class="fa fa-thumb-tack"></i>文章<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-posts" class="collapse in">
          <li class="active"><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li><a href="categories.php">分类目录</a></li>
        </ul>
      </li>
      <li>
        <a href="comments.php"><i class="fa fa-comments"></i>评论</a>
      </li>
      <li>
        <a href="users.php"><i class="fa fa-users"></i>用户</a>
      </li>
      <li>
        <a href="#menu-settings" class="collapsed" data-toggle="collapse">
          <i class="fa fa-cogs"></i>设置<i class="fa fa-angle-right"></i>
        </a>
        <ul id="menu-settings" class="collapse">
          <li><a href="nav-menus.php">导航菜单</a></li>
          <li><a href="slides.php">图片轮播</a></li>
          <li><a href="settings.php">网站设置</a></li>
        </ul>
      </li>
    </ul>
  </div> -->

  <?php 
    // 在公共文件之前声明变量，是可以被公共文件访问的
    $current_page = "posts";
   ?>

  <?php 
     include_once './public/aside.php';
   ?>

  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <script>NProgress.done()</script>

  <!-- template模板 -->
  <script src="../static/assets/vendors/jquery/template-web.js"></script>
  <script type="text/template" id="postsTmp">
     {{each items}}
         <tr>
            <td class="text-center"><input type="checkbox"></td>
            <td>{{$value.title}}</td>
            <td>{{$value.nickname}}</td>
            <td>{{$value.name}}</td>
            <td class="text-center">{{$value.created}}</td>
            <td class="text-center">
                {{if $value.status == 'published'}}
                    已发布
                {{else if $value.status == 'drafted'}}
                    草稿
                {{else if $value.status == 'trashed'}}
                    已废弃
                {{/if}}            
            </td>
            <td class="text-center">
              <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>
              <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
            </td>
          </tr>
     {{/each}}
  </script>

  <script type="text/template" id="paginationTmp">
      <li
         {{if(currentPage==1)}}
         style="display:none;"
         {{/if}} 
         data-page="{{currentPage-1}}" >
         <a href="#">上一页</a></li>
      <li
         {{if(currentPage-2<1)}}
         style="display:none;"
         {{/if}} 
          data-page="{{currentPage-2}}" >  
          <a href="#">{{currentPage-2}}</a></li>
      <li
         {{if(currentPage-1<1)}}
         style="display:none;"
         {{/if}} 
         data-page="{{currentPage-1}}" >
          <a href="#">{{currentPage-1}}</a></li>
      <li class="active"  data-page="{{currentPage}}"><a href="#">{{currentPage}}</a></li>
      <li
         {{if(currentPage+1>pageCount)}}
         style="display:none;"
         {{/if}} 
         data-page="{{currentPage+1}}" >
          <a href="#">{{currentPage+1}}</a></li>
      <li
         {{if(currentPage+2>pageCount)}}
         style="display:none;"
         {{/if}} 
         data-page="{{currentPage+2}}" >
         <a href="#">{{currentPage+2}}</a></li>
      <li
         {{if(currentPage+1>pageCount)}}
         style="display:none;"
         {{/if}} 
         data-page="{{currentPage+1}}" >
         <a href="#">下一页</a></li>
  </script>

  <script>
     // 设置当前页
     // var currentPage = 1;
     // // 设置最大页数
     // var pageCount = 5;
     // // 设置每页最大数量
     // var pageSize = 10;

     // // makePageButton();
     
     // function makePageButton(){
     //    // 设置显示起始页
     //    var startPage = currentPage -2;

     //    // 当前页面为第一、第二页时不显示-1 0页
     //    if(startPage < 1){
     //       startPage = 1;
     //    } 

     //    // 设置显示结束页
     //    var endPage = currentPage + 4;
     //    // 当为最大页时
     //    if(endPage > pageCount){
     //       endPage = pageCount;
     //    }  

     //    // 动态生成分页
     //    var str = '';
     //    if(currentPage != 1){
     //      // 给所有li添加属性item，以便事件委托
     //      str += '<li class="item" data-page="'+ (currentPage - 1) +'"><a href="#">上一页</a></li>';
     //    }
     //    for(var i = startPage; i <=endPage; i++){
     //       if(i == currentPage){
     //           // 当选中时变色
     //           str += '<li class="item active" data-page="'+ i +'"><a href="#">'+ i +'</a></li>';
     //       } else {
     //           str += '<li class="item" data-page="'+ i +'"><a href="#">'+ i +'</a></li>';
     //       }
     //    }
     //    if(currentPage != pageCount){
     //     str += '<li class="item" data-page="'+ (currentPage + 1) +'"><a href="#">下一页</a></li>';  
     //    }
     //    $(".pagination").html(str);
     // }

     // var statusData = {
     //       published : "已发布",
     //       drafted : "草稿",
     //       trashed : "已废弃" 
     //     };

     // // 展示所有文章内容
     // $.ajax({
     //    type: "post",
     //    url: "./api/getPostsData.php",
     //    data: {currentPage: currentPage, 
     //           pageSize: pageSize, 
     //           status: $("#status").val(), 
     //           categoryId: $("#selectId").val()
     //          },
     //    success: function(result){
     //       if(result.code == 1){
     //          // var html = template("postsTmp", {items: result.data});

     //          pageCount = result.countNum;
     //          makePageButton();
     //          // $("tbody").empty();

     //          $.each(result.data, function(index, value){
     //            var html = '<tr>\
     //              <td class="text-center"><input type="checkbox"></td>\
     //              <td>'+ value.title +'</td>\
     //              <td>'+ value.nickname +'</td>\
     //              <td>'+ value.name +'</td>\
     //              <td class="text-center">'+ value.created +'</td>\
     //              <td class="text-center">'+ statusData[value.status] +'</td>\
     //              <td class="text-center">\
     //                <a href="javascript:;" class="btn btn-default btn-xs">编辑</a>\
     //                <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\
     //              </td>\
     //            </tr>'

     //             $("tbody").append(html);

     //          })
     //          // console.log(html);
     //          // $("tbody").append(html);
     //       }
     //    }
     // });

     // 封装添加内容函数
     // function makeTable(){
     //    $("tbody").empty();  
     //    // console.log(result);
     //    var html = template("postsTmp", {items: result.data});
     //    $("tbody").append(html);
     //  }


     // // 分页获取数据
     // $('.pagination').on("click", '.item', function(){
     //     // currentPage不能添加var
     //     currentPage = parseInt($(this).attr("data-page"));
     //     // var pageSize = 10;
     //     // console.log(current_data);
         
     //     // ajax请求数据
     //     $.ajax({
     //        type: 'post',
     //        url: './api/getPostsData.php',
     //        data: {
     //          currentPage: currentPage,
     //          pageSize: pageSize,
     //          status: $("#status").val(), 
     //          categoryId: $("#selectId").val()
     //        },
     //        dataType: 'json',
     //        success: function(result){
     //           if(result.code == 1){
     //           // var html = template("postsTmp", {items: result.data});
     //           // 获取分页最大值
     //           pageCount = result['countNum']; 
     //           makePageButton();

     //           makeTable();

     //           }   
     //        }
     //     });   
     // });

     // // 所有分类
     // $.ajax({
     //    type: "post",
     //    url: "./api/getCategoryData.php",
     //    dataType: 'json',
     //    success: function(result){
     //      $.each(result.data, function(index, value){
     //        var html = '<option value="'+ value.id +'">'+ value.name +'</option>';
     //        // console.log(html);
     //        $(html).appendTo("#selectId");
     //        // $("#selectId").append(html);
     //      })
     //    }
     // });

     // // 筛选按钮
     // $("#btn-filt").on("click", function(){
     //    var status = $("#status").val();
     //    // 获取所有分类的id
     //    var categoryId = $("#selectId").val();
     //    // console.log(status);
     //    // console.log(categoryId);
     //    // 请求ajax
     //    $.ajax({
     //      type: "post",
     //      url: "./api/getPostsData.php",
     //      data: {
     //         currentPage: currentPage,
     //         pageSize: pageSize,
     //         status: status,
     //         categoryId: categoryId
     //      },
     //      dataType: "json",
     //      success: function(result){
     //         if(result.code == 1){
     //            // console.log(result);
     //            makeTable();
     //         }
     //      }
     //    }); 
     // });
  </script>




  <script>
     // 封装ajax函数
     function getPostsData(currentPage, pageCount){
        $.ajax({
           type: "post",
           url: "./api/getPostsData.php",
           data: {currentPage: currentPage, 
                  pageSize: pageSize,
                  status: $("#status").val(),  
                  categoryId: $("#selectId").val()
                 },
           success: function(result){
              if(result.code == 1){
                 pageCount = result.countNum;
                 // var html = template("postsTmp", {items: result.data});
   
                 var postHtml = template("postsTmp", {items: result.data});
   
                 $("tbody").html(postHtml);
   
                 // 添加分页按钮
                 var paginationHtml = template("paginationTmp", {currentPage: currentPage, pageCount: pageCount});
   
                 $(".pagination").html(paginationHtml);
                 // console.log(html);
                 // $("tbody").append(html);
              }
           }
        });
     }

     // 封装添加内容函数
     function makeTable(result){
        $("tbody").empty();  
        // console.log(result);
        var html = template("postsTmp", {items: result});
        $("tbody").append(html);
      }

     // 分页方法2
     var currentPage = 3;
     // 设置最大页数
     var pageSize = 20;
     var pageCount;
     getPostsData(currentPage, pageCount);

     // 对分页绑定点击事件
     $('.pagination').on('click', 'li', function(){
         currentPage = parseInt($(this).attr("data-page"));
         // console.log(currentPage);
         getPostsData(currentPage, pageCount);
     });

     // 所有分类
     $.ajax({
        type: "post",
        url: "./api/getCategoryData.php",
        dataType: 'json',
        success: function(result){
          $.each(result.data, function(index, value){
            var html = '<option value="'+ value.id +'">'+ value.name +'</option>';
            // console.log(html);
            $(html).appendTo("#selectId");
            // $("#selectId").append(html);
          })
        }
     });

     // 筛选按钮
     $("#btn-filt").on("click", function(){
        var status = $("#status").val();
        // 获取所有分类的id
        var categoryId = $("#selectId").val();
        // console.log(status);
        // console.log(categoryId);
        // 请求ajax
        $.ajax({
          type: "post",
          url: "./api/getPostsData.php",
          data: {
             currentPage: currentPage,
             pageSize: pageSize,
             status: status,
             categoryId: categoryId
          },
          dataType: "json",
          success: function(result){
             if(result.code == 1){
                // console.log(result);
                makeTable(result.data);
             }
          }
        }); 
     });
  </script>

</body>
</html>
