
<?php

     if (isloggedin()) {
?>

<div id="elgg_topbar">

<div id="elgg_topbar_container_left">
	<div class="toolbarimages">
		<a href="http://www.uv.mx" target="_blank"><img src="<?php echo $vars['url']; ?>mod/FEIBook_Theme/graphics/lis.gif" /></a>

		
		<a href="<?php echo $_SESSION['user']->getURL(); ?>"><img class="user_mini_avatar" src="<?php echo $_SESSION['user']->getIcon('topbar'); ?>"></a>
		
	</div>
	<div class="toolbarlinks">
		<a href="<?php echo $vars['url']; ?>pg/dashboard/" class="pagelinks"><?php echo elgg_echo('dashboard'); ?></a>
	</div>
        <?php

	        echo elgg_view("navigation/topbar_tools");

        ?>
        	
        	
        <div class="toolbarlinks2">		
		<?php

		echo elgg_view('elgg_topbar/extend', $vars);
		?>
		
		<a href="<?php echo $vars['url']; ?>pg/settings/" class="usersettings"><?php echo elgg_echo('settings'); ?></a>
		
		<?php
		

			if ($vars['user']->admin || $vars['user']->siteadmin) { 
		
		?>
		
			<a href="<?php echo $vars['url']; ?>pg/admin/" class="usersettings"><?php echo elgg_echo("admin"); ?></a>
		

		<?php
		
				}
		
		?>

 </div>


</div>



<div id="elgg_topbar_container_right">
		<small>
			<?php echo elgg_view('output/url', array('href' => "{$vars['url']}action/logout", 'text' => elgg_echo('logout'), 'is_action' => TRUE)); ?>
		</small>
</div>

<div id="elgg_topbar_container_search">
<?php echo elgg_view('page_elements/searchbox'); ?>
</div>

</div><!-- /#elgg_topbar -->

<div class="clearfloat"></div>

<?php
    } else {
?>
<div id="elgg_topbar">

<div id="elgg_topbar_container_left">
	<div class="toolbarimages">
	</div>
        		
</div>

<div id="elgg_topbar_container_search">
<?php echo elgg_view('page_elements/searchbox'); ?>
</div>
</div>
<!-- /#topbar -->
<div class="clearfloat"></div>
<?php
	}
?>
