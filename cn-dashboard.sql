/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : cn-dashboard

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 19/04/2022 14:40:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for peserta
-- ----------------------------
DROP TABLE IF EXISTS `peserta`;
CREATE TABLE `peserta`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_lahir` timestamp NOT NULL,
  `no_hp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `photo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jabatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of peserta
-- ----------------------------
INSERT INTO `peserta` VALUES (1, 'Deni Suryadi', '3603182606940001', 'deni.w4f@gmail.com', 'Sumedang', '1994-06-26 21:46:40', '08551607171', 'Jl. Kp. Balong No.22A RT.06/RW.11 Bojonggede', 'Bogor', 'Pusat', 'photo.jpg', 'Sekretaris', 'aktif');
INSERT INTO `peserta` VALUES (2, 'Deni', '12345678', 'deni.w4f@gmail.com', 'Jambi', '2022-04-19 00:00:00', '08551607171', 'Jl. Raya H. Usa No.72, Ciseeng, Kec. Ciseeng, Bogor, Jawa Barat 16120 (Samping Toko Ban ProBan Ciseeng)', 'Tangerang', 'Pusat', '73830-ustaz-yusuf-mansur-instagram.jpg', 'Anggota', 'pending');

-- ----------------------------
-- Table structure for privileges
-- ----------------------------
DROP TABLE IF EXISTS `privileges`;
CREATE TABLE `privileges`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of privileges
-- ----------------------------
INSERT INTO `privileges` VALUES (1, 'User', '2020-02-14 15:03:40', '2020-02-14 15:03:40');
INSERT INTO `privileges` VALUES (2, 'Central Ordering', '2020-07-14 17:40:08', '2020-07-14 17:40:08');
INSERT INTO `privileges` VALUES (5, 'user1', '2020-07-15 15:43:24', '2020-07-15 15:43:24');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_enable` enum('Yes','No') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `token` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `privilege_id` int(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_name_unique`(`username`) USING BTREE,
  INDEX `users_privilege_id_foreign`(`privilege_id`) USING BTREE,
  CONSTRAINT `users_privilege_id_foreign` FOREIGN KEY (`privilege_id`) REFERENCES `privileges` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'admin', 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Yes', 'GHbdQQRPycObhgHhyi8WES5U719R1P1jtR7zMmMIFC7SIUV4MiwoXxQbkorX', 'YToxMDp7czoyOiJpZCI7aToxO3M6NDoibmFtZSI7czo0OiJyb290IjtzOjEyOiJkaXNwbGF5X25hbWUiO3M6NDoicm9vdCI7czo1OiJlbWFpbCI7czoxMzoicm9vdEByb290LmNvbSI7czo4OiJwYXNzd29yZCI7czo2MDoiJDJ5JDEwJFpvVUNzRHBRVFpTZkljbmQ3eFhvSi5ZOTlPUHlPRHFyeTdZQTF6VlhRb2NvdXBrZHIxTUptIjtzOjk6ImlzX2VuYWJsZSI7czozOiJZZXMiO3M6MTQ6InJlbWVtYmVyX3Rva2VuIjtzOjYwOiJHSGJkUVFSUHljT2JoZ0hoeWk4V0VTNVU3MTlSMVAxanRSN3pNbU1JRkM3U0lVVjRNaXdvWHhRYmtvclgiO3M6MTI6InByaXZpbGVnZV9pZCI7TjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDE5LTExLTExIDE4OjA2OjAxIjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDIwLTA3LTE3IDEwOjI2OjExIjt9', '2019-11-12 01:06:01', '2020-09-02 16:58:08', 1);
INSERT INTO `users` VALUES (2, 'hamzah', 'Hamzah', 'hamzahzakaria92@gmail.com', '$2y$10$NsmgFl/Tr8VZPidKF2ujvujEpOitU6r1vm.6QLouZffRMgKUw2ave', 'Yes', '5CLHPoHT1addTdTO8xuBzbDozDgbwJMydkhYwjyAKzaiVZgruM4KBLdQuaVD', '', '2020-02-14 22:04:02', '2020-08-26 14:20:23', 1);
INSERT INTO `users` VALUES (3, 'aryo', 'Aryo', 'aryo@tokopandai.id', '$2y$10$.wvrJ7dzRMSInUB8R.2/6uigGIEN0TNaj6i3Nm4P1H8WXLnl0a26O', 'Yes', '7nd4Zem2ryU55HjlVHQE2uU6loOnUUKBDlZtJoeJcEGMSLNoFBufpcw5JLW1', NULL, '2020-07-15 00:40:47', '2020-07-15 00:41:24', 2);
INSERT INTO `users` VALUES (5, 'fery', 'Fery Sukarto', 'fery@tokopandai.id', '$2y$10$o2jdPS9VPqeyUWno2LESNeoUNkTRkYDDMe2cudz6mn9NONI9F/Lcy', 'Yes', 'cbrew9KzUQQBWYmDzoRMHZc7HW8owPyR9ARjnDgYCx3zp0pJMSBKKnPMrARJ', 'YToxMDp7czoyOiJpZCI7aTo1O3M6NDoibmFtZSI7czo0OiJmZXJ5IjtzOjEyOiJkaXNwbGF5X25hbWUiO3M6MTI6IkZlcnkgU3VrYXJ0byI7czo1OiJlbWFpbCI7czoxODoiZmVyeUB0b2tvcGFuZGFpLmlkIjtzOjg6InBhc3N3b3JkIjtzOjYwOiIkMnkkMTAkbzJqZFBTOVZQcWV5VVdubzJMRVNOZW9VTmtUUmtZRERNZTJjdWR6Nm1uOU5PTkk5Ri9MY3kiO3M6OToiaXNfZW5hYmxlIjtzOjM6IlllcyI7czoxNDoicmVtZW1iZXJfdG9rZW4iO3M6NjA6ImNicmV3OUt6VVFRQldZbUR6b1JNSFpjN0hXOG93UHlSOUFSam5EZ1lDeDN6cDBwSk1TQktLblBNckFSSiI7czoxMjoicHJpdmlsZWdlX2lkIjtpOjI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyMC0wNy0xNSAxNDo0Mzo1OSI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyMC0wOS0wNyAxNjo0Mjo1NyI7fQ==', '2020-07-15 21:43:59', '2020-09-09 14:23:00', 2);

SET FOREIGN_KEY_CHECKS = 1;
