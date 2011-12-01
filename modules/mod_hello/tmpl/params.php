<?php
/**
 * Layout to show parameter options.
 *
 * @package     Hello
 * @subpackage  mod_hello
 * @copyright   Copyright 2011 New Life in IT Pty Ltd. All rights reserved.
 * @license     GNU General Public License version 2 or later.
 */

// No direct access
defined('_JEXEC') or die;

/* @var  $this  ModuleViewHello */

?>

<h5>Module Parameters</h5>
<ul>
	<li>
		Layout:
		<?php echo $this->escape($this->params->get('layout')); ?>
	</li>
	<li>
		Module class suffix:
		<?php echo $this->escape($this->params->get('moduleclass_sfx')); ?>
	</li>
	<li>
		Cache:
		<?php echo $this->escape($this->params->get('cache')); ?>
	</li>
	<li>
		Cache time:
		<?php echo $this->escape($this->params->get('cache_time')); ?>
	</li>
</ul>

