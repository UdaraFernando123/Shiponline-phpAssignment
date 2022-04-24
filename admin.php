<HTML>
<!-- Using this file the owner of the ShipOnline system can view request details and customer details based on a particular request date or pick-up date-->
<!--Student Name: Udara Gihanya Pragna Fernando-->
<!--Student Number: 101458383-->
<?php 
// define variables and set to empty values
$groupErr=$daytErr=$monthErr=$yearErr="";
$group= $day= $month = $year = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if (empty($_POST["day"])) {
    $daytErr= "Select a day";
	} 
  elseif($_POST["day"]=='d'){
	  $daytErr= "Select a day";
	}
  else{
    	 $day=test_input($_POST['day']);
		 } 
		 
		 
 if (empty($_POST["month"])) {
    $monthErr= "Select a month";
	} 
  elseif($_POST["month"]=='m'){
 $monthErr= "Select a month";
	}
  else{
    	$month=test_input($_POST['month']);
		 } 
		 
if (empty($_POST["year"])) {
    $yearErr= "Select a year";
	} 
  elseif($_POST["year"]=='y'){
 $yearErr= "Select a year";
	}
  else{
    	$year=test_input($_POST['year']);
		 }
		 
if (empty($_POST["group"])) {
    $groupErr = "Please select a way to retrieve data";
  } else {
    $group = test_input($_POST["group"]);
  }
  		 
	}	
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

 
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<br/>
<H1>ShipOnline System Administration Page</H1>
<div style="border:#000 thin solid;padding:3px 20px 0px 20px;background-color:#F90;">
<p><span class="error">* required field.</span></p>
<form method="post"  action="">
 Date for Retrieve: &nbsp <select name="day">
<option value="d">Day</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
</select> <span class="error">* <?php echo $daytErr;?></span>
&nbsp
<select name="month">
<option value="m">Month</option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>  <span class="error">* <?php echo $monthErr;?></span>
&nbsp
<select name="year">
<option value="y">Year</option>
<option value="2018">2014</option>
<option value="2019">2015</option>
<option value="2020">2016</option>
<option value="2021">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
</select>  <span class="error">* <?php echo $yearErr;?></span>
<br/><br/>


  Select Date Item for Retrieve: 
  
  <input type="radio" name="group" value="RequestDate">Request Date &nbsp
<input type="radio" name="group" value="PickupDate" >Pick-up Date
   <span class="error">* <?php echo $groupErr;?></span>
  
  <br/><br/>
  <input type="submit" value="Show" /> <br/><br/>
</form>


<?php

$userdate= $SQLstring=$totrecords=$cost=$cal=$totweight="";

if($group!="" && $day !="" && $month !="" && $year !="")
{

$userdate=$year.'/'.$month.'/'.$day;
date_default_timezone_set("Australia/Melbourne");
	$dt = new DateTime($userdate);
	$userdate=$dt->format('Y/m/d');




    $DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au","s101458383", "261194","s101458383_db")
	Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
     
	 if($group=='RequestDate'){
	 $SQLstring = "select *from Request where request_date='".$userdate."'";
	 $queryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die ("<p>Unable to query the customer table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
	$row = mysqli_fetch_row($queryResult);
	if ($row==0){
	echo"There is no records for the given request date <br/>";
	}
	else{
	echo "<table width='100%' border='1'>";

	
	
	echo "<th>customer number</th>
		  <th>request number</th>
		  <th>item description</th>
		  <th>weight</th>
		  <th>pick-up suburb</th>
		  <th>preferred pick-up date</th>
		  <th>delivery suburb</th>
		  <th>state</th>";
	
	while ($row) {
		
		echo "<tr><td>{$row[12]}</td>";
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}kg</td>";
		echo "<td>{$row[5]}</td>";
		echo "<td>{$row[6]}</td>";
		echo "<td>{$row[10]}</td>";
		echo "<td>{$row[11]}</td></tr>";
		
		$totrecords++;
		$weight=$row[3];
		
		if($weight==2){
	    $cal=10;
	    }
	    else{
	    $value=$weight-2;
	    $cal=10+ $value*2;
	    }
		
	   $cost=$cost+$cal;	
		$row = mysqli_fetch_row($queryResult);
		
		
	}
	
	echo "</table>";
	echo"<br/>";
	echo"Total number of requests: ".$totrecords;
	echo" Total revenue: ".$cost;
	echo"<br/>";
		}
		}
	else if($group=='PickupDate'){
	$SQLstring = "SELECT *from Request as r INNER JOIN Customer as c ON r.customer_number=c.customer_number WHERE r.pick_up_date='".$userdate."' ORDER BY suburb, delivery_state, delivery_suburb ASC";
	$queryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die ("<p>Unable to query the customer table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
	$row = mysqli_fetch_row($queryResult);
	if ($row==0){
	echo"There is no records for the given pick-up date <br/>";
	}
	else{
	echo "<table width='100%' border='1'>";
	echo "<th>customer number</th>
		  <th>customer name</th>
		  <th>contact phone</th>
		  <th>request number</th>
		  <th>item description</th>
		  <th>weight</th>
		  <th>pick-up address</th>
		  <th>pick-up suburb</th>
		  <th>preferred pick-up time</th>
		  <th>delivery suburb</th>
		  <th>state</th>";
	
	
	
	while ($row) {
		echo "<tr><td>{$row[12]}</td>";
		echo "<td>{$row[14]}</td>";
		echo "<td>{$row[17]}</td>";
		echo "<td>{$row[0]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}kg</td>";
		echo "<td>{$row[4]}</td>";
		echo "<td>{$row[5]}</td>";
		echo "<td>{$row[7]}</td>";
		echo "<td>{$row[10]}</td>";
		echo "<td>{$row[11]}</td></tr>";
		
		$totrecords++;
		$weight=$row[3];
		
		$totweight=$totweight+$weight;
		
	   
		$row = mysqli_fetch_row($queryResult);
		
		
	}
	
	echo "</table>";
	echo"<br/>";
	echo"Total number of requests: ".$totrecords;
	echo" Total weight: ".$totweight;
	echo"<br/>";
		}
		}
	}
	?>
<br/>
</div>

<p><a href="shiponline.php">Home</a></p>
</body> 

</HTML>



