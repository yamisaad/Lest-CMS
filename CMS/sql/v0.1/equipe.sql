/*
Navicat MySQL Data Transfer

Source Server         : Yamisaas
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : icore

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2013-10-16 21:32:09
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `equipe`
-- ----------------------------
DROP TABLE IF EXISTS `equipe`;
CREATE TABLE `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `rang` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of equipe
-- ----------------------------
INSERT INTO `equipe` VALUES ('1', 'Yamisaaf', 'administrateur', 'Yamisaaf devloppeur Web pour tous probléme  contactez moi skype : yamisaaf');
INSERT INTO `equipe` VALUES ('2', 'Vincent', 'administrateur', 'Yamisaaf devloppeur de l\'emulateur pour tous probléme envers l\'emulateur contactez moi');
