<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">
        <h1>Services</h1>

        <?php
            the_content();

            $terms = get_terms( 
                array(
                    'taxonomy' => 'fwd-service-category',
                ) 
            );
            if ( $terms && ! is_wp_error($terms) ) :                
                ?>

                <section>
                    <?php
                    $args = array(
                        'post_type'      => 'fwd-service',
                        'posts_per_page' => -1,
                        'order'          => 'ASC',
                        'orderby'        => 'title'
                    );
                    
                    $query = new WP_Query( $args );
                    
                    if ( $query -> have_posts() ) {

                        while ( $query -> have_posts() ) {
                            $query -> the_post();
                            echo '<a href="#'. esc_attr( get_the_ID() ) .'">'. esc_html( get_the_title() ) .'</a>';
                        }
                        wp_reset_postdata();
                    }

                    // Iterate over the Service Categories
                    foreach ( $terms as $term ) :
                        
                        // E.G. <h2>Digital Marketing (2)</h2>  where 2 is the number of posts
                        echo '<h2>' . esc_html( $term->name ) . ' (' . esc_html($term->count) . ')</h2>';

                        // Output posts from that specific category
                        $args = array(
                            'post_type'      => 'fwd-service',
                            'posts_per_page' => -1,
                            'order'             => 'ASC',
                            'orderby'           => 'title',
                            'tax_query'         => array(
                                array(
                                    'taxonomy' => 'fwd-service-category',
                                    'field'    => 'slug',
                                    'terms'    => $term,
                                ),
                            ),                            
                        );

                        $query = new WP_Query( $args );

                        if ( $query->have_posts() ) {
                            while( $query->have_posts() ) {
                                $query->the_post();
                                echo "<p>"
                                    . "<h2>" . esc_html__( get_the_title() ) . "</h2>"
                                    .  esc_html__( get_field('service_description') )
                                    . "</p>";
                            }
                            wp_reset_postdata();
                        }                        
                        
                    endforeach;
                    ?>
                </section>
            <?php endif;
        ?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
