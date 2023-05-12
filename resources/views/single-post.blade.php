@php
	$news = new WP_Query(array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => 3,
	'orderby' => 'date',
	'order' => 'DESC'
	 ));
@endphp
@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<!--Begin body-->
	<div class="row" id="begin-body">
		<div class="w-100 float-left mt-md-4 mt-0">
			<div class="col-2 float-left hidden-xs">
				<div class="cate-articale w-100 float-left" id="categoryArticle">
					@if (has_nav_menu('menu_news'))
					<nav class="nav-news" aria-label="{{ wp_get_nav_menu_name('menu_news') }}"> {!! wp_nav_menu(['theme_location' => 'menu_news', 'menu_class' => 'nav', 'echo' => false]) !!} </nav> @endif
				</div>
			</div>
			<div class="col-lg-10 float-left pl-0 pr-md-2 pr-0">
				<div class="article-page fullwidth not-fixed page-wrap article-wrap article-page-detail">
					<div class="article-detail w-100 float-left"> {!!the_content()!!} </div>
				</div>
			</div>
			
		</div>
	</div>
	<!--End Body-->
</div> @endsection