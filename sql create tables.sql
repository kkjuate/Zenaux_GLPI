CREATE TABLE campaign(
identifier varchar(20),
clientSupport varchar(40),
LOB varchar(40),
cOwnership varchar(20),
minLOB varchar(4),
impact int );
  
CREATE TABLE caseIds(
idCase nvarchar(255),
issueDescryption nvarchar(255),
issueCategory nvarchar(255),
issueType nvarchar(255) );
  
CREATE TABLE siteSettingsMatch(
siteID varchar(4),
ipRange varchar(20) );
  
CREATE TABLE siteSettings(
site varchar(50),
domainServer varchar(50),
domainAddress varchar(50),
port int,
details varchar(100),
itGroupLocation varchar(100),
helpdeskEmail varchar(50),
helpdeskExt varchar(6),
helpdeskExt247 varchar(6),
helpdeskCell varchar(15) );
  
CREATE TABLE ticket(
ticketNumber int,
location varchar(3),
ntUser varchar(50),
caseID varchar(6),
description varchar(MAX),
dateInitial datetime,
dateExpected datetime,
dateClosed datetime,
severity int,
impact int,
downtime varchar(50),
ownership varchar(10),
affectedUsers int,
ticketStatus varchar(20),
history varchar(MAX),
LOB varchar(20),
attainment varchar(1),
knowledgeBaseID varchar(12),
affectedUserNT varchar(15),
loc varchar(4),
queue varchar(5) );
  
CREATE TABLE userInfo(
userNt varchar(20),
userFName varchar(60),
userEmail varchar(30) );
