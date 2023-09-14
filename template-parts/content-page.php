<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mindset_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fwd' ),
				'after'  => '</div>',
			)
		);

        if ( function_exists ( 'get_field' ) ) {
    
            if ( get_field( 'address' ) ) {
                esc_html( the_field( 'address' ), 'fwd' );
            }
    
            if ( get_field( 'email' ) ) {
                $email = get_field( 'email' );
                $mailto = 'mailto:' . $email;
                ?>
                <p><a href="<?php echo esc_url( $mailto ); ?> "><?php echo esc_html( $email ); ?></a></p>
                <?php
            }
        } 
        ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php fwd_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
