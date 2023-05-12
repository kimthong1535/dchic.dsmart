{{--

    Template Name: Album

--}}

@php
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
$news = new WP_Query(array(
    'post_type' => 'bo-suu-tap',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
    'paged' => $paged
));
@endphp

@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!--Begin body-->

    <div class="row" id="begin-body" style="padding-top: 54.0938px;">

        <div class="page-wrap album-wrap w-100 float-left">
            <div class="page-title-head">
                <h2>
                    <strong>
                        {{ __('BỘ SƯU TẬP')}}
                        <span class="border-bst"></span>
                    </strong>
                </h2>
            </div>
            <ul class="list-album list-item-div" id="ulAmbul">
            @if( $news->have_posts() )
                @while( $news->have_posts() )
                    @php
                    $news->the_post();
                    if(has_post_thumbnail(get_the_ID())) {
                    $img_item = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                    } else {
                    $img_item = get_stylesheet_directory_uri() . '/assets/images/no-image.jpg';
                    }
                    $url = get_permalink();
                    $title = get_the_title();
                    @endphp
                    <li class="col- col-sm-4 col-md-4 item-div float-left mb-6 pl-3 pr-3" style="height: 983.812px; opacity: 1;">
                    <a href="{!!$url!!}">
                        <div class="items-thumb">
                            <div class="col-12 float-left">
                                <div class="item-thumb item-thumb-first item-img">
                                    <div class="item-thumb-abs">
                                    <img  src="{!!crop_img(576,768,$img_item)!!}" style="max-width: 100%;" alt="ao-dai-viet-va-cau-chuyen-dang-sau-day-cuon-hut-5346179">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 album-info">
                            <h3><strong class="w-100 float-left mb-1 mt-md-3 mt-2 mb-md-3 mb-2">{!!$title!!}</strong></h3>
                            <span class="more-ambul "> {{ __('XEM THÊM')}}</span>
                        </div>
                    </a>
                </li>
                    @endwhile
                    @php wp_reset_query(); @endphp
                @endif
            </ul>
            <div class="col-12 mt-2 mb-5 float-left">
                <div class="holder w-100 float-left">

                </div>
            </div>
        </div>
    </div>
    <!--End Body-->
</div>

@endsection