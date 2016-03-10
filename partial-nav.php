<nav class="mainNav">
  <div class="container">
      <div class="logo">
      	<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home"><img src="<?php the_field('logo'); ?>" alt=""></a>
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
  </div> <!-- /.container -->
</nav><!--/.header-->