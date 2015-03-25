<?php
session_start();
?>
<html>
<head>
<title>Order report generaator</title>
</head>
<body>
<form method="post" action="report2.php">

<table width="300" border="1" align="left">
  <tr>
    <td colspan="2" bgcolor="#99FF00">
      <div align="center"><strong>Please enter your database username and password</strong></div>
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Username</div>
    </td>
    <td width="50%">
      <input type="text" name="username" maxlength="15">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Password</div>
    </td>
    <td width="50%">
      <input type="password" name="password" maxlength="50">
    </td>
  </tr>
<tr>
    <td width="50%">
    </td>
    <td width="50%">
      <input type="submit" name="Submit" 
    value="Submit">
    </td>
  </tr>

  </table>
<p>
  
</p>
</form>

 </body>
 </html>
