<?php
session_start();

$TempData = array(  '0'=>array('Aaron','asandow@knights.ucf.edu','1051365890','Yes','no','Microsoft','This is a computer','$300','www.google.com'),
					'1'=>array('Michael','asandow@bellsouth.net','8945870365','Yes','yes','Apple','This is not a computer','$30','www.yahoo.com'));

//$UserToEdit = $_GET["row"];
$UserToEdit = 1;

//style page for table
echo '<html>';
echo '<style type = "text/css">';
echo 'th, td{padding:20px;}';	
echo 'table, th, td{border:2px solid red;}';
echo '</style>';

echo '<form method="post" name="EditOrder" action="PerformQuery.php">';
echo '<table name="EditOrder">';
echo '<tr>';

//table headings
echo '<th>Requester</th>';
echo '<th>Requester\'s email</th>';
echo '<th>Account Number</th>';
echo '<th>Urgent</th>';
echo '<th>Computer</th>';
echo '<th>Vendor</th>';
echo '<th>Description</th>';
echo '<th>Purchase Amount</th>';
echo '<th>Attachments</th>';
echo '</tr>';

echo '	<tr>';

echo '   <td>';
echo ' <input type="text" name="requester" value="';
echo $TempData[$UserToEdit][0];
echo '"></input></td>';


echo '   <td>';
echo ' <input type="text" name="email" value="';
echo $TempData[$UserToEdit][1];
echo '"></input></td>';

echo '   <td>';
echo ' <input type="text" name="acctNum" value="';
echo $TempData[$UserToEdit][2];
echo '"></input></td>';

echo '   <td>';
echo ' <input type="text" name="urgent" value="';
echo $TempData[$UserToEdit][3];
echo '"></input></td>';

echo '   <td>';
echo ' <input type="text" name="compPurchase" value="';
echo $TempData[$UserToEdit][4];
echo '"></input></td>';

echo ' 	<td>';
echo ' <input type="text" name="Vendor" value="';
echo $TempData[$UserToEdit][5];
echo '"></input></td>';

echo '   <td>';
echo ' <input type="text" name="Description" value="';
echo $TempData[$UserToEdit][6];
echo '"></input></td>';

echo '   <td>';
echo ' <input type="text" name="amount" value="';
echo $TempData[$UserToEdit][7];
echo '"> </input> </td>';

echo '   <td>';
echo ' <input type="file" name="attachment" value="';
echo $TempData[$UserToEdit][8];
echo '"> </input> </td>';

echo '	</tr>';
echo '	</table>';


echo' <input type="hidden" name="row" value"';
echo $UserToEdit;
echo' "/>';
echo ' 	<input type="submit" name="submit" value="Submit changes"/>';
echo '	</form>';



echo '</html>';

?>