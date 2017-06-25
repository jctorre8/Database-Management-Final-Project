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
	$UpdateQuery = "UPDATE `can message` SET `Base Address`='$_POST[baseaddress]', Name='$_POST[name]', `CAN Bus`='$_POST[canbus]' WHERE `Base Address`='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM `can message` WHERE `Base Address`='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO `can message` (`Base Address`, Name, `CAN Bus`) VALUES ('$_POST[ubaseaddress]', '$_POST[uname]', '$_POST[ucanbus]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from `can message`";
$myData = mysql_query($sql, $con);

echo "<h3>Can Message Table</h3>";
echo "<table border=1>
<tr>
<th>Base Address</th>
<th>Name</th>
<th>CAN Bus</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table4.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=baseaddress value=" . $record['Base Address'] . " </td>";
	echo "<td>" . "<input type=text name=name value=" . $record['Name'] . " </td>"; 
	echo "<td>" . "<input type=text name=canbus value=" . $record['CAN Bus'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['Base Address'] . " </td>";
	echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table4.php method=post>";
echo "<tr>";
echo "<td><input type=text name=ubaseaddress></td>";
echo "<td><input type=text name=uname></td>";
echo "<td><input type=text name=ucanbus></td>";
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