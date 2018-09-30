<?php 


 ?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <title>Sign in &laquo; Admin</title>
  <link rel="stylesheet" href="../static/assets/vendors/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" href="../static/assets/css/admin.css">
</head>
<body>
  <div class="login">
    <form class="login-wrap">
      <img class="avatar" src="../static/assets/img/default.png">
      <!-- 有错误信息时展示 -->
      <div class="alert alert-danger" style="display:none">
        <!-- <strong><p id="msg"></p></strong> -->
      </div>
      <div class="form-group">
        <label for="email" class="sr-only">邮箱</label>
        <input id="email" type="email" class="form-control" placeholder="邮箱" autofocus>
      </div>
      <div class="form-group">
        <label for="password" class="sr-only">密码</label>
        <input id="password" type="password" class="form-control" placeholder="密码">
      </div>
      <span id="btn-login" class="btn btn-primary btn-block">登 录</span>
      <!-- <input type="submit" class="btn btn-primary btn-block">登录 -->
    </form>
  </div>

  <script src="../static/assets/vendors/jquery/jquery.js"></script>
  <!-- 点击登录 -->
  <script>
      $('#btn-login').on("click", function(){
          var email = $('#email').val();
          var password = $('#password').val();
          // 验证邮箱是否正确
          var reg = /^\w+[@]\w+[.]\w+$/;
          if(!reg.test(email)){
             // $('#msg').text("错误! 邮箱或密码错误!");
             $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误! 邮箱或密码填写不正确!");
             return;
          }
          // 页面刷新
          $.ajax({
            type: "post",
            url: './api/user-login.php',
            data: {
               email: email,
               password: password
            },
            success: function(result){
               // 判断返回code是否为成功
               if(result.code == 1){
                console.log('haha');
                  location.href = './index.php';
               } else {
                  $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误! 邮箱或密码不存在!");
                  return;
               }
            }
          }); 
      });

  </script>

  <!-- input为submit时 -->
  <script>
      // $('#btn-login').submit(function(){
      //     var email = $('#email').val();
      //     var password = $('#password').val();
          
      //     // 页面刷新
      //     $.ajax({
      //       type: "post",
      //       url: './api/user-login.php',
      //       data: {
      //          email: email,
      //          password: password
      //       },
      //       beforeSend: function(){
      //          // 验证邮箱是否正确
      //          var reg = /^\w+[@]\w+[.]\w+$/;
      //          if(!reg.test(email)){
      //             // $('#msg').text("错误! 邮箱或密码错误!");
      //             $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误! 邮箱或密码填写不正确!")     ;
      //             return false;
      //          } 
      //             if(pwd.trim()==''){
      //             // $('#msg').text("错误! 邮箱或密码错误!");
      //             $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误! 邮箱或密码填写不正确!")     ;
      //             return false;
      //          }    
      //       },
      //       success: function(result){
      //          // 判断返回code是否为成功
      //          if(result.code == 1){
      //           console.log('haha');
      //             location.href = './index.php';
      //          } else {
      //             $('.alert').fadeIn(2000).delay(3000).fadeOut(2000).text("错误! 邮箱或密码不存在!");
      //             return;
      //          }
      //       }

      //     }); 

      //       // 阻止submit事件默认行为
      //       event.preventDefault();
      //       // 或者
      //       return false;
      // });

  </script>
</body>
</html>
