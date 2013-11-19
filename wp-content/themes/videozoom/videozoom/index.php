<?php get_header(); ?>
 
<div id="main">
   <div class="wrapper">
   	<div id="content">
    	<div id="messageSystem" class="msInactive">
        <?php get_template_part('messageSystem'); ?>
        </div>
        <div id="featuredContent">
        <?php if (option::get('featured_enable') == 'on' && is_home() && $paged < 2) { get_template_part('wpzoom', 'slider'); } // Show the Featured Slider? ?>
		</div>
		<?php if (option::get('sidebar_home') == 'off') { echo "<div class=\"full\">"; } ?>
        <?php if ($paged < 2) { ?>
        <!-- SHOWS -->
		<?php get_template_part('shows'); ?>
        <!-- END SHOWS -->
        <!-- START SIDEBAR -->
        <?php if (option::get('sidebar_home') == 'off') { echo "</div>"; } ?>
		<?php if (option::get('sidebar_home') == 'on') { ?>
		<?php if ($paged < 2) { get_sidebar(); } else { get_sidebar("second"); } ?>
		<?php } ?>
		<!-- END SIDEBAR -->
		<?php } ?>
		<?php if (option::get('recent_posts') == 'on') { // Display Recent Posts ?>
		<?php
			global $query_string; // required
			/* Exclude categories from Recent Posts */
			if (option::get('recent_part_exclude') != 'off') {
				if (count(option::get('recent_part_exclude'))){
					$exclude_cats = implode(",-",option::get('recent_part_exclude'));
					$exclude_cats = '-' . $exclude_cats;
					$args['cat'] = $exclude_cats;
					}
				}
			/* Exclude featured posts from Recent Posts */
			if (option::get('hide_featured') == 'on') {
				$featured_posts = new WP_Query( 
					array(
						'post__not_in' => get_option( 'sticky_posts' ),
						'posts_per_page' => option::get('slideshow_posts'),
						'meta_key' => 'wpzoom_is_featured',
						'meta_value' => 1
						) 
				);
				while ($featured_posts->have_posts()) {
					$featured_posts->the_post();
					global $post;
					$postIDs[] = $post->ID;
				}
				$args['post__not_in'] = $postIDs;
			}
			$args['paged'] = $paged;
			if (count($args) >= 1) {
				query_posts($args);
			}
		?>
		<?php if (option::get('sidebar_home') == 'off') { echo "<div class=\"full\">"; } ?>
		<?php /*?> 
		<div id="postFuncs">
			<div id="funcStyler">
				<?php if (option::get('post_switcher') == 'on') { ?><a href="javascript: void(0);" id="mode" <?php if ($_COOKIE['mode'] == 'list') echo 'class="flip"'; if (!isset($_COOKIE['mode']) && option::get('post_layout') == 'Grid') { echo ' '; }  if (!isset($_COOKIE['mode']) && option::get('post_layout') == 'List') { echo 'class="flip"';}?>></a><?php } ?>
			</div>
			<?php if (!is_home()) { 
				echo '<h2>'; wpzoom_breadcrumbs(); echo'</h2>'; 
			} 
			else { ?>
			<h1><?php echo option::get('recent_title'); ?></h1>
			<?php } ?>
		</div>
		<!-- /#postFuncs -->
		<?php */?>
			<?php /*?>
            <?php get_template_part('loop'); ?>
            <?php get_template_part( 'pagination'); ?>
            <?php } // Display Recent Posts ?>
            <?php if ($paged < 2) { 
                if (option::get('sidebar_home') == 'off') { echo "<div class=\"full\">"; }
                if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Homepage: Content Widgets') ) : ?>
                <?php endif; ?>
                <?php if (option::get('sidebar_home') == 'off') { echo "</div>"; 
            }
            }
            else
            {
                if (option::get('sidebar_home') == 'off') { echo "<div class=\"full\">"; 
            }
            <?php */?>
            <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page: Content Widgets') ) : ?>
            <?php endif; ?>
            <?php if (option::get('sidebar_home') == 'off') { echo "</div>"; 
				}
			}
	   	 //if $paged < 2 ?> 
        </div><!-- /#archive -->
    </div>
   </div><!-- /.wrapper -->
</div><!-- /#main -->
<?php get_footer(); ?>