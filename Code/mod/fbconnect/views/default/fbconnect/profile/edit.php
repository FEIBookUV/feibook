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
/*include("config/funcion.php");
$user = new User();
$userdata = $user->checkUser($uid, 'facebook', $CONFIG->first_name, $CONFIG->email);*/
}   
if ($twitter=="yes"){
session_start();
$tok = $_SESSION['tok'];
$sec = $_SESSION['sec'];

if ((isset($tok)) and (isset($sec))) {


    $twitterObj = new EpiTwitter($consumer_key, $consumer_secret, $tok, $sec);
    $twitterInfo = $twitterObj->get_accountVerify_credentials();
    $twitterInfo->response;
    $CONFIG->twitter = $sec;
    $CONFIG->name = $twitterInfo->name;
    $CONFIG->email = $twitterInfo->email;	
    $CONFIG->screen_name = $twitterInfo->screen_name;
}

if (!($CONFIG->twitter == "")) {
?>

    <script>
        $('input[name="twitter"]').val("<?php echo $CONFIG->twitter; ?>");
        $('input[name="username"]').val("<?php echo $CONFIG->screen_name; ?>");
        $('input[name="name"]').val("<?php echo $CONFIG->name; ?>");
	$('input[name="email"]').val("<?php echo $CONFIG->email	; ?>");	

    </script>
<?php
} else {

    $oauth_token = $_GET['oauth_token'];
    $twitterObj = new EpiTwitter($consumer_key, $consumer_secret);

    if (isset($oauth_token)) {

        $twitterObj->setToken($oauth_token);
        $token = $twitterObj->getAccessToken();
        $twitterObj->setToken($token->oauth_token, $token->oauth_token_secret);
        $twitterInfo = $twitterObj->get_accountVerify_credentials();
        $twitterInfo->response;
        $_SESSION['tok'] = $token->oauth_token;
        $_SESSION['sec'] = $token->oauth_token_secret;
?>
        <script>
            window.top.location.reload();
        </script>
<?
    }


    $params = array("oauth_callback" => $CONFIG->wwwroot."pg/register");
    $twitterObj = new EpiTwitter($consumer_key, $consumer_secret);
    include('twitterlogin.php');
}
}
if (!($CONFIG->uid == "")) {
?>
    <script>
        $('input[name="email"]').val("<?php echo $CONFIG->email; ?>");
        $('input[name="username"]').val("<?php echo $CONFIG->first_name; ?>");
        $('input[name="name"]').val("<?php echo $CONFIG->first_name." ". $CONFIG->last_name; ?>");
	$('input[name="profile_icon"]').val("<?php echo $CONFIG->pic_big; ?>");
	$('input[name="custom_profile_fields_location"]').val("<?php echo $CONFIG->location; ?>")	
        $('input[name="uid"]').val("<?php echo $CONFIG->uid; ?>");
	$('textarea[name="custom_profile_fields_trabajo"]').val("<?php echo $CONFIG->work; ?>");
	$('textarea[name="custom_profile_fields_escuela"]').val("<?php echo $CONFIG->estudy; ?>");
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

            window.top.location.href = "<? echo $CONFIG->wwwroot ?>pg/profile/%s/edit";
        });
        FB.Event.subscribe('auth.logout', function(response) {

            window.top.location.reload();
        });

    </script>
<?php
}
}
?>
