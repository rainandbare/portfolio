<?php get_header();  ?>

<div class="main">
  <div class="container">
    

      <?php // Start the loop ?>
      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

        
        <?php the_content(); ?>

      <?php endwhile; // end the loop?>

    



<!-- about section -->
<h2><?php the_field('about_title'); ?></h2>

  <?php $aboutQuery = new WP_Query(
       array(
         'posts_per_page' => -1,
         'post_type' => 'about'
          )
        ); ?>

    <?php if ($aboutQuery -> have_posts() ) : ?>
      <?php while ($aboutQuery ->have_posts() ) : $aboutQuery->the_post(); ?>
          <h2><?php the_content(); ?></h2>
        <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

    <?php else:  ?>
        [stuff that happens if there aren't any posts]
    <?php endif; ?>
       
      
<!-- portfolio section -->
<h2><?php the_field('portfolio_title'); ?></h2>

      <?php
        $portfolioQuery = new WP_Query(
        array(
            'posts_per_page' => -1,
            'post_type' => 'portfolio'
            )
    ); ?>

    <?php if ( $portfolioQuery->have_posts() ) : ?>

        <?php while ($portfolioQuery->have_posts()) : $portfolioQuery->the_post(); ?>

            <section id="<?php echo $post->post_name; ?>">
                <h2><?php the_title(); ?></h2>
                <?php the_content(); ?>
                <p><?php the_field('github_link'); ?></p>
                <p><?php the_field('live_link'); ?></p>
                    <?php 
                    if( have_rows('tech_used') ):

                        while( have_rows('tech_used') ) : the_row(); 
                            
                            ?>
                            <p><?php the_sub_field('tech'); ?></p>
                        <?php
                          
                        endwhile;

                    endif;
                    ?>
                </div>
            </section>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    <?php else:  ?>
        [stuff that happens if there aren't any posts]
    <?php endif; ?>

  <!-- Skills -->
<h2><?php the_field('skills_title'); ?></h2>





  <!-- Interests  -->
<h2><?php the_field('interests_title'); ?></h2>

<!-- Contact  -->
<h2><?php the_field('contact_title'); ?></h2>






  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>