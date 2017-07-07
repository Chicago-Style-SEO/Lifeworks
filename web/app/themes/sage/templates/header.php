<header class="banner">
  <div class="container">
      <div class="navTop">
          <div class="row">
              <div class="col-md-6 navTopLeft">
                  <img src="<?= get_template_directory_uri() . '/dist/images/lifeworks-psychotherapy-logo.png'; ?>" class="navLogo">
              </div>
              <div class="col-md-6 navTopRight">
                <div class="navContact">
                    <a href="mailto:info@lifeworkspsychotherapy.com"><i class="fa fa-envelope-o" aria-hidden="true"></i> Get in Touch</a>
                    <a href="tel:1-847-568-1100"><i class="fa fa-phone" aria-hidden="true"></i> 847-568-1100</a>
                </div>
                  <button class="secondary-btn">En Español</button>
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
    </div>
</header>
