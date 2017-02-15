/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50626
Source Host           : 127.0.0.1:3306
Source Database       : ci_test

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-02-15 17:33:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for content
-- ----------------------------
DROP TABLE IF EXISTS `content`;
CREATE TABLE `content` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` char(24) DEFAULT NULL,
  `content` text,
  `datetime` datetime DEFAULT NULL,
  `writer` char(8) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of content
-- ----------------------------
INSERT INTO `content` VALUES ('63', '啊抒发是', '阿萨德 ', '2017-02-15 17:29:24', '阿萨德');

-- ----------------------------
-- Table structure for site
-- ----------------------------
DROP TABLE IF EXISTS `site`;
CREATE TABLE `site` (
  `sitename` char(16) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sitename`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of site
-- ----------------------------
INSERT INTO `site` VALUES ('我的小博客', '这是一个优雅的博客');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'webcjz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO `user` VALUES ('2', 'qwe', '123');
INSERT INTO `user` VALUES ('3', 'fgasf', '54321');
