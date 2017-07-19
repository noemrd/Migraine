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
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-0214:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as table10


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
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-0214:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3) as tablle4






