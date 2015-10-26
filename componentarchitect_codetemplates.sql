--
-- MySQL script for adding the j_3_4_nepoh CA code template to the database
--
-- Replace the prefix wildcard "#__" with the table prefix you use for your joomla installation in both sql statements below.
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- --------------------------------------------------------

--
-- `#__componentarchitect_codetemplates` table structure
--

CREATE TABLE IF NOT EXISTS `#__componentarchitect_codetemplates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` mediumtext NOT NULL,
  `version` varchar(15) NOT NULL DEFAULT '',
  `source_path` varchar(255) NOT NULL DEFAULT '',
  `predefined_code_template` tinyint(1) NOT NULL DEFAULT '0',
  `generate_predefined_fields` tinyint(1) NOT NULL DEFAULT '0',
  `multiple_category_objects` tinyint(1) NOT NULL DEFAULT '0',
  `platform` varchar(25) NOT NULL DEFAULT '',
  `platform_version` varchar(50) NOT NULL DEFAULT '',
  `coding_language` varchar(100) NOT NULL DEFAULT '',
  `template_component_name` varchar(50) NOT NULL DEFAULT '',
  `template_object_name` varchar(50) NOT NULL DEFAULT '',
  `template_markup_prefix` varchar(50) NOT NULL DEFAULT '',
  `template_markup_suffix` varchar(50) NOT NULL DEFAULT '',
  `catid` int(10) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(10) unsigned NOT NULL DEFAULT '0',
  `created_by_alias` varchar(255) NOT NULL DEFAULT '',
  `modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out` int(10) unsigned NOT NULL DEFAULT '0',
  `checked_out_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_createdby` (`created_by`),
  KEY `idx_catid` (`catid`),
  KEY `idx_predefined_code_template` (`predefined_code_template`),
  KEY `idx_ordering` (`ordering`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- `#__componentarchitect_codetemplates` data
--

INSERT INTO `#__componentarchitect_codetemplates` (`name`, `description`, `version`, `source_path`, `predefined_code_template`, `generate_predefined_fields`, `multiple_category_objects`, `platform`, `platform_version`, `coding_language`, `template_component_name`, `template_object_name`, `template_markup_prefix`, `template_markup_suffix`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `ordering`) VALUES
('J 3.4 Nepoh', '<p>Customized CA code template by Nepoh<nepoh@outlook.de>.</p>\r\n<p>Original description text:</p>\r\n<hr />\r\n<p>Developed from the core Joomla! components of com_content (Articles) and com_contact (Contacts), as they are provided in Joomla! 3.4.</p>\r\n<p>This template is coded so that selectable core parts of a Joomla! component (e.g. admin section, blog/article layouts, plugins and modules) and Joomla! fields/features can be fully included/excluded from the generated components.\r\n<p>For further details of the Joomla! Parts generation and Joomla! Fields/Features inclusion for this code template please use the Help system installed with Component Architect Pro or visit the Documentation section of our website at ''www.componentarchitect.com/documentation.html''.</p>', '1.0.0', 'j_3_4_nepoh', 1, 0, 0, 'Joomla', '3.4', 'PHP,JAVASCRIPT,XML,CSS', 'architect comp', 'comp object', '[%%', '%%]', 43, now(), 42, '', now(), 42, 0, '0000-00-00 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
