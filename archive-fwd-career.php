<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

        <header class="page-header">
            <h1 class="page-title"><?php the_archive_title(); ?></h1>
            <?php
            the_archive_description( '<div class="archive-description">', '</div>' );
            ?>
        </header><!-- .page-header -->

        <?php
        // Display all career posts
        $args = array(
            'post_type'         => 'fwd-career',
            'posts_per_page'    => -1,
        );
        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {
            while( $query->have_posts() ) {
                $query->the_post(); 
                ?>
                <article>
                    <a href="<?php the_permalink(); ?>">
                        <h2><?php the_title(); ?></h2>
                    </a>
                    <?php
                    if ( function_exists ( 'get_field' ) ) {
                
                        // Career Title
                        if ( get_field( 'career-title' ) ) {
                            echo '<h3>' . get_field( 'career-title' ) . '</h3>';
                        }

                        // Role Description
                        if ( get_field( 'role_description' ) ) {
                            echo '<h4>Description</h4>' . '<p>' . get_field( 'role_description' ) . '</p>';
                        }

                        // Requirements
                        if ( get_field( 'requirements' ) ) {
                            echo '<h4>Requirements</h4>' . '<p>' . get_field( 'requirements' ) . '</p>';
                        }

                        // Location
                        if ( get_field( 'location' ) ) {
                            echo '<h4>Location</h4>' . '<p>' . get_field( 'location' ) . '</p>';
                        }

                        // How to Apply
                        if ( get_field( 'how_to_apply' ) ) {
                            echo '<h4>How to apply?</h4>' . '<p>' . get_field( 'how_to_apply' ) . '</p>';
                        }
                    }
                    ?>
                </article>
                <?php
            }
            wp_reset_postdata();
            echo '</section>';
        }

    ?>
	</main><!-- #primary -->

<?php
get_footer();
