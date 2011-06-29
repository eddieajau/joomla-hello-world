<?php
/**
 * @package		Hello
 * @subpackage	com_hello
 * @copyright	Copyright 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.database.table');

/**
 * Message table.
 *
 * @package		Hello
 * @subpackage	com_hello
 * @since		1.0
 */
class HelloTableMessage extends JTable
{
	/**
	 * Constructor.
	 *
	 * @param	JDatabase	$db	A database connector object.
	 *
	 * @return	HelloTableMessage
	 * @since	1.0
	 */
	public function __construct($db)
	{
		parent::__construct('#__hello_messages', 'id', $db);
	}

	/**
	 * Overloaded bind function to pre-process the params.
	 *
	 * @param	array		$array	The input array to bind.
	 * @param	string		$ignore	A list of fields to ignore in the binding.
	 *
	 * @return	null|string	null is operation was satisfactory, otherwise returns an error
	 * @see		JTable:bind
	 * @since	1.0
	 */
	public function bind($array, $ignore = '')
	{
		if (isset($array['params']) && is_array($array['params'])) {
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string) $registry;
		}

		return parent::bind($array, $ignore);
	}

	/**
	 * Overloaded check method to ensure data integrity.
	 *
	 * @return	boolean	True on success.
	 * @since	1.0
	 */
	public function check()
	{
		// Check for valid name.
		if (trim($this->title) === '') {
			$this->setError(JText::_('COM_Hello_ERROR_Message_TITLE'));
			return false;
		}

		return true;
	}

	/**
	 * Overload the store method for the Weblinks table.
	 *
	 * @param	boolean	$updateNulls	Toggle whether null values should be updated.
	 *
	 * @return	boolean	True on success, false on failure.
	 * @since	1.0
	 */
	public function store($updateNulls = false)
	{
		// Initialiase variables.
		$date	= JFactory::getDate()->toMySQL();
		$userId	= JFactory::getUser()->get('id');

		if (empty($this->id)) {
			// New record.
			$this->created_time		= $date;
			$this->created_user_id	= $userId;
		} else {
			// Existing record.
			$this->modified_time	= $date;
			$this->modified_user_id	= $userId;
		}

		// Attempt to store the data.
		return parent::store($updateNulls);
	}
}