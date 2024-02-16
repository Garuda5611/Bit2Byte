-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 06:51 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bit2byte`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `fname`, `lname`) VALUES
(1, 'admin', '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6', 'Pratik', 'Patil');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(40) NOT NULL,
  `section_id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `title`, `description`, `section_id`, `date`) VALUES
(5, 'what is answe', 'this is answer', 3, '15-03-2023'),
(6, 'answer', 'answer', 3, '16-03-2023'),
(7, 'What is networking', 'Describe in your own words about network', 3, '01-05-2023'),
(8, 'Define network', 'Define Network', 3, '05-06-2023');

-- --------------------------------------------------------

--
-- Table structure for table `assignment3_5`
--

CREATE TABLE `assignment3_5` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(500) DEFAULT '',
  `marks` int(11) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment3_5`
--

INSERT INTO `assignment3_5` (`student_id`, `roll_no`, `fname`, `lname`, `status`, `submission`, `marks`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 1, 'hello', 25),
(9, 'BECOC306', 'Prajyot', 'Tayade', 0, '', -1),
(15, 'BECOC330', 'Atharva', 'Shirgave', 1, 'I knoow the answer', 25),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 0, '', -1),
(21, 'BECOC376', 'Rutuja', 'Patil', 0, '', -1),
(22, 'BECOC366', 'Rushikesh', 'Markad', 0, '', -1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment3_6`
--

CREATE TABLE `assignment3_6` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(500) DEFAULT '',
  `marks` int(11) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment3_6`
--

INSERT INTO `assignment3_6` (`student_id`, `roll_no`, `fname`, `lname`, `status`, `submission`, `marks`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 1, 'hello', 25),
(9, 'BECOC306', 'Prajyot', 'Tayade', 1, 'ha', 20),
(15, 'BECOC330', 'Atharva', 'Shirgave', 0, '', -1),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 0, '', -1),
(21, 'BECOC376', 'Rutuja', 'Patil', 0, '', -1),
(22, 'BECOC366', 'Rushikesh', 'Markad', 0, '', -1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment3_7`
--

CREATE TABLE `assignment3_7` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(500) DEFAULT '',
  `marks` int(11) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment3_7`
--

INSERT INTO `assignment3_7` (`student_id`, `roll_no`, `fname`, `lname`, `status`, `submission`, `marks`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 1, 'Interconnected computers together is known as network', -1),
(9, 'BECOC306', 'Prajyot', 'Tayade', 0, '', -1),
(15, 'BECOC330', 'Atharva', 'Shirgave', 0, '', -1),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 0, '', -1),
(21, 'BECOC376', 'Rutuja', 'Patil', 0, '', -1),
(22, 'BECOC366', 'Rushikesh', 'Markad', 0, '', -1);

-- --------------------------------------------------------

--
-- Table structure for table `assignment3_8`
--

CREATE TABLE `assignment3_8` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(500) DEFAULT '',
  `marks` int(11) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment3_8`
--

INSERT INTO `assignment3_8` (`student_id`, `roll_no`, `fname`, `lname`, `status`, `submission`, `marks`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 1, 'Network is interconnected computers', 25),
(9, 'BECOC306', 'Prajyot', 'Tayade', 1, 'Interconnected computers together is known as network', 23),
(15, 'BECOC330', 'Atharva', 'Shirgave', 0, '', -1),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 0, '', -1),
(21, 'BECOC376', 'Rutuja', 'Patil', 0, '', -1),
(22, 'BECOC366', 'Rushikesh', 'Markad', 0, '', -1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(3, 'BECOMP'),
(4, 'TECOMP');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `course_name` varchar(127) NOT NULL,
  `course_code` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `grade`, `course_name`, `course_code`) VALUES
(1, 2, 'Physics', 'Phy01');

-- --------------------------------------------------------

--
-- Table structure for table `dsa_admin`
--

