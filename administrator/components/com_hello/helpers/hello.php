<?php
/**
 * @package		Hello
 * @subpackage	com_hello
 * @copyright	Copyright 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Hello display helper.
 *
 * @package		Hello
 * @subpackage	com_hello
 * @since		1.0
 */
class HelloHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public static function addSubmenu($vName)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_HELLO_SUBMENU_MESSAGES'),
			'index.php?option=com_hello&view=messages',
			$vName == 'messages'
		);
		JSubMenuHelper::addEntry(
			JText::_('COM_HELLO_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_hello',
			$vName == 'categories'
		);
	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action, $user->authorise($action, 'com_hello'));
		}

		return $result;
	}
}