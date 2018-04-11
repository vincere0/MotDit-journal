------------------------------------------------------------------------------------------------------------------------------------------------------------
-- Script Journal_MotDit
------------------------------------------------------------------------------------------------------------------------------------------------------------

USE master;

------------------------------------------------------------------------------------------------------------------------------------------------------------
-- Sauvegarde
------------------------------------------------------------------------------------------------------------------------------------------------------------

-- Drop database
IF DB_ID('Journal_MotDit') IS NOT NULL DROP DATABASE Journal_MotDit;

-- If database could not be created due to open connections, abort
IF @@ERROR = 3702 
   RAISERROR('Database cannot be dropped because there are still open connections.', 127, 127) WITH NOWAIT, LOG;

GO
CREATE DATABASE Journal_MotDit
	ON PRIMARY(
		NAME='Journal_MotDit', 
		FILENAME = 'H:\Site Web Journal\bd\Journal_MotDit.mdf', 
		SIZE=10MB, 
		MAXSIZE=20, 
		FILEGROWTH=10%)
	LOG ON(
		NAME='Journal_Motdit_log', 
		FILENAME = 'H:\Site Web Journal\bd\Journal_MotDit_log.ldf', 
		SIZE=10MB, 
		MAXSIZE=200, 
		FILEGROWTH=20%);
GO

------------------------------------------------------------------------------------------------------------------------------------------------------------
-- USE
------------------------------------------------------------------------------------------------------------------------------------------------------------

USE Journal_MotDit;
GO