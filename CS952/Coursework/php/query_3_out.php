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
        <h2><span>Company</span></h2>
        <div>
          <table id="par_table">

            <?php

            echo "<tr>";
            echo "<th> Company ID </th> ";
            echo "<th> Company Name </th> ";
            echo "<th> Job Number</th> ";
            echo "<th> Description </th> ";
            echo "<th> Start Date </th> ";
            echo "<th> End Date </th> ";
            echo "<th> Month Payment</th> ";
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


            $year = $_POST['year'];
            $month = $_POST['month'];


            $sql = "SELECT C1.company_id ,C1.company_name, J1.job_number, J1.job_description, M1.start_date, M1.end_date, M1.month_payment FROM cw_company C1, cw_maintenance M1, cw_cm CM1, cw_job J1, cw_jm JM1 WHERE C1.company_id = CM1.company_id AND CM1.maintenance_id = M1.maintenance_id AND J1.job_number = JM1.job_number AND JM1.maintenance_id = M1.maintenance_id AND M1.start_date <= '". $year ."-" .$month . "-__' AND M1.end_date >= '". $year ."-" .$month . "-__' AND M1.month_payment >(SELECT avg(M2.month_payment) FROM cw_company C2, cw_maintenance M2, cw_cm CM2, cw_job J2, cw_jm JM2 WHERE C2.company_id = CM2.company_id AND CM2.maintenance_id = M2.maintenance_id AND J2.job_number = JM2.job_number AND JM2.maintenance_id = M2.maintenance_id AND C1.company_id = C2.company_id GROUP BY C2.company_id)";

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

                echo "<td> " . $r['company_id'] ." </td>";
                echo "<td> " . $r['company_name'] ." </td>";
                echo "<td> " . $r['job_number'] ." </td>";
                echo "<td> " . $r['job_description'] ." </td>";
                echo "<td> " . $r['start_date'] ." </td>";
                echo "<td> " . $r['end_date'] ." </td>";
                echo "<td> " . $r['month_payment'] ." </td>";
                echo "</tr>";

              }

            }

            mysqli_close($conn);

            ?>

          </p>
        </table>
      </div>
    </section>
  </div>
</div>

<script language="javascript" type="text/javascript" src="../js/third_tab.js"> </script>
<div class="bottom">
  <footer id="copy" class="clear">
    <p class="left">Version 1.0 - <?php echo date('d/m/Y'); ?></p>
    <p class="right">Emanuel Felipe | (C) University of Strathclyde </p>
  </footer>
</div>


</html>
