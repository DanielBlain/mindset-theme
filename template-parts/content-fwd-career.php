<?php
/**
 * Template part for displaying Career posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mindset_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
        ?>
	</header><!-- .entry-header -->

	<?php fwd_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

        if ( function_exists ( 'get_field' ) ) {
    
            if ( get_field( 'career_title' ) ) {
                the_field( 'career_title' );
            }
    
            if ( get_field( 'role_description' ) ) {
                the_field( 'role_description' );
            }
    
            if ( get_field( 'requirements' ) ) {
                the_field( 'requirements' );
            }
    
            if ( get_field( 'location' ) ) {
                the_field( 'location' );
            }
    
            if ( get_field( 'how_to_apply' ) ) {
                the_field( 'how_to_apply' );
            }
        } 

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fwd' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fwd_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
