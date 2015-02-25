INSERT INTO Users (Username, RealName, Password, Address1, Address2, CCNum, CCV2)
VALUES ('Ryan', 'Ryan Whitworth', 'password', '1600 Pennsylvania Avenue NW', 'Washington, DC 20500', '1234567890123456', 123);

INSERT INTO Users (Username, RealName, Password, Address1, Address2, CCNum, CCV2)
VALUES ('Jimbob', 'James Robert Duggar', 'password', '123 Oak Tree Lane', 'Springdale, AR 72762', '1234567890123456', 123);

INSERT INTO Category (Name) VALUES ('Fishing Gear');
INSERT INTO Category (Name) VALUES ('Computer Parts');
INSERT INTO Category (Name) VALUES ('Music CDs');
INSERT INTO Category (Name) VALUES ('Books');

INSERT INTO Auction (Title, Description, UserIDCreated, StartTime, EndTime, StartingBid, CategoryID, ImageURL)
VALUES ('Brand new fishing pole', 'This auction is for a brand new fishing pole in the packaging.  You will catch 100% more fish with this pole.  Includes 1000 feet of line and a rubber lure.  Retail value of $20.', 1, '06/27/2011 12:00', '07/4/2011 12:00', 0.01, 1, 'http://okaram.spsu.edu/~rwhitwor/final/images/fishing.jpg');

INSERT INTO Auction (Title, Description, UserIDCreated, StartTime, EndTime, StartingBid, CategoryID, ImageURL)
VALUES ('Brand new fishing lure', 'This auction is for a brand new fishing lure in the packaging.  You will catch 100% more fish with this lure.  Lure is red with yellow specks.  Retail value of $5.', 1, '06/27/2011 12:00', '07/4/2011 12:00', 0.01, 1, '');

INSERT INTO Auction (Title, Description, UserIDCreated, StartTime, EndTime, StartingBid, CategoryID, ImageURL)
VALUES ('386-SX Processor & motherboard', 'For sale: 386-SX Processor and motherboard with 512k of onboard RAM.  Still in working condition.', 2, '06/27/2011 12:00', '07/4/2011 12:00', 5.01, 2, 'http://okaram.spsu.edu/~rwhitwor/final/images/386sx.jpg');

INSERT INTO Auction (Title, Description, UserIDCreated, StartTime, EndTime, StartingBid, CategoryID, ImageURL)
VALUES ('386-DX w/coprocessor', 'For sale: 386-DX Processor with math coprocessor.  Be the first on your street to run Second Reality at full speed!', 2, '06/27/2011 12:00', '07/4/2011 12:00', 7.01, 2, 'http://okaram.spsu.edu/~rwhitwor/final/images/386dx.jpg');

INSERT INTO Auction (Title, Description, UserIDCreated, StartTime, EndTime, StartingBid, CategoryID, ImageURL)
VALUES ('Hillsong United CD', 'For sale: Hillsong United CD.  12 songs of awesome worship music! Slighty used and worth every penny.', 1, '06/27/2011 12:00', '07/4/2011 12:00', 17.01, 3, 'http://okaram.spsu.edu/~rwhitwor/final/images/hu.jpg');

INSERT INTO Auction (Title, Description, UserIDCreated, StartTime, EndTime, StartingBid, CategoryID, ImageURL)
VALUES ('Game of Thrones book 1', 'Game of Thrones book 1.  The HBO series is based on this book, so get it while you can!  Book stores will soon be sold out.  This book includes free shipping to most locations.', 2, '06/27/2011 12:00', '07/4/2011 12:00', 3.01, 4, 'http://okaram.spsu.edu/~rwhitwor/final/images/got.jpg');

INSERT INTO Auction (Title, Description, UserIDCreated, StartTime, EndTime, StartingBid, CategoryID, ImageURL)
VALUES ('Game of Thrones book 2', 'Game of Thrones book 2.  The HBO series is based on this series, so get it while you can!  Book stores will soon be sold out.  This book includes free shipping to most locations.', 2, '06/27/2011 12:00', '07/8/2011 12:00', 23.01, 4, 'http://okaram.spsu.edu/~rwhitwor/final/images/cok.jpg');

INSERT INTO Auction (Title, Description, UserIDCreated, StartTime, EndTime, StartingBid, CategoryID, ImageURL)
VALUES ('Game of Thrones book 3', 'Game of Thrones book 3.  The HBO series is based on this series, so get it while you can!  Book stores will soon be sold out.  This book includes free shipping to most locations.', 2, '06/27/2011 12:00', '07/8/2011 12:00', 23.01, 4, 'http://okaram.spsu.edu/~rwhitwor/final/images/sos.jpg');

INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (1, 1, 1.00, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (2, 1, 1.00, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (3, 1, 10.00, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (4, 1, 10.00, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (5, 1, 22.02, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (6, 1, 6.77, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (1, 1, 2.33, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (2, 1, 2.77, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (6, 1, 9.00, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (1, 1, 5.88, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (2, 1, 9.31, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (6, 1, 12.12, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (7, 1, 42.12, now());
INSERT INTO Bids (AuctionID, UserID, Bid, CurrentDate)
VALUES (8, 1, 42.12, now());
