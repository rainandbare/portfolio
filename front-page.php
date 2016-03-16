<?php get_header();  ?>

<?php $thumb_id = get_post_thumbnail_id(); $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail-size', true); ?>
  <div class="hero">
    <header class="hero" style="background-image: url('<?php echo $thumb_url_array[0]; ?>')">
      <div class="hero-overlay">
        <h1><?php bloginfo( 'name' ); ?></h1>
        <h2 class="subtitle"><?php bloginfo( 'description' ); ?></h2>
        <a class="enter hvr-underline-from-left" href="#about"><?php the_field('enter'); ?></a> 
      </div>
    </header>
   </div>
   <div class="hero-placeholder"></div>
<?php get_template_part('partial', 'nav'); ?>
<main>    
  
  <!-- about section -->
  <section class="about" id='about'>
    <div class="container">
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
          <?php the_content(); ?>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
    </div>
  </section> <!-- end of about -->
    


    <!-- portfolio section -->
    <section class="portfolio" id="portfolio">
      <h2><?php the_field('portfolio_title'); ?></h2>
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
              <!-- picture -->
              <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
              <div class="portfolioImage" style="background-image: url('<?php echo $url; ?>')"></div>
              
              <!-- info -->
              <div class="portfolioInfo">
                <h4><?php the_title(); ?></h4>
                <?php the_content(); ?>
                 <p class="skills"><?php if( have_rows('tech_used') ): ?>
                      <?php while( have_rows('tech_used') ) : the_row(); ?>
                      <?php the_sub_field('tech'); ?>
                    <?php endwhile; ?>
                    <?php endif; ?></p>

                <div class="buttons">   
                <button class="git hvr-underline-from-left" href="<?php the_field('git_link'); ?>"><?php the_field('git_placeholder'); ?></button>
                <button class="live hvr-underline-from-left" href="<?php the_field('live_link'); ?>"> <?php the_field('live_placeholder'); ?></button></div> 


              </div>
            </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else:  ?>
            [ stuff that happens if there aren't any posts]
          <?php endif; ?>
    </section>

        <!-- Skills -->
<div class="skills-interests">
    <section class="skills clearfix">
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
              <?php the_content(); ?>
            </div>
            <div class="skillImage">
              <div class="svgImage">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="bgShape"></div>
            </div>
          </section>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php else:  ?>
            [stuff that happens if there aren't any posts]
          <?php endif; ?>
    </section> <!-- end of skills -->

          <!-- Interests  -->
    <section class="interests clearfix">
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
              <section class= "skill" id="<?php echo $post->post_name; ?>">
                <div class="skillInfo">
                  <h4><?php the_title(); ?></h4>
                </div>
                <div class="skillImage">
                  <div class="svgImage"><?php the_post_thumbnail(); ?></div>
                  <div class="bgShape"></div>
                </div>
              </section>
              <?php endwhile; ?>

              <?php wp_reset_postdata(); ?>

            <?php else:  ?>
              [stuff that happens if there aren't any posts]
            <?php endif; ?>
    </section> <!-- end of interests -->
    </div>



    <!-- Contact  -->
    <section class="contact" id="contact">
    <h2><?php the_field('contact_title'); ?></h2>
      <div class="contactContent">
        <div class="headshot" style="background-image: url(<?php the_field('contact_image'); ?> );">
          <div class="headshot-overlay"></div>
        </div>
        <div class="form">
            <h3> <?php the_field('contact_intro'); ?></h3>
            <?php 
              $content = the_field('contact_form');
              my_custom_formatting($content);
              // echo $post->post_type ; ?>
        
        </div>  
      </div>
    </section>


          </div> <!-- /.container -->
        </main> <!-- /.main -->

        <?php get_footer(); ?>