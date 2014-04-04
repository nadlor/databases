<?php
session_start();

$TempData = array(  '0'=>array('A289347','Asandow','Aaron','Sandow','asandow@knights.ucf.edu','Purchaser'),
  				'1'=>array('B286897','IMadude','IM','adude','IMadude@knights.ucf.edu','Accountant'),
					'2'=>array('G861519','Bdude','Bob','dude','bdude@knights.ucf.edu','admin'));

//$UserToEdit = $_GET["row"];
$UserToEdit = 2;

//style page for table
echo '<html>';
echo '<style type = "text/css">';
echo 'th, td{padding:20px;}';	
echo 'table, th, td{border:2px solid red;}';
echo '</style>';

echo '<form method="post" name="EditUser" action="PerformQuery.php">';
echo '<table name="EditUser">';
echo '<tr>';

//table headings
echo '<th>UserID</th>';
echo '<th>UserName</th>';
echo '<th>FirstName</th>';
echo '<th>LastName</th>';
echo '<th>Email</th>';
echo '<th>Role</th>';
echo '</tr>';

echo '	<tr>';
//Editing UserID is not allowed, display only
echo ' 	<td>';
echo $TempData[$UserToEdit][0];
echo '</td>';

//Editing UserName is not allowed, display only
echo ' 	<td>';
echo $TempData[$UserToEdit][1];
echo '</td>';

echo '   <td>';
echo ' <input type="text" name="firstName" value="';
echo $TempData[$UserToEdit][2];
echo '">';
echo ' </input>';
echo '</td>';

echo ' 	<td>';
echo ' <input type="text" name="lastName" value="';
echo $TempData[$UserToEdit][3];
echo '">';
echo ' </input>';
echo '</td>';

echo '   <td>';
echo ' <input type="text" name="email" value="';
echo $TempData[$UserToEdit][4];
echo '">';
echo ' </input>';
echo '</td>';

echo '   <td>';
echo ' <input type="text" name="role" value="';
echo $TempData[$UserToEdit][5];
echo '"> </input> </td>';

echo '	</tr>';
echo '	</table>';

echo' <input type="hidden" name="userId" value';
echo $TempDate[$UserToEdit][0];
echo '"/>';
echo' <input type="hidden" name="userName" value';
echo $TempDate[$UserToEdit][1];
echo '"/>';

echo' <input type="hidden" name="row" value"';
echo $UserToEdit;
echo' "/>';
echo ' 	<input type="submit" name="submit" value="Submit changes"/>';
echo '	</form>';



echo '</html>';

?>