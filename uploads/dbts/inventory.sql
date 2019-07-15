/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.16-MariaDB : Database - inventory
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `inventory`;

/*Table structure for table `tbl_info` */

DROP TABLE IF EXISTS `tbl_info`;

CREATE TABLE `tbl_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_toko` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `logo_full` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `keunggulan` text NOT NULL,
  `siup` varchar(50) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_info` */

insert  into `tbl_info`(`id`,`nama_toko`,`alamat`,`telp`,`fax`,`email`,`logo`,`logo_full`,`about`,`keunggulan`,`siup`,`npwp`) values 
(1,'PT YAZAKI','-','-','-','-','pemi.png','pemi_full.png','-','-','-','-');

/*Table structure for table `tbl_kategori` */

DROP TABLE IF EXISTS `tbl_kategori`;

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  `nama_kategori_seo` varchar(100) NOT NULL,
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_kategori` */

insert  into `tbl_kategori`(`kategori_id`,`nama_kategori`,`nama_kategori_seo`,`status_delete`) values 
(4,'SUSPENSION PARTS','suspension-parts',0),
(5,'BRAKE PARTS','brake-parts',0),
(6,'MAINTENANCE PARTS','maintenance-parts',0),
(7,'STEERING PARTS','steering-parts',0),
(8,'ELECTRICAL PARTS','electrical-parts',0),
(9,'STATIONARY','stationary',0),
(10,'ENGINEERING','engineering',0);

/*Table structure for table `tbl_material` */

DROP TABLE IF EXISTS `tbl_material`;

