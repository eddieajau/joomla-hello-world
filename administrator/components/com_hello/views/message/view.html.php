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
class HelloViewMessage extends JView
{
	/**
	 * @var		JObject	The data for the record being displayed.
	 * @since	1.0
	 */
	protected $item;

	/**
	 * @var		JForm	The form object for this record.
	 * @since	1.0
	 */
	protected $form;

	/**
	 * @var		JObject	The model state.
	 * @since	1.0
	 */
	protected $state;

	/**
	 * Prepare and display the Message view.
	 *
	 * @return	void
	 * @since	1.0
	 */
	public function display()
	{
		// Intialiase variables.
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');
		$this->state	= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

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
		JRequest::setVar('hidemainmenu', true);

		$user		= JFactory::getUser();
		$isNew		= ($this->item->id == 0);
		$checkedOut	= !($this->item->checked_out == 0 || $this->item->checked_out == $user->get('id'));
		$canDo		= HelloHelper::getActions();

		JToolBarHelper::title(
			JText::_(
				'COM_Hello_'.
				($checkedOut
					? 'VIEW_Message'
					: ($isNew ? 'ADD_Message' : 'EDIT_Message')).'_TITLE',
				'hello'
			)
		);

		// If not checked out, can save the item.
		if (!$checkedOut && $canDo->get('core.edit')) {
			JToolBarHelper::apply('message.apply', 'JTOOLBAR_APPLY');
			JToolBarHelper::save('message.save', 'JTOOLBAR_SAVE');
			JToolBarHelper::custom('message.save2new', 'save-new.png', null, 'JTOOLBAR_SAVE_AND_NEW', false);
		}

		// If an existing item, can save to a copy.
		if (!$isNew && $canDo->get('core.create')) {
			JToolBarHelper::custom('message.save2copy', 'save-copy.png', null, 'JTOOLBAR_SAVE_AS_COPY', false);
		}
		if (empty($this->item->id))  {
			JToolBarHelper::cancel('message.cancel', 'JTOOLBAR_CANCEL');
		} else {
			JToolBarHelper::cancel('message.cancel', 'JTOOLBAR_CLOSE');
		}
	}
}