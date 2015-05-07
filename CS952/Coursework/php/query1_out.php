<html>
<head>
	<title> Temporary Building Unit System </title>
	
	<link type="text/css" rel="stylesheet" href="../css/admin_php.css">
</head>

<body>

<h1> Temporary Building Unit System </h1>
<p>


<div id="menu">
        
        <ul id="top">
          <li>
          <a href="index.html"> 
          <img src="http://i.ytimg.com/vi/q23SNNbmp0A/hqdefault.jpg" width="45" height="35">
          </a>
          </li>
          
          
          <li> <a href="../index.html"> Home </a></li>
          <li> <a href="query1.php"> Query 1 </a></li>
          <li> <a href="query2.php"> Query 2 </a></li>
          <li> <a href="query3.php"> Query 3 </a></li>
          <li> <a href="query4.php"> Query 4 </a></li>
        </ul>  
</div>
<div id="table_all">
  <h2> Employees </h2>
<table id="par_table">

<?php

//CHECK IF SOMETHING WAS WRITTEN ON THE NAME BOX


    echo "<tr>";
    echo "<th> Employee Number </th> ";
    echo "<th> Name </th> ";
    echo "<th> Address</th> ";
    echo "<th> Telephone </th> ";
    echo "<th> Unit Number </th> ";
    echo "<th> Zooning </th> ";
    echo "<th> Unit Area (m2)</th> ";
    echo "</tr>";
/*
    echo "<tr>";
    
    echo "<th> Supervisor Number </th> ";
    echo "<th> Name </th> ";
    echo "</tr>";
*/

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


$value = $_POST['area'];


$sql = 'SELECT DISTINCT  E.employee_number, E.name, E.address, E.telephone, U.unit_number, U.zoning , U.area FROM cw_employee E, cw_manages M, cw_site S, cw_occurs O, cw_unit U WHERE E.employee_number = M.employee_number AND M.site_number = S.site_number AND S.site_number = O.site_number AND O.unit_number = U.unit_number AND  U.area > '. $value . ' GROUP BY U.unit_number ORDER BY E.employee_number';

//$sql = 'SELECT DISTINCT S.supervisor_number, E.name FROM employee S, employee E WHERE S.supervisor_number = E.employee_number AND S.supervisor_number IS NOT NULL ORDER BY S.supervisor_number' ;
            
if (!($result = mysqli_query($conn, $sql))){
    die("Could not execute query!"); 
}

if(mysqli_num_rows($result) == 0){
    echo "<p> No rows found </p> ";
}else{

    echo "<tr>";
    echo "<br>";
    while($r=mysqli_fetch_assoc($result)){
        
        echo "<td> " . $r['employee_number'] ." </td>";
        echo "<td> " . $r['name'] ." </td>";
        echo "<td> " . $r['address'] ." </td>";
        echo "<td> " . $r['telephone'] ." </td>";
        echo "<td> " . $r['unit_number'] ." </td>";
        echo "<td> " . $r['zoning'] ." </td>";
        echo "<td> " . $r['area'] ." </td>";
        echo "</tr>";
        

        /*
        echo "<td> " . $r['employee_number'] ." </td>";
        echo "<td> " . $r['name'] ." </td>";
        echo "<td> " . $r['address'] ." </td>";
        echo "<td> " . $r['telephone'] ." </td>";
        echo "<td> " . $r['supervisor_number'] ." </td>";
        echo "</tr>";
        */
    }
    
}


//$sql = 'DELETE * FROM lab_parking_q6 WHERE ';




mysqli_close($conn);


//mail ($to , $subject ,$message );



?>


</p>

</table>
</div>

<form action="./query1.php">
  <div class="div_bt">

    <button id="bt_back"type="submit" value="Back"> Back </button>

  </div>  

</form>

 
<hr class="bottom_line">
<p id="signature"> Version 1.0 - <?php echo date('d/m/Y'); ?> - (C) University of Strathclyde / Emanuel Felipe 2015</p>


<script language="javascript" type="text/javascript" src="../js/query4.js"> </script>

</body>
</html>
