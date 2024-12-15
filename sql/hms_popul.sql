-- Populate data for hostel management system


-- Dumping data for table admin
INSERT INTO admin (id, username, email, password, reg_date, updation_date) VALUES
(1, 'admin', 'admin@gmail.com', 'Test@1234', '2024-01-31 20:31:45', '2024-02-10');


-- Dumping data for table complainthistory
INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(1, 1, 'In Process', 'We checking the issue.', TO_TIMESTAMP('2024-04-07 17:32:30', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(2, 1, 'Closed', 'The issue is fixed. Complaint solved', TO_TIMESTAMP('2024-04-07 17:35:23', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(3, 4, 'In Process', 'Plumber is assigned. visit your room soon\r\n', TO_TIMESTAMP('2024-04-07 18:23:29', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(4, 4, 'Closed', 'Plumbing issue is solved', TO_TIMESTAMP('2024-04-07 18:23:54', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(5, 5, 'In Process', 'Sorry for your inconvenience.', TO_TIMESTAMP('2024-04-09 05:25:53', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(6, 5, 'Closed', 'We take an action further this mistake is not repeated ', TO_TIMESTAMP('2024-04-09 05:26:54', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(7, 2, 'In Process', 'In-process', TO_TIMESTAMP('2024-04-09 06:02:26', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(8, 6, 'Closed', 'Test complaint\r\n', TO_TIMESTAMP('2024-04-17 11:38:40', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(9, 7, 'In Process', 'Electrician is assigned', TO_TIMESTAMP('2024-04-17 11:39:30', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complainthistory (id, complaintid, compalintStatus, complaintRemark, postingDate) 
VALUES 
(10, 7, 'Closed', 'LED light changed', TO_TIMESTAMP('2024-04-17 11:39:50', 'YYYY-MM-DD HH24:MI:SS'));


-- Dumping data for table complaints
INSERT INTO complaints (id, ComplainNumber, userId, complaintType, complaintDetails, complaintDoc, complaintStatus, registrationDate) 
VALUES 
(1, 473906789, 4, 'Electrical', 'This is for test purpose', 'bc0037e941ee50dbff488eef4c685f32.pdf', 'Closed', TO_TIMESTAMP('2024-04-07 09:06:16', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complaints (id, ComplainNumber, userId, complaintType, complaintDetails, complaintDoc, complaintStatus, registrationDate) 
VALUES 
(2, 296166607, 4, 'Electrical', 'This is for test purpose', '684f9df8912bb035fa3f3a569f40d052.pdf', 'In Process', TO_TIMESTAMP('2024-04-07 11:38:48', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complaints (id, ComplainNumber, userId, complaintType, complaintDetails, complaintDoc, complaintStatus, registrationDate) 
VALUES 
(3, 461558892, 4, 'Electrical', 'This is for test purpose', '769e3a6e21b74288480b14c2e6cf66dd.pdf', NULL, TO_TIMESTAMP('2024-04-07 11:40:42', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complaints (id, ComplainNumber, userId, complaintType, complaintDetails, complaintDoc, complaintStatus, registrationDate) 
VALUES 
(4, 950749466, 3, 'Plumbing', 'Plumbing issue in my room', 'c7444a1c5a9e78424303236267882ebf.pdf', 'Closed', TO_TIMESTAMP('2024-04-07 18:22:23', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complaints (id, ComplainNumber, userId, complaintType, complaintDetails, complaintDoc, complaintStatus, registrationDate) 
VALUES 
(5, 740539183, 1, 'Food Related', 'Food is not hygiene ', '6c77c0c0527914a8d295ce2c84bfc46f.jpg', 'Closed', TO_TIMESTAMP('2024-04-09 05:19:17', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complaints (id, ComplainNumber, userId, complaintType, complaintDetails, complaintDoc, complaintStatus, registrationDate) 
VALUES 
(6, 100515426, 1, 'Food Related', 'Room not clean', 'ee2caeb05d35fcbe710b9d5d0f5ca1fc.pdf', 'Closed', TO_TIMESTAMP('2024-04-17 11:37:26', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO complaints (id, ComplainNumber, userId, complaintType, complaintDetails, complaintDoc, complaintStatus, registrationDate) 
VALUES 
(7, 316012785, 2, 'Electrical', 'Led Ligh not working', NULL, 'Closed', TO_TIMESTAMP('2024-04-17 11:39:03', 'YYYY-MM-DD HH24:MI:SS'));


-- Dumping data for table courses
INSERT INTO courses (id, course_code, course_sn, course_fn, posting_date) 
VALUES 
(1, 'B10992', 'B.Tech', 'Bachelor of Technology', TO_TIMESTAMP('2024-02-14 19:31:42', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO courses (id, course_code, course_sn, course_fn, posting_date) 
VALUES 
(2, 'BCOM1453', 'B.Com', 'Bachelor Of commerce ', TO_TIMESTAMP('2024-02-14 19:31:42', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO courses (id, course_code, course_sn, course_fn, posting_date) 
VALUES 
(3, 'BSC12', 'BSC', 'Bachelor of Science', TO_TIMESTAMP('2024-02-14 19:31:42', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO courses (id, course_code, course_sn, course_fn, posting_date) 
VALUES 
(4, 'BC36356', 'BCA', 'Bachelor Of Computer Application', TO_TIMESTAMP('2024-02-14 19:31:42', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO courses (id, course_code, course_sn, course_fn, posting_date) 
VALUES 
(5, 'MCA565', 'MCA', 'Master of Computer Application', TO_TIMESTAMP('2024-02-14 19:31:42', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO courses (id, course_code, course_sn, course_fn, posting_date) 
VALUES 
(6, 'MBA75', 'MBA', 'Master of Business Administration', TO_TIMESTAMP('2024-02-14 19:31:42', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO courses (id, course_code, course_sn, course_fn, posting_date) 
VALUES 
(7, 'BE765', 'BE', 'Bachelor of Engineering', TO_TIMESTAMP('2024-02-14 19:31:42', 'YYYY-MM-DD HH24:MI:SS'));


-- Dumping data for table feedback
INSERT INTO feedback (id, AccessibilityWarden, AccessibilityMember, RedressalProblem, Room, Mess, HostelSurroundings, OverallRating, FeedbackMessage, userId, postingDate) 
VALUES 
(1, 'Excellent', 'Very Good', 'Good', 'Average', 'Below Average', 'Excellent', 'Very Good', 'This is for testing purpose', 4, TO_TIMESTAMP('2024-04-07 16:02:03', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO feedback (id, AccessibilityWarden, AccessibilityMember, RedressalProblem, Room, Mess, HostelSurroundings, OverallRating, FeedbackMessage, userId, postingDate) 
VALUES 
(2, 'Excellent', 'Excellent', 'Very Good', 'Average', 'Average', 'Average', 'Average', 'NA', 3, TO_TIMESTAMP('2024-04-07 18:25:12', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO feedback (id, AccessibilityWarden, AccessibilityMember, RedressalProblem, Room, Mess, HostelSurroundings, OverallRating, FeedbackMessage, userId, postingDate) 
VALUES 
(3, 'Good', 'Very Good', 'Excellent', 'Very Good', 'Good', 'Very Good', 'Very Good', 'Nice Hostel', 1, TO_TIMESTAMP('2024-04-09 05:30:43', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO feedback (id, AccessibilityWarden, AccessibilityMember, RedressalProblem, Room, Mess, HostelSurroundings, OverallRating, FeedbackMessage, userId, postingDate) 
VALUES 
(4, 'Very Good', 'Excellent', 'Very Good', 'Excellent', 'Excellent', 'Excellent', 'Excellent', 'Hostel is very good', 2, TO_TIMESTAMP('2024-04-17 11:40:25', 'YYYY-MM-DD HH24:MI:SS'));


-- Dumping data for table registration
INSERT INTO registration (id, roomno, seater, feespm, foodstatus, stayfrom, duration, course, regno, firstName, middleName, lastName, gender, contactno, emailid, egycontactno, guardianName, guardianRelation, guardianContactno, corresAddress, corresCIty, corresState, corresPincode, pmntAddress, pmntCity, pmnatetState, pmntPincode, postingDate, updationDate) 
VALUES 
(1, 100, 5, 400, 1, TO_DATE('2024-04-01', 'YYYY-MM-DD'), 12, 'Bachelor of Science', 99101010, 'Haziq', '', 'Aiman', 'male', 01128639510, 'ziq@gmail.com', 1010109988, 'Jalamaluddin Hassan', 'father', 8899776655, '123 Xyz apartment ', 'JITRA', 'KEDAH', 110001, '123 Xyz apartment ', 'JITRA', 'KEDAH', 110001, TO_TIMESTAMP('2024-03-14 05:42:03', 'YYYY-MM-DD HH24:MI:SS'), NULL);

INSERT INTO registration (id, roomno, seater, feespm, foodstatus, stayfrom, duration, course, regno, firstName, middleName, lastName, gender, contactno, emailid, egycontactno, guardianName, guardianRelation, guardianContactno, corresAddress, corresCIty, corresState, corresPincode, pmntAddress, pmntCity, pmnatetState, pmntPincode, postingDate, updationDate) 
VALUES 
(2, 200, 2, 600, 1, TO_DATE('2024-04-01', 'YYYY-MM-DD'), 12, 'Bachelor of Science', 10406621, 'Muhammad', '', 'Kamarul', 'male', 1425362514, 'kamarul@gmail.com', 456312058, 'Mahmud', 'father', 1234567890, '123 Xyz apartment ', 'BATANG KALI', 'PAHANG', 110001, '123 Xyz apartment ', 'BATANG KALI', 'PAHANG', 110001, TO_TIMESTAMP('2024-03-14 05:42:03', 'YYYY-MM-DD HH24:MI:SS'), NULL);

INSERT INTO registration (id, roomno, seater, feespm, foodstatus, stayfrom, duration, course, regno, firstName, middleName, lastName, gender, contactno, emailid, egycontactno, guardianName, guardianRelation, guardianContactno, corresAddress, corresCIty, corresState, corresPincode, pmntAddress, pmntCity, pmnatetState, pmntPincode, postingDate, updationDate) 
VALUES 
(3, 100, 5, 700, 1, TO_DATE('2024-05-01', 'YYYY-MM-DD'), 3, 'Bachelor of Technology', 13406331, 'Zarif', 'Bin', 'Zaril ', 'male', 8956237845, 'zarif@gmail.com', 7845123698, 'Mr. Zaril Bin Abdul Talib', 'Uncle', 5623894178, 'H-899, Murni Apartment', 'PAHANG', 'JALAN UTAMA', 551007, 'H-899, Murni Apartment', 'BATANG KALI', 'PAHANG', 551007, TO_TIMESTAMP('2024-04-09 05:14:41', 'YYYY-MM-DD HH24:MI:SS'), NULL);

INSERT INTO registration (id, roomno, seater, feespm, foodstatus, stayfrom, duration, course, regno, firstName, middleName, lastName, gender, contactno, emailid, egycontactno, guardianName, guardianRelation, guardianContactno, corresAddress, corresCIty, corresState, corresPincode, pmntAddress, pmntCity, pmnatetState, pmntPincode, postingDate, updationDate) 
VALUES 
(4, 132, 5, 200, 1, TO_DATE('2024-05-01', 'YYYY-MM-DD'), 12, 'Bachelor of Technology', 11106121, 'Taufiq', '', 'Hidayat', 'male', 9632587412, 'taufiq@gmail.com', 8563145621, 'Hassan Bin Zamri', 'Father', 4563245631, 'Hno 181/1 Taman Mewah', 'PERAK', 'TAMANG PENGKALAN', 110092, 'Hno 181/1 Taman Mewah', 'IPOH', 'PERAK', 110092, TO_TIMESTAMP('2024-04-17 11:36:28', 'YYYY-MM-DD HH24:MI:SS'), NULL);


-- Dumping data for table rooms
INSERT INTO rooms (id, seater, room_no, fees, posting_date) 
VALUES 
(1, 5, 100, 500, TO_TIMESTAMP('2024-02-19 22:45:43', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO rooms (id, seater, room_no, fees, posting_date) 
VALUES 
(2, 2, 201, 600, TO_TIMESTAMP('2024-02-19 22:45:43', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO rooms (id, seater, room_no, fees, posting_date) 
VALUES 
(3, 2, 200, 650, TO_TIMESTAMP('2024-02-19 22:45:43', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO rooms (id, seater, room_no, fees, posting_date) 
VALUES 
(4, 3, 112, 400, TO_TIMESTAMP('2024-02-19 22:45:43', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO rooms (id, seater, room_no, fees, posting_date) 
VALUES 
(5, 5, 132, 200, TO_TIMESTAMP('2024-02-19 22:45:43', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO rooms (id, seater, room_no, fees, posting_date) 
VALUES 
(6, 3, 145, 300, TO_TIMESTAMP('2024-04-17 11:41:16', 'YYYY-MM-DD HH24:MI:SS'));


-- Dumping data for table states
INSERT INTO states (id, State) VALUES (1, 'JOHOR');
INSERT INTO states (id, State) VALUES (2, 'KEDAH');
INSERT INTO states (id, State) VALUES (3, 'KELANTAN');
INSERT INTO states (id, State) VALUES (4, 'MELAKA');
INSERT INTO states (id, State) VALUES (5, 'NEGERI SEMBILAN');
INSERT INTO states (id, State) VALUES (6, 'PAHANG');
INSERT INTO states (id, State) VALUES (7, 'PENANG');
INSERT INTO states (id, State) VALUES (8, 'PERAK');
INSERT INTO states (id, State) VALUES (9, 'PERLIS');
INSERT INTO states (id, State) VALUES (10, 'SABAH');
INSERT INTO states (id, State) VALUES (11, 'SARAWAK');
INSERT INTO states (id, State) VALUES (12, 'SELANGOR');
INSERT INTO states (id, State) VALUES (13, 'TERENGGANU');


-- Dumping data for table userlog
INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(1, '11106121', 'taufiq@gmail.com', '0x3a3a31', 'PERAK', 'MALAYSIA', TO_TIMESTAMP('2024-03-14 05:15:31', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(2, '11106121', 'taufiq@gmail.com', '0x3a3a31', 'KEDAH', 'MALAYSIA', TO_TIMESTAMP('2024-03-14 06:09:44', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(3, '11106121', 'taufiq@gmail.com', '0x3a3a31', 'PAHANG', 'MALAYSIA', TO_TIMESTAMP('2024-04-07 18:19:48', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(4, '11106121', 'taufiq@gmail.com', '0x3a3a31', 'PERLIS', 'MALAYSIA', TO_TIMESTAMP('2024-04-07 18:19:49', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(5, '13406331', 'zarif@gmail.com', '0x3a3a31', 'KELANTAN', 'MALAYSIA', TO_TIMESTAMP('2024-04-07 18:22:03', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(6, '99101010', 'ziq@gmail.com', '0x3a3a31', 'PERAK', 'MALAYSIA', TO_TIMESTAMP('2024-04-09 05:06:35', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(7, '99101010', 'ziq@gmail.com', '0x3a3a31', 'KEDAH', 'MALAYSIA', TO_TIMESTAMP('2024-04-09 06:23:52', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(8, '99101010', 'ziq@gmail.com', '0x3a3a31', 'PERAK', 'MALAYSIA', TO_TIMESTAMP('2024-04-17 11:29:34', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(9, '10406621', 'kamarul@gmail.com', '0x3a3a31', 'PAHANG', 'MALAYSIA', TO_TIMESTAMP('2024-04-17 11:34:03', 'YYYY-MM-DD HH24:MI:SS'));

INSERT INTO userlog (id, userId, userEmail, userIp, city, country, loginTime) 
VALUES 
(10, '10406621', 'kamarul@gmail.com', '0x3a3a31', 'KELANTAN', 'MALAYSIA', TO_TIMESTAMP('2024-04-17 17:13:08', 'YYYY-MM-DD HH24:MI:SS'));


-- Dumping data for table userregistration
INSERT INTO userregistration (id, regNo, firstName, middleName, lastName, gender, contactNo, email, password, regDate, updationDate, passUdateDate) 
VALUES 
(1, '99101010', 'Haziq', '', 'Aiman', 'male', 01128639510, 'ziq@gmail.com', '123', TO_TIMESTAMP('2024-03-01 14:56:18', 'YYYY-MM-DD HH24:MI:SS'), NULL, NULL);

INSERT INTO userregistration (id, regNo, firstName, middleName, lastName, gender, contactNo, email, password, regDate, updationDate, passUdateDate) 
VALUES 
(2, '10406621', 'Muhammad', '', 'Kamarul', 'male', 1425362514, 'kamarul@gmail.com', '123', TO_TIMESTAMP('2024-03-14 05:15:01', 'YYYY-MM-DD HH24:MI:SS'), NULL, NULL);

INSERT INTO userregistration (id, regNo, firstName, middleName, lastName, gender, contactNo, email, password, regDate, updationDate, passUdateDate) 
VALUES 
(3, '13406331', 'Zarif', 'Bin', 'Zaril ', 'male', 8956237845, 'zarif@gmail.com', '123', TO_TIMESTAMP('2024-04-09 05:04:55', 'YYYY-MM-DD HH24:MI:SS'), NULL, NULL);

INSERT INTO userregistration (id, regNo, firstName, middleName, lastName, gender, contactNo, email, password, regDate, updationDate, passUdateDate) 
VALUES 
(4, '11106121', 'Taufiq', '', 'Hidayat', 'male', 9632587412, 'taufiq@gmail.com', '123', TO_TIMESTAMP('2024-04-17 11:33:55', 'YYYY-MM-DD HH24:MI:SS'), TO_TIMESTAMP('2024-04-17 05:12:02', 'YYYY-MM-DD HH24:MI:SS'), NULL);
