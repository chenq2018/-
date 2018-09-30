<?php 
    // 验证session是否存在
    include_once '../public/mysql.php';
    checkSession();

 ?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Categories &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/vendors/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../static/assets/vendors/nprogress/nprogress.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
  <script src="../static/assets/vendors/nprogress/nprogress.js"></script>
</head>
<body>
  <!-- 加速条开始 -->
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
        <h1>分类目录</h1>
      </div>
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger" style="display:none">
        <!-- <strong></strong> -->
      </div>
      <div class="row">
        <div class="col-md-4">
          <form id="form">
            <h2>添加新分类目录</h2>
            <div class="form-group">
              <label for="name">名称</label>
              <input id="name" class="form-control" name="name" type="text" placeholder="分类名称">
            </div>
            <div class="form-group">
              <label for="slug">别名</label>
              <input id="slug" class="form-control" name="slug" type="text" placeholder="slug">
              <p class="help-block">https://zce.me/category/<strong>slug</strong></p>
            </div>
            <div class="form-group">
              <label for="className">类名</label>
              <input id="className" class="form-control" name="className" type="text" placeholder="类名">
            </div>
            <div class="form-group">
              <!-- <button class="btn btn-primary" type="submit">添加</button> -->
              <input id="btn-add" class="btn btn-primary" type="button" value="添加">
              <input id="btn-edit" class="btn btn-primary" type="button" value="编辑完成" style="display:none">
              <input id="btn-cancelEdit" class="btn btn-primary" type="button" value="取消编辑" style="display:none">
            </div>
          </form>
        </div>
        <div class="col-md-8">
          <div class="page-action">
            <!-- show when multiple checked -->
            <a id="delAll" class="btn btn-danger btn-sm" href="javascript:;" style="display: none">批量删除</a>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center" width="40"><input type="checkbox"></th>
                <th>名称</th>
                <th>Slug</th>
                <th>类名</th>
                <th class="text-center" width="100">操作</th>
              </tr>
            </thead>
            <tbody>
              <!-- <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr>
              <tr>
                <td class="text-center"><input type="checkbox"></td>
                <td>未分类</td>
                <td>uncategorized</td>
                <td>fa-fire</td>
                <td class="text-center">
                  <a href="javascript:;" class="btn btn-info btn-xs">编辑</a>
                  <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>
                </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
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
          <li><a href="posts.php">所有文章</a></li>
          <li><a href="post-add.php">写文章</a></li>
          <li class="active"><a href="categories.php">分类目录</a></li>
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

  <!-- 设置公共变量  -->
  <?php 
     $current_page = "categories";
   ?>

  <?php 
     include_once './public/aside.php';
   ?>

  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <script src="../static/assets/vendors/bootstrap/js/bootstrap.js"></script>
  <!-- 加速条结束 -->
  <script>NProgress.done()</script>

  <script src="../static/assets/vendors/jquery/jquery.js"></script>

  <!-- 引入template模板 -->
  <script src="../static/assets/vendors/jquery/template-web.js"></script>
  <script type="text/template" id="tmp">
     {{each items}}
        <tr editID="{{$value.id}}">
          <td class="text-center"><input type="checkbox"></td>
          <td>{{$value.name}}</td>
          <td>{{$value.slug}}</td>
          <td>{{$value.classname}}</td>
          <td class="text-center">
            <a href="javascript:;" editID="{{$value.id}}" class="btn btn-info btn-xs edit">编辑</a>
            <a href="javascript:;" class="btn btn-danger btn-xs del">删除</a>
          </td>
        </tr>
     {{/each}}
  </script>

  <!-- 添加模板 -->
   <script type="text/template" id="addtmp">
        <tr editID="{{id}}">
          <td class="text-center"><input type="checkbox"></td>
          <td>{{name}}</td>
          <td>{{slug}}</td>
          <td>{{classname}}</td>
          <td class="text-center">
            <a href="javascript:;" editID="{{id}}" class="btn btn-info btn-xs edit">编辑</a>
            <a href="javascript:;" class="btn btn-danger btn-xs del">删除</a>
          </td>
        </tr>
  </script>
  
  <!-- ajax获取数据 -->
  <script>
     $.ajax({
       type:  'post',
       url: './api/getCategoryData.php',
       dataType: 'json',
       success: function(result){
          if(result.code == 1){
            var html = template('tmp', {items: result.data});
            // 不能使用text()否则会报错
            $("tbody").append(html);
          } 
       }
     });
  </script>

  <!-- 添加数据 -->
  <script>
     $("#btn-add").on("click", function(){
        // 获取添加数据
        var name = $("#name").val(); 
        var slug = $("#slug").val(); 
        var classname = $("#className").val(); 

        //  ajax请求
        $.ajax({
           type: 'post',
           url: './api/insertCategoryData.php',
           data: {
             name: name,
             slug: slug,
             classname: classname
           },
           dataType: 'json',
           beforeSend: function(){
               // 验证name,slug,className
               if($.trim(name) == ''){
                  $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误！名称不能为空!");
                  return false;
               } else if($.trim(slug) == ''){
                  $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误！别名不能为空!");
                  return false; 
               } else if($.trim(className) == ''){
                  $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误！类名不能为空!");
                  return false;
               }
           },
           success: function(result){
               // 如果名称已存在
               if(result.code == 1){
                //   var str = '<tr editID='+ +'>\
                //      <td class="text-center"><input type="checkbox"></td>\
                //      <td>'+ name +'</td>\
                //      <td>'+ slug +'</td>\
                //      <td>'+ className +'</td>\
                //      <td class="text-center">\
                //        <a href="javascript:;" class="btn btn-info btn-xs editID='+ id +'">编辑</a>\
                //        <a href="javascript:;" class="btn btn-danger btn-xs">删除</a>\
                //      </td>\
                //     </tr>'; 
                // $(str).appendTo("tbody"); 
             // console.log(result); 
            // 模板添加方法
            var str = template("addtmp", {"id": result.addId, "name":name, "slug":slug, "classname": classname}); 
            $(str).appendTo("tbody"); 

            // 添加完成后设为空
            $("#name").val(''); 
            $("#slug").val(''); 
            $("#className").val('');   
                  
               } else if(result.code != 1){
                   $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("名称已存在，请重新起名称!");
                   return;
               }
           }
        });

        // 阻止事件行为
        // event.preventDefault();
        // return false;
     }); 
  </script>

  <!-- 编辑数据  -->
  <script>
     // 设置全局变量
     var currentRow;

     $('tbody').on("click", '.edit', function(){
         currentRow = $(this).parents("tr").children();
         // 让编辑按钮显现
         $('#btn-add').hide();
         $('#btn-edit').show();
         $('#btn-cancelEdit').show();
         // 获取编辑数据
        var name = $(this).parent().parent().children().eq(1).text();
        var slug = $(this).parent().parent().children().eq(2).text();
        var className = $(this).parent().parent().children().eq(3).text();
         // 获取id值
         var editId = $(this).attr("editID");
         // 给编辑完成按钮赋id值
         $('#btn-edit').attr('btnEditID', editId);
         // console.log(editId);
         // 赋值
         $('#name').val(name);
         $('#slug').val(slug);
         $('#className').val(className);
     });

     // 编辑完成按钮
     $("#btn-edit").on("click", function(){
         // 获取id值
         var editId = $(this).attr('btnEditID');
         var name = $("#name").val(); 
         var slug = $("#slug").val(); 
         var className = $("#className").val();
         // ajax请求
         $.ajax({
            type: 'post',
            url: './api/editCategoryData.php',
            data: {
               name: name,
               slug: slug,
               className: className,
               editId: editId
            },
            beforeSend: function(){
               if($.trim(name) == ''){
                  $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误！名称不能为空!");
                  return;
               } else if($.trim(slug) == ''){
                  $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误！别名不能为空!");
                  return; 
               } else if($.trim(className) == ''){
                  $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误！类名不能为空!");
                  return;
               }
            },
            success: function(result){
              // console.log(result);
              if(result.code == 1){
                 // 编辑按钮隐藏添加按钮显现
                 $('#btn-add').show();
                 $('#btn-edit').hide();
                 $('#btn-cancelEdit').hide();

                 // 保存编辑的数据
                 var editname = $('#name').val();
                 var editslug = $('#slug').val();
                 var editclassName = $('#className').val();

                 // 清空表格数据
                 $('#name').val('');
                 $('#slug').val('');
                 $('#className').val('');

                 // 把编辑数据赋值给表单
                 currentRow.eq(1).text(editname);
                 currentRow.eq(2).text(editslug);
                 currentRow.eq(3).text(editclassName);
              }

            }
         });
     });

     $('#btn-cancelEdit').on("click", function(){
         // 编辑按钮隐藏添加按钮显现
         $('#btn-add').show();
         $('#btn-edit').hide();
         $('#btn-cancelEdit').hide();

         $('#name').val('');
         $('#slug').val('');
         $('#className').val('');
     })
  </script>

  <!-- 删除数据 -->
  <script>
     $('tbody').on("click", '.del', function(){
         // 获取当前行
         var rows = $(this).parents("tr");
         // console.log(rows);
         // 获取id值
         var delId = rows.attr('editID');
         // console.log(delId);
         // ajax请求
         $.ajax({
            type: 'post',
            url: './api/delCategoryData.php',
            data: {delId: delId},
            success: function(result){
              rows.remove();
            }
         });
     })
  </script>

  <!-- 批量删除 -->
  <script>
     // 当全选被选择时，全部选中
     $("thead input").on("click", function(){
        var status = $(this).prop("checked");
        $("tbody input").prop("checked", status);
        if(status){
          $("#delAll").show();
        } else {
          $('#delAll').hide();
        }
     })

     // 子选择框的选中状态
     $("tbody").on("click", 'input', function(){
        var all = $("thead input");
        var cks = $("tbody input");
        if(cks.size() == $("tbody input:checked").size()){
            all.prop("checked", true);
        } else {
           all.prop("checked", false);
        }
         
        // 除了size还可以使用length 
        if($("tbody input:checked").size() >= 2){
           $("#delAll").show();
        } else {
           $("#delAll").hide();
        }
     })

     // 批量删除
     $('#delAll').on("click", function(){
        var ids = [];
        var cks = $('tbody input:checked');
        cks.each(function(index, value){
           var id = $(value).parents("tr").attr("editID");
           ids.push(id);
        });

        // ajax请求
        $.ajax({
          type: "post",
          url: "./api/delALLCategoryData.php",
          data: {ids: ids},
          success: function(result){
             if(result.code == 1){
                cks.parents('tr').remove();
             }
          }
        })
     })
  </script>

</body>
</html>
