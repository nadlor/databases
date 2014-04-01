<?php
//must be included on the top of every page
session_start();

//gets the role from the database. 1- Purcahser 2-Accountants 3-Admin
$roleValue = $_SESSION["role"];
$role = strval($roleValue);

//Displays drop down list for associated roles. Different roles get different querry options.  AccountSettings.html will have the change password form.

//ADD USERS BUTTON MUST BE ADDED FOR ADMIN, NOT YET IN HTML CODE.  THIS CAN BRING UP THE SAME PAGE AS THE EDIT BUTTON BUT MUST ALLOW FOR THE EDITTING OF THE USERNAME AND PASSWORD
if($role == 3){
echo '<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<a href="AccountSettings.html">Click here for account settings</a>
<br/><br/><br/>
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
 </form>
</body>
</html>';
}

else if($role == 2){
echo '<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<a href="AccountSettings.html">Click here for account settings</a>
<br/><br/><br/>
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
 </form>
</body>
</html>';
}
if($role == 1)
{
echo '<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>
<a href="AccountSettings.html">Click here for account settings</a>
<br/><br/><br/>
  Please select a query to perfom:
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
 </form>
</body>
</html>';
}
?>