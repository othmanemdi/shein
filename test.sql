ALTER TABLE `carts`
ADD
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `nom`,
ADD
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP AFTER `created_at`,
ADD
    `deleted_at` DATETIME NULL DEFAULT NULL AFTER `updated_at`