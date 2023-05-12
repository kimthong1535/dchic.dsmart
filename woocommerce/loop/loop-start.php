<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="w-product">
	<div class="wp-menu-product">
	<?php if (has_nav_menu('menu_products')){ ?>
	<nav class="nav-product" aria-label="<?= wp_get_nav_menu_name('menu_products') ?>"> <?= wp_nav_menu(['theme_location' => 'menu_products', 'menu_class' => 'nav', 'echo' => false]) ?> </nav>
	<?php }?>
	</div>
	<div id="list-products" class="row product-content list-item-div">

