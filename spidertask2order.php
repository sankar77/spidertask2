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

$sql = "SELECT * FROM tasksp ORDER BY Rollno asc";
$myData=mysql_query($sql,$con);
echo"<table border=1>
<tr>
<th>NAME</th>
<th>ROLLNO</th>
<th>DEPT</th>
<th>EMAIL</th>
<th>ADDR</th>
<th>ABOUTME</th>
</tr>";
while($record = mysql_fetch_array($myData))
{
	echo"<tr>";
	echo "<td>". $record['Name']. "</td>";
	echo "<td>". $record['Rollno']."</td>";
	echo "<td>".$record['Dept']."</td>";
	echo "<td>".$record['Email']."</td>";
	echo "<td>".$record['Addr']."</td>";
	echo "<td>".$record['Aboutme']."</td>";
	echo "</tr>";
}
echo "</table>";	
mysql_close($con);
?>
</body>
</html>