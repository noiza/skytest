/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : skyeng

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-03-23 17:06:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id_student` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`id_student`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'Света');
INSERT INTO `students` VALUES ('2', 'Денис');
INSERT INTO `students` VALUES ('3', 'Георгий');
INSERT INTO `students` VALUES ('4', 'Даша');
INSERT INTO `students` VALUES ('5', 'Харитон');
INSERT INTO `students` VALUES ('6', 'Андрей');
INSERT INTO `students` VALUES ('7', 'Маша');
INSERT INTO `students` VALUES ('8', 'Зоя');

-- ----------------------------
-- Table structure for `student_teachers`
-- ----------------------------
DROP TABLE IF EXISTS `student_teachers`;
CREATE TABLE `student_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_teacher` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student_teachers
-- ----------------------------
INSERT INTO `student_teachers` VALUES ('28', '3', '1');
INSERT INTO `student_teachers` VALUES ('30', '3', '3');
INSERT INTO `student_teachers` VALUES ('31', '3', '4');
INSERT INTO `student_teachers` VALUES ('32', '3', '5');
INSERT INTO `student_teachers` VALUES ('33', '3', '6');
INSERT INTO `student_teachers` VALUES ('34', '15', '3');
INSERT INTO `student_teachers` VALUES ('35', '15', '4');
INSERT INTO `student_teachers` VALUES ('36', '15', '5');
INSERT INTO `student_teachers` VALUES ('37', '15', '6');
INSERT INTO `student_teachers` VALUES ('38', '15', '7');
INSERT INTO `student_teachers` VALUES ('39', '15', '8');
INSERT INTO `student_teachers` VALUES ('64', '1', '1');
INSERT INTO `student_teachers` VALUES ('65', '1', '2');
INSERT INTO `student_teachers` VALUES ('66', '1', '3');
INSERT INTO `student_teachers` VALUES ('67', '1', '4');
INSERT INTO `student_teachers` VALUES ('68', '1', '6');
INSERT INTO `student_teachers` VALUES ('69', '1', '8');
INSERT INTO `student_teachers` VALUES ('106', '11', '1');
INSERT INTO `student_teachers` VALUES ('107', '11', '2');
INSERT INTO `student_teachers` VALUES ('108', '11', '3');
INSERT INTO `student_teachers` VALUES ('109', '11', '4');
INSERT INTO `student_teachers` VALUES ('110', '11', '5');
INSERT INTO `student_teachers` VALUES ('111', '11', '6');
INSERT INTO `student_teachers` VALUES ('112', '11', '7');
INSERT INTO `student_teachers` VALUES ('113', '11', '8');
INSERT INTO `student_teachers` VALUES ('114', '2', '1');
INSERT INTO `student_teachers` VALUES ('115', '2', '2');
INSERT INTO `student_teachers` VALUES ('116', '2', '3');
INSERT INTO `student_teachers` VALUES ('118', '2', '6');
INSERT INTO `student_teachers` VALUES ('119', '12', '1');
INSERT INTO `student_teachers` VALUES ('120', '12', '2');
INSERT INTO `student_teachers` VALUES ('121', '12', '3');
INSERT INTO `student_teachers` VALUES ('122', '12', '5');
INSERT INTO `student_teachers` VALUES ('123', '12', '8');
INSERT INTO `student_teachers` VALUES ('124', '14', '1');
INSERT INTO `student_teachers` VALUES ('125', '14', '2');
INSERT INTO `student_teachers` VALUES ('126', '14', '3');
INSERT INTO `student_teachers` VALUES ('127', '14', '4');
INSERT INTO `student_teachers` VALUES ('128', '14', '5');
INSERT INTO `student_teachers` VALUES ('129', '4', '1');
INSERT INTO `student_teachers` VALUES ('130', '4', '2');
INSERT INTO `student_teachers` VALUES ('131', '4', '3');
INSERT INTO `student_teachers` VALUES ('132', '4', '6');

-- ----------------------------
-- Table structure for `teachers`
-- ----------------------------
DROP TABLE IF EXISTS `teachers`;
CREATE TABLE `teachers` (
  `id_teacher` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  PRIMARY KEY (`id_teacher`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teachers
-- ----------------------------
INSERT INTO `teachers` VALUES ('1', 'Мария П');
INSERT INTO `teachers` VALUES ('2', 'Анна П');
INSERT INTO `teachers` VALUES ('3', 'Петр П');
INSERT INTO `teachers` VALUES ('4', 'Николай П');
INSERT INTO `teachers` VALUES ('7', 'Сергей П');
INSERT INTO `teachers` VALUES ('11', 'Иван П');
INSERT INTO `teachers` VALUES ('12', 'Виктор П');
INSERT INTO `teachers` VALUES ('13', 'Степан П');
INSERT INTO `teachers` VALUES ('14', 'Александра П');
INSERT INTO `teachers` VALUES ('15', 'Инга П');
