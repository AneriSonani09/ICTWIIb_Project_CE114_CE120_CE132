--Creating table for user_profile in database
CREATE TABLE `mobile_shopee`.`profile` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` TEXT NOT NULL , 
    `email` VARCHAR(30) NOT NULL , 
    `password` VARCHAR(15) NOT NULL , 
    `address` TEXT NOT NULL , 
    `mobile` BIGINT NOT NULL , 
    `gender` BOOLEAN NOT NULL , 
    `bdate` DATE NOT NULL , 
    `profile_image` VARCHAR(255) NULL , 
    PRIMARY KEY (`id`), 
    UNIQUE (`email`)) 
    ENGINE = InnoDB;

--Creating table for phones in database
CREATE TABLE `mobile_shopee`.`phone` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` TEXT NOT NULL , 
    `price` BIGINT NOT NULL , 
    PRIMARY KEY (`id`)) 
    ENGINE = InnoDB;

--Creating table for user_purchases(cart) in database
CREATE TABLE `mobile_shopee`.`user_purchases` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `userid` INT NOT NULL , 
    `phoneid` INT NOT NULL , 
    PRIMARY KEY (`id`)) 
    ENGINE = InnoDB;

--Changing table structure's foreign keys
ALTER TABLE `user_purchases` ADD FOREIGN KEY (`userid`) REFERENCES `profile`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT; 
ALTER TABLE `user_purchases` ADD FOREIGN KEY (`phoneid`) REFERENCES `phone`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--Inserting demo data of demo user
INSERT INTO `profile` 
(`id`, `name`, `email`, `password`, `address`, `mobile`, `gender`, `bdate`, `profile_image`) VALUES 
(NULL, 'Siddharth Vadgama', 'vadgamasiddharth9@gmail.com', 'siddharth@2543', 'Shraddhapuri society street no.-5, Lalpark main road, Dhebar road south, Rajkot, Gujarat, 360002', '8200084424', '0', '2003-04-25', NULL);

--Adding demo phone-models in phone table
INSERT INTO `phone` 
(`id`, `name`, `price`) VALUES 
(NULL, 'Apple iPhone 12 (64 GB)', '70900'),
(NULL, 'Apple iPhone 11 (64 GB)', '51999'), 
(NULL, 'Samsung Galaxy A72', '34999'), 
(NULL, 'OnePlus 9R 5G', '39999'), 
(NULL, 'Samsung Galaxy S21 Plus', '75999'), 
(NULL, 'Mi 10i', '21999'), 
(NULL, 'Mi 10T Pro', '36999'), 
(NULL, 'Redmi K20', '18479');

--Adding demo purchase references
INSERT INTO `user_purchases` 
(`id`, `userid`, `phoneid`) VALUES 
(NULL, '1', '1'), 
(NULL, '1', '5');