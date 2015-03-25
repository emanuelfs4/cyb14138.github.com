<html>
<head>

	<title> Show All Parameters </title>
	
	<link type="text/css" rel="stylesheet" href="./q2_php.css">
</head>

<body>

<h1> Show All Parameters </h1>
<p>


<table id="par_table">

<?php
echo "<h3> GET </h3>";

if(empty($_GET)){
	echo "<p> none <p>";
}

echo "<h3> POST </h3>";

echo "<tr> <td> Name </td> <td> ". $_POST['name'] . "</td> </tr>";

echo "<tr> <td> Vehicle Registration </td> <td> ". $_POST['vehicle'] . "</td> </tr>";

echo "<tr> <td> Vehicle Type </td> <td> " . $_POST['vehicle_type'] . "</td> </tr>";
echo "<tr> <td> Days </td> <td>";
 
$cont = 1;
$days_out = "";

if(!empty($_POST['days'])) {
    foreach($_POST['days'] as $check) {

    	if($cont < count($_POST['days'])){
    		$days_out .= $check . ", ";
    		$cont++;
    	}else{
    		$days_out .= $check;
    	}
            

    }
}
echo $days_out;

echo "</td> </tr> ";
echo "<tr> <td> Priority Cases </td> <td>" . $_POST['priority_case'] . "</td> </tr>";



$to = "emanuelfs4@gmail.com";
$subject = "Parking Permit Registration";
$message = "";

$message .= "Name: ". $_POST['name']. "\n";
$message .= "Vehicle Registration: ". $_POST['vehicle'] . "\n";
$message .= "Vehicle Type: " . $_POST['vehicle_type']. "\n";
$message .= "Days: " . $days_out ."\n";
$message .= "Priority Cases: " . $_POST['priority_case'] . "\n";

mail ($to , $subject ,$message );

?>
</p>

</table>

<hr class="bottom_line">
<p id="signature"> Version 1.0 - <?php echo date('d/m/Y'); ?> - (C) University of Strathclyde / Emanuel Felipe 2015</p>
</body>
</html>
