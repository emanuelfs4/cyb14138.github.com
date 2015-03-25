<?php
if (!session_id()) {
  session_start();
}
include_once "DBFunctions.php"; 
?>
<html>
<head>
<title>Here is Your Shopping Cart!</title>
</head>
<body>
<div align="center">
You currently have

<?php
$sessid = session_id();
$conn = DBConnect();
//display number of products in cart 
$stid = DBExecute($conn,"SELECT count(*) FROM carttemp WHERE carttemp_sess = '$sessid'");

$row = oci_fetch_array($stid, OCI_BOTH);
echo $row[0];
$query = "SELECT * FROM carttemp, products WHERE carttemp_prodnum = products_prodnum and carttemp_sess = '$sessid'";
$stid = DBExecute($conn,$query);
?>

product(s) in your cart.<br>

<table border="1" align="center" cellpadding="5">
  <tr>
    <td>Quantity</td>
    <td>Item Image</td>
    <td>Item Name</td>
    <td>Price Each</td>
    <td>Line Price</td>
    <td></td>
    <td></td>
<?php
$total = 0;
while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
  echo "<tr>"; 
 $carttemp_hidden = $row['CARTTEMP_HIDDEN'];
 $carttemp_quan=$row['CARTTEMP_QUAN'];
  echo "<td>
          <form method=\"POST\" action=\"modcart.php?action=change\">
            <input type=\"hidden\" name=\"modified_hidden\"
              value=\"$carttemp_hidden\">
            <input type=\"text\" name=\"modified_quan\" size=\"2\"
              value=\"$carttemp_quan\">";
  echo "</td>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" . $row['PRODUCTS_PRODNUM'] . "\">";
  echo "THUMBNAIL<br>IMAGE</a></td>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" . $row['PRODUCTS_PRODNUM'] . "\">";
  echo $row['PRODUCTS_NAME'];
  echo "</a></td>";
  echo "<td align=\"right\">£";
  echo $row['PRODUCTS_PRICE'];
  echo "</td>";
  echo "<td align=\"right\">£";
  //get line price
  $lineprice = number_format($row['PRODUCTS_PRICE'] * $row['CARTTEMP_QUAN'], 2);
  echo $lineprice;
  echo "</td>";
  echo "<td>";
  echo "<input type=\"submit\" name=\"Submit\"
          value=\"Change Qty\">
        </form></td>";
  echo "<td>";
  echo "<form method=\"POST\" action=\"modcart.php?action=delete\">
        <input type=\"hidden\" name=\"modified_hidden\"
          value=\"$carttemp_hidden\">";
  echo "<input type=\"submit\" name=\"Submit\"
          value=\"Delete Item\">
        </form></td>";
  echo "</tr>";
  //add line price to total
  $total = $lineprice + $total;

}
?>
  <tr>
    <td colspan=\"4\" align=\"right\">
      Your total before shipping is:</td>
    <td align=\"right\">£ <?php echo number_format($total, 2); ?></td>
    <td></td>
    <td>
<?php
echo "<form method=\"POST\" action=\"modcart.php?action=empty\">
        <input type=\"hidden\" name=\"carttemp_hidden\"
          value=\"";
if (isset($carttemp_hidden)) {
  echo $carttemp_hidden;
}
echo "\">";
echo "<input type=\"submit\" name=\"Submit\" value=\"Empty Cart\">
      </form>";
?>

</td>
</tr>
</table>
<form method="POST" action="checkout.php">
<input type="submit" name="Submit" value="Proceed to Checkout">
</form>
<a href="shop.php">Go back to the main page</a>
</div>
</body>
</html>
