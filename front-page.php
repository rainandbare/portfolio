<?php get_header();  ?>

<?php $thumb_id = get_post_thumbnail_id(); $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true); ?>
<header class="hero" style="background-image: url('<?php echo $thumb_url_array[0]; ?>')">
  <div class="hero-overlay"></div>
    <h1><?php bloginfo( 'name' ); ?></h1>
    <h2 class="subtitle"><?php bloginfo( 'description' ); ?></h2>
    <button class="enter"> <?php the_field('enter'); ?> </button>
</header>

<?php get_template_part('partial', 'nav'); ?>

<main>    
  <div class="container">
    <!-- about section -->
    <section class="about">
      <h3><?php the_field('about_title'); ?></h3>
        <!-- new about query -->
        <?php $aboutQuery = new WP_Query(
          array(
            'posts_per_page' => -1,
            'post_type' => 'about'
            )
        ); ?>
        <!-- get about information -->
        <?php if ($aboutQuery -> have_posts() ) : ?>
          <?php while ($aboutQuery ->have_posts() ) : $aboutQuery->the_post(); ?>
            <p><?php the_content(); ?></p>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </section> <!-- end of about -->
    


    <!-- portfolio section -->
    <section class="portfolio">
          <!-- new portfolio query -->
          <?php
            $portfolioQuery = new WP_Query(
            array(
              'posts_per_page' => -1,
              'post_type' => 'portfolio',
              'orderby' => 'menu-order'
              )
          ); ?>
          <!-- get portfolio pieces -->
          <?php if ( $portfolioQuery->have_posts() ) : ?>
            <?php while ($portfolioQuery->have_posts()) : $portfolioQuery->the_post(); ?>
              <!-- individual portfolio piece -->
            <section class = "piece" id="<?php echo $post->post_name; ?>">
              <div class="portfolioImage">
                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                <img src="<?php echo $url; ?>" alt="">
              </div>
              <div class="portfolioInfo">
                <h4><?php the_title(); ?></h4>
                <p><?php the_content(); ?></p>
                <p><?php the_field('github_link'); ?></p>
                <p><?php the_field('live_link'); ?></p>
                    <?php if( have_rows('tech_used') ): ?>
                      <?php while( have_rows('tech_used') ) : the_row(); ?>
                      <p><?php the_sub_field('tech'); ?></p>
                    <?php endwhile; ?>
                    <?php endif; ?>
              </div>
            </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else:  ?>
            [ stuff that happens if there aren't any posts]
          <?php endif; ?>
    </section>

        <!-- Skills -->

    <section class="skills">
        <h3><?php the_field('skills_title'); ?></h3>

        <?php
          $skillsQuery = new WP_Query(
          array(
            'posts_per_page' => -1,
            'post_type' => 'skill'
            )
        ); ?>

        <?php if ( $skillsQuery->have_posts() ) : ?>
          <?php while ($skillsQuery->have_posts()) : $skillsQuery->the_post(); ?>
          <section class="skill" id="<?php echo $post->post_name; ?>">
            <div class="skillInfo">
              <h4><?php the_title(); ?></h4>
              <p><?php the_content(); ?></p>
            </div>
            <div class="skillImage">
              <div class="svgImage">
                <?php the_post_thumbnail(); ?>
              </div>
            </div>
          </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else:  ?>
            [stuff that happens if there aren't any posts]
          <?php endif; ?>
    </section> <!-- end of skills -->

          <!-- Interests  -->
    <section class="interests">
        <h3><?php the_field('interests_title'); ?></h3>

          <?php
          $interestQuery = new WP_Query(
            array(
              'posts_per_page' => -1,
              'post_type' => 'interest'
              )
              ); ?>
          <?php if ( $interestQuery->have_posts() ) : ?>
            <?php while ($interestQuery->have_posts()) : $interestQuery->the_post(); ?>
              <section class= "interests" id="<?php echo $post->post_name; ?>">
                <div class="interestsInfo">
                  <h3><?php the_title(); ?></h3>
                </div>
                <div class="interestsImage">
                  <div class="svgImage"><?php the_post_thumbnail(); ?></div>
                </div>
              </section>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>

            <?php else:  ?>
              [stuff that happens if there aren't any posts]
            <?php endif; ?>
    </section> <!-- end of interests -->


    <!-- Contact  -->
    <section class="contact">
      <h2><?php the_field('contact_title'); ?></h2>
      <div class="headshot">
        <img src="<?php the_field('contact_image'); ?>" alt="">
      </div>
      <div class="form">
          <h3> <?php the_field('contact_intro'); ?></h3>
          <?php the_field('contact_form'); ?>
      </div>
    </section>


          </div> <!-- /.container -->
        </main> <!-- /.main -->

        <?php get_footer(); ?>