<nav class="mainNav">
  <div class="container">
      <div class="logo">
      	
<?php $frontPage = new WP_Query( array(
           'pagename' => 'home'
         )); ?>
        
<?php if( $frontPage-> have_posts() ) while( $frontPage-> have_posts() ) : $frontPage->the_post(); ?>
    
      <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home"><img src="<?php the_field('logo'); ?>" alt=""></a>


    <?php endwhile; // end the loop?>
    <?php wp_reset_postdata(); ?>



      </div>
      <nav class="mainMenu">
        <?php wp_nav_menu( array(
      'container' => false,
      'theme_location' => 'primary'
    )); ?>
        
      </nav>
      <nav class="socialNav">
      	<?php wp_nav_menu( array(
      'container' => false,
      'theme_location' => 'social'
    )); ?>
      </nav>
      <nav class="mobileSocial">
          <?php wp_nav_menu( array(
        'container' => false,
        'theme_location' => 'social'
      )); ?>
        </nav>
  <button class="hamburger">
    <span>toggle menu</span>
  </button>

  </div> <!-- /.container -->

</nav><!--/.nav-->

