<?php
/**
 * @link https://ironistic.com
 *
 * @package WordPress
 * @subpackage IronStrap
 * @since 1.0
 * @version 1.0
 */
?>
 
<nav class="main-menu-wrapper row">
    <div class="container cf">
        <?php wp_nav_menu(array('theme_location' => 'main-menu', 'container' => false, 'depth' => 3, 'menu_class' => 'main-menu cf')); ?>
    </div><!-- .container -->
</nav>