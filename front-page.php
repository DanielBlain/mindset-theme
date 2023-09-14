<?php
/**
 * The template for displaying the front page
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

		<?php while ( have_posts() ) : the_post(); ?>

            <h1><?php the_title(); ?></h1>

            <section class="home-intro">
                <?php
                    if ( function_exists ( 'get_field' ) ) {
                        if ( get_field( 'top_section' ) ) {
                            the_field( 'top_section' );
                        }
                    }
                ?>
            </section>
            <?php
                $args = array(
                    'post_type'         => 'fwd-work',
                    'posts_per_page'    => 4,
                    'tax_query'         => array(
                        array(
                            'taxonomy' => 'fwd-featured',
                            'field'    => 'slug',
                            'terms'    => 'front-page',
                        ),
                    ),
                );
                $query = new WP_Query( $args );

                if ( $query->have_posts() ) :
                ?>
                    <section class="home-work">
                    <h2>Featured Works</h2>
                    <?php
                    while ( $query->have_posts() ) :
                        $query->the_post(); 
                        ?>
                        <article>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('medium'); ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();?>
                    </section>
                    <?php
                endif;
            ?>
            <section class="home-left">
            <?php
                if ( function_exists( 'get_field' ) ) {

                    if ( get_field( 'left_section_heading' ) ) {
                        echo '<h2>' . esc_html( get_field( 'left_section_heading' ) ) . '</h2>';
                    }

                    if ( get_field( 'left_section_content' ) ) {
                        echo '<p>' . esc_html( get_field( 'left_section_content' ) ) . '</p>';
                    }

                }
            ?>
            </section>
            <section class="home-right"></section>
            <?php
                if ( function_exists( 'get_field' ) ) {

                    if ( get_field( 'right_section_heading' ) ) {
                        echo '<h2>' . esc_html( get_field( 'right_section_heading' ) ) . '</h2>';
                    }

                    if ( get_field( 'right_section_content' ) ) {
                        echo '<p>' . esc_html( get_field( 'right_section_content' ) ) . '</p>';
                    }

                }
            ?>            
            <section class="home-slider">
                <?php
                $args = array(
                    'post_type'      => 'fwd-testimonial',
                    'posts_per_page' => -1
                );

                $query = new WP_Query( $args );

                if ( $query->have_posts() ) : ?>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                                <div class="swiper-slide">
                                    <?php the_content(); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                    <?php
                    wp_reset_postdata();
                endif;
                ?>
            </section>
            <section class="home-blog">
                <h2><?php esc_html_e( 'Latest Blog Posts', 'fwd' ); ?></h2>
                <?php
                    $args = array( 
                         // Two main post types: 'post' and 'page'. Choose 'posts' specifically
                        'post_type'      => 'post', // Default is post; we're putting here explicitly just for clarity
                        'posts_per_page' => 4 
                        // By default: most recent posts
                    );

                    $blog_query = new WP_Query( $args );

                    if ( $blog_query -> have_posts() ) {
                        while ( $blog_query -> have_posts() ) {
                            $blog_query -> the_post();
                            ?>
                            <article>
                                <a href="<?php the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php fwd_posted_on(); ?></p>
                                    <?php
                                        if ( has_post_thumbnail() ) {
                                            the_post_thumbnail( 'latest-blog' );
                                        }
                                    ?>
                                </a>
                            </article>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                ?>
            </section>

        <?php endwhile; ?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();
