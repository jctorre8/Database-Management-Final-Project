<html>
<head>
</head>

<body>

<?php
$con = @mysql_connect("localhost", "root", "");
if(!$con) {
	die("Cannot connect: " . mysql_error());
}
echo "<center><h1>Car Database for SER 322</h1></center> <hr />";
mysql_select_db("Cars", $con);

//update
if (isset($_POST['update'])) {
	$UpdateQuery = "UPDATE `controller` SET `ControllerID`='$_POST[controllerid]', Name='$_POST[name]', `Supplier`='$_POST[supplier]' WHERE `ControllerID`='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM `controller` WHERE `ControllerID`='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO `controller` (`ControllerID`, Name, `Supplier`) VALUES ('$_POST[ucontrollerid]', '$_POST[uname]', '$_POST[usupplier]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from `controller`";
$myData = mysql_query($sql, $con);

echo "<h3>Controller Table</h3>";
echo "<table border=1>
<tr>
<th>ControllerID</th>
<th>Name</th>
<th>Supplier</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table6.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=controllerid value=" . $record['ControllerID'] . " </td>";
	echo "<td>" . "<input type=text name=name value=" . $record['Name'] . " </td>"; 
	echo "<td>" . "<input type=text name=supplier value=" . $record['Supplier'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['ControllerID'] . " </td>";
	echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table6.php method=post>";
echo "<tr>";
echo "<td><input type=text name=ucontrollerid></td>";
echo "<td><input type=text name=uname></td>";
echo "<td><input type=text name=usupplier></td>";
echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "</form>";
echo "</table>";
//end


mysql_close($con);
?>
</br>
<form action="home.php" method="post">
	<input id="button" type="submit" name="table6" value="Go Back" />
</form>
</body>

</html>