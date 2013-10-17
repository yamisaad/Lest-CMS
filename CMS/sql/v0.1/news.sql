/*
Navicat MySQL Data Transfer

Source Server         : Yamisaas
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : icore

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2013-10-16 21:31:53
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `news`
-- ----------------------------
DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `contenu` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of news
-- ----------------------------
INSERT INTO `news` VALUES ('1', 'Test', 'Yamisaaf', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).', '', '2013-09-19 19:21:53');
INSERT INTO `news` VALUES ('2', 'test2', 'Yamisaaf', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).', '', '2013-09-20 19:22:58');
INSERT INTO `news` VALUES ('3', 'test3', 'yamo', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).', '', '2013-09-20 19:23:13');
INSERT INTO `news` VALUES ('4', 'test4', 'yamo', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).', '', '2013-09-20 19:23:24');
INSERT INTO `news` VALUES ('5', 'tyest5', 'klsdjfklsdf', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).', '', '2013-09-20 20:39:05');
INSERT INTO `news` VALUES ('6', 'ajouteadmin1', '', 'Test d\'ajoute une news par admin yamaiai', '', '2013-09-25 13:25:54');
