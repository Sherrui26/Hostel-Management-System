SET FEEDBACK 1
SET NUMWIDTH 10
SET LINESIZE 80
SET TRIMSPOOL ON
SET TAB OFF
SET PAGESIZE 100
SET ECHO OFF 

REM ********************************************************************
REM Creating the tables for the Hostel Management System

Prompt ******  Creating ADMIN table ....

CREATE TABLE admin (
  id int NOT NULL,
  username varchar(50) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(50) NOT NULL,
  reg_date varchar(50) NOT NULL,
  updation_date varchar(50) NOT NULL
); 

Prompt ******  Creating ADMINLOG table ....

CREATE TABLE adminlog (
  id int NOT NULL,
  adminid int NOT NULL,
  ip varchar(255) NOT NULL,
  logintime timestamp DEFAULT current_timestamp
); 

Prompt ******  Creating COMPLAINTHISTORY table ....

CREATE TABLE complainthistory (
  id int NOT NULL,
  complaintid int NOT NULL,
  compalintStatus varchar(255) DEFAULT NULL,
  complaintRemark varchar(255) DEFAULT NULL,
  postingDate timestamp DEFAULT current_timestamp
); 

Prompt ******  Creating COMPLAINTS table ....

CREATE TABLE complaints (
  id int NOT NULL,
  ComplainNumber int DEFAULT NULL,
  userId int DEFAULT NULL,
  complaintType varchar(255) DEFAULT NULL,
  complaintDetails varchar(255) DEFAULT NULL,
  complaintDoc varchar(255) DEFAULT NULL,
  complaintStatus varchar(255) DEFAULT NULL,
  registrationDate timestamp DEFAULT current_timestamp
); 

Prompt ******  Creating COURSES table ....

CREATE TABLE courses (
  id int NOT NULL,
  course_code varchar(255) DEFAULT NULL,
  course_sn varchar(255) DEFAULT NULL,
  course_fn varchar(255) DEFAULT NULL,
  posting_date timestamp DEFAULT current_timestamp
); 

Prompt ******  Creating FEEDBACK table ....

CREATE TABLE feedback (
  id int NOT NULL,
  AccessibilityWarden varchar(255) DEFAULT NULL,
  AccessibilityMember varchar(255) DEFAULT NULL,
  RedressalProblem varchar(255) DEFAULT NULL,
  Room varchar(255) DEFAULT NULL,
  Mess varchar(255) DEFAULT NULL,
  HostelSurroundings varchar(255) DEFAULT NULL,
  OverallRating varchar(255) DEFAULT NULL,
  FeedbackMessage varchar(255) DEFAULT NULL,
  userId int DEFAULT NULL,
  postingDate timestamp DEFAULT current_timestamp
);

Prompt ******  Creating REGISTRATION table ....

CREATE TABLE registration (
  id int NOT NULL,
  roomno int DEFAULT NULL,
  seater int DEFAULT NULL,
  feespm int DEFAULT NULL,
  foodstatus int DEFAULT NULL,
  stayfrom date DEFAULT NULL,
  duration int DEFAULT NULL,
  course varchar(500) DEFAULT NULL,
  regno int DEFAULT NULL,
  firstName varchar(500) DEFAULT NULL,
  middleName varchar(500) DEFAULT NULL,
  lastName varchar(500) DEFAULT NULL,
  gender varchar(250) DEFAULT NULL,
  contactno int DEFAULT NULL,
  emailid varchar(500) DEFAULT NULL,
  egycontactno int DEFAULT NULL,
  guardianName varchar(500) DEFAULT NULL,
  guardianRelation varchar(500) DEFAULT NULL,
  guardianContactno int DEFAULT NULL,
  corresAddress varchar(500) DEFAULT NULL,
  corresCIty varchar(500) DEFAULT NULL,
  corresState varchar(500) DEFAULT NULL,
  corresPincode int DEFAULT NULL,
  pmntAddress varchar(500) DEFAULT NULL,
  pmntCity varchar(500) DEFAULT NULL,
  pmnatetState varchar(500) DEFAULT NULL,
  pmntPincode int DEFAULT NULL,
  postingDate timestamp DEFAULT current_timestamp,
  updationDate varchar(500) DEFAULT NULL
);

Prompt ******  Creating ROOMS table ....

CREATE TABLE rooms (
  id int NOT NULL,
  seater int DEFAULT NULL,
  room_no int DEFAULT NULL,
  fees int DEFAULT NULL,
  posting_date timestamp DEFAULT current_timestamp
);

