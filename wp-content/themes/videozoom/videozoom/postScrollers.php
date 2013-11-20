<!-- START POSTS SCROLLERS -->
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
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Page: Content Widgets') ) : ?>
        <?php endif; ?>
        <?php if (option::get('sidebar_home') == 'off') { echo "</div>"; } 
    	} //if $paged < 2 
    	?> 
        </div><!-- /#archive -->
     <!--END POST SCROLLERS -->