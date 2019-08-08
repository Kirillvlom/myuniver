/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : my_university

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 12/06/2018 18:33:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for administrators
-- ----------------------------
DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators`  (
  `id_administrator` int(255) NOT NULL COMMENT 'id - администратора',
  `id_user` int(255) NULL DEFAULT NULL COMMENT 'id - пользователя',
  PRIMARY KEY (`id_administrator`) USING BTREE,
  INDEX `user`(`id_user`) USING BTREE COMMENT 'Пользователь'
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for answers_to_workspace
-- ----------------------------
DROP TABLE IF EXISTS `answers_to_workspace`;
CREATE TABLE `answers_to_workspace`  (
  `id_answers_to_workspace` int(255) NOT NULL COMMENT 'id - ответов к областям',
  `id_user` int(255) NULL DEFAULT NULL COMMENT 'id - пользователя',
  `comment_text` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Комментарий к прикрепленному файлу',
  `date_of_creation` datetime(0) NULL DEFAULT NULL COMMENT 'Дата добавления',
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Файл',
  `id_workspace` int(255) NULL DEFAULT NULL COMMENT 'Рабочая область',
  PRIMARY KEY (`id_answers_to_workspace`) USING BTREE,
  INDEX `user`(`id_user`) USING BTREE COMMENT 'Студент или Преподаватель\r\n',
  INDEX `id_workspace`(`id_workspace`) USING BTREE COMMENT 'Рабочая область\r\n',
  CONSTRAINT `users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `workspace_` FOREIGN KEY (`id_workspace`) REFERENCES `workspaces` (`id_workspace`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses`  (
  `id_course` int(255) NOT NULL COMMENT 'id - Курса',
  `name_course` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Название курса',
  PRIMARY KEY (`id_course`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of courses
-- ----------------------------
INSERT INTO `courses` VALUES (1, 'Первый курс');
INSERT INTO `courses` VALUES (2, 'Второй курс');
INSERT INTO `courses` VALUES (3, 'Третий курс');
INSERT INTO `courses` VALUES (4, 'Четвертый курс');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `id_department` int(255) NOT NULL COMMENT 'id - отдела',
  `name_department` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Название отдела',
  PRIMARY KEY (`id_department`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (1, 'Кафедра информатики и математики');

-- ----------------------------
-- Table structure for education
-- ----------------------------
DROP TABLE IF EXISTS `education`;
CREATE TABLE `education`  (
  `id_education` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id образования',
  `name_education` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Название образования',
  PRIMARY KEY (`id_education`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of education
-- ----------------------------
INSERT INTO `education` VALUES (1, 'СПО Очка');
INSERT INTO `education` VALUES (2, 'СПО Заочка');
INSERT INTO `education` VALUES (3, 'ВПО Очка');
INSERT INTO `education` VALUES (4, 'ВПО Заочка');

-- ----------------------------
-- Table structure for forms_of_training
-- ----------------------------
DROP TABLE IF EXISTS `forms_of_training`;
CREATE TABLE `forms_of_training`  (
  `id_form_of_training` int(255) NOT NULL COMMENT 'id формы обучения',
  `name_form_of_training` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Название формы обучения',
  PRIMARY KEY (`id_form_of_training`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forms_of_training
-- ----------------------------
INSERT INTO `forms_of_training` VALUES (1, 'СПО Очка');
INSERT INTO `forms_of_training` VALUES (2, 'СПО Заочка');
INSERT INTO `forms_of_training` VALUES (3, 'ВПО Очка');
INSERT INTO `forms_of_training` VALUES (4, 'ВПО Заочка');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id_group` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id группы',
  `name_group` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Название группы',
  `id_manager` int(255) NULL DEFAULT NULL COMMENT 'id - прикрепленного менеджера',
  `array_students` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Массив с студентами',
  PRIMARY KEY (`id_group`) USING BTREE,
  INDEX `id_manager`(`id_manager`) USING BTREE COMMENT 'id менеджера',
  CONSTRAINT `id_manager` FOREIGN KEY (`id_manager`) REFERENCES `managers` (`id_manager`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'Яр-Дли-401', 1, 'a:3:{i:0;i:1;i:1;i:2;i:2;i:17;}');
INSERT INTO `groups` VALUES (2, 'aa', 2, 'a:1:{i:0;i:16;}');
INSERT INTO `groups` VALUES (5, 'Тестовая группа', 2, NULL);
INSERT INTO `groups` VALUES (6, 'Тестовая группа', 54, NULL);
INSERT INTO `groups` VALUES (7, 'Тестовая группа', 54, 'a:8:{i:0;s:1:\"1\";i:1;s:2:\"37\";i:2;s:2:\"39\";i:3;s:2:\"40\";i:4;s:2:\"43\";i:5;s:2:\"44\";i:6;s:2:\"45\";i:7;s:2:\"50\";}');
INSERT INTO `groups` VALUES (8, '5:41', 54, 'a:1:{i:0;s:2:\"56\";}');

-- ----------------------------
-- Table structure for managers
-- ----------------------------
DROP TABLE IF EXISTS `managers`;
CREATE TABLE `managers`  (
  `id_manager` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id - менеджера',
  `id_user` int(255) NULL DEFAULT NULL COMMENT 'id - пользователя',
  `id_department` int(255) NULL DEFAULT NULL COMMENT 'id - отделения кафедры',
  PRIMARY KEY (`id_manager`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE COMMENT 'id - пользователя',
  INDEX `id_department`(`id_department`) USING BTREE COMMENT 'id - отделения кафедры\r\n',
  CONSTRAINT `department` FOREIGN KEY (`id_department`) REFERENCES `department` (`id_department`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of managers
-- ----------------------------
INSERT INTO `managers` VALUES (1, 1, 1);
INSERT INTO `managers` VALUES (2, 7, 1);
INSERT INTO `managers` VALUES (53, 55, 1);
INSERT INTO `managers` VALUES (54, 55, 1);

-- ----------------------------
-- Table structure for materials_for_the_field
-- ----------------------------
DROP TABLE IF EXISTS `materials_for_the_field`;
CREATE TABLE `materials_for_the_field`  (
  `id_materials_for_the_field` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id материала к области',
  `name_materials_for_the_field` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Название материала',
  `document_materials_for_the_field` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Путь к файлу на диске',
  `id_workspace` int(255) NULL DEFAULT NULL COMMENT 'Рабочая область',
  `type_material` int(255) NULL DEFAULT NULL COMMENT 'Тип материала\r\n1 - обычные материалы\r\n2 - документы',
  PRIMARY KEY (`id_materials_for_the_field`) USING BTREE,
  INDEX `id_workspace`(`id_workspace`) USING BTREE COMMENT 'Рабочая область',
  CONSTRAINT `workspace` FOREIGN KEY (`id_workspace`) REFERENCES `workspaces` (`id_workspace`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 100 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materials_for_the_field
-- ----------------------------
INSERT INTO `materials_for_the_field` VALUES (1, NULL, NULL, NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (2, NULL, NULL, NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (3, NULL, NULL, NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (4, NULL, NULL, NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (5, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (6, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (7, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (8, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (9, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (10, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (11, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (12, NULL, NULL, NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (13, '$name', NULL, NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (14, NULL, NULL, NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (15, NULL, NULL, NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (16, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (17, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(3).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (18, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (19, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(3).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (20, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (21, 'Untitled Diagram (2).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(2).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (22, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (23, 'Untitled Diagram (4).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(4).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (24, NULL, './assets/files/workspaces/11/document/', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (25, 'Untitled Diagram (1).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(1).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (26, 'Untitled Diagram (2).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(2).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (27, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(3).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (28, 'Untitled Diagram (4).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(4).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (29, 'Untitled Diagram (5).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(5).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (30, 'Untitled Diagram (1).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(1).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (31, 'Untitled Diagram (2).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(2).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (32, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(3).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (33, 'Untitled Diagram (4).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(4).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (34, 'Untitled Diagram (5).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(5).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (35, 'lol-doll-vacation-raskraska.jpg', './assets/files/workspaces/11/document/lol-doll-vacation-raskraska.jpg', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (36, 'Untitled Diagram (4).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(4).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (37, 'Untitled Diagram (6).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(6).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (38, NULL, './assets/files/workspaces/11/document/', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (39, '329638.htm', './assets/files/workspaces/11/document/329638.htm', 11, 2);
INSERT INTO `materials_for_the_field` VALUES (40, '111958780.gif', './assets/files/workspaces/11/document/111958780.gif', 11, 2);
INSERT INTO `materials_for_the_field` VALUES (41, 'shopkins-coloring-pages-cupcake-queen.jpg', './assets/files/workspaces/11/document/shopkins-coloring-pages-cupcake-queen.jpg', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (42, 'Untitled Diagram (1).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(1).xml', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (43, NULL, './assets/files/workspaces/11/document/', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (44, 'lol-doll-vacation-raskraska.jpg', './assets/files/workspaces/11/document/lol-doll-vacation-raskraska.jpg', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (45, 'Untitled Diagram (4).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(4).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (46, 'Untitled Diagram (6).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(6).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (47, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (48, '329638.htm', './assets/files/workspaces/11/document/329638.htm', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (49, '111958780.gif', './assets/files/workspaces/11/document/111958780.gif', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (50, 'shopkins-coloring-pages-cupcake-queen.jpg', './assets/files/workspaces/11/document/shopkins-coloring-pages-cupcake-queen.jpg', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (51, 'Untitled Diagram (1).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(1).xml', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (52, NULL, './assets/files/workspaces/11/document/', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (53, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(3).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (54, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (55, NULL, './assets/files/workspaces/11/document/', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (56, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(3).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (57, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (58, NULL, './assets/files/workspaces/11/document/', NULL, 2);
INSERT INTO `materials_for_the_field` VALUES (59, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/document/Untitled_Diagram_(3).xml', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (60, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (61, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (62, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (63, NULL, './assets/files/workspaces/11/document/', NULL, 1);
INSERT INTO `materials_for_the_field` VALUES (64, NULL, './assets/files/workspaces/11/material/', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (65, NULL, './assets/files/workspaces/11/material/', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (66, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(3).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (67, 'Untitled Diagram (4).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(4).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (68, 'Untitled Diagram (5).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(5).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (69, 'Untitled Diagram (6).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(6).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (70, 'Untitled Diagram (7).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(7).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (71, '329638.htm', './assets/files/workspaces/11/material/329638.htm', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (72, '111958780.gif', './assets/files/workspaces/11/material/111958780.gif', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (73, 'lol-doll-vacation-raskraska.jpg', './assets/files/workspaces/11/material/lol-doll-vacation-raskraska.jpg', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (74, 'my_university.pdf', './assets/files/workspaces/11/material/my_university.pdf', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (75, NULL, './assets/files/workspaces/11/material/', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (76, 'Untitled Diagram (3).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(3).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (77, 'Untitled Diagram (4).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(4).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (78, 'Untitled Diagram (5).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(5).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (79, 'Untitled Diagram (6).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(6).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (80, 'Untitled Diagram (7).xml', './assets/files/workspaces/11/material/Untitled_Diagram_(7).xml', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (81, '329638.htm', './assets/files/workspaces/11/material/329638.htm', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (82, NULL, './assets/files/workspaces/11/material/', 11, 1);
INSERT INTO `materials_for_the_field` VALUES (85, NULL, './assets/files/workspaces/6/material/', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (86, 'Untitled Diagram (2).xml', './assets/files/workspaces/6/material/Untitled_Diagram_(2).xml', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (87, 'Untitled Diagram (4).xml', './assets/files/workspaces/6/material/Untitled_Diagram_(4).xml', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (88, NULL, NULL, 6, 1);
INSERT INTO `materials_for_the_field` VALUES (89, NULL, NULL, 6, 1);
INSERT INTO `materials_for_the_field` VALUES (90, 'Untitled Diagram (2).xml', './assets/files/workspaces/6/material/Untitled_Diagram_(2).xml', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (91, 'Untitled Diagram (4).xml', './assets/files/workspaces/6/material/Untitled_Diagram_(4).xml', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (92, 'Untitled Diagram (2).xml', './assets/files/workspaces/6/material/Untitled_Diagram_(2).xml', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (93, 'Untitled Diagram (4).xml', './assets/files/workspaces/6/material/Untitled_Diagram_(4).xml', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (94, 'Untitled Diagram (2).xml', './assets/files/workspaces/6/material/Untitled_Diagram_(2).xml', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (95, 'Untitled Diagram (4).xml', './assets/files/workspaces/6/material/Untitled_Diagram_(4).xml', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (96, NULL, './assets/files/workspaces/6/material/', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (97, NULL, './assets/files/workspaces/6/material/', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (98, 'Rosolovskiy_diploma_public.pdf', './assets/files/workspaces/6/material/Rosolovskiy_diploma_public.pdf', 6, 1);
INSERT INTO `materials_for_the_field` VALUES (99, 'user.png', './assets/files/workspaces/6/material/user.png', 6, 1);

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions`  (
  `id_position` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id должности',
  `name_position` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Название должности',
  PRIMARY KEY (`id_position`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES (1, 'Преподаватель кафедры информационных технологий (договор)');

-- ----------------------------
-- Table structure for roleof
-- ----------------------------
DROP TABLE IF EXISTS `roleof`;
CREATE TABLE `roleof`  (
  `id_role` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id роли в системе',
  `name_role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Название роли',
  `access_role` int(255) NULL DEFAULT NULL COMMENT 'Значение роли',
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roleof
-- ----------------------------
INSERT INTO `roleof` VALUES (1, 'Студент', 10);
INSERT INTO `roleof` VALUES (2, 'Преподаватель', 20);
INSERT INTO `roleof` VALUES (3, 'Менеджер', 30);
INSERT INTO `roleof` VALUES (4, 'Администратор', 40);
INSERT INTO `roleof` VALUES (5, 'Бог', 9000);

-- ----------------------------
-- Table structure for specialties
-- ----------------------------
DROP TABLE IF EXISTS `specialties`;
CREATE TABLE `specialties`  (
  `id_specialty` int(255) NOT NULL AUTO_INCREMENT COMMENT 'Id специальности',
  `name_specialty` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Название специацльности',
  `id_course` int(255) NULL DEFAULT NULL COMMENT 'Специальность',
  `id_group` int(255) NULL DEFAULT NULL COMMENT 'Закрепелнная группа',
  PRIMARY KEY (`id_specialty`) USING BTREE,
  INDEX `id_course`(`id_course`) USING BTREE COMMENT 'Курс',
  INDEX `id_group`(`id_group`) USING BTREE COMMENT 'Группа',
  CONSTRAINT `_course` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of specialties
-- ----------------------------
INSERT INTO `specialties` VALUES (1, 'Прикладная информатика', 4, 1);
INSERT INTO `specialties` VALUES (2, 'Воу ', 4, 2);
INSERT INTO `specialties` VALUES (3, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id_student` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id Студента',
  `id_user` int(255) NULL DEFAULT NULL COMMENT 'id Пользователя',
  `id_course` int(255) NULL DEFAULT NULL COMMENT 'курс студента',
  `record_book_student` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Номер зачетной книжки студента',
  `id_specialty` int(255) NULL DEFAULT NULL COMMENT 'Id специальности',
  `id_form_of_training` int(255) NULL DEFAULT NULL COMMENT 'id формы обучения',
  `id_group` int(255) NULL DEFAULT NULL COMMENT 'id группы ',
  PRIMARY KEY (`id_student`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE COMMENT 'Пользователь ',
  INDEX `id_course`(`id_course`) USING BTREE COMMENT 'Курс обучения студента',
  INDEX `id_form_of_training`(`id_form_of_training`) USING BTREE COMMENT 'Форма обучения',
  INDEX `id_specialty`(`id_specialty`) USING BTREE COMMENT 'Название специальности',
  INDEX `id_group`(`id_group`) USING BTREE COMMENT 'Группа',
  CONSTRAINT `id_course` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_form_of_training` FOREIGN KEY (`id_form_of_training`) REFERENCES `forms_of_training` (`id_form_of_training`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_group` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id_group`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_specialty` FOREIGN KEY (`id_specialty`) REFERENCES `specialties` (`id_specialty`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 1, 4, '12345', 1, 1, 1);
INSERT INTO `students` VALUES (2, 4, 4, NULL, NULL, NULL, NULL);
INSERT INTO `students` VALUES (3, 35, 1, NULL, NULL, NULL, NULL);
INSERT INTO `students` VALUES (4, 37, 4, NULL, 1, 3, 1);
INSERT INTO `students` VALUES (5, 38, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (6, 39, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (7, 40, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (8, 41, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (9, 42, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (10, 43, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (11, 44, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (12, 45, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (13, 46, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (14, 47, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (15, 48, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (16, 49, 4, '12345678', 1, 3, 2);
INSERT INTO `students` VALUES (17, 50, 4, '12345678', 1, 3, 1);
INSERT INTO `students` VALUES (18, 56, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id_teachers` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id- учителя',
  `id_user` int(255) NULL DEFAULT NULL COMMENT 'id - пользователя',
  `id_department` int(255) NULL DEFAULT NULL COMMENT 'id - отделения кафедры',
  `id_position` int(255) NULL DEFAULT NULL COMMENT 'id - должности',
  PRIMARY KEY (`id_teachers`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE COMMENT 'id - пользователя',
  INDEX `id_department`(`id_department`) USING BTREE COMMENT 'id - отдела',
  INDEX `id_position`(`id_position`) USING BTREE COMMENT 'id - должности',
  CONSTRAINT `id_department` FOREIGN KEY (`id_department`) REFERENCES `department` (`id_department`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_position` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id_position`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (1, 2, 1, 1);
INSERT INTO `teachers` VALUES (2, 33, 1, 1);
INSERT INTO `teachers` VALUES (3, 34, NULL, NULL);
INSERT INTO `teachers` VALUES (4, 51, 1, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id пользователя',
  `login_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Логин пользователя',
  `name_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Имя пользователя',
  `surname_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Фамилия пользователя',
  `patronymic_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Отчество пользователя',
  `id_role_user` int(255) NULL DEFAULT NULL COMMENT 'Роль в системе',
  `password_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Пароль пользователя',
  `date_of_birth_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Дата рождения пользователя',
  `phone_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Телефон пользователя',
  `email_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Почта пользователя',
  `avatar_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default_avatar.png' COMMENT 'Аватарка пользователя',
  `array_setting_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Настройки пользователя',
  `sex_user` int(255) NULL DEFAULT NULL COMMENT 'Пол пользователя',
  `cover_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default_cover.jpg' COMMENT 'Обложка профиля',
  `blocking_user` int(255) NULL DEFAULT 0 COMMENT 'Заблокирован пользователь или нет, по умолчанию не заблокирован - 0',
  `date_of_registration` datetime(0) NULL DEFAULT NULL COMMENT 'Дата регистрации в системе',
  `id_workspace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Рабочие области',
  `id_course` int(255) NULL DEFAULT NULL COMMENT 'Курс студента',
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `id_role_user`(`id_role_user`) USING BTREE COMMENT 'Роль в системе',
  INDEX `id_course`(`id_course`) USING BTREE,
  CONSTRAINT `__course` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_role_user` FOREIGN KEY (`id_role_user`) REFERENCES `roleof` (`id_role`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'pechenka.io', 'Кирилл', 'Толелев', 'Сергеевич', 1, '25d55ad283aa400af464c76d713c07ad', '2018-06-16', '89022213868', 'pechenka.io@gmail.com', 'default_avatar.png', NULL, 1, 'default_cover.jpg', 0, '2018-06-11 17:21:24', '17', 4);
INSERT INTO `users` VALUES (2, 'TestTest', 'Тест', 'Тест', 'Многотест', 2, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'asda@dasdasdasdasdas.ruw', 'default_avatar.png', NULL, 2, 'default_cover.jpg', 0, NULL, 'a:1:{i:0;i:1;}', NULL);
INSERT INTO `users` VALUES (3, 'ktolev', 'Анна', 'Сальникова ', 'Дмитриевна', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'test@jooit.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 'ktolele', 'Сергей', 'Канашев', 'Алексеевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'admin@jooit.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (5, 'testtest', 'Андрей', 'Волков', 'Александрович', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'test@jooit.ru1', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (6, 'admin', ' Максим ', 'Втулкин ', 'Юрьевич', 2, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'maxvtulkin@rea-yar.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (7, 'meneger', 'Ирина', 'Уханова', 'Алексеевна', 3, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'iauhanova@rea-yar.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (8, 'qweqwe`', 'Елена', 'Жукова', 'Сергеевна', 1, '1a3c796f12a5d83c5a35529d63bc1e03', NULL, NULL, 'asda@dasdasdasdasdas.ruw1', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (9, 'adsdaad', 'Дмитрий', 'Загайнов', 'Сергеевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (10, 'adsdaad', 'Роман', 'Золотов', 'Олегович', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (11, 'asdfdsfdsdsdaad', 'Алексей', 'Лебедев', 'Сергеевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (12, 'sdfdsf', 'Алексей', 'Литенков', 'Алексеевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (13, 'adsdaaddsfdsfdsf', 'Александр', 'Лобов', 'Сергеевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (14, 'dpoltavec', 'Дмитрий', 'Полтавец', 'Юрьевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (15, 'adsdaad', 'Николай', 'Пономарев', 'Сергеевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (16, 'adsdaad', 'Владислав', 'Спиридонов', 'Рафаилович', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (17, 'adsdaad', 'Владислав', 'Страусов', 'Алексеевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (18, 'adsdaad', 'Алексей', 'Стрельцов', 'Андреевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (19, 'adsdaad', 'Денис', 'Сячин', 'Евргеньевич', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (20, 'adsdaad', 'Увгений', 'Ушаков', 'Денисович', 1, 'fcea920f7412b5da7be0cf42b8c93759', NULL, NULL, 'aaaa@ddd.ee', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL, NULL, NULL);
INSERT INTO `users` VALUES (33, 'id_teachers', 'asdasd', 'id_teachers', 'id_teachers', 2, 'e3314c7b1c3b63278a71200db65b4d85', NULL, NULL, 'id_teachers@idt.idteachers', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-05 16:03:37', NULL, NULL);
INSERT INTO `users` VALUES (34, 'lolololol', NULL, 'Толелева', NULL, 2, '811c9ae0b0dd1b28af87202d2b7408f2', NULL, NULL, 'Ddd@dd.dd', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-05 16:08:28', NULL, NULL);
INSERT INTO `users` VALUES (35, 'kseniaaaf', 'Ксения', 'Фадеева', 'Валерьевна', 1, 'e88b7af4d2b27fa5111e78aa68d017ee', NULL, NULL, 'Meteor_96@inbox.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-05 18:12:13', NULL, NULL);
INSERT INTO `users` VALUES (36, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'fcea920f7412b5da7be0cf42b8c93759', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:24:33', NULL, 4);
INSERT INTO `users` VALUES (37, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'fcea920f7412b5da7be0cf42b8c93759', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:36:09', '18', 4);
INSERT INTO `users` VALUES (38, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, '25d55ad283aa400af464c76d713c07ad', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:45:20', '9', 4);
INSERT INTO `users` VALUES (39, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, '25d55ad283aa400af464c76d713c07ad', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:46:51', NULL, 4);
INSERT INTO `users` VALUES (40, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'fcea920f7412b5da7be0cf42b8c93759', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:48:00', NULL, 4);
INSERT INTO `users` VALUES (41, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'fcea920f7412b5da7be0cf42b8c93759', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:48:30', NULL, 4);
INSERT INTO `users` VALUES (42, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:48:45', NULL, 4);
INSERT INTO `users` VALUES (43, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:49:08', NULL, 4);
INSERT INTO `users` VALUES (44, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:49:33', NULL, 4);
INSERT INTO `users` VALUES (45, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:50:17', NULL, 4);
INSERT INTO `users` VALUES (46, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:50:35', NULL, 4);
INSERT INTO `users` VALUES (47, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:51:55', NULL, 4);
INSERT INTO `users` VALUES (48, 'admin2', 'Стдуент', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:52:28', NULL, 4);
INSERT INTO `users` VALUES (49, 'admin2', 'Кирилл', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:52:33', NULL, 4);
INSERT INTO `users` VALUES (50, 'admin2', 'Кирилл', 'Толелевллл', 'cссс', 1, 'd41d8cd98f00b204e9800998ecf8427e', '2018-06-12', '89022213869', 'admin@jooit.ru222', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 03:52:48', NULL, 4);
INSERT INTO `users` VALUES (51, 'admin22', 'Кирилл', 'Толелевллл', 'cссс', 2, '25d55ad283aa400af464c76d713c07ad', '2018-06-07', '89022213869', 'maxvtulkin@rea-yar.ruh', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 04:00:13', NULL, NULL);
INSERT INTO `users` VALUES (52, 'admin2211', 'Кирилл', 'Толелевллл', 'cссс', 3, 'bbb8aae57c104cda40c93843ad5e6db8', '2018-06-07', '89022213869', 'maxvtulkin@rea-yar.ruh11', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 04:11:05', NULL, NULL);
INSERT INTO `users` VALUES (53, 'admin2211', 'Кирилл', 'Толелевллл', 'cссс', 3, 'bbb8aae57c104cda40c93843ad5e6db8', '2018-06-07', '89022213869', 'maxvtulkin@rea-yar.ruh11', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 04:11:23', NULL, NULL);
INSERT INTO `users` VALUES (54, 'admin221122', 'Кирилл', 'Толелевллл', 'cссс', 3, 'fcea920f7412b5da7be0cf42b8c93759', '2018-06-07', '89022213869', 'maxvtulkin@rea-yar.ruh1122', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 04:12:46', NULL, NULL);
INSERT INTO `users` VALUES (55, 'admin221122', 'Кирилл', 'Толелевллл', 'cссс', 3, 'fcea920f7412b5da7be0cf42b8c93759', '2018-06-07', '89022213869', 'maxvtulkin@rea-yar.ruh1122', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 04:14:44', NULL, NULL);
INSERT INTO `users` VALUES (56, 'student', 'Студент', 'Студент', 'Студент', 1, 'cd73502828457d15655bbd7a63fb0bc8', NULL, NULL, 'student@student.student', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-12 05:08:07', NULL, NULL);

-- ----------------------------
-- Table structure for workspaces
-- ----------------------------
DROP TABLE IF EXISTS `workspaces`;
CREATE TABLE `workspaces`  (
  `id_workspace` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id -рабочей области',
  `name_workspace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Название рабочей области',
  `date_of_creation` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Дата создания области',
  `id_teachers` int(255) NULL DEFAULT NULL COMMENT 'id - учителя',
  `deadline` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Дата сдачи работы',
  `execution_plan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'План выполнения (даты)',
  `cover_workspace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default_cover.jpg' COMMENT 'Обложка',
  `id_student` int(255) NULL DEFAULT NULL COMMENT 'Участник',
  `status_workspace` int(255) NULL DEFAULT NULL COMMENT 'Статус рабочей области',
  `admission` int(255) NULL DEFAULT NULL COMMENT 'Допуск к ВКР',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Описание к рабочей области',
  PRIMARY KEY (`id_workspace`) USING BTREE,
  INDEX `teachers`(`id_teachers`) USING BTREE COMMENT 'id - учителя',
  INDEX `id_student`(`id_student`) USING BTREE COMMENT 'Участник',
  CONSTRAINT `id_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_teachers__` FOREIGN KEY (`id_teachers`) REFERENCES `teachers` (`id_teachers`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of workspaces
-- ----------------------------
INSERT INTO `workspaces` VALUES (1, 'Тестовая рабочая область', '2018-06-08 02:02:26', 2, '08.06.2018', NULL, 'default_cover.jpg', 2, NULL, NULL, NULL);
INSERT INTO `workspaces` VALUES (2, 'Еще один тест))', '2018-06-08 02:44:27', 3, '09.06.2018', NULL, 'default_cover.jpg', 3, NULL, NULL, NULL);
INSERT INTO `workspaces` VALUES (3, '1234567', '2018-06-12 14:11:17', 2, NULL, 'a:2:{s:19:\"new_date_plan_array\";a:1:{i:0;s:10:\"2018-06-18\";}s:19:\"new_date_text_array\";a:1:{i:0;s:6:\"123456\";}}', 'default_cover.jpg', 4, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (4, '1234567', '2018-06-12 14:11:17', 2, NULL, 'a:2:{s:19:\"new_date_plan_array\";a:1:{i:0;s:10:\"2018-06-18\";}s:19:\"new_date_text_array\";a:1:{i:0;s:6:\"123456\";}}', 'default_cover.jpg', 1, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (5, '1234567', '2018-06-12 14:11:17', 2, NULL, 'a:2:{s:19:\"new_date_plan_array\";a:1:{i:0;s:10:\"2018-06-18\";}s:19:\"new_date_text_array\";a:1:{i:0;s:6:\"123456\";}}', 'default_cover.jpg', 5, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (6, '1234567', '2018-06-12 14:14:25', 2, NULL, 'a:2:{s:19:\"new_date_plan_array\";a:1:{i:0;s:10:\"2018-06-18\";}s:19:\"new_date_text_array\";a:1:{i:0;s:6:\"123456\";}}', 'default_cover.jpg', 4, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (9, 'Рабочая область', '2018-06-12 14:22:02', 2, '2018-06-13', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:2:\"ф\";i:1;s:0:\"\";}}', 'default_cover.jpg', 5, NULL, NULL, 'Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание Описание ');
INSERT INTO `workspaces` VALUES (10, 'asdsa', '2018-06-12 14:36:18', 1, '2018-06-13', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}}', 'default_cover.jpg', 1, NULL, NULL, 'asdasd');
INSERT INTO `workspaces` VALUES (11, 'asdasd', '2018-06-12 14:36:41', 1, '2018-06-16', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}}', 'default_cover.jpg', NULL, NULL, NULL, 'asdsadasd');
INSERT INTO `workspaces` VALUES (12, 'Рабочая область', '2018-06-12 15:38:29', 1, '2018-06-14', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:0:\"\";i:1;s:2:\"ф\";}}', 'default_cover.jpg', 1, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (13, 'Рабочая область', '2018-06-12 15:40:05', 1, '2018-06-14', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:0:\"\";i:1;s:2:\"ф\";}}', 'default_cover.jpg', 1, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (14, 'Рабочая область', '2018-06-12 15:40:36', 1, '2018-06-14', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:0:\"\";i:1;s:2:\"ф\";}}', 'default_cover.jpg', 1, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (15, 'Рабочая область', '2018-06-12 15:40:43', 1, '2018-06-14', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:0:\"\";i:1;s:2:\"ф\";}}', 'default_cover.jpg', 1, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (16, 'Рабочая область', '2018-06-12 15:40:53', 1, '2018-06-14', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:0:\"\";i:1;s:2:\"ф\";}}', 'default_cover.jpg', 1, NULL, NULL, 'Описание');
INSERT INTO `workspaces` VALUES (17, 'asdasdas', '2018-06-12 15:44:12', 1, '2018-06-21', 'a:2:{s:19:\"new_date_plan_array\";a:2:{i:0;s:0:\"\";i:1;s:0:\"\";}s:19:\"new_date_text_array\";a:2:{i:0;s:0:\"\";i:1;s:2:\"ф\";}}', 'default_cover.jpg', 1, NULL, NULL, 'asdasdasdasd');
INSERT INTO `workspaces` VALUES (18, 'выавыаавы', '2018-06-12 15:46:55', 3, '2018-06-21', 'a:2:{s:19:\"new_date_plan_array\";a:1:{i:0;s:10:\"2018-06-13\";}s:19:\"new_date_text_array\";a:1:{i:0;s:16:\"фывфывфы\";}}', 'default_cover.jpg', 4, NULL, NULL, 'ывавыавыавыавыавыа');

SET FOREIGN_KEY_CHECKS = 1;