Prompt ******  Creating STATES table ....

CREATE TABLE states (
  id int NOT NULL,
  State varchar(150) DEFAULT NULL
);

Prompt ******  Creating USERLOG table ....

CREATE TABLE userlog (
  id int NOT NULL,
  userId int NOT NULL,
  userEmail varchar(255) NOT NULL,
  userIp varchar(255) NOT NULL,
  city varchar(255) NOT NULL,
  country varchar(255) NOT NULL,
  loginTime timestamp DEFAULT current_timestamp
);

Prompt ******  Creating USERREGISTRATION table ....

CREATE TABLE userregistration (
  id int NOT NULL,
  regNo varchar(255) DEFAULT NULL,
  firstName varchar(255) DEFAULT NULL,
  middleName varchar(255) DEFAULT NULL,
  lastName varchar(255) DEFAULT NULL,
  gender varchar(255) DEFAULT NULL,
  contactNo int DEFAULT NULL,
  email varchar(255) DEFAULT NULL,
  password varchar(255) DEFAULT NULL,
  regDate timestamp DEFAULT current_timestamp,
  updationDate varchar(45) DEFAULT NULL,
  passUdateDate varchar(45) DEFAULT NULL
);

REM ********************************************************************
REM Altering the tables to add primary keys and necessary constraints

Prompt ******  Adding PRIMARY KEY constraints ....

ALTER TABLE admin
  ADD PRIMARY KEY (id);

ALTER TABLE complainthistory
  ADD PRIMARY KEY (id);

ALTER TABLE complaints
  ADD PRIMARY KEY (id);

ALTER TABLE courses
  ADD PRIMARY KEY (id);

ALTER TABLE feedback
  ADD PRIMARY KEY (id);

ALTER TABLE registration
  ADD PRIMARY KEY (id);

ALTER TABLE rooms
  ADD PRIMARY KEY (id);
--room_no index for rooms--
CREATE INDEX room_no ON rooms (room_no);

ALTER TABLE states
  ADD PRIMARY KEY (id);

ALTER TABLE userlog
  ADD PRIMARY KEY (id);

ALTER TABLE userregistration
  ADD PRIMARY KEY (id);
--email index for userregistration--
CREATE INDEX email ON userregistration (email);

REM ********************************************************************
REM Setting AUTO_INCREMENT for tables

Prompt ******  Setting AUTO_INCREMENT values ....

-- ALTER TABLE admin
--  MODIFY id int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- AUTO_INCREMENT FOR ADMIN --
CREATE SEQUENCE admin_seq
START WITH 2 -- start with 2
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER admin_bir
BEFORE INSERT ON admin
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT admin_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR COMPLAINTHISTORY --
CREATE SEQUENCE complainthistory_seq
START WITH 12
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER complainthistory_bir
BEFORE INSERT ON complainthistory
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT complainthistory_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR COMPLAINTS--
CREATE SEQUENCE complaints_seq
START WITH 8
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER complaints_bir
BEFORE INSERT ON complaints
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT complaints_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR COURSES --
CREATE SEQUENCE courses_seq
START WITH 9
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER courses_bir
BEFORE INSERT ON courses
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT courses_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR FEEDBACK --
CREATE SEQUENCE feedback_seq
START WITH 5
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER feedback_bir
BEFORE INSERT ON feedback
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT feedback_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR REGISTRATION --
CREATE SEQUENCE registration_seq
START WITH 7
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER registration_bir
BEFORE INSERT ON registration
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT registration_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR ROOMS --
CREATE SEQUENCE rooms_seq
START WITH 7
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER rooms_bir
BEFORE INSERT ON rooms
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT rooms_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR STATES --
CREATE SEQUENCE states_seq
START WITH 37
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER states_bir
BEFORE INSERT ON states
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT states_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR USERLOG --
CREATE SEQUENCE userlog_seq
START WITH 11
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER userlog_bir
BEFORE INSERT ON userlog
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT userlog_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
-- AUTO_INCREMENT FOR USERREGISTRATION --
CREATE SEQUENCE userregistration_seq
START WITH 7
INCREMENT BY 1;

CREATE OR REPLACE TRIGGER userregistration_bir
BEFORE INSERT ON userregistration
FOR EACH ROW
WHEN (NEW.id IS NULL)
BEGIN
  SELECT userregistration_seq.NEXTVAL
  INTO :NEW.id
  FROM dual;
END;
/
COMMIT;
