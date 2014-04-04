<?php
//Must be at the top of all html pages
//session_start();
//$queryData = array(	'0'=>array('Aaron','asandow@knights.ucf.edu','1051365890','Yes','no','Microsoft','This is a computer','$300','www.google.com'),
//					'1'=>array('Michael','asandow@bellsouth.net','8945870365','Yes','yes','Apple','This is not a computer','30','www.yahoo.com'));

$queryData = array('0'=>array('A289347','Asandow','Aaron','Sandow','asandow@knights.ucf.edu','Purchaser'),
  				  '1'=>array('B383743','Psandow','Adam','Sandow','adkadja@knights.ucf.edu','Accountant'));

//retrieve the query from the database
//$query = $_SESSION["query"];

//if query is verify users
$query="ViewUsers";
if(strcmp($query, "ViewUsers")==0)
{
	//retrieves array from database that holds all the data
	//$queryData = $_SESSION["queryData"];
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
				//HECTOR!!!!!!!!!
				//Adds buttons to end of each row
				//Edit button- copies user information into textboxes (except for userid and username which can be displayed but cannot be changed)
								//After information is changed, a submit button must send the the new information to PerformQuery.php
				//Remove Button- Must have pop up that verifies user can be deleted. If so, call PerformQuery.php and call the RemoveUser procedure
				echo '<td>';
				//changed from <buttton to <input to better manage the information
				//This could be wrong, but im trying to return the row in the array
				//that we want to edit, then we can open the new page with the information
				//in the array
				echo '<a href="EditUser.php row=$i">Edit User</a>';
				echo '<br/><br/>';
				echo '<a href="VerifyRemove.js">Remove User</a>';
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
	//$queryData = $_SESSION["queryData"];
	$numrows=count($queryData);
	
	//role value indicates who is who: 1- Purcahser 2-Accountants 3-Admin
	//$roleValue = $_SESSION["role"];
	//$role = strval($roleValue);
	$role = 2;
	//Sets up styling for table
	echo '<style type = "text/css">';
	echo 'th, td{padding:20px;}';
	echo 'table, th, td{border:2px solid red;}';
	echo '</style>';
	
	echo '<html>';
	
	echo '<table>';
	echo '<tr>';
	//Displays table headings
	echo '<th><a href="sort.php col=0">Requester</a></th>';
	echo '<th><a href="sort.php col=1">Requesters email</a></th>';
	echo '<th><a href="sort.php col=2">Account Number</a></th>';
	echo '<th><a href="sort.php col=3">Urgent</a></th>';
	echo '<th><a href="sort.php col=4">Computer Purchase</a></th>';
	echo '<th><a href="sort.php col=5">Vendor</a></th>';
	echo '<th><a href="sort.php col=6">Description</a></th>';
	echo '<th><a href="sort.php col=7">Purchase Amount</a></th>';
	echo '<th><a href="sort.php col=8">Attachments</a></th>';
	echo '<th>Cancel Order</th>';
	echo '</tr>';
	echo '</form>';
	//Displays the data
	for($i=0; $i<$numrows; $i++)
	{
		echo '<tr>';
		for($j=0; $j<9; $j++)
		{
			echo '<td>';
			echo $queryData[$i][$j];
			echo '</td>';
  		if($j==7)
  		{
  			//Adds buttons to end of each row to cancel an order
  			echo '<td>';
  			echo '<button type="button" name = "RemoveOrder" onclick="PerformQuery.php" method = "post" value="RemoveOrder">RemoveOrder</button>';
  			echo '</td>';
  		}
		}
		echo '</tr>';
	}

	echo '</table>';
	
	//CODE MUST BE ADDED HERE TO COPY DATA INTO EXCEL
	
	
	//Depending on role, different queries are available to different roles.  Query is submitted to PerformQuery.php
	if($role == 3)
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

	if($role == 2)
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

	if($role == 1)
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
