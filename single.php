<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

?>
<?php 
if ( get_post_type() == 'Demo' ){ 
  while ( have_posts() ) : the_post();
    the_content();
  endwhile; 
} else { ?>

<?php get_header(); ?>

    <div id="container">
      <div id="content" role="main">

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); 
  $terms = wp_get_object_terms( $post->ID, 'types');
?>
  

        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

          <div class="entry-content">
            <h1 class="fancy"><?php the_title();?></h1>
            <?php the_content(); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>

            <?php if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
              <div id="entry-author-info">
                <div id="author-avatar">
                  <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'twentyten_author_bio_avatar_size', 60 ) ); ?>
                </div><!-- #author-avatar -->
                <div id="author-description">
                  <h2><?php printf( esc_attr__( 'About %s', 'twentyten' ), get_the_author() ); ?></h2>
                  <?php the_author_meta( 'description' ); ?>
                  <div id="author-link">
                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
                      <?php printf( __( 'View all posts by %s <span class="meta-nav">&rarr;</span>', 'twentyten' ), get_the_author() ); ?>
                    </a>
                  </div><!-- #author-link	-->
                </div><!-- #author-description -->
              </div><!-- #entry-author-info -->
            <?php endif; ?>

            <div class="fine">
              <?php twentyten_posted_on(); ?>
            </div>
            
          </div>
        </div>

        <?php #comments_template( '', true ); ?>

<?php endwhile; // end of the loop. ?>

      </div><!-- #content -->
    </div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

<?php } ?>
