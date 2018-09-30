// 配置模块
require.config({
	// 1.1 声明模块
	//     一共需要声明的模块有: jquery, 模板引擎, 分页插件, bootstrap

	path : {  //作用是：声明每个模块的名称和每个模块对应的路劲,路径不带后缀名
        "jquery" : "/static/assets/vendors/jquery/jquery",
        "bootstrap" : "/static/assets/vendors/bootstrap/js/bootstrap",
        "template" : "/static/assets/vendors/jquery/template-web",
        "pagination" : "/static/assets/vendors/twbs-pagination/jquery.twbsPagination"   
	},   

	// 声明模块与模块之间的依赖关系
	shim : {
		//模块名字
		"pagination" : {
			// deps 声明该模块是依赖哪些模块
			deps : ["jquery"]
		},
		"bootstrap" : {
			deps: ["jquery"] 
		}
	} 
});


// 引入模块
require(["jquery", "bootstrap", "template", "pagination"], function($, bootstrap, template, pagination){
     // 在回调函数中实现
     $(function(){
     	var currentPage = 1;
        var pageSize = 10;
        // 定义总页数
        var pageCount;
        getAjaxData();
   
        function getAjaxData(){
           $.ajax({
              type: 'post',
              url: './api/getCommentsData.php',
              data: {
                 currentPage: currentPage,
                 pageSize: pageSize  
              },
              dataType: 'json',
              success: function(result){
                 if(result.code == 1){
                     pageCount = result.count;
                     console.log(pageCount);
                     var html = template("commentsTemp", {items:result.data});
                     $("tbody").html(html);
   
                     // 分页插件,需要放在函数中，放在方面pageCount为undefined
                     $('.pagination').twbsPagination({
                         totalPages: pageCount,
                         visiblePages: 7,
                         onPageClick: function(event, page){
                             currentPage = page;
                             getAjaxData();
                         }
                     });
                 }
              } 
           });
        }
     })
})