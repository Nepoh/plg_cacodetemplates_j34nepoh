<?php
/**
 * @tempversion
 * @name			[%%ArchitectComp_name%%] (Release [%%COMPONENTSTARTVERSION%%])
 * @author			[%%COMPONENTAUTHOR%%] ([%%COMPONENTWEBSITE%%])
 * @package			[%%com_architectcomp%%]
 * @subpackage		[%%com_architectcomp%%].admin
 * @copyright		[%%COMPONENTCOPYRIGHT%%]
 * @license			GNU General Public License version 3 or later; See http://www.gnu.org/copyleft/gpl.html 
 * 
 * The following Component Architect header section must remain in any distribution of this file
 *
 * @version			$Id: pagebreak.php 482 2015-04-06 17:48:54Z BrianWade $
 * @CAauthor		Component Architect (www.componentarchitect.com)
 * @CApackage		architectcomp
 * @CAsubpackage	architectcomp.admin
 * @CAtemplate		joomla_3_4_nepoh (Release 0.0.1) by Nepoh<nepoh@outlook.de> based on joomla_3_4_standard (Release 1.0.0)
 * @CAcopyright		Copyright (c)2013 - 2015  Simply Open Source Ltd. (trading as Component Architect). All Rights Reserved
 * @Joomlacopyright Copyright (c)2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @CAlicense		GNU General Public License version 3 or later; See http://www.gnu.org/copyleft/gpl.html
 * 
 * This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
 */

defined('_JEXEC') or die;

$script  = 'function insertPagebreak() {'."\n\t";
// Get the pagebreak title
$script .= 'var title = document.getElementById("title").value;'."\n\t";
$script .= 'if (title != \'\') {'."\n\t\t";
$script .= 'title = "title=\""+title+"\" ";'."\n\t";
$script .= '}'."\n\t";
// Get the pagebreak toc alias -- not inserting for now
// don't know which attribute to use...
$script .= 'var alt = document.getElementById("alt").value;'."\n\t";
$script .= 'if (alt != \'\') {'."\n\t\t";
$script .= 'alt = "alt=\""+alt+"\" ";'."\n\t";
$script .= '}'."\n\t";
$script .= 'var tag = "<hr class=\"system-pagebreak\" "+title+" "+alt+"/>";'."\n\t";
$script .= 'window.parent.jInsertEditorText(tag, \''.json_encode($this->eName).'\');'."\n\t";
$script .= 'window.parent.jModalClose();'."\n\t";
$script .= 'return false;'."\n";
$script .= '}'."\n";

JFactory::getDocument()->addScriptDeclaration($script);
?>
<form class="form-horizontal">
	<div class="control-group">
		<label for="title" class="control-label">
			<?php echo JText::_('[%%COM_ARCHITECTCOMP%%]_PAGEBREAK_TITLE'); ?>
		</label>
		<div class="controls">
			<input type="text" id="title" name="title" />
		</div>
	</div>
	<div class="control-group">
		<label for="alias" class="control-label">
			<?php echo JText::_('[%%COM_ARCHITECTCOMP%%]_PAGEBREAK_TOC'); ?>
		</label>
		<div class="controls">
			<input type="text" id="alt" name="alt" />
		</div>
	</div>
	<button onclick="insertPagebreak();"><?php echo JText::_('[%%COM_ARCHITECTCOMP%%]_PAGEBREAK_INSERT_BUTTON'); ?></button>
</form>
