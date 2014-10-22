<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4fc314b738198882"></script>
<!-- AddThis Button END -->


<?php


      	$menu = get_register('menu');
?>

<div class="clearfloat"></div>

<div id="layout_footer">
<table width="100%" height="79" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="210" height="50">

		</td>
		
		<td width="748" height="50" align="right">
		<p class="footer_toolbar_links">
		<?php
			echo elgg_view('footer/links');
		?>
		</p>
		</td>
	</tr>
	
	
</table>
</div><!-- /#layout_footer -->

<div class="clearfloat"></div>

</div><!-- /#page_wrapper -->
</div><!-- /#page_container -->
<!-- insert an analytics view to be extended -->
<?php
	echo elgg_view('footer/analytics');
?>

</body>
</html>
