<?php
global $CONFIG;
$plugin_name = "fbconnect";
$appapikey = get_plugin_setting('api_key', $plugin_name);
$appsecret = get_plugin_setting('api_secret', $plugin_name);
$appid = get_plugin_setting('api_id', $plugin_name);
$perms = get_plugin_setting('perms', $plugin_name);
$facebook=get_plugin_setting('facebook', $plugin_name);
$user = page_owner_entity();
$CONFIG->user = $user;
if ($facebook=="yes"){
$cookie = get_facebook_cookie($appid, $appsecret);
if ($cookie) {
    if (!isloggedin()) {
        $uid = $cookie['uid'];
        $CONFIG->uid = $uid;
        $elgg_user = get_entities_from_metadata('uid', $uid);
        $elgg_user = $elgg_user[0];
        if ($elgg_user->guid) {
            $elgg_user = get_user($elgg_user->guid);
            login($elgg_user);
        } else {
?>
   	<h3>Bienvenido  <?php echo $uid; ?><br>
	<?php $tempuser = $_SESSION['user']; ?>
<a href="<?php echo $CONFIG->wwwroot.'pg/profile/'.$tempuser->username.'/edit'; ?>"><?php echo elgg_echo('fbconnect:user_settings_description'); ?></a><br> 
            <a href="javascript:FB.logout();"> Salir  </h3> </a>

<?
      }
    }
?>


<?
} else {
?>
<?
?>

<?
}
}
?>

<?
if ($facebook=="yes"){
include('fblogin.php');
}

?>

<script>
    FB.init({appId: '<? echo $appid ?>', status: true,
        cookie: true, xfbml: true});
    FB.Event.subscribe('auth.login', function(response) {
 
        window.top.location.href = href = "<? echo $CONFIG->wwwroot.'pg/profile/'.$_SESSION['username'].'/edit'; ?>";
    });
    FB.Event.subscribe('auth.logout', function(response) {
 
        window.top.location.reload();
    });
</script>
