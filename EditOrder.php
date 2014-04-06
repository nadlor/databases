<?php
session_start();

$TempData = array(  '0'=>array('Aaron','asandow@knights.ucf.edu','1051365890','Yes','no','Microsoft','This is a computer','$300','www.google.com','10','11','12','13','14','15','16','17'),
    			'1'=>array('Michael','asandow@bellsouth.net','8945870365','Yes','yes','Apple','This is not a computer','$30','www.yahoo.com'));

//$OrderToEdit = $_GET["row"];
//$role = $_GET["role"]
$OrderToEdit = 0;

//style page for table
echo '<html>';
echo '<style type = "text/css">';
echo 'th, td{padding:20px;}';	
echo 'table, th, td{border:2px solid red;}';
echo '</style>';

echo '<form method="post" name="EditOrder" action="PerformQuery.php">';
echo '<table name="EditOrder">';
echo '<tr>';

if($role == 1)
{
	//table headings
	echo '<th>Requester</th>';
	echo '<th>Requester\'s email</th>';
	echo '<th>Urgent</th>';
	echo '<th>Vendor</th>';
	echo '<th>Description</th>';
	echo '<th>Purchase Amount</th>';
	echo '<th>Attachments</th>';
	echo '</tr>';

	echo '	<tr>';

	echo '   <td>';
	echo ' <input type="text" name="requester" value="';
	echo $TempData[$OrderToEdit][0];
	echo '"></input></td>';


	echo '   <td>';
	echo ' <input type="text" name="email" value="';
	echo $TempData[$OrderToEdit][1];
	echo '"></input></td>';

	echo '   <td>';
	echo ' <input type="text" name="urgent" value="';
	echo $TempData[$OrderToEdit][2];
	echo '"></input></td>';

	echo ' 	<td>';
	echo ' <input type="text" name="Vendor" value="';
	echo $TempData[$OrderToEdit][3];
	echo '"></input></td>';

	echo '   <td>';
	echo ' <input type="text" name="Description" value="';
	echo $TempData[$OrderToEdit][4];
	echo '"></input></td>';

	echo '   <td>';
	echo ' <input type="text" name="amount" value="';
	echo $TempData[$OrderToEdit][5];
	echo '"> </input> </td>';

	echo '   <td>';
	echo ' <input type="file" name="attachment" value="';
	echo $TempData[$OrderToEdit][6];
	echo '"> </input> </td>';

	echo '	</tr>';
	echo '	</table>';
}
else{
	//table headings
	echo '<tr>';
	echo '<th>OrderId</th>';
	echo '<th>OrderReqDate</th>';
  echo '<th>Recieved Date</th>';
	echo '<th>PurchaseDate</th>';
	echo '<th>ApprovalDate</th>';
	echo '<th>AcctNumber</th>';
	echo '<th>Urgent</th>';
	echo '<th>CompPurchase</th>';
	echo '<th>Vendor</th>';
	echo '<th>ItemDesc</th>';
	echo '<th>PreOrderNotes</th>';
	echo '<th>Attachment</th>';
	echo '<th>Requestor</th>';
	echo '<th>ReqEmail</th>';
	echo '<th>Amount</th>';
	echo '<th>AcctCode</th>';
	echo '<th>PONumber</th>';
	echo '<th>PostOrderNotes</th>';
	echo '</tr>';

	echo '<tr>';
	
	echo '<td>'.$TempData[$OrderToEdit][0].'</td>
		  <td>'.$TempData[$OrderToEdit][1].'</td>
		  <td>
		  <input type = "text" name= "PurchaseDate"
      Value="'.$TempData[$OrderToEdit][2].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "ApprovalDate" 
      Value="'.$TempData[$OrderToEdit][3].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "ReceiveDate" 
      Value="'.$TempData[$OrderToEdit][4].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "AcctNumber" 
      Value="'.$TempData[$OrderToEdit][5].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "Urgent" 
      Value="'.$TempData[$OrderToEdit][6].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "CompPurchase" 
      Value="'.$TempData[$OrderToEdit][7].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "Vendor" 
      Value="'.$TempData[$OrderToEdit][8].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "ItemDesc" 
      Value="'.$TempData[$OrderToEdit][9].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "PreOrderNotes" 
      Value="'.$TempData[$OrderToEdit][10].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "Attachment" 
      Value="'.$TempData[$OrderToEdit][11].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "Requestor" 
      Value="'.$TempData[$OrderToEdit][12].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "ReqEmail"
      Value="'.$TempData[$OrderToEdit][13].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "Amount" 
      Value="'.$TempData[$OrderToEdit][14].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "AcctCode" 
      Value="'.$TempData[$OrderToEdit][15].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "PONumber" 
      Value="'.$TempData[$OrderToEdit][16].'">
		  </input></td>
		  <td>
		  <input type = "text" name= "PostOrderNotes" 
      Value="'.$TempData[$OrderToEdit][17].'">
		  </input></td></tr></table>';
}

echo' <input type="hidden" name="row" value"';
echo $OrderToEdit;
echo' "/>';
echo ' 	<input type="submit" name="submit" value="Submit changes"/>';
echo '	</form>';



echo '</html>';

?>