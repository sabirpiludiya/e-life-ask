-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 08:20 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_myproject_elifeask`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_photo` varchar(500) NOT NULL,
  `admin_birthdate` date NOT NULL,
  `admin_address` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_photo`, `admin_birthdate`, `admin_address`) VALUES
(1, 'Sabir', 'sabirpiludiya@gmail.com', 'sss', 'images/avatar04.png', '1996-10-12', 'Dhebar Colony,\r\nDhebar Road,\r\nRajkot. ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_photo` varchar(500) NOT NULL,
  `category_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_photo`, `category_status`) VALUES
(55, 'Agriculture & Farming', '../images/agriculture-_-farming.png', 1),
(54, 'Medical & Healthcare', '../images/medical-_-healthcare.png', 1),
(53, 'Food & Beverages', '../images/food-_-beverages.png', 1),
(52, 'Building & Construction', '../images/building-_-construction.png', 1),
(56, 'Chemicals', '../images/chemicalsdyes-_-solvent.png', 1),
(57, 'Books & Stationery', '../images/books-_-stationery.png', 1),
(58, 'Computer & IT Solutions', '../images/computer-_-it-solutions.png', 1),
(59, 'Education & Training', '../images/education-_-training.png', 1),
(60, 'Fashion & Accessories', '../images/fashion-accessories-_-gear.png', 1),
(61, 'Sports & Games', '../images/sports-goodstoys-_-games.png', 1),
(62, 'Transportation', '../images/transportation-_-logistics.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(30) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_name`, `state_id`, `city_status`) VALUES
(64, 'Jamnagar', 21, 1),
(63, 'Surat', 21, 1),
(62, 'Rajkot', 21, 1),
(61, 'Ahmedabad', 21, 1),
(60, 'Bikaner', 22, 1),
(59, 'Kota', 22, 1),
(58, 'Udaipur', 22, 1),
(57, 'Ajmer', 22, 1),
(56, 'Jaipur', 22, 1),
(55, 'Thane', 23, 1),
(54, 'Solapur', 23, 1),
(53, 'Nagpur', 23, 1),
(52, 'Pune', 23, 1),
(51, 'Mumbai', 23, 1),
(50, 'Ooty', 25, 1),
(49, 'Salem', 25, 1),
(48, 'Chennai', 25, 1),
(65, 'Vadodara', 21, 1),
(66, 'Ludhiana', 24, 1),
(67, 'Amritsar', 24, 1),
(68, 'Patiala', 24, 1),
(69, 'Mohali', 24, 1),
(70, 'Kochi', 26, 1),
(71, 'Thrissur', 26, 1),
(72, 'Kannur', 26, 1),
(73, 'New Delhi', 27, 1),
(74, 'Dwarka', 27, 1),
(75, 'Faridabad', 27, 1),
(76, 'Patna', 28, 1),
(77, 'Arrah', 28, 1),
(78, 'Gaya', 28, 1),
(79, 'Katihar', 28, 1),
(80, 'Gurunam', 29, 1),
(81, 'Karnal', 29, 1),
(82, 'Panipat', 29, 1),
(83, 'Hisar', 29, 1),
(84, 'Bhubaneswar', 30, 1),
(85, 'Puri', 30, 1),
(86, 'Guwahati', 31, 1),
(87, 'Jorhat', 31, 1),
(88, 'Diphu', 31, 1),
(89, 'Namchi', 32, 1),
(90, 'Rangpo', 32, 1),
(91, 'Kolasib', 33, 1),
(92, 'Champhai', 33, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `comment_description` varchar(500) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_date_time` datetime NOT NULL,
  `comment_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `product_id`, `comment_description`, `user_id`, `comment_date_time`, `comment_status`) VALUES
(15, 17, 'Hello', 1, '2017-05-16 20:56:37', 1),
(16, 19, 'Awesome Performance', 6, '2017-05-20 02:10:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_current_plan`
--

CREATE TABLE `tbl_current_plan` (
  `current_plan_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `display_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_current_plan`
--

INSERT INTO `tbl_current_plan` (`current_plan_id`, `dealer_id`, `plan_id`, `start_date`, `end_date`, `display_status`) VALUES
(65, 22, 3245, '2017-05-24', '2017-05-27', 1),
(44, 5, 3245, '2017-03-30', '2017-03-30', 1),
(36, 7, 1, '2017-03-30', '2017-03-30', 1),
(35, 9, 3246, '2017-03-30', '2017-03-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dealer`
--

CREATE TABLE `tbl_dealer` (
  `dealer_id` int(11) NOT NULL,
  `dealer_first_name` varchar(25) NOT NULL,
  `dealer_last_name` varchar(25) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `dealer_email` varchar(30) NOT NULL,
  `dealer_password` varchar(15) NOT NULL,
  `dealer_mobile_no` varchar(13) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pin_code` varchar(10) NOT NULL,
  `dealer_address` varchar(200) NOT NULL,
  `dealer_details` varchar(5000) NOT NULL,
  `dealer_photo` varchar(500) NOT NULL,
  `web_url` varchar(200) DEFAULT NULL,
  `JOD` date NOT NULL,
  `business_type` varchar(20) NOT NULL,
  `dealer_proof_1` varchar(500) NOT NULL,
  `dealer_proof_2` varchar(500) NOT NULL,
  `dealer_status` int(11) NOT NULL,
  `dealer_trial_plan_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dealer`
--

INSERT INTO `tbl_dealer` (`dealer_id`, `dealer_first_name`, `dealer_last_name`, `company_name`, `dealer_email`, `dealer_password`, `dealer_mobile_no`, `designation`, `city_id`, `pin_code`, `dealer_address`, `dealer_details`, `dealer_photo`, `web_url`, `JOD`, `business_type`, `dealer_proof_1`, `dealer_proof_2`, `dealer_status`, `dealer_trial_plan_status`) VALUES
(11, 'Mayur', 'Parmar', 'Humanity', 'humanity@yahoo.com', '999901', '9999999901', 'President', 63, '379009', 'VK Society,\r\nSaarth Road,\r\nSurat.', 'Help Poors..', 'images/20170518193247.jpg', 'http://humanity.com', '2017-05-18', 'Trust', 'images/0(1).jpg', 'images/(datara)   .jpg', 1, 1),
(12, 'Riya', 'Somani', 'We Equals', 'weequals@yahoo.com', '999902', '9999999902', 'President', 61, '380006', 'RJ Colony,\r\nVaham Nagar,\r\nAhmedabad.', 'We are Equals and Treat equals to all humans.', 'images/20170518193410.jpg', 'http://weequals.com', '2017-05-18', 'Trust', 'images/4O11-KarbonnA1Wh_L1_14-05-12.jpg', 'images/1+June+2013.jpg', 1, 1),
(13, 'Mina', 'Kapoor', 'Mom Heart', 'momheart@yahoo.com', '999903', '9999999903', 'President', 56, '408555', 'Lovely Homes,\r\nMahaaBaazar,\r\nJaipur.', 'Spread love of mom.', 'images/20170518193400.jpg', 'http://momheart.com', '2017-05-18', 'Trust', 'images/298x300xMicromax-A-87-Ninja-4-298x300.jpg', 'images/A110-camera.jpg', 1, 1),
(15, 'Priyanka', 'Singh', 'Innovative Schools', 'innovativeschools@hotmail.com', '888802', '8888888802', 'Principal', 66, '240059', 'Dharamji di Galli.\r\nNear Gandhi Road,\r\nLudhiana.', 'Children is future. and we make your future.', 'images/20170518193220.jpg', 'http://innovativeschools.com', '2017-05-18', 'Institute', 'images/choose-connection.png', 'images/Foot_bones.jpg', 1, 1),
(14, 'Mukul', 'Sharma', 'EduModo', 'edumodo@hotmail.com', '888801', '8888888801', 'Principal', 51, '870024', 'Majhaar gate,\r\nBhagat Nagar,\r\nMumbai.', 'Education is Everything.', 'images/20170518193542.jpg', 'http://edumodo.com', '2017-05-18', 'Institute', 'images/Canvas4.jpg', 'images/canvas4-374x242.jpg', 1, 1),
(16, 'Suman', 'Malhotra', 'Love Tree Institutes', 'lovetree@hotmail.com', '888803', '8888888803', 'Principal', 54, '567009', 'Tech Zone,\r\nNear SS Road,\r\nSolapur.', 'Grow technology by knowledge is our goal.', 'images/20170518193325.png', 'http://lovetree.com', '2017-05-18', 'Institute', 'images/IMG20_1807_04052014.jpg', 'images/ICC+World+Cup+2011+Winner+Team.jpg', 1, 1),
(17, 'Samir', 'Kureshi', 'EarthQuick', 'Earthquick@outlook.com', '777701', '7777777701', 'Owner', 76, '490324', '125, Mehta Building,\r\nAsgar Road,\r\nPatna.', 'We provide fast as earth quick.', 'images/20170518193201.jpg', 'http://earthquick.com', '2017-05-18', 'Service Provider', 'images/kites-patang01.jpg', 'images/micro--621x414.jpg', 1, 1),
(18, 'Neha', 'Shrof', 'GrowFast', 'growfast@outlook.com', '777702', '7777777702', 'Owner', 52, '690086', '31, Aakash Complex,\r\nNear V S Kapoor Road,\r\nPune.', 'We try to grow and provide larger services to your area.', 'images/20170518193307.jpg', 'http://growfast.com', '2017-05-18', 'Service Provider', 'images/micromax-canvas-4-review-by-technodify-03.png', 'images/mmx-a-87.jpg', 1, 1),
(19, 'Sahil', 'Piludiya', 'Lions Sales', 'lionssales@gmail.com', '666601', '6666666601', 'Founder', 62, '360002', 'Dhebar Colony,\r\nNear PDM Clg,\r\nRajkot.', 'Sale the products for your well requirements.', 'images/20170518193510.jpg', 'http://lionssales.com', '2017-05-18', 'Product Marketing', 'images/micromax-canvas-41.jpg', 'images/NW11019.jpg', 1, 1),
(20, 'Mohan', 'Sarkar', 'Clarity Sales', 'claritysales@gmail.com', '666602', '6666666602', 'Founder', 84, '589004', '72, BG Building,\r\nNear Sahara Baug,\r\nBhubaneswar.', 'We believe in customers.', 'images/20170518193429.jpg', 'http://claritysales.com', '2017-05-18', 'Product Marketing', 'images/Micromax-Ninja-4-1.jpg', 'images/NW19762.jpg', 1, 1),
(21, 'Mahesh', 'Shah', 'Unicorn Agency', 'unicornagency@gmail.com', '666603', '6666666603', 'Founder', 90, '960706', 'Mahant Plaza,\r\nOpp. Crystal Mall,\r\nRangpo.', 'We can reach your products at time.', 'images/20170518193529.jpg', 'http://unicornagency.com', '2017-05-18', 'Product Marketing', 'images/NW20180.jpg', 'images/NW20637.jpg', 1, 1),
(22, 'Hetal', 'Parmar', 'We Unit Sales', 'weunitsales@gmail.com', '666604', '6666666604', 'Founder', 70, '765008', 'AK Complex,\r\nNear Beach,\r\nKochi.', 'We can sale faster as you want.', 'images/20170518193446.jpg', 'http://weunitsales.com', '2017-05-18', 'Product Marketing', 'images/NW17438.jpg', 'images/Samsung-Galaxy-Y-Duos-Lite-vs-Micromax-A87-Supe.png', 1, 1),
(23, 'Ashok', 'Rathod', 'Hands On Sales', 'hansonsales@gmail.com', '666605', '6666666605', 'Founder', 69, '365004', '67, AK buildings,\r\nSaddi Galli,\r\nMohali.', 'Lets sale and buy faster.', 'images/20170518193340.jpg', 'http://handsonsale.com', '2017-05-18', 'Product Marketing', 'images/NW19914.jpg', 'images/Tower at kutchh.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donation_info`
--

CREATE TABLE `tbl_donation_info` (
  `donation_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `donation_title` varchar(100) NOT NULL,
  `donation_date` date NOT NULL,
  `trust_type` varchar(50) NOT NULL,
  `donation_description` varchar(500) NOT NULL,
  `donation_photo` varchar(500) NOT NULL,
  `donation_status` int(11) NOT NULL,
  `paypal_account` varchar(100) NOT NULL,
  `trust_link` varchar(50) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donation_info`
--

INSERT INTO `tbl_donation_info` (`donation_id`, `dealer_id`, `donation_title`, `donation_date`, `trust_type`, `donation_description`, `donation_photo`, `donation_status`, `paypal_account`, `trust_link`, `sub_category_id`) VALUES
(3, 5, 'rtwra11111', '2016-12-24', 'rwetwra111111', 'rwetwr111111111', 'images/logo.png', 1, 'ABCD', 'wrtwe111111', 21),
(4, 11, 'Poor Kids Study', '2017-05-19', 'NGO', 'This is to inform all that we organized program to help poor kids. you can contribute by donating money to them and help for studies. We distribute Books, Fees etc.', 'images/NW11019.jpg', 1, 'donate_humanity@gmail.com', 'http://humanity.com', 64),
(5, 11, 'Health Checkup', '2017-05-19', 'NGO', 'This is to inform all that we organized program to check health. you can contribute by donating money to them and help for medicines. We help in operations of poor peoples also. You can join to donate your blood.', 'images/NW21140.jpg', 1, 'donate_humanity@gmail.com', 'http://humanity.com', 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donor_info`
--

CREATE TABLE `tbl_donor_info` (
  `donor_id` int(11) NOT NULL,
  `donation_id` int(11) DEFAULT NULL,
  `donor_first_name` varchar(25) NOT NULL,
  `donor_last_name` varchar(25) NOT NULL,
  `donor_email_id` varchar(30) NOT NULL,
  `donor_mobile_no` varchar(13) DEFAULT NULL,
  `donate_money` int(11) NOT NULL,
  `donate_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_donor_info`
--

INSERT INTO `tbl_donor_info` (`donor_id`, `donation_id`, `donor_first_name`, `donor_last_name`, `donor_email_id`, `donor_mobile_no`, `donate_money`, `donate_date`) VALUES
(4, 3, 'xyzzzzzzzz', 'zzzzzzzzzzzzzz', 'u@u.com', '231324235111', 67756, '2017-03-28'),
(3, 3, 'xyzzzzzzzz', 'zzzzzzzzzzzzzz', 'u@u.com', '231324235111', 5656, '2017-03-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `event_title` varchar(160) NOT NULL,
  `event_description` varchar(500) NOT NULL,
  `event_start_date` date NOT NULL,
  `event_end_date` date NOT NULL,
  `event_start_time` time NOT NULL,
  `event_end_time` time NOT NULL,
  `event_display_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `dealer_id`, `event_title`, `event_description`, `event_start_date`, `event_end_date`, `event_start_time`, `event_end_time`, `event_display_status`) VALUES
(11, 5, 'E222333', 'etgsdfgsdfg333', '2016-12-03', '2016-03-03', '03:03:33', '15:05:33', 1),
(7, 7, 'Event 12333333', 'dsgnhfrhdfhdfghn dfjj dthjn rtndnurt', '2016-12-25', '2017-01-01', '10:00:00', '12:00:00', 1),
(9, 7, 'Event 1230', 'dsgnhfrhdfhdfghn dfjj dthjn rtndnurt', '2016-12-25', '2017-01-01', '10:00:00', '05:00:00', 1),
(10, 7, 'gsfgsafg', 'sdgg', '2015-12-31', '2018-12-05', '12:43:00', '12:31:00', 1),
(12, 7, 'E333', 'ertyneyen', '0000-00-00', '0000-00-00', '10:00:00', '03:00:00', 1),
(13, 7, 'E76', 'werktpowtp;smdfg;lmsdf;gm', '0000-00-00', '0000-00-00', '04:32:00', '04:00:00', 1),
(14, 7, 'Hello', 'fsytdhdgshsgh', '2017-03-31', '2017-03-25', '14:02:00', '12:02:00', 1),
(15, 11, 'Blanket Distribution on Roads', 'This is to inform all that we organized program to help poor peoples to distribute blankets in this cold nights. you can contribute by donating money to them and help. Thank you.', '2017-05-25', '2017-05-27', '00:00:00', '02:00:00', 1),
(16, 22, 'Ceremony', 'We are organizing ceremony of anniversary of company. We will give prize to our users.', '0000-00-00', '0000-00-00', '12:00:00', '01:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow_block`
--

CREATE TABLE `tbl_follow_block` (
  `follow_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `follow_status` int(11) DEFAULT NULL,
  `block_status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_follow_block`
--

INSERT INTO `tbl_follow_block` (`follow_id`, `dealer_id`, `user_id`, `follow_status`, `block_status`) VALUES
(40, 5, 1, 1, 0),
(31, 9, 1, 1, 0),
(42, 6, 1, 1, 0),
(39, 7, 1, 1, 0),
(25, 5, 2, 1, 0),
(43, 22, 7, 1, 0),
(44, 22, 6, 1, 0),
(45, 11, 6, 1, 0),
(46, 12, 8, 1, 0),
(47, 11, 8, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_institute_facility`
--

CREATE TABLE `tbl_institute_facility` (
  `facility_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `facility_title` varchar(100) NOT NULL,
  `institute_type` varchar(50) NOT NULL,
  `facility` varchar(500) NOT NULL,
  `facility_photo` varchar(500) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `facility_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_institute_facility`
--

INSERT INTO `tbl_institute_facility` (`facility_id`, `dealer_id`, `facility_title`, `institute_type`, `facility`, `facility_photo`, `sub_category_id`, `facility_status`) VALUES
(8, 7, 'e2qqq', 'Coaching Class', 'sdfsfsdg', 'images/med_img_top.gif', 20, 1),
(9, 7, 'e2qqqerrrr', 'College', 'sdfsfsdgrt', 'images/rt-titbg.jpg', 23, 1),
(10, 7, 'rewrtwe', 'Private Hostipital', 'ewrwer', 'images/rt-titbg.jpg', 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `news_title` varchar(160) NOT NULL,
  `news_description` varchar(500) NOT NULL,
  `news_date` date NOT NULL,
  `news_till_date` date NOT NULL,
  `news_display_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `dealer_id`, `news_title`, `news_description`, `news_date`, `news_till_date`, `news_display_status`) VALUES
(9, 7, 'Title 1', 'Description 1', '2017-02-11', '2017-02-24', 1),
(7, 5, 'Title 2', 'Description 2', '2016-12-13', '2017-01-10', 1),
(8, 7, 'Title 3', 'Description 3', '2017-02-10', '2017-02-21', 1),
(10, 7, 'Tile 4', 'Description 4', '2017-04-01', '2017-04-20', 1),
(11, 7, 'Title 5', 'Description 5', '2017-04-05', '2017-04-12', 1),
(12, 11, 'Blood Donation Camp', 'This is to inform all that we organized program to donate blood. You can join to donate your blood that will save many of the life. \r\nThank you.', '2017-05-19', '2017-05-29', 1),
(13, 11, 'Organized Books Distribution', 'This is to inform all that we organized program to distribute books to backwards family children. It is successful program that made smile in face of cute children. Thank you.', '2017-05-19', '2017-05-27', 1),
(14, 22, 'Honor 6x Launch', 'We will provide you product of Huawei brand as it will launched.\r\nPrice will be 14999 for  4GB RAM and 64GB ROM.', '2017-05-20', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_plan`
--

CREATE TABLE `tbl_plan` (
  `plan_id` int(11) NOT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_price` varchar(6) NOT NULL,
  `plan_description` varchar(1000) NOT NULL,
  `duration` int(11) NOT NULL,
  `display_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_plan`
--

INSERT INTO `tbl_plan` (`plan_id`, `plan_name`, `plan_price`, `plan_description`, `duration`, `display_status`) VALUES
(1, 'Silver', '1000', 'You can activate Silver Plan for requirements of limited posts.', 10, 1),
(3244, 'Gold', '2000', 'You can activate Gold Plan for requirements of more posts with more duration.', 60, 1),
(3245, 'Platinum', '5000', 'You can activate Platinum Plan for requirements of Higher duration and posts.', 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_model_no` varchar(20) DEFAULT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_photo` varchar(500) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_brand` varchar(100) NOT NULL,
  `product_display_till_date` date NOT NULL,
  `product_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `dealer_id`, `sub_category_id`, `product_name`, `product_model_no`, `product_price`, `product_photo`, `product_description`, `product_brand`, `product_display_till_date`, `product_status`) VALUES
(14, 5, 42, 'ColdDrink', '3332dw', '2222', 'images/screenshot-localhost-2016-10-15-18-01-44.png', 'On the Insert tab, the galleries include items that are designed to coordinate with the overall look of your document. You can use these galleries to insert tables, headers, footers, lists, cover pages, and other document building blocks. When you create pictures, charts, or diagrams, they also coordinate with your current document look. You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home ta', 'CocaCola', '2016-12-26', 1),
(42, 7, 42, 'Noodles', '32w', '364', 'images/demo 2.jpg', 'fgsdfg', 'Maggi', '2016-12-16', 1),
(43, 7, 42, 'Soap', 'erger33', '364', 'images/demo 5.png', 'fgsdfg', 'Lux', '2016-12-16', 1),
(13, 7, 17, 'fdsssgsfg', 'afgafgwew3', '4545', 'images/demo 1.png', 'argasg', 'gsdfagafsd', '2016-12-21', 1),
(17, 7, 27, 'gazewtetwratw', 'erger', '364', 'images/HP_Salary_Payslip_2014.png', 'fgsdfg', 'efgdfs', '2016-12-16', 1),
(18, 7, 20, 'Product 1', '1122', '50000', 'images/demo 3.png', 'This is the bike descri.......', 'Sony', '2016-12-26', 1),
(19, 22, 60, 'Huawei Honor 6x', 'Honor 6x', '14999', 'images/4O11-KarbonnA1Wh_L1_14-05-12.jpg', 'This is price effective product.', 'Honor', '2017-05-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `question_id` int(11) NOT NULL,
  `survey_id` int(11) DEFAULT NULL,
  `question` varchar(5000) NOT NULL,
  `answer_1` varchar(5000) NOT NULL,
  `answer_2` varchar(5000) NOT NULL,
  `answer_3` varchar(5000) NOT NULL,
  `answer_4` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_question`
--

INSERT INTO `tbl_question` (`question_id`, `survey_id`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`) VALUES
(9, 14, 'QQaaaa', 'AA1aaaa', 'AA2aaaa', 'AA3aaaa', 'AA4aaaa'),
(3, 15, 'THis is Qaaa', 'Ans 1aaa', 'Ans 2aaa', 'Ans 3aaa', 'Ans 4aaa'),
(10, 16, 'q', 'a', 'b', 'c', 'd'),
(11, 17, 'Which Program should be next?', 'Book Distribution', 'Food Distribution', 'Blood Donation', 'Educational');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `service_title` varchar(100) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `service` varchar(500) NOT NULL,
  `service_photo` varchar(500) NOT NULL,
  `service_price` varchar(10) NOT NULL,
  `service_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `dealer_id`, `service_title`, `sub_category_id`, `service`, `service_photo`, `service_price`, `service_status`) VALUES
(8, 7, 's33333', 17, 'erqwrwarear55555555555', 'images/logo_infinityinfoway.com.png', '342342222', 1),
(7, 7, 'wsq', 20, 'erwer', 'images/slidearrowright.png', '3242', 1),
(9, 7, 's3', 23, 'erqwrwarear', 'images/iiplbg.jpg', '34234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `state_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`state_id`, `state_name`, `state_status`) VALUES
(25, 'Tamilnadu', 1),
(23, 'Maharashtra', 1),
(22, 'Rajasthan', 1),
(21, 'Gujarat', 1),
(24, 'Punjab', 1),
(26, 'Kerala', 1),
(27, 'Delhi', 1),
(28, 'Bihar', 1),
(29, 'Haryana', 1),
(30, 'Odisha', 1),
(31, 'Assam', 1),
(32, 'Sikkim', 1),
(33, 'Mizoram', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_name` varchar(50) NOT NULL,
  `sub_category_photo` varchar(500) NOT NULL,
  `business_type` varchar(50) NOT NULL,
  `sub_category_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`sub_category_id`, `category_id`, `sub_category_name`, `sub_category_photo`, `business_type`, `sub_category_status`) VALUES
(35, 54, 'Common Disease Medicines', '../images/360_common_disease_medicines-125x125.jpg', 'Product Marketing', 1),
(34, 55, 'Fresh Flowers, Plants & Trees', '../images/717_fresh_flowers-_plants_and_trees-125x125.jpg', 'Product Marketing', 1),
(33, 55, 'Seeds & Plantation Products', '../images/14_seeds-and-plantation-products-125x125.jpg', 'Product Marketing', 1),
(32, 55, 'Bird Seeds, Poultry & Animal Food', '../images/13_animal-and-bird-feed-supplements-125x125.jpg', 'Product Marketing', 1),
(31, 55, 'Coir and Agro Waste Products', '../images/7_starch-husk-and-agro-waste-125x125.jpg', 'Product Marketing', 1),
(36, 54, 'Disposable & Other Optical Lenses', '../images/431_disposable_and_other_optical_lenses-125x125.jpg', 'Product Marketing', 1),
(37, 54, 'Ayurvedic & Herbal Products', '../images/32_ayurvedic-and-herbal-products-125x125.jpg', 'Product Marketing', 1),
(38, 54, 'Surgical & Medical Consumables', '../images/193_surgical-and-medical-consumables-125x125.jpg', 'Product Marketing', 1),
(39, 54, 'Medical Surgery & Treatment Centres', '../images/medical-surgery--125x125.jpg', 'Service Provider', 1),
(40, 53, 'Indian Sweets & Deserts', '../images/sweets-jpg-125x125.jpg', 'Product Marketing', 1),
(41, 53, 'Chocolates, Biscuits and Cookies', '../images/wp-content-uploads-2011-06-choc-basket-2-125x125.jpg', 'Product Marketing', 1),
(42, 53, 'Snacks and Namkeen', '../images/namkeen-125x125.jpg', 'Product Marketing', 1),
(43, 53, 'Fresh, Dried & Preserved Vegetables', '../images/101_fruits-and-vegetables-125x125.jpg', 'Product Marketing', 1),
(44, 53, 'Essential & Aromatic Oils', '../images/411_essential__and_aromatic_oils-125x125.jpg', 'Product Marketing', 1),
(45, 53, 'Meat & Poultry Food', '../images/9_meat-and-poultry-food-125x125.jpg', 'Product Marketing', 1),
(46, 52, 'Paints, Wall Putty & Varnishes', '../images/202_paints-powder-and-varnishes-125x125.jpg', 'Product Marketing', 1),
(47, 52, 'Bricks Concrete & Building Materials', '../images/643_mortar-_brick_and_grouts-125x125.jpg', 'Product Marketing', 1),
(48, 52, 'Doors and Windows', '../images/646_doors-_windows_and_frameworks-125x125.jpg', 'Product Marketing', 1),
(49, 56, 'Flavours & Aromatics', '../images/3_flavours-and-aromatics-125x125.jpg', 'Product Marketing', 1),
(50, 56, 'Industrial Chemicals & Supplies', '../images/132_industrial-chemicals-and-supplies-125x125.jpg', 'Product Marketing', 1),
(51, 56, 'Organic & Inorganic Solvents', '../images/226-organic-and-inorganic-solvents-125x125.jpg', 'Product Marketing', 1),
(52, 57, 'Handheld Calculator', '../images/handheld-calculator-125x125.jpg', 'Product Marketing', 1),
(53, 57, 'Office Stationery', '../images/office-stationery-125x125.jpg', 'Product Marketing', 1),
(54, 57, 'Pen Stand', '../images/pen-stand-125x125.jpg', 'Product Marketing', 1),
(55, 57, 'Pocket Calendar', '../images/pocket-calendar-125x125.jpg', 'Product Marketing', 1),
(56, 58, 'Online Education & Coaching Services', '../images/302_online_education_and_coaching_services-125x125.jpg', 'Service Provider', 1),
(57, 58, 'Computer IT& Software Training', '../images/267_computer-it-and-software-training-125x125.jpg', 'Institute', 1),
(58, 58, 'Web Development & Marketing Services', '../images/688_web_development_and_marketing_services-125x125.jpg', 'Service Provider', 1),
(59, 58, 'Computer & Mobile Apps Development', '../images/software-development-services-125x125.jpg', 'Service Provider', 1),
(60, 58, 'Computer Hardware & Peripherals', '../images/56_computer-hardware-and-system-125x125.jpg', 'Product Marketing', 1),
(61, 59, 'Culture & Religion Related Books', '../images/43_culture-and-religion-related-books-125x125.jpg', 'Product Marketing', 1),
(62, 59, 'Short Term Diploma & Course Provider', '../images/384_short_term_diploma_and_course_provider-125x125.jpg', 'Institute', 1),
(63, 59, 'Pen Pencil & Writing Supplies', '../images/516_pen-_pencil_and_writing_supplies-125x125.jpg', 'Product Marketing', 1),
(64, 59, 'Graduation & High Education Programs', '../images/670_graduation_and_high_education_programs-125x125.jpg', 'Service Provider', 1),
(65, 59, 'Vocational Eucation & Training', '../images/686_vocational_education_and_training-125x125.jpg', 'Institute', 1),
(66, 60, 'Clocks and Watches', '../images/248_clocks-and-watches-125x125.jpg', 'Product Marketing', 1),
(67, 60, 'Fashion & leather Belts', '../images/612_fashion_and_leather_belts-125x125.jpg', 'Product Marketing', 1),
(68, 60, 'Hats, Caps & Headwears', '../images/615_hats_and_caps-125x125.jpg', 'Product Marketing', 1),
(69, 60, 'Men, Women & Kids Footwear', '../images/145_men-women-and-kids-footwear-125x125.jpg', 'Product Marketing', 1),
(70, 61, 'Team Sports Goods & Supplies', '../images/533_team_sports_goods_and_supplies-125x125.jpg', 'Product Marketing', 1),
(71, 61, 'Puzzles, Board & Education Games', '../images/794-board-games-puzzles-and-educational-games-125x125.jpg', 'Product Marketing', 1),
(72, 61, 'Table Sports & Board Games', '../images/531_table_sports_and_board_games-125x125.jpg', 'Product Marketing', 1),
(73, 61, 'Sports Wear, Apparel & Clothings', '../images/22_sports-apparel-and-clothings-125x125.jpg', 'Product Marketing', 1),
(74, 62, 'Cargo & Shipping', '../images/315_cargo_and_shipping-125x125.jpg', 'Service Provider', 1),
(75, 62, 'Packers & Movers', '../images/334_packers_and_movers-125x125.jpg', 'Service Provider', 1),
(76, 62, 'Protective Packaging Materials', '../images/550_protective_wrap_and_packing_materials-125x125.jpg', 'Product Marketing', 1),
(77, 62, 'Warehouses & Warehousing Agents', '../images/344_warehouses_and_warehousing_agents-125x125.jpg', 'Service Provider', 1),
(78, 54, 'Anti infective Drugs & Medicines', '../images/571_anti_infective_drugs_and_medicines-125x125.jpg', 'Product Marketing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey`
--

CREATE TABLE `tbl_survey` (
  `survey_id` int(11) NOT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `survey_title` varchar(200) NOT NULL,
  `survey_start_date` date NOT NULL,
  `survey_end_date` date NOT NULL,
  `display_result` varchar(500) NOT NULL,
  `display_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_survey`
--

INSERT INTO `tbl_survey` (`survey_id`, `dealer_id`, `survey_title`, `survey_start_date`, `survey_end_date`, `display_result`, `display_status`) VALUES
(15, 5, 'Survey1', '2016-12-17', '2016-12-27', '0', 1),
(14, 7, 'Survey1 Neww1111111111111', '2016-12-17', '2016-12-22', '0', 1),
(16, 5, 'S1', '2017-03-23', '2017-03-30', '0', 1),
(17, 11, 'Next Program?', '2017-05-19', '2017-05-26', '0', 1),
(18, 22, 'Fav. Mobile Product?', '2017-05-20', '0000-00-00', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_survey_answer`
--

CREATE TABLE `tbl_survey_answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `dealer_id` int(11) DEFAULT NULL,
  `answer` varchar(5000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_survey_answer`
--

INSERT INTO `tbl_survey_answer` (`answer_id`, `question_id`, `user_id`, `dealer_id`, `answer`) VALUES
(10, 9, 1, 7, 'AA1aaaa'),
(11, 10, 1, 5, 'd'),
(13, 3, 1, 5, 'Ans 3aaa'),
(14, 0, 1, 7, ''),
(15, 10, 2, 5, 'd'),
(16, 11, 6, 11, 'Food Distribution');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_first_name` varchar(25) NOT NULL,
  `user_last_name` varchar(25) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `user_mobile_no` varchar(13) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `pin_code` varchar(10) NOT NULL,
  `user_address` varchar(200) DEFAULT NULL,
  `user_photo` varchar(500) DEFAULT NULL,
  `user_status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_mobile_no`, `city_id`, `pin_code`, `user_address`, `user_photo`, `user_status`) VALUES
(6, 'Sahil', 'Piludiya', 'sahilpiludiya@gmail.com', 'sahil123', '9999991111', 62, '360002', 'Nrayan Nagar,\r\nNear Dhebar Colony,\r\nRajkot.', 'images/IMG_20160507_09516 (3)-picsay.jpg', 1),
(7, 'Aman', 'Zala', 'amanzala@gmail.com', 'aman123', '5562626262', 64, '379044', 'SG Homes,\r\nNear Mahatma Gandhi Road,\r\nSurat.', 'images/IMG10062.jpg', 1),
(8, 'Sabir', 'Piludiya', 'sabir123@gmail.com', '1111', '55555', 62, '361', 'Rajkot', 'images/4O11-KarbonnA1Wh_L1_14-05-12.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_current_plan`
--
ALTER TABLE `tbl_current_plan`
  ADD PRIMARY KEY (`current_plan_id`);

--
-- Indexes for table `tbl_dealer`
--
ALTER TABLE `tbl_dealer`
  ADD PRIMARY KEY (`dealer_id`);

--
-- Indexes for table `tbl_donation_info`
--
ALTER TABLE `tbl_donation_info`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `tbl_donor_info`
--
ALTER TABLE `tbl_donor_info`
  ADD PRIMARY KEY (`donor_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_follow_block`
--
ALTER TABLE `tbl_follow_block`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `tbl_institute_facility`
--
ALTER TABLE `tbl_institute_facility`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `tbl_survey_answer`
--
ALTER TABLE `tbl_survey_answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_current_plan`
--
ALTER TABLE `tbl_current_plan`
  MODIFY `current_plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_dealer`
--
ALTER TABLE `tbl_dealer`
  MODIFY `dealer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_donation_info`
--
ALTER TABLE `tbl_donation_info`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_donor_info`
--
ALTER TABLE `tbl_donor_info`
  MODIFY `donor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_follow_block`
--
ALTER TABLE `tbl_follow_block`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbl_institute_facility`
--
ALTER TABLE `tbl_institute_facility`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_plan`
--
ALTER TABLE `tbl_plan`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3248;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_survey`
--
ALTER TABLE `tbl_survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_survey_answer`
--
ALTER TABLE `tbl_survey_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
