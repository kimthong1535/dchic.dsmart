<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined( 'ABSPATH' ) || exit;

$show_shipping = ! wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="woocommerce-customer-details">

	<?php if ( $show_shipping ) : ?>

	<section class="woocommerce-columns woocommerce-columns--2 woocommerce-columns--addresses col2-set addresses">

	<?php endif; ?>

	<h2 class="woocommerce-column__title"><?php esc_html_e( 'Thông tin khách hàng', 'woocommerce' ); ?></h2>

	<address class="detail-customer-order">
		<?php if ( $order->get_billing_first_name() ) : ?>
			<p>
			<?php _e('Họ và tên : ') ?>
			<span><?php echo esc_html( $order->get_billing_first_name() ); ?></span>
			</p>
		<?php endif; ?>
		<?php if ( $order->get_billing_address_1() ) : ?>
			<p>
			<?php _e('Địa chỉ : ') ?>
			<span><?php echo esc_html( $order->get_billing_address_1() ); ?></span>
			</p>
		<?php endif; ?>
		<?php if ( $order->get_billing_country() ) : ?>
			<p>
			<?php _e('Tỉnh/ thành phố : ') ?>
			<span><?php echo esc_html( $order->get_billing_country() ); ?></span>
			</p>
		<?php endif; ?>
		<?php if ( $order->get_billing_phone() ) : ?>
			<p>
			<?php _e('Điện thoại: ') ?>
			<span><?php echo esc_html( $order->get_billing_phone() ); ?></span>
			</p>
		<?php endif; ?>
		<?php if ( $order->get_billing_email() ) : ?>
			<p>
			<?php _e('Email: ') ?>
			<span><?php echo esc_html( $order->get_billing_email() ); ?></span>
			</p>
		<?php endif; ?>
	</address>

</section>
