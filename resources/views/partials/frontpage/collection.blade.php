@php
	$news = new WP_Query(array(
	'post_type' => 'product',
	'post_status' => 'publish',
	'posts_per_page' => 4,
	'orderby' => 'date',
	'order' => 'DESC' 
    ));
@endphp
<section class="max-width-wp">
  <div id="collection-newest" class="row slide-collection"> 
      @if( $news->have_posts() )
      @while( $news->have_posts() )
          @php
              $news->the_post();
              $img_item = has_post_thumbnail(get_the_ID())? wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())) : get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
              $url = get_permalink();
              $title = get_the_title();
              $excerpt = get_the_excerpt();
              global $product;
              $product_id = $product->get_id();
              $product_info = wc_get_product( get_the_id() );
          @endphp
        <div class="col-md-3 col-xs-12 item">
          <a href="{{ the_permalink() }}" class="pro-thumb">
            <img class="img-desk" src="{{ $img_item }}">
          </a>
          <a href="{{ the_permalink() }}" class="pro-sku">
            <p>{{ $product_info->get_sku() }}</p>
          </a>
        </div> 
        @endwhile 
        @php wp_reset_query();@endphp
      @endif 
    <p class="shop-now">
      <a class="button-view" href="{{ home_url('/shop') }}">{{ __('SHOP NOW')}}</a>
    </p>
  </div>
</section> 