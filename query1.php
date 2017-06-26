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

	
echo "<h3>Controllers by Continental and the Cars they are on</h3>";
echo "SELECT DISTINCT Controller.Name as ControllerName, Car.Make as CarMake, Car.Model as CarModel, Car.Year as CarYear, Car.Type as CarType FROM (Controller, Car) WHERE Controller.Supplier = 'Continental' and Car.CarID = Controller.CarID";
echo "<table border=1>
<tr>
<th>Controller Name</th>
<th>Car Make</th>
<th>Car Model</th>
<th>Car Trim</th>
<th>Car Year</th>
</tr>";
while($record = mysql_fetch_array($myData)) {
	echo "<form action=query1.php method=post>";
	echo "<tr>";
	echo "<td>" . "<input type=text name=carid value=" . $record['ControllerName'] . " </td>";
	echo "<td>" . "<input type=text name=make value=" . $record['CarMake'] . " </td>"; 
	echo "<td>" . "<input type=text name=model value=" . $record['CarModel'] . " </td>";
	echo "<td>" . "<input type=text name=type value=" . $record['CarType'] . " </td>";
	echo "<td>" . "<input type=text name=year value=" . $record['CarYear'] . " </td>";
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
