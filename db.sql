# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.5.6-MariaDB)
# Database: skripsi1
# Generation Time: 2021-05-20 16:56:40 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`)
VALUES
	(1,'Cianjur',1,NULL,NULL);

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Indonesia',NULL,NULL);

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2021_04_30_194528_create_country_state_city_tables',2);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table states
# ------------------------------------------------------------

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`)
VALUES
	(1,'Bojongherang',1,NULL,NULL),
	(2,'Kertajaya',2,NULL,NULL);

/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_desa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_desa`;

CREATE TABLE `tbl_desa` (
  `id_desa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(11) DEFAULT NULL,
  `desa` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_desa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_desa` WRITE;
/*!40000 ALTER TABLE `tbl_desa` DISABLE KEYS */;

INSERT INTO `tbl_desa` (`id_desa`, `id_kecamatan`, `desa`)
VALUES
	(1,1,'Bojongherang'),
	(2,2,'Kertajaya');

/*!40000 ALTER TABLE `tbl_desa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_jenjang
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_jenjang`;

CREATE TABLE `tbl_jenjang` (
  `id_jenjang` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `jenjang` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_jenjang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_jenjang` WRITE;
/*!40000 ALTER TABLE `tbl_jenjang` DISABLE KEYS */;

INSERT INTO `tbl_jenjang` (`id_jenjang`, `jenjang`, `icon`)
VALUES
	(1,'TK','tk.png'),
	(2,'SD','sd.png'),
	(3,'SMA','sma.png'),
	(9,'SMP','smp.png');

/*!40000 ALTER TABLE `tbl_jenjang` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_kecamatan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_kecamatan`;

CREATE TABLE `tbl_kecamatan` (
  `id_kecamatan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kecamatan` varchar(255) DEFAULT NULL,
  `geojson` longtext DEFAULT NULL,
  `warna` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_kecamatan` WRITE;
/*!40000 ALTER TABLE `tbl_kecamatan` DISABLE KEYS */;

INSERT INTO `tbl_kecamatan` (`id_kecamatan`, `kecamatan`, `geojson`, `warna`)
VALUES
	(1,'Cianjur','{}','#06FFA0'),
	(2,'Ciranjang','{}','#1E1E12'),
	(3,'Haurwangi',NULL,NULL);

/*!40000 ALTER TABLE `tbl_kecamatan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_kegiatan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_kegiatan`;

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_kegiatan` WRITE;
/*!40000 ALTER TABLE `tbl_kegiatan` DISABLE KEYS */;

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `icon`)
VALUES
	(1,'Sanitasi DAK','sanitasi.png'),
	(2,'Sanimas Reguler','sanimas_reguler.png');

/*!40000 ALTER TABLE `tbl_kegiatan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_koordinat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_koordinat`;

CREATE TABLE `tbl_koordinat` (
  `id_koordinat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_pekerjaan` int(11) DEFAULT NULL,
  `id_kegiatan` int(11) DEFAULT NULL,
  `latlong` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_koordinat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_koordinat` WRITE;
/*!40000 ALTER TABLE `tbl_koordinat` DISABLE KEYS */;

INSERT INTO `tbl_koordinat` (`id_koordinat`, `id_pekerjaan`, `id_kegiatan`, `latlong`)
VALUES
	(1,11,1,'-6.834567727116758,107.13313579559328'),
	(4,12,2,'-6.793942758480525, 107.1534632727849');

/*!40000 ALTER TABLE `tbl_koordinat` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_mahasiswa
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_mahasiswa`;

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `fakultas` varchar(255) DEFAULT NULL,
  `jumlah` int(255) DEFAULT NULL,
  PRIMARY KEY (`id_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_mahasiswa` WRITE;
/*!40000 ALTER TABLE `tbl_mahasiswa` DISABLE KEYS */;

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `fakultas`, `jumlah`)
VALUES
	(1,'Teknik Informatika',120),
	(2,'Manajemen',200),
	(3,'Akuntansi',500),
	(4,'Manejemen Informatika',198),
	(5,'Ilmu Komunikasi',500),
	(6,'Sastra Inggris',123);

