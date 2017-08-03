
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
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

