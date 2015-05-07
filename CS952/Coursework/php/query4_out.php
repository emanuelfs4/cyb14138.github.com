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
<table id="par_table"><h2> Supervisor </h2>
 
<?php

//CHECK IF SOMETHING WAS WRITTEN ON THE NAME BOX


    echo "<tr>";
    echo "<th> Supervisor Number </th> ";
    echo "<th> Number of employees </th> ";
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

$sup_num = $_POST['supervisor_number'];

$sql = 'SELECT S.supervisor_number, count(S.employee_number) AS count FROM cw_supervises S WHERE S.supervisor_number = '. $sup_num .' GROUP BY S.supervisor_number';
            
if (!($result = mysqli_query($conn, $sql))){
    die("Could not execute query!"); 
}

if(mysqli_num_rows($result) == 0){
    echo "<p> No rows found </p> ";
}else{

    echo "<tr>";
    echo "<br>";
    while($r=mysqli_fetch_assoc($result)){
        
        echo "<td> " . $r['supervisor_number'] ." </td>";
        echo "<td> " . $r['count'] ." </td>";
        echo "</tr>";
        
    }
    
}


//$sql = 'DELETE * FROM lab_parking_q6 WHERE ';




mysqli_close($conn);


//mail ($to , $subject ,$message );


?>
</p>

</table>
</div>

<div id="table_all">
<table id="par_table">
  <br>
<hr>

<h2> Employee </h2>
 
<?php

//CHECK IF SOMETHING WAS WRITTEN ON THE NAME BOX


    echo "<tr>";
    echo "<th> Employee Number </th> ";
    echo "<th> Name </th> ";
    echo "<th> Address</th> ";
    echo "<th> Telephone </th> ";
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

$sup_num = $_POST['supervisor_number'];

$sql = 'SELECT S.employee_number, E.name, E.address, E.telephone FROM cw_supervises S, cw_employee E WHERE E.employee_number = S.employee_number AND S.supervisor_number = '. $sup_num;
            
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
        echo "</tr>";
        
    }
    
}


//$sql = 'DELETE * FROM lab_parking_q6 WHERE ';




mysqli_close($conn);


//mail ($to , $subject ,$message );


?>
</p>

</table>
</div>


<div id="table_all">
<table id="par_table">
<br>

<form action="../php/query4.php">
  <div class="div_bt">

    <button id="bt_back" type="submit" value="Back"> Back </button>

  </div>  

</form>

<hr class="bottom_line">
<p id="signature"> Version 1.0 - <?php echo date('d/m/Y'); ?> - (C) University of Strathclyde / Emanuel Felipe 2015</p>
</body>
</html>
