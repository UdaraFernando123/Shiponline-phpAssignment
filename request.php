<HTML> 
<!-- This is the file that user redirect after the successful login. 
This file contains all the information that need to obtain from user to make a successful online shipping. 
Ex-: Item information/Pick-up Information/Delivery Information -->

<!--Student Name: Udara Gihanya Pragna Fernando-->
<!--Student Number: 101458383-->
<?php 
$cn= $_GET['customer_number'];	

// define variables and set to empty values
$nameErr = $addressErr = $subErr = $rErr =$aErr=$dsErr= $weightErr= $daytErr=$sstateErr=$monthErr=$yearErr=$hourErr="";
$name = $address = $subburb = $rname = $daddress =$dsubburb=  $weight =$day= $sstate =$month=$year=$time=$cost=$usertime=$currentdate=$userdate=$requestnumber=$email=$cusname= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Description is required";
  } else {
    $name = test_input($_POST['name']);
  }
  
 if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = test_input($_POST['address']);
  }

  if (empty($_POST["subburb"])) {
    $subErr = "Subburb is required";
  } else {
     $subburb = test_input($_POST['subburb']);
  }

  if (empty($_POST["receivename"])) {
    $rErr = "Receiver name is required";
  } else {
    $rname = test_input($_POST['receivename']);
  }

  if (empty($_POST["deliveryaddress"])) {
    $aErr = "Delivery address is required";
  } else {
    	$daddress = test_input($_POST["deliveryaddress"]);
  }
   if (empty($_POST["deliveryaddress"])) {
    $dsErr = "Delivery subburb is required";
  } else {
    	 $dsubburb = test_input($_POST['deliverysubburb']);
  }
   if (empty($_POST["weight"])) {
    $weightErr= "Select a weight";
	
  } 
  elseif($_POST["weight"]=='selectweight'){
	  $weightErr= "Select a weight";
	}
  else{
    	 $weight = test_input($_POST['weight']);
		 } 
if (empty($_POST["day"])) {
    $daytErr= "Select a day";
	} 
  elseif($_POST["day"]=='d'){
	  $daytErr= "Select a day";
	}
  else{
    	 $day=test_input($_POST['day']);
		 } 
		 
