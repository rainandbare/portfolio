<?php //index.php is the last resort template, if no other templates match ?>
<?php get_header(); ?>


<?php get_template_part('partial', 'nav'); ?>


<div class="main">
  <div class="container">
    <div class="content">




    	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
         <div class="blogImage" style="background-image: url('<?php echo $url; ?>')"></div>
      <h2><?php the_title(); ?></h2>
      <?php the_excerpt(); ?>

    <?php endwhile; // end the loop?>
    <?php wp_reset_postdata(); ?>

    </div> <!--/.content -->


  </div> <!-- /.container -->
</div> <!-- /.main -->

<?php get_footer(); ?>