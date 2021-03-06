<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package nuci2016
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      <section class="full-width-bg lt-gray">
          <div class="section-header">
            <h2 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'nuci2016' ); ?></h2>
          </div><!-- .section-header -->

          <div class="section-text text-align-left">
            <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'nuci2016' ); ?></p>

            <?php
              get_search_form();
              the_widget( 'WP_Widget_Recent_Posts' );
              // Only show the widget if site has multiple categories.
              if ( nuci2016_categorized_blog() ) :
            ?>

            <div class="widget widget_categories">
              <h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'nuci2016' ); ?></h2>
              <ul>
              <?php
                wp_list_categories( array(
                  'orderby'    => 'count',
                  'order'      => 'DESC',
                  'show_count' => 1,
                  'title_li'   => '',
                  'number'     => 10,
                ) );
              ?>
              </ul>
            </div><!-- .widget -->

            <?php
              endif;
              /* translators: %1$s: smiley */
              // $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'nuci2016' ), convert_smilies( ':)' ) ) . '</p>';
              // the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
              //
              // the_widget( 'WP_Widget_Tag_Cloud' );
            ?>

          </div><!-- .section-text -->
      </section><!-- .full-width-bg -->
    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
