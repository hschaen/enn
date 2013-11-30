<!-- Show #1 -->
<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>" class="otherShowsBorder">
<div class="otherShowsBox">
  <?php
      $featuredPosts = new WP_Query();
      $featuredPosts->query('showposts=1&cat=7');
      while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
  ?>
    			
  
    <div class="otherShowsThumb">

      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail');
              } 
      ?>
  </div><div class="otherShowsTitle">
    
      <?php echo get_the_category_by_id(7); ?>
  </div>
  <?php endwhile; ?>
</div>
</a>

<!-- Show #2 -->
<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>" class="otherShowsBorder">
<div class="otherShowsBox">
  <?php
      $featuredPosts = new WP_Query();
      $featuredPosts->query('showposts=1&cat=12');
      while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
  ?>	
  <div class="otherShowsThumb">
      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail');
              } 
      ?>
  </div>
  <div class="otherShowsTitle">
      <?php echo get_the_category_by_id(12); ?>
  </div>
  <?php endwhile; ?>
</div>
</a>
<!-- Show #3 -->
<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>" class="otherShowsBorder">
<div class="otherShowsBox">
  <?php
      $featuredPosts = new WP_Query();
      $featuredPosts->query('showposts=1&cat=13');
      while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
  ?>
  <div class="otherShowsThumb">
      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail');
              } 
      ?>
  </div>
  <div class="otherShowsTitle">
      <?php echo get_the_category_by_id(13); ?>
  </div>
  <?php endwhile; ?>
</div>
</a>
<!-- Show #4 -->
<a href="<?php the_permalink() ?>" alt="<?php the_title(); ?>" class="otherShowsBorder"> 
<div class="otherShowsBox">
  <?php
      $featuredPosts = new WP_Query();
      $featuredPosts->query('showposts=1&cat=14');
      while ($featuredPosts->have_posts()) : $featuredPosts->the_post(); 
  ?>
   			
  <div class="otherShowsThumb">
      <?php
          if ( has_post_thumbnail() ) {
              the_post_thumbnail('thumbnail');
              } 
      ?>
    </div>
    <div class="otherShowsTitle">
      <?php echo get_the_category_by_id(14); ?>
  </div>
  <?php endwhile; ?>
</div>
</a>