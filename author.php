<!-- display the menu from the "Author Menu" location.  -->
<div id="primary-menu" class="main-nav">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'author-menu', // Display the menu from the "Author Menu" location
        'container' => 'ul',
        'menu_id' => 'menu-main-menu-inglese',
        'menu_class' => 'menu sf-menu',
    ));
    ?>
</div>
