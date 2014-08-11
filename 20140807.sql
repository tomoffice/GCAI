-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Aug 07, 2014, 02:39 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `gcai`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `exam_conf`
-- 

CREATE TABLE `exam_conf` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `num_chose` int(10) unsigned NOT NULL default '0',
  `level_limit` int(10) unsigned NOT NULL default '0',
  `pass_num` int(10) unsigned NOT NULL default '0',
  `level` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

-- 
-- 列出以下資料庫的數據： `exam_conf`
-- 

INSERT INTO `exam_conf` VALUES (1, 4, 5, 80, 1);

-- --------------------------------------------------------

-- 
-- 資料表格式： `exam_log`
-- 

CREATE TABLE `exam_log` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `member_id` int(10) unsigned NOT NULL,
  `level` int(10) unsigned NOT NULL,
  `correct_percent` int(10) unsigned default NULL,
  `exam_id` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=112 ;

-- 
-- 列出以下資料庫的數據： `exam_log`
-- 

INSERT INTO `exam_log` VALUES (84, 2, 1, 100, 5);
INSERT INTO `exam_log` VALUES (83, 2, 1, 100, 4);
INSERT INTO `exam_log` VALUES (82, 2, 1, 100, 3);
INSERT INTO `exam_log` VALUES (81, 2, 1, 100, 2);
INSERT INTO `exam_log` VALUES (80, 2, 1, 0, 1);
INSERT INTO `exam_log` VALUES (79, 1, 1, 0, 5);
INSERT INTO `exam_log` VALUES (85, 2, 1, 100, 6);
INSERT INTO `exam_log` VALUES (78, 1, 1, 67, 4);
INSERT INTO `exam_log` VALUES (77, 1, 1, 0, 3);
INSERT INTO `exam_log` VALUES (76, 1, 1, 0, 2);
INSERT INTO `exam_log` VALUES (75, 1, 1, 3, 1);
INSERT INTO `exam_log` VALUES (86, 2, 2, 100, 7);
INSERT INTO `exam_log` VALUES (87, 2, 2, 0, 8);
INSERT INTO `exam_log` VALUES (88, 2, 1, 100, 9);
INSERT INTO `exam_log` VALUES (89, 2, 1, 33, 10);
INSERT INTO `exam_log` VALUES (90, 2, 1, 0, 11);
INSERT INTO `exam_log` VALUES (91, 2, 1, 0, 12);
INSERT INTO `exam_log` VALUES (92, 2, 1, 0, 13);
INSERT INTO `exam_log` VALUES (93, 2, 1, 0, 14);
INSERT INTO `exam_log` VALUES (94, 2, 1, 0, 15);
INSERT INTO `exam_log` VALUES (95, 2, 1, 0, 16);
INSERT INTO `exam_log` VALUES (96, 2, 1, 0, 17);
INSERT INTO `exam_log` VALUES (97, 2, 1, 100, 18);
INSERT INTO `exam_log` VALUES (98, 2, 2, 0, 19);
INSERT INTO `exam_log` VALUES (99, 2, 2, 0, 20);
INSERT INTO `exam_log` VALUES (100, 2, 2, 0, 21);
INSERT INTO `exam_log` VALUES (101, 2, 2, 0, 22);
INSERT INTO `exam_log` VALUES (102, 2, 2, 0, 23);
INSERT INTO `exam_log` VALUES (103, 2, 2, 100, 24);
INSERT INTO `exam_log` VALUES (104, 2, 1, 0, 25);
INSERT INTO `exam_log` VALUES (105, 2, 2, 0, 26);
INSERT INTO `exam_log` VALUES (106, 2, 2, 100, 27);
INSERT INTO `exam_log` VALUES (107, 2, 2, 100, 28);
INSERT INTO `exam_log` VALUES (111, 2, 2, 100, 29);

-- --------------------------------------------------------

-- 
-- 資料表格式： `exam_record`
-- 

CREATE TABLE `exam_record` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `member_id` int(10) unsigned NOT NULL,
  `question` varchar(45) collate utf8_unicode_ci NOT NULL,
  `correct` varchar(45) collate utf8_unicode_ci NOT NULL,
  `student` varchar(45) collate utf8_unicode_ci default NULL,
  `state` enum('right','wrong') collate utf8_unicode_ci default NULL,
  `level` int(10) unsigned NOT NULL,
  `exam_id` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=298 ;

