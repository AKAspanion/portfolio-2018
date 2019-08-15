<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel ="shortcut icon" href="images/favicon.ico" type="image/ico">
        <title>Ankit Kumar Pandit: Feedback</title>
		<link rel="stylesheet" href="css/animate.css">
		<link href="https://fonts.googleapis.com/css?family=Josefin+Slab|Lato|Ubuntu|Open+Sans|Tangerine" rel="stylesheet">
    </head>
	<script>
		setTimeout(function() 
		{ 
			window.location.href="index.html" 
		}, 3000);
	</script>
	<style>
		html{
			background: #000;
			padding: 0;
			margin: 0;
			font-family: 'Ubuntu','Lato','Open Sans';
			font-size: 20px;
			overflow: auto;
			color: #fff;
		}
	
		body{
			text-align: center;
			padding: 0 ;
			margin: 0 auto;
			max-width: 600px;
			width: 100%;
			height: 69px;
			background: #000;
			border: 1px solid #fff;
			box-shadow: 0 0 10px 0px rgba(12,3,25,0.8);
			animation-delay: 0.3s;
		}
		.head{
			background: #fff;
			border: 1px solid #0B4CB0;
			color: #dddddd;
			animation-delay: 0.2s;
		}
		.name{
			font-family: Ubuntu;
			font-size: 15px;
			margin: 10px auto;
			background: #0B4CB0;
			text-align: center;
			padding: 10px;
		}
	</style>
	<body>
			<?php
                $headers =  'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: ankitkumar@spanion.xyz' . "\r\n";
				if(isset($_POST['submit'])){
					
					$host = "localhost";
					$username = "spanionx_spanion";
					$password = ".August1995";
					$db_name = "spanionx_contact";
					
					$conn = new mysqli($host, $username, $password, $db_name);
					// Check connection
					if($conn->connect_error) {
						echo "<div class='head slideInDown animated'>" . "<p>" . "Can't  Connect!" . "</p>" . "</div>";
						die("" . $conn->connect_error);
						
					} 
					
					$query = "INSERT INTO feedback (name, surname, email,message)
							  VALUES ('$_POST[first_name]','$_POST[last_name]','$_POST[email]','$_POST[message]')";
							  
					if(mysqli_query($conn, $query)) {
						echo "<div class='head slideInDown animated'>" . "<p>" . "Thank you for your Feedback!" . "</p>" . "</div>";
						
						$msg = "Hi $_POST[first_name]!,\nThank You for giving me your Feedback!\n\nCheers!";
						
						$result=mail("$_POST[email]","Thank You Mail",$msg,$headers);
						$result=mail("panditankit1995@gmail.com","You got Feedback","$_POST[first_name] $_POST[last_name] sent you a feedback!",$headers);
                        if(!$result) {   
						   echo "Error";   
						} else {
						   echo "Success";
						}
					} else {
						echo "<div class='head slideInDown animated'>" . "<p>" . "Error: " . $query . "<br>" . mysqli_error($conn). "</p>" . "</div>";
					}
					
				}
			?>
	</body>
</html>
		