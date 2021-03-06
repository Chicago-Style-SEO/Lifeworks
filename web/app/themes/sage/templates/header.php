<header class="banner">
    <div id="wptime-plugin-preloader"></div>
    <nav class="nav-mobile">
        <i class="fa fa-bars" aria-hidden="true"></i>
        <i class="fa fa-times-circle-o active" aria-hidden="true"></i>

        <?php
        if (has_nav_menu('mobile_navigation')) :
            wp_nav_menu(['theme_location' => 'mobile_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
        <img src="<?= get_template_directory_uri() . '/dist/images/lifeworks-psychotherapy-logo-white.png'; ?>" class="mobileLogo">
    </nav>
  <div class="container navTopContainer">
      <div class="navTop">
          <div class="row">
              <div class="col-md-7 navTopLeft">
                  <a href="/">
                      <img src="<?= get_template_directory_uri() . '/dist/images/lifeworks-psychotherapy-logo.png'; ?>" class="navLogo">
                  </a>
              </div>
              <div class="col-md-5 navTopRight">
                  <span class="headerHeadline">Simply aware, fully alive.</span>
<!--                <div class="navContact">-->
<!--                    <a href="mailto:info@lifeworkspsychotherapy.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> Get in Touch</a>-->
<!--                    <a href="tel:1-847-568-1100"><i class="fa fa-phone" aria-hidden="true"></i> 847-568-1100</a>-->
<!--                </div>-->
<!--                  <a href="http://www.lifeworkspsychotherapy.com/espanol/">-->
<!--                      <button class="secondary-btn">En Español</button>-->
<!--                  </a>-->
                  <div class="headerNav">
                      <?php
                      if (has_nav_menu('header_navigation')) :
                          wp_nav_menu(['theme_location' => 'header_navigation', 'menu_class' => 'nav']);
                      endif;
                      ?>
                  </div>
                  <div class="languageChange">
                      <?php echo do_shortcode('[gtranslate]'); ?>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <hr>
    <nav class="nav-primary">
        <?php
        if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']);
        endif;
        ?>
    </nav>
    <div class="searchBarContainer">
        <input type="search" placeholder="Enter your search terms here" name="searchSite" id="searchNav" onkeypress="return runSearch(event)">
        <button style="transparent-btn" id="searchButton">Search</button>
    </div>
</header>
