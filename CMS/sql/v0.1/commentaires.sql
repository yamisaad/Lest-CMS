/*
Navicat MySQL Data Transfer

Source Server         : Yamisaas
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : icore

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2013-10-16 21:32:14
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `commentaires`
-- ----------------------------
DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idnews` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of commentaires
-- ----------------------------
INSERT INTO `commentaires` VALUES ('1', '1', 'premier commentaire de la news1', 'yamisaaf', '', '2013-09-21 13:46:17');
INSERT INTO `commentaires` VALUES ('2', '2', 'test2', 'yami', '', '2013-09-21 14:13:13');
INSERT INTO `commentaires` VALUES ('3', '1', 'test1 de news 1', 'yamisaaf', '', '2013-09-21 14:13:28');
INSERT INTO `commentaires` VALUES ('4', '2', 'test dez new2 ', 'yamisaklsjalk', '', '2013-09-21 16:33:47');
INSERT INTO `commentaires` VALUES ('5', '3', 'sdfqsdfsdfsdf', 'sdfqsdf', '', '2013-09-21 16:34:04');
INSERT INTO `commentaires` VALUES ('6', '2', 'Votre commentairessdfqsdfqsdfqsdfqsdf', '', '', '2013-09-23 16:00:21');
INSERT INTO `commentaires` VALUES ('7', '2', 'Votre commentairessdfqsdfqsdfqsdfqsdf', '', '', '2013-09-23 16:00:39');
INSERT INTO `commentaires` VALUES ('8', '2', 'Je suis yamisaaf 5 commentaire :)', '', '', '2013-09-23 16:01:35');
INSERT INTO `commentaires` VALUES ('9', '7', 'Voici une news :)', 'yamisaad', '', '2013-09-25 21:06:42');
INSERT INTO `commentaires` VALUES ('10', '3', 'Je m\'apelle yamisaaadd ;p', 'yamisaad', '', '2013-10-12 08:34:39');
