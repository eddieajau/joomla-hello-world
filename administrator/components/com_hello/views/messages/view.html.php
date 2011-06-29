<?php
/**
 * @version		$Id$
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
class HelloViewMessages extends JView
{
	/**
	 * @var		array	The array of records to display in the list.
	 * @since	1.0
	 */
	protected $items;

	/**
	 * @var		JPagination	The pagination object for the list.
	 * @since	1.0
	 */
	protected $pagination;

	/**
	 * @var		JObject	The model state.
	 * @since	1.0
	 */
	protected $state;

	/**
	 * Prepare and display the Messages view.
	 *
	 * @return	void
	 * @since	1.0
	 */
	public function display()
	{
		// Initialise variables.
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		// Add the toolbar and display the view layout.
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
		// Initialise variables.
		$state	= $this->get('State');
		$canDo	= HelloHelper::getActions();

		JToolBarHelper::title(JText::_('COM_HELLO_MESSAGES_TITLE'));

		if ($canDo->get('core.create')) {
			JToolBarHelper::addNew('message.add', 'JTOOLBAR_NEW');
		}

		if ($canDo->get('core.edit')) {
			JToolBarHelper::editList('message.edit', 'JTOOLBAR_EDIT');
		}

		if ($canDo->get('core.edit.state')) {
			JToolBarHelper::publishList('messages.publish', 'JTOOLBAR_PUBLISH');
			JToolBarHelper::unpublishList('messages.unpublish', 'JTOOLBAR_UNPUBLISH');
			JToolBarHelper::archiveList('messages.archive','JTOOLBAR_ARCHIVE');
		}

		if ($state->get('filter.published') == -2 && $canDo->get('core.delete')) {
			JToolBarHelper::deleteList('', 'messages.delete','JTOOLBAR_EMPTY_TRASH');
		} else if ($canDo->get('core.edit.state')) {
			JToolBarHelper::trash('messages.trash','JTOOLBAR_TRASH');
		}

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_hello');
		}
	}
}