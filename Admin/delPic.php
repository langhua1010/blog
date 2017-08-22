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
$sql = "SELECT * FROM pics WHERE id = {$id} LIMIT 1";
$pic = findOne($sql);
if (!empty($pic) && file_exists('../Public/Upload/' . $pic['pic_url'])) {
  // ①如果该图片在服务器上存在，则删除
  unlink('../Public/Upload/' . $pic['pic_url']);
}
// ②从数据库中删除
$sql = "DELETE FROM pics WHERE id = {$id}";
$rs = mysql_query($sql); // 因为结果 是布尔值 所以赋值进行判断
if($rs){
  jump('删除成功', 'Admin/picList.php', 1);
} else {
  jump('删除失败', 'Admin/picList.php', 1);
}
?>

