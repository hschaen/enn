<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
   	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title><?php ui::title(); ?></title>

	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />
	<!-- Bootstrap core CSS -->
    <link href="/enn/wp-content/themes/videozoom/videozoom/bootstrap/dist/css/bootstrap.css" rel="stylesheet">

    <!--[if lt IE 9]><script src="/wp-content/bootstrap/docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php wp_head(); ?>
    <?php ui::js("jwplayer"); ?>
    <?php ui::js("jquery.fitvid"); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
</head>

<body <?php body_class(); ?>>
	<div id="container">
		<header>
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				      <span class="sr-only">Toggle navigation</span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
				      <span class="icon-bar"></span>
    				</button>
   					<a class="navbar-brand" href="#"></a>
				</div>

				<script>
				$(document).ready(function(){
					$("ul.sub-menu").each(function(){
					$(this).removeClass('sub-menu').addClass('dropdown-menu');
					}),

					$("li.dropdown > a").each(function(){
						$(this).addClass('dropdown-toggle');
						$(".dropdown-toggle").attr("data-toggle", "dropdown");
					}),

					$("a.dropdown-toggle").each(function(){
						$(this).append("<b class='caret'></b>");
					}),

					$("li.dropdown-submenu > a").each(function(){
						$(this).attr("tabindex","-1");
					});
				});
				</script>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<?php if (has_nav_menu( 'secondary' )) {
						wp_nav_menu(array(
							'container' => '',
							'container_class' => '',
							'container_id' => '',
							'menu_class' => 'nav navbar-nav',
							'menu_id' => '',
							'sort_column' => 'menu_order',
							'theme_location' => 'secondary'
						));
					} ?>
					<form class="navbar-form navbar-left" role="search">
			        	<div class="form-group">
			        		<input type="text" class="form-control" placeholder="Search">
			     		</div>
      					<button type="submit" class="btn btn-default">Submit</button>
    				</form>
				</div>
			</nav>
        		<!-- <div id="search-form">
        			<?php get_search_form(); ?>
        		</div> -->
				<div id="topnav-bg"></div>
 			</nav<!-- /#topNav -->
 			
 		</header>