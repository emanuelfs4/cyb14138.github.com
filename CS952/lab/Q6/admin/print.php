<html>
<head>
    <title> Delete </title>
    <link type="text/css" rel="stylesheet" href="../css/admin_php.css">
</head>

<body>

<h1> Print </h1>

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


echo "<tr>";
echo "<th> Name </th> ";
echo "<th> Vehicle Registration </th> ";
echo "<th> Application Date</th> ";
echo "<th> Permit Date </th> ";
echo "<th> Vehicle Type </th> ";
echo "<th> Days </th> ";
echo "<th> Priority Cases </th> ";
echo "</tr>";


$sql_select = 'SELECT * FROM lab_parking_q6 WHERE ';

$sql_select = $sql_select . $sql; 

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
//mail ($to , $subject ,$message );
?>         
</p>

</table>
</div>

<form action="../admin/print_view.php">
  <div class="div_bt">
    <button id="bt_back"type="submit" value="Print"> Print </button>
  </div>  

</form>



<form action="../admin/print_form.php">
  <div class="div_bt">
    <button id="bt_back"type="submit" value="Back"> Back </button>
  </div>  

</form>


</body>
</html>