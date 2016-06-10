<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<center>
<form action="spidertask2insert.php" method="post">
NAME:<input type="text" name="name"><br/><br/>
ROLLNO:<input type="text" name="rno"><br/><br/>
DEPT:<input list="text" name="dept"><br/><br/>
  <datalist id="text">
  <option value="CSE">
  <option value="ECE">
  <option value="EEE">
  <option value="MECH">
  <option value="ICE">
  <option value="CHEM">
  <option value="ARCH">
  <option value="META">
  <option value="CIVIL">
  <option value="PROD">
  </datalist> 
EMAIL:<input type="email" name="email"><br/><br/>
ADDR:<textarea name="add" rows="8" cols="22"></textarea><br/><br/>
ABOUT ME:<textarea name="abm" rows="8" cols="22"></textarea><br/><br/>
<input type="submit" name="submit" value="submit">
</form>
</center>
<br><br><br><br><br>
<p><b><center>VIEW STUDENT</center></b></p>
<center>
<form action="spidertask2insert.php" method="post">
ROLLNO:<input type="text" name="rno"><br/><br/>
<input type="submit" name="view" value="VIEW STUDENT">
</form>
</center>
<?php
$con=mysql_connect("localhost","sankar3","goodluck");
if(!$con){
die("can not connect:".mysql_error());
}
if(isset($_POST['submit'])){
//$con=mysql_connect("localhost","sankar3","goodluck");
//if(!$con){
//die("can not connect:".mysql_error());
//}
$number=$_POST["rno"];
$nm=$_POST["name"];
if(empty($_POST['add'])||(preg_match('/[A-Z]+[a-z]+/',$nm))||(strlen($number)!=9)){
echo"please fill proper details";
}
	
//if(!preg_match('/[A-Z]+[a-z]+/',$nm)){
//echo"name should contain only letters";	
//}
//if(strlen($number)!=9){
	//echo "roll no is not 9 digits long";
//}
//}
//echo"<h1>KANHA NATIONAL PARK</h1>";
else{
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
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
$password = substr( str_shuffle( $chars ), 0, 8 );
$password1= sha1($password); //Encrypting Password
echo $password1;
mysql_query($sql,$con);
$sql = "INSERT INTO tasksp(Name,Rollno,Dept,Email,Addr,Aboutme,Password) VALUES('$_POST[name]','$_POST[rno]','$_POST[dept]','$_POST[email]','$_POST[add]','$_POST[abm]','$password1')";
mysql_query($sql,$con);
//$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
//$password = substr( str_shuffle( $chars ), 0, 8 );
//$password1= sha1($password); //Encrypting Password
//echo $password1;
mysql_close($con);
}
}
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
echo"<table border=1>
<tr>
<th>NAME</th>
<th>DEPT</th>
<th>EMAIL</th>
<th>ADDR</th>
<th>ABOUTME</th>
</tr>";
//$Updatequery="UPDATE tasksp SET Name='$_POST[name]',Rollno='$_POST[rno]',Dept='$_POST[dept]',Email='$_POST[email]',Addr='$_POST[add]',Aboutme='$_POST[abm]',Password='$_POST[pswrd]' WHERE Rollno='$_POST[hidden]'";
//mysql_query($Updatequery,$con);
echo"<tr>";
echo "<td>" . "<input type=text name=name value=" . $record['Name'] . " </td>";
//echo "<td>" . "<input type=text name=rno value=" . $record['Rollno'] . " </td>";
echo "<td>" . "<input type=text name=dept value=" . $record['Dept'] . " </td>";
echo "<td>" . "<input type=text name=email value=" . $record['Email'] . " </td>";
echo "<td>" . "<input type=text name=add value=" . $record['Addr'] . " </td>";
echo "<td>" . "<input type=text name=abm value=" . $record['Aboutme'] . " </td>";
//echo "<td>" . "<input type=text name=pswrd value=" . $record['Password'] . " </td>";
echo "<td>" . "<input type=hidden name=hidden value=" . $record['Rollno'] . " </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "</tr>";
echo "</table>";
if(isset($_POST['update'])){
$name=$_POST['name'];
$dept=$_POST['rno'];
$msg="hi";
echo $msg;
$Updatequery="UPDATE tasksp SET Name='$name',Dept='$dept',Email='$_POST[email]',Addr='$_POST[add]',Aboutme='$_POST[abm]',Password='$_POST[pswrd]' WHERE Rollno='$_POST[hidden]'";
mysql_query($Updatequery,$con);
}
}
/*if(isset($_POST['update'])){
	$msg="hi";
echo $msg;
$name=$_POST['name'];
$dept=$_POST['dept'];
$msg="hi";
echo $msg;
$Updatequery="UPDATE tasksp SET Name='$name',Dept='$dept',Email='$_POST[email]',Addr='$_POST[add]',Aboutme='$_POST[abm]',Password='$_POST[pswrd]' WHERE Rollno='$_POST[hidden]'";
mysql_query($Updatequery,$con);
}*/
//$dept1=$_POST['dept'];
//$email1=$_POST['email'];
//$Updatequery="UPDATE tasksp SET Dept='$_POST[dept]',Email='$_POST[email]' WHERE Dept='$_POST[hidden]'";
//mysql_query($Updatequery,$con);
//mysql_close($con);

