
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- ALL MIGRAINE RECORDS
-- XXXXXXXXXXXXXXXXXXXXXXXXXX

SELECT  tabl1.MigraineID, tabl1.MigraineStartTImestamp, tabl1.MigraineEndTImestamp, tabl1.MigraineIntensityID, table11.HormoneTriggerValue, table12.WaterIntakeTriggerValue, table13.StressTriggerValue, table14.PhysicalActivityTriggerValue, table15.SleepTriggerValue, table16.FoodTriggerItem, table17.SensoryTriggerValue
FROM
(

 SELECT MigraineID, MigraineStartTImestamp, MigraineEndTImestamp, MigraineIntensityID, SleepTriggerID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID,HormoneTriggerID  FROM

(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID,  table2.MigraineStartTImestamp as MigraineStartTImestamp, table2.MigraineEndTImestamp as MigraineEndTImestamp,  table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp, MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10'
) as tablle3) as tabl1

LEFT JOIN
(select HormoneTriggerID as HormoneTriggerID, HormoneTriggerValue as HormoneTriggerValue from HormoneTrigger ) as table11
ON tabl1.HormoneTriggerID = table11.HormoneTriggerID 


LEFT JOIN
(select WaterIntakeTriggerID as WaterIntakeTriggerID, WaterIntakeTriggerValue as WaterIntakeTriggerValue from WaterIntakeTrigger) as table12
ON tabl1.WaterIntakeTriggerID = table12.WaterIntakeTriggerID 


-- GET STRESS TRIGGER VALUES
LEFT JOIN
(select StressTriggerID as StressTriggerID, StressTriggerValue as StressTriggerValue from StressTrigger ) as table13
ON tabl1.StressTriggerID = table13.StressTriggerID 

-- GET PHYSICAL TRIGGER VALUES
LEFT JOIN
(select PhysicalActivityTriggerID as PhysicalActivityTriggerID, PhysicalActivityTriggerValue as PhysicalActivityTriggerValue from PhysicalActivityTrigger) as table14
ON tabl1.PhysicalActivityTriggerID = table14.PhysicalActivityTriggerID 

-- GET SLEEP TRIGGER VALUE
LEFT JOIN
(select SleepTriggerID as SleepTriggerID, SleepTriggerValue as SleepTriggerValue from SleepTrigger) as table15
ON tabl1.SleepTriggerID = table15.SleepTriggerID 

-- GET FOOD TRIGGER VALUES
LEFT JOIN
(select MigraineID, FoodTriggerItem
FROM
    -- AGGREGRATE FOOD TRIGGERS
(SELECT tab2.MigraineID as MigraineID, GROUP_CONCAT(FoodTriggerItem SEPARATOR ' ,  ') as FoodTriggerItem  
FROM 
   -- GET ALL FOOD TRIGGERS
(select tab3.MigraineID as MigraineID, tab4.FoodTriggerItem as FoodTriggerItem FROM
(select FoodTriggerID, MigraineID FROM HasFoodTriggers) as tab3
LEFT JOIN 
(select FoodTriggerID as FoodTriggerID, FoodTriggerItem as FoodTriggerItem from FoodDrinkTrigger) as tab4
ON tab3.FoodTriggerID = tab4.FoodTriggerID) as tab2 GROUP BY MigraineID) as tab4 ) as table16
ON tabl1.MigraineID = table16.MigraineID 

-- GET SENSORY TRIGGER VALUES
LEFT JOIN
(select MigraineID, SensoryTriggerValue
FROM
    -- AGGREGRATE SENSORY TRIGGERS
(SELECT tab5.MigraineID as MigraineID,  GROUP_CONCAT(SensoryTriggerValue SEPARATOR ' ,  ') as SensoryTriggerValue 
FROM 
   -- GET ALL SENSORY TRIGGERS
(select tab6.MigraineID as MigraineID, tab7.SensoryTriggerValue as SensoryTriggerValue FROM
(select SensoryTriggerID, MigraineID FROM HasSensoryTriggers) as tab6
LEFT JOIN 
(select SensoryTriggerID as SensoryTriggerID, SensoryTriggerValue as SensoryTriggerValue from SensoryTrigger) as tab7
ON tab6.SensoryTriggerID = tab7.SensoryTriggerID) as tab5 GROUP BY MigraineID) as tab7 ) as table17
ON tabl1.MigraineID = table17.MigraineID
