
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- AVERAGE MIGRAINE INTENSITY
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT ROUND( ( SUM(MigraineIntensityID )) / (count(distinct(MigraineID))) , 0)  as averageMigraineIntensity
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp, MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3
