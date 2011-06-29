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

jimport('joomla.application.component.controller');

/**
 * Hello Component Controller
 *
 * @package		Hello
 * @subpackage	com_hello
 * @since		1.0
 */
class HelloController extends JController
{
	/**
	 * @var		string	The default view.
	 * @since	1.0
	 */
	protected $default_view = 'messages';

	/**
	 * Override the display method for the controller.
	 *
	 * @return	void
	 * @since	1.0
	 */
	function display()
	{
		// Load the component helper.
		require_once JPATH_COMPONENT.'/helpers/hello.php';

		// Display the view.
		parent::display();
	}
}