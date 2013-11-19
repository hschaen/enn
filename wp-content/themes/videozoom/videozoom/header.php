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
<?php if (option::get('ad_head_select') == 'on') { ?>
				<?php /*?><div id="bannerHead">

					<?php if ( option::get('ad_head_code') <> "") {
						echo stripslashes(option::get('ad_head_code'));
					} else { ?>
						<p align="center"><a href="<?php echo option::get('banner_top_url'); ?>"><img src="<?php echo option::get('banner_top'); ?>" alt="<?php echo option::get('banner_top_alt'); ?>" /></a></p>
					<?php } ?>

				</div><?php */?><!-- /#topad -->
			<?php } ?>
	<div id="topNav">

		<?php /*?><?php if (option::get("social_icons") == 'on') {?>
			<ul id="menuSocial">

				<?php if (option::get('social_rss') == 'on') { ?>
					<li>
						<a href="<?php if (strlen(option::get('misc_feedburner')) < 10) { bloginfo('rss2_url');} else { echo option::get('misc_feedburner'); } ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/rss.png" width="25" height="25" alt="<?php echo option::get('social_rss_title'); ?>" /><?php echo option::get('social_rss_title'); ?></a>
					</li>
				<?php } ?>

				<?php if (option::get('social_twitter_show') == 'on') { ?>
					<li>
						<a href="http://twitter.com/<?php echo option::get('social_twitter'); ?>" rel="external,nofollow"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/twitter.png" width="25" height="25" alt="<?php echo option::get('social_twitter_title'); ?>" ><?php echo option::get('social_twitter_title'); ?></a>
					</li>
				<?php } ?>

				<?php if (option::get('social_facebook_show') == 'on') { ?>
					<li>
						<a href="<?php echo option::get('social_facebook'); ?>" rel="external,nofollow"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/facebook.png" width="25" height="25" alt="<?php echo option::get('social_facebook_title'); ?>" ><?php echo option::get('social_facebook_title'); ?></a>
					</li>
				<?php } ?>
                
               
					<li>
						<a href="http://www.youtube.com/user/ThatsSoGayLIVE?feature=watch" rel="external,nofollow"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/youtube.png" width="25" height="25" alt="ENN @ Thatssogaylive on YouTube" ></a>
					</li>
				

 			</ul>
		<?php } ?><?php */?>
<?php 
 echo '<div style="float:left;">
	<img src="http://harrisonschaen.com/enn/wp-content/uploads/2013/10/ENN-Logo-FINAL1.png" height="120" width="120"></div>'
	 ?>
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
        <div id="search-form"><?php get_search_form(); ?></div>
	<div id="topnav-bg"></div>
 	</div><!-- /#topNav -->

	