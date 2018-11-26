<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once ("conn.php");
function is_mobile( $text ) {
    $search = '/^0?1[3|4|5|6|7|8][0-9]\d{8}$/';
    if ( preg_match( $search, $text ) ) {
        return ( true );
    } else {
        return ( false );
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>信息</title>
</head>

<body>


<table width="100%" border="1">
  <tr>
    <td>姓名</td>
    <td>电话</td>
    <td>标题</td>
	<td>价格</td>
	<td>机构</td>
  </tr>
  <?php
  $sql="SELECT * 
FROM  `order` 
WHERE  `title` =  '2018西安乐展门票'
AND over =  '1' group by phone ORDER BY `id` DESC ";
$rerult=mysql_query($sql,$conn);
echo $num=@mysql_num_rows($rerult);
while(@$rowx=mysql_fetch_array($rerult)){
	if($rowx['wan']=='1'){
	$wan="有";
	}else{
	$wan="无";
	}
	if(is_mobile($rowx['phone'])){
  ?>
  
  <tr>
    <td><?php echo $rowx['name'] ?></td>
    <td><?php echo $rowx['phone'] ?></td>
    <td><?php echo $rowx['title'] ?></td>
	<td><?php echo $rowx['price'] ?></td>
	<td><?php echo $rowx['ctitle'] ?></td>
  </tr>
  <?php
  }
}
  ?>
</table>

</body>
</html>