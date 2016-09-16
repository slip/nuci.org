<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nuci2016
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

      <?php
      /* Start the Loop */
      while ( have_posts() ) : the_post();

        /*
         * Include the Post-Format-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
         */
        get_template_part( 'template-parts/content-page', get_post_format() );

      endwhile;
      ?>
        <?php
          $args = array(
            'posts_per_page' => 1,
            'order' => 'DSC',
            'orderby' => 'date',
            'category' => '193'
          );
          $postslist = get_posts($args);
          foreach ($postslist as $post):
            setup_postdata($post);
        ?>
          <!-- i-am-nucis-space most recent post -->
          <section class="media-card aligncenter">
            <div class="i-am-nucis-ribbon-wrapper">
              <div class="i-am-nucis-ribbon">I AM NUÇI'S SPACE</div>
            </div>
            <div class="media-card-content">
              <a href="<?php the_permalink();?>"><img src="<?php if (has_post_thumbnail()) {the_post_thumbnail_url();}?>" alt=""></a>
            </div>
            <div class="media-card-title">
              <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            </div>
          </section>

        <?php
          endforeach;
          wp_reset_postdata();
        ?>
        <div class="post-cards-wrapper">
          <div class="post-cards">
          <?php
            $args = array(
              'posts_per_page' => 3,
              'order' => 'DSC',
              'orderby' => 'date',
              'category' => '-193'
            );
            $postslist = get_posts($args);
            foreach ($postslist as $post):
              setup_postdata($post);
          ?>
            <div class="post-card">
              <div class="card-image">
                <a href="<?php the_permalink();?>"><img src="<?php if (has_post_thumbnail()) {the_post_thumbnail_url();}?>" alt=""></a>
              </div>
              <div class="card-copy"><h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
              <?php the_excerpt();?></div>
            </div>
          <?php
            endforeach;
            wp_reset_postdata();
          ?>
        </div><!-- .post-cards -->
      </div><!-- .post-cards-wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
