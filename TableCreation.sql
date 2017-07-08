-- DROP TABLE IF  EXIST
DROP TABLE IF EXISTS `HasFoodTriggers`;
DROP TABLE IF EXISTS `HasSensoryTriggers`;
DROP TABLE IF EXISTS `Migraine`;
DROP TABLE IF EXISTS `MigraineIntensity`;
DROP TABLE IF EXISTS `HormoneTrigger`;
DROP TABLE IF EXISTS `SleepTrigger`;
DROP TABLE IF EXISTS `PhysicalActivityTrigger`;
DROP TABLE IF EXISTS `StressTrigger`;
DROP TABLE IF EXISTS `WaterIntakeTrigger`;
DROP TABLE IF EXISTS `SensoryTrigger`;
DROP TABLE IF EXISTS `FoodDrinkTrigger`;
DROP TABLE IF EXISTS `Users`;


-- CREATE TABLES
# Create Users Table
CREATE TABLE Users(
 UserID int(11) NOT NULL AUTO_INCREMENT,
 UserFirstName varchar(255) NOT NULL,
 UserLastName varchar(255) NOT NULL,
 UserScreenName varchar(255) NOT NULL,
 UserPassword varchar(255) NOT NULL,
 PRIMARY KEY (UserID)
) ENGINE=InnoDB;
ALTER TABLE Users ADD UNIQUE (UserScreenName);


# Create MigraineIntensity Table
CREATE TABLE MigraineIntensity(
 MigraineIntensityID int(11) NOT NULL AUTO_INCREMENT,
 MigraineIntensityValue int(11)  NOT NULL,
 PRIMARY KEY (MigraineIntensityID)
) ENGINE=InnoDB;


# Create FoodDrinkTrigger Table
CREATE TABLE FoodDrinkTrigger(
 FoodTriggerID int(11) NOT NULL AUTO_INCREMENT,
 FoodTriggerItem varchar(255) NOT NULL,
 PRIMARY KEY (FoodTriggerID)
) ENGINE=InnoDB;


# Create SensoryTrigger Table
CREATE TABLE SensoryTrigger(
 SensoryTriggerID int(11) NOT NULL AUTO_INCREMENT,
 SensoryTriggerValue varchar(255) NOT NULL,
 PRIMARY KEY (SensoryTriggerID)
) ENGINE=InnoDB;


# Create WaterIntakeTrigger Table
CREATE TABLE WaterIntakeTrigger(
 WaterIntakeTriggerID int(11) NOT NULL AUTO_INCREMENT,
 WaterIntakeTriggerValue varchar(255) NOT NULL,
 PRIMARY KEY (WaterIntakeTriggerID)
) ENGINE=InnoDB;


# Create StressTrigger Table
CREATE TABLE StressTrigger(
 StressTriggerID int(11) NOT NULL AUTO_INCREMENT,
 StressTriggerValue varchar(255) NOT NULL,
 PRIMARY KEY (StressTriggerID)
) ENGINE=InnoDB;


# Create PhysicalActivityTrigger Table
CREATE TABLE PhysicalActivityTrigger(
 PhysicalActivityTriggerID int(11) NOT NULL AUTO_INCREMENT,
 PhysicalActivityTriggerValue varchar(255) NOT NULL,
 PRIMARY KEY (PhysicalActivityTriggerID)
) ENGINE=InnoDB;


# Create SleepTrigger Table
CREATE TABLE SleepTrigger(
 SleepTriggerID int(11) NOT NULL AUTO_INCREMENT,
 SleepTriggerValue varchar(255) NOT NULL,
 PRIMARY KEY (SleepTriggerID)
) ENGINE=InnoDB;


# Create HormoneTrigger Table
CREATE TABLE HormoneTrigger(
 HormoneTriggerID int(11) NOT NULL AUTO_INCREMENT,
 HormoneTriggerValue varchar(255) NOT NULL,
 PRIMARY KEY (HormoneTriggerID)
) ENGINE=InnoDB;


