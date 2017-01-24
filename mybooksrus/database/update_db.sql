ALTER TABLE `books_transaction`
DROP `price`,
COMMENT=''; -- 0.090 s

ALTER TABLE `books`
ADD `image` varchar(255) COLLATE 'latin1_swedish_ci' NOT NULL AFTER `size`,
COMMENT=''; -- 0.260 s