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
        <li><a href="./query_4.php" title="Query 3">Query 4</a></li>
        <li class="last"><a href="./about.php" title="Query 4">About</a></li>

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
              echo "<br>";
  //echo "<p> No rows found </p> ";
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
    </section>
  </div>
</div>

<div class="middle">
  <div id="container">

    <div id="latest">

      <section id="showcase">
        <h2><span>Employess</span></h2>
        <div>
          <table id="par_table">

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
    </section>
  </div>
</div>

<script language="javascript" type="text/javascript" src="../js/fourth_tab.js"> </script>
<div class="bottom">
  <footer id="copy" class="clear">
    <p class="left">Version 1.0 - <?php echo date('d/m/Y'); ?></p>
    <p class="right">Emanuel Felipe | (C) University of Strathclyde </p>
  </footer>
</div>


</html>
