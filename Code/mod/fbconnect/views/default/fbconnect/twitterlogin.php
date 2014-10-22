<?/* este cofigo es para mostrar el botón de login Twitter*/?>
 <div id="twitterlogin-box"><a id="twitterlogin_show" href="<?php echo $twitterObj->getAuthorizeUrl(null, $params) ?>"><img src="<?php echo $vars['url']; ?>mod/fbconnect/graphics/sign_in_with_twitter.gif" alt="Twitter" /></a></div>
