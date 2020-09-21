<?php
	$Name = $_POST['name'];
	$Email = $_POST['email'];
	$Phone = $_POST['phone'];
	$Message = $_POST['msg'];
	$password = "Rockstar@123";
	$dbname = "id14469414_contact_form";
	$servername = "localhost";
	$root = "id14469414_root";

	// Database connection
	$conn = new mysqli($servername, $root, $password, $dbname);
	if($conn->connect_error){
		echo "$conn->connect_error";
		
	} else {
		$stmt = $conn->prepare("insert into contact_form(name, email , phone, message) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $Name, $Email, $Phone , $Message);
		$execval = $stmt->execute();
		echo $execval;
		$to='funfettifunfetti1@gmail.com'; // Receiver Email ID, Replace with your email ID
		$subject='Form Submission';
		$message="Name :".$Name."\n"."Phone :".$Phone."\n"."Wrote the following :"."\n\n".$Message;
		$headers="From: ".$Email;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
			echo( "<button onclick= \"location.href='index.html'\">Back to Home</button>");	
		}
		else{
			echo "Something went wrong!";
		}
		
		$stmt->close();
		$conn->close();
	}
	
	
?>