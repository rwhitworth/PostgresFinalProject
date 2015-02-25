CREATE SEQUENCE seq_auction;
CREATE SEQUENCE seq_bids;
CREATE SEQUENCE seq_category;
CREATE SEQUENCE seq_users;

CREATE TABLE Auction (
ID INT DEFAULT nextval('seq_auction') PRIMARY KEY,
Title VARCHAR(70),
Description VARCHAR(1000),
UserIDCreated INT,
StartTime TIMESTAMP,
EndTime TIMESTAMP,
StartingBid FLOAT,
CategoryID INT,
ImageURL VARCHAR(200)
);

CREATE TABLE Bids (
ID INT DEFAULT nextval('seq_bids') PRIMARY KEY,
AuctionID INT,
UserID INT,
Bid FLOAT,
CurrentDate TIMESTAMP
);

CREATE TABLE Category (
ID INT DEFAULT nextval('seq_category') PRIMARY KEY,
Name VARCHAR(30)
);

CREATE TABLE Users (
ID INT DEFAULT nextval('seq_users') PRIMARY KEY,
Username VARCHAR(30),
RealName VARCHAR(60),
Password VARCHAR(20),
Address1 VARCHAR(40),
Address2 VARCHAR(40),
CCNum VARCHAR(50),
CCV2 INT
);
