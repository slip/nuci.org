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
      while ( have_posts() ) : the_post();

        get_template_part( 'template-parts/content', 'page' );

        // If comments are open or we have at least one comment, load up the comment template.
        // if ( comments_open() || get_comments_number() ) :
        //   comments_template();
        // endif;
      endwhile; // End of the loop.
      ?>
      <!-- let's loop through the top level pages and only add appropriate posts -->
      <?php if (is_page('get-help')) : ?>
        <div class="post-cards-wrapper">
          <div class="post-cards">
          <?php
            $args = array(
              'posts_per_page' => 3,
              'order' => 'DSC',
              'orderby' => 'date',
              'category' => '-193, 194'
            );
            $postslist = get_posts($args);
            foreach ($postslist as $post):
              setup_postdata($post);
          ?>
            <div class="post-card">
              <div class="card-image">
                <a href="<?php the_permalink();?>"><img src="<?php if (has_post_thumbnail()) {the_post_thumbnail_url();}?>" alt=""></a>
              </div>
              <div class="card-copy"><h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
              <?php the_excerpt();?></div>
            </div>
          <?php
            endforeach;
            wp_reset_postdata();
          ?>
        </div><!-- .post-cards -->
      </div><!-- .post-cards-wrapper -->
      <?php endif; ?>
      <?php if (is_page('help-us')) : ?>
        <div class="post-cards-wrapper">
          <div class="post-cards">
          <?php
            $args = array(
              'posts_per_page' => 3,
              'order' => 'DSC',
              'orderby' => 'date',
              'category' => '-193, 192'
            );
            $postslist = get_posts($args);
            foreach ($postslist as $post):
              setup_postdata($post);
          ?>
            <div class="post-card">
              <div class="card-image">
                <a href="<?php the_permalink();?>"><img src="<?php if (has_post_thumbnail()) {the_post_thumbnail_url();}?>" alt=""></a>
              </div>
              <div class="card-copy"><h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
              <?php the_excerpt();?></div>
            </div>
          <?php
            endforeach;
            wp_reset_postdata();
          ?>
        </div><!-- .post-cards -->
      </div><!-- .post-cards-wrapper -->
      <?php endif; ?>
      <!-- about page has the most recent i am nucis post -->
      <?php if (is_page('about-us')) : ?>
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
      <?php endif; ?>

      <!-- camp-amped page has the most recent i am nucis post -->
      <?php if (is_page('camp-amped')) : ?>
        <div class="post-cards-wrapper">
          <div class="post-cards">
          <?php
            $args = array(
              'posts_per_page' => 3,
              'order' => 'DSC',
              'orderby' => 'date',
              'category' => '-193, 191'
            );
            $postslist = get_posts($args);
            foreach ($postslist as $post):
              setup_postdata($post);
          ?>
            <div class="post-card">
              <div class="card-image">
                <a href="<?php the_permalink();?>"><img src="<?php if (has_post_thumbnail()) {the_post_thumbnail_url();}?>" alt=""></a>
              </div>
              <div class="card-copy"><h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
              <?php the_excerpt();?></div>
            </div>
          <?php
            endforeach;
            wp_reset_postdata();
          ?>
        </div><!-- .post-cards -->
      </div><!-- .post-cards-wrapper -->
      <?php endif; ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
