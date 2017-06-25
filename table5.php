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
	$UpdateQuery = "UPDATE `can signals` SET `Address`='$_POST[address]', Name='$_POST[name]', `Units`='$_POST[units]' WHERE `Address`='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM `can signals` WHERE `Address`='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO `can signals` (`Address`, Name, `Units`) VALUES ('$_POST[uaddress]', '$_POST[uname]', '$_POST[uunits]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from `can signals`";
$myData = mysql_query($sql, $con);

echo "<h3>Can Signals Table</h3>";
echo "<table border=1>
<tr>
<th>Address</th>
<th>Name</th>
<th>Units</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table5.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=address value=" . $record['Address'] . " </td>";
	echo "<td>" . "<input type=text name=name value=" . $record['Name'] . " </td>"; 
	echo "<td>" . "<input type=text name=units value=" . $record['Units'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['Address'] . " </td>";
	echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table5.php method=post>";
echo "<tr>";
echo "<td><input type=text name=uaddress></td>";
echo "<td><input type=text name=uname></td>";
echo "<td><input type=text name=uunits></td>";
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