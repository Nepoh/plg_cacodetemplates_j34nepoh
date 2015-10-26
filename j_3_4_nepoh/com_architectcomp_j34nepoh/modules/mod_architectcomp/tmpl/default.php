<?php
/**
 * @tempversion
 * @name			[%%ArchitectComp_name%%] (Release [%%COMPONENTSTARTVERSION%%])
 * @author			[%%COMPONENTAUTHOR%%] ([%%COMPONENTWEBSITE%%])
 * @package			[%%com_architectcomp%%]
 * @subpackage		[%%com_architectcomp%%].mod_[%%architectcomp%%]
 * @copyright		[%%COMPONENTCOPYRIGHT%%]
 * @license			GNU General Public License version 3 or later; See http://www.gnu.org/copyleft/gpl.html 
 * 
 * The following Component Architect header section must remain in any distribution of this file
 * 
 * @version			$Id: default.php 482 2015-04-06 17:48:54Z BrianWade $
 * @CAauthor		Component Architect (www.componentarchitect.com)
 * @CApackage		architectcomp
 * @CAsubpackage	architectcomp.mod_architectcomp
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
?>
<div class="[%%architectcomp%%] mod_[%%architectcomp%%]<?php echo $module_class_sfx; ?>">
	<?php if($params->get('list-style','') <> '') : ?>
		<?php 
			$list_style_type = $params->get('list-style') == 'ul'? 'list-style-type: disc;' : '';
			echo '<'.$params->get('list-style').' style="list-style-position: inside;'. $list_style_type.'">'; 
		?>
	<?php endif; ?>
	<?php foreach ($list as $item) :  ?>
		[%%IF INCLUDE_MICRODATA%%]
		<?php if($params->get('list-style','') <> '') : ?>
			<li itemscope itemtype="http://schema.org/Thing">
		<?php else: ?>
			<span itemscope itemtype="http://schema.org/Thing">
		<?php endif; ?>
				<a href="<?php echo $item->link; ?>" itemprop="url">
					<span itemprop="name">
					[%%IF INCLUDE_NAME%%]
						<?php echo isset($item->name) ? $item->name : $item->id; ?>
					[%%ELSE INCLUDE_NAME%%]
						<?php echo $item->id; ?>
					[%%ENDIF INCLUDE_NAME%%]
					</span>
				</a>

		[%%ELSE INCLUDE_MICRODATA%%]
		<?php if($params->get('list-style','') <> '') : ?>
			<li>
		<?php else: ?>
			<span>
		<?php endif; ?>
				<a href="<?php echo $item->link; ?>">
					[%%IF INCLUDE_NAME%%]
						<?php echo isset($item->name) ? $item->name : $item->id; ?>
					[%%ELSE INCLUDE_NAME%%]
						<?php echo $item->id; ?>
					[%%ENDIF INCLUDE_NAME%%]
				</a>
		[%%ENDIF INCLUDE_MICRODATA%%]		
		<?php if($params->get('list-style','') <> '') : ?>
			</li>
		<?php else :?>
			</span><br />
		<?php endif; ?>
	<?php endforeach; ?>
	<?php if($params->get('list-style','') <> '') : ?>
		<?php echo '</'.$params->get('list-style').'>'; ?>
	<?php endif; ?>
</div>
