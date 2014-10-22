<?php
	/**
	* Profile Manager
	* 
	* Extended registerpage view
	* 
	* @package profile_manager
	* @author ColdTrick IT Solutions
	* @copyright Coldtrick IT Solutions 2009
	* @link http://www.coldtrick.com/
	*/

	$categorized_fields = profile_manager_get_categorized_fields(null, true, true);
	$cats = $categorized_fields['categories'];
	$fields = $categorized_fields['fields'];
	
	if(count($fields) > 0 || get_plugin_setting("profile_icon_on_register", "profile_manager") == "yes"){
	    $bounced_values = $_SESSION["custom_profile_fields"];
	    
	?>
	<div id="custom_profile_fields">
	<?php 
		
		$options = array(
				"type" => "object",
				"subtype" => CUSTOM_PROFILE_FIELDS_PROFILE_TYPE_SUBTYPE,
				"limit" => 0,
				"owner_guid" => $CONFIG->site_guid
			);
		
		$types = elgg_get_entities($options);
		
		if($types){
			
			$type_options = array();
			$type_options[""] = elgg_echo("profile_manager:profile:edit:custom_profile_type:default");
			foreach($types as $type){
				$title = $type->getTitle();
				
				$type_options[$type->guid] = $title;
				
				// preparing descriptions of profile types
				$description = $type->getDescription();
				
				if(!empty($description)){
					$types_description .= "<div id='custom_profile_type_description_" . $type->guid . "' class='custom_profile_type_description'>";
					$types_description .= "<h3 class='settings'>" . elgg_echo("profile_manager:profile:edit:custom_profile_type:description") . "</h3>";
					$types_description .= $description;
					$types_description .= "</div>";
				}
			}
			
			?>
			<script type="text/javascript">
				$(document).ready(function(){
					changeProfileType();
				});
	
				function changeProfileType(){
					
					var selVal = $('select[name="custom_profile_fields_custom_profile_type"]').val();
					$('.custom_profile_type_description').hide();
	
					if(selVal != ""){
						$('#custom_profile_type_description_'+ selVal).show();
					}
				}
			</script>
			<?php 
			echo "<p>\n";
			echo "<h3 class='settings'>\n";
			echo elgg_echo("profile_manager:profile:edit:custom_profile_type:label") . "</h3>\n";
			echo elgg_view("input/pulldown", array("internalname" => "custom_profile_fields_custom_profile_type",
													"options_values" => $type_options,
													"js" => "onchange='changeProfileType();'",
													"value" => $bounced_values['custom_profile_type']));
			
			echo "</p>\n";
			echo $types_description;
		}	
	
		if(count($fields) > 0){
			
			if(count($cats) > 1){
				$show_header = true;
			} else {
				$show_header = false;
			}
			
			foreach($cats as $cat_guid => $cat){
				if($show_header){
					// make nice title
					if($cat_guid == 0){
						$title = elgg_echo("profile_manager:categories:list:default");
					} else {
						$title = $cat->getTitle();
					}
					
					echo "<h3 class='settings'>" . $title . "</h3>\n";
				}
				
				foreach($fields[$cat_guid] as $field){
					$metadata_type = $field->metadata_type;
					if($metadata_type == "longtext"){
						// bug when showing tinymce on register page (when moving) newer versions of tinymce are working correctly
						$metadata_type = "plaintext";
					}
					
					$value = $bounced_values[$field->metadata_name];
					
					if(is_array($value)){
						
						$value = implode(", ", $value);

					}
					
					$field_options = $field->getOptions();
					if($field->mandatory == "yes"){
						echo "<p class='mandatory'>";
					} else {
						echo "<p>";
					}
					
					if(!empty($field->metadata_hint)){ ?>
						<span class='custom_fields_more_info' id='more_info_<?php echo $field->metadata_name; ?>'></span>		
						<span class="custom_fields_more_info_text" id="text_more_info_<?php echo $field->metadata_name; ?>"><?php echo $field->metadata_hint;?></span>
					<?php } ?>
					<label>
						<?php echo $field->getTitle(); ?><br />
					</label>
						<?php echo elgg_view("input/{$metadata_type}",array(
																'internalname' => "custom_profile_fields_" . $field->metadata_name,
																'value' => $value,
																'options' => $field_options
																)); ?>
					
					</p>
				
					<?php
				}
			}
		}
		
		if(get_plugin_setting("profile_icon_on_register", "profile_manager") == "yes"){
			echo elgg_view("input/profile_icon");
		}
		echo "<br />";
		echo elgg_echo("profile_manager:register:mandatory");
	?>
	
	</div>
	<script type="text/javascript">		
		$("#register-box form p:first").addClass("mandatory");
		$("#register-box form .mandatory>label br").before("*");
	</script>
	<?php
	} 
?>