-- Sample SELECT queries for use with the SER 322 Group 10 Final Project

SELECT DISTINCT (Controller.Name, Car.Make, Car.Model, Car.Year) FROM (Controller, Car) WHERE Controller.Supplier = “Continental”;

-- Displays all controllers made by Continental, as well as the make, model, and year of the car that the controller is in. 

SELECT DISTINCT (Controller.Name AS Controller, CAN Signals.Address, CAN Signals.Name, CAN Signals.Units) FROM (CAN Signals, Controller) WHERE CAN Signals.Controller = Controller.ControllerID; 

-- Displays all CAN Signals as well as the name of which name of the controller that produces the signals. 

SELECT DISTINCT (Connector.Manufacturer AS “Connector Manufacturer”, Connector.PinType, Component.Name AS “Component Name”, Controller.Name AS “Controller Name”) WHERE (Connector.PinType = “male”, Connector.ConnectorID = Component.Connector, Component.Controller = Controller.ControllerID)

-- Displays the manufacturer and PinType of all male connectors, as well as the name of the associated component and controller. 

SELECT DISTINCT(Make, Model, Type, Year) from Car ORDER BY Year DESC

-- Displays all cars in the database ordered by the manufacture year in descending order. 

SELECT DISTINCT(CAN Signals.Name, CAN Signals.Units, Controller. Name, Controller.Supplier, Car. Make, Car.Model, Car.Year) FROM (CAN Signals, Controller, Car) WHERE (CAN Signals.Controller = Controller.ControllerID, Controller.CarID = Car.CarID, CAN Signals.Name LIKE ‘%Pedal%’)

-- Displays all CAN Signals relating to pedals (either Brake or Acceleration pedals), as well as the name of the associated controller and the make, model, and year of the car. 