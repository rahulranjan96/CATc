<?php
require 'core.php';
require 'conn.php';
if(!loggedin())
{
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['password_again'])&&isset($_POST['firstname'])&&isset($_POST['surname']))
{
$username = $_POST['username'];
$password = $_POST['password'];
$password_hash = md5($password);
$password_again = $_POST['password_again'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
if(!empty($username)&&!empty($password)&&!empty($password_again)&&!empty($firstname)&&!empty($surname))
{
if($password!=$password_again)
{
	echo "passwords do not match";
}
else 
{
$query = "SELECT `username` FROM `USERS` WHERE `username`='$username'";
$query_run = mysql_query($query);
if(mysql_num_rows($query_run)==1)
{
echo "Username already exists";
}
else
{
$query = "INSERT INTO `users` VALUES('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($password_hash)."','".mysql_real_escape_string($firstname)."','".mysql_real_escape_string($surname)."')";
if($query_run = mysql_query($query))
{
header('Location: register_success.php');
}
}
}
}
else 
echo "fill all the boxes";
}


?>
<form action="register.php" method="POST">
Username:<input type="text" name="username"><br>
Password:<input type="password" name="password"><br>
Password_again:<input type="password" name="password_again"><br>
Firstname:
<input type="text" name="firstname"><br>
Surname:
<input type="text" name="surname"><br>
<input type="submit" value="REGISTER">

</form>
<?php
}
else if(loggedin())
{
echo "you are already reistered";
}
?>