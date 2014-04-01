<?php
	session_start();

	$roleValue = $_SESSION["role"];
	$role = strval($roleValue);
	$newPassword = $_POST["password"];
	$verifyPassword = $_POST["vPassword"];
	$userName = $_SESSION["userName"];
	$oldAdminPass = null;
	$output = null;
	
	if($verifyPassword == $newPassword)
	{
		//If the admin is changing passwords, store old password in order to re-encrypt database
		if(roleValue == 3)
			$oldAdminPass = $_SESSION["adminPassword"];

		$CMD = sprintf("Java -jar c:\PerformQuery.jar %s %s %s %s %s", "ChangePassword", "1", $role, $userName, $newPassword);
		exec($CMD, $output);
		
		//output[0] should equal 1 if the password was successfully changed
		if($output != null && output[0] != null && output[0] == 1)
			echo "Your password was successfully changed.";
					
		//the password was not reset
		else
			echo "An error occured. Your password was not changed.";
		
		//If admin is changing passwords, the database must be re-encrypted with the new password
		if(oldAdminPass != null && $output != null && output[0] != null && output[0] == 1){
		
			$CMD = sprintf("Java -jar c:\PerformQuery.jar %s %s %s %s %s", "ReEncrypt", "3", $role, $oldAdminPass, $newPassword);
			exec($CMD);
			$_SESSION["adminPassword"] = $newPassword;
		}
	}
	else
		echo "Your passwords do not match. Please try again."
		
?>