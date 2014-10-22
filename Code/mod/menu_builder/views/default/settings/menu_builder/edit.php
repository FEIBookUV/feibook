<?php ?>
<p>
	<?php 
		echo elgg_echo('menu_builder:settings:extend_header'); 
	?>
	<select name="params[extend_header]">
		<option value="yes" <?php if ($vars['entity']->extend_header == 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:yes'); ?></option>
		<option value="no" <?php if ($vars['entity']->extend_header != 'yes') echo " selected=\"yes\" "; ?>><?php echo elgg_echo('option:no'); ?></option>
	</select>
</p>