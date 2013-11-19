<!-- Show #1 -->
<div class="otherShowsBox">
  <?php
      $featuredPosts = new WP_Query();
      $featuredPosts->query('showposts=1&cat=7');
      while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
  ?>
    			
  <div class="otherShowsThumb">
      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail');
              } 
      ?>
      </a>
  </div>
  <div class="otherShowsTitle">
    <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
      <?php echo get_the_category_by_id(7); ?>
    </a>
  </div>
  <?php endwhile; ?>
</div>

<!-- Show #2 -->
<div class="otherShowsBox">
  <?php
      $featuredPosts = new WP_Query();
      $featuredPosts->query('showposts=1&cat=12');
      while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
  ?>
    			
  <div class="otherShowsThumb">
      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail');
              } 
      ?>
      </a>
  </div>
  <div class="otherShowsTitle">
    <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
      <?php echo get_the_category_by_id(12); ?>
    </a>
  </div>
  <?php endwhile; ?>
</div>

<!-- Show #3 -->
<div class="otherShowsBox">
  <?php
      $featuredPosts = new WP_Query();
      $featuredPosts->query('showposts=1&cat=13');
      while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
  ?>
    			
  <div class="otherShowsThumb">
      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail');
              } 
      ?>
      </a>
  </div>
  <div class="otherShowsTitle">
    <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
      <?php echo get_the_category_by_id(13); ?>
    </a>
  </div>
  <?php endwhile; ?>
</div>

<!-- Show #4 -->
<div class="otherShowsBox">
  <?php
      $featuredPosts = new WP_Query();
      $featuredPosts->query('showposts=1&cat=14');
      while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
  ?>
    			
  <div class="otherShowsThumb">
      <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail');
              } 
      ?>
      </a>
  </div>
  <div class="otherShowsTitle">
    <a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>">
      <?php echo get_the_category_by_id(14); ?>
    </a>
  </div>
  <?php endwhile; ?>
</div>