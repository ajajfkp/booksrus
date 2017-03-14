CREATE TABLE `pageview` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `page` text NOT NULL,
 `userip` text NOT NULL,
 PRIMARY KEY (`id`)
);

ALTER TABLE `books`
CHANGE `isbn10` `isbn10` varchar(10) NOT NULL AFTER `id`,
CHANGE `isbn13` `isbn13` varchar(13) NOT NULL AFTER `isbn10`;