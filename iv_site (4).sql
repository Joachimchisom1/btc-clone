-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 21, 2022 at 10:43 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iv_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `mail` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `mail`, `password`) VALUES
(1, 'prince', '123');

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `id` int(11) NOT NULL,
  `fullname` varchar(11111) DEFAULT NULL,
  `date` varchar(11111) DEFAULT NULL,
  `last_seen` varchar(500) DEFAULT NULL,
  `last_seen_anouncement` varchar(1111) DEFAULT NULL,
  `deposit_w` varchar(1000) DEFAULT '0',
  `interest_w` varchar(5000) DEFAULT '0',
  `total_invest` varchar(500) DEFAULT '0',
  `total_deposit` varchar(500) DEFAULT '0',
  `total_w` varchar(200) DEFAULT '0',
  `referral_e` varchar(500) DEFAULT '0',
  `username` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `address` varchar(500) NOT NULL DEFAULT '',
  `country` varchar(500) NOT NULL DEFAULT '',
  `img` text,
  `referrel_url` varchar(11111) DEFAULT NULL,
  `referred_by` varchar(11111) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `acct_num` varchar(500) DEFAULT NULL,
  `acct_name` varchar(500) DEFAULT NULL,
  `phone` varchar(500) DEFAULT '',
  `rmt_pin` varchar(500) DEFAULT NULL,
  `bank_occp` varchar(500) DEFAULT NULL,
  `btc_add` varchar(500) DEFAULT NULL,
  `2fa_switch` int(11) NOT NULL DEFAULT '0',
  `google_auth_code` varchar(500) DEFAULT NULL,
  `address_type` varchar(500) DEFAULT NULL,
  `wallet_address` varchar(500) NOT NULL,
  `kyc_file` text,
  `kyc_typ` varchar(500) NOT NULL DEFAULT '',
  `kyc_status` varchar(500) NOT NULL DEFAULT '',
  `w_code` varchar(1000) NOT NULL DEFAULT '',
  `ref_key` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `investors`
--

