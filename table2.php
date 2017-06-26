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
	$UpdateQuery = "UPDATE `car component` SET ComponentID='$_POST[componentid]', Controller='$_POST[controller]', Connector='$_POST[connector]', Name='$_POST[name]' WHERE ComponentID='$_POST[hidden]'";  
    mysql_query($UpdateQuery, $con);
};

//delete
if (isset($_POST['delete'])) {
	$DeleteQuery = "DELETE FROM `car component` WHERE ComponentID='$_POST[hidden]'";
    mysql_query($DeleteQuery, $con);
};

//add
if (isset($_POST['add'])) {
	$AddQuery = "INSERT INTO `car component` (ComponentID, Controller, Connector, Name) VALUES ('$_POST[ucomponentid]', '$_POST[ucontroller]', '$_POST[uconnector]', '$_POST[uname]')";
    mysql_query($AddQuery, $con);
};

$sql = "select * from `car component`";
$myData = mysql_query($sql, $con);

echo "<h3>Car Component Table</h3>";
echo "<table border=1>
<tr>
<th>ComponentID</th>
<th>Controller</th>
<th>Connector</th>
<th>Name</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=table2.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=componentid value=" . $record['ComponentID'] . " </td>";
	echo "<td>" . "<input type=text name=controller value=" . $record['Controller'] . " </td>"; 
	echo "<td>" . "<input type=text name=connector value=" . $record['Connector'] . " </td>";
	echo "<td>" . "<input type=text name=name value=" . $record['Name'] . " </td>";
	echo "<td>" . "<input type=hidden name=hidden value=" . $record['ComponentID'] . " </td>";
	echo "<td>" . "<input type=submit name=update value=update" . " </td>";
	echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
	echo "</tr>";
	echo "</form>";
}
echo "<form action=table2.php method=post>";
echo "<tr>";
echo "<td><input type=text name=ucomponentid></td>";
echo "<td><input type=text name=ucontroller></td>";
echo "<td><input type=text name=uconnector></td>";
echo "<td><input type=text name=uname></td>";
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
