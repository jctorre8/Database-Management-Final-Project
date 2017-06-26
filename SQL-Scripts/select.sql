-- Sample SELECT queries for use with the SER 322 Group 10 Final Project

SELECT DISTINCT Controller.Name as ControllerName, Car.Make as CarMake, Car.Model as CarModel, Car.Year as CarYear, Car.Type as CarType FROM (Controller, Car) WHERE Controller.Supplier = 'Continental' and Car.CarID = Controller.CarID;

-- Displays all controllers made by Continental, as well as the make, model, and year of the car that the controller is in. 

SELECT DISTINCT Controller.Name AS Controller, `CAN Signals`.Address AS SignalAddress, `CAN Signals`.Name AS SignalName,`CAN Signals`.`Units` AS SignalUnits FROM `CAN Signals`, Controller WHERE `CAN Signals`.Controller = Controller.ControllerID";

-- Displays all CAN Signals as well as the name of which name of the controller that produces the signals. 

SELECT DISTINCT Connector.Manfacturer AS 'Connector Manufacturer', Connector.`Pin Type`, `Car Component`.Name AS 'Component Name', Controller.Name AS 'Controller Name' FROM Connector, `Car Component`, Controller WHERE Connector.`Pin Type` LIKE 'male' AND Connector.ConnectorID = `Car Component`.Connector AND `Car Component`.Controller = Controller.ControllerID;

-- Displays the manufacturer and PinType of all male connectors, as well as the name of the associated component and controller. 

SELECT DISTINCT Make, Model, Type, Year from Car ORDER BY Year DESC;

-- Displays all cars in the database ordered by the manufacture year in descending order. 

SELECT DISTINCT theSignals.Name as SignalName, theSignals.Units as SigUnits, Controller.Name as ControllerName, Controller.Supplier as ConSupplier, Car.Make as CarMake, Car.Model as CarModel, Car.Year as CarYear FROM `CAN Signals` as theSignals, Controller, Car WHERE theSignals.Controller = Controller.ControllerID and Controller.CarID = Car.CarID and theSignals.Name LIKE '%Pedal%';

-- Displays all CAN Signals relating to pedals (either Brake or Acceleration pedals), as well as the name of the associated controller and the make, model, and year of the car. 
