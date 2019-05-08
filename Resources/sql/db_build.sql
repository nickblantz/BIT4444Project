DROP TABLE IF EXISTS `comment`, `review`, `restaurant_stats`, `restaurant`, `user_stats`, `user`;

CREATE TABLE `user` (
 `user_id` INT NOT NULL AUTO_INCREMENT,
 `username` VARCHAR(32) NOT NULL UNIQUE,
 `password` VARCHAR(60) NOT NULL,
 `is_owner` BOOLEAN NOT NULL,
 `first_name` VARCHAR(32) NOT NULL,
 `last_name` VARCHAR(32) NOT NULL,
 `phone_number` VARCHAR(10) NOT NULL,
 `email` VARCHAR(64) NOT NULL,
 `address_1` VARCHAR(128) NOT NULL,
 `address_2` VARCHAR(128) NOT NULL,
 `city` VARCHAR(128) NOT NULL,
 `state` VARCHAR(128) NOT NULL,
 `zipcode` VARCHAR(5) NOT NULL,
 PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `user_stats` (
 `statistic_id` INT NOT NULL AUTO_INCREMENT,
 `user_id` INT NOT NULL,
 `timestamp` DATETIME NOT NULL,
 `is_skip` BOOLEAN NOT NULL,
 PRIMARY KEY (`statistic_id`),
 CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `restaurant` (
 `restaurant_id` VARCHAR(22) NOT NULL,
 `owner_id` INT NOT NULL,
 `name` VARCHAR(64) NOT NULL,
 `local_img` BOOLEAN NOT NULL,
 `image_url` VARCHAR(256) NOT NULL,
 `phone_number` VARCHAR(14) NOT NULL,
 `price` VARCHAR(5) NOT NULL,
 `address_1` VARCHAR(128) NOT NULL,
 `address_2` VARCHAR(128) NOT NULL,
 `city` VARCHAR(128) NOT NULL,
 `state` VARCHAR(128) NOT NULL,
 `zipcode` VARCHAR(5) NOT NULL,
 PRIMARY KEY (`restaurant_id`),
 CONSTRAINT FOREIGN KEY (`owner_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `restaurant_stats` (
 `statistic_id` INT NOT NULL AUTO_INCREMENT,
 `restaurant_id` VARCHAR(22) NOT NULL,
 `timestamp` DATETIME NOT NULL,
 `is_skip` BOOLEAN NOT NULL,
 PRIMARY KEY (`statistic_id`),
 CONSTRAINT FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant`(`restaurant_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `review` (
 `review_id` INT NOT NULL AUTO_INCREMENT,
 `user_id` INT NOT NULL,
 `restaurant_id` VARCHAR(22) NOT NULL,
 `timestamp` DATETIME NOT NULL,
 `star_review` INT NOT NULL,
 `text_review` VARCHAR(8192) NOT NULL,
 PRIMARY KEY (`review_id`),
 CONSTRAINT FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `comment` (
 `comment_id` INT NOT NULL AUTO_INCREMENT,
 `uid` VARCHAR(13) NOT NULL,
 `timestamp` DATETIME NOT NULL,
 `comment` VARCHAR(8192) NOT NULL,
 PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

