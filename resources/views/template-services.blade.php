{{--

Template Name: Dịch vụ

--}}
@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <!--Begin body-->
  <div class="row" id="begin-body">
    <div class="w-100 float-left h-100 d-inline-block mt-4">
      <div class="article-detail row mr-md-0 mt-3">
        <div class="col-lg-12 float-left mb-3">
          <div class="article w-100 float-left">
            <div>
              <div id="itemContainer">
              @php
                $news = new WP_Query(array(
                  'post_type' => 'services',
                  'post_status' => 'publish',
                  'posts_per_page' => 10,
                  'orderby' => 'date',
                  'order' => 'DESC'
                    ));
                @endphp
                @if( $news->have_posts() )
                    @while( $news->have_posts() )
                      @php
                        $news->the_post();
                        if(has_post_thumbnail(get_the_ID())) {
                        $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                        } else {
                        $img_item = get_stylesheet_directory_uri() . '/resources/images/no-image.jpg';
                        }
                        $url = get_permalink();
                        $title = get_the_title();
                        $excerpt = get_the_excerpt();
                        $term = get_the_terms( get_the_ID(), 'category' )[0]->name;
                      @endphp
                        <div data-id="1161" class="col-lg-6 col-md-6 col-xs-12 col-sm-12 article-item float-left mb-4" style="margin-top: 20px; height: 740.766px; opacity: 1;">
                          <div class="featured-image w-100 float-left mb-lg-2 mb-md-2 mb-2">
                            <a href="{!!$url!!}" class="centered w-100 float-left">
                              <img class="img-detail w-100 float-left" src="{!!crop_img(768,512,$img_item)!!}" style="max-width: 100%; overflow:hidden" alt="ao-dai-viet-va-cau-chuyen-dang-sau-day-cuon-hut-5346179">
                            </a>
                          </div>
                          <div class="detail w-100 float-left">
                          <a href="{!!$url!!}"><h3 class="pt-2 pb-1">{!!$title!!} </h3></a>
                            <p class="subtitle-time mb-1">
                              <i class="far fa-clock"></i>
                              {!!date('F j, Y');!!}
                            </p>
                            <p class="w-100 float-left">{!!wp_trim_words($excerpt, 100, '...')!!}</p>
                          </div>
                        </div>
                    @endwhile
                    @php wp_reset_query(); @endphp
                @endif
              </div>
              @php wp_pagenavi(array( 'query' => $news));@endphp   
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Body-->
</div>
@endsection