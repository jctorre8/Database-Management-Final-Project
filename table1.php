<html>
<head>
</head>

<body>

<?php
$con = @mysql_connect("localhost", "root", "");
if(!$con) {
	die("Cannot connect: " . mysql_error());
}
echo "<center><h1>Automotive Controller Database for SER 322</h1></center> <hr />";
mysql_select_db("Cars", $con);

//update
if (isset($_POST['update'])) {
	$UpdateQuery = "UPDATE car SET CarID='$_POST[carid]', Make='$_POST[make]', Model='$_POST[model]', Type='$_POST[type]', Year='$_POST[year]'  WHERE CarID='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM car WHERE CarID='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO car (CarID, Make, Model, Type, Year) VALUES ('$_POST[ucarid]', '$_POST[umake]', '$_POST[umodel]', '$_POST[utype]', '$_POST[uyear]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from car";
$myData = mysql_query($sql, $con);

echo "<h3>Car Table</h3>";
echo "<table border=1>
<tr>
<th>CarID</th>
<th>Make</th>
<th>Model</th>
<th>Type</th>
<th>Year</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table1.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=carid value=" . $record['CarID'] . " </td>";
	echo "<td>" . "<input type=text name=make value=" . $record['Make'] . " </td>"; 
	echo "<td>" . "<input type=text name=model value=" . $record['Model'] . " </td>";
	echo "<td>" . "<input type=text name=type value=" . $record['Type'] . " </td>";
	echo "<td>" . "<input type=text name=year value=" . $record['Year'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['CarID'] . " </td>";
	echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table1.php method=post>";
echo "<tr>";
echo "<td><input type=text name=ucarid></td>";
echo "<td><input type=text name=umake></td>";
echo "<td><input type=text name=umodel></td>";
echo "<td><input type=text name=utype></td>";
echo "<td><input type=text name=uyear></td>";
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
