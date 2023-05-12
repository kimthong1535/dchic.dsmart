@php
	$news = new WP_Query(array(
	'post_type' => 'services',
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
	<div class="row" id="begin-body" style="padding-top: 20px;">
		<div class="w-100 float-left mt-md-4 mt-0" style="padding:0px 60px;">
			<div class="col-lg-12 float-left pl-0 pr-md-2 pr-0">
				<div class="article-page fullwidth not-fixed page-wrap article-wrap article-page-detail">
					<div class="article-detail w-100 float-left"> {!!the_content()!!} </div>
				</div>
			</div>
		</div>
	</div>
	<!--End Body-->
</div> @endsection