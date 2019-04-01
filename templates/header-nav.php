<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-4 col-4 header-top-left no-padding">
                    <?php 
                    if( fitness_opt( 'fitness-header-top-email' ) ) {
                        echo '<a href="mailto:'. fitness_opt( 'fitness-header-top-email' ) .'"><span class="lnr lnr-location"></span></a>';
                        echo '<a class="contact-texts" href="mailto:'. fitness_opt( 'fitness-header-top-email' ) .'">'. fitness_opt( 'fitness-header-top-email' ) .'</a>';
                    }
                    ?>
                </div>
                <div class="col-md-4 col-4 header-top-bottom no-padding">
                    <?php
                        // Header Logo
                        echo fitness_theme_logo();
                    ?>
                </div>
                <div class="col-md-4 col-4 header-top-right no-padding">
                    <?php
                    if( fitness_opt( 'fitness-header-top-phone' ) ) {
                        echo '<a class="contact-texts" href="tel:'. fitness_opt( 'fitness-header-top-phone' ) .'">'. fitness_opt( 'fitness-header-top-phone' ) .'</a>';
                        echo '<a href="tel:'. fitness_opt( 'fitness-header-top-phone' ) .'"><span class="lnr lnr-phone-handset"></span></a>';
                    } ?>
                    
                </div>				  							  			
            </div>			  					
        </div>
    </div>
    <div class="container main-menu">
        <div class="row align-items-center justify-content-center">
            <nav id="nav-menu-container">
            <?php
                // Header Menu
                if( has_nav_menu( 'primary-menu' ) ) {
                    $args = array(
                        'theme_location' => 'primary-menu',
                        'container'      => '',
                        'depth'          => 2,
                        'menu_class'     => 'nav-menu',
                        'fallback_cb'    => 'fitness_bootstrap_navwalker::fallback',
                        'walker'         => new fitness_bootstrap_navwalker(),
                    );  
                    wp_nav_menu( $args );
                }
                ?>
            </nav><!-- #nav-menu-container -->		
        </div>
    </div>
</header>