CREATE TABLE `dsa_admin` (
  `dsa_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dsa_admin`
--

INSERT INTO `dsa_admin` (`dsa_id`, `username`, `password`) VALUES
(1, 'dsa_admin', '$2y$10$PlaCn8BPSbh4EJIWmzuHk.ETjbMj76bg9F7SaT/vwRf6IqOFfDZ7u');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`, `date`) VALUES
(10, 'jhsaha', 'hjdshjds', '2023-03-05 18:09:38 '),
(11, 'hello', 'sample', '2023-03-15 09:22:40 ');

-- --------------------------------------------------------

--
-- Table structure for table `problem10`
--

CREATE TABLE `problem10` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `section_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(700) DEFAULT '',
  `recent_submission` varchar(700) DEFAULT '',
  `language` varchar(10) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem10`
--

INSERT INTO `problem10` (`student_id`, `roll_no`, `fname`, `lname`, `section_id`, `status`, `submission`, `recent_submission`, `language`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 3, 1, 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc=new Scanner(System.in);\r\n		int n1 = sc.nextInt();\r\n		int n2 = sc.nextInt();\r\n		System.out.println(n1+n2);\r\n	}\r\n}', 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc=new Scanner(System.in);\r\n		int n1 = sc.nextInt();\r\n		int n2 = sc.nextInt();\r\n		System.out.println(n1+n2);\r\n	}\r\n}', 'java'),
(9, 'BECOC306', 'Prajyot', 'Tayade', 3, 0, '', '', ''),
(10, 'BECOC303', 'Prathamesh', 'Pimparwar', 1, 0, '', '', ''),
(15, 'BECOC330', 'Atharva', 'Shirgave', 3, 0, '', '', ''),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 3, 0, '', '', ''),
(21, 'BECOC376', 'Rutuja', 'Patil', 3, 0, '', '', ''),
(22, 'BECOC366', 'Rushikesh', 'Markad', 3, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `problem11`
--

CREATE TABLE `problem11` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `section_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(700) DEFAULT '',
  `recent_submission` varchar(700) DEFAULT '',
  `language` varchar(10) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem11`
--

INSERT INTO `problem11` (`student_id`, `roll_no`, `fname`, `lname`, `section_id`, `status`, `submission`, `recent_submission`, `language`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 3, 1, 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc=new Scanner(System.in);\r\n		int n1 = sc.nextInt();\r\n		int n2 = sc.nextInt();\r\n		System.out.println(n1+n2);\r\n	}\r\n}', 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc=new Scanner(System.in);\r\n		int n1 = sc.nextInt();\r\n		int n2 = sc.nextInt();\r\n		System.out.println(n1+n2)\r\n	}\r\n}', 'java'),
(9, 'BECOC306', 'Prajyot', 'Tayade', 3, 0, '', '', ''),
(10, 'BECOC303', 'Prathamesh', 'Pimparwar', 1, 0, '', '', ''),
(15, 'BECOC330', 'Atharva', 'Shirgave', 3, 0, '', 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc=new Scanner(System.in);\r\n		int n1 = sc.nextInt();\r\n		int n2 = sc.nextInt();\r\n		System.out.println(n1+5);\r\n	}\r\n}', ''),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 3, 0, '', '', ''),
(21, 'BECOC376', 'Rutuja', 'Patil', 3, 0, '', '', ''),
(22, 'BECOC366', 'Rushikesh', 'Markad', 3, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `problem12`
--

CREATE TABLE `problem12` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `section_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(700) DEFAULT '',
  `recent_submission` varchar(700) DEFAULT '',
  `language` varchar(10) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem12`
--

INSERT INTO `problem12` (`student_id`, `roll_no`, `fname`, `lname`, `section_id`, `status`, `submission`, `recent_submission`, `language`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 3, 1, 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc = new Scanner(System.in);\r\n		int num = sc.nextInt();\r\n		if(num % 2 == 0)\r\n		{\r\n			System.out.println(\"Even\");\r\n		}\r\n		else\r\n		{\r\n			System.out.println(\"Odd\");\r\n		}\r\n	}\r\n}', 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc = new Scanner(System.in);\r\n		int num = sc.nextInt();\r\n		if(num % 2 == 0)\r\n		{\r\n			System.out.println(\"Even\");\r\n		}\r\n		else\r\n		{\r\n			System.out.println(\"Odd\");\r\n		}\r\n	}\r\n}', 'java'),
(9, 'BECOC306', 'Prajyot', 'Tayade', 3, 0, '', '', ''),
(10, 'BECOC303', 'Prathamesh', 'Pimparwar', 1, 0, '', '', ''),
(15, 'BECOC330', 'Atharva', 'Shirgave', 3, 0, '', '', ''),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 3, 0, '', '', ''),
(21, 'BECOC376', 'Rutuja', 'Patil', 3, 0, '', '', ''),
(22, 'BECOC366', 'Rushikesh', 'Markad', 3, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `problem13`
--

CREATE TABLE `problem13` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `section_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(700) DEFAULT '',
  `recent_submission` varchar(700) DEFAULT '',
  `language` varchar(10) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem13`
--

INSERT INTO `problem13` (`student_id`, `roll_no`, `fname`, `lname`, `section_id`, `status`, `submission`, `recent_submission`, `language`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 3, 1, 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc=new Scanner(System.in);\r\n		int n1 = sc.nextInt();\r\n		int n2 = sc.nextInt();\r\n		System.out.println(n1*n2);\r\n	}\r\n}', 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc=new Scanner(System.in);\r\n		int n1 = sc.nextInt();\r\n		int n2 = sc.nextInt();\r\n		System.out.println(n1*n2);\r\n	}\r\n}', 'java'),
(9, 'BECOC306', 'Prajyot', 'Tayade', 3, 0, '', '', ''),
(10, 'BECOC303', 'Prathamesh', 'Pimparwar', 1, 0, '', '', ''),
(15, 'BECOC330', 'Atharva', 'Shirgave', 3, 0, '', '', ''),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 3, 0, '', '', ''),
(21, 'BECOC376', 'Rutuja', 'Patil', 3, 0, '', '', ''),
(22, 'BECOC366', 'Rushikesh', 'Markad', 3, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `problem14`
--

CREATE TABLE `problem14` (
  `student_id` int(11) NOT NULL DEFAULT '0',
  `roll_no` varchar(40) CHARACTER SET utf8mb4 NOT NULL,
  `fname` varchar(127) CHARACTER SET utf8mb4 NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `section_id` int(11) NOT NULL,
  `status` int(11) DEFAULT '0',
  `submission` varchar(700) DEFAULT '',
  `recent_submission` varchar(700) DEFAULT '',
  `language` varchar(10) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem14`
--

INSERT INTO `problem14` (`student_id`, `roll_no`, `fname`, `lname`, `section_id`, `status`, `submission`, `recent_submission`, `language`) VALUES
(8, 'BECOC382', 'Pratik', 'Patil', 3, 0, '', 'import java.util.*;\r\npublic class Main\r\n{\r\n	public static void main(String args[])\r\n	{\r\n		Scanner sc=new Scanner(System.in);\r\n		int n1 = sc.nextInt();\r\n		int n2 = sc.nextInt();\r\n		System.out.println(n1+8);\r\n	}\r\n}', ''),
(9, 'BECOC306', 'Prajyot', 'Tayade', 3, 0, '', '', ''),
(10, 'BECOC303', 'Prathamesh', 'Pimparwar', 1, 0, '', '', ''),
(15, 'BECOC330', 'Atharva', 'Shirgave', 3, 0, '', '', ''),
(20, 'BECOC379', 'Pratiksha', 'Ganjave', 3, 0, '', '', ''),
(21, 'BECOC376', 'Rutuja', 'Patil', 3, 0, '', '', ''),
(22, 'BECOC366', 'Rushikesh', 'Markad', 3, 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `problem_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `test_cases_ip` varchar(400) NOT NULL,
  `test_cases_op` varchar(400) NOT NULL,
  `topic` varchar(30) NOT NULL,
  `difficulty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`problem_id`, `title`, `description`, `test_cases_ip`, `test_cases_op`, `topic`, `difficulty`) VALUES
(10, 'add 2 numbers', 'add 2 numbers', '5\r\n5|6\r\n6|7\r\n7|8\r\n8|9\r\n9', '10|12|14|16|18', 'Basic', 'Easy'),
(11, 'Add 2 numbers', 'add 2 numbers', '5\r\n5|6\r\n6|7\r\n7|8\r\n7|8\r\n8', '10|12|14|15|16', 'Basic', 'Easy'),
(12, 'Find if given number is even or odd', 'Write a code which will print if a number is Even or Odd', '5|8|13|16|17', 'Odd|Even|Odd|Even|Odd', 'Basic', 'Easy'),
(13, 'Multiply 2 numbers', 'ahsh', '2 2|3 3|4 4|5 5|6 6', '4|9|16|25|36', 'Basic', 'Easy'),
(14, 'Add 2 numbers', 'qgwhwh', '5\r\n5|6\r\n6|7\r\n7|8\r\n8|9\r\n9', '10|12|14|16|18', 'Basic', 'Easy');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section` varchar(7) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section`, `class_id`, `teacher`) VALUES
(1, 'C', 3, 0),
(3, 'B', 3, 8),
(11, 'A', 4, 0),
(12, 'A', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `roll_no` varchar(40) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `address` varchar(31) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_of_joined` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `problems_solved` int(11) NOT NULL,
  `total_submissions` int(11) NOT NULL,
  `successful_submissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `roll_no`, `username`, `password`, `fname`, `lname`, `class_id`, `section_id`, `address`, `gender`, `email_address`, `date_of_birth`, `date_of_joined`, `problems_solved`, `total_submissions`, `successful_submissions`) VALUES
