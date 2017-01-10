ALTER TABLE `users`
ADD `email_verification_code` varchar(255) COLLATE 'latin1_swedish_ci' NOT NULL AFTER `passwd`,
COMMENT='';