SET ECHO OFF
SET VERIFY OFF

PROMPT 
PROMPT specify password for HMS as parameter 1:
DEFINE pass     = &1
PROMPT 
PROMPT specify default tablespace for HMS as parameter 2:
DEFINE tbs      = &2
PROMPT 
PROMPT specify temporary tablespace for HMS as parameter 3:
DEFINE ttbs     = &3
PROMPT 
PROMPT specify password for SYS as parameter 4:
DEFINE pass_sys = &4
PROMPT 
PROMPT specify log path as parameter 5:
DEFINE log_path = &5
PROMPT
PROMPT specify connect string as parameter 6:
DEFINE connect_string     = &6
PROMPT

DEFINE spool_file = &log_path.hms_main.log
SPOOL &spool_file

REM =======================================================
REM cleanup section
REM =======================================================

DROP USER hms CASCADE;

REM =======================================================
REM create user
REM three separate commands, so the create user command 
REM will succeed regardless of the existence of the 
REM specified tablespaces 
REM =======================================================

CREATE USER hms IDENTIFIED BY &pass;

ALTER USER hms DEFAULT TABLESPACE &tbs
              QUOTA UNLIMITED ON &tbs;

ALTER USER hms TEMPORARY TABLESPACE &ttbs;

GRANT CREATE SESSION, CREATE VIEW, ALTER SESSION, CREATE SEQUENCE TO hms;
GRANT CREATE SYNONYM, CREATE DATABASE LINK, RESOURCE, UNLIMITED TABLESPACE TO hms;

REM =======================================================
REM grants from sys schema
REM =======================================================

CONNECT sys/&pass_sys@&connect_string AS SYSDBA;
GRANT execute ON sys.dbms_stats TO hms;

REM =======================================================
REM create hms schema objects
REM =======================================================

CONNECT hms/&pass@&connect_string
ALTER SESSION SET NLS_LANGUAGE=American;
ALTER SESSION SET NLS_TERRITORY=America;

--
-- create tables, sequences, and constraints
--

--@__SUB__CWD__/hostel_management/hms_cre

-- 
-- populate tables
--

--@__SUB__CWD__/hostel_management/hms_popul

--
-- create indexes
--

--@__SUB__CWD__/hostel_management/hms_idx

--
-- create procedural objects
--

--@__SUB__CWD__/hostel_management/hms_code

--
-- add comments to tables and columns
--

--@__SUB__CWD__/hostel_management/hms_comnt

--
-- gather schema statistics
--

--@__SUB__CWD__/hostel_management/hms_analz

spool off
