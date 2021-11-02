/*
Navicat MySQL Data Transfer

Source Server         : loc
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : sample_stock

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2021-11-02 19:22:09
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `log_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `log_tbl`;
CREATE TABLE `log_tbl` (
  `sell_id` int(10) NOT NULL AUTO_INCREMENT,
  `prod_id` int(10) DEFAULT NULL,
  `sell` int(10) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sell_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of log_tbl
-- ----------------------------
INSERT INTO `log_tbl` VALUES ('5', '1', '3', '100', 'SELL');
INSERT INTO `log_tbl` VALUES ('6', '2', '2', '50', 'SELL');
INSERT INTO `log_tbl` VALUES ('7', '3', '1', '200', 'SELL');
INSERT INTO `log_tbl` VALUES ('8', '1', '10', '200', 'SELL');
INSERT INTO `log_tbl` VALUES ('9', '2', '2', '50', 'SELL');

-- ----------------------------
-- Table structure for `stock_tbl`
-- ----------------------------
DROP TABLE IF EXISTS `stock_tbl`;
CREATE TABLE `stock_tbl` (
  `stock_id` int(3) NOT NULL AUTO_INCREMENT,
  `Product` varchar(20) DEFAULT NULL,
  `Stock` int(10) DEFAULT NULL,
  `Price` int(10) DEFAULT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of stock_tbl
-- ----------------------------
INSERT INTO `stock_tbl` VALUES ('1', 'Product A', '0', '200');
INSERT INTO `stock_tbl` VALUES ('2', 'Product B', '11', '50');
INSERT INTO `stock_tbl` VALUES ('3', 'Product C', '4', '200');
