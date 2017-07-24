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
<!-- End Slick Slider -->

<!--Special homepage wrapper -->
<?php if( is_front_page() ): ?>
<div class="wrap container" role="document">
    <div class="content row">
        <main class="main">
            <div class="homeSpecial">
                <?php include Wrapper\template_path(); ?>
            </div>
            <!-- 3 column section - custom post type -->
            <?php if( get_field('section_title') ): ?>
                <div class="fluid-container threeColumnSection">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2><?= get_field('section_title'); ?></h2>
                                <p><?= get_field('section_description'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <?php while( have_rows('3_columns_area') ): the_row();
                                $columnImage = get_sub_field('3column_image');
                                $columnImageText = get_sub_field('section_image_text');
                                $columnImageLink= get_sub_field('section_image_link');

                                ?>
                                <div class="col-md-4 imageColumn">
                                    <a href="<?= $columnImageLink ?>">
                                        <img src="<?= $columnImage ?>">
                                        <div class="imageColumn-overlay">
                                            <p><?= $columnImageText ?></p>
                                        </div>
                                    </a>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <a href="<?= get_field('section_button_link'); ?>"><button class="transparent-btn"><?= get_field('section_button_text'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-arrow-right" aria-hidden="true"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
            <!-- END 3 Column Section -->
            <!-- 2 Button Section - custom post type -->
            <?php if( get_field('button_section_title') ): ?>
                <div class="fluid-container two-button-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="text-center"><?= get_field('button_section_title'); ?></h2>
                                <p><?= get_field('button_section_text'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4 text-center">
                                <a href="<?= get_field('button_one_link'); ?>"><button class="transparent-btn"><?= get_field('button_one_icon'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= get_field('button_one_text'); ?></button></a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="<?= get_field('button_two_link'); ?>"><button class="transparent-btn"><?= get_field('button_two_text'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= get_field('button_two_icon'); ?></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- END 2 Button Section -->
            <!-- 3 column map section - custom post type -->
            <?php if( get_field('maps_section_title') ): ?>
                <div class="fluid-container mapsSection">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2><?= get_field('maps_section_title'); ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <?php while( have_rows('maps_3_columns_area') ): the_row();
                                $mapImage = get_sub_field('maps_3column_image');
                                $address = get_sub_field('maps_address');
                                $mapLink= get_sub_field('map_link');
                                $city= get_sub_field('map_location_title');

                                ?>
                                <div class="col-md-4 imageColumn text-center">
                                    <h3><?= $city ?></h3>
                                    <img src="<?= $mapImage ?>">
                                    <p><?= $address ?></p>
                                    <a href="<?= $mapLink ?>">
                                        <i class="fa fa-info-circle" aria-hidden="true"></i> Getting Here
                                    </a>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!-- END 3 Column Section -->
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
            <aside class="sidebar">
                <?php include Wrapper\sidebar_path(); ?>
            </aside><!-- /.sidebar -->
        <?php endif; ?>
    </div><!-- /.content -->
</div><!-- /.wrap -->
    <!-- SINGLE BUTTON CALLOUT -->
    <?php if( get_field('callout_title') ): ?>
        <div class="container-fluid calloutSingleButtonContainer text-center">
            <img src="<?= get_template_directory_uri() . '/dist/images/lwp-symbol.png'; ?>" class="calloutSingleImage">
            <h2><?= get_field('callout_title'); ?></h2>
            <p><?= get_field('callout_body_text'); ?></p>
            <a href="<?= get_field('callout_body_button_URL'); ?>"><button class="transparent-btn"><?= get_field('callout_body_button_text') ?></button></a>
        </div>
    <?php endif; ?>
    <!-- END SINGLE BUTTON CALLOUT -->
<?php endif; ?> <!-- End Special homepage wrapper -->

<!-- Special default page wrapper -->
<?php if( !is_front_page() ): ?>
    <div class="container" role="document" style="margin-top: 36px; margin-bottom: 36px;">
        <div class="content row">
            <main class="main col-md-9">
                <?php include Wrapper\template_path(); ?>
            </main><!-- /.main -->
            <?php if (Setup\display_sidebar()) : ?>
                <aside class="sidebar col-md-3">
                    <?php if( is_home() || is_single() ): ?>
                        <?php if ( dynamic_sidebar('sidebar-blog') ) : else : endif; ?>
                    <?php elseif( !is_home() ): ?>
                        <?php include Wrapper\sidebar_path(); ?>
                    <?php endif; ?>
                </aside><!-- /.sidebar -->
            <?php endif; ?>
        </div><!-- /.content -->
    </div><!-- /.wrap -->

    <!-- SINGLE BUTTON CALLOUT -->
    <?php if( get_field('callout_title') ): ?>
        <div class="container-fluid calloutSingleButtonContainer text-center">
            <h2><?= get_field('callout_title'); ?></h2>
            <p><?= get_field('callout_body_text'); ?></p>
            <a href="<?= get_field('callout_body_button_URL'); ?>"><button class="transparent-btn"><?= get_field('callout_body_button_text') ?></button></a>
        </div>
    <?php endif; ?>
    <!-- END SINGLE BUTTON CALLOUT -->
    <!-- 2 Button Section - custom post type -->
    <?php if( get_field('button_section_title') ): ?>
        <div class="fluid-container two-button-section two-button-section-subpage">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2><?= get_field('button_section_title'); ?></h2>
                        <p><?= get_field('button_section_text'); ?></p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4 text-center">
                        <a href="<?= get_field('button_one_link'); ?>"><button class="transparent-btn"><?= get_field('button_one_icon'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= get_field('button_one_text'); ?></button></a>
                    </div>
                    <div class="col-md-4 text-center">
                        <a href="<?= get_field('button_two_link'); ?>"><button class="transparent-btn"><?= get_field('button_two_text'); ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= get_field('button_two_icon'); ?></button></a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <!-- END 2 Button Section -->
<?php endif; ?> <!-- Special default wrapper -->

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
