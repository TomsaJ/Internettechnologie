
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- Category
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Category`;

CREATE TABLE `Category`
(
    `id` INTEGER(10) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `description` TEXT NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- Product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Product`
(
    `id` INTEGER(10) NOT NULL,
    `name` VARCHAR(100) NOT NULL,
    `price` DECIMAL(10,2) COMMENT 'Euro inkl. MwSt',
    `width` DECIMAL(10,4) COMMENT 'cm',
    `heigth` DECIMAL(10,4) COMMENT 'cm',
    `description` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- product_catalogy
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product_catalogy`;

CREATE TABLE `product_catalogy`
(
    `product_id` INTEGER(10) NOT NULL,
    `category_id` INTEGER(10) NOT NULL,
    PRIMARY KEY (`product_id`,`category_id`),
    INDEX `category_id` (`category_id`),
    CONSTRAINT `product_catalogy_ibfk_1`
        FOREIGN KEY (`product_id`)
        REFERENCES `Product` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT `product_catalogy_ibfk_2`
        FOREIGN KEY (`category_id`)
        REFERENCES `Category` (`id`)
        ON UPDATE CASCADE
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- user
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user`
(
    `username` VARCHAR(40) NOT NULL,
    `salt` INTEGER(9) NOT NULL,
    `password` CHAR(40) NOT NULL,
    PRIMARY KEY (`username`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
