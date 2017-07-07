<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <!-- SLICK SLIDER -->
    <?php if( have_rows('slider_config') ): ?>
        <div class="container-fluid slider-container">
            <div class="slider">
                <?php while( have_rows('slider_config') ): the_row();
                    $sliderTitle = get_sub_field('slider_title');
                    $sliderSubtitle = get_sub_field('slider_subtitle');
                    $sliderButton= get_sub_field('slider_button_text');
                    $sliderDestination = get_sub_field('slider_destination');
                    $sliderImage = get_sub_field('slider_image');

                    ?>
                    <div class="slide">
                        <img class="sliderImage" src="<?= $sliderImage ?>" />
                        <div class="sliderTextContainer">
                            <h2><?= $sliderTitle; ?></h2>
                            <h4><?= $sliderSubtitle; ?></h4>
                            <a href="<?= $sliderDestination ?>">
                                <button class="primary-btn"><?= $sliderButton ?></button>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="wrap container" role="document">
      <div class="content row">
        <main class="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
    <?php is_page_template('templates/template', 'heroSlider') ?>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery('.slider').slick({
                    dots: true,
                    infinite: true,
                    speed: 500,
                    fade: true,
                    cssEase: 'linear'
                });
            });
        </script>

    <?php ?>
  </body>
</html>
