<html>
<head>

	<title> Show All Parameters </title>
	
	<link type="text/css" rel="stylesheet" href="./q4_php.css">
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


//CHECK IF SOMETHING WAS WRITTEN ON THE NAME BOX
if(!empty($_POST['name'])){
    echo "<tr> <td> Name </td> <td> ". $_POST['name'] . "</td> </tr>";
}else{
    echo  "<tr> <td> Name </td> <td> ". "Name is not complete.". "</td> </tr>";
}

if(!empty($_POST['vehicle'])){
    
    if(preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{3}$/', $_POST['vehicle'] ) ){
        echo "<tr> <td> Vehicle Registration </td> <td> ". $_POST['vehicle'] . "</td> </tr>";
    } else{
        echo "<tr> <td> Vehicle Registration </td> <td> ". "You must insert a valid plate number." . "</td> </tr>";
    }
    

}else{
     echo "<tr> <td> Vehicle Registration </td> <td> ". "Vehicle is not complete." . "</td> </tr>";   
}



if(!empty($_POST['vehicle_type'])){
    echo "<tr> <td> Vehicle Type </td> <td> " . $_POST['vehicle_type'] . "</td> </tr>";
}else{
    echo "<tr> <td> Vehicle Type </td> <td> " . "You must select at least one vehicle type." . "</td> </tr>";
}


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
    echo $days_out;
}else{
    echo "You must select at least one day.";
}


echo "</td> </tr> ";

if(!empty($_POST['priority_case']) && $_POST['priority_case'] != '-'){
    echo "<tr> <td> Priority Cases </td> <td>" . $_POST['priority_case'] . "</td> </tr>";
}else{
    echo "<tr> <td> Vehicle Type </td> <td> " . "You must select one priority case." . "</td> </tr>";
}




$to = "emanuelfs4@gmail.com";
$subject = "Parking Permit Registration";
$message = "";

$message .= "Name: ". $_POST['name']. "\n";
$message .= "Vehicle Registration: ". $_POST['vehicle'] . "\n";
//$message .= "Vehicle Type: " . $_POST['vehicle_type']. "\n";
$message .= "Days: " . $days_out ."\n";
$message .= "Priority Cases: " . $_POST['priority_case'] . "\n";



//Inserting on the database.
$username = "cyb14138";
$password = "atestedi";
$database = "cyb14138";
$servername = "devweb2014.cis.strath.ac.uk";

if(!empty($_POST['name']) && !empty($_POST['vehicle']) && !empty($_POST['vehicle_type']) && !empty($_POST['days']) && !empty($_POST['priority_case']) ){
    
    if (!($conn = mysqli_connect($servername, $username, $password))) { 
        die("Problem connecting to database server"); 
    }

    if (!mysqli_select_db($conn, $database)){
        die("Unable to select database"); 
    }


    if(!empty($_POST['days'])) {
        foreach($_POST['days'] as $check) {
                $sql = "INSERT INTO lab_parking (name, vehicle_reg, vehicle_type, days, priority_cases) VALUES (";

                if( ctype_upper( str_replace(' ', '', $_POST['name']) ) ){
                    $str = ucwords(strtolower($_POST['name']));
                    $sql .= "'" . $str . "', ";
                }else{
                    $sql .= "'" . $_POST['name'] . "', ";
                }

                if(preg_match('^[A-Z]{2}[0-9]{2}\s{1}[A-Z]{3}$', $_POST['vehicle'] ) ){
                    $sql .= "'" . $_POST['vehicle'] . "', ";
                }else{
                    echo "Insert a valid plate number.";
                }

                $sql .= "'" . $_POST['vehicle_type'] . "', ";
                $sql .= "'" . $check . "', ";
                $sql .= "'" . $_POST['priority_case'] . "')"; 

                //echo $sql;
                //echo mysql_error();
                
                if (!($result = mysqli_query($conn, $sql))){
                    die("Could not execute query!"); 
                }
                
                $sql = "";
        }
    }



    mysqli_close($conn);

}else{
    echo "Nothing will be stored because you haven't filled all the form.";
}

//mail ($to , $subject ,$message );



?>
</p>

</table>

<hr class="bottom_line">
<p id="signature"> Version 1.0 - <?php echo date('d/m/Y'); ?> - (C) University of Strathclyde / Emanuel Felipe 2015</p>
</body>
</html>
