SELECT Triggers, NumberofTriggers, NumberOfMigraines, Percentage
FROM
(-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- DETERMINE WATER TRIGGER
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT CONCAT('Low Water Intake Related Trigger (below 1.5 liters)' ) as Triggers, SUM(tablle2.NumberWaterIntakeTriggerValue ) as NumberofTriggers, tablle4.NumberOfMigraines as NumberOfMigraines,  ROUND(((SUM(tablle2.NumberWaterIntakeTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
FROM
(SELECT WaterIntakeTriggerValue, count(WaterIntakeTriggerValue) AS NumberWaterIntakeTriggerValue, MigraineID
FROM
(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
, table13.StressTriggerValue , table14.PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem
-- GET ALL MIGRAINE RECORD FOR GIVEN DATE AND GIVEN USER 
-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
FROM 
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as table10


-- GET MIGRAINE TRIGGER VALUES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx

-- GET HORMONE TRIGGER VALUES  
LEFT JOIN
(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
ON table10.HormoneTriggerID = table11.HormoneTriggerID 

-- GET WATER TRIGGER VALUES
LEFT JOIN
(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

-- GET STRESS TRIGGER VALUES
LEFT JOIN
(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
ON table10.StressTriggerID = table13.StressTriggerID 

-- GET PHYSICAL TRIGGER VALUES
LEFT JOIN
(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

-- GET SLEEP TRIGGER VALUE
LEFT JOIN
(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
ON table10.SleepTriggerID = table15.SleepTriggerID 




-- GET FOOD TRIGGER VALUES
LEFT JOIN
(select MigraineID, FoodTriggerItem
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
LEFT JOIN 
(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
ON table10.MigraineID = table16.MigraineID 



-- GET SENSORY TRIGGER VALUES
LEFT JOIN
(select MigraineID, SensoryTriggerValue
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab5.MigraineID as MigraineID,  GROUP_CONCAT(SensoryTriggerValue SEPARATOR ' ,  ') as SensoryTriggerValue 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab6.MigraineID as MigraineID, tab7.SensoryTriggerValue as SensoryTriggerValue FROM
(select SensoryTriggerID, MigraineID FROM HasSensoryTriggers) as tab6
LEFT JOIN 
(select SensoryTriggerID as SensoryTriggerID, SensoryTriggerValue as SensoryTriggerValue from SensoryTrigger) as tab7
ON tab6.SensoryTriggerID = tab7.SensoryTriggerID) as tab5 GROUP BY MigraineID) as tab7 ) as table17
ON table10.MigraineID = table17.MigraineID 
 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


JOIN
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
-- GET NUMBER OF MIGRAINES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
(SELECT count(distinct(MigraineID)) as NumberOfMigraines
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3) as tablle4







UNION ALL

-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- DETERMINE STRESS TRIGGER
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT CONCAT('Stress Related Trigger (moderate or extreme)' ) as StressTrigger, SUM(tablle2.NumberStressTriggerValue ) as NumberofStressTriggerValue, tablle4.NumberOfMigraines as NumberOfMigraines,  ROUND(((SUM(tablle2.NumberStressTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
FROM
(SELECT StressTriggerValue, count(StressTriggerValue) AS NumberStressTriggerValue, MigraineID
FROM
(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
, table13.StressTriggerValue  as StressTriggerValue, table14.PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem
-- GET ALL MIGRAINE RECORD FOR GIVEN DATE AND GIVEN USER 
-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
FROM 
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as table10


-- GET MIGRAINE TRIGGER VALUES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx

-- GET HORMONE TRIGGER VALUES  
LEFT JOIN
(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
ON table10.HormoneTriggerID = table11.HormoneTriggerID 

-- GET WATER TRIGGER VALUES
LEFT JOIN
(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

-- GET STRESS TRIGGER VALUES
LEFT JOIN
(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
ON table10.StressTriggerID = table13.StressTriggerID 

-- GET PHYSICAL TRIGGER VALUES
LEFT JOIN
(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

-- GET SLEEP TRIGGER VALUE
LEFT JOIN
(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
ON table10.SleepTriggerID = table15.SleepTriggerID 




-- GET FOOD TRIGGER VALUES
LEFT JOIN
(select MigraineID, FoodTriggerItem
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
LEFT JOIN 
(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
ON table10.MigraineID = table16.MigraineID 



-- GET SENSORY TRIGGER VALUES
LEFT JOIN
(select MigraineID, SensoryTriggerValue
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab5.MigraineID as MigraineID,  GROUP_CONCAT(SensoryTriggerValue SEPARATOR ' ,  ') as SensoryTriggerValue 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab6.MigraineID as MigraineID, tab7.SensoryTriggerValue as SensoryTriggerValue FROM
(select SensoryTriggerID, MigraineID FROM HasSensoryTriggers) as tab6
LEFT JOIN 
(select SensoryTriggerID as SensoryTriggerID, SensoryTriggerValue as SensoryTriggerValue from SensoryTrigger) as tab7
ON tab6.SensoryTriggerID = tab7.SensoryTriggerID) as tab5 GROUP BY MigraineID) as tab7 ) as table17
ON table10.MigraineID = table17.MigraineID 
 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


JOIN
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
-- GET NUMBER OF MIGRAINES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
(SELECT count(distinct(MigraineID)) as NumberOfMigraines
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3) as tablle4




UNION ALL

-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- DETERMINE PHYSICAL ACTIVITY TRIGGER
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT CONCAT('Exertion Related Trigger (moderate or extreme)' ) as PhysicalActivityTrigger, SUM(tablle2.NumberPhysicalActivityTriggerValue ) as NumberofPhysicalActivityTriggerValue, tablle4.NumberOfMigraines as NumberOfMigraines,  ROUND(((SUM(tablle2.NumberPhysicalActivityTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
FROM
(SELECT PhysicalActivityTriggerValue, count(PhysicalActivityTriggerValue) AS NumberPhysicalActivityTriggerValue, MigraineID
FROM
(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
, table13.StressTriggerValue  as StressTriggerValue, table14.PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem
-- GET ALL MIGRAINE RECORD FOR GIVEN DATE AND GIVEN USER 
-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
FROM 
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as table10


-- GET MIGRAINE TRIGGER VALUES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx

-- GET HORMONE TRIGGER VALUES  
LEFT JOIN
(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
ON table10.HormoneTriggerID = table11.HormoneTriggerID 

-- GET WATER TRIGGER VALUES
LEFT JOIN
(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

-- GET STRESS TRIGGER VALUES
LEFT JOIN
(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
ON table10.StressTriggerID = table13.StressTriggerID 

-- GET PHYSICAL TRIGGER VALUES
LEFT JOIN
(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

-- GET SLEEP TRIGGER VALUE
LEFT JOIN
(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
ON table10.SleepTriggerID = table15.SleepTriggerID 




-- GET FOOD TRIGGER VALUES
LEFT JOIN
(select MigraineID, FoodTriggerItem
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
LEFT JOIN 
(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
ON table10.MigraineID = table16.MigraineID 



-- GET SENSORY TRIGGER VALUES
LEFT JOIN
(select MigraineID, SensoryTriggerValue
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab5.MigraineID as MigraineID,  GROUP_CONCAT(SensoryTriggerValue SEPARATOR ' ,  ') as SensoryTriggerValue 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab6.MigraineID as MigraineID, tab7.SensoryTriggerValue as SensoryTriggerValue FROM
(select SensoryTriggerID, MigraineID FROM HasSensoryTriggers) as tab6
LEFT JOIN 
(select SensoryTriggerID as SensoryTriggerID, SensoryTriggerValue as SensoryTriggerValue from SensoryTrigger) as tab7
ON tab6.SensoryTriggerID = tab7.SensoryTriggerID) as tab5 GROUP BY MigraineID) as tab7 ) as table17
ON table10.MigraineID = table17.MigraineID 
 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


JOIN
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
-- GET NUMBER OF MIGRAINES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
(SELECT count(distinct(MigraineID)) as NumberOfMigraines
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3) as tablle4






UNION ALL
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- DETERMINE HORMONE TRIGGER
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT CONCAT('Hormone Related Trigger (menstruation)' ) as HormoneTrigger, SUM(tablle2.NumberHormoneTriggerValue ) as NumberofHormoneTriggerValue, tablle4.NumberOfMigraines as NumberOfMigraines,  ROUND(((SUM(tablle2.NumberHormoneTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
FROM
(SELECT HormoneTriggerValue, count(HormoneTriggerValue) AS NumberHormoneTriggerValue, MigraineID
FROM
(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
, table13.StressTriggerValue  as StressTriggerValue, table14.PhysicalActivityTriggerValue AS PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem
-- GET ALL MIGRAINE RECORD FOR GIVEN DATE AND GIVEN USER 
-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
FROM 
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as table10


-- GET MIGRAINE TRIGGER VALUES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx

-- GET HORMONE TRIGGER VALUES  
LEFT JOIN
(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
ON table10.HormoneTriggerID = table11.HormoneTriggerID 

-- GET WATER TRIGGER VALUES
LEFT JOIN
(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

-- GET STRESS TRIGGER VALUES
LEFT JOIN
(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
ON table10.StressTriggerID = table13.StressTriggerID 

-- GET PHYSICAL TRIGGER VALUES
LEFT JOIN
(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

-- GET SLEEP TRIGGER VALUE
LEFT JOIN
(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
ON table10.SleepTriggerID = table15.SleepTriggerID 




-- GET FOOD TRIGGER VALUES
LEFT JOIN
(select MigraineID, FoodTriggerItem
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
LEFT JOIN 
(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
ON table10.MigraineID = table16.MigraineID 



-- GET SENSORY TRIGGER VALUES
LEFT JOIN
(select MigraineID, SensoryTriggerValue
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab5.MigraineID as MigraineID,  GROUP_CONCAT(SensoryTriggerValue SEPARATOR ' ,  ') as SensoryTriggerValue 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab6.MigraineID as MigraineID, tab7.SensoryTriggerValue as SensoryTriggerValue FROM
(select SensoryTriggerID, MigraineID FROM HasSensoryTriggers) as tab6
LEFT JOIN 
(select SensoryTriggerID as SensoryTriggerID, SensoryTriggerValue as SensoryTriggerValue from SensoryTrigger) as tab7
ON tab6.SensoryTriggerID = tab7.SensoryTriggerID) as tab5 GROUP BY MigraineID) as tab7 ) as table17
ON table10.MigraineID = table17.MigraineID 
 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


JOIN
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
-- GET NUMBER OF MIGRAINES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
(SELECT count(distinct(MigraineID)) as NumberOfMigraines
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3) as tablle4






UNION ALL

-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- DETERMINE SLEEP TRIGGER
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT CONCAT('Sleep Related Trigger (less than 6 hours)' ) as SleepTrigger, SUM(tablle2.NumberSleepTriggerValue ) as NumberofSleepTriggerValue, tablle4.NumberOfMigraines as NumberOfMigraines,  ROUND(((SUM(tablle2.NumberSleepTriggerValue ) / tablle4.NumberOfMigraines) * 100),0) as Percentage
FROM
(SELECT SleepTriggerValue, count(SleepTriggerValue) AS NumberSleepTriggerValue, MigraineID
FROM
(select table10.MigraineID, table12.WaterIntakeTriggerValue as WaterIntakeTriggerValue
, table13.StressTriggerValue  as StressTriggerValue, table14.PhysicalActivityTriggerValue AS PhysicalActivityTriggerValue, table11.HormoneTriggerValue as HormoneTriggerValue, table16.FoodTriggerItem, table15.SleepTriggerValue
-- GET ALL MIGRAINE RECORD FOR GIVEN DATE AND GIVEN USER 
-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
FROM 
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as table10


-- GET MIGRAINE TRIGGER VALUES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx

-- GET HORMONE TRIGGER VALUES  
LEFT JOIN
(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger where HormoneTriggerID = 1 ) as table11
ON table10.HormoneTriggerID = table11.HormoneTriggerID 

-- GET WATER TRIGGER VALUES
LEFT JOIN
(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger where WaterIntakeTriggerID <= 3) as table12
ON table10.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 

-- GET STRESS TRIGGER VALUES
LEFT JOIN
(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger where StressTriggerID >=2 ) as table13
ON table10.StressTriggerID = table13.StressTriggerID 

-- GET PHYSICAL TRIGGER VALUES
LEFT JOIN
(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger where PhysicalActivityTriggerID >= 4) as table14
ON table10.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

-- GET SLEEP TRIGGER VALUE
LEFT JOIN
(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger where SleepTriggerID <= 3) as table15
ON table10.SleepTriggerID = table15.SleepTriggerID 




-- GET FOOD TRIGGER VALUES
LEFT JOIN
(select MigraineID, FoodTriggerItem
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab2.MigraineID as MigraineID,  GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
LEFT JOIN 
(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
ON table10.MigraineID = table16.MigraineID 



-- GET SENSORY TRIGGER VALUES
LEFT JOIN
(select MigraineID, SensoryTriggerValue
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab5.MigraineID as MigraineID,  GROUP_CONCAT(SensoryTriggerValue SEPARATOR ' ,  ') as SensoryTriggerValue 
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab6.MigraineID as MigraineID, tab7.SensoryTriggerValue as SensoryTriggerValue FROM
(select SensoryTriggerID, MigraineID FROM HasSensoryTriggers) as tab6
LEFT JOIN 
(select SensoryTriggerID as SensoryTriggerID, SensoryTriggerValue as SensoryTriggerValue from SensoryTrigger) as tab7
ON tab6.SensoryTriggerID = tab7.SensoryTriggerID) as tab5 GROUP BY MigraineID) as tab7 ) as table17
ON table10.MigraineID = table17.MigraineID 
 ) as tablle GROUP BY WaterIntakeTriggerValue) as tablle2


JOIN
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
-- GET NUMBER OF MIGRAINES
-- xxxxxxxxxxxxxxxxxxxxxxxxxxx
(SELECT count(distinct(MigraineID)) as NumberOfMigraines
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3) as tablle4




UNION ALL
(-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- DETERMINE SENSORY TRIGGER
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT Triggers, NumberofTriggers, NumberOfMigraines, ROUND(((SUM(NumberofTriggers) / NumberOfMigraines) * 100),0) as Percentage

FROM

(SELECT table20.SensoryTriggerValue as Triggers, table20.NumberSensoryTriggerValue as NumberofTriggers, table21.NumberOfMigraines as NumberOfMigraines 
FROM
(SELECT table3.SensoryTriggerValue as SensoryTriggerValue, count(table3.SensoryTriggerValue) as NumberSensoryTriggerValue

FROM 
-- USER INFO
(select UserID, UserScreenName FROM Users where UserScreenName = "jhiggins" ) as table1

-- DATE INFO
LEFT JOIN
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp  from Migraine ) as table2 ON table1.UserID = table2.UserID 

JOIN
(SELECT tab5.MigraineID as MigraineID, SensoryTriggerValue as SensoryTriggerValue 
FROM 
   -- GET ALL SENSORY TRIGGERS
(select tab6.MigraineID as MigraineID, tab7.SensoryTriggerValue as SensoryTriggerValue FROM
(select SensoryTriggerID, MigraineID FROM HasSensoryTriggers) as tab6
LEFT JOIN 
(select SensoryTriggerID as SensoryTriggerID, SensoryTriggerValue as SensoryTriggerValue from SensoryTrigger) as tab7
ON tab6.SensoryTriggerID = tab7.SensoryTriggerID) as tab5) as table3 ON table2.MigraineID = table3.MigraineID WHERE table2.MigraineStartTImestamp >= '2016-07-02 14:35:10'  AND table2.MigraineStartTImestamp <=  '2018-08-06 14:35:10' AND table1.UserScreenName = "jhiggins" AND SensoryTriggerValue  != "None" GROUP BY SensoryTriggerValue) as table20





JOIN
-- GET NUMBER OF MIGRAINES
(SELECT count(distinct(MigraineID)) as NumberOfMigraines
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE  MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3
) as table21) as table22 WHERE NumberofTriggers > 0 GROUP BY Triggers ORDER BY Percentage DESC

)



UNION ALL
(-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- DETERMINE FOOD TRIGGER
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT Triggers, NumberofTriggers, NumberOfMigraines, ROUND(((SUM(NumberofTriggers) / NumberOfMigraines) * 100),0) as Percentage

FROM

(SELECT table20.FoodTriggerItem as Triggers, table20.NumberFoodTriggerItem as NumberofTriggers, table21.NumberOfMigraines as NumberOfMigraines 
FROM
(SELECT table3.FoodTriggerItem as FoodTriggerItem, count(table3.FoodTriggerItem) as NumberFoodTriggerItem

FROM 
-- USER INFO
(select UserID, UserScreenName FROM Users where UserScreenName = "jhiggins" ) as table1

-- DATE INFO
LEFT JOIN
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp  from Migraine ) as table2 ON table1.UserID = table2.UserID 

JOIN
(SELECT tab5.MigraineID as MigraineID, FoodTriggerItem as FoodTriggerItem 
FROM 
   -- GET ALL Food TRIGGERS
(select tab6.MigraineID as MigraineID, tab7.FoodTriggerItem as FoodTriggerItem FROM
(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab6
LEFT JOIN 
(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab7
ON tab6.FoodTriggerID = tab7.FoodTriggerID) as tab5) as table3 ON table2.MigraineID = table3.MigraineID WHERE table2.MigraineStartTImestamp >= '2016-07-02 14:35:10'  AND table2.MigraineStartTImestamp <=  '2018-08-06 14:35:10' AND table1.UserScreenName = "jhiggins" AND FoodTriggerItem  != "None" GROUP BY FoodTriggerItem) as table20





JOIN
-- GET NUMBER OF MIGRAINES
(SELECT count(distinct(MigraineID)) as NumberOfMigraines
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE  MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3
) as table21) as table22 WHERE NumberofTriggers > 0 GROUP BY Triggers ORDER BY Percentage DESC
)
ORDER BY PERCENTAGE DESC)  as TriggerTable

WHERE PERCENTAGE > 0 ORDER BY PERCENTAGE DESC












