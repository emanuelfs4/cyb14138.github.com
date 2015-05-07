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
        <h2><span>Company List</span></h2>
        <div>
          <table id="par_table">

            <?php
            echo "<tr>";

            echo "<th> Company ID </th> ";
            echo "<th> Company Name </th> ";
            echo "<th> Start Date </th> ";
            echo "<th> End Date </th> ";
            echo "<th> Month Payment </th> ";
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

            $sql = 'SELECT C.company_id, C.company_name, M.start_date, M.end_date, M.month_payment FROM cw_company C, cw_maintenance M, cw_cm CM WHERE C.company_id = CM.company_id AND M.maintenance_id = CM.maintenance_id ORDER BY C.company_id';

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


<div class="middle">
  <div id="container">
    <div id="latest">
      <section id="showcase">
        <h2><span>Date</span></h2>
        <div>
         <form method="post" action="https://devweb2014.cis.strath.ac.uk/~cyb14138/cyb14138.github.com/CS952/Coursework/php/query_3_out.php">

           <label id="lb_year"> Year <label>
            <input class="input_text" name="year" type="text" maxlength="4"> </input>
            <br>
            <label id="lb_month"> Month <label>
              <input class="input_text" name="month" type="text" maxlength="2"> </input>

              <button class="submitbutton" type="button" id="bt_submit" value="Submit" onclick="check()"> OK </input>


              </form>
            </div>
          </section>
        </div>
      </div>
    </div>

    <script language="javascript" type="text/javascript" src="../js/query3.js"> </script>
    <div class="bottom">
      <footer id="copy" class="clear">
        <p class="left">Version 1.0 - 07/05/2015</p>
        <p class="right">Emanuel Felipe | (C) University of Strathclyde </p>
      </footer>
    </div>


    </html>