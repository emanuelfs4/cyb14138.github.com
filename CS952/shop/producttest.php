<?php include "DBFunctions.php"; 

$conn = DBConnect();
$stmnt = DBExecute($conn, "SELECT * FROM products");

?>
<html>
<head>
<title>Product List</title>
</head>
<body>
<table >
  <tr>
    <td width="10%">Product Number</td>
    <td width="20%">Name</td>
    <td width="50%">Description</td>
    <td width="10%">Price</td>
    <td width="10%">Date Added</td>
  </tr>
<?php
while ($row = oci_fetch_array($stmnt, OCI_RETURN_NULLS)) {
    print '<tr>';
    $i = 0;
    foreach ($row as $item) {
         print '<td>'.$row[$i].'</td>';
	$i++;
    }
    print '</tr>';
  }
?>
</table>
</body>
</html>