# Create Migraine Table
CREATE TABLE Migraine (
MigraineID int(11) NOT NULL AUTO_INCREMENT,
MigraineStartTImestamp timestamp,
MigraineEndTImestamp timestamp ,
UserID int(11),
MigraineIntensityID int(11),
WaterIntakeTriggerID int(11),
StressTriggerID int(11),
PhysicalActivityTriggerID int(11),
SleepTriggerID int(11),
HormoneTriggerID int(11),
PRIMARY KEY (MigraineID),
FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (MigraineIntensityID) REFERENCES MigraineIntensity(MigraineIntensityID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (UserID) REFERENCES Users(UserID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (WaterIntakeTriggerID) REFERENCES WaterIntakeTrigger(WaterIntakeTriggerID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (StressTriggerID) REFERENCES StressTrigger(StressTriggerID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (PhysicalActivityTriggerID) REFERENCES PhysicalActivityTrigger(PhysicalActivityTriggerID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (SleepTriggerID) REFERENCES SleepTrigger(SleepTriggerID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (HormoneTriggerID) REFERENCES HormoneTrigger(HormoneTriggerID) ON DELETE SET NULL ON UPDATE CASCADE
)ENGINE=InnoDB;
ALTER TABLE Migraine ADD UNIQUE (MigraineStartTImestamp, UserID);


# Create HasFoodTriggers Table
CREATE TABLE HasFoodTriggers(
 MigraineID int(11), 
 FoodTriggerID int(11),
FOREIGN KEY (FoodTriggerID) REFERENCES FoodDrinkTrigger(FoodTriggerID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (MigraineID) REFERENCES Migraine(MigraineID) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;


# Create HasSensoryTriggers Table
CREATE TABLE HasSensoryTriggers(
 MigraineID int(11), 
 SensoryTriggerID int(11),
FOREIGN KEY (SensoryTriggerID) REFERENCES SensoryTrigger(SensoryTriggerID) ON DELETE SET NULL ON UPDATE CASCADE,
FOREIGN KEY (MigraineID) REFERENCES Migraine(MigraineID) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB;


-- INSERT VALUES

# Insert values into Users
INSERT INTO Users (UserFirstName, UserLastName, UserScreenName, UserPassword) VALUES
	("Jessica", "Higgins", "jhiggins", "password1");
INSERT INTO Users (UserFirstName, UserLastName, UserScreenName, UserPassword) VALUES
	("David", "Hart", "dhart", "password2");


# Insert values into MigraineIntensity
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(1);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(2);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(3);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(4);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(5);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(6);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(7);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(8);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(9);
INSERT INTO MigraineIntensity (MigraineIntensityValue) VALUES
	(10);


# Insert values into FoodTriggerItem
INSERT INTO FoodDrinkTrigger (FoodTriggerItem) VALUES
	("Chocolate");
INSERT INTO FoodDrinkTrigger (FoodTriggerItem) VALUES
	("Alcohol");
INSERT INTO FoodDrinkTrigger (FoodTriggerItem) VALUES
	("Cheese");
INSERT INTO FoodDrinkTrigger (FoodTriggerItem) VALUES
	("Citrus Fruit");
INSERT INTO FoodDrinkTrigger (FoodTriggerItem) VALUES
	("Caffeine");
INSERT INTO FoodDrinkTrigger (FoodTriggerItem) VALUES
	("Nitrates /Nitrate containing food (such as hot dog, deli meat, jerky, canned food)");
INSERT INTO FoodDrinkTrigger (FoodTriggerItem) VALUES
	("MSG containing food");
INSERT INTO FoodDrinkTrigger (FoodTriggerItem) VALUES
	("None");



# Insert values into SensoryTrigger
INSERT INTO SensoryTrigger (SensoryTriggerValue) VALUES
	("Exposed to bright light");
INSERT INTO SensoryTrigger (SensoryTriggerValue) VALUES
	("Exposed to loud sounds");
INSERT INTO SensoryTrigger (SensoryTriggerValue) VALUES
	("Exposed to strong smells");
INSERT INTO SensoryTrigger (SensoryTriggerValue) VALUES
	("Exposed to temperature change");
INSERT INTO SensoryTrigger (SensoryTriggerValue) VALUES
	("Exposed to pressure change");
INSERT INTO SensoryTrigger (SensoryTriggerValue) VALUES
	("None");


# Insert values into WaterIntakeTrigger
INSERT INTO WaterIntakeTrigger (WaterIntakeTriggerValue) VALUES
	("Had below 0.5 liters of water");
INSERT INTO WaterIntakeTrigger (WaterIntakeTriggerValue) VALUES
	("Had between 0.5 and 1 liters of water");
INSERT INTO WaterIntakeTrigger (WaterIntakeTriggerValue) VALUES
	("Had between 1 and 1.5 liters of water");
INSERT INTO WaterIntakeTrigger (WaterIntakeTriggerValue) VALUES
	("Had between 1.5 and 2 liters of water");
INSERT INTO WaterIntakeTrigger (WaterIntakeTriggerValue) VALUES
	("Had between 2 and 2.5 liters of water");
INSERT INTO WaterIntakeTrigger (WaterIntakeTriggerValue) VALUES
	("Had between 2.5 and 3 liters of water");
INSERT INTO WaterIntakeTrigger (WaterIntakeTriggerValue) VALUES
	("Had beyond 3 liters of water");




# Insert values into StressTrigger
INSERT INTO StressTrigger (StressTriggerValue) VALUES
	("Not stressed");
INSERT INTO StressTrigger (StressTriggerValue) VALUES
	("Slightly stressed");
INSERT INTO StressTrigger (StressTriggerValue) VALUES
	("Moderately stressed");
INSERT INTO StressTrigger (StressTriggerValue) VALUES
	("Extremely stressed");



# Insert values into PhysicalActivityTrigger
INSERT INTO PhysicalActivityTrigger (PhysicalActivityTriggerValue) VALUES
	("Extremely inactive");
INSERT INTO PhysicalActivityTrigger (PhysicalActivityTriggerValue) VALUES
	("Moderately inactive");
INSERT INTO PhysicalActivityTrigger (PhysicalActivityTriggerValue) VALUES
	("Neutral");
INSERT INTO PhysicalActivityTrigger (PhysicalActivityTriggerValue) VALUES
	("Moderately active");
INSERT INTO PhysicalActivityTrigger (PhysicalActivityTriggerValue) VALUES
	("Extremely active");

# Insert values into SleepTrigger
INSERT INTO SleepTrigger (SleepTriggerValue) VALUES
	("Did not sleep");
INSERT INTO SleepTrigger (SleepTriggerValue) VALUES
	("Between 1 and 3 hours of sleep");
INSERT INTO SleepTrigger (SleepTriggerValue) VALUES
	("Between 4 and 6 hours of sleep");
INSERT INTO SleepTrigger (SleepTriggerValue) VALUES
	("Between 7 and 9 hours of sleep");
INSERT INTO SleepTrigger (SleepTriggerValue) VALUES
	("Above 10 hours of sleep");


# Insert values into HormoneTrigger
INSERT INTO HormoneTrigger (HormoneTriggerValue) VALUES
	("Menstruation");
INSERT INTO HormoneTrigger (HormoneTriggerValue) VALUES
	("Follicular Phase: 0 to 14 days from menstruation");
INSERT INTO HormoneTrigger (HormoneTriggerValue) VALUES
	("Luteal phase: 14 to 28 days from menstruation");
INSERT INTO HormoneTrigger (HormoneTriggerValue) VALUES
	("None of these");

# Insert values into Migraine
INSERT INTO Migraine 
	SET MigraineStartTImestamp =  "2017-07-02 14::35:10",
	MigraineEndTImestamp ="2017-07-03 00:35:10", 
	UserID = (
		SELECT UserID
		FROM Users
		WHERE UserScreenName = "jhiggins"),
MigraineIntensityID = (
		SELECT MigraineIntensityID
		FROM MigraineIntensity
		WHERE MigraineIntensityValue = 4),
WaterIntakeTriggerID = (
		SELECT WaterIntakeTriggerID
		FROM WaterIntakeTrigger
		WHERE WaterIntakeTriggerValue = "Had between 1 and 1.5 liters of water"),
StressTriggerID = (
		SELECT StressTriggerID
		FROM StressTrigger
		WHERE StressTriggerValue = "Not stressed"),
PhysicalActivityTriggerID = (
		SELECT PhysicalActivityTriggerID
		FROM PhysicalActivityTrigger
		WHERE PhysicalActivityTriggerValue = "Moderately inactive"),
SleepTriggerID = (
		SELECT SleepTriggerID
		FROM SleepTrigger
		WHERE SleepTriggerValue = "Between 7 and 9 hours of sleep"),
HormoneTriggerID = (
		SELECT HormoneTriggerID
		FROM HormoneTrigger
		WHERE HormoneTriggerValue = "None of these");


# Insert values into HasFoodTriggers
INSERT INTO HasFoodTriggers 
	SET MigraineID = (
		SELECT table1.MigraineID 
                 	FROM 
(SELECT MigraineID, UserID FROM Migraine WHERE MigraineStartTImestamp = "2017-07-02 14:35:10")
AS table1
JOIN (SELECT UserID FROM Users WHERE UserScreenName = "jhiggins") 
AS  table2 ON table1.UserID = table2.UserID),
FoodTriggerID = (
		SELECT FoodTriggerID
		FROM FoodDrinkTrigger
		WHERE FoodTriggerItem = "Chocolate");

# Insert values into HasSensoryTriggers
INSERT INTO HasSensoryTriggers 
	SET MigraineID = (
		SELECT table1.MigraineID 
                 	FROM 
(SELECT MigraineID, UserID FROM Migraine WHERE MigraineStartTImestamp = "2017-07-02 14:35:10" )
AS table1
JOIN (SELECT UserID FROM Users WHERE UserScreenName = "jhiggins") 
AS  table2 ON table1.UserID = table2.UserID),
SensoryTriggerID = (
		SELECT SensoryTriggerID
		FROM SensoryTrigger
		WHERE SensoryTriggerValue = "Exposed to bright light");





