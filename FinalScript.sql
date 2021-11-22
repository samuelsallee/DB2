CREATE DATABASE appdb;

use appdb; 

CREATE TABLE Place
(
  Place_ID INT NOT NULL,
  Place_Name VARCHAR(100) NOT NULL,
  GPS_Location VARCHAR(29) NOT NULL,
  Address VARCHAR(150) NOT NULL,
  Description VARCHAR(500) NOT NULL,
  Kind_Of_Place VARCHAR(1) NOT NULL,
  PRIMARY KEY (Place_ID)
  
);

CREATE TABLE Menu
(
  Menu_ID INT NOT NULL,
  Menu_Web_Link VARCHAR(400) NOT NULL,
  Restaurant_Name VARCHAR (100) NOT NULL,
  Place_ID Int NOT NULL,
  PRIMARY KEY (Menu_ID),
  FOREIGN KEY (Place_ID) REFERENCES Place (Place_ID)
);


CREATE TABLE Discounted_Items
(
  Item_ID INT NOT NULL,
  Item_Name VARCHAR(20) NOT NULL,
  Menu_ID INT NOT NULL,
  PRIMARY KEY (Item_ID),
  FOREIGN KEY (Menu_ID) REFERENCES Menu (Menu_ID)
);


CREATE TABLE Pub_Crawl
(
  Pub_Crawl_ID INT NOT NULL,
  Pub_Crawl_Name VARCHAR(20) NOT NULL,
  PRIMARY KEY (Pub_Crawl_ID)
);

CREATE TABLE Pub_Crawl_Pubs
(
  Arrival_Time VARCHAR(6) NOT NULL,
  Pub_Crawl_ID INT NOT NULL,
  Place_ID INT NOT NULL,
  FOREIGN KEY (Pub_Crawl_ID) REFERENCES Pub_Crawl (Pub_Crawl_ID),
  FOREIGN KEY (Place_ID) REFERENCES Place (Place_ID)
);

CREATE TABLE Puzzle
(
  Puzzle_ID INT NOT NULL,
  Rules VARCHAR(500) NOT NULL,
  Difficulty Int Not Null,
  Place_ID INT,
  PRIMARY KEY (Puzzle_ID),
  FOREIGN KEY (Place_ID) REFERENCES Place (Place_ID)
);

CREATE TABLE Puzzle_Hunt
(
  Puzzle_Hunt_ID INT NOT NULL,
  Completion_Code VARCHAR(15) NOT NULL,
  Difficulty Int NOT NULL,
  Puzzle_Hunt_Name VARCHAR(50) NOT NULL,
  PRIMARY KEY (Puzzle_Hunt_ID)
);


CREATE TABLE Puzzles_In_Puzzle_Hunt
(
  Puzzle_Hunt_ID INT NOT NULL,
  Puzzle_ID INT NOT NULL,
  Puzzle_Order Int NOT NULL,
  FOREIGN KEY (Puzzle_Hunt_ID) REFERENCES Puzzle_Hunt(Puzzle_Hunt_ID),
  FOREIGN KEY (Puzzle_ID) REFERENCES Puzzle(Puzzle_ID)
);


INSERT INTO Place (Place_ID, Place_Name, GPS_Location, Address, Description, Kind_Of_Place) 
VALUES (1,"Wat Arun", "13.743820, 100.488980", "158 Thanon Wang Doem, Wat Arun, Bangkok Yai, Bangkok 10600", "One of the most famous Temples in Thailand", "X");

INSERT INTO Place (Place_ID, Place_Name, GPS_Location, Address, Description, Kind_Of_Place) 
VALUES (2, "Robinhood", "13.731652, 100.568289", "P.B Building 597/1-3 Sukhumvit Rd, Khlong Tan Nuea, Watthana, Bangkok 10110", "Sports Bar", "R");

INSERT INTO Place (Place_ID, Place_Name, GPS_Location, Address, Description, Kind_Of_Place) 
VALUES (3, "Hemmingway's", "13.742860, 100.556515", "Soi Sukhumvit 11, Khlong Toei Nuea, Watthana, Bangkok 10110", "Western restaurant", "R");

