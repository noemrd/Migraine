
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- AVERAGE MIGRAINE ATTACK
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT 
 ROUND( (tabllle1.NumberOfMigraines)/ ROUND((tabllle2.days/7), 0) , 0) as AverageMigrainePerWeek
FROM
(SELECT count(distinct(MigraineID)) as NumberOfMigraines
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineIntensityID as MigraineIntensityID, table2.WaterIntakeTriggerID as WaterIntakeTriggerID, table2.StressTriggerID as StressTriggerID, table2.PhysicalActivityTriggerID as PhysicalActivityTriggerID, table2.SleepTriggerID as SleepTriggerID, table2.HormoneTriggerID as HormoneTriggerID 

-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp, MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2017-10-01 14:35:10' AND MigraineStartTImestamp <= '2017-10-15 14:35:10') as tablle3) as tabllle1
JOIN
(SELECT  ABS(DATEDIFF( '2017-10-01 14:35:10', '2017-10-10 14:35:10' )) AS days) as tabllle2





