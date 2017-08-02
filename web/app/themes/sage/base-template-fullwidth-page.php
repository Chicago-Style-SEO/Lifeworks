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
<div class="wrap container fullwidthPageWrapper" role="document">
    <div class="container content">
        <div class="row">
            <main class="col-md-12">
                <?php if(!is_home() && !is_single()) : ?>
                    <h1 class="pageTitle"><?php the_title(); ?></h1>
                <?php endif; ?>
                <?php include Wrapper\template_path(); ?>
                <!-- IMPORT TEAM SECTION -->
                <?php if( have_rows('team_member') ): ?>
                    <div class="row">

                        <?php while( have_rows('team_member') ): the_row();
                        $teamMemberName = get_sub_field('team_member_name');
                        $teamMemberImage = get_sub_field('team_member_image');
                        $teamMemberPage = get_sub_field('team_member_page');
                        ?>
                        <div class="col-md-3 teamMember">
                            <a href="<?= $teamMemberPage ?>">
                                <img src="<?= $teamMemberImage ?>" class="teamMemberImage">
                                <h6><?= $teamMemberName ?></h6>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <!-- END TEAM SECTION -->
            </main><!-- /.main -->
        </div>
    </div><!-- /.content -->
</div><!-- /.wrap -->
<!-- SINGLE BUTTON CALLOUT -->
<?php if( get_field('callout_title') ): ?>
    <div class="container-fluid calloutSingleButtonContainer text-center">
        <h2><?= get_field('callout_title'); ?></h2>
        <p><?= get_field('callout_body_text'); ?></p>
        <a href="<?= get_field('callout_body_button_URL'); ?>"><button class="alternate-btn><?= get_field('callout_body_button_text') ?></button></a>
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
<?php
do_action('get_footer');
get_template_part('templates/footer');
wp_footer();
?>
</body>
</html>