/*!40000 ALTER TABLE `tbl_mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_pekerjaan
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_pekerjaan`;

CREATE TABLE `tbl_pekerjaan` (
  `id_pekerjaan` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int(11) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `id_desa` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `pagu` int(255) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL,
  `id_koordinat` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_pekerjaan` WRITE;
/*!40000 ALTER TABLE `tbl_pekerjaan` DISABLE KEYS */;

INSERT INTO `tbl_pekerjaan` (`id_pekerjaan`, `id_kegiatan`, `pekerjaan`, `id_desa`, `id_kecamatan`, `pagu`, `tahun`, `id_koordinat`)
VALUES
	(11,2,'Pembangunan IPAL Komunal 1',1,1,1900,2021,NULL),
	(12,2,'Pembangunan IPAL Komunal 2',1,1,12121,2022,NULL);

/*!40000 ALTER TABLE `tbl_pekerjaan` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_sekolah
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_sekolah`;

CREATE TABLE `tbl_sekolah` (
  `id_sekolah` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) DEFAULT NULL,
  `id_jenjang` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `tbl_sekolah` WRITE;
/*!40000 ALTER TABLE `tbl_sekolah` DISABLE KEYS */;

INSERT INTO `tbl_sekolah` (`id_sekolah`, `nama_sekolah`, `id_jenjang`, `id_kecamatan`, `alamat`, `posisi`, `deskripsi`, `foto`, `status`)
VALUES
	(8,'SMA 2 Cianjur',3,11,'Jl. KH. R. Marzuki Gg. Komodo 01/16, Bojongherang, Cianjur','-6.809341715545148,107.13270664215088','Tes','dak sanitasi.png','Negeri'),
	(9,'SMA 1 Ciranjang',3,12,'Jl. KH. R. Marzuki Gg. Komodo 01/16, Bojongherang, Cianjur','-6.821358325955008,107.12996006011963','Ini Deskripsi Sekolah','fifa.jpeg','Negeri'),
	(10,'SDN 1 Sukataris',2,13,'Karangtengah','-6.815477894664828,107.16549396514894','Ini Deskripsi Sekolah','poster.jpg','Negeri'),
	(11,'SMA 2 Cianjur',3,1,'Jl. KH. R. Marzuki Gg. Komodo 01/16, Bojongherang, Cianjur','-6.816244911533783,107.13794231414795','ssss','dak sanitasi.png','Negeri'),
	(12,'SDN 1 Sukataris',2,1,'Bojongherang, Cianjur','-6.809853066803264,107.13081836700441','ss','clbk_2021.png','Negeri'),
	(13,'SMP S',9,1,'Jl. KH. R. Marzuki Gg. Komodo 01/16, Bojongherang, Cianjur','-6.815989239380505,107.14412212371828','qqq','dpi.png','Negeri');

/*!40000 ALTER TABLE `tbl_sekolah` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tbl_spm
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbl_spm`;

CREATE TABLE `tbl_spm` (
  `id_spm` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) DEFAULT NULL,
  `id_kecamatan` int(11) DEFAULT NULL,
  `total` int(50) DEFAULT NULL,
  `t_aksesdasar` int(50) DEFAULT NULL,
  `t_aksesaman_s` int(50) DEFAULT NULL,
  `t_aksesaman_t` int(50) DEFAULT NULL,
  `tanpa_akses` int(50) DEFAULT NULL,
  `r_aksesdasar` int(50) DEFAULT NULL,
  `r_akseslayak` int(50) DEFAULT NULL,
  `r_aksesaman_s` int(50) DEFAULT NULL,
  `r_aksesaman_t` int(50) DEFAULT NULL,
  PRIMARY KEY (`id_spm`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `foto`)
VALUES
	(1,'Ilham Taufik','ilhamtaufiq97@gmail.com',NULL,'$2y$10$V6lgUglZLBrCoF/EZC3SOuIQcEkOkLlH9rQR3gfBPzFNHrhqq8MHa',NULL,'2021-04-24 12:14:46','2021-04-24 12:14:46','unpi.png');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
