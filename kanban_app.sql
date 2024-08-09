/*
 Navicat Premium Data Transfer

 Source Server         : Kanban Project Management
 Source Server Type    : MySQL
 Source Server Version : 101108 (10.11.8-MariaDB-cll-lve)
 Source Host           : 27.0.234.52:3306
 Source Schema         : koysmyid_kanban

 Target Server Type    : MySQL
 Target Server Version : 101108 (10.11.8-MariaDB-cll-lve)
 File Encoding         : 65001

 Date: 09/08/2024 23:11:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES (6, 3, 'Palma', 'Kemal Bandung', '2024-08-02 17:32:08');

-- ----------------------------
-- Table structure for tasks
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('task','ongoing','review','finish') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'task',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `project_id`(`project_id` ASC) USING BTREE,
  CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES (7, 6, 'Gallery Masukin Image', 'Gallery Masukin Image', 'task', '2024-08-02 17:34:13', '2024-08-08 21:50:54');
INSERT INTO `tasks` VALUES (8, 6, 'Gallery Masukin Video', 'Gallery Masukin Video', 'finish', '2024-08-02 17:34:23', '2024-08-08 14:16:15');
INSERT INTO `tasks` VALUES (9, 6, 'Page official partner', 'itu nanti lokasi gw dijual dimana aja.', 'finish', '2024-08-02 17:37:54', '2024-08-08 21:50:46');
INSERT INTO `tasks` VALUES (10, 6, 'Page shop ', 'itu nanti tombol belanja diarahin ke online shop', 'finish', '2024-08-02 17:38:08', '2024-08-08 21:50:39');
INSERT INTO `tasks` VALUES (11, 6, 'Page Contact ', 'nanti isinya\r\nMedia sosial\r\nwhatsapp business\r\nEmail\r\nSama alamat surat', 'finish', '2024-08-02 17:38:24', '2024-08-08 21:50:41');
INSERT INTO `tasks` VALUES (12, 6, 'Homepage', 'ALL in Homepage', 'finish', '2024-08-02 17:38:42', '2024-08-08 21:50:43');
INSERT INTO `tasks` VALUES (13, 6, 'Email Professional', 'admin@palmadrinks.com\r\nkemal@palmadrinks.com', 'finish', '2024-08-02 17:39:15', '2024-08-02 19:35:40');
INSERT INTO `tasks` VALUES (14, 6, 'kontak whatsapp', '0822 9559 9932', 'finish', '2024-08-08 14:11:51', '2024-08-08 21:20:30');
INSERT INTO `tasks` VALUES (15, 6, 'Alamat Surat', 'Jl. Mangga No.11A, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114', 'finish', '2024-08-08 14:16:02', '2024-08-08 21:20:28');
INSERT INTO `tasks` VALUES (16, 6, 'Home Web V1', 'Home Web V1', 'finish', '2024-08-08 14:16:29', '2024-08-08 14:16:31');
INSERT INTO `tasks` VALUES (17, 6, 'Page Partnership Web V1', 'Page Partnership Web V1', 'finish', '2024-08-08 14:17:02', '2024-08-08 14:17:07');
INSERT INTO `tasks` VALUES (18, 6, 'Page Form Partnership Web V1', 'Page Form Partnership Web V1 (Google Sheet)', 'finish', '2024-08-08 14:17:20', '2024-08-08 14:17:22');
INSERT INTO `tasks` VALUES (19, 6, 'Page Contact Web V1', 'Page Contact Web V1', 'finish', '2024-08-08 14:17:29', '2024-08-08 14:17:33');
INSERT INTO `tasks` VALUES (20, 6, 'Hyperlink Sosmed', 'IG @palmadrinks', 'finish', '2024-08-08 14:18:09', '2024-08-08 21:20:33');
INSERT INTO `tasks` VALUES (21, 6, 'gambar produk di home', 'gambar produk di home', 'finish', '2024-08-08 14:18:33', '2024-08-08 21:26:44');
INSERT INTO `tasks` VALUES (22, 6, 'Link Shop', 'https://tokopedia.link/Gy4vjflFRLb', 'finish', '2024-08-08 14:18:55', '2024-08-08 21:26:42');
INSERT INTO `tasks` VALUES (23, 6, 'Mitra Palma Masuk Ke Maps', 'Rahang Tuna\r\nBebek Ayayo\r\nLos Chickanos\r\nBaso Aci Ena\r\nNasi Bebek Serasa\r\nGiga Bites\r\nLSD Coffee\r\nSurabi Cihapit\r\nMOD Arcade Billiard\r\nJRX Billiard\r\nAyam-ayaman\r\nRed Hot Burger', 'finish', '2024-08-08 14:19:24', '2024-08-08 21:50:33');
INSERT INTO `tasks` VALUES (24, 6, 'Logo Mitra Palma', 'Rahang Tuna\r\nBebek Ayayo\r\nLos Chickanos\r\nBaso Aci Ena\r\nNasi Bebek Serasa\r\nGiga Bites\r\nLSD Coffee\r\nSurabi Cihapit\r\nMOD Arcade Billiard\r\nJRX Billiard\r\nAyam-ayaman\r\nRed Hot Burger\r\n', 'finish', '2024-08-08 14:19:48', '2024-08-08 21:50:34');
INSERT INTO `tasks` VALUES (26, 6, 'desain web v1', 'ganti remake ke v2', 'finish', '2024-08-09 18:13:30', '2024-08-09 18:14:10');

-- ----------------------------
-- Table structure for team_members
-- ----------------------------
DROP TABLE IF EXISTS `team_members`;
CREATE TABLE `team_members`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `project_id`(`project_id` ASC) USING BTREE,
  INDEX `user_id`(`user_id` ASC) USING BTREE,
  CONSTRAINT `team_members_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `team_members_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of team_members
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b');
INSERT INTO `users` VALUES (3, 'bekoy', 'c9417802839e3a432f35d9a417088929');

SET FOREIGN_KEY_CHECKS = 1;
