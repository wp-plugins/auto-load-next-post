<?php
/**
 * This file loads the content partially.
 */

$remove_comments = get_option( 'auto_load_next_post_remove_comments' );

// Load content before the loop.
do_action( 'alnp_load_before_loop' );

// Check that there are more posts to load.
while ( have_posts() ) : the_post();

	$post_format = get_post_format(); // Post Format e.g. video
	if ( false === $post_format ) {
		$post_format = 'standard';
	}

	// Load content before the post content.
	do_action( 'alnp_load_before_content' );

	// Load content before the post content for a specific post format.
	do_action( 'alnp_load_before_content_type_' . $post_format );

	// Include the content
	get_template_part( 'content', get_post_format() );

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		if ( $remove_comments != 'yes' ) { comments_template(); }
	endif;

	// Load content after the post content for a specific post format.
	do_action( 'alnp_load_after_content_type_' . $post_format );

	// Load content after the post content.
	do_action( 'alnp_load_after_content' );
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'auto-load-next-post' ); ?></h1>

		<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'auto-load-next-post' ) . '</span> %title' ); ?></span>
		<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'auto-load-next-post' ) . '</span>' ); ?></span>
	</nav><!-- .post-navigation -->
	<?php

// End the loop.
endwhile;

// Load content after the loop.
do_action( 'alnp_load_after_loop' );
