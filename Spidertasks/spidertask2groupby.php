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

$sql = "SELECT Dept,COUNT(Dept) FROM tasksp GROUP BY Dept";
$myData=mysql_query($sql,$con);
//$md=mysql_num_rows($myData);
echo"<table border=1>
<tr>
<th>DEPT</th>
<th>COUNT</th>
</tr>";
while($record = mysql_fetch_array($myData))
{
	echo"<tr>";
	//echo "<td>". $record['Name']. "</td>";
	//echo "<td>". $record['Rollno']."</td>";
	echo "<td>".$record['Dept']."</td>";
	echo "<td>".$record['COUNT(Dept)']."</td>";
	//echo "<td>".$record['Email']."</td>";
	//echo "<td>".$record['Addr']."</td>";
	//echo "<td>".$record['Aboutme']."</td>";
	echo "</tr>";
}
echo "</table>";	
mysql_close($con);
?>
</body>
</html>