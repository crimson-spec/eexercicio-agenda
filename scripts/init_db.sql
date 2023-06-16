CREATE SCHEMA `web` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ;
USE `web`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER IGNORE TABLE users ADD UNIQUE (username);

CREATE TABLE `agenda` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

ALTER TABLE agenda ADD FOREIGN KEY (user_id) REFERENCES users (id);

-- https://colorhunt.co/palettes/navy
