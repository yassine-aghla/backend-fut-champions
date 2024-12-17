DROP DATABASE IF EXISTS fut_champions;
CREATE DATABASE fut_champions;
USE fut_champions;

CREATE TABLE physique_gardien (
    physicalGk_id INT NOT NULL AUTO_INCREMENT,
    diving INT NOT NULL,
    handling INT NOT NULL,
    kicking INT NOT NULL,
    reflexes INT NOT NULL,
    speed INT NOT NULL,
    positioning INT NOT NULL,
    PRIMARY KEY (physicalGk_id)
);

CREATE TABLE physique_player (
    physicalPlayer_id INT NOT NULL AUTO_INCREMENT,
    pace INT NOT NULL,
    shooting INT NOT NULL,
    passing INT NOT NULL,
    dribbling INT NOT NULL,
    defending INT NOT NULL,
    physical INT NOT NULL,
    PRIMARY KEY (physicalPlayer_id)
);

CREATE TABLE clubs (
    club_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    logo VARCHAR(255) NOT NULL,
    PRIMARY KEY (club_id)
);

CREATE TABLE nationalities (
    nationality_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    flag VARCHAR(255) NOT NULL,
    PRIMARY KEY (nationality_id)
);

CREATE TABLE players (
    player_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    photo VARCHAR(255) NOT NULL,
    position ENUM('GK','LB','CBL','CBR','RB','CML','DMF','CMR','LW','ST','RW') NOT NULL,
    club_id INT NOT NULL,
    nationality_id INT NOT NULL,
    rating INT NOT NULL,
    physicalGk_id INT NOT NULL,
    physicalPlayer_id INT NOT NULL,
    PRIMARY KEY (player_id),
    FOREIGN KEY (club_id) REFERENCES clubs(club_id) ON DELETE CASCADE,
    FOREIGN KEY (nationality_id) REFERENCES nationalities(nationality_id) ON DELETE CASCADE,
    FOREIGN KEY (physicalGk_id) REFERENCES physique_gardien(physicalGk_id) ON DELETE CASCADE,
    FOREIGN KEY (physicalPlayer_id) REFERENCES physique_player(physicalPlayer_id) ON DELETE CASCADE
);