CREATE TABLE `tbl_material` (
  `material_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_input` date NOT NULL,
  `nama_material` varchar(100) NOT NULL,
  `nama_material_seo` varchar(140) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `location` varchar(11) NOT NULL,
  `keterangan` text NOT NULL,
  `kualitas` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `publish` int(1) NOT NULL DEFAULT '0',
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_material` */

insert  into `tbl_material`(`material_id`,`tgl_input`,`nama_material`,`nama_material_seo`,`qty`,`harga`,`location`,`keterangan`,`kualitas`,`image`,`kategori_id`,`publish`,`status_delete`) values 
(4,'2017-11-24','ANTI LOOK BRAKE SYSTEM1','anti-look-brake-system1',10,2000001,'A10','<p>keterangan singkat produk1</p>\r\n','Kualitas OEM1','brake_anti_look_brake_system1.jpg',4,1,0),
(5,'2017-11-22','CALIPER','caliper',10,35000,'A11','- Semua Shock Absorber di produksi dan di supply oleh Mando\r\n<br/>\r\n- Setiap item di kemas individually dalam kemasan Karton Box','Kualitas OEM ISO9001:2000 QS-9000','brake_caliper.jpg',5,1,0),
(6,'2017-11-24','MASTER CYLINDER','master-cylinder',10,67000,'B10','keterangan singkat produk','Kualitas OEM','brake_master_cylinder.jpg',5,1,0),
(7,'2017-11-24','BRAKE PADS','brake-pads',10,100000,'B11','<p>- Back Plates terbuat dari Low carbon steel<br />\r\n- Setiap item di kemas individually dalam kemasan Karton Box<br />\r\n- Material NON Asbestos</p>\r\n','Kualitas OEM ISO9001:2000 Euro Certification','brake_pads.jpg',5,1,0),
(8,'2017-11-24','BRAKE SENSOR','brake-sensor',10,46000,'B12','keterangan singkat produk','Kualitas OEM','brake_sensor.jpg',5,1,0),
(9,'2017-11-24','ELECTRICAL ALTERNATOR','electrical-alternator',10,51000,'C10','keterangan singkat produk','Kualitas OEM','electric_alternator.jpg',8,1,0),
(10,'2017-11-24','ELECTRIC STARTER','electric-starter',10,63000,'C11','keterangan singkat produk','Kualitas OEM','electric_starter.jpg',8,1,0),
(11,'2017-11-24','MAINTENANCE BELTS','maintenance-belts',10,34000,'C12','- Semua item di supply oleh Vendor Mando','Kualitas OEM ISO9001:2000','maintenance_belts.jpg',6,1,0),
(12,'2017-11-24','MAINTENANCE CHEMICAL','maintenance-chemical',10,34000,'C13','- Tersedia saringan Oli, Saringan udara, saringan bahan bakar\r\n<br/>\r\n- Saringan Cabin AC yang dapat melindungi dari debu, polusi, spora, jelaga\r\n<br/>\r\n- Saringan Oli adalah saringan yang dapat memisahkan kotoran dari pelumas','Premium Quality','maintenance_chemicals.jpg',6,1,0),
(13,'2017-11-24','STEERING BOX','steering-box',10,90000,'C14','keterangan singkat produk','Kualitas OEM','steering_box.jpg',7,1,0),
(14,'2017-11-24','STEERING JOINT','steering-joint',10,80000,'C15','keterangan singkat produk','Kualitas OEM','steering_joint.jpg',7,1,0),
(15,'2017-11-24','STEERING PINION','steering-pinion',10,10000,'C16','keterangan singkat produk','Kualitas OEM','steering_pinion.jpg',7,1,0),
(16,'2017-11-24','SUSPENSION ABSORBER','suspension-absorber',10,90000,'D10','- Semua Shock Absorber di produksi dan di supply oleh Mando\r\n<br/>\r\n- Setiap item di kemas individually dalam kemasan Karton Box','Kualitas OEM ISO9001:2000 QS-9000','suspension_absorber.jpg',4,1,0),
(17,'2017-11-24','ELECTRONIC CONTROLLED SUSPENSION','electronic-controlled-suspension',10,120000,'D11','keterangan singkat produk','Kualitas OEM','suspension_electronic.jpg',4,1,0);

/*Table structure for table `tbl_menu_admin` */

DROP TABLE IF EXISTS `tbl_menu_admin`;

CREATE TABLE `tbl_menu_admin` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) NOT NULL,
  `icon` varchar(40) NOT NULL,
  `link` varchar(100) NOT NULL,
  `parent` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu_admin` */

insert  into `tbl_menu_admin`(`menu_id`,`nama_menu`,`icon`,`link`,`parent`,`status`,`status_delete`) values 
(1,'Category','clip-puzzle','category',7,0,1),
(2,'Material','	clip-wrench','material',0,1,0),
(3,'Goods Inventory In','clip-cube','goods_inventory',0,1,0),
(4,'Information','clip-home','info',7,0,1),
(5,'Goods Requisition','clip-stack-2','goods_requisition',0,2,0),
(6,'Goods Reqs. Appr','clip-checkmark','goods_requisition_appr',0,1,0),
(7,'Master','	clip-grid','#',0,0,1),
(8,'Supplier','clip-globe','supplier',7,0,1),
(9,'Report Goods Reqs.','clip-paperclip','goods_requisition_report',0,1,0),
(10,'','clip-tag','tags',0,0,1),
(11,'','clip-paperclip','#',0,0,1),
(12,'','clip-stack-empty','product_slider',11,0,1),
(13,'','clip-images','product_widget',11,0,1),
(14,'','','',0,0,1),
(15,'','','',0,0,1);

/*Table structure for table `tbl_po` */

DROP TABLE IF EXISTS `tbl_po`;

CREATE TABLE `tbl_po` (
  `no_po` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_po` date NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status_gi` int(1) NOT NULL DEFAULT '0',
  `tgl_appr` date NOT NULL,
  `user_appr` varchar(50) NOT NULL,
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_po`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_po` */

insert  into `tbl_po`(`no_po`,`tgl_po`,`supplier_id`,`status_gi`,`tgl_appr`,`user_appr`,`status_delete`) values 
(1,'2019-01-05',3,0,'0000-00-00','',0),
(2,'2019-01-05',4,0,'0000-00-00','',0);

/*Table structure for table `tbl_po_detail` */

DROP TABLE IF EXISTS `tbl_po_detail`;

CREATE TABLE `tbl_po_detail` (
  `no_po_detail` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga` int(11) NOT NULL,
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`no_po_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_po_detail` */

insert  into `tbl_po_detail`(`no_po_detail`,`no_po`,`material_id`,`qty`,`harga`,`status_delete`) values 
(1,1,4,5,100000,0),
(2,1,5,3,20000,0),
(3,2,6,7,10000,0),
(4,2,7,10,500000,0),
(5,2,8,15,10000,0);

/*Table structure for table `tbl_request` */

DROP TABLE IF EXISTS `tbl_request`;

CREATE TABLE `tbl_request` (
  `request_no` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_request` date NOT NULL,
  `note` varchar(200) NOT NULL,
  `user` varchar(50) NOT NULL,
  `print` int(11) NOT NULL,
  `status_request` int(1) NOT NULL DEFAULT '0',
  `tgl_appr` date NOT NULL,
  `user_appr` varchar(50) NOT NULL,
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`request_no`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_request` */

insert  into `tbl_request`(`request_no`,`tgl_request`,`note`,`user`,`print`,`status_request`,`tgl_appr`,`user_appr`,`status_delete`) values 
(1,'2018-12-31','tes','maintenance',0,0,'0000-00-00','',0),
(2,'2019-01-11','tes2','maintenance',0,0,'0000-00-00','',0),
(3,'2019-01-11','tes3','maintenance',1,0,'0000-00-00','',1),
(4,'2019-01-11','tes3','maintenance',1,1,'2019-01-17','admin.warehouse',0),
(5,'2019-01-11','tes4','maintenance',1,0,'0000-00-00','',0),
(6,'2019-01-11','tes aja','maintenance',1,0,'0000-00-00','',0),
(7,'2019-01-18','tes7','maintenance',1,1,'2019-01-18','admin.warehouse',0);

/*Table structure for table `tbl_request_detail` */

DROP TABLE IF EXISTS `tbl_request_detail`;

CREATE TABLE `tbl_request_detail` (
  `request_detail_no` int(11) NOT NULL AUTO_INCREMENT,
  `request_no` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `location` varchar(11) NOT NULL,
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`request_detail_no`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_request_detail` */

insert  into `tbl_request_detail`(`request_detail_no`,`request_no`,`material_id`,`qty`,`harga`,`location`,`status_delete`) values 
(1,1,6,3,10000,'B10',0),
(2,2,5,3,20000,'A11',0),
(3,4,10,1,63000,'C11',0),
(4,5,8,3,46000,'B12',0),
(5,6,6,4,67000,'B10',0),
(6,6,11,5,15000,'C12',0),
(7,3,13,6,25000,'C14',0),
(8,6,7,4,10000,'B11',0),
(9,6,5,1,35000,'A11',0),
(10,6,5,4,35000,'A11',0),
(11,6,5,1,35000,'A11',0),
(12,7,6,3,67000,'B10',0),
(13,7,0,1,50000,'A11',0),
(14,7,10,2,63000,'C11',0);

/*Table structure for table `tbl_supplier` */

DROP TABLE IF EXISTS `tbl_supplier`;

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `note` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_supplier` */

insert  into `tbl_supplier`(`supplier_id`,`supplier_name`,`address`,`phone`,`email`,`note`,`image`,`status_delete`) values 
(1,'Doowon','address1','phone1','email1','note1','doowon.png',0),
(2,'Hanon System','address2','phone2','email2','note2','hanon_system.png',0),
(3,'Mando','address3','phone3','email3','note3','mando.png',0),
(4,'Mando Plus','address4','phone4','email4','note4','mando_plus.png',0),
(5,'TES','ADDRESS','PHONE','EMAIL','NOTE','brake_caliper2.jpg',0),
(6,'TES2','ADDRESS6','PHONE6','EMAIL6@GMAIL.COM','NOTE6','mando1.png',0),
(7,'TES3','ADDRESS7','PHONE7','EMAIL@GMAIL.COM','NOTE','hanon_system1.png',0);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1= aktif, 2= tidak aktif',
  `status_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`user_id`,`nama_lengkap`,`username`,`password`,`status`,`status_delete`) values 
(1,'Administrator','admin','0192023a7bbd73250516f069df18b500',0,1),
(2,'Admin Warehouse','admin.warehouse','0192023a7bbd73250516f069df18b500',1,0),
(3,'Maintenance','maintenance','0192023a7bbd73250516f069df18b500',2,0),
(4,'Spare Part','parts','0192023a7bbd73250516f069df18b500',2,0),
(5,'Warehouse','warehouse','0192023a7bbd73250516f069df18b500',2,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
