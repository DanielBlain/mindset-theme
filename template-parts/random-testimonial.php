<?php
/**
 * Template part for displaying a randomly chosen testimonial
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mindset_Theme
 */
?>

<article>
    <h2>What they say..</h2>

    <?php
        $args = array(
            'post_type'         => 'fwd-testimonial',
            'posts_per_page'    => 1,
            'orderby'          => 'rand',
        );

        $query = new WP_Query( $args );

        if ( $query -> have_posts() ) {
            while ( $query -> have_posts() ) {
                $query -> the_post();
                the_content();
            }
            wp_reset_postdata();
        }
    ?>
</article>
