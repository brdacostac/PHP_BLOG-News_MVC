USE `dbbrdacostac`;

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
    `id` int NOT NULL AUTO_INCREMENT,
    `login` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL,
    `password` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
    `isAdmin` tinyint(1) DEFAULT '0',
    PRIMARY KEY (`id`),
    UNIQUE KEY `login` (`login`)
) ENGINE=MyISAM AUTO_INCREMENT=312361 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
    `id` int NOT NULL AUTO_INCREMENT,
    `title` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
    `content` text COLLATE utf8mb3_unicode_ci NOT NULL,
    `date` date NOT NULL,
    `image` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=191218 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;


DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
     `id` int NOT NULL AUTO_INCREMENT,
     `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
     `date` datetime NOT NULL,
     `newsid` int DEFAULT NULL,
     `userlogin` varchar(30) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
      PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

COMMIT;

