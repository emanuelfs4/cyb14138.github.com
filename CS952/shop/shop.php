<?php
include "DBFunctions.php"; 

$conn = DBConnect();
$stmnt = DBExecute($conn, "SELECT * FROM PRODUCTS");

?>
<html>
<head>
<title>Product List</title>
</head>
<body>
<div align="center">
Thank you for visiting our site! Please see our list of 
products below, and click on the link for more information:
<br><br>
<table width="300">
<?php

// Show only Name, Price and Image
while ($row = oci_fetch_array($stmnt, OCI_ASSOC)) {
  echo "<tr><td align=\"center\">";
  echo "<a href=\"getprod.php?prodid=" . $row['PRODUCTS_PRODNUM'] . "\">";
 echo "<em>THUMBNAIL<br>IMAGE</em></a></td>";
  echo "<td>";
  echo "<a href=\"getprod.php?prodid=" . $row['PRODUCTS_PRODNUM'] . "\">";
  echo $row['PRODUCTS_NAME'];
  echo "</td></a>";
  echo "<td align=\"right\">";
  echo "<a href=\"getprod.php?prodid=" . $row['PRODUCTS_PRODNUM'] . "\">";
  echo "£" . $row['PRODUCTS_PRICE'];
  echo "</a></td></tr>";
}

?>
</table>
</div>
</body>
</html>
