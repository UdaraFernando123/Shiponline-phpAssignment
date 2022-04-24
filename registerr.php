<HTML> 
<!-- This file is responsible for registering a new customer with the system. 
This consist of all the information that need to get from the customer to register with the system -->
<!--Student Name: Udara Gihanya Pragna Fernando-->
<!--Student Number: 101458383-->
<?php
 $nameErr=$passwordErr=$cpasswordErr=$emailErr=$phoneErr="";
 $name=$password=$cpassword= $eaddress =$phone="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST['name']);
  }
  
 if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST['password']);
  }

  if (empty($_POST["cpassword"])) {
    $cpasswordErr = "Confirm password is required";
  } else {
     $cpassword = test_input($_POST['cpassword']);
  }

  if (empty($_POST["eaddress"])) {
    $emailErr = "Email address is required";}
	// check if e-mail address is well-formed
	elseif(!filter_var($_POST["eaddress"], FILTER_VALIDATE_EMAIL)){
	$emailErr = "Invalid email format";
	}
    else {
    $eaddress = test_input($_POST['eaddress']);
	 }
	 
   if (empty($_POST["phone"])) {
    $phoneErr = "Phone number is required";
  } 
   elseif((!preg_match('/^[0-9]{10}$/', $_POST["phone"]))|| (preg_match("/^[a-zA-Z ]*$/",$_POST["phone"]))) {
   
    $phoneErr = "Phone number is invalid"; 
    }
  else {
    $phone = test_input($_POST['phone']);
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
<H1>ShipOnline System Registration Page</H1>
<div style="border:#000 thin solid;padding:3px 0px 0px 20px;background-color:#F90">
<p><span class="error">* required field.</span></p>
<form method="post"  action="">
  Name: <input type="text" name="name">  <span class="error">* <?php echo $nameErr;?></span><br/><br/>
  Password: <input type="password" name="password">  <span class="error">* <?php echo $passwordErr;?></span><br/><br/>
  Confirm Password: <input type="password" name="cpassword"> <span class="error">* <?php echo $cpasswordErr;?></span> <br/><br/>
  Email Address: <input type="text" name="eaddress"> <span class="error">* <?php echo $emailErr;?></span> <br/><br/>
  Cantact Phone: <input type="text" name="phone"> <span class="error">* <?php echo $phoneErr;?></span> <br/><br/>
  <input type="submit" value="Register" /> <br/>
</form>

</body> 

<?php 
 
  if($name!="" && $password!="" && $cpassword!="" && $eaddress!="" && $phone!="")
  {
   
	if($password==$cpassword){
		
	 $DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au","s101458383", "261194","s101458383_db")
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
		$SQLstring = "select *from Customer where email_address='".$eaddress."'";
		$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the customer table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";	
		$row = mysqli_fetch_row($queryResult);
		if($row){
			echo"This customer for the given email address is already registered with the system";
		}
		else{
			$SQLstring = "insert into Customer(name,password,email_address,phone_number) values('".$name."','".$password."','".$eaddress."','".$phone."')";
			
		
		$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the customer table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
		
		$SQLstring = "select customer_number from Customer where email_address='".$eaddress."'";
		$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the customer table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";	
		$row = mysqli_fetch_row($queryResult);
		
	
	while ($row) {
		
		$number=$row[0];
	
		$row = mysqli_fetch_row($queryResult);
	}
	echo"<p>Dear ".$name.", you are successfully registered into ShipOnline and your customer number is: ".$number." </p>";
		}
	mysqli_close($DBConnect);	
  	}
	else{
	echo"<p>Dear customer your passwords are not matching</p>";
	}
	 }
?>

<br/>
</div>
<p><a href="shiponline.php">Home</a></p>
</HTML>
