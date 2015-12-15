/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : postman

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-12-15 16:15:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `listen_app`
-- ----------------------------
DROP TABLE IF EXISTS `listen_app`;
CREATE TABLE `listen_app` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '项目名称',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '项目状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of listen_app
-- ----------------------------
INSERT INTO `listen_app` VALUES ('1', '测试项目', '1');

-- ----------------------------
-- Table structure for `listen_face`
-- ----------------------------
DROP TABLE IF EXISTS `listen_face`;
CREATE TABLE `listen_face` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '上级id',
  `method` varchar(20) NOT NULL COMMENT '接口的请求方式',
  `title` varchar(255) NOT NULL COMMENT '接口名称',
  `url` varchar(255) NOT NULL COMMENT '接口地址',
  `data` text NOT NULL COMMENT '请求接口的参数',
  `return` text NOT NULL COMMENT '返回说明',
  `note` text NOT NULL COMMENT '特别说明',
  `app_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '项目的id',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of listen_face
-- ----------------------------
INSERT INTO `listen_face` VALUES ('1', '0', 'get', '首页', '', '', '', '', '1', '1');
INSERT INTO `listen_face` VALUES ('2', '1', 'get', '幻灯片', 'http://www.baidu.com', 'a:2:{i:0;a:4:{s:5:\"param\";s:3:\"uid\";s:4:\"type\";s:3:\"int\";s:7:\"is_must\";s:3:\"yes\";s:6:\"remark\";s:8:\"会员id\";}i:1;a:4:{s:5:\"param\";s:8:\"username\";s:4:\"type\";s:6:\"string\";s:7:\"is_must\";s:2:\"no\";s:6:\"remark\";s:12:\"会员名称\";}}', '啦啦', '渣渣', '1', '1');
INSERT INTO `listen_face` VALUES ('3', '1', 'post', '推荐', 'http://www.hao123.com', 'a:2:{i:0;a:4:{s:5:\"param\";s:3:\"uid\";s:4:\"type\";s:3:\"int\";s:7:\"is_must\";s:3:\"yes\";s:6:\"remark\";s:8:\"会员id\";}i:1;a:4:{s:5:\"param\";s:8:\"username\";s:4:\"type\";s:6:\"string\";s:7:\"is_must\";s:2:\"no\";s:6:\"remark\";s:12:\"会员名称\";}}', '咋咋', '', '1', '1');
INSERT INTO `listen_face` VALUES ('4', '0', '', '论坛', '', '', '', '', '1', '1');
INSERT INTO `listen_face` VALUES ('5', '1', 'get', '测试接口', 'http://www.cqjunlong.com', 'a:2:{i:0;a:4:{s:5:\"param\";s:3:\"uid\";s:4:\"type\";s:3:\"int\";s:7:\"is_must\";s:3:\"yes\";s:6:\"remark\";s:8:\"会员id\";}i:1;a:4:{s:5:\"param\";s:8:\"username\";s:4:\"type\";s:6:\"string\";s:7:\"is_must\";s:3:\"yes\";s:6:\"remark\";s:12:\"会员账号\";}}', '测试', '', '1', '1');
INSERT INTO `listen_face` VALUES ('6', '4', 'get', 'gghghhjj', 'ljkhjlhjkl', '', '', '', '1', '1');

-- ----------------------------
-- Table structure for `listen_user`
-- ----------------------------
DROP TABLE IF EXISTS `listen_user`;
CREATE TABLE `listen_user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `status` (`password`,`status`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of listen_user
-- ----------------------------
INSERT INTO `listen_user` VALUES ('1', 'listen', '123456', '1');
