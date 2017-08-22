
<?php 
// 使用ajax写接口从后台获取数据
header("content-type:text/html;charset=utf8");
require_once '../Common/mysql.php';
initDb();
$sql = "select * from nav order by nav_order asc , id desc";
$navArrs = findAll($sql);


echo json_encode($navArrs);
// http://www.blog.com/Home/nav.php 输出结果是后台获取的 json 数据 
// 此处修改轮播图,采用倒叙的方法 可以使新添加的图片第一张显示出来

 ?>