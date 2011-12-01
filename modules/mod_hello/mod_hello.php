<?php
/**
 * @package     Hello
 * @subpackage  mod_hello
 * @copyright   Copyright 2011 New Life in IT Pty Ltd. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;

/* @var  $params   JRegistry */

// Load the attributes in the JDOC tag into the parameters.
$temp = new JRegistry($attribs);
$params->merge($temp);

/**
 * View for the Hello module.
 *
 * @package     Hello
 * @subpackage  mod_hello
 * @since       1.0
 */
class ModuleViewHello extends JView
{
	/**
	 * The module parameters.
	 *
	 * @var    JRegistry
	 * @since  1.0
	 */
	protected $params = null;

	/**
	 * Overrides the parent constructor to inject parameters and prepare data.
	 *
	 * @param   array      $options  The view options (see JView).
	 * @param   JRegistry  $params   The module parameters.
	 *
	 * @see     JView
	 * @since   1.1
	 */
	public function __construct($options = array(), $params)
	{
		// Prepare the class using the parent constructor.
		parent::__construct($options);

		// Set the data for the view.
		$this->params = $params;

		// Set the default layout from the parameters.
		$this->setLayout($params->get('layout', 'default'));
	}
}

// Instantiate the module view and display.
$view = new ModuleViewHello(
	array(
		'template_path' => dirname(__FILE__) . '/tmpl',
	),
	$params
);

$view->display();
