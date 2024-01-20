CREATE TABLE IF NOT EXISTS `transactions` (
    `id` int(11) unsigned NOT NULL,
    `paid_to` int(11) unsigned NOT NULL,
    `paid_by` int(11) unsigned NOT NULL,
    `amount` decimal(5,2) unsigned NOT NULL,
    `trdate` datetime NOT NULL,
    PRIMARY KEY (`id`),
    KEY `paid_to` (`paid_to`),
    KEY `paid_by` (`paid_by`)
    ) DEFAULT CHARSET=utf8;