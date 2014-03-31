<?php
	//must be included on the top of each page
	session_start();
	
	//get email
	$email = $_POST["email"];
	
	//check if email is entered
	if ($email)
	{
			//GET EMAIL FROM DATABASE (CHECK WITH RICHARD TO SEE HOW TO DO THIS)
			$dbEmail = $_SESSION["email"];
			
			//make sure the user supplied the correct corresponding email with their user name
			if($email == $dbEmail)
			{
				//generate a new random password
				$newPW = rand();
				
				//md5 encripts the random number password which converts it into a string
				$newPW = md5($newPW);
				
				//Shorten the given string
				$newPW = substr($newPW, 0, 10);
				
				
				//UPDATE THE DATABASE WITH THE NEW PASSWORD
				$_POST["password"] = $newPW;
				
				//CHECK THE DATABASE TO MAKE SURE THE PASSWORD WAS UPDATED
				if()
				{
					//email user new password
					//Who the email is coming from
					$webmaster = "EECS_OrderForm@knights.ucf.edu";
					
					//sets the headers and the body of the email
					$headers = "From: $webmaster";
					$subject = "New admin password for EECS order forms";
					//WE NEED A CONTACT NAME AND NUMBER
					$message = "Your new password is: $newPW. \nIf you didnt request this change, please contact ___________";
					
					//sends the email
					if( mail($email, $subject, $message, $headers))
					{
						echo "Your password was reset.  Please check your email to find your new password";
					}
					else
						echo "An error occured and the email was not sent. Please try again";
				}
				//the password was not reset
				echo "An error occured. Your password was not reset";
			}
			else
				echo "The supplied email was incorrect";
		
	}
	//alert user if email not entered
	else
		echo "Please enter your email";
		
?>
