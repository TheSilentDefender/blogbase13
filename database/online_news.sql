-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 10:37 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `admin_login_id` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_login_id`, `admin_password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pic` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `pic`, `status`) VALUES
(1, 'occasiondfdf', '1.jpg', 'active'),
(2, 'wedding', '2.jpg', 'active'),
(3, 'anniversary,', '3.jpg', 'active'),
(4, 'birthday', '4.jpg', 'active'),
(5, 'baby shower', '5.jpg', 'active'),
(6, 'vegetarian cake.', '6.jpg', 'active'),
(7, 'Educationss', '7.jpg', 'active'),
(8, 'sdxg', '8.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `user_id`, `news_id`, `message`, `comment_date`) VALUES
(3, 1, 2, '<b><u>aaaaaaaaaaaaaaaa</u></b>', '2017-04-12'),
(4, 13, 2, 'fsf', '2017-04-13'),
(6, 13, 6, 'xvdfbfdnh', '2017-04-13'),
(11, 13, 1, 'egregreh', '2017-04-13'),
(13, 0, 1, 'php', '2017-04-13'),
(20, 13, 1, 'php', '2017-04-13'),
(21, 13, 1, 'html', '2017-04-13'),
(23, 13, 1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...Ut auc', '2017-04-13'),
(24, 13, 3, 'dfd', '2017-04-13'),
(30, 13, 3, 'good', '2017-04-13'),
(33, 13, 6, 'dfsfdxfg', '2017-04-13'),
(34, 13, 3, 'gfgjf', '2017-04-13'),
(35, 13, 6, 'good', '2017-04-14'),
(36, 13, 6, 'dgfchgvh', '2017-04-14'),
(38, 13, 3, 'bjn,kk', '2017-04-14'),
(39, 13, 3, 'hello', '2017-04-14'),
(40, 13, 6, 'good', '2017-04-14'),
(44, 13, 3, 'abcdef', '2017-04-14'),
(45, 13, 3, 'ttutuu', '2017-04-14'),
(46, 13, 6, 'fgfhgjh', '2017-04-14'),
(47, 13, 3, 'gooj', '2017-04-14'),
(48, 13, 6, 'vhjgvm', '2017-04-14'),
(49, 13, 3, 'fgrhr', '2017-04-15'),
(50, 13, 5, 'hello', '2017-04-15'),
(51, 13, 5, 'fdfe', '2017-04-15'),
(52, 13, 6, 'hello', '2017-04-16'),
(53, 13, 6, 'dvfd', '2017-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `Description` text NOT NULL,
  `enquiry_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `Description`, `enquiry_date`) VALUES
(17, 'apex', 'apex@gmail.com', 9898989, 'djf', 'dljfl', '2017-04-02'),
(18, 'sanjeev', 'sanjeev@gmail.com', 9015501897, 'dkjfl', 'dlfjdkl', '2017-04-02'),
(19, 'test', 'test@gmail.com', 9015501897, 'test', 'Hello Test\r\n', '2017-04-07'),
(20, 'test', 'test@gmail.com', 9015501897, 'test', 'Hello Test\r\n', '2017-04-07'),
(21, 'test', 'test@gmail.com', 9015501897, 'test', 'Hello Test\r\n', '2017-04-07'),
(22, 'apex', 'apex@gmail.com', 9015501897, 'dfj', 'dfdf', '2017-04-07'),
(23, 'df', 'abhi@gmail.com', 9015501897, 'df', 'fd', '2017-04-07'),
(24, 'df', 'abhi@gmail.com', 9015501897, 'df', 'fd', '2017-04-07');

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `mail_id` int(11) NOT NULL,
  `mail_host` varchar(255) NOT NULL,
  `mail_username` varchar(100) NOT NULL,
  `mail_password` varchar(100) NOT NULL,
  `mail_ssl` varchar(10) NOT NULL,
  `mail_port` varchar(10) NOT NULL,
  `mail_from` varchar(50) NOT NULL,
  `mail_from_name` varchar(30) NOT NULL,
  `mail_reply_to` varchar(30) NOT NULL,
  `mail_reply_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_settings`
--