if (empty($_POST["state"])) {
    $sstateErr= "Select a state";
	} 
  elseif($_POST["state"]=='selectstate'){
 $sstateErr= "Select a state";
	}
  else{
    	$sstate = test_input($_POST['state']);
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
if (empty($_POST["time"])) {
    $hourErr= "Select an hour";
	} 
  elseif($_POST["time"]=='selecthour'){
  $hourErr= "Select an hour";
	}
  else{
    $time = test_input($_POST['time']);
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
<H1>ShipOnline System Request Page</H1>
<div style="border:#000 thin solid;padding:2px 20px 20px 20px;">
<p><span class="error">* required field.</span></p>
<form method="post"  action="">

  Item Information:
  <div id="one" style="border:#000 thin solid;padding:30px 30px 30px 20px;background-color:#F90;margin:20px 0px 30px 0px">
  Description: <input id="resizedTextbox" type="text"  name="name"  > 
  <span class="error">* <?php echo $nameErr;?></span>
  <br/><br/>
  
  Weight: <select name="weight">
<option value="selectweight">Select Weight</option>
<option value="2">2kg</option>
<option value="3">3kg</option>
<option value="4">4kg</option>
<option value="5">5kg</option>
<option value="6">6kg</option>
<option value="7">7kg</option>
<option value="8">8kg</option>
<option value="9">9kg</option>
<option value="10">10kg</option>
<option value="11">11kg</option>
<option value="12">12kg</option>
<option value="13">13kg</option>
<option value="14">14kg</option>
<option value="15">15kg</option>
<option value="16">16kg</option>
<option value="17">17kg</option>
<option value="18">18kg</option>
<option value="19">19kg</option>
<option value="20">20kg</option>
</select>   <span class="error">* <?php echo $weightErr;?></span>
  &nbsp &nbsp  &nbsp Pricing for ShipOnline is: $10 for 0-2 kg and $2 for each additional kg
  </div>
  Pick-up Information:
  <div id="two" style="border:#000 thin solid;padding:30px 30px 0px 20px;background-color:#F90;margin:20px 0px 30px 0px" >
  Address: <input id="resizedTextbox" type="text" name="address"> 
  <span class="error">* <?php echo $addressErr;?></span>
  <br/><br/>
  Subburb: <input id="textboxSize" type="text" name="subburb">
<span class="error">* <?php echo $subErr;?></span>
  <br/><br/>
  Preferred date: &nbsp <select name="day">
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
</select> <span class="error">* <?php echo $monthErr;?></span>
&nbsp
<select name="year">
<option value="y">Year</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
</select> <span class="error">* <?php echo $yearErr;?></span>
<br/>
<br/>

  Preferred time:  &nbsp <select name="time">
<option value="selecthour">Hour</option>
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
</select> <span class="error">* <?php echo $hourErr;?></span>
 &nbsp  Minute: &nbsp <input type="text" name="minute" style="width: 100px;">
  <br/>
 <h6>If you don't input minute properly,we'll assume you want us to pick the item up at the exact hour.<h6>
  </div>
  Delivery Information:
   <div id="three" style="border:#000 thin solid;padding:30px 30px 30px 20px;background-color:#F90;margin:20px 0px 30px 0px">
  Receiver Name: <input id="textboxSize" type="text" name="receivename">
<span class="error">* <?php echo $rErr;?></span>
  <br/><br/>
  Address: <input id="resizedTextbox" type="text" name="deliveryaddress">
<span class="error">* <?php echo $aErr;?></span>
  <br/><br/>
  Subburb: <input id="textboxSize" type="text" name="deliverysubburb"> 
  <span class="error">* <?php echo $dsErr;?></span>
  <br/><br/>
  State:&nbsp <select name="state">
<option value="selectstate">Select State</option>
<option value="New South Wales">New South Wales</option>
<option value="Victoria">Victoria</option>
<option value="Queensland">Queensland</option>
<option value="Western Australia">Western Australia</option>
<option value="South Australia">South Australia</option>
<option value="Island state of Tasmania">Island state of Tasmania</option>
</select> <span class="error">* <?php echo $sstateErr;?></span>
  </div>
<input type="submit" value="Request" />
<?php    

	
 ?>
</form>

 
 <?php
 $flag=true;
$diff="";
$dateflag=true;

 if($name!="" && $address !="" && $subburb !="" && $rname !="" && $daddress !="" && $dsubburb !="" && $weight !="" && $day !="" && $sstate !="" && $month !="" && $year !=""  && $time !="")
{


if($time==7 || $time==20){

if(!(empty($_POST['minute']))){
$minute=$_POST['minute'];
if($minute<31 && $minute>0){
$usertime=$time.':'.$minute;


} else{
$flag=false;

echo"<p>Incorrect pick-up time.<br/> The pick-up time should be between 7:30 and 20:30</p>";
}
}
else{

$min=0;
	$usertime=$time.':'.$min;}
} 


else{

if(!(empty($_POST['minute']))){
	$minute=$_POST['minute'];
	if($minute<61 && $minute>0){
	$usertime=$time.':'.$minute;}else{$flag=false;
    echo"<p>Incorrect pick-up time.<br/> The minute should be between 1-60</p>";}
	}else{
	$min=0;
	$usertime=$time.':'.$min;
	}
}

	
	$userdate=$year."/".$month."/".$day;
	date_default_timezone_set("Australia/Melbourne");
	$cdate = new DateTime();
	$newdatetime= $cdate->format('Y/m/d H:i');
	
	
	
	
	
	$userdatetime=$userdate." ".$usertime;
	
	
	
	date_default_timezone_set("Australia/Melbourne");
	$changeuserdt = new DateTime($userdatetime);
	$changedatetime= $changeuserdt->format('Y/m/d H:i');
	
	
	
	$start_time = strtotime($newdatetime);
    $end_time = strtotime($changedatetime);
    $diff = $end_time - $start_time;
	$diff=($diff/60/60);
	if($diff<24){
	$dateflag=false;
	 echo"<p>The pick-up date and time should be at least 24hours after the current date and time</p>";
	}
	
	
	if($weight==2){
	 $cost=10;
	 }
	else{
	$value=$weight-2;
	$cost=10+ $value*2;
	}
	
	

	if($flag && $dateflag){
	date_default_timezone_set("Australia/Melbourne");
	$dt = new DateTime();
	$currentdate=$dt->format('Y/m/d');
	
	date_default_timezone_set("Australia/Melbourne");
	$dt = new DateTime($userdate);
	$userdate=$dt->format('Y/m/d');
	
	date_default_timezone_set("Australia/Melbourne");
	$dt = new DateTime($usertime);
	$usertime=$dt->format('H:i');
	
	
	
    $DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au","s101458383", "261194","s101458383_db")
	Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
	
	
	
	$SQLstring = "select *from Request";
	$queryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die ("<p>Unable to query the request table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
	
	$row_cnt = $queryResult->num_rows;
	$row_cnt=$row_cnt+1;
	
	
	$SQLstring ="INSERT INTO `Request`(`request_number`,`request_date`, `item_description`, `weight`, `pick_up_address`, `suburb`, `pick_up_date`, `time`, `receiver_name`, `delivery_address`, `delivery_suburb`, `delivery_state`, `customer_number`) 
	VALUES ('".$row_cnt."','".$currentdate."','".$name."','".$weight."','".$address."','".$subburb ."','".$userdate."','".$usertime."','".$rname."','".$daddress."','".$dsubburb."','".$sstate."','".$cn."')";
		
	$queryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die ("<p>Unable to query the request table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
		
		
	$SQLstring = "select *from Customer where customer_number ='".$cn."'";
	$queryResult = @mysqli_query($DBConnect, $SQLstring)
	Or die ("<p>Unable to query the customer table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";	
		
	$row = mysqli_fetch_row($queryResult);
		
	
	while ($row) {
		
		$email=$row[3];
		$cusname=$row[1];
		
		
	
		$row = mysqli_fetch_row($queryResult);
	}
	
	//send a mail to user email address
	$requestnumber=$row_cnt;
	$to =$email;
    $subject = "shipping request with ShipOnline";
    $message = "Dear ".$cusname.", Thank you for using ShipOnline! Your request number is:".$requestnumber.". The cost is: $".$cost.".
	        We will pick-up the item at ".$usertime." on ".$userdate.".";
	mail($to,$subject,$message,"-r 101458383@student.swin.edu.au");
	
	//mail($to, $subject, $message, $headers, "-r 101458383@student.swin.edu.au"); 
	//$headers = "From: webmaster@example.com" . "\r\n" .
	//"CC: somebodyelse@example.com";
	
	

	mysqli_close($DBConnect);
	


 
echo"<p>Thank you ! Your request number is: ".$requestnumber.". The cost is:$".$cost.".
	 We will pick-up the item at: ".$usertime." on ".$userdate.".<br/>
	You are successfully registered into ShipOnline and your customer number is: ".$cn.". </p>";
	
	}

}
?>

</div>
<p><a href="login.php">Home</a></p>
<br/>
</body>
</HTML>
