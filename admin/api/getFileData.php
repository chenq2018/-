<?php 
    // 获取数据
    $file = $_FILES['file'];

    // 获取文件扩展名
    $ext = strrchr($file['name'], '.');

    // 获取随机名字
    $filename = time().rand(1000, 9999).$ext;
    // print_r($filename);

    // 移动文件
    $bool = move_uploaded_file($file['tmp_name'], '../../static/uploads/'.$filename);

    // 设置返回
    $response = [
       "code" => 0,
       "msg"  => "操作失败"
    ];

    if($bool){
       $response['code'] = 1;
       $response['msg'] = "操作成功";
       $response['src'] = '/static/uploads/'.$filename;	 //   /static中的/代表根目录
    }

    header("ContentType:application/json;charset=utf-8");
    echo json_encode($response);

 ?>