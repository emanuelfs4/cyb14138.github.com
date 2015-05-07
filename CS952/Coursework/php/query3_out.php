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
  <h2> Jobs </h2>
<table id="par_table">

<?php

//CHECK IF SOMETHING WAS WRITTEN ON THE NAME BOX


    echo "<tr>";
    echo "<th> Company ID </th> ";
    echo "<th> Company Name </th> ";
    echo "<th> Job Number</th> ";
    echo "<th> Description </th> ";
    echo "<th> Start Date </th> ";
    echo "<th> End Date </th> ";
    echo "<th> Month Payment</th> ";
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


$year = $_POST['year'];
$month = $_POST['month'];


//$sql = "SELECT M1.company_id, C.company_name, M1.job_number, J.description, M1.start_date, M1.end_date, M1.month_payment FROM maintenance M1, company C, job J WHERE C.company_id = ". $comp_id . " AND start_date <= '" . $year . "-".$month."-__' AND end_date >= '" . $year. "-". $month ."-__'AND M1.company_id = C.company_id AND M1.job_number = J.job_number AND M1.month_payment >(SELECT AVG(M2.month_payment) FROM maintenance M2 WHERE M1.company_id = M2.company_id GROUP BY M2.company_id ORDER BY M2.company_id) order by M1.company_id";

$sql = "SELECT C1.company_id ,C1.company_name, J1.job_number, J1.job_description, M1.start_date, M1.end_date, M1.month_payment FROM cw_company C1, cw_maintenance M1, cw_cm CM1, cw_job J1, cw_jm JM1 WHERE C1.company_id = CM1.company_id AND CM1.maintenance_id = M1.maintenance_id AND J1.job_number = JM1.job_number AND JM1.maintenance_id = M1.maintenance_id AND M1.start_date <= '". $year ."-" .$month . "-__' AND M1.end_date >= '". $year ."-" .$month . "-__' AND M1.month_payment >(SELECT avg(M2.month_payment) FROM cw_company C2, cw_maintenance M2, cw_cm CM2, cw_job J2, cw_jm JM2 WHERE C2.company_id = CM2.company_id AND CM2.maintenance_id = M2.maintenance_id AND J2.job_number = JM2.job_number AND JM2.maintenance_id = M2.maintenance_id AND C1.company_id = C2.company_id GROUP BY C2.company_id)";

if (!($result = mysqli_query($conn, $sql))){
    die("Could not execute query!"); 
}

if(mysqli_num_rows($result) == 0){
    echo "<p> No rows found </p> ";
}else{

    echo "<tr>";
    echo "<br>";
    while($r=mysqli_fetch_assoc($result)){
        
        echo "<td> " . $r['company_id'] ." </td>";
        echo "<td> " . $r['company_name'] ." </td>";
        echo "<td> " . $r['job_number'] ." </td>";
        echo "<td> " . $r['job_description'] ." </td>";
        echo "<td> " . $r['start_date'] ." </td>";
        echo "<td> " . $r['end_date'] ." </td>";
        echo "<td> " . $r['month_payment'] ." </td>";
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


<script language="javascript" type="text/javascript" src="../js/query3.js"> </script>

</body>
</html>