INSERT INTO `investors` (`id`, `fullname`, `date`, `last_seen`, `last_seen_anouncement`, `deposit_w`, `interest_w`, `total_invest`, `total_deposit`, `total_w`, `referral_e`, `username`, `password`, `email`, `address`, `country`, `img`, `referrel_url`, `referred_by`, `token`, `acct_num`, `acct_name`, `phone`, `rmt_pin`, `bank_occp`, `btc_add`, `2fa_switch`, `google_auth_code`, `address_type`, `wallet_address`, `kyc_file`, `kyc_typ`, `kyc_status`, `w_code`, `ref_key`) VALUES
(110, 'Edwin clark', 'May 16th, 2022 12:00:00 AM', 'September 21st, 2022 18:25:12', '2 Hour/s ago', '75100', '277.0000000001164', '57170', '57370', '0', '75100', 'prince2', '12345678', 'ufoeze72@gmail.com', '', 'Pakistan', 'WhatsApp Image 2022-09-01 at 10.01.47 AM.png', 'https://MERITERSPARTNERSLTD.com/?ref=prince2', '5555', NULL, NULL, NULL, '06158135184', NULL, NULL, NULL, 1, 'XVGUIWATIJFKVPYS', 'Propy', '36 Gods own estate', NULL, 'National ID', 'notConfirmed', '', '1'),
(112, 'Edwin', 'May 23rd, 2022', 'July 12th, 2022 16:27:11', '4 Day/s ago', '522221722', '698400', '2052500', '2052000', '0', '0', 'Prince35', '12345678', 'ufoezeprince@gmail.com', '', 'Pakistan', '1627649799658.jpg', 'https://MERITERSPARTNERSLTD.com/?ref=Prince35', 'Prince2', NULL, NULL, NULL, '8060926482', NULL, NULL, NULL, 0, 'XVGUIGD2NCVBRHZW', 'USDT', '36 God\'s own estate', NULL, '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `latest_deposit`
--

CREATE TABLE `latest_deposit` (
  `id` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL DEFAULT '',
  `user_name` varchar(500) NOT NULL DEFAULT '',
  `user_img` text,
  `date` date DEFAULT NULL,
  `amount` varchar(500) NOT NULL DEFAULT '',
  `type_of_user` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_deposit`
--

INSERT INTO `latest_deposit` (`id`, `user_id`, `user_name`, `user_img`, `date`, `amount`, `type_of_user`) VALUES
(1, 'none', 'Jabulani', '1627649799548.jpg', '2022-07-13', '7000', 'dummy'),
(2, 'none', 'Ladykaya', '1627649799466.jpg', NULL, '3000', 'dummy'),
(3, 'none', 'ThomasOkeyson', '1625946227393.jpg', NULL, '2500', 'dummy'),
(4, 'none', 'ladyLerato', '1627649799524.jpg', NULL, '1000', 'dummy'),
(5, 'none', 'Anderson', '1627649799493.jpg', NULL, '2000', 'dummy'),
(6, 'none', 'Elnaz', '289034675_136133105736347_1566589900662163028_n.jpg', NULL, '1500', 'dummy'),
(7, 'none', 'Dalileh', '292541717_105452382234261_5880327862414740195_n.jpg', NULL, '800', 'dummy'),
(8, 'none', 'Charlotte', '286420783_1364776937365032_4108792657438020363_n.jpg', NULL, '1000', 'dummy'),
(9, 'none', 'Harper', '91397518_100821791574938_2519813740119982080_n.jpg', NULL, '4000', 'dummy'),
(10, 'none', 'Sebastian', '249965009_10158549666635914_5024599933021690081_n.jpg', NULL, '500', 'dummy'),
(11, 'none', 'Oliver', '271248472_3050254695242269_51835289375114788_n.jpg', NULL, '300', 'dummy'),
(12, 'none', 'Hestia', '292230030_168491245673912_5875297522008850119_n.jpg', NULL, '200', 'dummy'),
(13, 'none', 'Gasperina', '169156030_10225587004325839_3442160595506555164_n.jpg', NULL, '100', 'dummy'),
(14, 'none', 'Scarlett', '217872507_1762966520541702_4135341518853658156_n.jpg', NULL, '850', 'dummy'),
(21, 'none', 'Augusto', '18517927_1928481157434370_7671642799452302382_o.jpg', NULL, '300', 'dummy'),
(26, 'none', 'Xiang', '133733099_105864964779638_2123412350291006616_n.jpg', NULL, '1400', 'dummy'),
(27, 'none', 'Jackson Wú', '120193364_344442370096041_6327134553015096537_n.jpg', NULL, '500', 'dummy'),
(28, 'none', 'Yáng', '133737875_10159380837987189_45385069720516203_n.jpg', NULL, '600', 'dummy'),
(29, 'none', 'Chén', '278824650_10225208613536312_7336143924490294391_n.jpg', NULL, '1200', 'dummy'),
(30, 'none', 'Amand', '287944452_10158906751666938_8214304611364677987_n.jpg', NULL, '1025', 'dummy'),
(31, 'none', 'Christopherlen', '67137177_10213844581978505_8670887763387613184_n.jpg', NULL, '900', 'dummy'),
(32, 'none', 'Daniel', '36200117_1779369525451084_1113067287591518208_n.jpg', NULL, '200', 'dummy'),
(33, 'none', 'Jackson', '86464136_1336954496489847_6298050351052357632_n.jpg', NULL, '175', 'dummy'),
(34, 'none', 'mrBrandon', '69763855_112459696793364_3100919628403048448_n.jpg', NULL, '850', 'dummy'),
(35, 'none', 'William', '284814500_8090314337649022_2617338377104178411_n.jpg', NULL, '740', 'dummy'),
(36, '112', 'Edwin', '1627649799658.jpg', '2022-07-13', '500000', 'Real'),
(37, '110', 'Edwin clark', 'logo.png', '2022-08-29', '50000', 'Real');

-- --------------------------------------------------------

--
-- Table structure for table `latest_withdrawal`
--

CREATE TABLE `latest_withdrawal` (
  `id` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL DEFAULT '',
  `user_name` varchar(500) NOT NULL DEFAULT '',
  `user_img` text,
  `date` date DEFAULT NULL,
  `amount` varchar(500) NOT NULL DEFAULT '',
  `type_of_user` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `latest_withdrawal`
--

INSERT INTO `latest_withdrawal` (`id`, `user_id`, `user_name`, `user_img`, `date`, `amount`, `type_of_user`) VALUES
(1, 'none', 'Jabulani', '1627649799548.jpg', '2022-07-13', '7000', 'dummy'),
(2, 'none', 'Ladykaya', '1627649799466.jpg', NULL, '3000', 'dummy'),
(3, 'none', 'ThomasOkeyson', '1625946227393.jpg', NULL, '2500', 'dummy'),
(4, 'none', 'ladyLerato', '1627649799524.jpg', NULL, '1000', 'dummy'),
(5, 'none', 'Anderson', '1627649799493.jpg', NULL, '2000', 'dummy'),
(6, 'none', 'Elnaz', '289034675_136133105736347_1566589900662163028_n.jpg', NULL, '1500', 'dummy'),
(7, 'none', 'Dalileh', '292541717_105452382234261_5880327862414740195_n.jpg', NULL, '800', 'dummy'),
(8, 'none', 'Charlotte', '286420783_1364776937365032_4108792657438020363_n.jpg', NULL, '1000', 'dummy'),
(9, 'none', 'Harper', '91397518_100821791574938_2519813740119982080_n.jpg', NULL, '4000', 'dummy'),
(10, 'none', 'Sebastian', '249965009_10158549666635914_5024599933021690081_n.jpg', NULL, '500', 'dummy'),
(11, 'none', 'Oliver', '271248472_3050254695242269_51835289375114788_n.jpg', NULL, '300', 'dummy'),
(12, 'none', 'Hestia', '292230030_168491245673912_5875297522008850119_n.jpg', NULL, '200', 'dummy'),
(13, 'none', 'Gasperina', '169156030_10225587004325839_3442160595506555164_n.jpg', NULL, '100', 'dummy'),
(14, 'none', 'Scarlett', '217872507_1762966520541702_4135341518853658156_n.jpg', NULL, '850', 'dummy'),
(21, 'none', 'Augusto', '18517927_1928481157434370_7671642799452302382_o.jpg', NULL, '300', 'dummy'),
(26, 'none', 'Xiang', '133733099_105864964779638_2123412350291006616_n.jpg', NULL, '1400', 'dummy'),
(27, 'none', 'Jackson Wú', '120193364_344442370096041_6327134553015096537_n.jpg', NULL, '500', 'dummy'),
(28, 'none', 'Yáng', '133737875_10159380837987189_45385069720516203_n.jpg', NULL, '600', 'dummy'),
(29, 'none', 'Chén', '278824650_10225208613536312_7336143924490294391_n.jpg', NULL, '1200', 'dummy'),
(30, 'none', 'Amand', '287944452_10158906751666938_8214304611364677987_n.jpg', NULL, '1025', 'dummy'),
(31, 'none', 'Christopherlen', '67137177_10213844581978505_8670887763387613184_n.jpg', NULL, '900', 'dummy'),
(32, 'none', 'Daniel', '36200117_1779369525451084_1113067287591518208_n.jpg', NULL, '200', 'dummy'),
(33, 'none', 'Jackson', '86464136_1336954496489847_6298050351052357632_n.jpg', NULL, '175', 'dummy'),
(34, 'none', 'mrBrandon', '69763855_112459696793364_3100919628403048448_n.jpg', NULL, '850', 'dummy'),
(35, 'none', 'William', '284814500_8090314337649022_2617338377104178411_n.jpg', NULL, '740', 'dummy'),
(36, '112', 'Edwin', '1627649799658.jpg', '2022-07-13', '100', 'Real');

-- --------------------------------------------------------

--
-- Table structure for table `mank`
--

CREATE TABLE `mank` (
  `id` int(11) NOT NULL,
  `bank_name` varchar(5000) NOT NULL DEFAULT '',
  `beneficiary_name` varchar(5000) NOT NULL DEFAULT '',
  `account_number` varchar(5000) NOT NULL DEFAULT '',
  `userid` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mank`
--

INSERT INTO `mank` (`id`, `bank_name`, `beneficiary_name`, `account_number`, `userid`) VALUES
(1, 'eco bank', 'hackton55454', 'ffjg5555', 'prince2');

-- --------------------------------------------------------

--
-- Table structure for table `proof`
--

CREATE TABLE `proof` (
  `id` int(11) NOT NULL,
  `userid` varchar(1000) DEFAULT NULL,
  `user_name` varchar(5000) DEFAULT NULL,
  `proof_img` varchar(1000) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `supposed_amount` varchar(500) DEFAULT NULL,
  `type_of_payment` varchar(500) DEFAULT NULL,
  `tran_hash` varchar(1000) NOT NULL DEFAULT '',
  `status` varchar(500) NOT NULL DEFAULT 'Pending',
  `plan` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proof`
--

INSERT INTO `proof` (`id`, `userid`, `user_name`, `proof_img`, `amount`, `supposed_amount`, `type_of_payment`, `tran_hash`, `status`, `plan`) VALUES
(117, '110', 'prince2', '', 100, '', 'Tron', '', 'Accepted', 'STARTER PLAN'),
(118, '110', 'prince2', '', 100, '', 'Usdt', '', 'Accepted', 'PREMIUM PLAN'),
(119, '110', 'prince2', '', 100, '', 'Tron', '', 'Accepted', 'PLATINUM PLAN'),
(120, '110', 'prince2', '', 50000, '', 'Ethereum', '', 'Accepted', 'DRAGONMINTER'),
(121, '110', 'prince2', '', 222, '', 'Propy', '', 'Pending', 'PLATINUM PLAN');

-- --------------------------------------------------------

--
-- Table structure for table `swap_tbl`
--

CREATE TABLE `swap_tbl` (
  `id` int(11) NOT NULL,
  `user_id` varchar(1000) NOT NULL DEFAULT '',
  `coin_from` varchar(10000) NOT NULL DEFAULT '',
  `to_coin` varchar(1000) NOT NULL DEFAULT '',
  `total_swapped_coin` varchar(1000) NOT NULL DEFAULT '',
  `swapped_coin_in__usd` varchar(1000) NOT NULL DEFAULT '',
  `status` varchar(1000) NOT NULL DEFAULT 'Pending',
  `date` varchar(1000) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `swap_tbl`
--

INSERT INTO `swap_tbl` (`id`, `user_id`, `coin_from`, `to_coin`, `total_swapped_coin`, `swapped_coin_in__usd`, `status`, `date`) VALUES
(18, 'prince2', 'BTC', 'BCH', '92556.0414', '10531951.950000001', 'Accepted', 'September 7th, 2022 15:35:32pm'),
(19, 'prince2', 'BTC', 'TRX', '9930.6319', '834471.0000000001', 'Accepted', 'September 7th, 2022 15:41:39pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_investement`
--

CREATE TABLE `tbl_investement` (
  `id` int(11) NOT NULL,
  `invt_start_date` datetime DEFAULT NULL,
  `invt_end_date` datetime DEFAULT NULL,
  `user_id` varchar(11111) DEFAULT NULL,
  `status` varchar(1000) DEFAULT '',
  `plan` varchar(500) DEFAULT NULL,
  `amount_invested` varchar(1000) DEFAULT NULL,
  `inv_type` varchar(11111) NOT NULL DEFAULT '',
  `amount_with_percentage` varchar(500) NOT NULL DEFAULT '0',
  `num_of_days_run_so_far` varchar(1000) NOT NULL DEFAULT '0',
  `day1` varchar(500) NOT NULL DEFAULT '',
  `day2` varchar(500) NOT NULL DEFAULT '',
  `day3` varchar(500) NOT NULL DEFAULT '',
  `day4` varchar(500) NOT NULL DEFAULT '',
  `day5` varchar(500) NOT NULL DEFAULT '',
  `day6` varchar(500) NOT NULL DEFAULT '',
  `day7` varchar(500) NOT NULL DEFAULT '',
  `day8` varchar(500) NOT NULL DEFAULT '',
  `day9` varchar(500) NOT NULL DEFAULT '',
  `day10` varchar(500) NOT NULL DEFAULT '',
  `day11` varchar(500) NOT NULL DEFAULT '',
  `day12` varchar(500) NOT NULL DEFAULT '',
  `day13` varchar(500) DEFAULT '',
  `day14` varchar(500) DEFAULT '',
  `day15` varchar(320) NOT NULL DEFAULT '',
  `day16` varchar(500) NOT NULL DEFAULT '',
  `day17` varchar(500) NOT NULL DEFAULT '',
  `day18` varchar(100) NOT NULL DEFAULT '',
  `day19` varchar(500) NOT NULL DEFAULT '',
  `day20` varchar(100) NOT NULL DEFAULT '',
  `day21` varchar(100) NOT NULL DEFAULT '',
  `day22` varchar(100) NOT NULL DEFAULT '',
  `day23` varchar(100) NOT NULL DEFAULT '',
  `day24` varchar(100) NOT NULL DEFAULT '',
  `day25` varchar(100) DEFAULT '',
  `day26` varchar(100) NOT NULL DEFAULT '',
  `day27` varchar(200) NOT NULL DEFAULT '',
  `day28` varchar(100) NOT NULL DEFAULT '',
  `day29` varchar(100) NOT NULL DEFAULT '',
  `day30` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_investement`
--

INSERT INTO `tbl_investement` (`id`, `invt_start_date`, `invt_end_date`, `user_id`, `status`, `plan`, `amount_invested`, `inv_type`, `amount_with_percentage`, `num_of_days_run_so_far`, `day1`, `day2`, `day3`, `day4`, `day5`, `day6`, `day7`, `day8`, `day9`, `day10`, `day11`, `day12`, `day13`, `day14`, `day15`, `day16`, `day17`, `day18`, `day19`, `day20`, `day21`, `day22`, `day23`, `day24`, `day25`, `day26`, `day27`, `day28`, `day29`, `day30`) VALUES
(63, '2022-08-26 08:26:11', '2022-08-26 08:26:11', 'prince2', 'Completed', 'STARTER PLAN', '100', 'investement', '120', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, '2022-08-26 08:28:21', '2022-08-26 08:28:21', 'prince2', 'Completed', 'PREMIUM PLAN', '100', 'investement', '180', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, '2022-08-26 10:06:06', '2022-08-26 10:06:06', 'prince2', 'Completed', 'PLATINUM PLAN', '100', 'investement', '200', '21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, '2022-08-29 01:23:00', '2022-09-12 01:23:00', 'prince2', 'Active', 'DRAGONMINTER', '50000', 'Mining', '52250', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `date` varchar(11111) DEFAULT NULL,
  `transaction_id` varchar(500) DEFAULT NULL,
  `amount` varchar(500) DEFAULT NULL,
  `wallet` varchar(500) DEFAULT NULL,
  `detail` varchar(500) DEFAULT NULL,
  `username` varchar(11111) DEFAULT NULL,
  `post_balance` varchar(500) DEFAULT NULL,
  `type` varchar(11111) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `date`, `transaction_id`, `amount`, `wallet`, `detail`, `username`, `post_balance`, `type`) VALUES
(5, 'August 29th, 2022 10:02:07 AM', '7KJPXVB41W0SHG4FUQ26', '997', 'interest_w', 'Coin Swap', 'prince2', '75100', 'pluse'),
(6, 'September 7th, 2022 03:12:42 PM', '1MH70CQ9L31XNT0663Y2', '2', 'interest_w', 'Coin Swap', 'prince2', '75100', 'pluse'),
(7, 'September 7th, 2022 03:18:50 PM', '68N0UK4236WZG2RY5DE9', '4', 'interest_w', 'Coin Swap', 'prince2', '75100', 'pluse'),
(8, 'September 7th, 2022 03:23:00 PM', '1FWXL8ARCVZG46O8U067', '85', 'interest_w', 'Coin Swap', 'prince2', '75100', 'pluse'),
(9, 'September 7th, 2022 03:39:13 PM', '38801F9D27LA652KHE4T', '10531951.950000001', 'interest_w', 'Coin Swap', 'prince2', '75100', 'pluse'),
(10, 'September 7th, 2022 03:42:48 PM', '2WGX0ROYK7SE0C4396LH', '834471.0000000001', 'interest_w', 'Coin Swap', 'prince2', '75100', 'pluse'),
(11, 'September 7th, 2022 03:46:48 PM', 't8sxhrz7u2n9vw07bkafiql3mc5yg6954o4d18pej13260', '834000', 'interest_w', 'Withdrawal', 'prince2', '471.00000000012', 'minus'),
(12, 'September 21st, 2022 07:12:38 PM', 'nte10g5ujx83mq2vd6if9942aykrh8z54o7p0wbl6c137s', '44', 'interest_w', 'Withdrawal', 'prince2', '427.00000000012', 'minus'),
(13, 'September 21st, 2022 10:05:58 PM', '2tfcsg515349aen6m4jxdouhiz6v3987lwr018ypb2q7k0', '100', 'interest_w', 'Withdrawal', 'prince2', '327.00000000012', 'minus'),
(14, 'September 21st, 2022 10:10:38 PM', '714kayxv96gq9bp13mnjetw205zr08432c6fh85u7dsoli', '50', 'interest_w', 'Withdrawal', 'prince2', '277.00000000012', 'minus');

-- --------------------------------------------------------

--
-- Table structure for table `wallet__addreses`
--

CREATE TABLE `wallet__addreses` (
  `id` int(11) NOT NULL,
  `address_name` varchar(11111) NOT NULL DEFAULT '',
  `key_name` varchar(11111) NOT NULL DEFAULT '',
  `address_hash` varchar(11222) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet__addreses`
--

INSERT INTO `wallet__addreses` (`id`, `address_name`, `key_name`, `address_hash`) VALUES
(1, 'Bitcoin', 'BTC', '56M NCBV'),
(2, 'Ethereum', 'ETH', '55555'),
(3, 'Bitcoin Cash', 'BCH', 'gshhgfbfdndhmjjj'),
(4, 'Tron', 'AAVE', 'jertyui'),
(5, 'Usdt', 'USDT', 'cdcscscsas'),
(6, 'Ripple', 'ZEC', 'KHJCJFDYU'),
(7, 'Propy', 'PRO', '265BHFGH'),
(8, 'Binance coin', 'BUSD', 'FXGXFSDF'),
(9, 'Doge', 'DOGE', 'VXFZX511'),
(10, 'LiteCoin', 'LTC', 'FXDSR595');

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_tbl`
--

CREATE TABLE `withdraw_tbl` (
  `id` int(11) NOT NULL,
  `user_id` varchar(500) NOT NULL DEFAULT '',
  `transaction_id` varchar(500) NOT NULL DEFAULT '',
  `date` datetime DEFAULT NULL,
  `amount` varchar(500) DEFAULT '',
  `status` varchar(500) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw_tbl`
--

INSERT INTO `withdraw_tbl` (`id`, `user_id`, `transaction_id`, `date`, `amount`, `status`) VALUES
(1, 'prince2', 't8sxhrz7u2n9vw07bkafiql3mc5yg6954o4d18pej13260', '2022-09-07 15:46:48', '834000', 'Pending'),
(2, 'prince2', 'nte10g5ujx83mq2vd6if9942aykrh8z54o7p0wbl6c137s', '2022-09-21 19:12:38', '44', 'Pending'),
(3, 'prince2', '2tfcsg515349aen6m4jxdouhiz6v3987lwr018ypb2q7k0', '2022-09-21 22:05:58', '100', 'Pending'),
(4, 'prince2', '714kayxv96gq9bp13mnjetw205zr08432c6fh85u7dsoli', '2022-09-21 22:10:38', '50', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_deposit`
--
ALTER TABLE `latest_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `latest_withdrawal`
--
ALTER TABLE `latest_withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mank`
--
ALTER TABLE `mank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proof`
--
ALTER TABLE `proof`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swap_tbl`
--
ALTER TABLE `swap_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_investement`
--
ALTER TABLE `tbl_investement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet__addreses`
--
ALTER TABLE `wallet__addreses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_tbl`
--
ALTER TABLE `withdraw_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `latest_deposit`
--
ALTER TABLE `latest_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `latest_withdrawal`
--
ALTER TABLE `latest_withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `mank`
--
ALTER TABLE `mank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `proof`
--
ALTER TABLE `proof`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `swap_tbl`
--
ALTER TABLE `swap_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_investement`
--
ALTER TABLE `tbl_investement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wallet__addreses`
--
ALTER TABLE `wallet__addreses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `withdraw_tbl`
--
ALTER TABLE `withdraw_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
