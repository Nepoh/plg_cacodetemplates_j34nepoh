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
 * @version			$Id: compobjectplural.php 482 2015-04-06 17:48:54Z BrianWade $
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


/**
 * [%%CompObjectPlural%%] list controller class.
 *
 * 
 */
class [%%ArchitectComp%%]Controller[%%CompObjectPlural%%] extends JControllerAdmin
{
	/**
	 * @var		string	The prefix to use with controller messages.
	 * 
	 */
	protected $text_prefix = '[%%COM_ARCHITECTCOMP%%]_[%%COMPOBJECTPLURAL%%]';

	/**
	 * Constructor.
	 *
	 * @param	array An optional associative array of configuration settings.
	 * 
	 */
	public function __construct($config = array())
	{
		parent::__construct($config);
		[%%IF INCLUDE_FEATURED%%]
		$this->registerTask('unfeatured',	'featured');
		[%%ENDIF INCLUDE_FEATURED%%]
	}

	[%%IF INCLUDE_FEATURED%%]
	/**
	 * Method to toggle the featured setting of a list of [%%compobject_plural_name%%].
	 *
	 * @return	void
	 * 
	 */
	public function featured()
	{
		// Check for request forgeries
		JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

		$user	= JFactory::getUser();
		$ids	= $this->input->getVar('cid', array(), 'array');
		$values	= array('featured' => 1, 'unfeatured' => 0);
		$task	= $this->getTask();
		$value	= JArrayHelper::getValue($values, $task, 0, 'int');
		// Get the model.
		$model = $this->getModel();

		[%%IF INCLUDE_ASSETACL%%]
		// Access checks.
		foreach ($ids as $i => $id)
		{
			$item = $model->getItem($id);
			[%%IF GENERATE_CATEGORIES%%]	
				[%%IF INCLUDE_ASSETACL_RECORD%%]
			if (!$user->authorise('core.edit.state', '[%%com_architectcomp%%].category.'.(int) $item->catid) OR
				!$user->authorise('core.edit.state', '[%%com_architectcomp%%].[%%compobject%%].'.$id))
				[%%ELSE INCLUDE_ASSETACL_RECORD%%]
			if (!$user->authorise('core.edit.state', '[%%com_architectcomp%%].category.'.(int) $item->catid) OR
				!$user->authorise('core.edit.state', '[%%com_architectcomp%%]'))
				[%%ENDIF INCLUDE_ASSETACL_RECORD%%]

			[%%ELSE GENERATE_CATEGORIES%%]
				[%%IF INCLUDE_ASSETACL_RECORD%%]
			if (!$user->authorise('core.edit.state', '[%%com_architectcomp%%].[%%compobject%%].'.$id))
				[%%ELSE INCLUDE_ASSETACL_RECORD%%]
			if (!$user->authorise('core.edit.state', '[%%com_architectcomp%%]'))
				[%%ENDIF INCLUDE_ASSETACL_RECORD%%]
			[%%ENDIF GENERATE_CATEGORIES%%]						
			{
				// Prune items that you can't change.
				unset($ids[$i]);
				JError::raiseNotice(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
			}
		}
		[%%ENDIF INCLUDE_ASSETACL%%]

		if (empty($ids))
		{
			JError::raiseWarning(500, JText::_('[%%COM_ARCHITECTCOMP%%]_[%%COMPOBJECTPLURAL%%]_NO_ITEM_SELECTED'));
		}
		else
		{
			// Publish the items.
			if (!$model->featured($ids, $value))
			{
				JError::raiseWarning(500, $model->getError());
			}
			
			if ($value == 1)
			{
				$message = JText::plural('[%%COM_ARCHITECTCOMP%%]_[%%COMPOBJECTPLURAL%%]_N_ITEMS_FEATURED', count($ids));
			}
			else
			{
				$message = JText::plural('[%%COM_ARCHITECTCOMP%%]_[%%COMPOBJECTPLURAL%%]_N_ITEMS_UNFEATURED', count($ids));
			}			
		}

		$this->setRedirect(JRoute::_('index.php?option=[%%com_architectcomp%%]&view=[%%compobjectplural%%]', false), $message);
	}
	[%%ENDIF INCLUDE_FEATURED%%]

	/**
	 * Method to get a model object, loading it if required.
	 *
	 * @param   string  $name    The model name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  object  The model.
	 * 
	 * 
	 */
	public function getModel($name = '[%%CompObject%%]', $prefix = '[%%ArchitectComp%%]Model',$config = array('ignore_request' => true))
	{
		$model = parent::getModel($name, $prefix, $config);
		return $model;
	}
	/**
	 * Function that allows child controller access to model data
	 * after the item has been deleted.
	 *
	 * @param   JModelLegacy  $model  The data model object.
	 * @param   integer       $ids    The array of ids for items being deleted.
	 *
	 * @return  void
	 *
	 */
	protected function postDeleteHook(JModelLegacy $model, $ids = null)
	{
	}	
}