/*if(isset($_POST['update'])){
//mysql_select_db("spider",$con);
//$Updatequery="UPDATE tasksp SET Name='$_POST[name]',Rollno='$_POST[rno]',Dept='$_POST[dept]',Email='$_POST[email]',Addr='$_POST[add]',Aboutme='$_POST[abm]',Password='$_POST[pswrd]' WHERE Rollno='$_POST[hidden]'";
//mysql_query($Updatequery,$con);
}
//$Updatequery="UPDATE tasksp SET Name='$_POST[name]',Rollno='$_POST[rno]',Dept='$_POST[dept]',Email='$_POST[email]',Addr='$_POST[add]',Aboutme='$_POST[abm]',Password='$_POST[pswrd]' WHERE Rollno='$_POST[hidden]'";
//$msg="hi";
//echo $msg;
//mysql_query($Updatequery,$con);
$sql = "SELECT * FROM tasksp WHERE Rollno='$_POST[rno]'";
echo"hi";
$myData=mysql_query($sql,$con);
echo"<table border=1>
<tr>
<th>NAME</th>
<th>ROLLNO</th>
<th>DEPT</th>
<th>EMAIL</th>
<th>ADDR</th>
<th>ABOUTME</th>
<th>PASSWORD</th>
</tr>";
$record = mysql_fetch_array($myData);
echo"<form action=spidertask2insert.php method=post>";
echo"<tr>";
echo "<td>" . "<input type=text name=name value=" . $record['name'] . " </td>";
echo "<td>" . "<input type=text name=rno value=" . $record['Rollno'] . " </td>";
echo "<td>" . "<input type=text name=dept value=" . $record['Dept'] . " </td>";
echo "<td>" . "<input type=text name=email value=" . $record['Email'] . " </td>";
echo "<td>" . "<input type=text name=add value=" . $record['Addr'] . " </td>";
echo "<td>" . "<input type=text name=abm value=" . $record['Aboutme'] . " </td>";
echo "<td>" . "<input type=text name=pswrd value=" . $record['Password'] . " </td>";
echo "<td>" . "<input type=hidden name=hidden value=" . $record['Rollno'] . " </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "</tr>";
echo "</table>";
//$Updatequery="UPDATE tasksp SET Name='$_POST[name]',Rollno='$_POST[rno]',Dept='$_POST[dept]',Email='$_POST[email]',Addr='$_POST[add]',Aboutme='$_POST[abm]',Password='$_POST[pswrd]' WHERE Rollno='$_POST[hidden]'";
//mysql_query($Updatequery,$con);
//$Updatequery="UPDATE tasksp SET Dept='$_POST[dept]',Email='$_POST[email]' WHERE Dept='$_POST[hidden]'";
//mysql_query($Updatequery,$con);	
mysql_close($con);*/

?>
</body>
</html>