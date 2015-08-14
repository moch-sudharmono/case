-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.34 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for case_db
CREATE DATABASE IF NOT EXISTS `case_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `case_db`;


-- Dumping structure for table case_db.administration
CREATE TABLE IF NOT EXISTS `administration` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.administration: ~4 rows (approximately)
/*!40000 ALTER TABLE `administration` DISABLE KEYS */;
INSERT INTO `administration` (`id_admin`, `email`, `name`, `password`, `role`) VALUES
	(1, 'kejari.tanjungselor@gmail.com', 'Super Admin', '2c7b0576873ffcbb4ca61c5a225b94e7', 'user\r\n'),
	(2, 'admin@admin.co.id', 'adminis', 'd41d8cd98f00b204e9800998ecf8427e', 'admin'),
	(3, 'admin@tanjungselor.go.id', 'admin', '1a1dc91c907325c69271ddf0c944bc72', 'admin'),
	(5, 'data.entry@gmail.com', 'Data Entry', '1a1dc91c907325c69271ddf0c944bc72', 'user');
/*!40000 ALTER TABLE `administration` ENABLE KEYS */;


-- Dumping structure for table case_db.attorney
CREATE TABLE IF NOT EXISTS `attorney` (
  `id_attorney` int(11) NOT NULL AUTO_INCREMENT,
  `name_attorney` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`id_attorney`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.attorney: ~3 rows (approximately)
/*!40000 ALTER TABLE `attorney` DISABLE KEYS */;
INSERT INTO `attorney` (`id_attorney`, `name_attorney`, `phone`, `email`) VALUES
	(1, 'Gunawan Wibisono', '0817546231234', 'gunawan.wibisono@kejaksaanri.go.id'),
	(2, 'Bambang Gunawan', '08745234134', 'bambang.gunawan@kejaksaanri.go.id'),
	(3, 'Moeldoko', '08561111111', 'moeldoko@kejaksaanri.go.id');
/*!40000 ALTER TABLE `attorney` ENABLE KEYS */;


-- Dumping structure for table case_db.daemons
CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.daemons: 0 rows
/*!40000 ALTER TABLE `daemons` DISABLE KEYS */;
/*!40000 ALTER TABLE `daemons` ENABLE KEYS */;


-- Dumping structure for table case_db.gammu
CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.gammu: 1 rows
/*!40000 ALTER TABLE `gammu` DISABLE KEYS */;
INSERT INTO `gammu` (`Version`) VALUES
	(13);
/*!40000 ALTER TABLE `gammu` ENABLE KEYS */;


-- Dumping structure for table case_db.inbox
CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.inbox: 13 rows
/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
	('2015-04-09 21:25:43', '2015-04-09 21:24:17', '004B006900720069006D00200053004D00530020006C006100670069002000680069006E0067006700610020003600200053004D005300200075006E00740075006B002000640061007000610074006B0061006E00200062006F006E00750073002000320030003000200053004D0053', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Kirim SMS lagi hingga 6 SMS untuk dapatkan bonus 200 SMS', 1, '', 'false'),
	('2015-04-09 21:25:46', '2015-04-09 21:24:21', '00410079006F0020006B006900720069006D0020007400650072007500730020003400200053004D00530020007300640020006A0061006D002000320033002E0035003900200062006F006E00750073002000320030003000200073006D0073002000740065006C006B006F006D00730065006C002000430065006B00200062006F006E007500730020002A00380038003900230020002E00200049006E0066006F0020003A00200068007400740070003A002F002F007400730065006C002E006D0065002F00700065007200640061006E006100730069006D0050004100540049002000200068007500620075006E00670069002000630061006C006C002000630065006E0074006500720020003A0020003100380038', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Ayo kirim terus 4 SMS sd jam 23.59 bonus 200 sms telkomsel Cek bonus *889# . Info : http://tsel.me/perdanasimPATI  hubungi call center : 188', 2, '', 'false'),
	('2015-04-10 06:36:22', '2015-04-10 06:36:19', '004B006900720069006D00200053004D00530020006C006100670069002000680069006E0067006700610020003600200053004D005300200075006E00740075006B002000640061007000610074006B0061006E00200062006F006E00750073002000320030003000200053004D0053', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Kirim SMS lagi hingga 6 SMS untuk dapatkan bonus 200 SMS', 3, '', 'false'),
	('2015-04-10 06:37:27', '2015-04-10 06:36:19', '00410079006F0020006B006900720069006D0020007400650072007500730020003400200053004D00530020007300640020006A0061006D002000310036002E0035003900200062006F006E007500730020003100300030003000200073006D0073002000740065006C006B006F006D00730065006C002000430065006B00200062006F006E007500730020002A00380038003900230020002E00200049006E0066006F0020003A00200068007400740070003A002F002F007400730065006C002E006D0065002F00700065007200640061006E006100730069006D0050004100540049002000200068007500620075006E00670069002000630061006C006C002000630065006E0074006500720020003A0020003100380038', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Ayo kirim terus 4 SMS sd jam 16.59 bonus 1000 sms telkomsel Cek bonus *889# . Info : http://tsel.me/perdanasimPATI  hubungi call center : 188', 4, '', 'false'),
	('2015-04-10 06:46:22', '2015-04-10 06:46:21', '004F006B0065', '+628562913798', 'Default_No_Compression', '', '+62816124', -1, 'Oke', 5, '', 'false'),
	('2015-04-11 20:35:59', '2015-04-11 20:35:54', '004B006900720069006D00200053004D00530020006C006100670069002000680069006E0067006700610020003600200053004D005300200075006E00740075006B002000640061007000610074006B0061006E00200062006F006E00750073002000320030003000200053004D0053', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Kirim SMS lagi hingga 6 SMS untuk dapatkan bonus 200 SMS', 6, '', 'false'),
	('2015-04-11 20:36:03', '2015-04-11 20:35:56', '00530065006C0061006D00610074002C00200041006E006400610020006D0065006E00640061007000610074006B0061006E00200062006F006E007500730020005400730065006C0020007300650062006500730061007200200032003000300053004D0053002E00200042006F006E007500730020006200650072006C0061006B0075002000620065007200620061007400610073002000770061006B00740075002C002000630065006B0020002A003800380039002300200073006300720020006200650072006B0061006C0061002E00200049006E0066006F003A0020007700770077002E00740065006C006B006F006D00730065006C002E0063006F006D', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Selamat, Anda mendapatkan bonus Tsel sebesar 200SMS. Bonus berlaku berbatas waktu, cek *889# scr berkala. Info: www.telkomsel.com', 7, '', 'false'),
	('2015-04-11 20:36:04', '2015-04-11 20:35:55', '00410079006F0020006B006900720069006D0020007400650072007500730020003400200053004D00530020007300640020006A0061006D002000320033002E0035003900200062006F006E00750073002000320030003000200073006D0073002000740065006C006B006F006D00730065006C002000430065006B00200062006F006E007500730020002A00380038003900230020002E00200049006E0066006F0020003A00200068007400740070003A002F002F007400730065006C002E006D0065002F00700065007200640061006E006100730069006D0050004100540049002000200068007500620075006E00670069002000630061006C006C002000630065006E0074006500720020003A0020003100380038', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Ayo kirim terus 4 SMS sd jam 23.59 bonus 200 sms telkomsel Cek bonus *889# . Info : http://tsel.me/perdanasimPATI  hubungi call center : 188', 8, '', 'false'),
	('2015-04-11 20:51:33', '2015-04-11 20:51:29', '00530065006C0061006D00610074002C00200041006E006400610020006D0065006E00640061007000610074006B0061006E00200062006F006E007500730020005400730065006C0020007300650062006500730061007200200032003000300053004D0053002E00200042006F006E007500730020006200650072006C0061006B0075002000620065007200620061007400610073002000770061006B00740075002C002000630065006B0020002A003800380039002300200073006300720020006200650072006B0061006C0061002E00200049006E0066006F003A0020007700770077002E00740065006C006B006F006D00730065006C002E0063006F006D', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Selamat, Anda mendapatkan bonus Tsel sebesar 200SMS. Bonus berlaku berbatas waktu, cek *889# scr berkala. Info: www.telkomsel.com', 9, '', 'false'),
	('2015-04-12 18:12:39', '2015-04-12 18:12:36', '004B006900720069006D00200053004D00530020006C006100670069002000680069006E0067006700610020003600200053004D005300200075006E00740075006B002000640061007000610074006B0061006E00200062006F006E00750073002000320030003000200053004D0053', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Kirim SMS lagi hingga 6 SMS untuk dapatkan bonus 200 SMS', 10, '', 'false'),
	('2015-04-12 18:12:44', '2015-04-12 18:12:37', '00410079006F0020006B006900720069006D0020007400650072007500730020003400200053004D00530020007300640020006A0061006D002000320033002E0035003900200062006F006E00750073002000320030003000200073006D0073002000740065006C006B006F006D00730065006C002000430065006B00200062006F006E007500730020002A00380038003900230020002E00200049006E0066006F0020003A00200068007400740070003A002F002F007400730065006C002E006D0065002F00700065007200640061006E006100730069006D0050004100540049002000200068007500620075006E00670069002000630061006C006C002000630065006E0074006500720020003A0020003100380038', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Ayo kirim terus 4 SMS sd jam 23.59 bonus 200 sms telkomsel Cek bonus *889# . Info : http://tsel.me/perdanasimPATI  hubungi call center : 188', 11, '', 'false'),
	('2015-04-12 18:12:48', '2015-04-12 18:12:38', '00530065006C0061006D00610074002C00200041006E006400610020006D0065006E00640061007000610074006B0061006E00200062006F006E007500730020005400730065006C0020007300650062006500730061007200200032003000300053004D0053002E00200042006F006E007500730020006200650072006C0061006B0075002000620065007200620061007400610073002000770061006B00740075002C002000630065006B0020002A003800380039002300200073006300720020006200650072006B0061006C0061002E00200049006E0066006F003A0020007700770077002E00740065006C006B006F006D00730065006C002E0063006F006D', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Selamat, Anda mendapatkan bonus Tsel sebesar 200SMS. Bonus berlaku berbatas waktu, cek *889# scr berkala. Info: www.telkomsel.com', 12, '', 'false'),
	('2015-04-12 18:39:10', '2015-04-12 18:39:06', '00530065006C0061006D00610074002C00200041006E006400610020006D0065006E00640061007000610074006B0061006E00200062006F006E007500730020005400730065006C0020007300650062006500730061007200200032003000300053004D0053002E00200042006F006E007500730020006200650072006C0061006B0075002000620065007200620061007400610073002000770061006B00740075002C002000630065006B0020002A003800380039002300200073006300720020006200650072006B0061006C0061002E00200049006E0066006F003A0020007700770077002E00740065006C006B006F006D00730065006C002E0063006F006D', 'TELKOMSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Selamat, Anda mendapatkan bonus Tsel sebesar 200SMS. Bonus berlaku berbatas waktu, cek *889# scr berkala. Info: www.telkomsel.com', 13, '', 'false');
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;


-- Dumping structure for table case_db.jpu_rp6
CREATE TABLE IF NOT EXISTS `jpu_rp6` (
  `id_jpu_rp6` int(11) NOT NULL AUTO_INCREMENT,
  `rp6_id` int(11) NOT NULL,
  `attorney_id` int(11) NOT NULL,
  PRIMARY KEY (`id_jpu_rp6`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.jpu_rp6: ~6 rows (approximately)
/*!40000 ALTER TABLE `jpu_rp6` DISABLE KEYS */;
INSERT INTO `jpu_rp6` (`id_jpu_rp6`, `rp6_id`, `attorney_id`) VALUES
	(16, 9, 3),
	(17, 9, 2),
	(18, 10, 2),
	(19, 11, 1),
	(20, 13, 2),
	(21, 13, 3);
/*!40000 ALTER TABLE `jpu_rp6` ENABLE KEYS */;


-- Dumping structure for table case_db.jpu_rp9
CREATE TABLE IF NOT EXISTS `jpu_rp9` (
  `id_jpu_rp9` int(11) NOT NULL AUTO_INCREMENT,
  `rp9_id` int(11) NOT NULL,
  `attorney_id` int(11) NOT NULL,
  PRIMARY KEY (`id_jpu_rp9`),
  KEY `FK_RP9` (`rp9_id`),
  KEY `FK_JPU` (`attorney_id`),
  CONSTRAINT `FK_JPU` FOREIGN KEY (`attorney_id`) REFERENCES `attorney` (`id_attorney`),
  CONSTRAINT `FK_RP9` FOREIGN KEY (`rp9_id`) REFERENCES `rp9` (`id_rp9`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.jpu_rp9: ~4 rows (approximately)
/*!40000 ALTER TABLE `jpu_rp9` DISABLE KEYS */;
INSERT INTO `jpu_rp9` (`id_jpu_rp9`, `rp9_id`, `attorney_id`) VALUES
	(28, 10, 3),
	(29, 10, 1),
	(30, 11, 1),
	(31, 11, 2);
/*!40000 ALTER TABLE `jpu_rp9` ENABLE KEYS */;


-- Dumping structure for table case_db.jpu_rpa1
CREATE TABLE IF NOT EXISTS `jpu_rpa1` (
  `id_jpu_rpa1` int(11) NOT NULL AUTO_INCREMENT,
  `rpa1_id` int(11) NOT NULL DEFAULT '0',
  `attorney_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_jpu_rpa1`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.jpu_rpa1: ~1 rows (approximately)
/*!40000 ALTER TABLE `jpu_rpa1` DISABLE KEYS */;
INSERT INTO `jpu_rpa1` (`id_jpu_rpa1`, `rpa1_id`, `attorney_id`) VALUES
	(4, 1, 3);
/*!40000 ALTER TABLE `jpu_rpa1` ENABLE KEYS */;


-- Dumping structure for table case_db.jpu_rpa5
CREATE TABLE IF NOT EXISTS `jpu_rpa5` (
  `id_jpu_rp5` int(11) NOT NULL AUTO_INCREMENT,
  `attorney_id` int(11) NOT NULL DEFAULT '0',
  `rpa5_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_jpu_rp5`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.jpu_rpa5: ~2 rows (approximately)
/*!40000 ALTER TABLE `jpu_rpa5` DISABLE KEYS */;
INSERT INTO `jpu_rpa5` (`id_jpu_rp5`, `attorney_id`, `rpa5_id`) VALUES
	(1, 3, 1),
	(2, 2, 1);
/*!40000 ALTER TABLE `jpu_rpa5` ENABLE KEYS */;


-- Dumping structure for table case_db.kategori_perkara
CREATE TABLE IF NOT EXISTS `kategori_perkara` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_perkara` varchar(200) NOT NULL,
  `deskripsi_kategori` text NOT NULL,
  `status_kategori` int(11) NOT NULL DEFAULT '1',
  `user_input` varchar(200) NOT NULL,
  `date_input` date NOT NULL,
  `user_update` varchar(200) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.kategori_perkara: ~1 rows (approximately)
