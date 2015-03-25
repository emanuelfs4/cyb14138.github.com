<?php
session_start();

include "DBFunctions.php";

if (isset ($_POST['same'] )) {
  $_POST['delfirst'] = $_POST['firstname'];
  $_POST['dellast'] = $_POST['lastname'];
  $_POST['deladd1'] = $_POST['add1'];
  $_POST['deladd2'] = $_POST['add2'];
  $_POST['delcity'] = $_POST['city'];
  $_POST['delcounty'] = $_POST['county'];
  $_POST['delpostcode'] = $_POST['postcode'];
  $_POST['delphone'] = $_POST['phone'];
  $_POST['delemail'] = $_POST['email'];
}

?>
<html>
<head>
<title>Step 2 of 3 - Verify Order Accuracy</title>
</head>
<body>
Step 1 - Please Enter Invoice and Delivery Information<br>
<strong>Step 2 - Please Verify Accuracy and Make Any Necessary
     Changes</strong><br>
Step 3 - Order Confirmation and Receipt<br>

<form method="post" action="checkout3.php">
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
      <input type="text" name="firstname" maxlength="15"
        value="<?php echo $_POST['firstname']; ?> ">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Last Name</div>
    </td>
    <td width="50%">
      <input type="text" name="lastname" maxlength="50"
        value="<?php echo $_POST['lastname']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Invoice Address</div>
    </td>
    <td width="50%">
      <input type="text" name="add1" maxlength="50"
        value="<?php echo $_POST['add1']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Invoice Address 2</div>
    </td>
    <td width="50%">
      <input type="text" name="add2" maxlength="50"
        value="<?php echo $_POST['add2']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">City</div>
    </td>
    <td width="50%">
      <input type="text" name="city" maxlength="50"
        value="<?php echo $_POST['city']; ?> ">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">County</div>
    </td>
    <td width="50%">
      <input type="text" name="county" maxlength=50"
        value="<?php echo $_POST['county']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Post Code</div>
    </td>
    <td width="50%">
      <input type="text" name="postcode" maxlength="7" size="7"
        value="<?php echo $_POST['postcode']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Phone Number</div>
    </td>
    <td width="50%">
      <input type="text" name="phone" size="12" maxlength="12"
        value="<?php echo $_POST['phone']; ?>">
    </td>
  </tr>
   <tr>
    <td width="50%">
      <div align="right">E-Mail Address</div>
    </td>
    <td width="50%">
      <input type="text" name="email" maxlength="50"
        value="<?php echo $_POST['email']; ?>">
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
      <div align="right">First Name</div>
    </td>
    <td width="50%">
      <input type="text" name="delfirst" maxlength="15"
        value="<?php echo $_POST['delfirst']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Last Name</div>
    </td>
    <td width="50%">
      <input type="text" name="dellast" maxlength="50"
        value="<?php echo $_POST['dellast']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Delivery Address</div>
    </td>
    <td width="50%">
      <input type="text" name="deladd1" maxlength="50"
        value="<?php echo $_POST['deladd1']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Delivery Address 2</div>
    </td>
    <td width="50%">
      <input type="text" name="deladd2" maxlength="50"
        value="<?php echo $_POST['deladd2']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">City</div>
    </td>
    <td width="50%">
      <input type="text" name="delcity" maxlength="50"
         value="<?php echo $_POST['delcity']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">County</div>
    </td>
    <td width="50%">
      <input type="text" name="delcounty" maxlength="50"
        value="<?php echo $_POST['delcounty']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Post Code</div>
    </td>
    <td width="50%">
      <input type="text" name="delpostcode" maxlength="7" size="7"
        value="<?php echo $_POST['delpostcode']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">Phone Number</div>
    </td>
    <td width="50%">
      <input type="text" name="delphone" size="12" maxlength="12"
        value="<?php echo $_POST['delphone']; ?>">
    </td>
  </tr>
  <tr>
    <td width="50%">
      <div align="right">E-Mail Address</div>
    </td>
    <td width="50%">
      <input type="text" name="delemail" maxlength="50"
        value="<?php echo $_POST['delemail']; ?>">
    </td>
  </tr>
</table>

<hr>
<table border="1" align="left" cellpadding="5">
  <tr>
    <td>Quantity</td>
    <td>Item Image</td>
    <td>Item Name</td>
    <td>Price Each</td>
    <td>Line Price</td>
    <td></td>
    <td></td>
  </tr>
<?php

$sessid = session_id();
$conn = DBConnect();
$stid = DBExecute($conn, "SELECT * FROM carttemp, products WHERE products_prodnum = carttemp_prodnum and carttemp_sess = '$sessid'");
$total = 0;
while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
  echo "<tr><td>";
  echo $row['CARTTEMP_QUAN'];
  echo "</td>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" . $row['PRODUCTS_PRODNUM'] . "\">";
  echo "THUMBNAIL<br>IMAGE</td></a>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" .$row['PRODUCTS_PRODNUM'] . "\">";
  echo   $row['PRODUCTS_NAME'];
  echo "</td></a>";
  echo "<td align=\"right\">£";
  echo $row['PRODUCTS_PRICE'];
  echo "</td>";
  echo "<td align=\"right\">£";
  //get line price
  $lineprice = number_format($row['PRODUCTS_PRICE'] * $row['CARTTEMP_QUAN'], 2);
  echo $lineprice;
  echo "</td>";
  echo "<td>";
  echo "<a href=\"cart.php\">Make Changes to Cart</a>";
  echo "</td>";
  echo "</tr>";
  //add line price to total
  $total = $lineprice + $total;

}
?>
<tr>
<td colspan="4" align="right">Your total before shipping is:</td>
<td align="right">£ <?php echo number_format($total, 2); ?></td>
<td></td>
<td></td>
</tr>
</table>
<input type="hidden" name="total" value="<?php echo $total; ?>">
<p>
  <input type="submit" name="Submit" value="Send Order --&gt;">
</p>
</form>

</body>
</html>
