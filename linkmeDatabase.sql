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
    realname			VARCHAR(300) 	NOT NULL,
	email				VARCHAR(300) 	NOT NULL,
    pass				VARCHAR(300) 	NOT NULL,
    username			VARCHAR(300) 	NOT NULL,
    country				VARCHAR(300)	,
    phone				VARCHAR(15) 	,
    bio					VARCHAR(500)	,
    image				VARCHAR(300)	,
    PRIMARY KEY (username)
   
);

-- Creating the Facebook Table:
DROP TABLE IF EXISTS Facebook;
CREATE TABLE Facebook (
	FBLINK				VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300)	 	NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (FBLINK),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );

-- Creating the Twitter Table:
DROP TABLE IF EXISTS Twitter;
CREATE TABLE Twitter (
	twitterlink			VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300)	 	NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (twitterlink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
    
-- Creating the Instagram Table:
DROP TABLE IF EXISTS Instagram;
CREATE TABLE Instagram (
	instalink			VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300) 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (instalink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
    
-- Creating the Linkedin Table:
DROP TABLE IF EXISTS Linkedin;
CREATE TABLE Linkedin (
	linkedinlink		VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (linkedinlink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
    
-- Creating the Github Table:
DROP TABLE IF EXISTS Github;
CREATE TABLE Github (
	githublink			VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (githublink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
-- Creating the Youtube Table:
DROP TABLE IF EXISTS Youtube;
CREATE TABLE Youtube (
	ytlink				VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300) 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (ytlink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
-- Creating the Snapchat Table:
DROP TABLE IF EXISTS Snapchat;
CREATE TABLE Snapchat (
	sclink			VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (sclink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
-- Creating the Reddit Table:
DROP TABLE IF EXISTS Reddit;
CREATE TABLE Reddit (
	redditlink			VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (redditlink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
-- Creating the Pinterest Table:
DROP TABLE IF EXISTS Pinterest;
CREATE TABLE Pinterest (
	pintlink			VARCHAR(300)		NOT NULL,
    Userid				VARCHAR(300)	 			NOT NULL,
	clickcount			int(11)				NOT NULL,
    PRIMARY KEY (pintlink),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
    
-- Creating the Links Table:
DROP TABLE IF EXISTS Links;
CREATE TABLE Links (
	Userid				VARCHAR(300)	 			NOT NULL,
    Facebook			VARCHAR(300),
    Twitter				VARCHAR(300),
	Instagram			VARCHAR(300),
    Linkedin			VARCHAR(300),
    Github				VARCHAR(300),
    Youtube				VARCHAR(300),
    Snapchat			VARCHAR(300),
    Reddit				VARCHAR(300),
    Pinterest			VARCHAR(300),
    FOREIGN KEY (Userid) REFERENCES UserProfile(username)
    );
