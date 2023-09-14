<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package FWD_Starter_Theme
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-contact">
		</div><!-- .footer-contact -->
		<div class="footer-menus">
            <nav class="footer-navigation">
                <?php
                    if ( function_exists( 'get_field' ) ) {
                        if ( get_field('address', 18) && !is_page(18) ) {
                            get_template_part( 'images/location' );
                            echo esc_html__( get_field('address', 18) );
                        }
                    }
                
                    wp_nav_menu( array( 'theme_location' => 'footer-left' ) );
                ?>
            </nav>
            <div id="social-navigation" class="social-navigation">
                <?php
                    if ( function_exists( 'get_field') ) {
                        if ( get_field('email', 18) && !is_page(18) ) {
                            $email  = get_field('email', 18);
                            $mailto = 'mailto:' . $email;
                            ?>
                            <a href="<?php echo esc_url( $mailto ); ?> ">
                                <?php
                                get_template_part( 'images/email' );
                                echo "&nbsp;" . esc_html__( $email );
                                ?>
                            </a>
                            <?php
                        }    
                    }
                
                    wp_nav_menu( array( 'theme_location' => 'footer-right') );
                ?>
            </div>
		</div><!-- .footer-menus -->
		<div class="site-info">
            <?php
                if ( function_exists( 'the_privacy_policy_link' ) ) {
                    the_privacy_policy_link( '<div class="privacy-policy-link-wrapper">', '</div>' );
                }
                else {
                    echo "<p>Privacy Policy Link not shown</p>";
                }
            ?>
			<?php esc_html_e( 'Created by ', 'fwd' ); ?><a href="<?php echo esc_url( __( 'https://danjblain.dev', 'fwd' ) ); ?>"><?php esc_html_e( 'Daniel Blain', 'fwd' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<button id="scroll-top" class="scroll-top">
	<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24">
		<path d="M23.677 18.52c.914 1.523-.183 3.472-1.967 3.472h-19.414c-1.784 0-2.881-1.949-1.967-3.472l9.709-16.18c.891-1.483 3.041-1.48 3.93 0l9.709 16.18z"/>
	</svg>
	<span class="screen-reader-text">Scroll To Top</span>
</button>

<?php wp_footer(); ?>

</body>
</html>
