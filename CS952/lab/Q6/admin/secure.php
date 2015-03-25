<html>
<head>
	<style>
		*{
			text-align: center;
		}
		
		table{
			margin-left: auto;
			margin-right: auto;
			border: 1px solid black;
			padding: 10px;
		}

		tr > td:first-child{
			text-align: right;
			font-weight: bold;
		}

		#submit{
			margin-top: 10px;
		}
	</style>
</head>

<body>
<h2> Login </h2> 
<div id="login"> 
<form action="<?php echo $_SERVER['PHP_SELF']; ?>?p=login" method="post">

	<table id="tb_login">
		
		<tr>
			<td><label> Name</label> </td>
			<td><input type="text" name="user" id="user" /></td>
		</tr>	

		<tr>
			<td> <label> Password</label></td>
			<td><input type="password" name="keypass" id="keypass" /></td>
		</tr>	

		
		
	</table>
	<input type="submit" id="submit" value="Login" />
</form>
</div>

<?php
$username = "admin";
$password = "admin";
$nonsense = "supercalifragilisticexpialidocious";

if (isset($_COOKIE['PrivatePageLogin'])) {
   if ($_COOKIE['PrivatePageLogin'] == md5($password.$nonsense)) {
      exit;
   } else {
      echo "Bad Cookie.";
      exit;
   }

}

if (isset($_GET['p']) && $_GET['p'] == "login") {
   if ($_POST['user'] != $username) {
   	  
   	  echo "Sorry, that username does not match.";
      exit;

   } else if ($_POST['keypass'] != $password) {
	  
	  echo "Sorry, that password does not match.";
      exit;

   } else if ($_POST['user'] == $username && $_POST['keypass'] == $password) {
	//      setcookie('PrivatePageLogin', md5($_POST['keypass'].$nonsense));
      header("Location: admin_show.php");

   } else {

	   echo "Sorry, you could not be logged in at this time.";
   }
}
?>
</body>
</html>