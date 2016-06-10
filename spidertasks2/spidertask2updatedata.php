<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<center>
<form action="spidertask2updatedata.php" method="get">
ROLLNO:<input type="text" name="rno"><br/><br/>
<input type="submit" name="view" value="VIEW STUDENT">
</form>
</center>

</center>
<center>
<p><b><center>SEE ALL STUDENTS</center></b></p>
<input type="submit" name="see" value="SEE ALL STUDENTS">
</center>
<?php

$con=mysql_connect("localhost","sankar3","goodluck");
if(!$con){
die("can not connect:".mysql_error());
}
mysql_select_db("spider",$con);
if(isset($_GET['view'])){
	mysql_select_db("spider",$con);
	$sql = "SELECT * FROM tasksp WHERE Rollno='$_GET[rno]'";
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
$record = mysql_fetch_array($myData);
echo"<tr>";
echo "<td>". $record['Name']. "</td>";
echo "<td>". $record['Rollno']."</td>";
echo "<td>".$record['Dept']."</td>";
echo "<td>".$record['Email']."</td>";
echo "<td>".$record['Addr']."</td>";
echo "<td>".$record['Aboutme']."</td>";
//echo "<td>".$record['Password']."</td>";
echo "</tr>";
echo "</table>";
}
//$rn=$_GET['rno'];
$rn=$_POST['rno'];
	
	//echo $rn;
if(isset($_POST['update'])){
	//echo $rn;
	$rn=$_POST['rno'];
	$nm=$_POST['name'];
	$dt=$_POST['dept'];
	$em=$_POST['email'];
	$ad=$_POST['add'];
	$ab=$_POST['abm'];
$Updatequery="UPDATE tasksp SET Name='$nm',Dept='$dt',Email='$em',Addr='$ad',Aboutme='$ab' WHERE Rollno=$rn";
mysql_query($Updatequery,$con);
};



$sql = "SELECT * FROM tasksp WHERE Rollno='$_GET[rno]'";
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
$record = mysql_fetch_array($myData);

	echo "<form action=spidertask2updatedata.php method=post>";
	echo "<tr>";
	echo "<td>". "<input type=text name=name value=".$record['Name']." </td>";
	echo "<td>". "<input type=text name=rno value=".$record['Rollno']." </td>";
	echo "<td>". "<input type=text name=dept value=" .$record['Dept']." </td>";
	echo "<td>". "<input type=text name=email value= ".$record['Email']." </td>";
	echo "<td>". "<input type=text name=add value= ".$record['Addr']." </td>";
	echo "<td>". "<input type=text name=abm value= ".$record['Aboutme']." </td>";
	echo "<td>". "<input type=hidden name=hidden value= ".$record['Name']." </td>";
	echo "<td>". "<input type=submit name=update value=update" ." </td>";
	//echo "<tr>";
	echo "</form>";


echo "</table>";

/*if(isset($_GET['see'])){
$sql = "SELECT * FROM tasksp";
$myData=mysql_query($sql,$con);
echo"<table border=1>
<tr>
<th>NAME</th>
<th>DEPT</th>
<th>EMAIL</th>
<th>ADDR</th>
<th>ABOUTME</th>
</tr>";
while($record = mysql_fetch_array($myData)){

	
	echo"<tr>";
echo "<td>". $record['Name']. "</td>";
echo "<td>". $record['Rollno']."</td>";
echo "<td>".$record['Dept']."</td>";
echo "<td>".$record['Email']."</td>";
echo "<td>".$record['Addr']."</td>";
echo "<td>".$record['Aboutme']."</td>";
//echo "<td>".$record['Password']."</td>";
echo "</tr>";
echo "</table>";
}
}*/

/*if(isset($_GET['see'])){
	mysql_select_db("spider",$con);
	$sql = "SELECT * FROM tasksp";
$myData=mysql_query($sql,$con);
};
echo"<table border=1>
<tr>
<th>NAME</th>
<th>ROLLNO</th>
<th>DEPT</th>
<th>EMAIL</th>
<th>ADDR</th>
<th>ABOUTME</th>
</tr>";
while($record = mysql_fetch_array($myData)){
echo"<tr>";
echo "<td>". $record['Name']. "</td>";
echo "<td>". $record['Rollno']."</td>";
echo "<td>".$record['Dept']."</td>";
echo "<td>".$record['Email']."</td>";
echo "<td>".$record['Addr']."</td>";
echo "<td>".$record['Aboutme']."</td>";
//echo "<td>".$record['Password']."</td>";
echo "</tr>";
echo "</table>";
}*/
mysql_close($con);

?>
</body>
</html>