-- 
-- 列出以下資料庫的數據： `exam_record`
-- 

INSERT INTO `exam_record` VALUES (171, 1, 'develop', '開發，發明', '極佳的', 'wrong', 1, 1);
INSERT INTO `exam_record` VALUES (172, 1, 'class', '類別(一種物件導向程式設計的基本觀念)', '組合語言', 'wrong', 1, 1);
INSERT INTO `exam_record` VALUES (173, 1, 'definitely', '明確地，明顯地', '電腦', 'wrong', 1, 1);
INSERT INTO `exam_record` VALUES (174, 1, 'assembly language', '組合語言', '明確地，明顯地', 'wrong', 1, 2);
INSERT INTO `exam_record` VALUES (175, 1, 'excellent', '極佳的', '類別(一種物件導向程式設計的基本觀念)', 'wrong', 1, 2);
INSERT INTO `exam_record` VALUES (176, 1, 'check', '檢查', '電腦', 'wrong', 1, 2);
INSERT INTO `exam_record` VALUES (177, 1, 'develop', '開發，發明', '儘管', 'wrong', 1, 3);
INSERT INTO `exam_record` VALUES (178, 1, 'choice', '選擇', '設計', 'wrong', 1, 3);
INSERT INTO `exam_record` VALUES (179, 1, 'commercial', '商業的', '電腦', 'wrong', 1, 3);
INSERT INTO `exam_record` VALUES (180, 1, 'automatic', '自動的', '自動的', 'right', 1, 4);
INSERT INTO `exam_record` VALUES (181, 1, 'definitely', '明確地，明顯地', '明確地，明顯地', 'right', 1, 4);
INSERT INTO `exam_record` VALUES (182, 1, 'class', '類別(一種物件導向程式設計的基本觀念)', '儘管', 'wrong', 1, 4);
INSERT INTO `exam_record` VALUES (183, 1, 'definitely', '明確地，明顯地', 'null', NULL, 1, 5);
INSERT INTO `exam_record` VALUES (184, 1, 'computer', '電腦', 'null', NULL, 1, 5);
INSERT INTO `exam_record` VALUES (185, 1, 'design', '設計', 'null', NULL, 1, 5);
INSERT INTO `exam_record` VALUES (186, 2, 'excellent', '極佳的', '選擇', 'wrong', 1, 1);
INSERT INTO `exam_record` VALUES (187, 2, 'computer', '電腦', '商業的', 'wrong', 1, 1);
INSERT INTO `exam_record` VALUES (188, 2, 'definitely', '明確地，明顯地', '儘管', 'wrong', 1, 1);
INSERT INTO `exam_record` VALUES (189, 2, 'choice', '選擇', '選擇', 'right', 1, 2);
INSERT INTO `exam_record` VALUES (190, 2, 'develop', '開發，發明', '開發，發明', 'right', 1, 2);
INSERT INTO `exam_record` VALUES (191, 2, 'excellent', '極佳的', '極佳的', 'right', 1, 2);
INSERT INTO `exam_record` VALUES (192, 2, 'assembly language', '組合語言', '組合語言', 'right', 1, 3);
INSERT INTO `exam_record` VALUES (193, 2, 'automatic', '自動的', '自動的', 'right', 1, 3);
INSERT INTO `exam_record` VALUES (194, 2, 'excellent', '極佳的', '極佳的', 'right', 1, 3);
INSERT INTO `exam_record` VALUES (195, 2, 'excellent', '極佳的', '極佳的', 'right', 1, 4);
INSERT INTO `exam_record` VALUES (196, 2, 'despite', '儘管', '儘管', 'right', 1, 4);
INSERT INTO `exam_record` VALUES (197, 2, 'choice', '選擇', '選擇', 'right', 1, 4);
INSERT INTO `exam_record` VALUES (198, 2, 'assembly language', '組合語言', '組合語言', 'right', 1, 5);
INSERT INTO `exam_record` VALUES (199, 2, 'commercial', '商業的', '商業的', 'right', 1, 5);
INSERT INTO `exam_record` VALUES (200, 2, 'choice', '選擇', '選擇', 'right', 1, 5);
INSERT INTO `exam_record` VALUES (201, 2, 'design', '設計', '設計', 'right', 1, 6);
INSERT INTO `exam_record` VALUES (202, 2, 'excellent', '極佳的', '極佳的', 'right', 1, 6);
INSERT INTO `exam_record` VALUES (203, 2, 'definitely', '明確地，明顯地', '明確地，明顯地', 'right', 1, 6);
INSERT INTO `exam_record` VALUES (204, 2, 'originator', '鼻祖，發明人', '鼻祖，發明人', 'right', 2, 7);
INSERT INTO `exam_record` VALUES (205, 2, 'maintain', '維護', '維護', 'right', 2, 7);
INSERT INTO `exam_record` VALUES (206, 2, 'language', '語言', '語言', 'right', 2, 7);
INSERT INTO `exam_record` VALUES (207, 2, 'limit', '限制', 'null', NULL, 2, 8);
INSERT INTO `exam_record` VALUES (208, 2, 'memory', '記憶體', 'null', NULL, 2, 8);
INSERT INTO `exam_record` VALUES (209, 2, 'modern', '現代的', 'null', NULL, 2, 8);
INSERT INTO `exam_record` VALUES (210, 2, 'check', '檢查', '檢查', 'right', 1, 9);
INSERT INTO `exam_record` VALUES (211, 2, 'class', '類別(一種物件導向程式設計的基本觀念)', '類別(一種物件導向程式設計的基本觀念)', 'right', 1, 9);
INSERT INTO `exam_record` VALUES (212, 2, 'definitely', '明確地，明顯地', '明確地，明顯地', 'right', 1, 9);
INSERT INTO `exam_record` VALUES (213, 2, 'computer', '電腦', '電腦', 'right', 1, 10);
INSERT INTO `exam_record` VALUES (214, 2, 'despite', '儘管', '檢查', 'wrong', 1, 10);
INSERT INTO `exam_record` VALUES (215, 2, 'definitely', '明確地，明顯地', '設計', 'wrong', 1, 10);
INSERT INTO `exam_record` VALUES (216, 2, '', '', 'null', NULL, 1, 11);
INSERT INTO `exam_record` VALUES (217, 2, '', '', 'null', NULL, 1, 11);
INSERT INTO `exam_record` VALUES (218, 2, '', '', 'null', NULL, 1, 11);
INSERT INTO `exam_record` VALUES (219, 2, '', '', 'null', NULL, 1, 12);
INSERT INTO `exam_record` VALUES (220, 2, '', '', 'null', NULL, 1, 12);
INSERT INTO `exam_record` VALUES (221, 2, '', '', 'null', NULL, 1, 12);
INSERT INTO `exam_record` VALUES (222, 2, '', '', 'null', NULL, 1, 13);
INSERT INTO `exam_record` VALUES (223, 2, '', '', 'null', NULL, 1, 13);
INSERT INTO `exam_record` VALUES (224, 2, '', '', 'null', NULL, 1, 13);
INSERT INTO `exam_record` VALUES (225, 2, '', '', 'null', NULL, 1, 14);
INSERT INTO `exam_record` VALUES (226, 2, '', '', 'null', NULL, 1, 14);
INSERT INTO `exam_record` VALUES (227, 2, '', '', 'null', NULL, 1, 14);
INSERT INTO `exam_record` VALUES (228, 2, '', '', 'null', NULL, 1, 15);
INSERT INTO `exam_record` VALUES (229, 2, '', '', 'null', NULL, 1, 15);
INSERT INTO `exam_record` VALUES (230, 2, '', '', 'null', NULL, 1, 15);
INSERT INTO `exam_record` VALUES (231, 2, '', '', 'null', NULL, 1, 16);
INSERT INTO `exam_record` VALUES (232, 2, '', '', 'null', NULL, 1, 16);
INSERT INTO `exam_record` VALUES (233, 2, '', '', 'null', NULL, 1, 16);
INSERT INTO `exam_record` VALUES (234, 2, '', '', 'null', NULL, 1, 17);
INSERT INTO `exam_record` VALUES (235, 2, '', '', 'null', NULL, 1, 17);
INSERT INTO `exam_record` VALUES (236, 2, '', '', 'null', NULL, 1, 17);
INSERT INTO `exam_record` VALUES (237, 2, 'class', '類別(一種物件導向程式設計的基本觀念)', '類別(一種物件導向程式設計的基本觀念)', 'right', 1, 18);
INSERT INTO `exam_record` VALUES (238, 2, 'definitely', '明確地，明顯地', '明確地，明顯地', 'right', 1, 18);
INSERT INTO `exam_record` VALUES (239, 2, 'despite', '儘管', '儘管', 'right', 1, 18);
INSERT INTO `exam_record` VALUES (240, 2, 'general-purpose', '一般用途的，多用途的', 'null', NULL, 2, 19);
INSERT INTO `exam_record` VALUES (241, 2, 'feature', '特徵，特色', 'null', NULL, 2, 19);
INSERT INTO `exam_record` VALUES (242, 2, 'manipulate', '操控', 'null', NULL, 2, 19);
INSERT INTO `exam_record` VALUES (243, 2, 'extreme', '極端', 'null', NULL, 2, 20);
INSERT INTO `exam_record` VALUES (244, 2, 'fit', '合身，適合', 'null', NULL, 2, 20);
INSERT INTO `exam_record` VALUES (245, 2, 'memory', '記憶體', 'null', NULL, 2, 20);
INSERT INTO `exam_record` VALUES (246, 2, 'laboratory', '實驗室', '語言', 'wrong', 2, 21);
INSERT INTO `exam_record` VALUES (247, 2, 'extreme', '極端', '限制', 'wrong', 2, 21);
INSERT INTO `exam_record` VALUES (248, 2, 'fit', '合身，適合', '現代的', 'wrong', 2, 21);
INSERT INTO `exam_record` VALUES (249, 2, 'high-level', '高階的', 'null', NULL, 2, 22);
INSERT INTO `exam_record` VALUES (250, 2, 'extreme', '極端', 'null', NULL, 2, 22);
INSERT INTO `exam_record` VALUES (251, 2, 'modern', '現代的', 'null', NULL, 2, 22);
INSERT INTO `exam_record` VALUES (252, 2, 'fit', '合身，適合', 'null', NULL, 2, 23);
INSERT INTO `exam_record` VALUES (253, 2, 'modern', '現代的', 'null', NULL, 2, 23);
INSERT INTO `exam_record` VALUES (254, 2, 'extreme', '極端', 'null', NULL, 2, 23);
INSERT INTO `exam_record` VALUES (255, 2, 'manipulate', '操控', '操控', 'right', 2, 24);
INSERT INTO `exam_record` VALUES (256, 2, 'high-level', '高階的', '高階的', 'right', 2, 24);
INSERT INTO `exam_record` VALUES (257, 2, 'extreme', '極端', '極端', 'right', 2, 24);
INSERT INTO `exam_record` VALUES (258, 2, 'operating system', '作業系統', '作業系統', 'right', 2, 24);
INSERT INTO `exam_record` VALUES (259, 2, 'check', '檢查', 'null', NULL, 1, 25);
INSERT INTO `exam_record` VALUES (260, 2, 'assembly language', '組合語言', 'null', NULL, 1, 25);
INSERT INTO `exam_record` VALUES (261, 2, 'definitely', '明確地，明顯地', 'null', NULL, 1, 25);
INSERT INTO `exam_record` VALUES (262, 2, 'manipulate', '操控', 'null', NULL, 2, 26);
INSERT INTO `exam_record` VALUES (263, 2, 'limit', '限制', 'null', NULL, 2, 26);
INSERT INTO `exam_record` VALUES (264, 2, 'maintain', '維護', 'null', NULL, 2, 26);
INSERT INTO `exam_record` VALUES (265, 2, 'feature', '特徵，特色', 'null', NULL, 2, 26);
INSERT INTO `exam_record` VALUES (266, 2, 'limit', '限制', '限制', 'right', 2, 27);
INSERT INTO `exam_record` VALUES (267, 2, 'maintain', '維護', '維護', 'right', 2, 27);
INSERT INTO `exam_record` VALUES (268, 2, 'memory', '記憶體', '記憶體', 'right', 2, 27);
INSERT INTO `exam_record` VALUES (269, 2, 'origin', '起源', '起源', 'right', 2, 27);
INSERT INTO `exam_record` VALUES (270, 2, 'maintain', '維護', '維護', 'right', 2, 28);
INSERT INTO `exam_record` VALUES (271, 2, 'lie', '躺，臥', '躺，臥', 'right', 2, 28);
INSERT INTO `exam_record` VALUES (272, 2, 'general-purpose', '一般用途的，多用途的', '一般用途的，多用途的', 'right', 2, 28);
INSERT INTO `exam_record` VALUES (273, 2, 'origin', '起源', '起源', 'right', 2, 28);
INSERT INTO `exam_record` VALUES (294, 2, 'laboratory', '實驗室', '實驗室', 'right', 2, 29);
INSERT INTO `exam_record` VALUES (295, 2, 'general-purpose', '一般用途的，多用途的', '一般用途的，多用途的', 'right', 2, 29);
INSERT INTO `exam_record` VALUES (296, 2, 'memory', '記憶體', '記憶體', 'right', 2, 29);
INSERT INTO `exam_record` VALUES (297, 2, 'modern', '現代的', '現代的', 'right', 2, 29);