/*!40000 ALTER TABLE `kategori_perkara` DISABLE KEYS */;
INSERT INTO `kategori_perkara` (`id_kategori`, `kategori_perkara`, `deskripsi_kategori`, `status_kategori`, `user_input`, `date_input`, `user_update`, `date_update`) VALUES
	(1, 'OHARDA', 'HARTA BENDA', 0, '', '0000-00-00', '', '0000-00-00');
/*!40000 ALTER TABLE `kategori_perkara` ENABLE KEYS */;


-- Dumping structure for table case_db.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id_notification` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `period` int(11) NOT NULL,
  `kode_perkara` varchar(5) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id_notification`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.notification: ~5 rows (approximately)
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` (`id_notification`, `title`, `period`, `kode_perkara`, `content`) VALUES
	(1, 'Kasus diterima', 0, 'P18', 'Kasus untuk [tersangka] agar di periksa dalam waktu 7 hari.'),
	(5, 'Sisa 2 Hari', 5, 'P19', 'Waktu untuk memberikan pendapat kasus [tersangka] tinggal 2 hari lagi.'),
	(6, 'Waktu habis', 7, 'P20', 'Waktu telah habis untuk kasus [tersangka]'),
	(7, 'Penyelidikan Kasus Selesai', 0, 'P21', 'Penyelidikan kasus untuk [tersangka] telah selesai'),
	(8, 'Penyelidikan Susulan Kasus telah selesai', 0, 'P21A', 'Penyelidikan susulan kasus untuk [tersangka] telah selesai');
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;


-- Dumping structure for table case_db.outbox
CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.outbox: 0 rows
/*!40000 ALTER TABLE `outbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `outbox` ENABLE KEYS */;


-- Dumping structure for table case_db.outbox_multipart
CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.outbox_multipart: 0 rows
/*!40000 ALTER TABLE `outbox_multipart` DISABLE KEYS */;
/*!40000 ALTER TABLE `outbox_multipart` ENABLE KEYS */;


-- Dumping structure for table case_db.pbk
CREATE TABLE IF NOT EXISTS `pbk` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.pbk: 0 rows
/*!40000 ALTER TABLE `pbk` DISABLE KEYS */;
/*!40000 ALTER TABLE `pbk` ENABLE KEYS */;


-- Dumping structure for table case_db.pbk_groups
CREATE TABLE IF NOT EXISTS `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.pbk_groups: 0 rows
/*!40000 ALTER TABLE `pbk_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `pbk_groups` ENABLE KEYS */;


-- Dumping structure for table case_db.phones
CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.phones: 1 rows
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
	('', '2015-04-13 07:30:51', '2015-04-12 18:11:36', '2015-04-13 07:31:01', 'yes', 'yes', '354058181012610', 'Gammu 1.32.0, Windows Server 2007 SP1, GCC 4.7, MinGW 3.11', 0, 75, 7, 4);
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;


