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

echo JHtml::_('sliders.panel',JText::_('COM_HELLO_METADATA_FIELDSET_LABEL'), 'metadata-options'); ?>
<fieldset class="panelform">
	<ul class="adminformlist">
		<li><?php echo $this->form->getLabel('metadesc'); ?>
		<?php echo $this->form->getInput('metadesc'); ?></li>

		<li><?php echo $this->form->getLabel('metakey'); ?>
		<?php echo $this->form->getInput('metakey'); ?></li>

		<?php if ($this->item->created_time) : ?>
			<li><?php echo $this->form->getLabel('created_time'); ?>
			<?php echo $this->form->getInput('created_time'); ?></li>
		<?php endif; ?>

		<?php if (intval($this->item->modified_time)) : ?>
			<li><?php echo $this->form->getLabel('modified_time'); ?>
			<?php echo $this->form->getInput('modified_time'); ?></li>
		<?php endif; ?>
	</ul>
</fieldset>