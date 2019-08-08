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

 Date: 21/06/2018 03:33:03
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
  `id_answers_to_workspace` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id - ответов к областям',
  `id_user` int(255) NULL DEFAULT NULL COMMENT 'id - пользователя',
  `id_workspace` int(255) NULL DEFAULT NULL COMMENT 'Рабочая область',
  `comment_text` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Комментарий к прикрепленному файлу',
  `date_of_creation` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Дата добавления',
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Файл',
  `user_role` int(255) NULL DEFAULT NULL COMMENT 'Роль',
  `file_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Название файла',
  PRIMARY KEY (`id_answers_to_workspace`) USING BTREE,
  INDEX `user`(`id_user`) USING BTREE COMMENT 'Студент или Преподаватель\r\n',
  INDEX `id_workspace`(`id_workspace`) USING BTREE COMMENT 'Рабочая область\r\n',
  CONSTRAINT `users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `workspace_` FOREIGN KEY (`id_workspace`) REFERENCES `workspaces` (`id_workspace`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of answers_to_workspace
-- ----------------------------
INSERT INTO `answers_to_workspace` VALUES (15, 69, 110, 'Привет, скидываю своё оглавление на проверку))', '2018-06-21 00:36:31', './assets/files/workspaces/110/user_file/student/2018-06-21_Оглавление.docx', 10, 'Оглавление.docx');
INSERT INTO `answers_to_workspace` VALUES (16, 60, 110, 'Привет) посмотрела, можешь начинать писать диплом по этому оглавлению', '2018-06-21 00:39:44', NULL, 20, NULL);

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
  `id_manager` int(255) NULL DEFAULT NULL COMMENT 'id - прикрепленного менеджера',
  `name_group` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Название группы',
  PRIMARY KEY (`id_group`) USING BTREE,
  INDEX `id_manager`(`id_manager`) USING BTREE COMMENT 'id менеджера',
  CONSTRAINT `id_manager` FOREIGN KEY (`id_manager`) REFERENCES `managers` (`id_manager`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 2, 'ПИ-43');
INSERT INTO `groups` VALUES (2, 2, 'БИ-47');
INSERT INTO `groups` VALUES (3, 2, 'ИВТ-41');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of managers
-- ----------------------------
INSERT INTO `managers` VALUES (2, 7, 1);

-- ----------------------------
-- Table structure for materials_for_the_field
-- ----------------------------
DROP TABLE IF EXISTS `materials_for_the_field`;
CREATE TABLE `materials_for_the_field`  (
  `id_materials_for_the_field` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id материала к области',
  `id_workspace` int(255) NULL DEFAULT NULL COMMENT 'Рабочая область',
  `name_materials_for_the_field` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Название материала',
  `document_materials_for_the_field` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Путь к файлу на диске',
  `type_material` int(255) NULL DEFAULT NULL COMMENT 'Тип материала\r\n1 - обычные материалы\r\n2 - документы',
  PRIMARY KEY (`id_materials_for_the_field`) USING BTREE,
  INDEX `id_workspace`(`id_workspace`) USING BTREE COMMENT 'Рабочая область',
  CONSTRAINT `workspace` FOREIGN KEY (`id_workspace`) REFERENCES `workspaces` (`id_workspace`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 163 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of materials_for_the_field
-- ----------------------------
INSERT INTO `materials_for_the_field` VALUES (139, 104, NULL, './assets/files/workspaces/104/material/', 1);
INSERT INTO `materials_for_the_field` VALUES (140, 104, NULL, './assets/files/workspaces/104/document/', 2);
INSERT INTO `materials_for_the_field` VALUES (141, 105, 'Белов В.А..docx', './assets/files/workspaces/105/material/Belov_V.A..docx', 1);
INSERT INTO `materials_for_the_field` VALUES (142, 105, 'Варивода Р.С.___.docx', './assets/files/workspaces/105/material/Varivoda_R.S.___.docx', 1);
INSERT INTO `materials_for_the_field` VALUES (143, 105, 'метод указания по написанию вкр.docx', './assets/files/workspaces/105/document/metod_ukazaniya_po_napisaniyu_vkr.docx', 2);
INSERT INTO `materials_for_the_field` VALUES (144, 106, 'Белов В.А..docx', './assets/files/workspaces/106/material/Belov_V.A..docx', 1);
INSERT INTO `materials_for_the_field` VALUES (145, 106, 'Варивода Р.С.___.docx', './assets/files/workspaces/106/material/Varivoda_R.S.___.docx', 1);
INSERT INTO `materials_for_the_field` VALUES (146, 106, 'метод указания по написанию вкр.docx', './assets/files/workspaces/106/document/metod_ukazaniya_po_napisaniyu_vkr.docx', 2);
INSERT INTO `materials_for_the_field` VALUES (147, 107, 'Белов В.А..docx', './assets/files/workspaces/107/material/Belov_V.A..docx', 1);
INSERT INTO `materials_for_the_field` VALUES (148, 107, 'Варивода Р.С.___.docx', './assets/files/workspaces/107/material/Varivoda_R.S.___.docx', 1);
INSERT INTO `materials_for_the_field` VALUES (149, 107, 'метод указания по написанию вкр.docx', './assets/files/workspaces/107/document/metod_ukazaniya_po_napisaniyu_vkr.docx', 2);
INSERT INTO `materials_for_the_field` VALUES (150, 108, 'Белов В.А..docx', './assets/files/workspaces/108/material/Belov_V.A..docx', 1);
INSERT INTO `materials_for_the_field` VALUES (151, 108, 'Варивода Р.С.___.docx', './assets/files/workspaces/108/material/Varivoda_R.S.___.docx', 1);
INSERT INTO `materials_for_the_field` VALUES (152, 108, 'метод указания по написанию вкр.docx', './assets/files/workspaces/108/document/metod_ukazaniya_po_napisaniyu_vkr.docx', 2);
INSERT INTO `materials_for_the_field` VALUES (153, 109, 'Белов В.А..docx', './assets/files/workspaces/109/material/Belov_V.A..docx', 1);
INSERT INTO `materials_for_the_field` VALUES (154, 109, 'Варивода Р.С.___.docx', './assets/files/workspaces/109/material/Varivoda_R.S.___.docx', 1);
INSERT INTO `materials_for_the_field` VALUES (155, 109, 'метод указания по написанию вкр.docx', './assets/files/workspaces/109/document/metod_ukazaniya_po_napisaniyu_vkr.docx', 2);
INSERT INTO `materials_for_the_field` VALUES (156, 110, 'Белов В.А..docx', './assets/files/workspaces/110/material/Belov_V.A..docx', 1);
INSERT INTO `materials_for_the_field` VALUES (157, 110, 'Варивода Р.С.___.docx', './assets/files/workspaces/110/material/Varivoda_R.S.___.docx', 1);
INSERT INTO `materials_for_the_field` VALUES (158, 110, 'метод указания по написанию вкр.docx', './assets/files/workspaces/110/document/metod_ukazaniya_po_napisaniyu_vkr.docx', 2);
INSERT INTO `materials_for_the_field` VALUES (159, 110, NULL, './assets/files/workspaces/110/material/', 1);
INSERT INTO `materials_for_the_field` VALUES (160, 110, NULL, './assets/files/workspaces/110/document/', 2);
INSERT INTO `materials_for_the_field` VALUES (161, 110, NULL, './assets/files/workspaces/110/material/', 1);
INSERT INTO `materials_for_the_field` VALUES (162, 110, NULL, './assets/files/workspaces/110/document/', 2);

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions`  (
  `id_position` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id должности',
  `name_position` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Название должности',
  PRIMARY KEY (`id_position`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES (1, 'Преподаватель кафедры информационных технологий (договор)');
INSERT INTO `positions` VALUES (2, 'Доктор физико-математических наук, доцент');

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
  `Profile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Профиль',
  PRIMARY KEY (`id_specialty`) USING BTREE,
  INDEX `id_course`(`id_course`) USING BTREE COMMENT 'Курс',
  INDEX `id_group`(`id_group`) USING BTREE COMMENT 'Группа',
  CONSTRAINT `_course` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of specialties
-- ----------------------------
INSERT INTO `specialties` VALUES (1, '09.03.03. Прикладная информатика. «ИТ сервисы и ресурсы предприятия»', 4, 1, 'Прикладная информатика в экономике');
INSERT INTO `specialties` VALUES (2, '38.03.05. Бизнес-информатика. «Архитектура предприятия»', 4, 2, 'Архитектура предприятия');
INSERT INTO `specialties` VALUES (3, '09.03.01. Информатика и вычислительная техника', 4, 3, 'автоматизированные системы обработки информации и управление');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id_student` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id Студента',
  `id_user` int(255) NULL DEFAULT NULL COMMENT 'id Пользователя',
  `id_specialty` int(255) NULL DEFAULT NULL COMMENT 'Id специальности',
  `id_course` int(255) NULL DEFAULT NULL COMMENT 'курс студента',
  `id_form_of_training` int(255) NULL DEFAULT NULL COMMENT 'id формы обучения',
  `id_group` int(255) NULL DEFAULT NULL COMMENT 'id группы ',
  `record_book_student` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Номер зачетной книжки студента',
  `theme_vkr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Тема ВКР',
  `evaluation_vkr` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Оценка за ВКР',
  PRIMARY KEY (`id_student`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE COMMENT 'Пользователь ',
  INDEX `id_course`(`id_course`) USING BTREE COMMENT 'Курс обучения студента',
  INDEX `id_form_of_training`(`id_form_of_training`) USING BTREE COMMENT 'Форма обучения',
  INDEX `id_specialty`(`id_specialty`) USING BTREE COMMENT 'Название специальности',
  INDEX `id_group`(`id_group`) USING BTREE COMMENT 'Группа',
  CONSTRAINT `id_course` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_form_of_training` FOREIGN KEY (`id_form_of_training`) REFERENCES `forms_of_training` (`id_form_of_training`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_specialty` FOREIGN KEY (`id_specialty`) REFERENCES `specialties` (`id_specialty`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (20, 58, 1, 4, 3, 1, 'ЯР-ДКИ-14-001', 'Информационная система исследования финансовой устойчивости предприятия биоэкономического профиля (на примере конкретной организации) ', NULL);
INSERT INTO `students` VALUES (21, 59, 1, 4, 3, 1, 'ЯР-ДКИ-14-002', 'Автоматизация учета клиентов на предприятии (на примере конкретной организации) ', NULL);
INSERT INTO `students` VALUES (22, 66, 1, 4, 3, 1, 'ЯР-ДКИ-14-003', 'Проектирование и разработка информационной системы по управлению персоналом на предприятии (на примере конкретной организации)', NULL);
INSERT INTO `students` VALUES (23, 67, 1, 4, 3, 1, 'ЯР-ДКИ-14-004', 'Разработка программного средства для оценки экономической эффективности информационной системы (на примере конкретной организации биотехнологического профиля) ', NULL);
INSERT INTO `students` VALUES (24, 68, 1, 4, 3, 1, 'ЯР-ДКИ-14-005', 'Проектирование и разработка информационной системы по управлению персоналом на предприятии', NULL);
INSERT INTO `students` VALUES (25, 69, 1, 4, 3, 1, 'ЯР-ДКИ-14-006', 'Разработка подсистемы сбора, передачи и обработки информации в биомедицинской отрасли', NULL);

-- ----------------------------
-- Table structure for teachers
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers`  (
  `id_teachers` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id- учителя',
  `id_user` int(255) NULL DEFAULT NULL COMMENT 'id - пользователя',
  `id_position` int(255) NULL DEFAULT NULL COMMENT 'id - должности',
  `id_department` int(255) NULL DEFAULT NULL COMMENT 'id - отделения кафедры',
  PRIMARY KEY (`id_teachers`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE COMMENT 'id - пользователя',
  INDEX `id_department`(`id_department`) USING BTREE COMMENT 'id - отдела',
  INDEX `id_position`(`id_position`) USING BTREE COMMENT 'id - должности',
  CONSTRAINT `id_department` FOREIGN KEY (`id_department`) REFERENCES `department` (`id_department`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_position` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id_position`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES (5, 60, 2, 1);
INSERT INTO `teachers` VALUES (6, 61, 1, 1);
INSERT INTO `teachers` VALUES (7, 62, 2, 1);
INSERT INTO `teachers` VALUES (8, 63, 1, 1);
INSERT INTO `teachers` VALUES (9, 64, 2, 1);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id_user` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id пользователя',
  `id_course` int(255) NULL DEFAULT NULL COMMENT 'Курс студента',
  `id_role_user` int(255) NULL DEFAULT NULL COMMENT 'Роль в системе',
  `id_workspace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Рабочие области',
  `login_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Логин пользователя',
  `name_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Имя пользователя',
  `surname_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Фамилия пользователя',
  `patronymic_user` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Отчество пользователя',
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
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `id_role_user`(`id_role_user`) USING BTREE COMMENT 'Роль в системе',
  INDEX `id_course`(`id_course`) USING BTREE,
  CONSTRAINT `__course` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id_course`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_role_user` FOREIGN KEY (`id_role_user`) REFERENCES `roleof` (`id_role`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 4, 1, NULL, 'pechenka.io', 'Кирилл', 'Толелев', 'Сергеевич', '25d55ad283aa400af464c76d713c07ad', '2018-06-17', '89022213868', 'pechenka.io@gmail.com', 'default_avatar.png', NULL, 1, 'default_cover.jpg', 0, '2018-06-11 17:21:24');
INSERT INTO `users` VALUES (7, NULL, 3, NULL, 'meneger', 'Ирина', 'Уханова', 'Алексеевна', 'fcea920f7412b5da7be0cf42b8c93759', '1996-02-21', '8(999) 568-7489', 'iauhanova@rea-yar.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, NULL);
INSERT INTO `users` VALUES (57, 4, 1, NULL, 'aoantonova', 'Анастасия ', 'Антонова ', 'Олеговна', 'd41d8cd98f00b204e9800998ecf8427e', '1991-06-12', '88005553535', 'miss.antonova555@mail.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-16 13:25:59');
INSERT INTO `users` VALUES (58, 4, 1, '105', 'skanashev', 'Сергей	', 'Канашев	', 'Алексеевич', 'ae7aadd8d4474fedbd793b2b05d31eb0', '1996-02-07', '8(902) 221-3898', NULL, 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 22:41:49');
INSERT INTO `users` VALUES (59, NULL, 1, '106', 'avvolkov', 'Андрей', 'Волков', 'Александрович', '3548a48a6e1204b180df595311562e15', '1996-06-13', '8(905) 446-7898', 'avvolkov@mail.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 22:53:54');
INSERT INTO `users` VALUES (60, NULL, 2, NULL, 'vzholudeva', 'Вера', 'Жолудева', 'Витальевна', '720a8b495a0f37d92175f1f2a5b7c168', '1975-06-05', '8(999) 568-7898', 'vzholudeva@rea-yar.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:00:46');
INSERT INTO `users` VALUES (61, NULL, 2, NULL, 'ovkartasheva', 'Ольга', 'Карташева', 'Витальевна', 'fa07ca4c7c1d5896cd94b3523e85d317', '1955-08-20', '8(905) 556-8897', 'ovkartasheva@rea-yar.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:20:21');
INSERT INTO `users` VALUES (62, NULL, 2, NULL, 'tpnikitina', 'Татьяна	', 'Никитина	', 'Павловна', 'a4724e226bdd8e2151358dec4a00cc31', '1971-01-05', '8(905) 668-9948', 'tpnikitina@rea-yar.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:21:25');
INSERT INTO `users` VALUES (63, NULL, 2, NULL, 'vbogun', 'Виталий', 'Богун', 'Викторович', '809c1c7636e358fe99c17fd39b791dce', '1950-02-15', '8(999) 555-6898', 'vbogun@mail.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:23:25');
INSERT INTO `users` VALUES (64, NULL, 2, NULL, 'zharov', 'Алексей 	', 'Жаров	', 'Николаевич', '0570b38e366fd5b4ab548c296ae97fec', '1977-06-09', '8(998) 665-9878', 'zharov@mail.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:24:26');
INSERT INTO `users` VALUES (66, 4, 1, '107', ' mvspran', ' Максим 	', 'Спиранский 	', 'Юрьевич', '7fec770601edf95091530421af51e689', '1995-02-12', '8(905) 665-3457', 'mvspran@mail.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:31:57');
INSERT INTO `users` VALUES (67, 4, 1, '108', 'ezhukova004', 'Елена	', 'Жукова	', 'Сергеевна', 'c8359661460970dbec832b16655d5c19', '1995-10-25', '8(996) 889-5568', 'ezhukova004@mail.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:32:59');
INSERT INTO `users` VALUES (68, 4, 1, '109', 'dzagainov', 'Дмитрий', 'Загайнов	', 'Сергеевич', '63cf925b1d0168648fd24d3617e19975', '1991-12-28', '8(965) 897-5564', 'dzagainov@mail.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:33:52');
INSERT INTO `users` VALUES (69, 4, 1, '110', 'annasalnicova', 'Аннаа', 'Сальникова ', 'Дмитриевна', '5a4ce2d888f3c35df8efdd185019f9fe', '1996-02-09', '8(958) 446-5598', 'annasalnicova@mail.ru', 'default_avatar.png', NULL, NULL, 'default_cover.jpg', 0, '2018-06-20 23:35:21');

-- ----------------------------
-- Table structure for workspaces
-- ----------------------------
DROP TABLE IF EXISTS `workspaces`;
CREATE TABLE `workspaces`  (
  `id_workspace` int(255) NOT NULL AUTO_INCREMENT COMMENT 'id -рабочей области',
  `id_teachers` int(255) NULL DEFAULT NULL COMMENT 'id - учителя',
  `id_student` int(255) NULL DEFAULT NULL COMMENT 'Участник',
  `name_workspace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Название рабочей области',
  `date_of_creation` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Дата создания области',
  `deadline` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Дата сдачи работы',
  `execution_plan` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'План выполнения (даты)',
  `cover_workspace` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT 'default_cover.jpg' COMMENT 'Обложка',
  `status_workspace` int(255) NULL DEFAULT NULL COMMENT 'Статус рабочей области',
  `admission` int(255) NULL DEFAULT NULL COMMENT 'Допуск к ВКР',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'Описание к рабочей области',
  `teme` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Тема',
  `delete_student` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ФИО Удаленного студента',
  `delete_teacher` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ФИО Удаленного учителя',
  `archive` int(255) NULL DEFAULT NULL COMMENT 'Архивная область или нет',
  PRIMARY KEY (`id_workspace`) USING BTREE,
  INDEX `teachers`(`id_teachers`) USING BTREE COMMENT 'id - учителя',
  INDEX `id_student`(`id_student`) USING BTREE COMMENT 'Участник',
  CONSTRAINT `id_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id_student`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `id_teachers__` FOREIGN KEY (`id_teachers`) REFERENCES `teachers` (`id_teachers`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of workspaces
-- ----------------------------
INSERT INTO `workspaces` VALUES (104, 5, 20, 'Новая рабочая область', '2018-02-01 22:43:49', '2018-06-15', 'a:2:{s:19:\"new_date_plan_array\";N;s:19:\"new_date_text_array\";N;}', 'default_cover.jpg', NULL, NULL, 'фывфыв', NULL, NULL, NULL, NULL);
INSERT INTO `workspaces` VALUES (105, 5, 20, 'Написание дипломной работы - Жолудева ПИ-43', '2018-02-01 22:43:49', '2018-06-15', 'a:2:{s:19:\"new_date_plan_array\";a:8:{i:0;s:10:\"2018-02-15\";i:1;s:10:\"2018-03-15\";i:2;s:10:\"2018-04-10\";i:3;s:10:\"2018-05-20\";i:4;s:10:\"2018-05-25\";i:5;s:10:\"2018-06-05\";i:6;s:10:\"2018-06-15\";i:7;s:10:\"2018-06-27\";}s:19:\"new_date_text_array\";a:8:{i:0;s:158:\"Изучение литературных источников, нормативных документов, статистической информации\";i:1;s:31:\"Написание 1 главы\";i:2;s:122:\"Сбор и обработка практического материала по теме дипломной работы\";i:3;s:31:\"Написание 2 главы\";i:4;s:106:\"Представление руководителю на проверку дипломной работы \";i:5;s:50:\"Доработка дипломной работы\";i:6;s:39:\"Срок сдачи на кафедру\";i:7;s:19:\"Защита ВКР\";}}', 'default_cover.jpg', NULL, NULL, 'Дипломная работа - это письменное научное исследование на относящуюся к специальности выпускника тему, в котором он демонстрирует соответствие освоенного объема теоретических знаний и практических умений федеральным образовательным стандартам. ВКР, или диплом, специалиста, в зависимости от специфики направления обучения может выполняться в виде: дипломной работы - ее в большинстве случаев пишут студенты, изучающие естественные, гуманитарные, общественные науки или осваивающие творческие профессии, с целью систематизировать приобретенный в вузе теоретический багаж и показать владение навыками, необходимыми для самостоятельной работы; дипломного проекта - его делают, как правило, выпускники технических вузов и прикладных специальностей, так как он подразумевает выполнение расчетов, подтверждающих предложенное автором решение конкретных практических задач, или содержит элементы проектирования - разработку методик, моделей, инструкций, программ, технологий, бизнес-планов.\r\n\r\nИсточник: https://edunews.ru/students/vypusknaya/kak-pisat-diplom.html\r\n© edunews.ru', NULL, NULL, NULL, NULL);
INSERT INTO `workspaces` VALUES (106, 5, 21, 'Написание дипломной работы - Жолудева ПИ-43', '2018-02-01 22:43:49', '2018-06-15', 'a:2:{s:19:\"new_date_plan_array\";a:8:{i:0;s:10:\"2018-02-15\";i:1;s:10:\"2018-03-15\";i:2;s:10:\"2018-04-10\";i:3;s:10:\"2018-05-20\";i:4;s:10:\"2018-05-25\";i:5;s:10:\"2018-06-05\";i:6;s:10:\"2018-06-15\";i:7;s:10:\"2018-06-27\";}s:19:\"new_date_text_array\";a:8:{i:0;s:158:\"Изучение литературных источников, нормативных документов, статистической информации\";i:1;s:31:\"Написание 1 главы\";i:2;s:122:\"Сбор и обработка практического материала по теме дипломной работы\";i:3;s:31:\"Написание 2 главы\";i:4;s:106:\"Представление руководителю на проверку дипломной работы \";i:5;s:50:\"Доработка дипломной работы\";i:6;s:39:\"Срок сдачи на кафедру\";i:7;s:19:\"Защита ВКР\";}}', 'default_cover.jpg', NULL, NULL, 'Дипломная работа - это письменное научное исследование на относящуюся к специальности выпускника тему, в котором он демонстрирует соответствие освоенного объема теоретических знаний и практических умений федеральным образовательным стандартам. ВКР, или диплом, специалиста, в зависимости от специфики направления обучения может выполняться в виде: дипломной работы - ее в большинстве случаев пишут студенты, изучающие естественные, гуманитарные, общественные науки или осваивающие творческие профессии, с целью систематизировать приобретенный в вузе теоретический багаж и показать владение навыками, необходимыми для самостоятельной работы; дипломного проекта - его делают, как правило, выпускники технических вузов и прикладных специальностей, так как он подразумевает выполнение расчетов, подтверждающих предложенное автором решение конкретных практических задач, или содержит элементы проектирования - разработку методик, моделей, инструкций, программ, технологий, бизнес-планов.\r\n\r\nИсточник: https://edunews.ru/students/vypusknaya/kak-pisat-diplom.html\r\n© edunews.ru', NULL, NULL, NULL, NULL);
INSERT INTO `workspaces` VALUES (107, 5, 22, 'Написание дипломной работы - Жолудева ПИ-43', '2018-02-01 22:43:49', '2018-06-15', 'a:2:{s:19:\"new_date_plan_array\";a:8:{i:0;s:10:\"2018-02-15\";i:1;s:10:\"2018-03-15\";i:2;s:10:\"2018-04-10\";i:3;s:10:\"2018-05-20\";i:4;s:10:\"2018-05-25\";i:5;s:10:\"2018-06-05\";i:6;s:10:\"2018-06-15\";i:7;s:10:\"2018-06-27\";}s:19:\"new_date_text_array\";a:8:{i:0;s:158:\"Изучение литературных источников, нормативных документов, статистической информации\";i:1;s:31:\"Написание 1 главы\";i:2;s:122:\"Сбор и обработка практического материала по теме дипломной работы\";i:3;s:31:\"Написание 2 главы\";i:4;s:106:\"Представление руководителю на проверку дипломной работы \";i:5;s:50:\"Доработка дипломной работы\";i:6;s:39:\"Срок сдачи на кафедру\";i:7;s:19:\"Защита ВКР\";}}', 'default_cover.jpg', NULL, NULL, 'Дипломная работа - это письменное научное исследование на относящуюся к специальности выпускника тему, в котором он демонстрирует соответствие освоенного объема теоретических знаний и практических умений федеральным образовательным стандартам. ВКР, или диплом, специалиста, в зависимости от специфики направления обучения может выполняться в виде: дипломной работы - ее в большинстве случаев пишут студенты, изучающие естественные, гуманитарные, общественные науки или осваивающие творческие профессии, с целью систематизировать приобретенный в вузе теоретический багаж и показать владение навыками, необходимыми для самостоятельной работы; дипломного проекта - его делают, как правило, выпускники технических вузов и прикладных специальностей, так как он подразумевает выполнение расчетов, подтверждающих предложенное автором решение конкретных практических задач, или содержит элементы проектирования - разработку методик, моделей, инструкций, программ, технологий, бизнес-планов.\r\n\r\nИсточник: https://edunews.ru/students/vypusknaya/kak-pisat-diplom.html\r\n© edunews.ru', NULL, NULL, NULL, NULL);
INSERT INTO `workspaces` VALUES (108, 5, 23, 'Написание дипломной работы - Жолудева ПИ-43', '2018-02-01 22:43:49', '2018-06-15', 'a:2:{s:19:\"new_date_plan_array\";a:8:{i:0;s:10:\"2018-02-15\";i:1;s:10:\"2018-03-15\";i:2;s:10:\"2018-04-10\";i:3;s:10:\"2018-05-20\";i:4;s:10:\"2018-05-25\";i:5;s:10:\"2018-06-05\";i:6;s:10:\"2018-06-15\";i:7;s:10:\"2018-06-27\";}s:19:\"new_date_text_array\";a:8:{i:0;s:158:\"Изучение литературных источников, нормативных документов, статистической информации\";i:1;s:31:\"Написание 1 главы\";i:2;s:122:\"Сбор и обработка практического материала по теме дипломной работы\";i:3;s:31:\"Написание 2 главы\";i:4;s:106:\"Представление руководителю на проверку дипломной работы \";i:5;s:50:\"Доработка дипломной работы\";i:6;s:39:\"Срок сдачи на кафедру\";i:7;s:19:\"Защита ВКР\";}}', 'default_cover.jpg', NULL, NULL, 'Дипломная работа - это письменное научное исследование на относящуюся к специальности выпускника тему, в котором он демонстрирует соответствие освоенного объема теоретических знаний и практических умений федеральным образовательным стандартам. ВКР, или диплом, специалиста, в зависимости от специфики направления обучения может выполняться в виде: дипломной работы - ее в большинстве случаев пишут студенты, изучающие естественные, гуманитарные, общественные науки или осваивающие творческие профессии, с целью систематизировать приобретенный в вузе теоретический багаж и показать владение навыками, необходимыми для самостоятельной работы; дипломного проекта - его делают, как правило, выпускники технических вузов и прикладных специальностей, так как он подразумевает выполнение расчетов, подтверждающих предложенное автором решение конкретных практических задач, или содержит элементы проектирования - разработку методик, моделей, инструкций, программ, технологий, бизнес-планов.\r\n\r\nИсточник: https://edunews.ru/students/vypusknaya/kak-pisat-diplom.html\r\n© edunews.ru', NULL, NULL, NULL, NULL);
INSERT INTO `workspaces` VALUES (109, 5, 24, 'Написание дипломной работы - Жолудева ПИ-43', '2018-02-01 22:43:49', '2018-06-15', 'a:2:{s:19:\"new_date_plan_array\";a:8:{i:0;s:10:\"2018-02-15\";i:1;s:10:\"2018-03-15\";i:2;s:10:\"2018-04-10\";i:3;s:10:\"2018-05-20\";i:4;s:10:\"2018-05-25\";i:5;s:10:\"2018-06-05\";i:6;s:10:\"2018-06-15\";i:7;s:10:\"2018-06-27\";}s:19:\"new_date_text_array\";a:8:{i:0;s:158:\"Изучение литературных источников, нормативных документов, статистической информации\";i:1;s:31:\"Написание 1 главы\";i:2;s:122:\"Сбор и обработка практического материала по теме дипломной работы\";i:3;s:31:\"Написание 2 главы\";i:4;s:106:\"Представление руководителю на проверку дипломной работы \";i:5;s:50:\"Доработка дипломной работы\";i:6;s:39:\"Срок сдачи на кафедру\";i:7;s:19:\"Защита ВКР\";}}', 'default_cover.jpg', NULL, NULL, 'Дипломная работа - это письменное научное исследование на относящуюся к специальности выпускника тему, в котором он демонстрирует соответствие освоенного объема теоретических знаний и практических умений федеральным образовательным стандартам. ВКР, или диплом, специалиста, в зависимости от специфики направления обучения может выполняться в виде: дипломной работы - ее в большинстве случаев пишут студенты, изучающие естественные, гуманитарные, общественные науки или осваивающие творческие профессии, с целью систематизировать приобретенный в вузе теоретический багаж и показать владение навыками, необходимыми для самостоятельной работы; дипломного проекта - его делают, как правило, выпускники технических вузов и прикладных специальностей, так как он подразумевает выполнение расчетов, подтверждающих предложенное автором решение конкретных практических задач, или содержит элементы проектирования - разработку методик, моделей, инструкций, программ, технологий, бизнес-планов.\r\n\r\nИсточник: https://edunews.ru/students/vypusknaya/kak-pisat-diplom.html\r\n© edunews.ru', NULL, NULL, NULL, NULL);
INSERT INTO `workspaces` VALUES (110, 5, 25, 'Написание дипломной работы - Жолудева ПИ-43', '2018-02-01 22:43:49', '2018-06-15', 'a:2:{s:19:\"new_date_plan_array\";a:8:{i:0;s:10:\"2018-02-15\";i:1;s:10:\"2018-03-15\";i:2;s:10:\"2018-04-10\";i:3;s:10:\"2018-05-20\";i:4;s:10:\"2018-05-25\";i:5;s:10:\"2018-06-05\";i:6;s:10:\"2018-06-15\";i:7;s:10:\"2018-06-27\";}s:19:\"new_date_text_array\";a:8:{i:0;s:158:\"Изучение литературных источников, нормативных документов, статистической информации\";i:1;s:31:\"Написание 1 главы\";i:2;s:122:\"Сбор и обработка практического материала по теме дипломной работы\";i:3;s:31:\"Написание 2 главы\";i:4;s:106:\"Представление руководителю на проверку дипломной работы \";i:5;s:50:\"Доработка дипломной работы\";i:6;s:39:\"Срок сдачи на кафедру\";i:7;s:19:\"Защита ВКР\";}}', 'default_cover.jpg', NULL, NULL, 'Дипломная работа - это письменное научное исследование на относящуюся к специальности выпускника тему, в котором он демонстрирует соответствие освоенного объема теоретических знаний и практических умений федеральным образовательным стандартам. \r\nВКР, или диплом, специалиста, в зависимости от специфики направления обучения может выполняться в виде: дипломной работы - ее в большинстве случаев пишут студенты, изучающие естественные, гуманитарные, общественные науки или осваивающие творческие профессии, с целью систематизировать приобретенный в вузе теоретический багаж и показать владение навыками, необходимыми для самостоятельной работы; дипломного проекта - его делают, как правило, выпускники технических вузов и прикладных специальностей, так как он подразумевает выполнение расчетов, подтверждающих предложенное автором решение конкретных практических задач, или содержит элементы проектирования - разработку методик, моделей, инструкций, программ, технологий, бизнес-планов.\r\n\r\nИсточник: https:  edunews.ru students vypusknaya kak-pisat-diplom.html\r\n© edunews.ru', NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