-- Dumping structure for table case_db.rb2
CREATE TABLE IF NOT EXISTS `rb2` (
  `id_rb2` int(11) NOT NULL AUTO_INCREMENT,
  `rp9_id` int(11) NOT NULL,
  `register_rb2` varchar(200) NOT NULL,
  `tgl_penerimaan_bb` date DEFAULT NULL,
  `bb_juj` text,
  `penyimpanan` text,
  `tgl_penyerahan_pn` date DEFAULT NULL,
  `putusan_no` varchar(200) DEFAULT NULL,
  `putusan_tgl` date DEFAULT NULL,
  `no_amar_pt` varchar(200) DEFAULT NULL,
  `tgl_amar_pt` date DEFAULT NULL,
  `no_amar_ma_rb2` varchar(200) DEFAULT NULL,
  `tgl_amar_ma_rb2` date DEFAULT NULL,
  `tgl_ba_pelaksanaan` date DEFAULT NULL,
  `bbtd_tgl_pengumuman` date DEFAULT NULL,
  `bbtd_no_pengumuman` varchar(200) DEFAULT NULL,
  `bbtd_tgl_lelang` date DEFAULT NULL,
  `bbtd_no_lelang` varchar(200) DEFAULT NULL,
  `bbtd_tgl_ba_pembinaan` date DEFAULT NULL,
  `bbtd_tgl_pemanfaatan` date DEFAULT NULL,
  `bbtd_no_pemanfaatan` varchar(200) DEFAULT NULL,
  `bt_tgl_ba` date DEFAULT NULL,
  `bt_asal_instansi` varchar(200) DEFAULT NULL,
  `bt_tgl_pengumuman` date DEFAULT NULL,
  `bt_no_pengumuman` varchar(200) DEFAULT NULL,
  `bt_tgl_lelang` date DEFAULT NULL,
  `bt_no_lelang` varchar(200) DEFAULT NULL,
  `bt_tgl_ba_pembinaan` date DEFAULT NULL,
  `bt_no_pemanfaatan` varchar(200) DEFAULT NULL,
  `bt_tgl_pemanfaatan` date DEFAULT NULL,
  `keterangan_rb2` text,
  `user_input` varchar(200) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `user_update` varchar(200) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id_rb2`),
  KEY `FK_rb2_rp9` (`rp9_id`),
  CONSTRAINT `FK_rb2_rp9` FOREIGN KEY (`rp9_id`) REFERENCES `rp9` (`id_rp9`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rb2: ~2 rows (approximately)
/*!40000 ALTER TABLE `rb2` DISABLE KEYS */;
INSERT INTO `rb2` (`id_rb2`, `rp9_id`, `register_rb2`, `tgl_penerimaan_bb`, `bb_juj`, `penyimpanan`, `tgl_penyerahan_pn`, `putusan_no`, `putusan_tgl`, `no_amar_pt`, `tgl_amar_pt`, `no_amar_ma_rb2`, `tgl_amar_ma_rb2`, `tgl_ba_pelaksanaan`, `bbtd_tgl_pengumuman`, `bbtd_no_pengumuman`, `bbtd_tgl_lelang`, `bbtd_no_lelang`, `bbtd_tgl_ba_pembinaan`, `bbtd_tgl_pemanfaatan`, `bbtd_no_pemanfaatan`, `bt_tgl_ba`, `bt_asal_instansi`, `bt_tgl_pengumuman`, `bt_no_pengumuman`, `bt_tgl_lelang`, `bt_no_lelang`, `bt_tgl_ba_pembinaan`, `bt_no_pemanfaatan`, `bt_tgl_pemanfaatan`, `keterangan_rb2`, `user_input`, `date_input`, `user_update`, `date_update`) VALUES
	(3, 10, 'RB2-1', '2015-06-20', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', NULL, NULL, NULL, NULL),
	(4, 11, 'RB2-2', '2015-06-20', '2 kilogram ganja kering', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', 'done', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `rb2` ENABLE KEYS */;


-- Dumping structure for table case_db.rp12
CREATE TABLE IF NOT EXISTS `rp12` (
  `id_rp12` int(11) NOT NULL AUTO_INCREMENT,
  `rp9_id` int(11) DEFAULT NULL,
  `rt2_id` int(11) DEFAULT NULL,
  `rb2_id` int(11) DEFAULT NULL,
  `register_rp12` varchar(200) DEFAULT NULL,
  `tgl_rp12` date NOT NULL,
  `no_amar_hukum_tetap` varchar(200) DEFAULT NULL,
  `tgl_amar_hukum_tetap` date DEFAULT NULL,
  `no_p48` varchar(200) DEFAULT NULL,
  `tgl_p48` date DEFAULT NULL,
  `tgl_putusan_terpidana` date DEFAULT NULL,
  `tgl_putusan_denda_pengganti` date DEFAULT NULL,
  `tgl_putusan_biaya_perkara` date DEFAULT NULL,
  `tgl_putusan_bb` date DEFAULT NULL,
  `tgl_p51` date DEFAULT NULL,
  `pidana_bersyarat_umum` text,
  `pidana_bersyarat_khusus` text,
  `pidana_bersyarat_perubahan_khusus` text,
  `pidana_bersyarat_usul_jpu` text,
  `pidana_bersyarat_amar_hakim` text,
  `pidana_bersyarat_no` varchar(200) DEFAULT NULL,
  `pidana_bersyarat_tgl` date DEFAULT NULL,
  `pidana_bersyarat_tgl_ba` date DEFAULT NULL,
  `eksekusi_no` varchar(200) DEFAULT NULL,
  `eksekusi_tgl` date DEFAULT NULL,
  `eksekusi_alasan` text,
  `eksekusi_lama_pidana` text,
  `lepas_bersyarat_no_hakim` varchar(200) DEFAULT NULL,
  `lepas_bersyarat_tgl_hakim` date DEFAULT NULL,
  `lepas_bersyarat_tgl_pelaksanaan` date DEFAULT NULL,
  `lepas_bersyarat_tgl_percobaan` date DEFAULT NULL,
  `lepas_bersyarat_kajari_lepas` varchar(200) DEFAULT NULL,
  `lepas_bersyarat_kajari_awas` varchar(200) DEFAULT NULL,
  `lepas_bersyarat_bispa` varchar(200) DEFAULT NULL,
  `lepas_bersyarat_kediaman` text,
  `keterangan_rp12` text,
  `user_input` varchar(200) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `user_update` varchar(200) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id_rp12`),
  KEY `FK_rp12_rp9` (`rp9_id`),
  KEY `FK_rp12_rt2` (`rt2_id`),
  KEY `FK_rp12_rb2` (`rb2_id`),
  CONSTRAINT `FK_rp12_rb2` FOREIGN KEY (`rb2_id`) REFERENCES `rb2` (`id_rb2`),
  CONSTRAINT `FK_rp12_rp9` FOREIGN KEY (`rp9_id`) REFERENCES `rp9` (`id_rp9`),
  CONSTRAINT `FK_rp12_rt2` FOREIGN KEY (`rt2_id`) REFERENCES `rt2` (`id_rt2`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rp12: ~2 rows (approximately)
/*!40000 ALTER TABLE `rp12` DISABLE KEYS */;
INSERT INTO `rp12` (`id_rp12`, `rp9_id`, `rt2_id`, `rb2_id`, `register_rp12`, `tgl_rp12`, `no_amar_hukum_tetap`, `tgl_amar_hukum_tetap`, `no_p48`, `tgl_p48`, `tgl_putusan_terpidana`, `tgl_putusan_denda_pengganti`, `tgl_putusan_biaya_perkara`, `tgl_putusan_bb`, `tgl_p51`, `pidana_bersyarat_umum`, `pidana_bersyarat_khusus`, `pidana_bersyarat_perubahan_khusus`, `pidana_bersyarat_usul_jpu`, `pidana_bersyarat_amar_hakim`, `pidana_bersyarat_no`, `pidana_bersyarat_tgl`, `pidana_bersyarat_tgl_ba`, `eksekusi_no`, `eksekusi_tgl`, `eksekusi_alasan`, `eksekusi_lama_pidana`, `lepas_bersyarat_no_hakim`, `lepas_bersyarat_tgl_hakim`, `lepas_bersyarat_tgl_pelaksanaan`, `lepas_bersyarat_tgl_percobaan`, `lepas_bersyarat_kajari_lepas`, `lepas_bersyarat_kajari_awas`, `lepas_bersyarat_bispa`, `lepas_bersyarat_kediaman`, `keterangan_rp12`, `user_input`, `date_input`, `user_update`, `date_update`) VALUES
	(3, 10, 2, 3, 'RP12-1', '2015-07-12', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', NULL, NULL, NULL, NULL),
	(4, 11, 4, 4, 'RP12-2', '2015-07-12', '', '0000-00-00', 'P48-1', '2015-06-26', '2015-06-27', '2015-06-27', '2015-06-27', '2015-06-27', '0000-00-00', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', 'done', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `rp12` ENABLE KEYS */;


-- Dumping structure for table case_db.rp6
CREATE TABLE IF NOT EXISTS `rp6` (
  `id_rp6` int(11) NOT NULL AUTO_INCREMENT,
  `register_rp6` varchar(200) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `registration_no` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `institution` varchar(200) NOT NULL,
  `date_received` date DEFAULT NULL,
  `suspect_id` int(11) DEFAULT NULL,
  `case_place` text,
  `case_time` text,
  `pasal` text,
  `attorney1` int(11) NOT NULL,
  `attorney2` int(11) DEFAULT NULL,
  `no_penangkapan` varchar(200) DEFAULT NULL,
  `tgl_penangkapan` date DEFAULT NULL,
  `no_penahanan` varchar(200) DEFAULT NULL,
  `tgl_penahanan` date DEFAULT NULL,
  `jenis_penahanan` varchar(200) DEFAULT NULL,
  `perpanjang_penahanan` text,
  `penangguhan_penahanan` text,
  `tanggal_penghentian` date DEFAULT NULL,
  `no_penghentian` text,
  `tanpa_spdp` text,
  `alasan` text,
  `pendapat_jaksa` text,
  `pp_mengajukan` varchar(200) DEFAULT NULL COMMENT 'pp = praperadilan',
  `pp_putusan_pn` text COMMENT 'pp = praperadilan',
  `pp_putusan_pt` text COMMENT 'pp = praperadilan',
  `tahapsatu_tanggal` date DEFAULT NULL,
  `tahapsatu_spdp` text,
  `tahapsatu_spdp_berkas` text,
  `keterangan` text,
  `user_input` varchar(200) NOT NULL,
  `date_input` date NOT NULL,
  `user_update` varchar(200) NOT NULL,
  `date_update` date NOT NULL,
  PRIMARY KEY (`id_rp6`),
  KEY `suspect_id` (`suspect_id`),
  CONSTRAINT `rp6_ibfk_1` FOREIGN KEY (`suspect_id`) REFERENCES `suspect` (`id_suspect`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rp6: ~4 rows (approximately)
/*!40000 ALTER TABLE `rp6` DISABLE KEYS */;
INSERT INTO `rp6` (`id_rp6`, `register_rp6`, `kategori_id`, `registration_no`, `date`, `institution`, `date_received`, `suspect_id`, `case_place`, `case_time`, `pasal`, `attorney1`, `attorney2`, `no_penangkapan`, `tgl_penangkapan`, `no_penahanan`, `tgl_penahanan`, `jenis_penahanan`, `perpanjang_penahanan`, `penangguhan_penahanan`, `tanggal_penghentian`, `no_penghentian`, `tanpa_spdp`, `alasan`, `pendapat_jaksa`, `pp_mengajukan`, `pp_putusan_pn`, `pp_putusan_pt`, `tahapsatu_tanggal`, `tahapsatu_spdp`, `tahapsatu_spdp_berkas`, `keterangan`, `user_input`, `date_input`, `user_update`, `date_update`) VALUES
	(9, 'RP6-9', 1, 'Reg/123', '2015-04-03', 'Polres Bulungan', '2015-04-10', 22, 'Rumah Sakit Karya Bhakti', 'Selasa 25 Maret 2014', 'Pasal 27 ayat 1 UU anti kekerasan', 0, 0, 'NoPenangkapan123', '1970-01-01', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '0000-00-00', 'Ya', '', '', '', '0000-00-00', 'admin', '2015-08-05'),
	(10, 'RP6-10', 1, '12/Reg/1245', '2015-01-08', 'Polres Bulungan', '2015-04-04', 39, '', '', 'Pasal 123', 0, 0, 'NoPenangkapan123', '2015-03-05', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '0000-00-00', 'admin', '2015-08-05'),
	(11, 'RP6-11', 1, 'Tester Reg No', '2015-03-25', 'Polisi', '2015-03-24', 40, 'Rumah Sakit Harapan Kita', 'Selasa 15 Mei 2014', 'Pasal 65 KUHP', 0, 0, 'Penangkapan123', '2015-03-04', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '2015-03-26', 'Ya', '', '', '', '0000-00-00', 'admin', '2015-08-05'),
	(13, 'RP6-12', 1, '01/Polres/Bulungan/XV', '2015-06-12', 'Polres Bulungan', '2015-06-13', 45, '', '', 'Pasal 234 KUHP 2015', 0, 0, '', '0000-00-00', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '2015-06-13', '', '', 'OK', 'admin', '2015-06-12', 'admin', '2015-08-05');
/*!40000 ALTER TABLE `rp6` ENABLE KEYS */;


-- Dumping structure for table case_db.rp7
CREATE TABLE IF NOT EXISTS `rp7` (
  `id_rp7` int(11) NOT NULL AUTO_INCREMENT,
  `rp6_id` int(11) NOT NULL,
  `register_rp7` varchar(200) DEFAULT NULL,
  `tgl_rp7` date NOT NULL,
  `register_tahanan` varchar(200) DEFAULT NULL,
  `date_p19` date DEFAULT NULL,
  `no_p19` varchar(200) DEFAULT NULL,
  `tgl_terima_kembali_penyidik` date DEFAULT NULL,
  `petunjuk_belum_terpenuhi` text,
  `tgl_pemeriksaan_tambahan` date DEFAULT NULL,
  `tgl_lengkap` date DEFAULT NULL,
  `tgl_setelah_dilengkapi_penyidik` date DEFAULT NULL,
  `tgl_bp_tahap2` date DEFAULT NULL,
  `keterangan_rp7` text,
  `user_input` varchar(200) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `user_update` varchar(200) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id_rp7`),
  KEY `FK_rp7_rp6` (`rp6_id`),
  CONSTRAINT `FK_rp7_rp6` FOREIGN KEY (`rp6_id`) REFERENCES `rp6` (`id_rp6`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rp7: ~2 rows (approximately)
/*!40000 ALTER TABLE `rp7` DISABLE KEYS */;
INSERT INTO `rp7` (`id_rp7`, `rp6_id`, `register_rp7`, `tgl_rp7`, `register_tahanan`, `date_p19`, `no_p19`, `tgl_terima_kembali_penyidik`, `petunjuk_belum_terpenuhi`, `tgl_pemeriksaan_tambahan`, `tgl_lengkap`, `tgl_setelah_dilengkapi_penyidik`, `tgl_bp_tahap2`, `keterangan_rp7`, `user_input`, `date_input`, `user_update`, `date_update`) VALUES
	(1, 10, 'RP7-1', '0000-00-00', '01/THN/2015', '2015-05-07', 'P19/01/2015', '2015-05-14', '-', '2015-05-21', '2015-05-28', '2015-05-28', '2015-05-30', '-', NULL, NULL, NULL, NULL),
	(5, 13, 'RP7-2', '0000-00-00', NULL, '2015-06-13', 'P19/02/2015', '2015-06-20', 'Bukti', '2015-06-27', '2015-06-13', '0000-00-00', '0000-00-00', 'Kurang bukti', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `rp7` ENABLE KEYS */;


-- Dumping structure for table case_db.rp9
CREATE TABLE IF NOT EXISTS `rp9` (
  `id_rp9` int(11) NOT NULL AUTO_INCREMENT,
  `rp7_id` int(11) DEFAULT NULL,
  `register_rp9` varchar(200) DEFAULT NULL,
  `tgl_rp9` date NOT NULL,
  `jpu1` int(11) DEFAULT NULL,
  `jpu2` int(11) DEFAULT NULL,
  `pasal_dakwaan` text,
  `tgl_penyampingan_umum` date DEFAULT NULL,
  `no_sk_penyampingan_umum` varchar(200) DEFAULT NULL,
  `tgl_perkara_absaps` date DEFAULT NULL,
  `no_perkara_absaps` varchar(200) DEFAULT NULL,
  `tgl_kirim_instansi_lain` date DEFAULT NULL,
  `no_kirim_instansi_lain` varchar(200) DEFAULT NULL,
  `tgl_tuntutan_jpu` date DEFAULT NULL,
  `tuntutan_jpu` text,
  `tgl_amar_putusan` date DEFAULT NULL,
  `no_amar_putusan` varchar(200) DEFAULT NULL,
  `tgl_amar_pt` date DEFAULT NULL,
  `no_amar_pt` varchar(200) DEFAULT NULL,
  `tgl_amar_banding` date DEFAULT NULL,
  `no_amar_banding` varchar(200) DEFAULT NULL,
  `tgl_amar_ma` date DEFAULT NULL,
  `no_amar_ma` varchar(200) DEFAULT NULL,
  `tgl_kasasi` date DEFAULT NULL,
  `no_kasasi` varchar(200) DEFAULT NULL,
  `tgl_kasasi_ku` date DEFAULT NULL,
  `no_kasasi_ku` varchar(200) DEFAULT NULL,
  `tgl_amar_pk_ma` date DEFAULT NULL,
  `no_amar_pk_ma` varchar(200) DEFAULT NULL,
  `tgl_grasi` date DEFAULT NULL,
  `no_grasi` varchar(200) DEFAULT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  `keterangan_rp9` text,
  `user_input` varchar(200) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `user_update` varchar(200) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id_rp9`),
  KEY `FK_rp9_rp7` (`rp7_id`),
  KEY `FK_rp9_attorney1` (`jpu1`),
  KEY `FK_rp9_attorney2` (`jpu2`),
  CONSTRAINT `FK_rp9_rp7` FOREIGN KEY (`rp7_id`) REFERENCES `rp7` (`id_rp7`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rp9: ~2 rows (approximately)
/*!40000 ALTER TABLE `rp9` DISABLE KEYS */;
INSERT INTO `rp9` (`id_rp9`, `rp7_id`, `register_rp9`, `tgl_rp9`, `jpu1`, `jpu2`, `pasal_dakwaan`, `tgl_penyampingan_umum`, `no_sk_penyampingan_umum`, `tgl_perkara_absaps`, `no_perkara_absaps`, `tgl_kirim_instansi_lain`, `no_kirim_instansi_lain`, `tgl_tuntutan_jpu`, `tuntutan_jpu`, `tgl_amar_putusan`, `no_amar_putusan`, `tgl_amar_pt`, `no_amar_pt`, `tgl_amar_banding`, `no_amar_banding`, `tgl_amar_ma`, `no_amar_ma`, `tgl_kasasi`, `no_kasasi`, `tgl_kasasi_ku`, `no_kasasi_ku`, `tgl_amar_pk_ma`, `no_amar_pk_ma`, `tgl_grasi`, `no_grasi`, `tgl_pelaksanaan`, `keterangan_rp9`, `user_input`, `date_input`, `user_update`, `date_update`) VALUES
	(10, 1, 'RP9-1', '2015-07-01', 2, 1, 'Pasal 234', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', NULL, '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', NULL, NULL, NULL, NULL),
	(11, 5, 'RP9-2', '2015-07-02', 1, 0, 'Pasal 234 KUHP ', '2015-06-30', '01/SK/Samping/XV', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', NULL, NULL, '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', 'sudah', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `rp9` ENABLE KEYS */;


-- Dumping structure for table case_db.rpa1
CREATE TABLE IF NOT EXISTS `rpa1` (
  `id_rpa1` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `register_rpa1` varchar(200) DEFAULT NULL,
  `no_spdp` varchar(200) DEFAULT NULL,
  `tgl_spdp` date DEFAULT NULL,
  `tgl_spdp_diterima` date DEFAULT NULL,
  `suspect_id` int(11) NOT NULL,
  `pasal_tindak_pidana` text NOT NULL,
  `kasus_posisi` text NOT NULL,
  `no_p16` varchar(200) NOT NULL,
  `tgl_p16` date NOT NULL,
  `no_penahanan` varchar(200) NOT NULL,
  `tgl_penahanan` date NOT NULL,
  `no_perpanjangan` varchar(200) NOT NULL,
  `tgl_perpanjangan` date NOT NULL,
  `jenis_jumlah_bukti` text NOT NULL,
  `tgl_terima_berkas_perkara` date NOT NULL,
  `p18_no` varchar(200) NOT NULL,
  `p18_tgl` date NOT NULL,
  `p19_no` varchar(200) NOT NULL,
  `p19_tgl` date NOT NULL,
  `p21_no` varchar(200) NOT NULL,
  `p21_tgl` date NOT NULL,
  `keterangan_rpa1` text NOT NULL,
  PRIMARY KEY (`id_rpa1`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rpa1: ~1 rows (approximately)
/*!40000 ALTER TABLE `rpa1` DISABLE KEYS */;
INSERT INTO `rpa1` (`id_rpa1`, `register_rpa1`, `no_spdp`, `tgl_spdp`, `tgl_spdp_diterima`, `suspect_id`, `pasal_tindak_pidana`, `kasus_posisi`, `no_p16`, `tgl_p16`, `no_penahanan`, `tgl_penahanan`, `no_perpanjangan`, `tgl_perpanjangan`, `jenis_jumlah_bukti`, `tgl_terima_berkas_perkara`, `p18_no`, `p18_tgl`, `p19_no`, `p19_tgl`, `p21_no`, `p21_tgl`, `keterangan_rpa1`) VALUES
	(1, 'PDM-014/T.SELOR/8/2014', 'B-36/VII/2014/RES', '2014-07-14', '2014-07-16', 53, 'Pasal 338 KUHP, Pasal 381(3) KUHP, Pasal 56(1) KUHP', 'Pada hari minggu tanggal 13 Juli 2014 terjadi tindak pidana pembunuhan dan penganiayaan yang mengakibatkan meninggalnya orang lain dan membantu melakukan tindak pidana itu pada pulu 22:20 wita di gunung selingkuh desa sekatak buki kecamatan sekatak kabupaten Bulungan', 'Print.322/Q4.16/Epp.1/07/2014', '2014-07-17', 'Sp. Han/60/VII/2014/RESKRIM', '2014-07-15', 'B-017/Q4.16/EPP.1/07/2014', '2014-07-17', '1 buah sekop warna putih, 1 pasang sendal merk Eager warna hitam, 1 buah handphone merk nokia type x2 warna hitam, 1 unit sepeda motor yamaha mio soul KT5072 HT warna hitam, 1 unit sepeda motor merk honda mega pro tanpa nomor polisi', '2014-08-05', '', '0000-00-00', '', '0000-00-00', 'B-800/Q.4.16/EUH.1/08/2014', '2015-08-01', 'Proses sidang');
/*!40000 ALTER TABLE `rpa1` ENABLE KEYS */;


-- Dumping structure for table case_db.rpa2
CREATE TABLE IF NOT EXISTS `rpa2` (
  `id_rpa2` int(11) NOT NULL AUTO_INCREMENT,
  `register_rpa2` varchar(200) DEFAULT NULL,
  `tgl_rpa2` date DEFAULT NULL,
  `rpa1_id` int(11) NOT NULL,
  `no_pn` varchar(200) DEFAULT NULL,
  `tgl_pn` date DEFAULT NULL,
  `no_tuntutan` varchar(200) DEFAULT NULL,
  `tgl_tuntutan` date DEFAULT NULL,
  `isi_tuntutan` text,
  `no_putusan_pn` varchar(200) DEFAULT NULL,
  `tgl_putusan_pn` date DEFAULT NULL,
  `putusan_pn` text,
  `jenis_upaya_hukum` text,
  `tgl_upaya_hukum` date DEFAULT NULL,
  `putusan_pt_ma` text,
  `keterangan_rpa2` text,
  PRIMARY KEY (`id_rpa2`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rpa2: ~1 rows (approximately)
/*!40000 ALTER TABLE `rpa2` DISABLE KEYS */;
INSERT INTO `rpa2` (`id_rpa2`, `register_rpa2`, `tgl_rpa2`, `rpa1_id`, `no_pn`, `tgl_pn`, `no_tuntutan`, `tgl_tuntutan`, `isi_tuntutan`, `no_putusan_pn`, `tgl_putusan_pn`, `putusan_pn`, `jenis_upaya_hukum`, `tgl_upaya_hukum`, `putusan_pt_ma`, `keterangan_rpa2`) VALUES
	(1, 'RPA2-1', '2015-07-31', 1, 'B-012/APB/08/2014', '2014-08-19', 'PDM/013/T.SELOR/EPP.2/08/2014', '2014-09-04', '1. Menyatakan terdakwa bersalah melakukan tindak pidana sebagaimana dalam dakwaan keempat Jaksa Penuntut Umum', '01/Pid.Sus/2014/PN.TJS', '2014-09-05', 'Menyatakan terdakwa telah terbukti secara sah dan menyatakan bersalah melakukan tindak pidana', '', '0000-00-00', '', 'Tidak ada upaya hukum');
/*!40000 ALTER TABLE `rpa2` ENABLE KEYS */;


-- Dumping structure for table case_db.rpa3
CREATE TABLE IF NOT EXISTS `rpa3` (
  `id_rpa3` int(11) NOT NULL AUTO_INCREMENT,
  `register_rpa3` varchar(200) DEFAULT NULL,
  `tgl_rpa3` date DEFAULT NULL,
  `rpa2_id` int(11) DEFAULT NULL,
  `no_eksekusi_anak` varchar(200) DEFAULT NULL,
  `tgl_eksekusi_anak` date DEFAULT NULL,
  `no_eksekusi_bukti` varchar(200) DEFAULT NULL,
  `tgl_eksekusi_bukti` date DEFAULT NULL,
  `no_eksekusi_biaya` varchar(200) DEFAULT NULL,
  `tgl_eksekusi_biaya` date DEFAULT NULL,
  `keterangan_rpa3` text,
  PRIMARY KEY (`id_rpa3`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rpa3: ~1 rows (approximately)
/*!40000 ALTER TABLE `rpa3` DISABLE KEYS */;
INSERT INTO `rpa3` (`id_rpa3`, `register_rpa3`, `tgl_rpa3`, `rpa2_id`, `no_eksekusi_anak`, `tgl_eksekusi_anak`, `no_eksekusi_bukti`, `tgl_eksekusi_bukti`, `no_eksekusi_biaya`, `tgl_eksekusi_biaya`, `keterangan_rpa3`) VALUES
	(1, 'RPA3-1', '2015-07-31', 1, 'Print-412/Q.4.16/EPP.3/09/2014', '2014-09-24', 'Print-412/T.Selor/Epp.2/09/2014', '2014-09-24', 'Print-412/T.Selor/Epp.2/09/2014', '2014-09-24', 'Perkara Selesai');
/*!40000 ALTER TABLE `rpa3` ENABLE KEYS */;


-- Dumping structure for table case_db.rpa4
CREATE TABLE IF NOT EXISTS `rpa4` (
  `id_rpa4` int(11) NOT NULL AUTO_INCREMENT,
  `register_rpa4` varchar(200) DEFAULT NULL,
  `rpa3_id` int(11) NOT NULL,
  `tgl_rpa4` date DEFAULT NULL,
  `diversi_kesepakatan_penyidik` text,
  `no_tap_ketua_pn_penyidik` varchar(200) DEFAULT NULL,
  `tgl_tap_ketua_pn_penyidik` date DEFAULT NULL,
  `no_sp3` varchar(200) DEFAULT NULL,
  `tgl_sp3` date DEFAULT NULL,
  `tgl_terima_berkas` date DEFAULT NULL,
  `lap_penelitian_kemasyarakatan` text,
  `tgl_diversi_pu` date DEFAULT NULL,
  `pihak_diversi_pu` text,
  `no_kesepakatan_pu` varchar(200) DEFAULT NULL,
  `tgl_kesepakatan_pu` date DEFAULT NULL,
  `no_tap_ketua_pn_pu` varchar(200) DEFAULT NULL,
  `tgl_tap_ketua_pn_pu` date DEFAULT NULL,
  `no_skpp_pu` varchar(200) DEFAULT NULL,
  `tgl_skpp_pu` date DEFAULT NULL,
  `no_pelimpahan_pn` varchar(200) DEFAULT NULL,
  `tgl_pelimpahan_pn` date DEFAULT NULL,
  `diversi_kesepakatan_hakim` text,
  `no_tap_ketua_pn_hakim` varchar(200) DEFAULT NULL,
  `tgl_tap_ketua_pn_hakim` date DEFAULT NULL,
  `no_skpp_hakim` varchar(200) DEFAULT NULL,
  `tgl_skpp_hakim` date DEFAULT NULL,
  `keterangan_rpa4` text,
  PRIMARY KEY (`id_rpa4`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rpa4: ~1 rows (approximately)
/*!40000 ALTER TABLE `rpa4` DISABLE KEYS */;
INSERT INTO `rpa4` (`id_rpa4`, `register_rpa4`, `rpa3_id`, `tgl_rpa4`, `diversi_kesepakatan_penyidik`, `no_tap_ketua_pn_penyidik`, `tgl_tap_ketua_pn_penyidik`, `no_sp3`, `tgl_sp3`, `tgl_terima_berkas`, `lap_penelitian_kemasyarakatan`, `tgl_diversi_pu`, `pihak_diversi_pu`, `no_kesepakatan_pu`, `tgl_kesepakatan_pu`, `no_tap_ketua_pn_pu`, `tgl_tap_ketua_pn_pu`, `no_skpp_pu`, `tgl_skpp_pu`, `no_pelimpahan_pn`, `tgl_pelimpahan_pn`, `diversi_kesepakatan_hakim`, `no_tap_ketua_pn_hakim`, `tgl_tap_ketua_pn_hakim`, `no_skpp_hakim`, `tgl_skpp_hakim`, `keterangan_rpa4`) VALUES
	(1, 'RPA4-1', 1, '2015-07-31', 'Kesepakatan Penyidik', 'TAP-Penyidik', '2015-07-31', 'SP3-Penyidik', '2015-07-31', '2015-07-31', 'Laporan', '2015-07-31', 'Pihak Diversi', 'SPKT-1', '2015-07-31', 'TAP-Pu', '2015-07-31', 'SP3-Penyidik', '2015-07-31', 'Pel-PN', '2015-07-31', 'Kesepakatan Hakim', 'Tap-PN-1', '2015-07-31', 'SKPP-Hakim', '2015-07-31', 'RPA4 Oke Updated');
/*!40000 ALTER TABLE `rpa4` ENABLE KEYS */;


-- Dumping structure for table case_db.rpa5
CREATE TABLE IF NOT EXISTS `rpa5` (
  `id_rpa5` int(11) NOT NULL AUTO_INCREMENT,
  `register_rpa5` varchar(200) NOT NULL,
  `tgl_rpa5` date NOT NULL,
  `rpa4_id` int(11) DEFAULT NULL,
  `suspect_id` int(11) NOT NULL,
  `victim_id` int(11) NOT NULL,
  `pasal_rpa5` text,
  `no_spdp` varchar(200) DEFAULT NULL,
  `tgl_spdp` date DEFAULT NULL,
  `tgl_spdp_diterima` date DEFAULT NULL,
  `no_p16` varchar(200) DEFAULT NULL,
  `tgl_p16` date DEFAULT NULL,
  `kasus_posisi` text,
  `tgl_terima_berkas` date DEFAULT NULL,
  `keadaan_korban` text,
  `lap_peksos_teksos` text,
  `lembaga_rujukan` text,
  `keterangan_rpa5` text,
  PRIMARY KEY (`id_rpa5`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rpa5: ~1 rows (approximately)
/*!40000 ALTER TABLE `rpa5` DISABLE KEYS */;
INSERT INTO `rpa5` (`id_rpa5`, `register_rpa5`, `tgl_rpa5`, `rpa4_id`, `suspect_id`, `victim_id`, `pasal_rpa5`, `no_spdp`, `tgl_spdp`, `tgl_spdp_diterima`, `no_p16`, `tgl_p16`, `kasus_posisi`, `tgl_terima_berkas`, `keadaan_korban`, `lap_peksos_teksos`, `lembaga_rujukan`, `keterangan_rpa5`) VALUES
	(1, 'RPA5-1', '2015-08-04', 0, 54, 4, 'qwe', 'B-36/VII/2014/RES', '2015-08-02', '2015-08-03', 'Print.322/Q4.16/Epp.1/07/2014', '2015-08-03', 'Pidana', '2015-08-03', 'dll', 'dll', 'dll', 'saved');
/*!40000 ALTER TABLE `rpa5` ENABLE KEYS */;


-- Dumping structure for table case_db.rt2
CREATE TABLE IF NOT EXISTS `rt2` (
  `id_rt2` int(11) NOT NULL AUTO_INCREMENT,
  `register_rt2` varchar(200) DEFAULT NULL,
  `tgl_rt2` date DEFAULT NULL,
  `no_ketetapan` varchar(200) DEFAULT NULL,
  `rp6_id` int(11) DEFAULT NULL,
  `sp3_no` varchar(100) DEFAULT NULL,
  `sp3_tgl` date DEFAULT NULL,
  `sp3_tgl_ditahan` date DEFAULT NULL,
  `pp_dari_pu_mulai` date DEFAULT NULL,
  `pp_dari_pu_sampai` date DEFAULT NULL,
  `ditangguhkan_mulai` date DEFAULT NULL,
  `keterangan_rt2` text,
  `user_input` varchar(200) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `user_update` varchar(200) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id_rt2`),
  KEY `FK_rt2_rp6` (`rp6_id`),
  CONSTRAINT `FK_rt2_rp6` FOREIGN KEY (`rp6_id`) REFERENCES `rp6` (`id_rp6`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rt2: ~2 rows (approximately)
/*!40000 ALTER TABLE `rt2` DISABLE KEYS */;
INSERT INTO `rt2` (`id_rt2`, `register_rt2`, `tgl_rt2`, `no_ketetapan`, `rp6_id`, `sp3_no`, `sp3_tgl`, `sp3_tgl_ditahan`, `pp_dari_pu_mulai`, `pp_dari_pu_sampai`, `ditangguhkan_mulai`, `keterangan_rt2`, `user_input`, `date_input`, `user_update`, `date_update`) VALUES
	(2, '01/Reg/RT2/2015', '2015-05-05', '01/TAP/2015', 10, '01/Super/2015', '2015-05-03', '2015-05-04', '2015-05-01', '2015-05-31', '2015-05-12', 'keterangan kosong', NULL, NULL, NULL, NULL),
	(4, '01/Reg/RT2/2015', '2015-06-12', '01/TAP/XV', 13, '01/SPPD/XV', '2015-06-13', '2015-06-06', '0000-00-00', '0000-00-00', '0000-00-00', 'Tersangka Kelas Teripang', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `rt2` ENABLE KEYS */;


-- Dumping structure for table case_db.rt3
CREATE TABLE IF NOT EXISTS `rt3` (
  `id_rt3` int(11) NOT NULL AUTO_INCREMENT,
  `rp6_id` int(11) NOT NULL,
  `rp12_id` int(11) NOT NULL,
  `register_rt3` varchar(200) DEFAULT NULL,
  `tgl_rt3` date NOT NULL,
  `penyidikan_jenis` varchar(200) DEFAULT NULL,
  `penyidikan_tgl` date DEFAULT NULL,
  `penyidikan_lama` varchar(200) DEFAULT NULL,
  `penuntutan_jenis` varchar(200) DEFAULT NULL,
  `penuntutan_tgl` date DEFAULT NULL,
  `penuntutan_pengalihan` varchar(200) DEFAULT NULL,
  `penuntutan_pengalihan_tgl` date DEFAULT NULL,
  `penuntutan_penangguhan` varchar(200) DEFAULT NULL,
  `penuntutan_penangguhan_tgl` date DEFAULT NULL,
  `penuntutan_pencabutan` varchar(200) DEFAULT NULL,
  `penuntutan_pencabutan_tgl` date DEFAULT NULL,
  `penuntutan_dikeluarkan` varchar(200) DEFAULT NULL,
  `penuntutan_dikeluarkan_tgl` date DEFAULT NULL,
  `penuntutan_diperpanjang` varchar(200) DEFAULT NULL,
  `penuntutan_diperpanjang_tgl` date DEFAULT NULL,
  `pn_tgl` date DEFAULT NULL,
  `pn_no` varchar(200) DEFAULT NULL,
  `pn_lama_ditahan` varchar(200) DEFAULT NULL,
  `pt_tgl` date DEFAULT NULL,
  `pt_no` varchar(200) DEFAULT NULL,
  `pt_lama_ditahan` varchar(200) DEFAULT NULL,
  `ma_tgl` date DEFAULT NULL,
  `ma_no` varchar(200) DEFAULT NULL,
  `ma_lama_ditahan` varchar(200) DEFAULT NULL,
  `amar_pn_tgl` date DEFAULT NULL,
  `amar_pn_no` varchar(200) DEFAULT NULL,
  `amar_pt_tgl` date DEFAULT NULL,
  `amar_pt_no` varchar(200) DEFAULT NULL,
  `amar_ma_tgl` date DEFAULT NULL,
  `amar_ma_no` varchar(200) DEFAULT NULL,
  `pelaksanaan_putusan` text,
  `keterangan_rt3` text,
  `user_input` varchar(200) DEFAULT NULL,
  `date_input` date DEFAULT NULL,
  `user_update` varchar(200) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`id_rt3`),
  KEY `FK_rt3_rp6` (`rp6_id`),
  KEY `FK_rt3_rp12` (`rp12_id`),
  CONSTRAINT `FK_rt3_rp12` FOREIGN KEY (`rp12_id`) REFERENCES `rp12` (`id_rp12`),
  CONSTRAINT `FK_rt3_rp6` FOREIGN KEY (`rp6_id`) REFERENCES `rp6` (`id_rp6`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.rt3: ~2 rows (approximately)
/*!40000 ALTER TABLE `rt3` DISABLE KEYS */;
INSERT INTO `rt3` (`id_rt3`, `rp6_id`, `rp12_id`, `register_rt3`, `tgl_rt3`, `penyidikan_jenis`, `penyidikan_tgl`, `penyidikan_lama`, `penuntutan_jenis`, `penuntutan_tgl`, `penuntutan_pengalihan`, `penuntutan_pengalihan_tgl`, `penuntutan_penangguhan`, `penuntutan_penangguhan_tgl`, `penuntutan_pencabutan`, `penuntutan_pencabutan_tgl`, `penuntutan_dikeluarkan`, `penuntutan_dikeluarkan_tgl`, `penuntutan_diperpanjang`, `penuntutan_diperpanjang_tgl`, `pn_tgl`, `pn_no`, `pn_lama_ditahan`, `pt_tgl`, `pt_no`, `pt_lama_ditahan`, `ma_tgl`, `ma_no`, `ma_lama_ditahan`, `amar_pn_tgl`, `amar_pn_no`, `amar_pt_tgl`, `amar_pt_no`, `amar_ma_tgl`, `amar_ma_no`, `pelaksanaan_putusan`, `keterangan_rt3`, `user_input`, `date_input`, `user_update`, `date_update`) VALUES
	(1, 10, 3, 'RT3-1', '2015-07-12', '0', '0000-00-00', '0', '0', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', '0000-00-00', '0', '0', '0000-00-00', '0', '0', '0000-00-00', '0', '0', '0000-00-00', '0', '0000-00-00', '0', '0000-00-00', '0', '0', '0', NULL, NULL, NULL, NULL),
	(2, 13, 4, 'RT3-2a', '2015-07-12', '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '', '', 'asd', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `rt3` ENABLE KEYS */;


-- Dumping structure for table case_db.sentitems
CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table case_db.sentitems: 18 rows
/*!40000 ALTER TABLE `sentitems` DISABLE KEYS */;
INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
	('2015-04-10 06:05:31', '2015-04-10 06:05:04', '2015-04-10 06:05:31', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B0061007300750073002000410068006D00610064002000540061006D0069006D0069', '628562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Ahmad Tamimi', 1, '', 1, 'SendingError', -1, -1, 255, ''),
	('2015-04-10 06:08:33', '2015-04-10 06:08:11', '2015-04-10 06:08:33', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B0061007300750073002000410068006D00610064002000540061006D0069006D0069', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Ahmad Tamimi', 2, '', 1, 'SendingError', -1, -1, 255, ''),
	('2015-04-10 06:35:24', '2015-04-10 06:30:29', '2015-04-10 06:35:24', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B0061007300750073002000410068006D00610064002000540061006D0069006D0069', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Ahmad Tamimi', 3, '', 1, 'SendingOKNoReport', -1, 40, 255, ''),
	('2015-04-10 06:35:28', '2015-04-10 06:35:18', '2015-04-10 06:35:28', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B0061007300750073002000410068006D00610064002000540061006D0069006D0069', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Ahmad Tamimi', 4, '', 1, 'SendingOKNoReport', -1, 41, 255, ''),
	('2015-04-10 06:37:35', '2015-04-10 06:37:22', '2015-04-10 06:37:35', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B0061007300750073002000410068006D00610064002000540061006D0069006D0069', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Ahmad Tamimi', 5, '', 1, 'SendingOKNoReport', -1, 42, 255, ''),
	('2015-04-11 20:34:43', '2015-04-11 20:32:53', '2015-04-11 20:34:43', NULL, '004B006100730075007300200075006E00740075006B002000420061006D00620061006E0067002000470075006C0069006E00640061006E00670020006100670061007200200064006900200070006500720069006B00730061002000640061006C0061006D002000770061006B007400750020003700200068006100720069002E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Kasus untuk Bambang Gulindang agar di periksa dalam waktu 7 hari.', 7, '', 1, 'SendingOKNoReport', -1, 43, 255, ''),
	('2015-04-11 20:34:47', '2015-04-11 20:32:53', '2015-04-11 20:34:47', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B0061007300750073002000520065006E00680061007200640020005300690074006F007200750073', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Renhard Sitorus', 6, '', 1, 'SendingOKNoReport', -1, 44, 255, ''),
	('2015-04-11 20:34:51', '2015-04-11 20:34:33', '2015-04-11 20:34:51', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B0061007300750073002000520065006E00680061007200640020005300690074006F007200750073', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Renhard Sitorus', 8, '', 1, 'SendingOKNoReport', -1, 45, 255, ''),
	('2015-04-11 20:34:55', '2015-04-11 20:34:33', '2015-04-11 20:34:55', NULL, '004B006100730075007300200075006E00740075006B002000420061006D00620061006E0067002000470075006C0069006E00640061006E00670020006100670061007200200064006900200070006500720069006B00730061002000640061006C0061006D002000770061006B007400750020003700200068006100720069002E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Kasus untuk Bambang Gulindang agar di periksa dalam waktu 7 hari.', 9, '', 1, 'SendingOKNoReport', -1, 46, 255, ''),
	('2015-04-11 20:50:32', '2015-04-11 20:50:17', '2015-04-11 20:50:32', NULL, '004B006100730075007300200075006E00740075006B002000420061006D00620061006E0067002000470075006C0069006E00640061006E00670020006100670061007200200064006900200070006500720069006B00730061002000640061006C0061006D002000770061006B007400750020003700200068006100720069002E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Kasus untuk Bambang Gulindang agar di periksa dalam waktu 7 hari.', 11, '', 1, 'SendingOKNoReport', -1, 47, 255, ''),
	('2015-04-11 20:50:36', '2015-04-11 20:50:17', '2015-04-11 20:50:36', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B0061007300750073002000520065006E00680061007200640020005300690074006F007200750073', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Renhard Sitorus', 10, '', 1, 'SendingOKNoReport', -1, 48, 255, ''),
	('2015-04-12 18:11:40', '2015-04-12 18:03:51', '2015-04-12 18:11:40', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B006100730075007300200041007200690066002000470075006E006100770061006E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Arif Gunawan', 13, '', 1, 'SendingOKNoReport', -1, 49, 255, ''),
	('2015-04-12 18:11:44', '2015-04-12 18:03:51', '2015-04-12 18:11:44', NULL, '00570061006B0074007500200075006E00740075006B0020006D0065006D0062006500720069006B0061006E002000700065006E006400610070006100740020006B0061007300750073002000410068006D00610064002000540061006D0069006D0069002000740069006E006700670061006C00200032002000680061007200690020006C006100670069002E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu untuk memberikan pendapat kasus Ahmad Tamimi tinggal 2 hari lagi.', 12, '', 1, 'SendingOKNoReport', -1, 50, 255, ''),
	('2015-04-12 18:11:48', '2015-04-12 18:03:53', '2015-04-12 18:11:48', NULL, '00570061006B00740075002000740065006C0061006800200068006100620069007300200075006E00740075006B0020006B006100730075007300200041007200690066002000470075006E006100770061006E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu telah habis untuk kasus Arif Gunawan', 15, '', 1, 'SendingOKNoReport', -1, 51, 255, ''),
	('2015-04-12 18:11:52', '2015-04-12 18:03:53', '2015-04-12 18:11:52', NULL, '00570061006B0074007500200075006E00740075006B0020006D0065006D0062006500720069006B0061006E002000700065006E006400610070006100740020006B0061007300750073002000410068006D00610064002000540061006D0069006D0069002000740069006E006700670061006C00200032002000680061007200690020006C006100670069002E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Waktu untuk memberikan pendapat kasus Ahmad Tamimi tinggal 2 hari lagi.', 14, '', 1, 'SendingOKNoReport', -1, 52, 255, ''),
	('2015-04-12 18:11:56', '2015-04-12 18:08:36', '2015-04-12 18:11:56', NULL, '004B006100730075007300200075006E00740075006B00200041007200690066002000470075006E006100770061006E0020006100670061007200200064006900200070006500720069006B00730061002000640061006C0061006D002000770061006B007400750020003700200068006100720069002E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Kasus untuk Arif Gunawan agar di periksa dalam waktu 7 hari.', 16, '', 1, 'SendingOKNoReport', -1, 53, 255, ''),
	('2015-04-12 18:37:32', '2015-04-12 18:37:07', '2015-04-12 18:37:32', NULL, '004B006100730075007300200075006E00740075006B00200041007200690066002000470075006E006100770061006E0020006100670061007200200064006900200070006500720069006B00730061002000640061006C0061006D002000770061006B007400750020003700200068006100720069002E', '0811666086', 'Default_No_Compression', '', '+6281100000', -1, 'Kasus untuk Arif Gunawan agar di periksa dalam waktu 7 hari.', 18, '', 1, 'SendingOKNoReport', -1, 54, 255, ''),
	('2015-04-12 18:37:36', '2015-04-12 18:37:07', '2015-04-12 18:37:36', NULL, '004B006100730075007300200075006E00740075006B00200041007200690066002000470075006E006100770061006E0020006100670061007200200064006900200070006500720069006B00730061002000640061006C0061006D002000770061006B007400750020003700200068006100720069002E', '08562913798', 'Default_No_Compression', '', '+6281100000', -1, 'Kasus untuk Arif Gunawan agar di periksa dalam waktu 7 hari.', 17, '', 1, 'SendingOKNoReport', -1, 55, 255, '');
/*!40000 ALTER TABLE `sentitems` ENABLE KEYS */;


-- Dumping structure for view case_db.status_perkara
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `status_perkara` (
	`name` VARCHAR(200) NULL COLLATE 'latin1_swedish_ci',
	`ttl` VARCHAR(212) NULL COLLATE 'latin1_swedish_ci',
	`tsk` INT(11) NULL,
	`rp6_case` BIGINT(11) NULL,
	`rp7_case` BIGINT(11) NULL,
	`rp9_case` BIGINT(11) NULL,
	`rp12_case` BIGINT(11) NULL,
	`rb2_case` BIGINT(11) NULL,
	`rt2_case` BIGINT(11) NULL,
	`rt3_case` BIGINT(11) NULL
) ENGINE=MyISAM;


-- Dumping structure for table case_db.supervisor
CREATE TABLE IF NOT EXISTS `supervisor` (
  `id_supervisor` int(11) NOT NULL AUTO_INCREMENT,
  `name_supervisor` varchar(200) NOT NULL,
  `email_supervisor` varchar(200) NOT NULL,
  `phone_supervisor` varchar(20) NOT NULL,
  `position` varchar(200) NOT NULL,
  PRIMARY KEY (`id_supervisor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.supervisor: ~2 rows (approximately)
/*!40000 ALTER TABLE `supervisor` DISABLE KEYS */;
INSERT INTO `supervisor` (`id_supervisor`, `name_supervisor`, `email_supervisor`, `phone_supervisor`, `position`) VALUES
	(1, 'Mochammad Sudharmono', 'm.sudharmono@gmail.com', '08562913798', 'Super Admin'),
	(2, 'Gunawan Wibisono', 'gunawan.wibisono@kejaritanjungselor.com', '0811666086', '');
/*!40000 ALTER TABLE `supervisor` ENABLE KEYS */;


-- Dumping structure for table case_db.suspect
CREATE TABLE IF NOT EXISTS `suspect` (
  `id_suspect` int(11) NOT NULL AUTO_INCREMENT,
  `name_suspect` varchar(200) NOT NULL,
  `birthplace` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `nationality` varchar(200) DEFAULT NULL,
  `address` text,
  `job` varchar(200) DEFAULT NULL,
  `education` varchar(200) DEFAULT NULL,
  `religion` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_suspect`),
  KEY `id_suspect` (`id_suspect`),
  KEY `id_suspect_2` (`id_suspect`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.suspect: ~12 rows (approximately)
/*!40000 ALTER TABLE `suspect` DISABLE KEYS */;
INSERT INTO `suspect` (`id_suspect`, `name_suspect`, `birthplace`, `birthdate`, `gender`, `nationality`, `address`, `job`, `education`, `religion`) VALUES
	(22, 'Ahmad Tamimi', 'Jakarta', '1970-01-01', 'Pria', 'Indonesia', 'Jakarta', 'IT', 'Sarjana', 'Islam'),
	(39, 'Bambang Gulindang', 'Jakarta', '1980-03-03', 'Pria', 'Indonesia', 'Jakarta', 'Pengangguran', 'SD', 'Katolik'),
	(40, 'Ruston S', 'Medan', '1970-08-19', 'Pria', 'Indonesia', 'Jakarta Selatan', 'Swasta', 'Master', 'Kristen'),
	(45, 'M Sudharmono', 'Banjarbaru', '1988-03-13', 'Pria', 'Indonesia', 'Bogor', 'IT', 'Sarjana', 'Islam'),
	(46, 'Muhammad Chairil Bin Suwun', 'Lamongan', '1998-06-13', 'Pria', 'Indonesia', 'Jl Pangeran Muda RT 01 Ds Sekatak Kab Bulungan', 'Pelajar', 'SMA Kelas 2', 'Islam'),
	(48, 'Muhammad Chairil Bin Suwun', 'Lamongan', '1998-06-13', 'Pria', 'Indonesia', 'Jl Pangeran Muda RT 01 Ds Sekatak Kab Bulungan', 'Pelajar', 'SMA Kelas 2', 'Islam'),
	(49, 'Arif Gunawan', 'Banjarbaru', '1980-08-13', 'Pria', 'Indonesia', 'Tanjung Selor', 'Pedagang', 'SMA Kelas 2', 'Islam'),
	(50, 'Arif Gunawan', 'Banjarbaru', '1980-08-13', 'Pria', 'Indonesia', 'Tanjung Selor', 'Pedagang', 'SMA Kelas 2', 'Islam'),
	(51, 'Arif Gunawan', 'Banjarbaru', '1980-08-13', 'Pria', 'Indonesia', 'Tanjung Selor', 'Pedagang', 'SMA Kelas 2', 'Islam'),
	(52, 'Muhammad Chairil Bin Suwun', 'Lamongan', '1998-06-13', 'Pria', 'Indonesia', 'Jl Pangeran Muda RT 01 Ds Sekatak Kab Bulungan', 'Pelajar', 'SMA Kelas 2', 'Islam'),
	(53, 'Muhammad Chairil Bin Suwun', 'Lamongan', '1998-06-13', 'Pria', 'Indonesia', 'Jl Pangeran Muda RT 01 Ds Sekatak Kab Bulungan', 'Pelajar', 'SMA Kelas 2', 'Islam'),
	(54, 'Arif Gunawan', 'Banjarbaru', '1980-08-13', 'Pria', 'Indonesia', 'Tanjung Selor', 'Pedagang', 'SMA Kelas 2', 'Islam');
/*!40000 ALTER TABLE `suspect` ENABLE KEYS */;


-- Dumping structure for table case_db.victim
CREATE TABLE IF NOT EXISTS `victim` (
  `id_victim` int(11) NOT NULL AUTO_INCREMENT,
  `name_victim` varchar(200) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `kelamin` varchar(10) DEFAULT NULL,
  `kebangsaan` varchar(200) DEFAULT NULL,
  `alamat` text,
  `pekerjaan` varchar(200) DEFAULT NULL,
  `pendidikan` varchar(200) DEFAULT NULL,
  `agama` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_victim`),
  KEY `id_suspect` (`id_victim`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table case_db.victim: ~4 rows (approximately)
/*!40000 ALTER TABLE `victim` DISABLE KEYS */;
INSERT INTO `victim` (`id_victim`, `name_victim`, `tempat_lahir`, `tgl_lahir`, `kelamin`, `kebangsaan`, `alamat`, `pekerjaan`, `pendidikan`, `agama`) VALUES
	(1, 'Anak', 'Tempat', '2005-08-08', 'Pria', 'Indonesia', 'Tanjung Selor', 'Tidak Bekerja', 'SD', 'Islam'),
	(2, 'Anak', 'Tempat', '2005-08-08', 'Pria', 'Indonesia', 'Tanjung Selor', 'Tidak Bekerja', 'SD', 'Islam'),
	(3, 'Anak', 'Tempat', '2005-08-08', 'Pria', 'Indonesia', 'Tanjung Selor', 'Tidak Bekerja', 'SD', 'Islam'),
	(4, 'Anak', 'Tempat', '2005-08-08', 'Pria', 'Indonesia', 'Tanjung Selor', 'Tidak Bekerja', 'SD', 'Islam');
/*!40000 ALTER TABLE `victim` ENABLE KEYS */;


-- Dumping structure for trigger case_db.inbox_timestamp
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox` FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger case_db.outbox_timestamp
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger case_db.phones_timestamp
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for trigger case_db.sentitems_timestamp
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO';
DELIMITER //
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;


-- Dumping structure for view case_db.status_perkara
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `status_perkara`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `status_perkara` AS select
	suspect.name_suspect as name,
	concat_ws(', ', birthplace, DATE_FORMAT(birthdate,'%d/%m/%Y')) as ttl,
	suspect_id as tsk,
	(select id_rp6 from rp6 where suspect_id=tsk) as rp6_case,
	(select id_rp7 from rp6 right join rp7 on rp7.rp6_id=rp6.id_rp6 where suspect_id=tsk) as rp7_case,
	(select id_rp9 from rp6 right join rp7 on rp7.rp6_id=rp6.id_rp6 right join rp9 on rp9.rp7_id=rp7.id_rp7 where suspect_id=tsk) as rp9_case,
	(select id_rp12 from rp6 right join rp7 on rp7.rp6_id=rp6.id_rp6 right join rp9 on rp9.rp7_id=rp7.id_rp7 right join rp12 on rp12.rp9_id=rp9.id_rp9 where suspect_id=tsk) as rp12_case,
	(select id_rb2 from rp6 right join rp7 on rp7.rp6_id=rp6.id_rp6 right join rp9 on rp9.rp7_id=rp7.id_rp7 right join rb2 on rb2.rp9_id=rp9.id_rp9 where suspect_id=tsk) as rb2_case,
	(select id_rt2 from rp6 right join rt2 on rt2.rp6_id=rp6.id_rp6 where suspect_id=tsk) as rt2_case,
	(select id_rt3 from rp6 right join rp7 on rp7.rp6_id=rp6.id_rp6 right join rp9 on rp9.rp7_id=rp7.id_rp7 right join rp12 on rp12.rp9_id=rp9.id_rp9 right join rt3 on rt3.rp12_id=rp12.id_rp12 where suspect_id=tsk) as rt3_case
from rp6
left join suspect on suspect.id_suspect=rp6.suspect_id ;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
