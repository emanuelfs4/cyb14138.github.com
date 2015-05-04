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
          <li> <a href="#"> Query 1 </a></li>
          <li> <a href="#"> Query 2 </a></li>
          <li> <a href="#"> Query 3 </a></li>
          <li> <a href="query4.php"> Query 4 </a></li>
        </ul>  
</div>

<div id="table_all">
<table id="par_table">
<!--
<?php

//CHECK IF SOMETHING WAS WRITTEN ON THE NAME BOX

    echo "<tr>";
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


$sql = 'DELETE * FROM lab_parking_q6 WHERE ';




mysqli_close($conn);


//mail ($to , $subject ,$message );



?>
-->

</p>

</table>
</div>

<h2> Delete </h2>

<form method="post" action="https://devweb2014.cis.strath.ac.uk/~cyb14138/CS952/lab/Q6/delete.php">

    <table id="table_delete">
                <tr>
                  <td>
                    <label id="lb_name">Name <label> 
                  </td>

                  <td>
                    <input class="input_text" name="name" type="text"> </input>
                  </td>    
                </tr>

                <tr>
                  <td>
                    <label id="lb_vehicle" > Vehicle Registration </label>
                  </td>
                  
                  <td> 
                    <input class="input_text" name="vehicle" type="text"> </input>
                  </td>  
                </tr>

                <tr>
                  <td>
                    <label id="lb_application_date"> Application Date </label>
                  </td>

                  <td>
                    <input class="input_text" name="application_date" type="text" placeholder="Year-Month-Day"> </input>  
                  </td>
                </tr>

                 <tr>
                  <td>
                    <label id="lb_permit_date"> Permit Start Date</label>
                  </td>

                  <td>
                    <input class="input_text" name="permit_date" type="text" placeholder="Year-Month-Day"> </input>  
                  </td>
                </tr>

                <tr>
                  <td>
                    <label id="lb_vehicle_type"> Vehicle Type </label>
                  </td>

                  <td>
                    <input name="vehicle_type" type="radio" value="Car"> Car </input>
                    <input name="vehicle_type" type="radio" value="Van"> Van </input>
                    <input name="vehicle_type" type="radio" value="Bike"> Bike </input>                           
                  </td>  
                </tr>  

                <tr>
                  <td>
                    <label id="lb_days" > Days </label>
                  </td>
                  
                  <td> 

                    <input name="days" type="radio" value="Monday"> M </input>
                    <input name="days" type="radio" value="Tuesday"> T </input>
                    <input name="days" type="radio" value="Wednesday"> W </input>
                    <input name="days" type="radio" value="Thursday"> T </input>
                    <input name="days" type="radio" value="Friday"> F </input>
                  </td>
                </tr>      

                <tr>
                  <td>
                    <label id="lb_priority_case"> Priority Cases </label>
                  </td>

                  <td>
                    <select id="select_priority" name="priority_case"> 
                      <option selected="">-</option>
                      <option value="Child in Nursery"> Child in nursery </option>
                      <option value="Blue Badge Holder"> Blue badge holder </option>
                      <option value="Work Van"> Work van </option>
                      <option value="Professor"> Professor </option>
                    </select>   
                  </td>
                </tr>


                
                   
                <tr>
                  <td>
                  </td>

                  <td>
                    <!-- <button type="Submit" id="bt_submit" value="Submit"> Submit </input> -->
                    <button type="Submit" id="bt_submit" value="Submit"> Delete </input>
                  </td>
                </tr>  
           </table> 

</form>

<form action="./index.html">
  <div class="div_bt">

    <button id="bt_back"type="submit" value="Back"> Back </button>

  </div>  

</form>

<hr class="bottom_line">
<p id="signature"> Version 1.0 - <?php echo date('d/m/Y'); ?> - (C) University of Strathclyde / Emanuel Felipe 2015</p>
</body>
</html>
