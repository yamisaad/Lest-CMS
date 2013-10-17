/*
Navicat MySQL Data Transfer

Source Server         : Yamisaas
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : icore

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2013-10-16 21:32:19
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `boutique`
-- ----------------------------
DROP TABLE IF EXISTS `boutique`;
CREATE TABLE `boutique` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `iditem` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `pod` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `solde` int(11) NOT NULL,
  `stats` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of boutique
-- ----------------------------
INSERT INTO `boutique` VALUES ('7', 'Bâton Champmanique', '9136', '10', '0', '0', '100', '20', '64#12#1b#0#1d10+17,5c#1#8#0#1d8+0,5b#1#8#0#1d8+0,7b#1f#32#0#1d20+30,76#1f#32#0#1d20+30,7e#1f#32#0#1d20+30,7c#15#1e#0#1d10+20,7d#c9#fa#0#1d50+200,70#4#5#0#1d2+3,d6#6#a#0#1d5+5,b6#1#0#0#0d0+1,b0#b#f#0#1d5+10');
INSERT INTO `boutique` VALUES ('8', 'Bâton Champmaniques de yami', '9136', '10', '0', '0', '10', '-90', '64#12#1b#0#1d10+17,5c#1#8#0#1d8+0,5b#1#8#0#1d8+0,7b#1f#32#0#1d20+30,76#1f#32#0#1d20+30,7e#1f#32#0#1d20+30,7c#15#1e#0#1d10+20,7d#c9#fa#0#1d50+200,70#4#5#0#1d2+3,d6#6#a#0#1d5+5,b6#1#0#0#0d0+1,b0#b#f#0#1d5+10');
INSERT INTO `boutique` VALUES ('9', 'Sort Maîtrise du Bâton', '724', '73', '20', '0', '180', '0', '25c#0#0#0#0d0+0');
