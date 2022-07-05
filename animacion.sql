/*
 Navicat Premium Data Transfer

 Source Server         : CONEXION-LOCAL
 Source Server Type    : MySQL
 Source Server Version : 50729
 Source Host           : localhost:3306
 Source Schema         : animacion

 Target Server Type    : MySQL
 Target Server Version : 50729
 File Encoding         : 65001

 Date: 05/03/2020 17:31:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cronograma
-- ----------------------------
DROP TABLE IF EXISTS `cronograma`;
CREATE TABLE `cronograma`  (
  `pk_num_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `ind_actividad` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ind_hora` time(4) NOT NULL,
  PRIMARY KEY (`pk_num_actividad`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for disciplina
-- ----------------------------
DROP TABLE IF EXISTS `disciplina`;
CREATE TABLE `disciplina`  (
  `pk_num_disciplina` int(11) NOT NULL AUTO_INCREMENT,
  `ind_nombre_disciplina` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pk_num_disciplina`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of disciplina
-- ----------------------------
INSERT INTO `disciplina` VALUES (1, 'Volleyball');
INSERT INTO `disciplina` VALUES (2, 'Futbol Playero');
INSERT INTO `disciplina` VALUES (3, 'Carrera de Relevo');
INSERT INTO `disciplina` VALUES (4, 'Competencia de Cuerda');

-- ----------------------------
-- Table structure for equipo
-- ----------------------------
DROP TABLE IF EXISTS `equipo`;
CREATE TABLE `equipo`  (
  `pk_num_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `ind_nombre_equipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ind_foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pk_num_equipo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of equipo
-- ----------------------------
INSERT INTO `equipo` VALUES (1, 'CES', 'CES.png');
INSERT INTO `equipo` VALUES (2, 'CEM', 'CEM.png');
INSERT INTO `equipo` VALUES (3, 'CEA', 'CEA.jpg');
INSERT INTO `equipo` VALUES (4, 'CEDA', 'CEDA.jpg');

-- ----------------------------
-- Table structure for medallero
-- ----------------------------
DROP TABLE IF EXISTS `medallero`;
CREATE TABLE `medallero`  (
  `pk_num_medallero` int(11) NOT NULL AUTO_INCREMENT,
  `fk_num_equipo` int(11) NULL DEFAULT NULL,
  `num_puntos` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`pk_num_medallero`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of medallero
-- ----------------------------
INSERT INTO `medallero` VALUES (1, 1, 0);
INSERT INTO `medallero` VALUES (2, 2, 0);
INSERT INTO `medallero` VALUES (3, 3, 0);
INSERT INTO `medallero` VALUES (4, 4, 0);

-- ----------------------------
-- Table structure for partido
-- ----------------------------
DROP TABLE IF EXISTS `partido`;
CREATE TABLE `partido`  (
  `pk_num_partida` int(11) NOT NULL AUTO_INCREMENT,
  `ind_partida` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NULL DEFAULT NULL,
  `fk_num_disciplina` int(11) NOT NULL,
  `fk_num_equipo1` int(11) NOT NULL,
  `fk_num_equipo2` int(11) NOT NULL,
  `num_puntos_equipo1` int(11) NOT NULL,
  `num_puntos_equipo2` int(11) NOT NULL,
  `num_estatus` int(11) NOT NULL,
  `flag_ejecucion` int(11) NOT NULL,
  PRIMARY KEY (`pk_num_partida`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_spanish2_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
