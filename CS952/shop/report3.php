<?php
include "DBFunctions.php"; 
$ordid = $_REQUEST['ordid'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$conn = MakeConn($username, $password);
$stmnt = DBExecute($conn, "SELECT * FROM orderdet, products where products_prodnum = orderdet_prodnum and orderdet_ordernum = '".$ordid."'");

?>
<html>
<head>
<title>Order details</title>
</head>
<body>
<div align="center">

<br><br>
<table width="600" border = "ON">
<tr><td>Quantity</td><td>Product</td><td>Price</td><td>Line price</td></tr>
<?php
$message ="";
while ($row = oci_fetch_array($stmnt, OCI_ASSOC)) {
  $message .= "<tr><td>";
  $message .= $row['ORDERDET_QTY'];
  $message .= "</td>";
  $message .="<td>";
  $message .= $row['PRODUCTS_NAME'];
  $message .= "</td>";
  $message .= "<td align=\"right\">£";
  $message .= $row['PRODUCTS_PRICE'];
  $message .= "</td>";
  $message .= "<td align=\"right\">£";
  //get line price
  $extprice = number_format($row['PRODUCTS_PRICE'] * $row['ORDERDET_QTY'], 2);
  $message .= $extprice;
  $message .= "</td>";
  $message .= "</tr>";
}
print $message;

?>
</table>
</div>
</body>
</html>

