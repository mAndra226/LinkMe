--  "linkme_database"
-- ==========================================					
-- Drop Database Schema if it exists
DROP DATABASE IF EXISTS linkme_database;
-- Creating DocOffice Schema
CREATE DATABASE linkme_database;
USE linkme_database;

-- Tables for the Linkme

-- Creating the UserProfile Table:
DROP TABLE IF EXISTS UserProfile;
CREATE TABLE UserProfile (
	Userid				int(11)	 		AUTO_INCREMENT	NOT NULL,
    realname			VARCHAR(300) 	NOT NULL,
	email				VARCHAR(300) 	NOT NULL,
    pass				VARCHAR(300) 	NOT NULL,
    username			VARCHAR(300) 	NOT NULL,
    profilepic			longblob		,
    PRIMARY KEY (Userid)
   
);

-- Creating the Facebook Table:
DROP TABLE IF EXISTS Facebook;
CREATE TABLE Facebook (
	FBLINK				VARCHAR(300)		NOT NULL,
    Userid				int(11)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (FBLINK),
    FOREIGN KEY (Userid) REFERENCES UserProfile(Userid)
    );

-- Creating the Twitter Table:
DROP TABLE IF EXISTS Twitter;
CREATE TABLE Twitter (
	twitterlink			VARCHAR(300)		NOT NULL,
    Userid				int(11)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (twitterlink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(Userid)
    );
    
-- Creating the Instagram Table:
DROP TABLE IF EXISTS Instagram;
CREATE TABLE Instagram (
	instalink			VARCHAR(300)		NOT NULL,
    Userid				int(11)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (instalink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(Userid)
    );
    
-- Creating the Linkedin Table:
DROP TABLE IF EXISTS Linkedin;
CREATE TABLE Linkedin (
	linkedinlink		VARCHAR(300)		NOT NULL,
    Userid				int(11)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (linkedinlink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(Userid)
    );
    
-- Creating the Github Table:
DROP TABLE IF EXISTS Github;
CREATE TABLE Github (
	githublink			VARCHAR(300)		NOT NULL,
    Userid				int(11)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (githublink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(Userid)
    );
    
-- Creating the Links Table:
DROP TABLE IF EXISTS Links;
CREATE TABLE Links (
	Userid				int(11)	 			NOT NULL,
    Facebook			VARCHAR(300),
    Twitter				VARCHAR(300),
	Instagram			VARCHAR(300),
    Linkedin			VARCHAR(300),
    Github				VARCHAR(300),
    FOREIGN KEY (Userid) REFERENCES UserProfile(Userid),
    FOREIGN KEY (Facebook) REFERENCES Facebook(FBLINK),
    FOREIGN KEY (Twitter) REFERENCES Twitter(twitterlink),
    FOREIGN KEY (Instagram) REFERENCES Instagram(instalink),
    FOREIGN KEY (Linkedin) REFERENCES Linkedin(linkedinlink),
    FOREIGN KEY (Github) REFERENCES Github(githublink)
    );















