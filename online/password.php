<?php require'database.php'?>
<?php
session_start();
if(!isset($_SESSION['admin_id'])){
   header("Location:admin.php");
}
$admin_id = $_SESSION['admin_id'];
if(isset($_POST['Submit']))
{
 $oldpass=$_POST['opwd'];
 
 $newpassword=$_POST['npwd'];
$sql=mysqli_query($conn,"SELECT password FROM admin_users where password='$oldpass' && user_id='$admin_id'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($conn,"update admin_users set password='$newpassword' where user_id='$admin_id'");
echo"Password Changed Successfully !!";
}
else
{
echo"Old Password not match !!";
}
}
?>
<html>
<head>
<title>Change Password</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
function valid()
{
if(document.chngpwd.opwd.value=="")
{
alert("Old Password Filed is Empty !!");
document.chngpwd.opwd.focus();
return false;
}
else if(document.chngpwd.npwd.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.npwd.focus();
return false;
}
else if(document.chngpwd.cpwd.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.cpwd.focus();
return false;
}
else if(document.chngpwd.npwd.value!= document.chngpwd.cpwd.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.cpwd.focus();
return false;
}
return true;
}
</script>
</head>
<body style="background-color: #ccddff;">
<p style="color:black; text-align: center;font-family: serif;"><strong>Cajobportal.com</strong></p>
<p style="color:red; text-align: center;">Change Password Section</p>
<form name="chngpwd" action="" method="post" onSubmit="return valid();">
<table align="center">
<tr height="50">
<td>Old Password :</td>
<td><input type="password" style="border-radius: 50px; height: 27px; " name="opwd" id="opwd"></td>
</tr>
<tr height="50">
<td>New Password :</td>
<td><input type="password" style="border-radius: 50px;height: 27px;" name="npwd" id="npwd"></td>
</tr>
<tr height="50">
<td>Confirm Password :</td>
<td><input type="password" style="border-radius: 50px;height: 27px;" name="cpwd" id="cpwd"></td>
</tr>
<tr>
<td><a href="adminHome.php"a>Back to login Page</a></td>
<td><input type="submit" name="Submit" style="color: red;" value="Change Passowrd" /></td>
</tr>
 </table>
</form>
</body></html>