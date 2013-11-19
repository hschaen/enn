<?php
/* Template Name: ENN Homepage 
*/
get_header("enn"); ?>
<div style="width:100%; height:400px; background:#818181;">
    <div style="width:50%; height:340px;  border:none; padding:50px 0 0 50px; text-align:center; float:left;">
        <div style="height:320px; width:100%; background:#000000;">
        <?php
		$my_query = new WP_Query('showposts=1');
while ($my_query->have_posts()) : $my_query->the_post();
	$do_not_duplicate = $post->ID;
	
	global $getWP,$post,$tern_wp_youtube_options,$post;
	$o = $getWP->getOption('tern_wp_youtube',$tern_wp_youtube_options);
	$v = get_post_meta($post->ID,'_tern_wp_youtube_video',true);
	$s = '<iframe title="YouTube video player" width="'.$o['dims'][0].'" height="'.$o['dims'][1].'" src="'.tern_wp_youtube_video_link($v,false).'" frameborder="0" allowfullscreen allowTransparency="true"></iframe>';
	echo $s; ?>
		
        </div>
    </div>
<div style="width:50%;  padding:20px; float:right;">
<h1><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h1><p><?php the_excerpt(); ?></p><?php 
endwhile;
wp_reset_query();
?>
</div>
</div>
<div style="background:#515151; height:auto; padding:20px; width:100%; ">
	<div style="width:90%; text-align:center; margin:0 auto; height:auto;"><?php echo TCHPCSCarousel(); ?></div>
    </div>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
						<div class="entry-thumbnail">
							<?php the_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<?php /*?><h1 class="entry-title"><?php the_title(); ?></h1><?php */?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>