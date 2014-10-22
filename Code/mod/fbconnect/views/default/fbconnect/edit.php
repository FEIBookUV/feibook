<?php
global $CONFIG;
global $fb;

$plugin_name = "fbconnect";
$consumer_key = get_plugin_setting('consumer_key', $plugin_name);
$consumer_secret = get_plugin_setting('consumer_secret', $plugin_name);
$appapikey = get_plugin_setting('api_key', $plugin_name);
$appsecret = get_plugin_setting('api_secret', $plugin_name);
$appid = get_plugin_setting('api_id', $plugin_name);
$perms = get_plugin_setting('perms', $plugin_name);
$facebook=get_plugin_setting('facebook', $plugin_name);
$twitter=get_plugin_setting('twitter', $plugin_name);

if ($facebook=="yes"){
$user = page_owner_entity();
$CONFIG->user = $user;
$cookie = get_facebook_cookie($appid, $appsecret);
$fb = fbconnect_client();
$location = get_info_location();
$work =  get_info_work($delim = ' ', $partDelim = ' | ');
$study = get_info_education($delim = ' ', $partDelim = ' | ');
$uid = $cookie['uid'];
$CONFIG->uid = $uid;
$arr = fbconnect_get_info_from_fb('first_name, last_name, email, pic_big');	   
$CONFIG->first_name = $arr['first_name'];
$CONFIG->last_name = $arr['last_name'];
$CONFIG->email = $arr['email'];
$CONFIG->pic_big = $arr['pic_big'];
$CONFIG->location = $location;
$CONFIG->work = $work;
$CONFIG->estudy = $study;
include("config/funcion.php");
$user = new User();
$username = limpiar_caracteres($CONFIG->first_name);
$lastname = limpiar_caracteres($CONFIG->last_name);
$work = limpiar_caracteres($CONFIG->work);
$location = limpiar_caracteres($CONFIG->location);
$userdata = $user->checkUser($uid, 'facebook', $username, $lastname, $CONFIG->email, $work, $location);
}
if (!($CONFIG->uid == "")) {
?>
    <script>
        $('input[name="contactemail"]').val("<?php echo $CONFIG->email; ?>");
	$('input[name="profile_icon"]').val("<?php echo $CONFIG->pic_big; ?>");
	$('input[name="location"]').val("<?php echo $CONFIG->location; ?>")	
        $('input[name="uid"]').val("<?php echo $CONFIG->uid; ?>");
	$('textarea[name="trabajo"]').val("<?php echo $CONFIG->work; ?>");
	$('textarea[name="escuela"]').val("<?php echo $CONFIG->estudy; ?>");
    </script>

<?php
} else {
    
    if ($facebook=="yes"){
    include("fblogin.php");

    ?>


    <script>
        FB.init({appId: '<? echo $appid ?>', status: true,
            cookie: true, xfbml: true});
        FB.Event.subscribe('auth.login', function(response) {

            window.top.location.href = "<? echo $CONFIG->wwwroot ?>pg/profile/<? echo $CONFIG->user ?>/edit";
        });
        FB.Event.subscribe('auth.logout', function(response) {

            window.top.location.reload();
        });

    </script>
<?php
}
}
?>
