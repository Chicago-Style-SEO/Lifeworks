<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php get_template_part('templates/entry-meta'); ?>
  </header>
  <div class="entry-summary">
      <div class="row">
          <div class="col-md-3">
              <?php the_post_thumbnail( 'thumbnail' ); ?>
              </div>
          <div class="col-md-8">
              <?php the_excerpt(); ?>
              <div class="commentCountBlogItem">
                  <i class="fa fa-comment-o" aria-hidden="true"></i>
                  <?php comments_number( '0', '1', '%' ); ?>
              </div>
          </div>
      </div>
      <div class="row postListingFooter">
          <hr />
            <p><strong>Posted</strong>&nbsp;in&nbsp;<i><?php the_category(); ?></i></p><br>
            <p style="width: 100%; margin-bottom: 24px !important;"><strong>Tagged</strong>&nbsp;in&nbsp;<i><?php the_tags(); ?></i></p>
          <hr />
      </div>
  </div>
</article>
