{{-- 
    Template Name: Showroom
--}} 
@extends('layouts.app') 
@section('content') 
<div class="container-fluid">
  <!--Begin body-->
  <div class="row" id="begin-body">
    <div class="container content content_wp not-fixed body-content" id="content">
      <div class="row showroom-page">
        <div class="wrapper_main_2_column_left">
          <!-- wrapper_main -->
          <div class="col-sm-4 col-12 float-left">
            <div class="block_showroom showroom_0 blocks_showroom blocks0 block" style="margin-bottom: 30px;">
              <ul>
                <li class="item level_0  "> 
                    @if(have_rows('showroom_location')) 
                        @while(have_rows('showroom_location')) 
                            @php the_row(); 
                            @endphp
                            <h2 class="cat_title">{{ get_sub_field('location_titel') }}</h2>
                            <ul class="wrapper_children showroom-list-wp" style="list-style-type:disc; margin-left:20px;">
                                @if(have_rows('location_content')) 
                                    @while(have_rows('location_content')) 
                                        @php the_row(); 
                                        @endphp 
                                        <li class="item level_1 fix-showroom">
                                        <h3 class="name">
                                        <a href="{{ get_sub_field('location_url') }}">{{ get_sub_field('location_adress') }}</a>
                                        </h3>
                                        </li> 
                                    @endwhile 
                                    @php wp_reset_query();@endphp
                                @endif 
                            </ul>
                        @endwhile 
                    @endif 
                    <!-- {!! get_field('location') !!} -->
                  <div class="clear"></div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-sm-8 col-12 showroom-detail float-left">
            <!-- main-area -->
            <div class="inner-main-area">
              <div class="clear"></div>
              <div class="address">
                <h1 class="title">{{ get_field('showroom_titel')}} </h1>
                <p  class="title-detail">
                  <i class="glyphicon glyphicon-map-marker"></i>&nbsp;{{ get_field('showroom_address')}}
                </p>
                <p  class="title-detail titel-detail-hotline">
                  <i class="glyphicon glyphicon-phone-alt"></i>&nbsp;{{ get_field('showroom_hotline')}}
                </p>
                <div class="more_info"></div>
                <div class="jsor-gallery">
                    @if(have_rows('showroom_list')) 
                        @while(have_rows('showroom_list')) 
                        @php the_row();
                        $img_item = get_sub_field('showroom_image'); 
                        @endphp
                        <img src="{!!crop_img(768,512,$img_item)!!}">
                        @endwhile 
                        @php wp_reset_query();@endphp
                    @endif 
                </div>
                <div class="jsor-gallery-small">
                    @if(have_rows('showroom_list')) 
                        @while(have_rows('showroom_list')) 
                        @php the_row();
                        $img_item = get_sub_field('showroom_image'); 
                        @endphp
                        <img src="{!!$img_item!!}">
                        @endwhile 
                        @php wp_reset_query();@endphp
                    @endif 
                </div>
                <div class="content-box title-detail" style="clear: left;padding-top: 25px"> {!!the_content()!!} <p></p>
                </div>
              </div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
      </div>
    </div>
    <link href="/css/showroom.css" rel="stylesheet">
  </div>
  <!--End Body-->
</div> 
@endsection