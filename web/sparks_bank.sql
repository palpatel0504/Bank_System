-- File: C:\Bank_System_main\Bank-System-main\sparks_bank.sql
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Create transaction table
CREATE TABLE `transaction` (
  `sno` INT(3) NOT NULL,
  `sender` TEXT NOT NULL,
  `receiver` TEXT NOT NULL,
  `balance` INT(8) NOT NULL,
  `datetime` DATETIME NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Create user table
CREATE TABLE `user` (
  `id` INT(3) NOT NULL,
  `name` TEXT NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  `balance` INT(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert sample data into user table
INSERT INTO `user` (`id`, `name`, `email`, `balance`) VALUES
(1, 'Prasad', 'prasad@gmail.com', 50000),
(2, 'Safal', 'safal@gmail.com', 200000),
(3, 'Parth', 'parth@gmail.com', 50000),
(4, 'Yogesh', 'yogesh@gmail.com', 10000),
(5, 'Anvesh', 'anvesh@gmail.com', 40700),
(6, 'Gaurav', 'gaurav@gmail.com', 30000),
(7, 'Nikhil', 'nikhil@gmail.com', 50000),
(8, 'Jay', 'jay@gmail.com', 40000),
(9, 'Prathamesh', 'prathamesh@gmail.com', 130000),
(10, 'Swastika', 'swastika@gmail.com', 50000); -- fixed empty name

-- Set primary keys
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

-- Set auto-increment
ALTER TABLE `transaction`
  MODIFY `sno` INT(3) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id` INT(3) NOT NULL AUTO_INCREMENT;

COMMIT;
