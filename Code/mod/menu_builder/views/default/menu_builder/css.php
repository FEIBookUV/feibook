<?php ?>
#menu_builder_menu {
	background: white;
	padding: 5px 20px 0px;
	margin-bottom: 5px;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
}

#menu_builder_menu ul {
	list-style-type: none;
	margin: 0;
	padding: 0;
}

#menu_builder_menu li {
	margin: 0;
	padding: 4px 0;
	list-style: none;
	float: left;
	position: relative;
	list-style: none;
	background: #4690D6;	
}



#menu_builder_menu>ul>li {
	margin-right: 5px;
	height: 17px;
	
	
	-moz-border-radius-topleft:8px;
	-moz-border-radius-topright:8px;
	-webkit-border-top-right-radius:8px;
	-webkit-border-top-left-radius:8px;
	
	border-top: 1px solid transparent;
	border-left: 1px solid transparent;
	border-right: 1px solid transparent;
	
	z-index: 30;
}

#menu_builder_menu ul ul li {
	border-bottom: 1px solid #333333;
	white-space: nowrap;
	float: none;
	display: block;
}

#menu_builder_menu ul ul {
	border-top: 1px solid #333333;
	border-left: 1px solid #333333;
	border-right: 1px solid #333333;
	background: #4690D6;
	min-width: 100%;
	position: absolute;
	left: -1px;
	top: 100%;
	display: none;
	<!-- 
		/* ie fix */
		left: 0px;
	-->
}

#menu_builder_menu li a {
	padding: 0 5px;
	color: #FFFFFF;
	text-decoration: none;
	white-space: nowrap;
	margin: 0px;	
}

#menu_builder_menu a.menu_builder_menu_edit {
	vertical-align: sub;
	padding: 0px 0px 0px 5px;
}

#menu_builder_menu li.menu_builder_menu_selected {
	background: #0054A7;
}

#menu_builder_menu li:hover {
	background: #333333;
}

#menu_builder_menu li.menu_builder_menu_add {
	text-align: center;
}

#menu_builder_menu span.menu_builder_action {
	width: 16px;
	height: 16px;
	background: transparent url(<?php echo $vars['url']; ?>mod/menu_builder/_graphics/actions.png) no-repeat top left;
	display: inline-block;
	
}

#menu_builder_menu span.menu_builder_action_add {
	background-position: -112px 0px;
}

#menu_builder_menu span.menu_builder_action_edit {
	background-position: -32px 0px;
}

#menu_builder_edit_mode {
	display: inline-block;
	padding: 4px 0px;
	color: #CCCCCC;
	text-decoration: none;
}

#menu_builder_edit_mode:hover{
	color: #333333;
}

#menu_builder_menu .menu_builder_menu_main_placeholder {
	border-top: 1px dashed #333333;
	border-left: 1px dashed #333333;
	border-right: 1px dashed #333333;
	
	margin-right: 5px;
	padding: 4px 0px;
	-moz-border-radius-topleft:8px;
	-moz-border-radius-topright:8px;
	-webkit-border-top-right-radius:8px;
	-webkit-border-top-left-radius:8px;
	background: transparent;
}

#menu_builder_menu .menu_builder_menu_sub_placeholder {
	border-bottom: 1px dashed #333333;
}

#menu_builder_add_form {
	padding: 10px;
}

#menu_builder_add_form table {
	width: 100%;
}

