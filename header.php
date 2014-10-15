<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title('&raquo;', true, 'right'); ?> <?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
<meta name="description" content="A creative studio providing casting, directing, studio, voice production, performance capture and localisation services." />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/foundation.min.css" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Kameron|Open+Sans:400,700,800">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<!--[if lte IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/columns.js"></script>
<![endif]-->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<meta name="google-site-verification" content="2MZWL0rVlqYOJ2QPVZGE_RThYLVMro9ZIs-u-KcRr9A" />
<meta name="google-site-verification" content="3qn7Fwqh0BxkbpJ4Mq9DTDJ6nIM8Vf521yoO-y_767I" />

<?php wp_head(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
	if(is_single()) {
		$twitter_url = get_permalink();
		$twitter_title = get_the_title();
		$twitter_desc = get_the_excerpt();
		$twitter_thumbs = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), slider );
		$twitter_thumb  = $twitter_thumbs[0];
?>
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="@SideUK">
<meta name="og:title" content="<?php echo $twitter_title; ?>">
<meta name="twitter:url" content="<?php echo $twitter_url; ?>">
<meta name="twitter:domain" content="<?php bloginfo('url'); ?>">
<meta name="twitter:description" content="<?php echo $twitter_desc; ?>">
<meta name="twitter:creator" content="@SideUK">
<meta name="twitter:app:id:iphone" content="">
<meta name="twitter:app:id:ipad" content="">
<meta name="twitter:app:id:googleplay" content="">
<meta name="twitter:app:url:iphone" content="">
<meta name="twitter:app:url:ipad" content="">
<meta name="twitter:app:url:googleplay" content="">
<meta name="twitter:image" content="<?php echo $twitter_thumb; ?>">
<meta property="og:title" content="<?php echo $twitter_title; ?>" />
<meta property="og:type" content="article" />
<meta property="og:image" content="<?php echo $twitter_thumb; ?>" />
<meta property="og:url" content="<?php echo $twitter_url; ?>" />
<meta property="og:description" content="<?php echo $twitter_desc; ?>" />
<meta property="title" content="<?php echo $twitter_title; ?>" />
<meta property="type" content="article" />
<meta property="image" content="<?php echo $twitter_thumb; ?>" />
<meta property="url" content="<?php echo $twitter_url; ?>" />
<meta property="description" content="<?php echo $twitter_desc; ?>" />
<?php		
	}
?>
<?php endwhile; else :  endif; ?>
</head>

<body <?php body_class(); ?> itemscope itemtype="http://schema.org/CreativeWork">

<div id="container">

<div class="row" id="header">
	<div class="large-2 columns">
		<h1 class="logo"><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/Side-Logo.png" title="<?php the_title(); ?>" class="logo" /></a></h1>
	</div>
	<div class="large-5 columns">
		<?php if(is_archive()||is_single()) { ?>
			<div class="hide-for-small description"><h4>A creative studio, producing award winning<br />character performances for video games.</h4></div>
		<?php } else { ?>
			<div class="hide-for-small description"><h4><?php global $post; $year = get_post_meta( $post->ID, '_cmb_test_title', true ); echo $year;  ?></h4></div>
		<?php } ?>
	</div>
	<div class="large-5 columns"> </div>
</div>

<div class="row">
	<div class="contain-to-grid large-12 columns">
	<nav class="top-bar">
		<ul class="title-area">
			<li class="name"> </li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<?php foundation_nav_bar(); ?>
			<ul class="right">
				<li><a href="https://www.facebook.com/SideLondon"><i class="side-facebook"></i></a></li>
				<li><a href="http://www.twitter.com/SideUK"><i class="side-twitter"></i></a></li>
			</ul>
		</section>
	</nav>
	</div>
</div>


