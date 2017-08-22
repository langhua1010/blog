<?php 
header("content-type:text/html;charset=utf8");
require_once '../Common/mysql.php';
initDb();

$sql = "select * from pics order by id desc";
$picArrs = findAll($sql);
echo json_encode($picArrs);



 ?>