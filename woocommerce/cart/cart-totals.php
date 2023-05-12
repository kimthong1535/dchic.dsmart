<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart-checkout-content d-flex justify-content-center cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">
	<div class="checkout pt-0">
		<?php do_action( 'woocommerce_before_cart_totals' ); ?>

		<h6 class="text-left font-weight-bold"><?php esc_html_e( 'Giá trị đơn hàng', 'woocommerce' ); ?></h6>
		<hr>
			<div class="item-key d-flex justify-content-between form-group">
				<span><?php esc_html_e( 'Tổng tiền', 'woocommerce' ); ?></span>
				<span id="cart_money_total" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></span>
			</div>
			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<div class="item-key d-flex justify-content-between form-group cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<span><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
					<span id="cart-discount-total" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
				</div>
			<?php endforeach; ?>
			
			<div class="d-flex justify-content-between form-group">
				<div class="item-key">
					<?php _e('Phí vận chuyển') ?>
				</div>
				<div class="item-value text-right" id="cart-shipping-fee">
					<div><?php _e('Nội thành Hà Nội: 25.000 VNĐ')?></div>
					<div><?php _e('Ngoại thành Hà Nội: 35.000 VNĐ')?></div>
					<div><?php _e('Tỉnh/Thành phố khác: 40.000 VNĐ')?></div>
				</div>
			</div>

			<div class="order-total d-flex justify-content-between">
				<div class="item-key"><?php esc_html_e( 'Tổng tiền thanh toán', 'woocommerce' ); ?></div>
				<div class="item-value" id="cart_money_grandtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></div>
			</div>

			<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

		</table>

		<div class="wc-proceed-to-checkout d-flex justify-content-between">
			<div class="w-100">
				<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_after_cart_totals' ); ?>
	</div>
</div>
