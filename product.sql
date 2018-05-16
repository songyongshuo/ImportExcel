/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : product

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-05-16 08:23:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for pro_info
-- ----------------------------
DROP TABLE IF EXISTS `pro_info`;
CREATE TABLE `pro_info` (
  `pId` int(4) NOT NULL AUTO_INCREMENT,
  `pName` varchar(20) NOT NULL,
  `pPrice` float NOT NULL,
  `pCount` float NOT NULL,
  PRIMARY KEY (`pId`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pro_info
-- ----------------------------
INSERT INTO `pro_info` VALUES ('11', 'AA', '5555', '11');
INSERT INTO `pro_info` VALUES ('22', 'BB', '6666', '12');
INSERT INTO `pro_info` VALUES ('33', 'CC', '7777', '14');
INSERT INTO `pro_info` VALUES ('44', 'DD', '8888', '23');
