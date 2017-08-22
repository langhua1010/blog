<?php
/**
 * 删除图片  只能简单的做出删除表中的数据 
 */
header("content-type:text/html;charset=utf8");
require_once '../Common/function.php';
require_once '../Common/mysql.php';
initDb();
checkLogin();

$id = isset($_GET['id']) ? $_GET['id'] : '';
if($id <= 0){
  back('参数错误');
}

// 删除文件夹 
$sql = "select * from pics where id = {'$id'} limit 1";
$pic = findOne($sql);
unlink('../Public/Upload/'.$pic['pic_url']);
// 删除表单中的文件
$sql = "delete from pics where id = {$id}";
$rs = mysql_query($sql);
jump('删除成功', 'Admin/picList.php', 1);

