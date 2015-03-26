<html>
<head>
    <title> Delete </title>
    <meta http-equiv="refresh" content="5;url=../admin/admin_show.php">
    <link type="text/css" rel="stylesheet" href="../css/admin_php.css">
</head>

<body>


    <h1> Delete </h1>



    <div id="table_delete">
        <p> Row deleted: </p>
        <table id="par_table_delete">

            <?php

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


            echo "<tr>";
            echo "<th> Name </th> ";
            echo "<th> Vehicle Registration </th> ";
            echo "<th> Application Date</th> ";
            echo "<th> Permit Date </th> ";
            echo "<th> Vehicle Type </th> ";
            echo "<th> Days </th> ";
            echo "<th> Priority Cases </th> ";
            echo "</tr>";


            list($reg, $day) = explode('/', $_POST['radio_table']);

            $sql_select = "SELECT * FROM lab_parking_q6 WHERE vehicle_reg ='" . $reg . "' AND days='" . $day . "'";
            $sql_delete = "DELETE FROM lab_parking_q6 WHERE vehicle_reg ='" . $reg . "' AND days='" . $day . "'";

            if (!($result_select = mysqli_query($conn, $sql_select))){
                die("Could not execute query!"); 
            }

            if(mysqli_num_rows($result_select) == 0){
                echo "<p> No rows found </p> ";
            }else{

                echo "<tr>";
                echo "<br>";
                while($r=mysqli_fetch_assoc($result_select)){

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


            if (!($result = mysqli_query($conn, $sql_delete))){
                echo " <p> Could not execute query! </p>"; 
            }

            mysqli_close($conn);
//mail ($to , $subject ,$message );
            ?>         

        </p>

    </table>
</div>

<p> Please wait!</p>
<p> You will be redirected in 5 seconds. </p>


</body>
</html>