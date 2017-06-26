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


$sql = "SELECT DISTINCT [CAN Signals].Name as SignalName, [CAN Signals].Units as Units, Controller.Name as ControllerName, Controller.Supplier as Supplier, Car.Make as Make, Car.Model as Model, Car.Year as Year FROM [CAN Signals], Controller, Car  ";
$myData = mysql_query($sql, $con);

echo "<h3>Controllers by Continental and the Cars they are on</h3>";
echo "<table border=1>
<tr>
<th>Signal Name</th>
<th>Units</th>
<th>Controller Name</th>
<th>Supplier</th>
<th>Car Make</th>
<th>Car Model</th>
<th>Car Year</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=query1.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=name value=" . $record['SignalName'] . " </td>";
	echo "<td>" . "<input type=text name=units value=" . $record['Units'] . " </td>"; 
	echo "<td>" . "<input type=text name=controllername value=" . $record['ControllerName'] . " </td>";
	echo "<td>" . "<input type=text name=supplier value=" . $record['Supplier'] . " </td>";
	echo "<td>" . "<input type=text name=make value=" . $record['Make'] . " </td>";
	echo "<td>" . "<input type=text name=model value=" . $record['Model'] . " </td>";
	echo "<td>" . "<input type=text name=year value=" . $record['Year'] . " </td>";
	echo "</tr>";
	echo "</form>";
}

echo "</form>";
echo "</table>";



mysql_close($con);
?>
</br>
<form action="home.php" method="post">
	<input id="button" type="submit" name="table6" value="Go Back" />
</form>

</body>

</html>
