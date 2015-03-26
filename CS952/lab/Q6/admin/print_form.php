<html>
<head>
	<title> Administrator Interface </title>
	
	<link type="text/css" rel="stylesheet" href="../css/admin_php.css">
</head>

<body>

<h1> Administrator Interface</h1>
<p>

<div id="menu">
        <ul id="top">
          <li> <a href="./admin_show.php"> All Submissions </a></li>
          <li> <a href="./delete_form.php"> Delete </a></li>
          <li> <a href="./print_form.php"> Print </a></li>
        </ul>  
</div>

<div id="all_sub">

<form method="post" action="https://devweb2014.cis.strath.ac.uk/~cyb14138/CS952/lab/Q6/admin/print_view.php">

<table id="par_table_all">

<?php
    echo "<h2> Print</h2> ";
    echo "<tr>";
    echo "<th> Select </th> ";
    echo "<th> Name </th> ";
    echo "<th> Vehicle Registration </th> ";
    echo "<th> Application Date</th> ";
    echo "<th> Permit Date </th> ";
    echo "<th> Vehicle Type </th> ";
    echo "<th> Days </th> ";
    echo "<th> Priority Cases </th> ";
    echo "</tr>";


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


$sql = 'SELECT * FROM lab_parking_q6 ORDER BY name';


if (!($result = mysqli_query($conn, $sql))){
    die("Could not execute query!"); 
}

if(mysqli_num_rows($result) == 0){
    echo "<p> No rows found </p> ";
}else{

    echo "<tr>";
    echo "<br>";
    while($r=mysqli_fetch_assoc($result)){

        echo "<td><input type='radio' name='radio_table' value='".$r['vehicle_reg']."/".$r['days']."'></td>";

        echo "<td> " . $r['name'] ." </td>";
        echo "<td> " . $r['vehicle_reg'] ." </td>";
        echo "<td> " . $r['application_date'] ." </td>";
        echo "<td> " . $r['permit_date'] ." </td>";
        echo "<td> " . $r['vehicle_type'] ." </td>";
        echo "<td> " . $r['days'] ." </td>";
        echo "<td> " . $r['priority_cases'] ." </td>";
        echo "</tr>";
    }
    
}
mysqli_close($conn);
?>

</table>
</div>

<div class="div_bt_select">
  <button type="button" id="bt_submit" value="Submit" onclick="values()"> Print </input>
</div>  
</form>




<form action="../admin/admin_show.php">
  <div class="div_bt">
    <button id="bt_back"type="submit" value="Back"> Back </button>
  </div>  

</form>

<hr class="bottom_line">
<p id="signature"> Version 1.0 - <?php echo date('d/m/Y'); ?> - (C) University of Strathclyde / Emanuel Felipe 2015</p>
<script language="javascript" type="text/javascript" src="../js/q6_select.js"> </script>
</body>
</html>
