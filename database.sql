-- Create the database
CREATE DATABASE IF NOT EXISTS `lab`;
USE `lab`;

-- Table: admin
CREATE TABLE `admin` (
  `Aid` INT(5) NOT NULL AUTO_INCREMENT,
  `Aname` VARCHAR(50) NOT NULL,
  `Aemail` VARCHAR(50) NOT NULL,
  `Apwd` VARCHAR(15) NOT NULL,
  `Amob` VARCHAR(15) NOT NULL,
  `Admintyp` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`Aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Insert into admin
INSERT INTO `admin` (`Aid`, `Aname`, `Aemail`, `Apwd`, `Amob`, `Admintyp`) VALUES
(3, 'Sakshi Patil', 'sanikapatil9209@gmail.com', '12345', '7896325410', 'Admin');

-- Table: lab_assistant
CREATE TABLE `lab_assistant` (
  `Lid` INT(5) NOT NULL AUTO_INCREMENT,
  `LabName` VARCHAR(30) NOT NULL,
  `Assistant` INT(3) NOT NULL,
  PRIMARY KEY (`Lid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table: problem
CREATE TABLE `problem` (
  `Pid` INT(5) NOT NULL AUTO_INCREMENT,
  `ProblemSubject` TEXT NOT NULL,
  `ProblemDetails` TEXT NOT NULL,
  `Lab` INT(11) NOT NULL,
  `UID` INT(11) NOT NULL,
  `Posteddate` DATETIME NOT NULL,
  `Resolve` TEXT NOT NULL,
  `ResolveDetails` TEXT NOT NULL,
  `Resolvedate` DATETIME NOT NULL,
  PRIMARY KEY (`Pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

