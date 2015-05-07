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
  <h2> Companies </h2>
<table id="par_table">

<?php

//CHECK IF SOMETHING WAS WRITTEN ON THE NAME BOX


    echo "<tr>";
    echo "<th> Company ID </th> ";
    echo "<th> Company Name </th> ";
    echo "<th> Job Number</th> ";
    echo "<th> Job Description </th> ";
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


$value = $_POST['company'];


//$sql = 'SELECT DISTINCT E.employee_number, E.name, E.address, E.telephone, U.unit_number, Z.zoning , U.area FROM employee E, manages M, site S, occurs O, unit U, zoning Z WHERE E.employee_number = M.employee_number AND M.site_number = S.number AND S.number = O.site_number AND O.unit_number = U.unit_number AND U.type = Z.type and U.area > '. $value . ' GROUP BY U.unit_number ORDER BY E.employee_number';

//$sql = 'SELECT C.company_id, C.company_name, J.job_number, J.description, M.start_date, M.end_date, M.month_payment FROM company C, job J, maintenance M Where C.company_id = M.company_id AND C.company_id = '. $value .' AND M.job_number = J.job_number and M.month_payment > (Select AVG(month_payment) FROM maintenance)';

$sql = 'SELECT C.company_id, C.company_name, J.job_number, J.job_description, M.start_date, M.end_date, M.month_payment FROM cw_job J, cw_maintenance M, cw_company C, cw_jm JM, cw_cm CM WHERE JM.job_number = J.job_number AND M.maintenance_id = JM.maintenance_id AND CM.company_id = C.company_id AND CM.maintenance_id = M.maintenance_id AND C.company_id = '. $value .' AND M.month_payment > (SELECT AVG(month_payment) FROM cw_maintenance)';

            
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


<script language="javascript" type="text/javascript" src="../js/query4.js"> </script>

</body>
</html>
