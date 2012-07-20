-- phpMyAdmin SQL Dump
-- version 3.3.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2012 at 07:39 PM
-- Server version: 5.1.61
-- PHP Version: 5.3.5-1ubuntu7.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ads`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads_doc_items`
--

CREATE TABLE IF NOT EXISTS `ads_doc_items` (
  `DocItemId` int(11) NOT NULL AUTO_INCREMENT,
  `DocItem` varchar(100) NOT NULL,
  `DocItemContent` text NOT NULL,
  `ResourceAreaId` int(11) NOT NULL,
  `AddedBy` int(11) NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`DocItemId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ads_doc_items`
--

INSERT INTO `ads_doc_items` (`DocItemId`, `DocItem`, `DocItemContent`, `ResourceAreaId`, `AddedBy`, `AddedOn`) VALUES
(1, 'Questionnaires', '<h2>Questionnaires</h2>\n\n\n\n<p>You''ll find all Questionnaire data at the following URL:</p>\n\n<code>http://10.10.1.165/api/surveys/questionnaires/</code>\n\n\n\n<p>Retrieve data on a specific Questionnaire by passing the Questionnaire''s <dfn>Id</dfn> to the following URL:</p>\n\n<code>http://10.10.1.165/api/surveys/questionnaires/22</code>\n\n\n\n<p>The data can be return in any of the following formats:</p>\n\n<ul>\n\n	<li>json</li>\n\n	<li>xml</li>\n\n	<li>php array</li>\n\n	<li>html table</li>\n\n	<li>csv</li>\n\n</ul>\n\n<p>Just append the following query:</p>\n\n<code>http://10.10.1.165/api/surveys/questionnaires/22?format=php</code>\n\n\n\n<p>The result in the form of a PHP array is:</p>\n\n<pre>\n\narray (\n\n  0 => \n\n  array (\n\n    ''Id'' => ''22'',\n\n    ''QuestionnaireType'' => ''1'',\n\n    ''Title'' => ''Faculty Course Feedback'',\n\n    ''Shortname'' => ''fcf'',\n\n    ''AbbrName'' => ''FCF'',\n\n    ''Description'' => '''',\n\n    ''Theme'' => NULL,\n\n    ''Settings'' => NULL,\n\n    ''Color'' => ''003399'',\n\n    ''Intro'' => ''The Faculty Course Feedback survey provides the opportunity for you to evaluate the design, content, and materials for the course(s) you teach. This is a valuable part of ECPIâ€™s continuous improvement process for curriculum and part of your responsibilities as a faculty member. Please take time to reflect on the course(s) you taught this term and provide your feedback as honestly as possible. \n\n\n\nYour answers to the survey items are not part of the faculty evaluation process and will not be used for such.  The items on which you will be providing feedback are specifically focused on courses. Your responses are confidential. Only summarized data will be provided to faculty and administrators revising the curriculum.\n\n'',\n\n    ''Policy'' => '''',\n\n    ''SearchKey'' => ''Email'',\n\n    ''SearchType'' => ''1'',\n\n    ''ProgressBar'' => ''1'',\n\n    ''Fields'' => ''a:13:{i:0;s:8:"CourseId";i:1;s:4:"Code";i:2;s:5:"Shift";i:3;s:3:"Lab";i:4;s:12:"Prerequisite";i:5;s:6:"Course";i:6;s:11:"NumStudents";i:7;s:8:"StartDay";i:8;s:10:"Instructor";i:9;s:12:"InstructorId";i:10;s:5:"Email";i:11;s:4:"Term";i:12;s:8:"CampusID";}'',\n\n    ''LabelFields'' => ''a:3:{i:0;s:4:"Code";i:1;s:6:"Course";i:2;s:4:"Term";}'',\n\n    ''CommentLabels'' => ''a:2:{i:0;s:4:"Code";i:1;s:10:"Instructor";}'',\n\n    ''AnonymousFields'' => ''a:3:{i:0;s:10:"Instructor";i:1;s:12:"InstructorId";i:2;s:5:"Email";}'',\n\n    ''LinkedSurveys'' => '''',\n\n    ''CreatedBy'' => ''1'',\n\n    ''Created'' => ''2012-04-04 00:00:00'',\n\n    ''Branch'' => ''1'',\n\n    ''LastEdited'' => ''2012-04-04 00:00:00'',\n\n    ''LastEditedBy'' => ''1'',\n\n    ''Version'' => ''1'',\n\n  ),\n\n)\n\n</pre>\n\n\n\n\n\n\n\n\n\n<a name="responses" ></a>\n\n<h2>Responses</h2>\n\n\n\n\n\n\n\n<a name="scores" ></a>\n\n<h2>Scores</h2>\n\n\n\n\n\n\n\n<a name="rates" ></a>\n\n<h2>Rates</h2>\n', 1, 1, '2012-05-08 00:00:00'),
(12, 'More Info', '<h2>Test Content</h2>', 1, 1, '2012-05-08 01:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `ads_resource_areas`
--

CREATE TABLE IF NOT EXISTS `ads_resource_areas` (
  `ResourceAreaId` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ',
  `ResourceArea` varchar(100) NOT NULL,
  `Description` text,
  `AddedBy` int(11) NOT NULL,
  `AddedOn` datetime NOT NULL,
  PRIMARY KEY (`ResourceAreaId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ads_resource_areas`
--

INSERT INTO `ads_resource_areas` (`ResourceAreaId`, `ResourceArea`, `Description`, `AddedBy`, `AddedOn`) VALUES
(1, 'Surveys', NULL, 1, '2012-05-08 10:04:32'),
(2, 'Faculty', NULL, 1, '2012-05-08 10:04:32'),
(3, 'Students', NULL, 1, '2012-05-08 10:04:32'),
(4, 'Curriculum', NULL, 1, '2012-05-08 10:04:32'),
(5, 'Video', NULL, 1, '2012-05-08 10:04:32'),
(6, 'Financial Aid', NULL, 1, '2012-05-08 10:04:32'),
(7, 'Admissions', NULL, 1, '2012-05-08 10:04:32'),
(8, 'Permissions', NULL, 1, '2012-05-08 10:04:32'),
(9, 'Knowledge Base', NULL, 1, '2012-05-08 11:00:56'),
(10, 'Observations', NULL, 1, '2012-05-08 11:00:56'),
(14, 'Basic Info', NULL, 1, '2012-05-08 12:50:16'),
(15, 'Drake Info', NULL, 1, '2012-05-08 01:04:35'),
(16, 'Basic Info', NULL, 1, '2012-05-08 19:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `ads_settings`
--

CREATE TABLE IF NOT EXISTS `ads_settings` (
  `Title` varchar(200) NOT NULL,
  `Logo` varchar(100) NOT NULL,
  `Database` tinyint(1) NOT NULL DEFAULT '0',
  `TrackUsers` tinyint(4) NOT NULL DEFAULT '0',
  `SetupStep` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads_settings`
--

INSERT INTO `ads_settings` (`Title`, `Logo`, `Database`, `TrackUsers`, `SetupStep`) VALUES
('After Burner', 'Large_OIRLogo.png', 1, 0, 1);
