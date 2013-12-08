<?php get_header(); ?>

<section id="main">
	<section id="content" class="featuredContent">
    	<div id="messageSystem" class="msInactive">
        	<?php get_template_part('messageSystem'); ?>
        </div>
        <div id="featuredContent">
        	<?php if (option::get('featured_enable') == 'on' && is_home() && $paged < 2) { get_template_part('wpzoom', 'slider'); } // Show the Featured Slider? ?>
		    </div>
        <div class="showsWithSidebar">
		      <?php if (option::get('sidebar_home') == 'off') { echo "<div class=\"full\">"; } ?>
          <?php if ($paged < 2) { ?>
            <!-- SHOWS -->
    		    <?php get_template_part('shows'); ?>
            <!-- END SHOWS -->
            <?php get_template_part('categoryLists'); ?>
            <!-- START SIDEBAR -->
            <?php if (option::get('sidebar_home') == 'off') { echo "</div>"; } ?>
        		<?php if (option::get('sidebar_home') == 'on') { ?>
        		<?php if ($paged < 2) { get_sidebar(); } else { get_sidebar("second"); } ?>
        		<?php } ?>
        		<!-- END SIDEBAR -->
          <?php } ?>
        </div>
   </section><!-- /featureContent -->
   <section id="content" class="subContent">
   	<?php get_template_part('postScrollers'); ?>
   </section>
</section><!-- /#main -->
<?php get_footer(); ?>