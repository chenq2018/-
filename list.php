<?php 
   // 引入数据库文件
   // require_once 'config.php';

   header("Content-Type:text/html;charset=utf-8");

   // 获取跳转网页的ID
   $categoryId = $_GET['categoryID'];
   // var_dump($categoryId);

   // 连接数据库
   // $content = mysqli_connect('localhost', 'root', 'root', 'baixiu');
   // // sql语句
   // $sql = "select p.title, p.created, p.content, p.views, p.likes, p.feature, u.nickname, c.name, 
   //         (select count(id) from comments c where c.post_id = p.id) as commentsCount
   //         from posts p
   //         left join users u on p.user_id = u.id
   //         left join categories c on c.id = p.category_id
   //         where p.category_id = '$categoryId'
   //         order by p.created desc limit 8";
   // // 执行sql语句
   // $result = mysqli_query($content, $sql);
   // // 查询sql语句
   // $array = [];
   // while($res = mysqli_fetch_assoc($result)){
   //     $array[] = $res; 
   // }
   // print_r($array);


   // 用封装方法
   // 引入文件,它在index页面中打开，所以目录是index.php目录
   include_once './public/mysql.php';
   // 连接数据库
   $connect = connect();
   // sql语句
   $list_sql = "select p.id, p.title, p.created, p.content, p.views, p.likes, p.feature, u.nickname, c.name, 
     (select count(id) from comments c where c.post_id = p.id) as commentsCount
     from posts p
     left join users u on p.user_id = u.id
     left join categories c on c.id = p.category_id
     where p.category_id = '$categoryId'
     order by p.created desc limit 8";
   // 执行sql语句
   $list_arr = query($connect, $list_sql);
   // print_r($list_arr);
 ?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="static/assets/css/style.css">
  <link rel="stylesheet" href="static/assets/vendors/font-awesome/css/font-awesome.css">
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>

    <!-- <div class="header">
      <h1 class="logo"><a href="index.php"><img src="static/assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
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
    </div> -->
    <?php include_once './public/header.php' ?>

    <!-- <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">
          <li>
            <a href="javascript:;">
              <p class="title">废灯泡的14种玩法 妹子见了都会心动</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_1.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">可爱卡通造型 iPhone 6防水手机套</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_2.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">变废为宝！将手机旧电池变为充电宝的Better</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_3.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">老外偷拍桂林芦笛岩洞 美如“地下彩虹”</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_4.jpg" alt="">
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <p class="title">doge神烦狗打底南瓜裤 就是如此魔性</p>
              <p class="reading">阅读(819)</p>
              <div class="pic">
                <img src="static/uploads/widget_5.jpg" alt="">
              </div>
            </a>
          </li>
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="static/uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div> -->
    <?php include_once './public/aside.php' ?>

    <div class="content">
      <div class="panel new">
        <h3><?php echo $list_arr[0]['name'] ?></h3>
        <!-- <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
        <div class="entry">
          <div class="head">
            <a href="javascript:;">星球大战：原力觉醒视频演示 电影票68</a>
          </div>
          <div class="main">
            <p class="info">admin 发表于 2015-06-29</p>
            <p class="brief">星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯，星球大战:原力觉醒：《星球大战:原力觉醒》中国首映盛典红毯</p>
            <p class="extra">
              <span class="reading">阅读(3406)</span>
              <span class="comment">评论(0)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(167)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>星球大战</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="static/uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div> -->

        <?php 
           foreach ($list_arr as $key => $value) { ?>
              <div class="entry">
              <div class="head">
            <a href="detail.php?postId=<?php echo $value['id'] ?>"><?php echo $value['title'] ?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $value['nickname'] ?> 发表于 <?php echo $value['created'] ?></p>
            <p class="brief"><?php echo $value['content'] ?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $value['views'] ?>)</span>
              <span class="comment">评论(<?php echo $value['commentsCount'] ?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $value['likes'] ?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?php echo $value['name'] ?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="<?php echo $value['feature'] ?>" alt="">
            </a>
          </div>
        </div>
          <?php } ?>

          <div class="loadmore">
             <span class="btn">加载更多</span>
          </div>

      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>

  <script src="static/assets/vendors/jquery/jquery.min.js"></script>
  <script src="static/assets/vendors/jquery/template-web.js"></script>

  <!-- template模板 -->
  <script type="text/template" id="navTemp">
      {{each items}}
          <div class="entry">
          <div class="head">
            <a href="detail.php?postId={{$value.id}}">{{$value.title}}</a>
          </div>
          <div class="main">
            <p class="info">{{$value.nickname}} 发表于 {{$value.created}}</p>
            <p class="brief">{{$value.content}}</p>
            <p class="extra">
              <span class="reading">阅读({{$value.views}})</span>
              <span class="comment">评论({{$value.commentsCount}})</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞({{$value.likes}})</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span>{{$value.name}}</span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="{{$value.feature}}" alt="">
            </a>
          </div>
        </div>
      {{/each}}
  </script>

  <script>
     $(function(){
       var currentPage = 1;
       $('.loadmore .btn').on("click", function(){ 
           // 获取当前页面ID
           var categoryID = location.search.split('=')[1];
           currentPage++;
           // 使用ajax接收参数
           $.ajax({
              type: 'post',
              url: './api/getMorePost.php',
              data: {
                  categoryID: categoryID,
                  currentPage: currentPage,
                  pageSize: 10
              },
              dataType: 'json',
              success: function(result){
                    // console.log('haha');
                  if(result.code == 1){
                    // var data = result.data;
                    // var pageCount = result.pageCount;
                    // console.log(data);
                    // console.log(pageCount);
                    // $.each(data, function(index, value){
                    //   // js不支持字符串换行，用\换行
                    //    var str = '<div class="entry">\
                    //    <div class="head">\
                    //      <a href="javascript:;">'+ value['title'] +'</a>\
                    //    </div>\
                    //    <div class="main">\
                    //      <p class="info">' + value['nickname'] + ' 发表于' + value['created'] + '</p>\
                    //      <p class="brief">'+ value['content'] +'</p>\
                    //      <p class="extra">\
                    //        <span class="reading">阅读(' + value['views'] + ')</span>\
                    //        <span class="comment">评论(' + value['commentsCount'] + ')</span>\
                    //        <a href="javascript:;" class="like">\
                    //          <i class="fa fa-thumbs-up"></i>\
                    //          <span>赞(' + value['likes'] + ')</span>\
                    //        </a>\
                    //        <a href="javascript:;" class="tags">\
                    //          分类：<span>' + value['name'] + '</span>\
                    //        </a>\
                    //      </p>\
                    //      <a href="javascript:;" class="thumb">\
                    //        <img src="' + value['feature'] + '" alt="">\
                    //      </a>\
                    //    </div>\
                    //  </div>';


                    // 运用模板引擎
                    var html = template('navTemp', {items: result.data});
                    // $('.panel new').append(html);
                     
                     // 添加内容
                     // var entry = $(str);
                     var entry = $(html);
                     // console.log(entry);
                     // insertBefore('selector')写入选择器
                     entry.insertBefore('.loadmore');

                    // });
                     // 判断是否为最后一页
                     var maxPage = Math.ceil(result.pageCount / 10);
                     console.log(maxPage);
                     if(currentPage == maxPage){
                        $('.loadmore .btn').hide();
                     }
                  }
              }
           });
       });
     })

  </script>
</body>
</html>