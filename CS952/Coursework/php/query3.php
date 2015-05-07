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

    <h3> Input a company ID and a month and a year and all the jobs of the company betwween the start and end dates in which 
      the month payment is bigger than the avarage of all the months payment of the company.</h3>

    <div id="table_all">
      <h2> Unit </h2>
      <table id="par_table">

        <?php

//CHECK IF SOMETHING WAS WRITTEN ON THE NAME BOX

/*
    echo "<tr>";
    echo "<th> Employee Number </th> ";
    echo "<th> Name </th> ";
    echo "<th> Address</th> ";
    echo "<th> Telephone </th> ";
    echo "<th> Supervisor Number </th> ";
    echo "</tr>";
*/
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


//$sql = 'SELECT DISTINCT E.employee_number, E.name, E.address, E.telephone FROM employee E, manages M, site S, occurs O, unit U WHERE E.employee_number = M.employee_number AND M.site_number = S.number AND S.number = O.site_number AND O.unit_number = U.unit_number and U.area > 1000  GROUP BY U.unit_number ORDER BY E.employee_number';

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

<h2> Input </h2>

<form method="post" action="https://devweb2014.cis.strath.ac.uk/~cyb14138/cyb14138.github.com/CS952/Coursework/php/query3_out.php">

  <table id="table_area">
   

      <tr>
        <td>
          <label id="lb_year"> Year <label> 
          </td>

          <td>
            <input class="input_text" name="year" type="text" maxlength="4"> </input>
          </td>    
        </tr>

        <tr>
          <td>
            <label id="lb_month"> Month <label> 
            </td>

            <td>
              <input class="input_text" name="month" type="text" maxlength="2"> </input>
            </td>    
          </tr>


          <tr>
            <td>
            </td>

            <td>
              <!-- <button type="Submit" id="bt_submit" value="Submit"> Submit </input> -->
              <button type="button" id="bt_submit" value="Submit" onclick="check()"> OK </input>
              </td>
            </tr>  
          </table> 

        </form>

        <form action="../index.html">
          <div class="div_bt">

            <button id="bt_back"type="submit" value="Back"> Back </button>

          </div>  

        </form>


        <hr class="bottom_line">
        <p id="signature"> Version 1.0 - <?php echo date('d/m/Y'); ?> - (C) University of Strathclyde / Emanuel Felipe 2015</p>


        <script language="javascript" type="text/javascript" src="../js/query3.js"> </script>

      </body>
      </html>
