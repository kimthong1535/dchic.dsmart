<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;
global $product;
$id = $product->get_id();
$product_info = wc_get_product( get_the_id() );

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );
if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
	<div class="row">
		<div class="col-12 col-md-7">
			<div class="deskhop" id="animated-thumbnails-gallery">
			<?php $attachment_ids = $product->get_gallery_image_ids();
			$count = 0; ?>
			<?php foreach( $attachment_ids as $attachment_id ) { 
				$count++;?>
				<a data-external-thumb-image="<?= wp_get_attachment_url( $attachment_id )?>" class="gallery-item form-group <?= ( $count > 4 ) ? 'd-none' : '' ?>" data-src="<?= wp_get_attachment_url( $attachment_id )?>">
					<img class="img-responsive w-100" src="<?php echo crop_img(437,583,wp_get_attachment_url( $attachment_id )) ?>" />
					<?php if ( $count == 4 ) {
						echo '<span></span>';
					} ?>
				</a>
			<?php } ?>
			</div>
		</div>
		<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
		?>

		<div class="col-12 col-md-5 d-flex justify-content-center">
			<div class="text-center info">
				<div>
					<div class="text-uppercase product-name"><?= $product_info->get_name();?></div>
					<div class="product-ms"><?php _e('MS: ') ?> <?= $product_info->get_sku();?></div>
				</div>
				<div class="info-product mt-2">
					<p style="margin-bottom:0;">
						<span class="pull-right">
							<span><?php echo currency_format($product_info->get_price());?></span>
						</span>
					</p>
					<p class="label form-group name-color"></p>
					<?php
					/**
					 * Hook: woocommerce_single_product_summary.
					 *
					 * @hooked woocommerce_template_single_title - 5
					 * @hooked woocommerce_template_single_rating - 10
					 * @hooked woocommerce_template_single_price - 10
					 * @hooked woocommerce_template_single_excerpt - 20
					 * @hooked woocommerce_template_single_add_to_cart - 30
					 * @hooked woocommerce_template_single_meta - 40
					 * @hooked woocommerce_template_single_sharing - 50
					 * @hooked WC_Structured_Data::generate_product_data() - 60
					 */
					do_action( 'woocommerce_single_product_summary' );
					?>
				</div>
				<div class="accordion" id="accordionExample">
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingOne">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php _e('Mô tả sản phẩm') ?></button>
						</h2>
						<div class="accordion-body">
							<?= $product->get_description(); ?>
						</div>
					</div>
					<div class="accordion-item">
						<h2 class="accordion-header" id="headingTwo">
							<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><?php _e('Bảo quản sản phẩm') ?></button>
						</h2>
						<div class="accordion-body">
							<?= get_field('huong_dan_bao_quan')?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12" id="product-relate">
			<div class="row mb-5  d-flex justify-content-center" style="background-color:#f6f6f6">
				<div class="col-12">
					<h4 class="text-center  mt-md-5 mt-4 mb-md-5 mb-4 title-product-related"><?php _e('Sản phẩm liên quan') ?></h4>
				</div>
				<div class="col-12">
					<div class="slide-relate d-flex justify-content-center" style="overflow:hidden">
						<div class="product-same-category">
						<?php
						$terms = get_the_terms($id, 'product_cat');
						$term_slug = [];
						if ( $terms ){
							foreach($terms as $item){
								$term_slug[] = $item->slug;
							}
						}
						$product_category = new WP_Query( 
							array(
								'post_type'             => 'product',
								'post_status'           => 'publish',
								'posts_per_page'        => 4,
								'post__not_in' => array($id),
								'tax_query' => array(
									'taxonomy' => 'product_cat',
									'field' => 'slug',
									'terms' => $term_slug,
								)
							)
						);
						?>
						<?php if( $product_category->have_posts() ) :
							while( $product_category->have_posts() ) :
									$product_category->the_post();
									$product_info_2 = wc_get_product( get_the_id() );
									if(has_post_thumbnail(get_the_ID())) {
										$img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
										} else {
										$img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
										} ?>
									<div class="item">
										<a href="<?= the_permalink(); ?>" class="text-dark">
											<div class="product-thumbnail">
												<img class="img-related-product" src="<?= crop_img(255,340,$img_item) ?>" alt="<?= the_title(); ?>">
											</div>
										</a>
										<div class="info-product info-product-fix p-1">
											<div class="name font-roboto-light"><?= the_title(); ?></div>
											<div class="price-detail-child"><span class="origin"><?php echo currency_format($product_info_2->get_price());?></span></div>
										</div>
									</div>
								<?php endwhile;
							wp_reset_query();
						endif; ?>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
