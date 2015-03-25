<html>
<head>
	<title> Administrator Interface </title>
	
	<link type="text/css" rel="stylesheet" href="../css/admin_php.css">
</head>

<body>

<h1> Administrator Interface</h1>
<p>

<div id="menu">
        <ul id="top">
          <li> <a href="./admin_show.php"> All Submissions </a></li>
          <li> <a href="./delete_form.php"> Delete </a></li>
          <li> <a href="./print_form.php"> Print </a></li>
        </ul>  
</div>


<h2> Print </h2>

<form method="post" action="https://devweb2014.cis.strath.ac.uk/~cyb14138/CS952/lab/Q6/admin/print_view.php">

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
                    <!-- <button type="Submit" id="bt_submit" value="Submit"> Submit </input> 
                     <button type="Submit" id="bt_submit" value="Submit"> Select </input>
                    <button type="button" id="bt_submit" value="Submit" onclick="check()"> Select </input>-->
                     <button type="button" id="bt_submit" value="Submit" onclick="check()"> Select </input>
                  </td>
                </tr>  
           </table> 

</form>

<form action="../admin/admin_show.php">
  <div class="div_bt">
    <button id="bt_back"type="submit" value="Back"> Back </button>
  </div>  

</form>

<hr class="bottom_line">
<p id="signature"> Version 1.0 - <?php echo date('d/m/Y'); ?> - (C) University of Strathclyde / Emanuel Felipe 2015</p>
<script language="javascript" type="text/javascript" src="../js/q6_select.js"> </script>
</body>
</html>
