

CREATE TABLE `hotel`.`admin` ( `aid` INT(10) NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `mail` VARCHAR(50) NOT NULL , `apass` VARCHAR(50) NOT NULL , PRIMARY KEY (`aid`)) ENGINE = InnoDB;

CREATE TABLE `hotel`.`booking_details` ( `room_id` INT(200) NOT NULL AUTO_INCREMENT, `bk_id` INT(200) NOT NULL AUTO_INCREMENT, `cat` VARCHAR(50) NOT NULL , `uid` INT(200) NOT NULL , `cin` DATE NOT NULL , `cout` DATE NOT NULL , `name` VARCHAR(50) NOT NULL ,`nump` INT(50) NOT NULL, `phone` INT(100) NOT NULL , `book` TEXT NOT NULL, PRIMARY KEY (`bk_id`)) ENGINE = InnoDB;

CREATE TABLE `hotel`.`room_category` ( `roomname` TEXT NOT NULL , `room_qnty` INT(10) NOT NULL , `available` INT(10) NOT NULL , `booked` INT(10) NOT NULL , `no_bed` INT(10) NOT NULL , `bedtype` TEXT NOT NULL , `facility` TEXT NOT NULL , `price` FLOAT NOT NULL ) ENGINE = InnoDB;

CREATE TABLE `hotel`.`user` ( `uid` INT(20) NOT NULL AUTO_INCREMENT , `fname` VARCHAR(50) NOT NULL , `lname` VARCHAR(50) NOT NULL , `num` INT(100) NOT NULL , `mail` VARCHAR(50) NOT NULL , `file` BLOB NOT NULL , `nation` VARCHAR(50) NOT NULL , `pass` VARCHAR(50) NOT NULL, PRIMARY KEY (`uid`) ) ENGINE = InnoDB;

CREATE TABLE `hotel`.`payment` ( `rec_id` INT(50) NOT NULL , `uid` INT(50) NOT NULL , `uname` VARCHAR(50) NOT NULL , `price` FLOAT NOT NULL , `pay_mode` VARCHAR(50) NOT NULL , `t_date` DATETIME NOT NULL, PRIMARY KEY (`rec_id`) ) ENGINE = InnoDB;

CREATE TABLE `hotel`.`cancel` ( `rec_id` INT NOT NULL , `uid` INT NOT NULL , `c_amt` FLOAT NOT NULL , `c_date` DATETIME NOT NULL ) ENGINE = InnoDB;


/* Inserting admins */

INSERT INTO `admin` (`aid`, `name`, `apass`, `mail`) VALUES
(98, 'nikhil', 'nikhil', 'nikhil@maharaja.com'),
(99, 'banda', 'banda', 'banda@maharaja.com');


/* inserting users */

INSERT INTO `user` (`uid`, `fname`, `lname`, `num`, `mail`, `file`, `nation`, `pass`) VALUES
(1, 'Rushi', 'K', '456789', 'rushi@mail.com', '', 'Indian', '789'),
(2, 'Shivraj', 'C', '456789', 'shivaraj@mail.com', '', 'Indian', '789'),
(3, 'Krishna', 'B', '456789', 'krishna@mail.com', '', 'Indian', '123');


/* Inserting Booking data */

 INSERT INTO `booking_details` (`room_id`, `bk_id`, `cat`, `uid`, `cin`, `cout`, `name`, `nump`, `phone`, `book`) VALUES
(23, 101, 'Family', 0, '0000-00-00', '0000-00-00', '', 2, 0, 'false'),
(24, 102, 'Family', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(25, 103, 'Family', 0, '0000-00-00', '0000-00-00', '', 4, 0, 'false'),
(26, 104, 'Family', 0, '0000-00-00', '0000-00-00', '', 1, 0, 'false'),
(27, 105, 'Family', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(28, 106, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(29, 107, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(30, 108, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(31, 109, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(32, 110, 'Super Comfort', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(33, 111, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(34, 112, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(35, 113, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(36, 114, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(37, 115, 'Duplex', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(38, 116, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(39, 117, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(40, 118, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(41, 119, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(42, 120, 'King', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(43, 121, 'Queen', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(44, 122, 'Queen', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(45, 123, 'Queen', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(46, 124, 'Queen', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false'),
(47, 125, 'Queen', 0, '0000-00-00', '0000-00-00', '', 3, 0, 'false');


 INSERT INTO `room_category` (`roomname`, `room_qnty`, `available`, `booked`, `no_bed`, `bedtype`, `facility`, `price`) VALUES
('Duplex', 5, 5, 0, 2, 'single', 'AC, TV, Wifi', 1500),
('Family', 5, 5, 0, 2, 'double', 'Sofa, TV, WIFI, Balcony, AC', 3500),
('King', 5, 5, 0, 2, 'double', 'Sofa, TV, WIFI, Balcony, AC', 3000),
('Queen', 5, 5, 0, 2, 'single', 'TV, WIFI, Balcony, AC', 2500),
('Super Comfort', 5, 5, 0, 1, 'double', 'Sofa, TV, WIFI, Balcony, AC', 2200);
