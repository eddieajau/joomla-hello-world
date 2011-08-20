<?php
/**
 * @package		Hello
 * @subpackage	com_hello
 * @copyright	Copyright 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * Hello view.
 *
 * @package		Hello
 * @subpackage	com_hello
 * @since		1.0
 */
class HelloViewHello extends JView
{
	/**
	 * Override the display method for the view.
	 *
	 * @return	void
	 * @since	1.0
	 */
	public function display()
	{
		$this->addToolbar();
		parent::display();
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return	void
	 * @since	1.0
	 */
	protected function addToolbar()
	{
		$canDo	= HelloHelper::getActions();

		// Add the view title.
		JToolBarHelper::title(JText::_('COM_HELLO_HELLO_TITLE'), 'hello');

		// Check if the Options button can be added.
		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_hello');
		}
	}
}