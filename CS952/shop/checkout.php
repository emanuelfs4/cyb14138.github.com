<?php
session_start();
?>
<html>
<head>
<title>Step 1 of 3 - Invoice and Delivery Information</title>
</head>
<body>
<strong>Order Checkout</strong><br>
<strong>Step 1 - Please Enter Invoice and Delivery 
  Information</strong><br>
Step 2 - Please Verify Accuracy of Order Information and Send Order<br>
Step 3 - Order Confirmation and Receipt<br>

<form method="post" action="checkout2.php">

<table width="300" border="1" align="left">
  <tr>
    <td colspan="2" bgcolor="#99FF00">
      <div align="center"><strong>Invoice Information</strong></div>
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">First Name</div>
    </td>
    <td width="50%">
      <input type="text" name="firstname" maxlength="15">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Last Name</div>
    </td>
    <td width="50%">
      <input type="text" name="lastname" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Invoice Address</div>
    </td>
    <td width="50%">
      <input type="text" name="add1" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Invoice Address 2</div>
    </td>
    <td width="50%">
      <input type="text" name="add2" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">City</div>
    </td>
    <td width="50%">
      <input type="text" name="city" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">County</div>
    </td>
    <td width="50%">
      <input type="text" name="county" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Post Code</div>
    </td>
    <td width="50%">
      <input type="text" name="postcode" maxlength="7" size="7">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Phone Number</div>
    </td>
    <td width="50%">
      <input type="text" name="phone" size="12" maxlength="12">
    </td>
  </tr>
   <tr>
    <td width="50%">
      <div align="right">E-Mail Address</div>
    </td>
    <td width="50%">
      <input type="text" name="email" maxlength="50">
    </td>
  </tr>
</table>
<table width="300" border="1">
  <tr bgcolor="#CCFFFF">
    <td colspan="2">
      <div align="center"><strong>Delivery Information</strong></div>
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Delivery Info same as Invoice</div>
    </td>
    <td width="50%">
      <input type="checkbox" name="same">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">First Name</div>
    </td>
    <td width="50%">
      <input type="text" name="delfirst" maxlength="15">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Last Name</div>
    </td>
    <td width="50%">
      <input type="text" name="dellast" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Delivery Address</div>
    </td>
    <td width="50%">
      <input type="text" name="deladd1" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Delivery Address 2</div>
    </td>
    <td width="50%">
      <input type="text" name="deladd2" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">City</div>
    </td>
    <td width="50%">
      <input type="text" name="delcity" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">County</div>
    </td>
    <td width="50%">
      <input type="text" name="delcounty" maxlength="50">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Post Code</div>
    </td>
    <td width="50%">
      <input type="text" name="delpostcode" maxlength="7" size="7">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Phone Number</div>
    </td>
    <td width="50%">
      <input type="text" name="delphone" size="12" maxlength="12">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">E-Mail Address</div>
    </td>
    <td width="50%">
      <input type="text" name="delemail" maxlength="50">
    </td>
  </tr>
</table>
<p>
  <input type="submit" name="Submit" 
    value="Proceed to Next Step --&gt;">
</p>
</form>

 </body>
 </html>
