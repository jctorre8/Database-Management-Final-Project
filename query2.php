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


$sql = "SELECT DISTINCT Controller.Name as ControllerName, Car.Make as CarMake, Car.Model as CarModel, Car.Year as CarYear, Car.Type as CarType FROM (Controller, Car) WHERE Controller.Supplier = 'Continental' and Car.CarID = Controller.CarID ";
$myData = mysql_query($sql, $con);

echo "<h3>Displays all CAN Signals as well as the name of which name of the controller that produces the signals.</h3>";
echo "SELECT DISTINCT Controller.Name as ControllerName, Car.Make as CarMake, Car.Model as CarModel, Car.Year as CarYear, Car.Type as CarType FROM (Controller, Car) WHERE Controller.Supplier = 'Continental' and Car.CarID = Controller.CarID";
echo "<br/>";
echo "<br/>";
echo "<table border=1>
<tr>
<th>ControllerName</th>
<th>CarMake</th>
<th>CarModel</th>
<th>CarYear</th>
<th>CarType</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=query2.php method=post>";
	echo "<tr>";
	echo "<td>" . $record['ControllerName'] . " </td>";
	echo "<td>" . $record['CarMake'] . " </td>"; 
	echo "<td>" . $record['CarModel'] . " </td>";
	echo "<td>" . $record['CarYear'] . " </td>";
	echo "<td>" . $record['CarType'] . " </td>";
	echo "</tr>";
	echo "</form>";
}

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
