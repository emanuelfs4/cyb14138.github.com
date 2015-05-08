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
            echo "<th> Job Description </th> ";
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


            $value = $_POST['company'];

            $sql = 'SELECT C.company_id, C.company_name, J.job_number, J.job_description, M.start_date, M.end_date, M.month_payment FROM cw_job J, cw_maintenance M, cw_company C, cw_jm JM, cw_cm CM WHERE JM.job_number = J.job_number AND M.maintenance_id = JM.maintenance_id AND CM.company_id = C.company_id AND CM.maintenance_id = M.maintenance_id AND C.company_id = '. $value .' AND M.month_payment > (SELECT AVG(month_payment) FROM cw_maintenance)';


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

<script language="javascript" type="text/javascript" src="../js/query1.js"> </script>
<div class="bottom">
  <footer id="copy" class="clear">
    <p class="left">Version 1.0 - <?php echo date('d/m/Y'); ?></p>
    <p class="right">Emanuel Felipe | (C) University of Strathclyde </p>
  </footer>
</div>


</html>