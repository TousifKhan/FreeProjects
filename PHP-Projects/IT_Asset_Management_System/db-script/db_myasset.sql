
--
-- Database: `db_myasset`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignments`
--

CREATE TABLE IF NOT EXISTS `tbl_assignments` (
  `id` int(10) NOT NULL auto_increment,
  `entity` int(10) NOT NULL,
  `type` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `doa` date NOT NULL,
  `doe` date NOT NULL,
  `bdate` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_assignments`
--

INSERT INTO `tbl_assignments` (`id`, `entity`, `type`, `qty`, `uid`, `doa`, `doe`, `bdate`) VALUES
(1, 1, 2, 1, 1, '0000-00-00', '0000-00-00', '2011-11-26'),
(2, 2, 3, 1, 5, '2011-11-19', '2011-11-25', '2011-11-29'),
(3, 2, 2, 2, 5, '2011-12-15', '2011-12-31', '2011-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `cid` int(10) NOT NULL auto_increment,
  `cname` varchar(40) NOT NULL,
  `ctype` varchar(10) NOT NULL,
  `cdesc` varchar(200) NOT NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`cid`, `cname`, `ctype`, `cdesc`) VALUES
(2, 'Hardware', 'printer', 'printer for all department'),
(3, 'Hardware', 'Monitor', 'Flat 21 inch monitor for infotech lab'),
(4, 'Software', 'Anti virus', 'Anti virus from Quick Heal Softwares, India'),
(5, 'Hardware', 'Keyboard', 'Keyboard from Asus C.'),
(6, 'Software', 'Office Too', 'Softwares used in office'),
(7, 'Hardware', 'Optical Mo', 'Optical Mouse for Ease');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_depts`
--

CREATE TABLE IF NOT EXISTS `tbl_depts` (
  `id` int(10) NOT NULL auto_increment,
  `lname` varchar(100) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `building` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_depts`
--

INSERT INTO `tbl_depts` (`id`, `lname`, `room_name`, `floor`, `building`) VALUES
(1, 'Sr. Wilson Lab', '12-c', '3 Floor', 'CS Building'),
(2, 'John Muller LAB', 'Wing-B,12D', '2nd Floor', 'Info.Tech Building'),
(4, 'Sir Kelly Lab', '23d', '4th Floor', 'New Science Building');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hardwares`
--

CREATE TABLE IF NOT EXISTS `tbl_hardwares` (
  `id` int(10) NOT NULL auto_increment,
  `hw_name` varchar(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `avbl_qty` int(11) NOT NULL,
  `vid` int(10) NOT NULL,
  `dop` date NOT NULL,
  `price` double NOT NULL,
  `cid` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_hardwares`
--

INSERT INTO `tbl_hardwares` (`id`, `hw_name`, `qty`, `avbl_qty`, `vid`, `dop`, `price`, `cid`) VALUES
(2, 'Lazer Jet', 10, 6, 13, '2011-11-22', 2200, 2),
(4, 'X2 Optical', 20, 0, 14, '2011-11-26', 10, 7),
(5, '9X Series', 4, 4, 12, '2011-09-13', 2200, 2),
(6, 'Super Jet', 20, 20, 13, '2011-11-22', 3400, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_softwares`
--

CREATE TABLE IF NOT EXISTS `tbl_softwares` (
  `id` int(10) NOT NULL auto_increment,
  `sw_name` varchar(100) NOT NULL,
  `serial` varchar(100) NOT NULL,
  `vid` int(10) NOT NULL,
  `dop` date NOT NULL,
  `price` double NOT NULL,
  `exp_date` date NOT NULL,
  `cid` int(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_softwares`
--

INSERT INTO `tbl_softwares` (`id`, `sw_name`, `serial`, `vid`, `dop`, `price`, `exp_date`, `cid`) VALUES
(3, 'Office 2007', '2xde5-se43e-23456-chdyrt-34dnh', 14, '2011-11-22', 1200, '2012-11-22', 6),
(2, 'Visio', '2xde5-se43e-23456-chdyrt-34dnh', 14, '2011-11-22', 456, '2012-11-22', 6),
(4, 'Photo Editor', '2xde5-se43e-23456-chdyrt-34dnh', 13, '2011-11-16', 240, '2013-05-17', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `uid` int(10) NOT NULL auto_increment,
  `uname` varchar(40) NOT NULL,
  `pwd` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `bdate` varchar(50) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `did` int(10) NOT NULL,
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`uid`, `uname`, `pwd`, `email`, `fname`, `lname`, `bdate`, `utype`, `did`) VALUES
(1, 'admin', 'admin123', 'admin@asset-mgmt.com', 'Admin', 'Super', '2011-11-16 22:42:56', 'ADMIN', 1),
(4, 'john', 'john123', 'john@asset-mgmt.com', 'John', 'Mannings', '2011-11-16 23:50:37', 'USER', 1),
(5, 'asif', 'asif123', 'asfi@gmail.com', 'asif', 'Khan', '2011-11-17 22:45:15', 'USER', 2),
(6, 'kapil', 'kapil', 'kapil@gmail.com', 'Kapil', 'Sharma', '2011-11-19 23:42:10', 'USER', 2),
(8, 'yazdani', 'yaz123', 'yazdani@gmail.com', 'XYZ', 'yazdani', '2011-11-21 23:50:52', 'USER', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vendors`
--

CREATE TABLE IF NOT EXISTS `tbl_vendors` (
  `id` int(10) NOT NULL auto_increment,
  `vname` varchar(100) NOT NULL,
  `cno` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `thumb` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_vendors`
--

INSERT INTO `tbl_vendors` (`id`, `vname`, `cno`, `address`, `email`, `website`, `thumb`) VALUES
(12, 'Dell Inc.', '012-2256325', 'Dell Inc.\r\nOne Dell Way\r\nRound Rock, Texas 78682\r\nUnited States', 'support@dell.com', 'www.dell.com', '2ee850ea26a50a1b8231eaa7e92994ea.jpg'),
(13, 'HP', '1820-299-1222', '22, Santa Barbara Hills, \r\nFoster City,\r\nUS', 'support@hp.com', 'www.hp.com', '8891dc7acdb952bc7d69f75aaa2f7b6d.jpg'),
(14, 'Microsoft Inc.', '012-2256325', 'Some address', 'contact@microsoft.com', 'www.microsoft.com', '47920ab81db612850a5bc3d258998160.jpg');