-- --------------------------------------------------------

-- 
-- 資料表格式： `member`
-- 

CREATE TABLE `member` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sid` varchar(45) collate utf8_unicode_ci default NULL,
  `account` varchar(45) collate utf8_unicode_ci NOT NULL,
  `password` varchar(60) collate utf8_unicode_ci NOT NULL,
  `name` varchar(45) collate utf8_unicode_ci NOT NULL,
  `type` enum('administrator','student','teacher','guest') collate utf8_unicode_ci default NULL,
  `email` varchar(45) collate utf8_unicode_ci default NULL,
  `crate_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

-- 
-- 列出以下資料庫的數據： `member`
-- 

INSERT INTO `member` VALUES (1, '10103030M', 'tom', '0955115526', '陳羿勳', 'student', 'tomoffice790519@gmail.com', '2014-07-26 15:21:08');
INSERT INTO `member` VALUES (2, NULL, 'test', 'test', 'test', 'student', NULL, '2014-07-26 15:23:01');
INSERT INTO `member` VALUES (3, NULL, 'test1', 'test1', 'test1', 'student', NULL, '0000-00-00 00:00:00');
INSERT INTO `member` VALUES (4, NULL, 'test2', 'test2', 'test2', 'student', NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- 資料表格式： `word`
-- 

CREATE TABLE `word` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `word` varchar(45) collate utf8_unicode_ci NOT NULL default '',
  `explanation` varchar(45) collate utf8_unicode_ci NOT NULL default '',
  `example` varchar(45) collate utf8_unicode_ci NOT NULL default '',
  `level` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

-- 
-- 列出以下資料庫的數據： `word`
-- 

INSERT INTO `word` VALUES (1, 'assembly language', '組合語言', 'Up until that time UNIX systems programs were', 1);
INSERT INTO `word` VALUES (2, 'automatic', '自動的', 'It does not have as many automatic checks as ', 1);
INSERT INTO `word` VALUES (3, 'check', '檢查', 'It does not have as many automatic checks as ', 1);
INSERT INTO `word` VALUES (4, 'choice', '選擇', 'This makes C an excellent choice for writing ', 1);
INSERT INTO `word` VALUES (5, 'class', '類別(一種物件導向程式設計的基本觀念)', 'The C++ programming language can be thought o', 1);
INSERT INTO `word` VALUES (6, 'commercial', '商業的', 'C and UNIX fit together so well that soon not', 1);
INSERT INTO `word` VALUES (7, 'computer', '電腦', 'its use is thus not limited to computers that', 1);
INSERT INTO `word` VALUES (8, 'definitely', '明確地，明顯地', 'The reverse is not true; many C++ programs ar', 1);
INSERT INTO `word` VALUES (9, 'design', '設計', 'Strouscrup designed C++ to be a better C.', 1);
INSERT INTO `word` VALUES (10, 'despite', '儘管', 'However, despite its popularity, C was not wi', 1);
INSERT INTO `word` VALUES (11, 'develop', '開發，發明', 'The C programming language was developed by D', 1);
INSERT INTO `word` VALUES (12, 'excellent', '極佳的', 'This makes C an excellent choice for writing ', 1);
INSERT INTO `word` VALUES (13, 'extreme', '極端', 'C is somewhere in between the two extremes of', 2);
INSERT INTO `word` VALUES (14, 'feature', '特徵，特色', 'The C++ programming language can be thought o', 2);
INSERT INTO `word` VALUES (15, 'fit', '合身，適合', 'C and UNIX fit together so well that soon not', 2);
INSERT INTO `word` VALUES (16, 'general-purpose', '一般用途的，多用途的', 'C is a general-purpose language that can be u', 2);
INSERT INTO `word` VALUES (17, 'high-level', '高階的', 'The C language is peculiar because it is a hi', 2);
INSERT INTO `word` VALUES (18, 'laboratory', '實驗室', 'The C programming language was developed by D', 2);
INSERT INTO `word` VALUES (19, 'language', '語言', 'This section gives an overview of the C++ pro', 2);
INSERT INTO `word` VALUES (20, 'lie', '躺，臥', 'C is somewhere in between the two extremes of', 2);
INSERT INTO `word` VALUES (21, 'limit', '限制', 'its use is thus not limited to computers that', 2);
INSERT INTO `word` VALUES (22, 'maintain', '維護', 'It was first used for writing and maintaining', 2);
INSERT INTO `word` VALUES (23, 'manipulate', '操控', 'C language programs can directly manipulate t', 2);
INSERT INTO `word` VALUES (24, 'memory', '記憶體', 'C language programs can directly manipulate t', 2);
INSERT INTO `word` VALUES (25, 'modern', '現代的', 'The C++ programming language can be thought o', 2);
INSERT INTO `word` VALUES (26, 'object-oriented programming', '物件導向程式設計', 'Unlike C, C++ has facilities for classes and ', 2);
INSERT INTO `word` VALUES (27, 'operating system', '作業系統', 'It was first used for writing and maintaining', 2);
INSERT INTO `word` VALUES (28, 'origin', '起源', 'ORIGINS OF THE C++ LANGUAGE', 2);
INSERT INTO `word` VALUES (29, 'assembly language', '組合語言', 'Up until that time UNIX systems programs were', 3);
INSERT INTO `word` VALUES (30, 'automatic', '自動的', 'It does not have as many automatic checks as ', 3);
INSERT INTO `word` VALUES (31, 'check', '檢查', 'It does not have as many automatic checks as ', 3);
INSERT INTO `word` VALUES (32, 'choice', '選擇', 'This makes C an excellent choice for writing ', 3);
INSERT INTO `word` VALUES (33, 'class', '類別(一種物件導向程式設計的基本觀念)', 'The C++ programming language can be thought o', 3);
INSERT INTO `word` VALUES (34, 'commercial', '商業的', 'C and UNIX fit together so well that soon not', 3);
INSERT INTO `word` VALUES (35, 'computer', '電腦', 'its use is thus not limited to computers that', 3);
INSERT INTO `word` VALUES (36, 'definitely', '明確地，明顯地', 'The reverse is not true; many C++ programs ar', 3);
INSERT INTO `word` VALUES (37, 'design', '設計', 'Strouscrup designed C++ to be a better C.', 3);
INSERT INTO `word` VALUES (38, 'despite', '儘管', 'However, despite its popularity, C was not wi', 3);
INSERT INTO `word` VALUES (39, 'develop', '開發，發明', 'The C programming language was developed by D', 3);
INSERT INTO `word` VALUES (40, 'excellent', '極佳的', 'This makes C an excellent choice for writing ', 3);
INSERT INTO `word` VALUES (41, 'extreme', '極端', 'C is somewhere in between the two extremes of', 3);
INSERT INTO `word` VALUES (42, 'feature', '特徵，特色', 'The C++ programming language can be thought o', 3);
INSERT INTO `word` VALUES (43, 'fit', '合身，適合', 'C and UNIX fit together so well that soon not', 3);
INSERT INTO `word` VALUES (44, 'general-purpose', '一般用途的，多用途的', 'C is a general-purpose language that can be u', 3);
INSERT INTO `word` VALUES (45, 'high-level', '高階的', 'The C language is peculiar because it is a hi', 3);
INSERT INTO `word` VALUES (46, 'laboratory', '實驗室', 'The C programming language was developed by D', 3);
INSERT INTO `word` VALUES (47, 'language', '語言', 'This section gives an overview of the C++ pro', 3);
INSERT INTO `word` VALUES (48, 'lie', '躺，臥', 'C is somewhere in between the two extremes of', 3);
INSERT INTO `word` VALUES (49, 'limit', '限制', 'its use is thus not limited to computers that', 3);
INSERT INTO `word` VALUES (50, 'maintain', '維護', 'It was first used for writing and maintaining', 3);
INSERT INTO `word` VALUES (51, 'manipulate', '操控', 'C language programs can directly manipulate t', 3);
INSERT INTO `word` VALUES (52, 'memory', '記憶體', 'C language programs can directly manipulate t', 3);
INSERT INTO `word` VALUES (53, 'modern', '現代的', 'The C++ programming language can be thought o', 3);
INSERT INTO `word` VALUES (54, 'object-oriented programming', '物件導向程式設計', 'Unlike C, C++ has facilities for classes and ', 3);
INSERT INTO `word` VALUES (55, 'operating system', '作業系統', 'It was first used for writing and maintaining', 3);
INSERT INTO `word` VALUES (56, 'origin', '起源', 'ORIGINS OF THE C++ LANGUAGE', 3);
INSERT INTO `word` VALUES (57, 'originator', '鼻祖，發明人', 'B is a language developed by Ken Thompson, th', 3);
INSERT INTO `word` VALUES (58, 'overcome', '克服', 'To overcome these and other shortcomings of C', 3);
INSERT INTO `word` VALUES (59, 'overview', '概要，綜述', 'This section gives an overview of the C++ pro', 3);
INSERT INTO `word` VALUES (60, 'peculiar', '特別的，特殊的', 'The C language is peculiar because it is a hi', 3);
INSERT INTO `word` VALUES (61, 'popularity', '普及,流行', 'C''s success and popularity are closely tied t', 4);
INSERT INTO `word` VALUES (62, 'program', 'n. 程式， v. 寫程式', 'This section gives an overview of the C++ pro', 4);
INSERT INTO `word` VALUES (63, 'programming', 'a. 程式的', 'This section gives an overview of the C++ pro', 4);
INSERT INTO `word` VALUES (64, 'reverse', '反面', 'The reverse is not true; many C++ programs ar', 4);
INSERT INTO `word` VALUES (65, 'run', '執行，跑程式', 'C and UNIX fit together so well that soon not', 4);
INSERT INTO `word` VALUES (66, 'section', '小節', 'This section gives an overview of the C++ pro', 4);
INSERT INTO `word` VALUES (67, 'sense', '意義、意思', 'For other programs (and in some sense even fo', 4);
INSERT INTO `word` VALUES (68, 'shortcoming', '缺點，短處', 'However, despite its popularity, C was not wi', 4);
INSERT INTO `word` VALUES (69, 'somewhere', '在某處', 'C is somewhere in between the two extremes of', 4);
INSERT INTO `word` VALUES (70, 'sort', '種類', 'C is a general-purpose language that can be u', 4);
INSERT INTO `word` VALUES (71, 'system', '系統', 'It was first used for writing and maintaining', 4);
INSERT INTO `word` VALUES (72, 'systems program', '系統程式', 'Up until that time UNIX systems programs were', 4);
INSERT INTO `word` VALUES (73, 'therein', '在那裡', 'C is somewhere in between the two extremes of', 4);
INSERT INTO `word` VALUES (74, 'thus', '因此', 'its use is thus not limited to computers that', 4);
INSERT INTO `word` VALUES (75, 'tie', '聯繫，拴', 'C''s success and popularity are closely tied t', 4);
INSERT INTO `word` VALUES (76, 'unlike', '不像', 'Unlike C, C++ has facilities for classes and ', 4);
INSERT INTO `word` VALUES (77, 'version', '版本', 'C became so popular that versions of the lang', 4);
INSERT INTO `word` VALUES (78, 'weakness', '缺點', 'C is somewhere in between the two extremes of', 4);