INSERT INTO `mail_settings` (`mail_id`, `mail_host`, `mail_username`, `mail_password`, `mail_ssl`, `mail_port`, `mail_from`, `mail_from_name`, `mail_reply_to`, `mail_reply_name`) VALUES
(1, 'smtp.gmail.com', 'allcakeshop83@gmail.com', 'cakeshop', 'tls', '587', 'allcakeshop83@gmail.com', 'Cakeshop', 'allcakeshop83@gmail.com', 'Cakeshop');

-- --------------------------------------------------------

--
-- Table structure for table `mainbanner`
--

CREATE TABLE `mainbanner` (
  `id` int(100) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `h2` varchar(255) NOT NULL,
  `h3` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainbanner`
--

INSERT INTO `mainbanner` (`id`, `h1`, `h2`, `h3`, `date`, `img`) VALUES
(3, 'dfkj', 'df', 'kfdd', '2017-03-26 12:42:15', 'images.jpg'),
(4, 'jldjf', 'dflkfjkl', 'fjdlfkj', '2017-03-26 14:38:28', 'images.jpg'),
(5, 'dlfl', 'ldfjl', 'ljdljf', '2017-03-29 11:20:50', 'images.jpg'),
(6, 'Test', 'test22', 'Test33', '2017-03-29 11:39:35', 'images.jpg'),
(7, 'ldkjf', 'jfdlfj', 'lkdfjk', '2017-03-29 11:45:11', 'images.jpg'),
(8, 'IPL 2017', 'sdcedfc', 'cedcfe', '2017-04-11 07:06:59', 'images.jpg'),
(9, 'IPL 2017', 'ENTERTAINMENT', 'EDUCATION', '2017-04-11 07:37:29', 'images.jpg'),
(10, 'dss', 'ffef', 'ffefef', '2017-04-15 08:57:07', 'images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `pic1` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category`, `subcategory`, `product_name`, `description`, `pic1`, `pic2`, `status`, `date`) VALUES
(1, '7', '2', 'df', '					  dfdfdfd<span class="Apple-tab-span" style="white-space:pre">	</span> \r\n					  ', '', '', 'active', '0000-00-00'),
(2, '7', '5', 'aaaaaa', '					  					  <b>Hello Educations<span class="Apple-tab-span" style="white-space:pre">	</span></b>', '1.jpg', 'Penguins6.jpg', 'active', '2017-04-08'),
(3, '7', '5', 'Hello PHP', '<b><u>Hello pPHP</u></b>Lorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...Ut auctor velit sed consectetur rhoncus. Nunc dictum facilisis felis nec facilisis. Integer nec justo vitae orci cursus fermentum. Fusce semper, mi non tempus congue, velit leo efficitur quam, laoreet venenatis libero felis et lacus. Pellentesque mattis hendrerit nisi gravida hendrerit. Mauris sagittis tincidunt scelerisque. Vivamus lectus erat, dictum et magna quis, iaculis finibus nisl. Aliquam quis ante odio. Etiam tincidunt tellus tristique turpis tincidunt, eget condimentum urna rutrum. Donec maximus consequat dolor, sit amet condimentum ipsum gravida ac. Etiam posuere tellus mauris, et dignissim nisl rutrum quis. Mauris tincidunt ante sed velit maximus, vel tincidunt leo imperdiet. Morbi nec lacus et metus semper porttitor. Sed pellentesque ex at pellentesque scelerisque. Aliquam placerat gravida tortor, in fermentum ante commodo quis. Etiam vehicula elementum quam. Aliquam eu augue eu lacus dignissim efficitur. Proin ex metus, ornare placerat nisi at, porta lobortis turpis. Praesent euismod nec nulla ultrices maximus. Vivamus imperdiet quam ac lobortis cursus. Nam dapibus ullamcorper magna vehicula aliquam. Vivamus hendrerit molestie neque. Ut interdum diam a purus ultrices facilisis. Suspendisse molestie tempor dolor, sed tristique enim sagittis vitae. Integer eu dignissim lectus, commodo efficitur metus. Morbi quis justo finibus, interdum sem quis, imperdiet tellus. Curabitur blandit vel magna nec elementum. Vivamus tempor, urna pharetra euismod euismod, elit elit tincidunt sem, ut consectetur arcu massa non diam. Etiam scelerisque nisi magna. Nulla facilisi. Sed pharetra nunc lectus, in maximus dolor ornare sit amet.', '1.jpg', 'Tulips.jpg', 'active', '2017-04-08'),
(4, '7', '6', 'Hello PHP', 'ldjflk<span class="Apple-tab-span" style="white-space:pre">	</span><div><br></div>', '1.jpg', 'Hydrangeas.jpg', 'active', '2017-04-08'),
(5, '7', '6', 'dfjldjlf', 'ldfjldfjl<span class="Apple-tab-span" style="white-space:pre">	</span><div><br></div>', 'Penguins6.jpg', 'Tulips6.jpg', 'active', '2017-04-08'),
(6, '7', '6', 'kdjflj', 'ldjfljk<span class="Apple-tab-span" style="white-space:pre">	</span>lLorem ipsum dolor sit amet, consectetur adipisicing elit...Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...Ut auctor velit sed consectetur rhoncus. Nunc dictum facilisis felis nec facilisis. Integer nec justo vitae orci cursus fermentum. Fusce semper, mi non tempus congue, velit leo efficitur quam, laoreet venenatis libero felis et lacus. Pellentesque mattis hendrerit nisi gravida hendrerit. Mauris sagittis tincidunt scelerisque. Vivamus lectus erat, dictum et magna quis, iaculis finibus nisl. Aliquam quis ante odio. Etiam tincidunt tellus tristique turpis tincidunt, eget condimentum urna rutrum. Donec maximus consequat dolor, sit amet condimentum ipsum gravida ac. Etiam posuere tellus mauris, et dignissim nisl rutrum quis. Mauris tincidunt ante sed velit maximus, vel tincidunt leo imperdiet. Morbi nec lacus et metus semper porttitor. Sed pellentesque ex at pellentesque scelerisque. Aliquam placerat gravida tortor, in fermentum ante commodo quis. Etiam vehicula elementum quam. Aliquam eu augue eu lacus dignissim efficitur. Proin ex metus, ornare placerat nisi at, porta lobortis turpis. Praesent euismod nec nulla ultrices maximus. Vivamus imperdiet quam ac lobortis cursus. Nam dapibus ullamcorper magna vehicula aliquam. Vivamus hendrerit molestie neque. Ut interdum diam a purus ultrices facilisis. Suspendisse molestie tempor dolor, sed tristique enim sagittis vitae. Integer eu dignissim lectus, commodo efficitur metus. Morbi quis justo finibus, interdum sem quis, imperdiet tellus. Curabitur blandit vel magna nec elementum. Vivamus tempor, urna pharetra euismod euismod, elit elit tincidunt sem, ut consectetur arcu massa non diam. Etiam scelerisque nisi magna. Nulla facilisi. Sed pharetra nunc lectus, in maximus dolor ornare sit amet.', 'Penguins.jpg', 'Tulips.jpg', 'active', '2017-04-08');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `area` varchar(500) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `post` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm` varchar(255) NOT NULL,
  `new_letter` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `email`, `mobile`, `address`, `area`, `city`, `state`, `country`, `post`, `password`, `confirm`, `new_letter`, `date`, `status`) VALUES
(1, 'sanjeev', 'kumar', 'sanjeevtech2@gmail.com', '9015501897', '', '', '', '', '', '', 'sanjeev', 'sanjeev', '', '0000-00-00', 'inactive'),
(2, 'admin', '', 'admin@gmail.com', '9015501897', '', '', '', '', '', '', 'sanj', 'sanj', '', '0000-00-00', 'inactive'),
(3, 'test', '', 'test@gmail.com', '9015501897', '', '', '', '', '', '', 'test', 'test', '', '0000-00-00', 'inactive'),
(4, 'apex', '', 'apex@gmail.com', '9898989', '', '', '', '', '', '', 'apex', 'apex', '', '0000-00-00', 'inactive'),
(5, 'paurush ankit', '', 'paurush.ankit@gmail.com', '7531855396', '', '', '', '', '', '', '21feb1993', '21feb1993', '', '0000-00-00', 'inactive'),
(6, 'paurush ankit', '', 'paurush.ankit@gmail.com', '7531855396', '', '', '', '', '', '', '21feb1993', '21feb1993', '', '0000-00-00', 'inactive'),
(7, 'paurush ankit', '', 'paurush.ankit@gmail.com', '7531855396', '', '', '', '', '', '', '21feb1993', '21feb1993', '', '0000-00-00', 'inactive'),
(8, 'paurush ankit', '', 'paurush.ankit@gmail.com', '7531855396', '', '', '', '', '', '', '21feb1993', '21feb1993', '', '0000-00-00', 'inactive'),
(9, 'paurush ankit', '', 'paurush.ankit@gmail.com', '7531855396', '', '', '', '', '', '', '21feb1993', '21feb1993', '', '0000-00-00', 'inactive'),
(10, 'apex', '', 'apex@gmail.com', '999999999', '', '', '', '', '', '', 'apex', 'apex', '', '0000-00-00', 'inactive'),
(11, 'sanjeev', '', 'sanjeevtech22@gmail.com', '9015501897', '', '', '', '', '', '', '12345', '12345', '', '0000-00-00', 'inactive'),
(12, 'sanjeev', '', 'sanjeevtech222@gmail.com', '9015501897', '', '', '', '', '', '', '12345', '12345', '', '0000-00-00', 'inactive'),
(13, 'Monika', 'Singh', 'singh.monika@gmail.com', '9876567843', 'ffcjhgvhgkj', 'australia', 'usa', 'canada', 'australia', 'fvvkjhkjh', 'monika', 'monika', 'fvvkjhkjh', '2017-04-11', 'inactive'),
(14, '', '', '', '', '', 'australia', 'australia', 'australia', 'australia', '', '', '', '', '2017-04-12', 'inactive'),
(15, 'Neha', 'singh', 'neha.singh@gmail.com', '944565565', 'vgh vhvmnbmj', 'usa', 'canada', 'canada', 'australia', 'vghjgvbkjhbkihk', 'neha', 'neha', 'vghjgvbkjhbkihk', '2017-04-12', 'inactive'),
(16, 'Ansgu', 'Shrivastava', 'anshu@gmail.com', '895679899', 'hjbujbjb', 'canada', 'canada', 'australia', 'australia', 'nkjnlknlnll', 'anshu', 'anshu', 'nkjnlknlnll', '2017-04-12', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(500) NOT NULL DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `category`, `subcategory`, `date`, `status`) VALUES
(3, '1', 'dfdfd', '2017-04-08 20:09:41', 'active'),
(5, '7', 'PHP', '2017-04-08 20:58:51', 'active'),
(6, '7', 'php', '2017-04-08 21:00:39', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `description` varchar(300) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `subject`, `video`, `description`, `status`, `date`) VALUES
(1, 'occasiondfdf', 'abc.mp4', 'Lorem ipsumndrerit molestie neque. Ut interdum diam a purus ultrices facilisis. Suspendisse molestie tempor dolor, sed tristique enim sagittis vitae. Integer eu dignissim lectus, commodo efficitur metLorem ipsumndrerit molestie neque. Ut interdum diam a purus ultrices facilisis. Suspendisse molestie', 'active', '2017-04-01'),
(2, 'wedding', 'mov_bbb.mp4', 'Lorem ipsumndrerit molestie neque. Ut interdum diam a purus ultrices facilisis. Suspendisse molestie tempor dolor, sed tristique enim sagittis vitae. Integer eu dignissim lectus, commodo efficitur met', 'active', '0000-00-00'),
(3, 'anniversary,', 'Wildlife.wmv', 'Lorem ipsumndrerit molestie neque. Ut interdum diam a purus ultrices facilisis. Suspendisse molestie tempor dolor, sed tristique enim sagittis vitae. Integer eu dignissim lectus, commodo efficitur met', 'active', '0000-00-00'),
(4, 'birthday', 'Wildlife.wmv', 'Lorem ipsumndrerit molestie neque. Ut interdum diam a purus ultrices facilisis. Suspendisse molestie tempor dolor, sed tristique enim sagittis vitae. Integer eu dignissim lectus, commodo efficitur met', 'active', '0000-00-00'),
(5, 'baby shower', 'mov_bbb.mp4', 'Lorem ipsumndrerit molestie neque. Ut interdum diam a purus ultrices facilisis. Suspendisse molestie tempor dolor, sed tristique enim sagittis vitae. Integer eu dignissim lectus, commodo efficitur met', 'inactive', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `mainbanner`
--
ALTER TABLE `mainbanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mainbanner`
--
ALTER TABLE `mainbanner`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
