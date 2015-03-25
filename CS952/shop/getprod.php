<?php
include "DBFunctions.php"; 

session_start();


//get the product id passed through the URL
$prodid = $_REQUEST['prodid'];

$conn = DBConnect();
//get information on the specific product we want
$stid = DBExecute($conn, "SELECT * FROM products WHERE products_prodnum='$prodid'");

while ($row = oci_fetch_array($stid, OCI_ASSOC)) {

?>
<html>
<head>
<title><?php echo $row['PRODUCTS_NAME']; ?></title>
</head>
<body>
<div align="center">
<table cellpadding="5" width="80%">
  <tr>
    <td>PRODUCT IMAGE</td>
    <td><strong><?php echo $row['PRODUCTS_NAME']; ?></strong><br>
      <?php echo $row['PRODUCTS_PRODDESC']; ?><br \>
      <br>Product Number: <?php echo $row['PRODUCTS_PRODNUM']; ?>
      <br>Price: £<?php echo $row['PRODUCTS_PRICE']; ?><br>
      <form method="POST" action="modcart.php?action=add">
        Quantity: <input type="text" name="qty" size="2"><br>
        <input type="hidden" name="products_prodnum" 
          value="<?php echo $row['PRODUCTS_PRODNUM'] ?>">
        <input type="submit" name="Submit" value="Add to cart">
      </form>

      <form method="POST" action="cart.php">
        <input type="submit" name="Submit" value="View cart">
      </form>
    </td>
  </tr>
</table>
<?php 
}
?>
<hr width="200">
<p><a href="shop.php">Go back to the main page</a></p>
</div>
</body>
</html>