(8, 'BECOC382', 'pratik.patil', '$2y$10$mJ1p1VMkNR/eDoEK79/dxe7C4Qxc8N38VhK1c.19qlUwfWx78LLj.', 'Pratik', 'Patil', 3, 3, 'Pune', 'Male', 'pratik.patil20@pccoepune.org', '2001-06-05', '2023-02-28 15:25:34', 3, 5, 4),
(9, 'BECOC306', 'prajyot.tayade', '$2y$10$3vTlJaK/abrAKEDW8VlHz.1cs56do8YsBHDAGCUS3WxJyesT57zNa', 'Prajyot', 'Tayade', 3, 3, 'Pune', 'Male', 'prajyot.tayade20@pccoepune.org', '2001-10-11', '2023-03-04 16:10:07', 0, 0, 0),
(10, 'BECOC303', 'prathamesh.pimparwar', '$2y$10$4FSFFkPQw89PlT01e.WVfeEoZcK60klyippG08q1VLXp8Qw4.K1Ga', 'Prathamesh', 'Pimparwar', 3, 1, 'Pune', 'Male', 'prathamesh.pimparwar19@pccoepune.org', '2023-03-01', '2023-03-05 16:13:14', 0, 0, 0),
(15, 'BECOC330', 'atharva.shirgave', '$2y$10$SJ.UEKRnwCcWSrgEvM4B7O4Tw/62ZD78/sJXNI5rSFUzQqGfvgFY2', 'Atharva', 'Shirgave', 3, 3, 'Pune', 'Male', 'atharva.shirgave19@pccoepune.org', '2023-03-01', '2023-03-13 13:36:58', 2, 2, 2),
(20, 'BECOC379', 'pratiksha.ganjave', '$2y$10$FzMAkxbWCh8PtkpmkXEMAOhfJFJZ944mr0GDzOAzKcp2i7DE/9m1a', 'Pratiksha', 'Ganjave', 3, 3, 'Pune', 'Male', 'pratiksha.ganjave20@pccoepune.org', '2023-03-01', '2023-03-15 08:34:04', 0, 0, 0),
(21, 'BECOC376', 'rutuja.patil', '$2y$10$Ql6AfNAZiPkpFt/PtozGtO14Byqj6ZBl2Z86WcCmBFUqm.1nAdy3G', 'Rutuja', 'Patil', 3, 3, 'Pune', 'Male', 'rutuja.patil20@pccoepune.org', '2023-03-01', '2023-03-15 08:34:48', 0, 0, 0),
(22, 'BECOC366', 'rushikesh.markad', '$2y$10$WfQ1hyaci.xIjSGEFIAiauwmQoVhh6X.HXl8btYlhUVor9NtDlsC6', 'Rushikesh', 'Markad', 3, 3, 'Pune', 'Male', 'rushikesh.markad19@pccoepune.org', '2023-03-01', '2023-03-15 08:35:48', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `class` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study`
--

INSERT INTO `study` (`id`, `title`, `class`, `date`) VALUES
(1, 'kickstart.pdf', 3, '2023-03-15');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject` varchar(31) NOT NULL,
  `subject_code` varchar(31) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject`, `subject_code`) VALUES
(1, 'English', 'En'),
(2, 'Physics', 'Phy');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(127) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(127) NOT NULL,
  `lname` varchar(127) NOT NULL,
  `section` varchar(10) NOT NULL,
  `address` varchar(31) NOT NULL,
  `employee_number` int(11) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(31) NOT NULL,
  `qualification` varchar(127) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `date_of_joined` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `username`, `password`, `fname`, `lname`, `section`, `address`, `employee_number`, `date_of_birth`, `phone_number`, `qualification`, `gender`, `email_address`, `date_of_joined`) VALUES
(8, 'rahul.pitale', '$2y$10$EwH/bbPm8SYJ38enU7pl9uGedGuOXohUaThodddikdSDmZcmfLhOe', 'Rahul', 'Pitale', '3', 'Pune', 12, '2020-02-19', '1234567891', 'MTech', 'Male', 'rahul.pitale@pccoepune.org', '2023-02-12 10:10:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment3_5`
--
ALTER TABLE `assignment3_5`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `assignment3_6`
--
ALTER TABLE `assignment3_6`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `assignment3_7`
--
ALTER TABLE `assignment3_7`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `assignment3_8`
--
ALTER TABLE `assignment3_8`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `dsa_admin`
--
ALTER TABLE `dsa_admin`
  ADD PRIMARY KEY (`dsa_id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `problem10`
--
ALTER TABLE `problem10`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `problem11`
--
ALTER TABLE `problem11`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `problem12`
--
ALTER TABLE `problem12`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `problem13`
--
ALTER TABLE `problem13`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `problem14`
--
ALTER TABLE `problem14`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dsa_admin`
--
ALTER TABLE `dsa_admin`
  MODIFY `dsa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `study`
--
ALTER TABLE `study`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