INSERT INTO Place (Place_ID, Place_Name, GPS_Location, Address, Description, Kind_Of_Place) 
VALUES (4, "Octave Rooftop Bar & Lounge", "13.723437, 100.580323", "2 Soi Sukhumvit 57, Khwaeng Khlong Tan Nuea, Khet Watthana, Krung Thep Maha Nakhon 10110", "Vibrant rooftop lounge offering cocktails & bar bites, plus regular live DJs amid scenic city views.", "R");

INSERT INTO Place (Place_ID, Place_Name, GPS_Location, Address, Description, Kind_Of_Place) 
VALUES (5, "Soho Pizza", "13.744628, 100.556821", "26/3, Soi Sukhumvit 11, Khlong Toei Nuea, Watthana, Bangkok 10110", "New York style pizza.", "R");



INSERT INTO Menu (Menu_ID, Menu_Web_Link, Restaurant_Name, Place_ID) VALUES (11, "https://hemingwaybkk.com/", "Hemmingway's", 3);
INSERT INTO Menu (Menu_ID, Menu_Web_Link, Restaurant_Name, Place_ID) VALUES (12, "https://www.facebook.com/Robin.Hood.Pub.BKK/", "Robinhood", 2);
INSERT INTO Menu (Menu_ID, Menu_Web_Link, Restaurant_Name, Place_ID) VALUES (13, "https://modules.marriott.com/hotel-restaurants/bkkms-bangkok-marriott-hotel-sukhumvit/octave-bar-and-lounge/5428678/about", "Octave Rooftop Bar & Lounge", 4);
INSERT INTO Menu (Menu_ID, Menu_Web_Link, Restaurant_Name, Place_ID) VALUES (14, "https://www.sohopizza.co.th/menu", "Soho Pizza", 5);


INSERT INTO Discounted_Items (Item_ID, Item_Name, Menu_ID) VALUES (21, "Guiness Pint", 12);
INSERT INTO Discounted_Items (Item_ID, Item_Name, Menu_ID) VALUES (22, "San Miguel Light", 11);

INSERT INTO Pub_Crawl (Pub_Crawl_ID, Pub_Crawl_Name) VALUES (31, "Western Invasion");
INSERT INTO Pub_Crawl (Pub_Crawl_ID, Pub_Crawl_Name) VALUES (32, "Bangkok Staples");

INSERT INTO Pub_Crawl_Pubs (Arrival_Time, Pub_Crawl_ID, Place_ID) VALUES ("9:00", 31, 2);
INSERT INTO Pub_Crawl_Pubs (Arrival_Time, Pub_Crawl_ID, Place_ID) VALUES ("10:00", 31, 3);

INSERT INTO Puzzle (Puzzle_ID, Rules, Difficulty) VALUES (51, "Normal sudoku rules apply.", 3);
INSERT INTO Puzzle (Puzzle_ID, Rules, Difficulty) VALUES (52, "Answer the Question", 1);
INSERT INTO Puzzle (Puzzle_ID, Rules, Difficulty) VALUES (53, "Normal sudoku rules apply. Digits in green cells sum to 77.  Adjacent digits on a grey line must differ by at least 4.", 3);
INSERT INTO Puzzle (Puzzle_ID, Rules, Difficulty) VALUES (54, "Fill the grid with Blue and White squares without creating a 3-In-A-Row of the same colour? Each row and column has an equal number of Blue and White squares.", 2);


INSERT INTO Puzzle_Hunt (Puzzle_Hunt_ID, Completion_Code, Difficulty, Puzzle_Hunt_Name) VALUES (61, "NU$4#wsr", 3, "Paper Puzzles");
INSERT INTO Puzzle_Hunt (Puzzle_Hunt_ID, Completion_Code, Difficulty, Puzzle_Hunt_Name) VALUES (62, "qwerty", 1, "Discovery Puzzles");

INSERT INTO Puzzles_In_Puzzle_Hunt (Puzzle_Hunt_ID, Puzzle_ID, Puzzle_Order) VALUES (61, 51, 1);
INSERT INTO Puzzles_In_Puzzle_Hunt (Puzzle_Hunt_ID, Puzzle_ID, Puzzle_Order) VALUES (61, 53, 2);
INSERT INTO Puzzles_In_Puzzle_Hunt (Puzzle_Hunt_ID, Puzzle_ID, Puzzle_Order) VALUES (61, 54, 3);
INSERT INTO Puzzles_In_Puzzle_Hunt (Puzzle_Hunt_ID, Puzzle_ID, Puzzle_Order) VALUES (62, 52, 1);
