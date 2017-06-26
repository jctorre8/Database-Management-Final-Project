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


$sql = "SELECT DISTINCT theSignals.Name as SignalName, theSignals.Units as SigUnits, Controller.Name as ControllerName, Controller.Supplier as ConSupplier, Car.Make as CarMake, Car.Model as CarModel, Car.Year as CarYear FROM `CAN Signals` as theSignals, Controller, Car WHERE theSignals.Controller = Controller.ControllerID and Controller.CarID = Car.CarID and theSignals.Name LIKE '%Pedal%' ";
$myData = mysql_query($sql, $con);

echo "<h3>Displays all CAN Signals relating to pedals (either Brake or Acceleration pedals), as well as the name of the associated controller and the make, model, and year of the car. </h3>";
echo "SELECT DISTINCT theSignals.Name as SignalName, theSignals.Units as SigUnits, Controller.Name as ControllerName, Controller.Supplier as ConSupplier, Car.Make as CarMake, Car.Model as CarModel, Car.Year as CarYear FROM `CAN Signals` as theSignals, Controller, Car WHERE theSignals.Controller = Controller.ControllerID and Controller.CarID = Car.CarID and theSignals.Name LIKE '%Pedal%'";
echo "<br/>";
echo "<br/>";	
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
	echo "<td>" . "<input type=text name=units value=" . $record['SigUnits'] . " </td>"; 
	echo "<td>" . "<input type=text name=controllername value=" . $record['ControllerName'] . " </td>";
	echo "<td>" . "<input type=text name=supplier value=" . $record['ConSupplier'] . " </td>";
	echo "<td>" . "<input type=text name=make value=" . $record['CarMake'] . " </td>";
	echo "<td>" . "<input type=text name=model value=" . $record['CarModel'] . " </td>";
	echo "<td>" . "<input type=text name=year value=" . $record['CarYear'] . " </td>";
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
