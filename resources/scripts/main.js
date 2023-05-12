jQuery(document).ready(function($){
	// MENU_SAN_PHAM
	$('.nav-product .nav > .menu-item > a').prepend('<i class="fa-solid fa-chevron-down"></i>');

	$('#menu-menu-san-pham > .menu-item > a').on('click', function(_event) {
		$(this).toggleClass('active');
		$(this).siblings('.sub-menu').toggleClass('show').parents('.menu-item').siblings('.menu-item').find('a').removeClass('active').siblings('.sub-menu').removeClass('show');
	});
	// MENU FOOTER
	$('footer .menu .menu-item a').prepend('<i class="fa-solid fa-chevron-down"></i>');
	
	$('footer .menu .menu-item').on('click', function(_event) {
		$(this).find('a').toggleClass('active');
		$(this).find('.sub-menu').toggleClass('show').parents('.menu-item').siblings('.menu-item').find('a').removeClass('active').siblings('.sub-menu').removeClass('show');
	});
	// MENU_PRODUCT
	$('#menu-product-js').on('click', function(_event) {
		
		$(this).find('.select-selected').toggleClass('select-arrow-active');
		$(this).find('.select-items').toggleClass('select-hide').parents('.custom-select').siblings('#menu-product-js').find('#menu-product-js').removeClass('select-arrow-active').siblings('.select-items').removeClass('select-hide');
	});
	$('#top-menu-right .select-search').on('click', function(_event) {
		$(this).siblings('.ajax-search').toggleClass('search-active');
	});

	$('#employment-current-wrap > .js-show-modal > a').on('click', function(_event) {
		var id_recruit = $(this).parents('.product-item').attr('id'),
			content = $('.modal-'+id_recruit).html();
			$('.modal-body').html(content);
			
		if ($(this).hasClass('active')) {
		  $(this).removeClass('active');
		  $('#modal-recruitment > .v--modal-overlay').removeClass('show');
		  $(this).fadeOut();
		}else{
		  $(this).addClass('active')
		  $('#modal-recruitment > .v--modal-overlay').addClass('show');
		  $(this).fadeIn();
		}
	  });
	$('#employment-other-wrap > .js-show-modal > a').on('click', function(_event) {
		var id_recruit = $(this).parents('.product-item').attr('id'),
			content = $('.modal-'+id_recruit).html();
			$('.modal-body').html(content);

		if ($(this).hasClass('active')) {
		  $(this).removeClass('active');
		  $('#modal-recruitment > .v--modal-overlay').removeClass('show');
		  $(this).fadeOut();
		}else{
		  $(this).addClass('active')
		  $('#modal-recruitment > .v--modal-overlay').addClass('show');
		  $(this).fadeIn();
		}
	  });

	  
	  $('#close').on('click', function(_event) {
		
		if ($(this).hasClass('active')) {
			$(this).addClass('active');
			$('#modal-recruitment > .v--modal-overlay').addClass('show');
			$('#employment-current-wrap > .js-show-modal > a').addClass('active');
			$('#employment-other-wrap > .js-show-modal > a').addClass('active');

		}else{
			$(this).removeClass('active')
			$('#modal-recruitment > .v--modal-overlay').removeClass('show');
			$('#employment-current-wrap > .js-show-modal > a').removeClass('active');
			$('#employment-other-wrap > .js-show-modal > a').removeClass('active');

		}
		});
		$('#employment-player').on('click', function(_event) {
			
			if ($(this).hasClass('active')) {
				$(this).addClass('active')
				$('#modal-recruitment > .v--modal-overlay').addClass('show');
				$('#employment-current-wrap > .js-show-modal > a').addClass('active');
				$('#employment-other-wrap > .js-show-modal > a').addClass('active');
				
			}else{
				$(this).removeClass('active');
				$('#modal-recruitment > .v--modal-overlay').removeClass('show');
				$('#employment-current-wrap > .js-show-modal > a').removeClass('active');
				$('#employment-other-wrap > .js-show-modal > a').removeClass('active');

			}
			});
	
	// END MODAL

	// MENU_MOBILE
	$('#menu-m-btn').on('click', function(_event) {
		
		if ($(this).hasClass('active')) {
		  $(this).removeClass('active');
		  $('#menu-m').removeClass('active');
		  $(this).fadeOut();
		}else{
		  $(this).addClass('active')
		  $('#menu-m').addClass('active');
		  $(this).fadeIn();
		}
	  });
	  $('nav.menu-m .nav .menu-item a').on('click', function(_event) {
		$(this).toggleClass('active-native');
		$(this).siblings('.sub-menu').toggleClass('select-show').parents('.menu-item').siblings('.menu-item').find('.sub-menu').removeClass('select-show');
	  });
	  $('nav#menu-m .nav .menu-item ul.sub-menu li.menu-item a').on('click', function(_event) {
		$(this).addClass('active-native');
		$(this).siblings('.sub-menu').addClass('select-show').parents('.menu-item').siblings('.menu-item').find('.sub-menu').removeClass('select-show');
	  });
	// SEARCH
	$('.accordion-button').click(function(){
		$(this).toggleClass('expanded');
		$(this).parents('.accordion-item').find('.accordion-body').toggleClass('show').parents('.accordion-item').siblings('.accordion-item').find('.accordion-body').removeClass('show');
		$(this).parents('.accordion-item').siblings('.accordion-item').find('.accordion-button').removeClass('expanded');
	});
	$('.vi-wpvs-option-color').bind('click',function(){
		var text_color = $(this).siblings('.vi-wpvs-option-tooltip').attr('data-attribute_label');
		$('.name-color').text(text_color);
	});
	var not = $('.deskhop .d-none').length;
	$('.gallery-item span').html('+ ' + not);

	$('.jsor-gallery').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		prevArrow:
		'<button class="slick-prev" aria-label="Previous" type="button"><i class="fas fa-chevron-left"></i></i></button>',
	  	nextArrow:
		'<button class="slick-next" aria-label="Next" type="button"><i class="fas fa-chevron-right"></i></i></button>',
		fade: true,
		asNavFor: '.jsor-gallery-small'
	  });
	  $('.jsor-gallery-small').slick({
		slidesToShow: 2,
		slidesToScroll: 1,
		asNavFor: '.jsor-gallery',
		dots: true,
		centerMode: true,
		focusOnSelect: true
	  });

	// if ($(window).width() < 769) {
	// 	$('#product-detail .col-12.col-md-7').slick({
	// 		slidesToShow: 1,
	// 		slidesToScroll: 1,
	// 		dots: true,
	// 	  });
	// }
});
