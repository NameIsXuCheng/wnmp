/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : games

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-08-17 17:31:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for g_games
-- ----------------------------
DROP TABLE IF EXISTS `g_games`;
CREATE TABLE `g_games` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `g_name` varchar(255) NOT NULL COMMENT '游戏名称',
  `g_aliases` varchar(255) DEFAULT '' COMMENT '游戏别名',
  `introduction` text COMMENT '游戏说明',
  `g_type_id` tinyint(1) DEFAULT '0' COMMENT '游戏分类',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_games
-- ----------------------------
INSERT INTO `g_games` VALUES ('1', '天涯明月刀', 'tymyd', '神威丶太白丶五毒丶唐门丶神刀丶天香丶移花丶真武丶丐帮', '2', '2018-08-03 14:18:51');
INSERT INTO `g_games` VALUES ('2', '地下城与勇士', 'DNF', '横版纸片人', '2', '2018-08-03 14:19:20');

-- ----------------------------
-- Table structure for g_games_type
-- ----------------------------
DROP TABLE IF EXISTS `g_games_type`;
CREATE TABLE `g_games_type` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `game_type` varchar(255) DEFAULT NULL COMMENT '游戏分类',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_games_type
-- ----------------------------
INSERT INTO `g_games_type` VALUES ('1', '单机游戏', '2018-08-03 15:45:27');
INSERT INTO `g_games_type` VALUES ('2', '网络游戏', '2018-08-03 15:45:44');
INSERT INTO `g_games_type` VALUES ('3', '主机游戏', '2018-08-06 17:21:16');

-- ----------------------------
-- Table structure for g_game_play
-- ----------------------------
DROP TABLE IF EXISTS `g_game_play`;
CREATE TABLE `g_game_play` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `game_id` int(25) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_game_play
-- ----------------------------
INSERT INTO `g_game_play` VALUES ('1', '1', '副本攻略');
INSERT INTO `g_game_play` VALUES ('2', '1', '论剑');
INSERT INTO `g_game_play` VALUES ('3', '1', '其他玩法');
INSERT INTO `g_game_play` VALUES ('4', '2', 'Raid团本');
INSERT INTO `g_game_play` VALUES ('5', '2', 'PK');

-- ----------------------------
-- Table structure for g_user
-- ----------------------------
DROP TABLE IF EXISTS `g_user`;
CREATE TABLE `g_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL COMMENT '用户名称',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `salf` varchar(255) DEFAULT '1234' COMMENT '安全后缀',
  `power` tinyint(1) DEFAULT '0' COMMENT '权限',
  `created_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of g_user
-- ----------------------------
INSERT INTO `g_user` VALUES ('1', 'author', '123456', '1234', '1', '2018-08-10 11:01:31');
