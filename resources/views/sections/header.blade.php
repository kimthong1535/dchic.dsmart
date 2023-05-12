@php
$option = get_option('redux_dsmart');
$quantity = WC()->cart->get_cart_contents_count();
@endphp
<header class="{{ ( is_front_page()) ? "white" : "black"}}" id="menu-main">
  <div id="top-menu" class="row">
    <div id="top-menu-left" class="col-5">
      @if (has_nav_menu('primary_navigation'))
      <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      </nav>
      @endif

    </div>
    <div id="top-menu-center" class="col-2">
      @if( isset( $option['logo']) )
      <h1><a href="{{ home_url() }}"><img src="{{ $option['logo']['url'] }}" alt="{{ get_option('blogname') }}" /></a></h1>
      @else
      <a href="{{ home_url() }}">{{ get_option('blogname') }}</a>
      @endif
    </div>
    <div id="top-menu-right" class="pull-right">
      <ul class="pull-right text-right">
        <li class="ajax-search"> {!!do_shortcode( '[wpdreams_ajaxsearchlite]' )!!}</li>
        <li class="select-search">
          <a href="#" id="search-box-btn-2" class="ic-search icon-header search-box-btn ic-bg-right ic-search-move">{{ __('TÌM KIẾM') }}</a>
        </li>
        <li>
            <a href="{{ wc_get_cart_url(); }}" class="xoo-wsc-cart-trigger">{{ __('GIỎ HÀNG') }}
            </a>
        </li>
        <div class="language">{!! do_shortcode('[wpml_language_selector_widget]') !!}</div>
      </ul>
    </div>
  </div>

</header>
<header class="font-sfui home  header-m-move" id="header-mobile">
  <div class="container padding0 content_wp">
    <div class="row">
      <div class="col-md-5" style="height: 100%;">
        <ul class="menu-top">
          <li><a href="javascript:void(0)" onclick="closeMenuM(this)" id="menu-m-btn" class="ic-menu icon-header" data-toggle="false"></a></li>
          <li><a href="javascript:void(0)" class="ic-menu-toggle"></a></li>
        </ul>
      </div>
      <div class="col-md-2 text-center" style="height: 100%;">
        <a href="{{ home_url() }}" class="ic-logo-bk" id="ic-logo">
          <img src="{{ $option['logo']['url'] }}" alt="{{ get_option('blogname') }}" />
        </a>
      </div>
      <div class="col-md-5 pull-right" id="top-menu-right" style="height: 100%; right: -15px;">
        <ul class="pull-right icon-mn-hd text-right">
          <li class="ajax-search"> {!!do_shortcode( '[wpdreams_ajaxsearchlite]' )!!}</li>
          <li class="select-search">
            <a href="#" id="search-box-btn-2" class="ic-search icon-header search-box-btn ic-bg-right ic-search-move"></a>
          </li>
          <li>
              <div class="xoo-wsc-cart-trigger"><a class="ic-shopping-cart icon-header ic-shopping-cart-move" href="javascript://"><span class="cart-item-num cart-items-total" style="top: -5px; left: 20px; font-size: 12px;"></span></a>
              </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</header>
<nav class="menu-m" id="menu-m">
  <div class="menu-m-wrap2">
    @if (has_nav_menu('menu_mobi'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'menu_mobi', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
    @endif
  </div>
  <div class="language">{!! do_shortcode('[wpml_language_selector_widget]') !!}</div>
</nav>