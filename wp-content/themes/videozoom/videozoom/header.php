<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
   	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php ui::title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
    <?php ui::js("jwplayer"); ?>
    <?php ui::js("jquery.fitvid"); ?>

</head>

<body <?php body_class(); ?>>
	<div id="container">
		<header>
			<nav id="topNav">
				<div id="logo" class="main" onClick="javascript: window.location='/enn/'"></div>
					<?php if (has_nav_menu( 'secondary' )) {
						wp_nav_menu(array(
							'container' => '',
							'container_class' => '',
							'menu_class' => 'dropdown',
							'menu_id' => 'topMenu',
							'sort_column' => 'menu_order',
							'theme_location' => 'secondary'
						));
					} ?>
				
        		<div id="search-form">
        			<?php get_search_form(); ?>
        		</div>
				<div id="topnav-bg"></div>
 			</nav<!-- /#topNav -->
 		</header>