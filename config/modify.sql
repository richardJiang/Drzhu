/*
所有改动的sql汇总文件
 */
/*
2017-8-7,分销系统增加字段
*/
ALTER TABLE `baijiacms`.`baijiacms_member`
ADD COLUMN `invitationCode` varchar(50) NOT NULL DEFAULT 0 COMMENT '邀请人主键编号' AFTER `outgoldinfo`;

INSERT INTO `baijiacms_modules` (`icon`,`group`,`title`,`version`,`name`) VALUES ('icon-money', 'addons', '分销设置', '1.0', 'addon8');
INSERT INTO `baijiacms_modules_menu`(`href`,`title`,`module`) VALUES ('index.php?mod=site&name=addon7&do=dispatchLevel', '分销等级设置', 'addon8');
