<html>
<head>
    <title> Print </title>
    <link type="text/css" rel="stylesheet" href="../css/print_view.css">
</head>

<body>

<h1> Print </h1>

<div class="table_print">
<table id="par_table_print" style="width:100%">
<colgroup>
    <col width="50%">
    <col width="50%">
    
</colgroup>

<?php

$username = "cyb14138";
$password = "atestedi";
$database = "cyb14138";
$servername = "devweb2014.cis.strath.ac.uk";

if (!($conn = mysqli_connect($servername, $username, $password))) { 
    die("Problem connecting to database server"); 
}

if (!mysqli_select_db($conn, $database)){
    die("Unable to select database"); 
}



list($reg, $day) = explode('/', $_POST['radio_table']);


$sql_select = "SELECT * FROM lab_parking_q6 WHERE vehicle_reg ='" . $reg . "' AND days='" . $day . "'";

if (!($result = mysqli_query($conn, $sql_select))){
    echo "<p> Could not execute query! </p>";
    die(); 
}

if(mysqli_num_rows($result) == 0){
    echo "<p> No rows found </p> ";
}else{
    echo "<tr>";
    echo "<br>";
    while($r=mysqli_fetch_assoc($result)){
        echo "<tr> <th colspan='2'>Name</th> </tr> <tr><td colspan='2'> " . $r['name'] ." </td> <tr>";

        echo "<tr><th colspan='2'> Vehicle Registration </th> </tr> <tr> <td colspan='2'>" . $r['vehicle_reg'] ." </td></tr>";

        echo "<tr> <th colspan='1'> Application Date </th> <th colspan='1'> Start Permit Date </th>";
        
        echo "<tr> <td colspan='1'>" . $r['application_date'] ."</td> <td colspan='1'> " . $r['permit_date'] ." </td></tr>";

        echo "<tr> <th colspan='1'>Vehicle Type</th> <th colspan='1'> Day </th> </tr>";

        echo "<tr> <td> " . $r['vehicle_type'] ." </td> <td>" . $r['days'] ." </td><tr>";

        echo "<tr> <th colspan='2'> Priority Cases </th> <tr> <td colspan='2'>  " . $r['priority_cases'] ." </td></tr>";

        echo "</tr>";
    }
    
}

mysqli_close($conn);
//mail ($to , $subject ,$message );
?>         
</p>

</table>
</div>

<!--
<form action="../admin/print_form.php">
  <div class="div_bt">
    <button id="bt_back"type="submit" value="Print"> Print </button>
  </div>  

</form>
-->


<form action="../admin/print_form.php">
  <div class="div_bt">
    <button id="bt_back"type="submit" value="Back"> Back </button>
  </div>  

</form>


</body>
</html>