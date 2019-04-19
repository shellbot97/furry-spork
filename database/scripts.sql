CREATE DATABASE `hotel`;

CREATE TABLE `cities` ( 
	`city_id` INT(10) NOT NULL AUTO_INCREMENT ,
	`city_name` VARCHAR(100) NOT NULL , 
	PRIMARY KEY (`city_id`)
) ENGINE = InnoDB;

CREATE TABLE `locations` ( `location_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`location_name` VARCHAR(50) NOT NULL , `city_id` INT(10) NOT NULL , `is_deleted` INT NOT NULL DEFAULT '0' , 
	PRIMARY KEY (`location_id`)) ENGINE = InnoDB;

CREATE TABLE `hotels` ( `hotel_id` INT(10) NOT NULL AUTO_INCREMENT ,
 `hotel_name` VARCHAR(50) NOT NULL , `location_id` INT(10) NOT NULL , `is_deleted` INT NOT NULL DEFAULT '0' , 
 `documents_required` VARCHAR(1000) NULL , PRIMARY KEY (`hotel_id`)) ENGINE = InnoDB;

CREATE TABLE `users` ( `user_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`username` VARCHAR(255) NOT NULL , `first_name` VARCHAR(255) NOT NULL , 
	`last_name` VARCHAR(255) NOT NULL , `password` VARCHAR(1000) NOT NULL , `hotel_id` INT(10) NOT NULL , 
	`is_admin` INT(1) NOT NULL DEFAULT '0' , `is_deleted` INT(1) NOT NULL DEFAULT '0' , 
	PRIMARY KEY (`user_id`)) ENGINE = InnoDB;

CREATE TABLE `rooms` ( `room_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`room_number` VARCHAR(100) NOT NULL , `room_type_id` INT(10) NOT NULL , 
	`floor_number` VARCHAR(50) NOT NULL , `hotel_id` INT(10) NOT NULL , 
	`is_deleted` INT(1) NOT NULL DEFAULT '0' , PRIMARY KEY (`room_id`)) ENGINE = InnoDB;

CREATE TABLE `room_type` ( `room_type_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`room_type_name` VARCHAR(50) NOT NULL , 
	PRIMARY KEY (`room_type_id`)) ENGINE = InnoDB;

CREATE TABLE `documents` ( `document_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`document_name` VARCHAR(100) NOT NULL , PRIMARY KEY (`document_id`)) ENGINE = InnoDB;

CREATE TABLE `customer` ( `customer_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`phone_number` VARCHAR(10) NOT NULL , `first_name` VARCHAR(100) NOT NULL , 
	`last_name` VARCHAR(100) NOT NULL , `address_1` VARCHAR(500) NOT NULL , 
	`address_2` VARCHAR(500) NOT NULL , `is_deleted` INT(1) NOT NULL DEFAULT '0' , 
	PRIMARY KEY (`customer_id`)) ENGINE = InnoDB;
​
CREATE TABLE `booking` ( `booking_id` INT(10) NOT NULL AUTO_INCREMENT , 
	`customer_id` INT(10) NOT NULL , `hotel_id` INT(10) NOT NULL , `room_id` INT(10) NOT NULL , 
	`invoice_number` VARCHAR(100) NOT NULL , `from_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
	`to_date` DATETIME NOT NULL , `adult` INT(10) NOT NULL DEFAULT '1' , `children` INT(10) NOT NULL DEFAULT '0' , 
	`created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , `is_deleted` INT(1) NOT NULL DEFAULT '0' , 
	PRIMARY KEY (`booking_id`)) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `ci_sessions` (
        `id` varchar(128) NOT NULL,
        `ip_address` varchar(45) NOT NULL,
        `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
        `data` blob NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)
);
​




