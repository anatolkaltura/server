CREATE TABLE `drm_device`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`partner_id` INTEGER  NOT NULL,
	`profile_id` INTEGER  NOT NULL,
	`userId` VARCHAR(128)  NOT NULL,
	`deviceId` VARCHAR(128)  NOT NULL,
	`version` VARCHAR(128),
	`platformDescriptor` TEXT,
	`provider` INTEGER  NOT NULL,
	`status` INTEGER  NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	`custom_data` TEXT,
	PRIMARY KEY (`id`),
	KEY `partner_id_index`(`partner_id`),
	KEY `status_index`(`status`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
