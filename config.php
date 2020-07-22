<?php

session_start();

# App

define( 'APP_NAME', 'DailyData' );
define( 'APP_MAIL', 'dailydata20@gmail.com' );
define( 'LAUNCH_TIME', '2020-07-30 00:00:00' );

# Socials

define( 'FB_LINK', '' );
define( 'TW_LINK', '' );
define( 'PI_LINK', '' );

function env( $key ){
	$key = strtoupper($key);
	if( defined($key) ){
		echo eval("return $key;");
	}
}