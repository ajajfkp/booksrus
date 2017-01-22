ALTER TABLE `books`
CHANGE `binding` `binding` varchar(255) NOT NULL AFTER `edition`,
COMMENT='';

ALTER TABLE `users`
ADD `profile_complete_flag` enum('0','1','2','3','4','5','6') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' COMMENT '0->incomplete,1->complete,3->profile,4->univercity,5->address,->contact' AFTER `active_status`,
ADD `wrong_passwd_atmpt` int(11) NOT NULL AFTER `profile_complete_flag`,
COMMENT=''; -- 0.086 s

ALTER TABLE `users`
CHANGE `profile_complete_flag` `profile_complete_flag` enum('0','1','2','3','4','5','6') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' COMMENT '0->incomplete,1->complete,2->profile,3->univercity,4->address,5->contact' AFTER `active_status`,
COMMENT=''; -- 0.074 s

ALTER TABLE `users`
CHANGE `profile_complete_flag` `profile_complete_flag` enum('0','1','2','3','4','5','6') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' COMMENT '0->complete,1->incomplete,2->profile,3->univercity,4->address,5->contact' AFTER `active_status`,
COMMENT=''; -- 0.093 s

ALTER TABLE `users`
CHANGE `profile_complete_flag` `profile_complete_flag` enum('0','1') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' COMMENT '1->complete,0->incomplete' AFTER `active_status`,
COMMENT=''; -- 0.161 s

ALTER TABLE `users`
ADD `university_flag` enum('0','1') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' COMMENT '1->complete,0->incomplete' AFTER `profile_complete_flag`,
COMMENT=''; -- 0.099 s

ALTER TABLE `users`
ADD `university_flag` enum('0','1') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' COMMENT '1->complete,0->incomplete' AFTER `profile_complete_flag`,
COMMENT=''; -- 0.099 s

ALTER TABLE `cities`
ADD `active_flag` enum('0','1') NOT NULL DEFAULT '1',
COMMENT=''; -- 0.821 s

ALTER TABLE `universities`
ADD `activ_flag` enum('0','1') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' AFTER `website`,
ADD `approved` enum('0','1') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' AFTER `activ_flag`,
COMMENT=''; -- 0.357 s

ALTER TABLE `universities`
CHANGE `activ_flag` `active_flag` enum('0','1') COLLATE 'latin1_swedish_ci' NOT NULL DEFAULT '0' AFTER `website`,
COMMENT=''; -- 0.277 s

