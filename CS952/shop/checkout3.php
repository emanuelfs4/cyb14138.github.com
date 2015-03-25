<?php

if (empty ($_POST['firstname'])||
empty ($_POST['lastname'] )||
empty ($_POST['firstname'] )||
empty ($_POST['add1'] )||
empty ($_POST['add2'] )||
empty ($_POST['city'] )||
empty ($_POST['county'] )||
empty ($_POST['postcode'] )||
empty ($_POST['phone'] )||
empty ($_POST['email'] )||
empty ($_POST['delfirst'] )||
empty ($_POST['dellast'] )||
empty ($_POST['deladd1'] )||
empty ($_POST['deladd2'] )||
empty ($_POST['delcity'] )||
empty ($_POST['delcounty'] )||
empty ($_POST['delpostcode'] )||
empty ($_POST['delcounty'] )||
empty ($_POST['delphone'] )||
empty ($_POST['delemail'] ))
  echo "Some fields are empty. Press the back button on your browser, complete the fields and try again" ;
else
{
  session_start();
  include "DBFunctions.php";

  //Let's make the variables easy to access in our queries
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $firstname = $_POST['firstname'];
  $add1 = $_POST['add1'];
  $add2 = $_POST['add2'];
  $city = $_POST['city'];
  $county = $_POST['county'];
  $postcode = $_POST['postcode'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $delfirst = $_POST['delfirst'];
  $dellast = $_POST['dellast'];
  $deladd1 = $_POST['deladd1'];
  $deladd2 = $_POST['deladd2'];
  $delcity = $_POST['delcity'];
  $delcounty = $_POST['delcounty'];
  $delpostcode = $_POST['delpostcode'];
  $delcounty = $_POST['delcounty'];
  $delphone = $_POST['delphone'];
  $delemail = $_POST['delemail'];
  $total = $_POST['total'];
  $sessid = session_id();
  $today = date("d-m-y");

  $conn = DBConnect();
//1) Assign Customer Number to new Customer, or find existing customer number
$query = "SELECT count(*) FROM customers WHERE
          (customers_firstname = '$firstname' AND
          customers_lastname = '$lastname' AND
          customers_add1 = '$add1' AND
          customers_add2 = '$add2' AND
          customers_city = '$city')";
$stid = DBExecute($conn, $query);
$row = oci_fetch_array($stid, OCI_BOTH);

if ($row[0] < 1) {
  //assign new custnum
   $stid = DBExecute($conn,"select cust_seq.nextval from dual");
   $cust_seq = oci_fetch_array($stid, OCI_BOTH);
   $custid = $cust_seq[0];
  $query = "INSERT INTO customers (
             customers_custnum, customers_firstname, customers_lastname, customers_add1,
             customers_add2, customers_city, customers_county, 
             customers_postcode, customers_phone, 
             customers_email)
             VALUES (
            '$custid',
            '$firstname',
            '$lastname',
            '$add1',
            '$add2',
            '$city',
            '$county',
            '$postcode',
            '$phone',
            '$email')";
  $stid = DBExecute($conn, $query);
}
else
{
   //If custid exists, we want to make it equal to custnum
   //Otherwise we will use the existing custnum
   $query = "SELECT customers_custnum FROM customers WHERE
          (customers_firstname = '$firstname' AND
          customers_lastname = '$lastname' AND
          customers_add1 = '$add1' AND
          customers_add2 = '$add2' AND
          customers_city = '$city')";
   $stid = DBExecute($conn, $query);
   $row = oci_fetch_array($stid, OCI_BOTH);
   $custid = $row['CUSTOMERS_CUSTNUM'];
}
//2) Insert Info into ordermain
//determine delivery costs based on order total (25% of total)
$delivery = $total * 0.25;
$tax = ($total+$delivery)*(17.5/117.5);
$gtotal = $total+$delivery;
$stid = DBExecute($conn,"select ord_seq.nextval from dual");
$ord_seq = oci_fetch_array($stid, OCI_BOTH);
$ordid = $ord_seq[0];
$query = "INSERT INTO ordermain (
           ordermain_ordernum,
           ordermain_orderdate, ordermain_custnum,
           ordermain_subtotal,ordermain_delivery,
           ordermain_tax, ordermain_total,
           ordermain_delfirst, ordermain_dellast,
           ordermain_deladd1, ordermain_deladd2,
           ordermain_delcity, ordermain_delcounty,
           ordermain_delpostcode, ordermain_delphone,
           ordermain_delemail)
           VALUES (
           '$ordid',
           to_date('$today','DD-MM-YYYY'),
           '$custid',
           '$total',
           '$delivery',
	     '$tax',
           '$gtotal',
           '$delfirst',
           '$dellast',
           '$deladd1',
           '$deladd2',
           '$delcity',
           '$delcounty',
           '$delpostcode',
           '$delphone',
           '$delemail')";

$stid = DBExecute($conn, $query);

//3) Insert Info into orderdet
//find the correct cart information being temporarily stored
$stid2 = DBExecute($conn, "SELECT * FROM carttemp WHERE carttemp_sess='$sessid'");

