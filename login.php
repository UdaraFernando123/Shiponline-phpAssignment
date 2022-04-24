<HTML> 
<!-- This file allow the user to log in to the system by providing their customer number and the password-->
<!--Student Name: Udara Gihanya Pragna Fernando-->
<!--Student Number: 101458383-->
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>

<br/>
<H1>ShipOnline System Login Page</H1>
<div style="border:#000 thin solid;padding:30px 0px 0px 20px;background-color:#F90">
<form method="post" >
  Customer Number: <input type="text" name="number"> <br/><br/>
  Password: <input type="password" name="password"> <br/><br/>
  <input type="submit" value="Log In" /> <br/>
</form>

</body> 
<?php 

  if(isset($_POST['number']) && isset($_POST['password']))
  {
 
    
    $DBConnect = @mysqli_connect("feenix-mariadb.swin.edu.au","s101458383", "261194","s101458383_db")
		Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ".mysqli_connect_error()). "</p>";
		$SQLstring = "select *from Customer where customer_number='".$_POST['number']."' and password='".$_POST['password']."'";
		$queryResult = @mysqli_query($DBConnect, $SQLstring)
		Or die ("<p>Unable to query the inventory table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";	
		$row = mysqli_fetch_row($queryResult);
		if(!$row){
			
			echo"Your customer number or the password is incorrect ";
		}
		else{
			header("location:request.php?customer_number=".$_POST['number']." ");
			
		exit();
		
	}
	
		
	
	
		}
		
  
	
	?>
	<br/><br/><br/>
	</div>

<p><a href="shiponline.php">Home</a></p>

</HTML>
