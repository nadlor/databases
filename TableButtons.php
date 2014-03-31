<?php
//Must be at the top of all html pages
session_start();
//$queryData = array('0'=>array('Aaron','asandow@knights.ucf.edu','Y','Microsoft','This is a computer','www.google.com','$300'),

//	          '1'=>array('Michael','asandow@bellsouth.net','Y','Apple','This is not a computer','www.yahoo.com','30'));
//$queryData = array('0'=>array('A289347','Asandow','Aaron','Sandow','asandow@knights.ucf.edu','Purchaser'),
//					  '1'=>array('B383743','Psandow','Adam','Sandow','adkadja@knights.ucf.edu','Accountant'));

//retrieve the query from the database
$query = $_SESSION["query"];

//if query is verify users
if(strcmp($query, "ViewUsers")==0)
{
	//retrieves array from database that holds all the data
	$queryData = $_SESSION["queryData"];
	//number of rows in the table
	$numrows=count($queryData);
	
	//style page for table
	echo '<style type = "text/css">';
	echo 'th, td{padding:20px;}';
	echo 'table, th, td{border:2px solid red;}';
	echo '</style>';
	
	echo '<html>';

	echo '<table>';
	echo '<tr>';
	//table headings
	echo '<th>UserID</th>';
	echo '<th>UserName</th>';
	echo '<th>FirstName</th>';
	echo '<th>LastName</th>';
	echo '<th>Email</th>';
	echo '<th>Role</th>';
	echo '<th>Edit or Remove User</th>';
	echo '</tr>';
	
	for($i=0; $i<$numrows; $i++)
	{
		echo '<tr>';
		for($j=0; $j<6; $j++)
		{
			//places data in appropriate table locations
			echo '<td>';
			echo $queryData[$i][$j];
			echo '</td>';
			if($j==5)
			{
				//Adds buttons to end of each row
				//Edit button- copies user information into textboxes (except for userid and username which can be displayed but cannot be changed)
								//After information is changed, a submit button must send the the new information to PerformQuery.php
				//Remove Button- Must have pop up that verifies user can be deleted. If so, call PerformQuery.php
				echo '<td>';
				echo '<button type="button" name = "col" onclick="EditUser.php" method = "post" value="0">Edit</button>';
				echo '<button type="button" name = "col" onclick="VerifyRemove.js" method = "post" value="1">Remove</button>';
				echo '</td>';
			}
		}
		
		echo '</tr>';
	}
	echo'</table>';
}
//If the query is NOT view users
else
{
	//array for query data and number of rows in the table
	$queryData = $_SESSION["queryData"];
	$numrows=count($queryData);
	
	//role value indicates who is who: 1- Purcahser 2-Accountants 3-Admin
	$roleValue = $_SESSION["role"];
	$role = strval($roleValue);
	
	//Sets up styling for table
	echo '<style type = "text/css">';
	echo 'th, td{padding:20px;}';
	echo 'table, th, td{border:2px solid red;}';
	echo '</style>';
	
	echo '<html>';
	
	echo '<table>';
	echo '<tr>';
	//Displays table headings
	echo '<th><button type="button" name = "col" onclick="sort.php" method = "get" value="0">Requester</button></th>';
	echo '<th><button type="button" name = "col" onclick="sort.php" method = "get" value="1">Requesters email</button></th>';
	echo '<th><button type="button" name = "col" onclick="sort.php" method = "get" value="2">Urgent</button></th>';
	echo '<th><button type="button" name = "col" onclick="sort.php" method = "get" value="3">Vendor</button></th>';
	echo '<th><button type="button" name = "col" onclick="sort.php" method = "get" value="4">Description</button></th>';
	echo '<th><button type="button" name = "col" onclick="sort.php" method = "get" value="5">Attachments</button></th>';
	echo '<th><button type="button" name = "col" onclick="sort.php" method = "get" value="6">Purchase Amount</button></th>';
	echo '</tr>';

	//Displays the data
	for($i=0; $i<$numrows; $i++)
	{
		echo '<tr>';
		for($j=0; $j<7; $j++)
		{
			echo '<td>';
			echo $queryData[$i][$j];
			echo '</td>';
		}
		echo '</tr>';
	}

	echo '</table>';
	
	//CODE MUST BE ADDED HERE TO COPY DATA INTO EXCEL
	
	
	//Depending on role, different queries are available to different roles.  Query is submitted to PerformQuery.php
	if(role == 3)
	{
		echo'
		Please select a query to perfom:
		<br/><br/>
		<form method="post"action="PerformQuery.php">
	<select>
	   <option value="AddOrder">AddOrder</option>
	   <option value="AwaitingApproval">Awaiting Approval</option>
	   <option value="FindOrderByEmail">Find Order By Email</option>
	   <option value="OrdersByDateRange">Orders By Date Range</option>
	   <option value="AcctAllApproved">View All Orders Approved by Accountant</option>
	   <option value="AwaitingDelivery">Awaiting Delivery</option>
	   <option value="FindOrderById">Find Order By Id</option>
	   <option value="ViewUsers">View Users</option>
	   <option value="AcctAllOrders">Accountant All Orders</option>
	   <option value="AllApproved">All Approved</option>
	   <option value="AwaitingPurchase">Awaiting Purchase</option>
	   <option value="FindOrderByName">Find Order By Name</option>
	   <option value="RemoveOrder">Remove Order</option>
	   <option value="AcctAwaitingApproval">Accountant Awaiting Approval</option>
	   <option value="AllOrders">All Orders</option>
	   <option value="EditOrder">Edit Order</option>
	   <option value="FindOrderByPartName">Find Order By Part Name</option>
	   <option value="AcctOrdersByDateRange">Accountant Orders By Date Range</option>
	   <option value="AllPurchased">All Purchased</option>
	 </select> 
		<br/><br/>
		<input type="submit" name="submit"/>
	 </form>';
	}

	if(role == 2)
	{
	  echo'Please select a query to perfom:
	  <br/><br/>
	  <form method="post"action="PerformQuery.php">
	<select>
	   <option value="AddOrder">AddOrder</option>
	   <option value="AwaitingApproval">Awaiting Approval</option>
	   <option value="FindOrderByEmail">Find Order By Email</option>
	   <option value="OrdersByDateRange">Orders By Date Range</option>
	   <option value="AcctAllApproved">View All Orders Approved by Accountant</option>
	   <option value="AwaitingDelivery">Awaiting Delivery</option>
	   <option value="FindOrderById">Find Order By Id</option>
	   <option value="AcctAllOrders">Accountant All Orders</option>
	   <option value="AllApproved">All Approved</option>
	   <option value="AwaitingPurchase">Awaiting Purchase</option>
	   <option value="FindOrderByName">Find Order By Name</option>
	   <option value="RemoveOrder">Remove Order</option>
	   <option value="AcctAwaitingApproval">Accountant Awaiting Approval</option>
	   <option value="AllOrders">All Orders</option>
	   <option value="EditOrder">Edit Order</option>
	   <option value="FindOrderByPartName">Find Order By Part Name</option>
	   <option value="AcctOrdersByDateRange">Accountant Orders By Date Range</option>
	   <option value="AllPurchased">All Purchased</option>
	 </select> 
		<br/><br/>
		<input type="submit" name="submit"/>
	 </form>';
	}

	if(role == 1)
	{
		echo 'Please select a query to perfom:
	  <br/><br/>
	  <form method="post"action="PerformQuery.php">
	<select>
	   <option value="AddOrder">AddOrder</option>
	   <option value="AwaitingApproval">Awaiting Approval</option>
	   <option value="FindOrderByEmail">Find Order By Email</option>
	   <option value="OrdersByDateRange">Orders By Date Range</option>
	   <option value="AwaitingDelivery">Awaiting Delivery</option>
	   <option value="FindOrderById">Find Order By Id</option>
	   <option value="AllApproved">All Approved</option>
	   <option value="AwaitingPurchase">Awaiting Purchase</option>
	   <option value="FindOrderByName">Find Order By Name</option>
	   <option value="RemoveOrder">Remove Order</option>
	   <option value="AllOrders">All Orders</option>
	   <option value="EditOrder">Edit Order</option>
	   <option value="FindOrderByPartName">Find Order By Part Name</option>
	   <option value="AllPurchased">All Purchased</option>
	 </select> 
		<br/><br/>
		<input type="submit" name="submit"/>
	 </form>';
	}

	echo '</html>';
}
?>