//put the data into the database one row at a time
while ($row = oci_fetch_array($stid2, OCI_ASSOC)) {
  $quant = $row['CARTTEMP_QUAN'];
  $prodnum = $row['CARTTEMP_PRODNUM'];
  // In the following statement you need to write an INSERT statement in place of the text.
  // It will have the form: INSERT INTO tablename (attribute list) VALUES (value list)
  // The values that you need to insert are:
  // the foreign key value from the ordermain table in a variable called $ordid, 
  // the quantity ordered (in a variable $quant) and the 
  // foreign key value from the product table to indicate the product ordered ($prodnum)
  // First check the table to find the names of the attributes you need to insert.
  // Why don't you need to provide a primary key value for the order details table? (Hint:
  // have a look in autoinc.sql again.)
  // The VALUES clause of this statement needs to look something like:
  // VALUES ('". $var1."','". $var2."','". $var3."')";
  // where $var1 etc are substituted by the names of the variables you want to place in
  // the database. Be careful to get the punctuation right. The inverted commas
  // delimit strings and the periods concatenate bits of strings.
  // When you are happy that you have a complete insert statement, save this file then
  // execute it by starting at shop.php, adding at least one product to the cart and then 
  // checking out. If you receive an error message instead of the confirmation, correct the 
  // text of the insert statement, save the file again, press the back button on your
  // browser (click OK to agree to resend the data) then select the "Send Order" button
  // again.
  $query = "INSERT INTO orderdet (orderdet_ordernum, orderdet_qty, orderdet_prodnum) VALUES ('$ordid','$quant','$prodnum')";
  $stid3 = DBExecute($conn, $query);
}

//4)delete from temporary table
$query = "DELETE FROM carttemp WHERE carttemp_sess='$sessid'";
$stid = DBExecute($conn, $query);
$stid = DBExecute($conn, "commit");
//5)email confirmations to us and to the customer
/* recipients */
$to = "<" . $email .">";

/* subject */
$subject = "Order Confirmation";

/* message */
  /* top of message */
  $message = "
    <html>
    <head>
    <title>Order Confirmation</title>
    </head>
    <body>
    Here are the details of your order:<br><br>
    Order date: ";
  $message .= $today;
  $message .= "
    <br>
    Order Number: ";
  $message .= $ordid;
  $message .= "
    <table width=\"50%\" border=\"0\">
      <tr>
        <td>
          <p>Invoice to:<br>";
  $message .= $firstname;
  $message .= " ";
  $message .= $lastname;
  $message .= "<br>";
  $message .= $add1;
  $message .= "<br>";
  if ($add2) {
    $message .= $add2 . "<br>";
  }
  $message .= $city . ", " . $county . "  " . $postcode;
  $message .= "</p></td>
    <td>
      <p>Deliver to:<br>";
  $message .= $delfirst . " " . $dellast;
  $message .= "<br>";
  $message .= $deladd1 . "<br>";
  if ($deladd2) {
    $message .= $deladd2 . "<br>";
  }
  $message .= $delcity . ", " . $delcounty . "  " . $delpostcode;
  $message .= "</p>
        </td>
      </tr>
    </table>
    <hr width=\"250px\" align=\"left\">
    <table cellpadding=\"5\">";

//grab the contents of the order and insert them
//into the message field
//OK - HOW DO I GET ORDERID?
$query = "SELECT * FROM orderdet , products WHERE orderdet_prodnum = products_prodnum and orderdet_ordernum = '$ordid'";

$stid = DBExecute($conn, $query);

while ($row = oci_fetch_array($stid, OCI_ASSOC)) {
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

  $message .= "<tr>
    <td colspan=\"3\" align=\"right\">
      Your total before delivery is:
    </td>
    <td align=\"right\">£";
  $message .= number_format($total, 2);
  $message .= "
      </td>
    </tr>
    <tr>
      <td colspan=\"3\" align=\"right\">
        delivery Costs:
      </td>
      <td align=\"right\">£";
  $message .= number_format($delivery, 2);
  $message .= "
      </td>
    </tr>
    <tr>
      <td colspan=\"3\" align=\"right\">
        Your final total is:
      </td>
      <td align=\"right\">£";
  $message .= number_format(($total + $delivery), 2);
  $message .= "
        </td>
      </tr>
    </table>
    </body>
    </html>";

/* headers */
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
$headers .= "From: <storeemail@email.com>\r\n";
$headers .= "Cc: <storeemail@email.com>\r\n";
$headers .= "X-Mailer: PHP / ".phpversion()."\r\n";

/* mail it */
//mail($to, $subject, $message, $headers);


//6)show them their order & give them an order number

echo "Step 1 - Please Enter Account and Delivery Information<br>";
echo "Step 2 - Please Verify Accuracy and Make Any Necessary Changes<br>";
echo "<strong>Step 3 - Order Confirmation and Receipt</strong><br><br>";

echo $message;
}
?>
