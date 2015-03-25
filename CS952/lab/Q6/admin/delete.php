<html>
<head>
    <title> Delete </title>
    <meta http-equiv="refresh" content="5;url=../admin/admin_show.php">
    <link type="text/css" rel="stylesheet" href="../css/admin_php.css">
</head>

<body>

<h1> Delete </h1>
<p> Row(s) deleted: </p>


<div id="table_delete">
<table id="par_table_delete">


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

$sql_delete = 'DELETE FROM lab_parking_q6 WHERE';

$sql = "";

if(!empty($_POST['name'])){ 

    $sql = $sql . " name = '" . $_POST['name'] . "'";

}

if( (!empty($_POST['name']) && !empty($_POST['vehicle'])) || (!empty($_POST['name']) && !empty($_POST['application_date']))
    || (!empty($_POST['name']) && !empty($_POST['permit_date'])) || (!empty($_POST['name']) && !empty($_POST['vehicle_type'])) 
    || (!empty($_POST['name']) && !empty($_POST['days'])) || (!empty($_POST['name']) && $_POST['priority_case'] != '-') ){
    $sql = $sql . " AND " ;    
}

if(!empty($_POST['vehicle'])){
    $sql = $sql . " vehicle_reg = '" . $_POST['vehicle'] . "'" ;
}


if( (!empty($_POST['vehicle']) && !empty($_POST['application_date'])) || (!empty($_POST['vehicle']) && !empty($_POST['permit_date'])) 
        || (!empty($_POST['vehicle']) && !empty($_POST['vehicle_type'])) || (!empty($_POST['vehicle']) && !empty($_POST['days'])) 
        || (!empty($_POST['vehicle']) && $_POST['priority_case'] != '-') ){
    $sql = $sql . " AND " ;    
}

if(!empty($_POST['application_date'])){

    $sql = $sql . " application_date = '" . $_POST['application_date'] . "'" ;
}

if( (!empty($_POST['application_date']) && !empty($_POST['permit_date'])) || (!empty($_POST['application_date']) && !empty($_POST['vehicle_type'])) 
        || (!empty($_POST['application_date']) && !empty($_POST['days'])) || (!empty($_POST['application_date']) && $_POST['priority_case'] != '-') ){
    $sql = $sql . " AND " ;    
}


if(!empty($_POST['permit_date'])){

    $sql = $sql . " permit_date = '" . $_POST['permit_date'] . "'" ;
}

if( (!empty($_POST['permit_date']) && !empty($_POST['vehicle_type'])) || (!empty($_POST['permit_date']) && !empty($_POST['days'])) 
    || (!empty($_POST['permit_date']) && $_POST['priority_case'] != '-') ){
    $sql = $sql . " AND " ;    
}


if(!empty($_POST['vehicle_type'])){

    $sql = $sql . " vehicle_type = '" . $_POST['vehicle_type'] . "'" ;
}

if( (!empty($_POST['vehicle_type']) && !empty($_POST['days'])) || (!empty($_POST['vehicle_type']) && $_POST['priority_case'] != '-')){
    $sql = $sql . " AND " ;    
}


if(!empty($_POST['days'])){

    $sql = $sql . " days = '" . $_POST['days'] . "'" ;

}


if(!empty($_POST['days']) && $_POST['priority_case'] != '-'){
    $sql = $sql . " AND " ;    
}

if($_POST['priority_case'] != '-'){

    $sql = $sql . " priority_cases = '" . $_POST['priority_case'] . "'" ;

}

$sql_delete =  $sql_delete . $sql;

echo "<tr>";
echo "<th> Name </th> ";
echo "<th> Vehicle Registration </th> ";
echo "<th> Application Date</th> ";
echo "<th> Permit Date </th> ";
echo "<th> Vehicle Type </th> ";
echo "<th> Days </th> ";
echo "<th> Priority Cases </th> ";
echo "</tr>";

if (!($result = mysqli_query($conn, $sql_delete))){
    echo " <p> Could not execute query! </p>"; 
}

mysqli_close($conn);
//mail ($to , $subject ,$message );
?>         

</p>

</table>
</div>

<p> Please wait!</p>
<p> You will be redirected in 5 seconds. </p>


</body>
</html>