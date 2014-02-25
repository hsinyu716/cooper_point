/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : cooper_point

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2014-02-25 10:35:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FBAPP_ID` varchar(32) NOT NULL,
  `FBAPP_SECRET` varchar(32) NOT NULL,
  `FBAPP_TITLE` varchar(32) NOT NULL,
  `FBAPP_TITLE_TC` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', '358974124176829', '3c01baaa61de1f57b251054384e0ee60', 'cooper_point', 'cooper_point', '2014-02-19 10:16:57');

-- ----------------------------
-- Table structure for `article_info`
-- ----------------------------
DROP TABLE IF EXISTS `article_info`;
CREATE TABLE `article_info` (
  `serial_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` varchar(32) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `order_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`serial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of article_info
-- ----------------------------
INSERT INTO `article_info` VALUES ('1', '729207007103766', 'SUBWAY 國買一送一日', '2014-02-18', '2014-02-21', '1', '2014-02-22 17:13:14');
INSERT INTO `article_info` VALUES ('2', '635451016492346', '2月粉絲好康', '2014-02-18', '2014-02-21', '2', '2014-02-22 17:13:14');

-- ----------------------------
-- Table structure for `exchange_info`
-- ----------------------------
DROP TABLE IF EXISTS `exchange_info`;
CREATE TABLE `exchange_info` (
  `serial_id` int(11) NOT NULL AUTO_INCREMENT,
  `fbid` varchar(32) NOT NULL,
  `prize_serial` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`serial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of exchange_info
-- ----------------------------
INSERT INTO `exchange_info` VALUES ('1', '100000289183379', '4', '7', '2014-02-20 14:29:51');

-- ----------------------------
-- Table structure for `point_record`
-- ----------------------------
DROP TABLE IF EXISTS `point_record`;
CREATE TABLE `point_record` (
  `serial_id` int(11) NOT NULL AUTO_INCREMENT,
  `fbid` varchar(32) NOT NULL,
  `post_id` varchar(32) NOT NULL,
  `dtype` enum('comment','share','like') NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`serial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of point_record
-- ----------------------------
INSERT INTO `point_record` VALUES ('4', '100000289183379', '729207007103766', 'comment', '2014-02-19 15:30:37');
INSERT INTO `point_record` VALUES ('5', '100000289183379', '729207007103766', 'like', '2014-02-19 15:30:38');
INSERT INTO `point_record` VALUES ('6', '100000289183379', '635451016492346', 'like', '2014-02-19 18:09:24');
INSERT INTO `point_record` VALUES ('9', '100000289183379', '0', 'share', '2014-02-20 14:09:26');
INSERT INTO `point_record` VALUES ('10', '100000082102883', '635451016492346', 'comment', '2014-02-22 17:21:26');

-- ----------------------------
-- Table structure for `prize_info`
-- ----------------------------
DROP TABLE IF EXISTS `prize_info`;
CREATE TABLE `prize_info` (
  `serial_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(24) CHARACTER SET utf8 DEFAULT NULL,
  `img` varchar(128) NOT NULL,
  `point` int(11) NOT NULL,
  `is_hide` enum('Y','N') DEFAULT 'N',
  `order_id` int(11) NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`serial_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prize_info
-- ----------------------------
INSERT INTO `prize_info` VALUES ('3', 'ttt', 'tmp/prize/1392792739.jpg', '22', 'N', '3', '2014-02-22 16:05:49');
INSERT INTO `prize_info` VALUES ('4', 'AngularJS Example', 'tmp/prize/1392869397.jpg', '7', 'N', '2', '2014-02-22 16:05:49');
INSERT INTO `prize_info` VALUES ('5', 'Angular Sortable Demo', 'tmp/prize/1393049212.jpg', '1', 'N', '1', '2014-02-22 16:05:49');

-- ----------------------------
-- Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `serial_id` int(11) NOT NULL AUTO_INCREMENT,
  `fbid` varchar(32) NOT NULL,
  `username` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `fbname` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `is_join` enum('Y','N') CHARACTER SET utf8 NOT NULL DEFAULT 'N',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`serial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user_info
-- ----------------------------
