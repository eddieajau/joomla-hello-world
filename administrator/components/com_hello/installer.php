<?php
/**
 * @package		NewLifeInIT
 * @subpackage	com_hello
 * @copyright	Copyright 2011 New Life in IT Pty Ltd. All rights reserved.
 * @license		GNU General Public License <http://www.fsf.org/licensing/licenses/gpl.html>
 * @link		http://www.theartofjoomla.com
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * @package     NewLifeInIT
 * @subpackage  com_hello
 * @since       1.0
 */
class Com_HelloInstallerScript
{
	/**
	 * Runs after files are installed and database scripts executed.
	 *
	 * @param   JInstaller  $parent  The installer object.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	function install($parent)
	{
		// Add custom code.
	}

	/**
	 * Runs after files are removed and database scripts executed.
	 *
	 * @param   JInstaller  $parent  The installer object.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	function uninstall($parent)
	{
		// Add custom code.
	}

	/**
	 * Runs after files are updated and database scripts executed.
	 *
	 * @param   JInstaller  $parent  The installer object.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	function update($parent)
	{
		// Add custom code.
	}

	/**
	 * Runs before anything is run.
	 *
	 * @param   string      $type    The type of installation: install|update.
	 * @param   JInstaller  $parent  The installer object.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	function preflight($type, $parent)
	{
		// Add custom code.
	}

	/**
	 * Runs after an extension install or update.
	 *
	 * @param   string      $type    The type of installation: install|update.
	 * @param   JInstaller  $parent  The installer object.
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	function postflight($type, $parent)
	{
		// Add custom code.
		// Note: this file is executed in the tmp folder if using the upload method.
	}
}
