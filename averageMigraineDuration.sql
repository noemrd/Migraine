
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
-- AVERAGE MIGRAINE DURATION
-- XXXXXXXXXXXXXXXXXXXXXXXXXX
SELECT ROUND(SUM(totalTime) / count(totalTime), 0)  as AverageMigraineDurationInHours
FROM
(SELECT table1.UserID as UserID, table2.MigraineID as MigraineID, table2.MigraineStartTImestamp as start, table2.MigraineEndTImestamp as end, ROUND ((time_to_sec(timediff(table2.MigraineEndTImestamp, table2.MigraineStartTImestamp )) / 3600),0)as totalTime


-- GIVEN USER 
FROM 
(select UserID FROM Users where UserScreenName = "jhiggins" ) as table1

-- GIVEN DATES 
LEFT JOIN 
(select MigraineID, UserID, MigraineStartTImestamp, MigraineEndTImestamp, MigraineIntensityID, WaterIntakeTriggerID, StressTriggerID, PhysicalActivityTriggerID, SleepTriggerID, HormoneTriggerID from Migraine ) as table2 
ON table1.UserID = table2.UserID WHERE MigraineStartTImestamp >= '2016-07-02 14:35:10' AND MigraineStartTImestamp <= '2018-08-06 14:35:10') as tablle3


