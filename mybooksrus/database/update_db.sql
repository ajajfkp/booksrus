ALTER TABLE `books`
CHANGE `binding` `binding` varchar(255) NOT NULL AFTER `edition`,
COMMENT='';