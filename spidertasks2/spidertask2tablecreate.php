<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$con=mysql_connect("localhost","sankar3","goodluck");
if(!$con){
die("can not connect:".mysql_error());
}

mysql_select_db("spider",$con);
$sql = "CREATE TABLE tasksp(
Name varchar(20),
Rollno int,
Dept varchar(60),
Email varchar(30),
Addr varchar(70),
Aboutme varchar(70),
Password varchar(60)
)";
mysql_query($sql,$con);
mysql_close($con);
?>
</body>
</html>