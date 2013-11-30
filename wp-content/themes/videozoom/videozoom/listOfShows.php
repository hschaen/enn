<p class="listOfShowsTitle">List of Shows:</p>
<form action="" method="" id="">
<?php
$args = array(
	'show_option_all'    => '',
	'show_option_none'   => '',
	'orderby'            => 'NAME', 
	'order'              => 'DESC',
	'show_count'         => 0,
	'hide_empty'         => 0, 
	'child_of'           => 0,
	'include'            => '7,9,12,13,14',
	'echo'               => 1,
	'selected'           => 0,
	'hierarchical'       => 0, 
	'name'               => 'cat',
	'id'                 => '',
	'class'              => 'postform',
	'depth'              => 0,
	'tab_index'          => 0,
	'taxonomy'           => 'category',
	'hide_if_empty'      => false,
        'walker'             => ''
		);
wp_dropdown_categories( $args ); ?> 
<input id="submit" type="submit" placeholder="submit" />
</form>