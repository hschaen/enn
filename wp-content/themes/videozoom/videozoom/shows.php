<div id="showsContainer">
			<div id="showsInnerWrapper">
					<h1>Shows</h1>
                    
                    <!-- Featured Show -->
                    
					<?php
                        global $post;
                        $featuredPosts = new WP_Query();
                        $featuredPosts->query('showposts=1&cat=9');
                        while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
                    ?>
                    	<div class="showsFeatured">
                        	<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
							<?php
								if ( has_post_thumbnail()) {
   $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large');
   echo '<img src="' . $large_image_url[0] . '" title="' . the_title_attribute('echo=0') . '" width="100%" height="auto" >';
								}?>
                             <div class="featuredShowTitle">
							 	<?php echo get_the_category_by_id(9); ?>
                             </div>
                             </a>
                        </div>
                         <div class="listOfShows visible-xs">
            	<?php get_template_part('listOfShows'); ?>
            </div>       
					<?php endwhile; ?>
                    
                    <!-- List of Shows -->
                    
					
			</div>
            <!-- End Shows Inner Wrapper -->
            <!-- Other Shows -->
            <div class="otherShows">
            	<?php get_template_part('otherShows'); ?>
            </div> 
            </div>