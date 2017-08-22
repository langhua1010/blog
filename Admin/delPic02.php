<?php 
/**
 * 删除图片  地址 + 原图
 *先删除文件夹上面的图片,之后再删除表单
 */
header("content-type:text/html;charset=utf8");
require_once('../Common/function.php');
require_once('../Common/mysql.php');
checkLogin();
initDb();
$id = isset($_GET['id']) ? $_GET['id'] : 0;
if (empty($id)) {
  back('参数错误');
}
$sql  = 'select * from pics where id = {$id} limit 1';

$pic = findOne($sql);
// 删除原图 
unlink('../Public/Upload/'.$pic['pic_url']);
// 删除数据库中的对应记录
$sql = " delete from pics where id = {$id}";
$rs = mysql_query($sql);
if($rs){
   jump('删除成功', 'Admin/picList.php', 1);
}else{
   jump('删除失败', 'Admin/picList.php', 1);
}

 ?>