<?php
if (empty ($_POST['username'])||
empty ($_POST['password'] ))
{echo "Select Back and reenter username and password";}
else
   {
include "DBFunctions.php"; 
$username = $_POST['username'];
$password = $_POST['password'];
$conn = MakeConn($username, $password);
//This query needs to join the tables ordermain and customers and retrieve all the attributes.
$stmnt = DBExecute($conn, "SELECT OM.ORDERMAIN_ORDERNUM, OM.ORDERMAIN_ORDERDATE, OM.ORDERMAIN_CUSTNUM,C.CUSTOMERS_FIRSTNAME,C.CUSTOMERS_LASTNAME FROM ORDERMAIN OM, CUSTOMERS C WHERE C.CUSTOMERS_CUSTNUM = OM.ORDERMAIN_CUSTNUM");

?>
<html>
<head>
<title>Order summaries</title>
</head>
<body>
<div align="center">
Please select the order for which to display the report
<br><br>
<table width="600">
<?php
echo "<tr><td align=\"center\">";
  echo "Order number";
  echo "<td>";
  echo "Date";
  echo "</td>";
  echo "<td align=\"right\">";
  echo  "Customer Number";
  echo "</td>";
  echo "<td align=\"right\">";
  echo "Customer Firstname";
  echo "</td>";
  echo "<td align=\"right\">";
  echo  "Customer Lastname";
  echo "</td></tr>";

while ($row = oci_fetch_array($stmnt, OCI_ASSOC)) {
  echo "<tr><td align=\"center\">";
  echo "<a href=\"report3.php?ordid=" . $row['ORDERMAIN_ORDERNUM']. "&username=".$username."&password=".$password."\">";
  echo $row['ORDERMAIN_ORDERNUM'];
  echo "</a><td>";
 //echo "</td></a>";
  echo $row['ORDERMAIN_ORDERDATE'];
  echo "</td>";
  echo "<td align=\"right\">";
  echo  $row['ORDERMAIN_CUSTNUM'];
  echo "</td>";
  echo "<td align=\"right\">";
  echo $row['CUSTOMERS_FIRSTNAME'];
  echo "</td>";
  echo "<td align=\"right\">";
  echo  $row['CUSTOMERS_LASTNAME'];
  echo "</td></tr>";
}

?>
</table>
</div>
</body>
</html>
<?php
}
?>
