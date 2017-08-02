DELETE FROM Migraine Where MigraineID = 17; 
DELETE FROM HasFoodTriggers Where MigraineID = 17;
DELETE FROM HasSensoryTriggers Where MigraineID = 17;
DELETE FROM HasFoodTriggers Where MigraineID IS NULL;
DELETE FROM HasSensoryTriggers Where MigraineID IS NULL;
