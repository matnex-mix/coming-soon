<?php

include('config.php');

if( !empty($_POST['email']) && preg_match('/^.{5,}@\w{2,}\.\w{2,}$/', $_POST['email']) ){
	$sp = file_get_contents('.php');

	if( strpos($sp, $_POST['email'])!==FALSE ){
		$_SESSION['msg'] = "You've subscribed already. Thank you.";
	} else {
		file_put_contents('.php', $sp."\n".$_POST['email']);
		$_SESSION['msg'] = "Subscription was successful";
	}
} else {
	$_SESSION['msg'] = "Please the form completely and correctly";
}

header('Location: index.php');