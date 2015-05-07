<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="UTF-8">

<title>TBUS | Temporary Building Unit System</title>

<link rel="stylesheet" href="../css/layout.css" type="text/css" media="all">


<body data-feedly-mini="yes">

 <div class="top">

  <header id="header">
    <div id="top_header">
      <h1>TBUS</h1>
      <h2>Temporary Building Unit System</h2>
    </div>
    
    <nav id="topnav">
      <ul><li><a href="../index.php" title="Home">Home</a></li>
        <li><a href="./query_1.php" title="Query 1">Query 1</a></li>
        <li><a href="./query_2.php" title="Query 2">Query 2</a></li>
        <li><a href="./query_3.php" title="Query 3">Query 3</a></li>
        <li class="last"><a href="./query_4.php" title="Query 4">Query 4</a></li>
      </ul>
    </nav>


  </header>
</div>


<div class="middle">
  <div id="container">

    <div id="latest">

      <section id="showcase">
        <h2><span>Unit</span></h2>
        <div>
          <table id="par_table">

<?php


    echo "<tr>";
    echo "<th> Employee</th> ";
    echo "<th> Name </th> ";
    echo "<th> Address</th> ";
    echo "<th> Telephone </th> ";
    echo "<th> Unit </th> ";
    echo "<th> Zoning </th> ";
    echo "<th> Unit Area (m<sup>2</sup>)</th> ";
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
    </section>
  </div>
</div>

<script language="javascript" type="text/javascript" src="../js/query1.js"> </script>
  <div class="bottom">
    <footer id="copy" class="clear">
      <p class="left">Version 1.0 - 07/05/2015</p>
      <p class="right">Emanuel Felipe | (C) University of Strathclyde </p>
    </footer>
  </div>

  
</html>