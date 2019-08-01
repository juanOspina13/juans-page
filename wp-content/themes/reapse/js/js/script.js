(function($){
	"use strict";
	
	var portfolio = jQuery('.portfolio-items'),
		blog = jQuery('.blog-posts'),
		sect = jQuery( window.location.hash );
	
	function switchSection(sect){
		var sec_id =jQuery(sect).attr('id'), 
			tab_link = jQuery('.tabs a[href="#'+ sec_id +'"]');
		if( sect.length==1){
			jQuery('.section.active').removeClass('active');
			sect.addClass('active');
			if( tab_link.length == 1 ){
				jQuery('.tabs a.active').removeClass('active');
				tab_link.addClass('active');
			}
		}
	}
	
	switchSection(sect);
	
	/*=========================================================================
		Initializing Skillbars
	=========================================================================*/
	jQuery('.skill').each(function(){
		var jQuerythis = jQuery(this),
			percent = jQuerythis.data('percent');
		jQuerythis.append("<span class='percent' >"+percent+"%</span><div class='skill-bar' ><div style='width:"+percent+"%;' ></div></div>");
	});
	
	/*=========================================================================
		Testimonials Slider
	=========================================================================*/
	jQuery('.testimonials-slider').owlCarousel({
		items: 1
	});
	jQuery(window).on('load', function(){
		portfolio.shuffle({
			gutterWidth: 8
		});
		blog.shuffle({
			gutterWidth: 20
		});
		jQuery('body').addClass('loaded');
	});
	
	/*=========================================================================
		Portfolio Filters Function
	=========================================================================*/
	jQuery('.portfolio-filters > li > a').on('click', function (e) {
		e.preventDefault();
		var groupName = jQuery(this).attr('data-group');
		jQuery('.portfolio-filters > li > a').removeClass('active');
		jQuery(this).addClass('active');
		portfolio.shuffle('shuffle', groupName );
	});
	
	/*=========================================================================
		Menu Items Function
	=========================================================================*/
	jQuery('.section-link').on('click', function(e){
		var jQuerythis = jQuery(this),
			sect = jQuerythis.attr('href'),
			sect = jQuery(sect);
		switchSection(sect);
	});
	
	/*=========================================================================
		Portfolio Popups
	=========================================================================*/
	jQuery('.has-popup').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		overflowY: 'auto',
		closeBtnInside: true,
		preloader: false,
		midClick: true,
		removalDelay: 300,
		mainClass: 'my-mfp-zoom-in'
	});
	jQuery('figure').fitVids();
	/*=========================================================================
		Contact Form
	=========================================================================*/
	function isJSON(val){
		var str = val.replace(/\\./g, '@').replace(/"[^"\\\n\r]*"/g, '');
		return (/^[,:{}\[\]0-9.\-+Eaeflnr-u \n\r\t]*jQuery/).test(str);
	}
	jQuery('#contact-form').validator().on('submit', function (e) {
		if (!e.isDefaultPrevented()) {
			// If there is no any error in validation then send the message
			e.preventDefault();
			var jQuerythis = jQuery(this),
				//You can edit alerts here
				alerts = {
					success: 
					"<div class='form-group' >\
						<div class='alert alert-success' role='alert'> \
							<strong>Message Sent!</strong> We'll be in touch as soon as possible\
						</div>\
					</div>",
					error: 
					"<div class='form-group' >\
						<div class='alert alert-danger' role='alert'> \
							<strong>Oops!</strong> Sorry, an error occurred. Try again.\
						</div>\
					</div>"
				};
			jQuery.ajax({
				url: 'mail.php',
				type: 'post',
				data: jQuerythis.serialize(),
				success: function(data){
					if( isJSON(data) ){
						data = jQuery.parseJSON(data);
						if(data['error'] == false){
							jQuery('#contact-form-result').html(alerts.success);
							jQuery('#contact-form').trigger('reset');
						}else{
							jQuery('#contact-form-result').html(
							"<div class='form-group' >\
								<div class='alert alert-danger alert-dismissible' role='alert'> \
									<button type='button' class='close' data-dismiss='alert' aria-label='Close' > \
										<i class='ion-ios-close-empty' ></i> \
									</button> \
									"+ data['error'] +"\
								</div>\
							</div>"
							);
						}
					}else{
						jQuery('#contact-form-result').html(alerts.error);
					}
				},
				error: function(){
					jQuery('#contact-form-result').html(alerts.error);
				}
			});
		}
	});
})(jQuery);