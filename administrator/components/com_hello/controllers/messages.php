<?php
/**
 * @package		Hello
 * @subpackage	com_hello
 * @copyright	Copyright 2010 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controlleradmin');

/**
 * Messages Subcontroller.
 *
 * @package		Hello
 * @subpackage	com_hello
 * @since		1.0
 */
class HelloControllerMessages extends JControllerAdmin
{
	/**
	 * Proxy for getModel.
	 *
	 * @param	string	$name	The name of the model.
	 * @param	string	$prefix	The prefix for the model class name.
	 * @param	string	$config	The model configuration array.
	 *
	 * @return	HelloModelMessages	The model for the controller set to ignore the request.
	 * @since	1.6
	 */
	public function getModel($name = 'Message', $prefix = 'HelloModel', $config = array('ignore_request' => true))
	{
		return parent::getModel($name, $prefix, $config);
	}
}