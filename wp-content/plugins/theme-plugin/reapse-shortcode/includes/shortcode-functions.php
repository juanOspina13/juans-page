<?php
/**
*
*
*
 * Allow shortcodes in widgets
 * @since v1.0
 */
add_filter('widget_text', 'do_shortcode');



// LRK Shortcode Start Here

// LRK container
if(! function_exists('reapse_content_shortcode')){
	function reapse_content_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
				'bg_color'=>'',		

			), $atts) );
			$html='';			
			$html .= '<div class="content-block">';
			$html .= do_shortcode($content);
			$html .= '</div>';			

			return $html;
	}
	add_shortcode('reapse_content_wrapper', 'reapse_content_shortcode');
}
// Mari row
if(! function_exists('reapse_row_shortcode')){
	function reapse_row_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
				'bg_color'=>'',		

			), $atts) );
			$html='';
			$html .= '<div class="row">';
			$html .= do_shortcode($content);
			$html .= '</div>';

		return $html;
	}
	add_shortcode('reapse_row', 'reapse_row_shortcode');
}

if(! function_exists('reapse_section_headline_shortcode')){
	function reapse_section_headline_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
				'headline'=>'',
				'h_s_con'=>'',		

			), $atts) );
			$html='';
			$html .= '<h6 class="small-heading">'.$headline.'</h6>';
			

		return $html;
	}
	add_shortcode('reapse_section_headline', 'reapse_section_headline_shortcode');
}

// Profile Shortcode

if(! function_exists('reapse_Profile_shortcode')){
	function reapse_Profile_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
				'bg_clr'=>'',			

			), $atts) );
		
			
			$html='';	
			
			$html .= '<div class="v-align">';
			$html .= '<div class="inner">';
			$html .= '<div class="container-fluid">';
			$html .= '<div class="intro-text">';
			$html .= '<div class="person-img">';
			$html .= '<img src="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('logoimg','url');
			$html .= '" alt>';
			$html .= '</div>';
			$html .= '<h4>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('pro_intro');
			$html .= '</h4>';
			$html .= '<h2>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('pro_name');
			$html .= '</h2>';
			$html .= '<p>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('pro_scontent');
			$html .= '</p>';
			$html .= '<a class="portfolio-link section-link" href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('p_btn_link');
			$html .= '">';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('p_btn_content');
			$html .= '<i class="ion-ios-arrow-thin-right"></i>';
			$html .= '</a>';	
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';

			$html .= '<div class="intro-footer">';
			$html .= '<div class="container-fluid">';
			$html .= '<div class="row">';
			$html .= '<div class="col-xs-4">';
			$html .= '<a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('h_btn_link');
			$html .= '" class="hire-me section-link">';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('h_btn_content');
			$html .= '</a>';
			$html .= '</div>';
			$html .= '<div class="col-xs-8 text-right">';
			$html .= '<ul class="footer-social">';
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('fb')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('fblink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('fblink'));
			$html .= '"><i class="ion-social-facebook"></i></a></li>';
			}
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('tw')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('twlink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('twlink'));
			$html .= '"><i class="ion-social-twitter"></i></a></li>';
			}
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('dr')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('drlink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('drlink'));
			$html .= '"><i class="ion-social-dribbble"></i></a></li>';
			}
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('pin')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('pinlink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('pinlink'));
			$html .= '"><i class="ion-social-pinterest"></i></a></li>';
			}
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('in')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('inlink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('inlink'));
			$html .= '"><i class="ion-social-linkedin"></i></a></li>';
			}
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('g')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('glink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('glink'));
			$html .= '"><i class="ion-social-googleplus"></i></a></li>';
			}
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('yt')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('ytlink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('ytlink'));
			$html .= '"><i class="ion-social-youtube"></i></a></li>';
			}
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('ins')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('inslink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('inslink'));
			$html .= '"><i class="ion-social-instagram"></i></a></li>';
			}			
			 if (reapse_AfterSetupTheme::reapse_return_theme_option('drp')=='yes'){
			$html .= '<li><a href="';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('dblink')==null?'#': esc_url(reapse_AfterSetupTheme::reapse_return_theme_option('dblink'));
			$html .= '"><i class="ion-social-dropbox"></i></a></li>';
			}
			$html .= '</ul>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</div>';			

		return $html;
	}
	add_shortcode('reapse_Profile', 'reapse_Profile_shortcode');
}
// About Me
if(! function_exists('reapse_about_me_shortcode')){
	function reapse_about_me_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'headline'=>'',
			
			), $atts) );

			$html='';
			$html .= '<div class="about-text">';
			$html .= '<h2>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('a_1_content');
			$html .= '</h2>';
			$html .= '<h4>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('a_2_content');
			$html .= '</h4>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('a_me');			
			$html .= '</div>';
			
			
		return $html;
	}
	add_shortcode('reapse_about_me', 'reapse_about_me_shortcode');
}

if(! function_exists('reapse_fact_shortcode')){
	function reapse_fact_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'fact_title'=>'',
			'fact_number'=>'',
			
			), $atts) );

			$html='';					
			$html .= '<div class="col-sm-4 col-xs-6">';
			$html .= '<div class="funfact">';
			$html .= '<h4>'.$fact_number.'</h4>';
			$html .= '<p>'.$fact_title.'</p>';			
			$html .= '</div>';
			$html .= '</div>';
						
			
		return $html;
	}
	add_shortcode('reapse_fact', 'reapse_fact_shortcode');
}

// Service content
if(! function_exists('reapse_services_shortcode')){
	function reapse_services_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			's_title'=>'',
			's_icon'=>'',
			's_content'=>'',
			
			), $atts) );

			$html='';			
			$html .= '<div class="col-sm-6">';
			$html .= '<div class="service">';
			$html .= '<i class="'.$s_icon.'"></i>';
			$html .= '<h4>'.$s_title.'</h4>';
			$html .= '<p>'.$s_content.'</p>';
			$html .= '</div>';
			$html .= '</div>';
			
			
		return $html;
	}
	add_shortcode('reapse_services', 'reapse_services_shortcode');
}

// skill

if(! function_exists('reapse_skill_shortcode')){
	function reapse_skill_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'sk_title'=>'',
			'sk_percent'=>'',
			
			), $atts) );

			$html='';			
			
			$html .= '<div class="skill" data-percent="'.$sk_percent.'">';			
			$html .= '<h4>'.$sk_title.'</h4>';		
			$html .= '</div>';
				
			
		return $html;
	}
	add_shortcode('reapse_skill', 'reapse_skill_shortcode');
}
// price table

if(! function_exists('reapse_price_shortcode')){
	function reapse_price_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'p_title'=>'',
			'p_currency'=>'',
			'p_amount'=>'',
			'p_duretion'=>'',
			'p_content'=>'',
			'p_btn_content'=>'',
			'p_btn_link'=>'',
			
			), $atts) );

			$html='';			
			$html .= '<div class="col-sm-6">';
			$html .= '<div class="p-table">';
			$html .= '<div class="header">';			
			$html .= '<h4>'.$p_title.'</h4>';
			$html .= '<div class="price">';
			$html .= '<span class="currency">'.$p_currency.'</span>';
			$html .= '<span class="amount">'.$p_amount.'</span>';
			$html .= '<span class="period">/'.$p_duretion.'</span>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= $content;
			$html .= '<a href="'.$p_btn_link.'" class="btn-custom p-btn">'.$p_btn_content.'</a>';			
			$html .= '</div>';
			$html .= '</div>';
			
			
		return $html;
	}
	add_shortcode('reapse_price', 'reapse_price_shortcode');
}

if(! function_exists('reapse_education_shortcode')){
	function reapse_education_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'headline'=>'',
			
			), $atts) );

			$html='';			
			
			$html .= '<ul class="timeline">';
			global $post;
			query_posts(array('post_type' => 'education',
							  'showposts' => -1
							    ));
			while ( have_posts() ) : the_post();
			$education_category = wp_get_post_terms($post->ID,'education_category');
			$html .= '<li>';
			$html .= '<div class="row">';
			$html .= '<div class="col-sm-4">';
			$html .= '<strong>';
			$html .= rwmb_meta( 'reapse_ed_time');
			$html .= '</strong>';
			$html .= '</div>';
			$html .= '<div class="col-sm-8">';	
			$html .= '<h4>';
			$html .= get_the_title();
			$html .= '</h4>';
			$html .= '<span>';
			$html .= rwmb_meta( 'reapse_ed_deg');
			$html .= '</span>';			
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</li>';
			endwhile;
			wp_reset_query();
			$html .= '</ul>';			

		return $html;
	}
	add_shortcode('reapse_education', 'reapse_education_shortcode');
}
// Employement

if(! function_exists('reapse_employment_shortcode')){
	function reapse_employment_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'headline'=>'',
			
			), $atts) );

			$html='';			
			
			$html .= '<ul class="timeline">';
			global $post;
			query_posts(array('post_type' => 'employment',
							  'showposts' => -1
							    ));
			while ( have_posts() ) : the_post();
			$employment_category = wp_get_post_terms($post->ID,'employment_category');
			$html .= '<li>';
			$html .= '<div class="row">';
			$html .= '<div class="col-sm-4">';
			$html .= '<strong>';
			$html .= rwmb_meta( 'reapse_em_time');
			$html .= '</strong>';
			$html .= '</div>';
			$html .= '<div class="col-sm-8">';	
			$html .= '<h4>';
			$html .= get_the_title();
			$html .= '</h4>';
			$html .= '<span>';
			$html .= rwmb_meta( 'reapse_em_deg');
			$html .= '</span>';			
			$html .= '</div>';
			$html .= '</div>';
			$html .= '</li>';
			endwhile;
			$html .= '</ul>';

		return $html;
	}
	add_shortcode('reapse_employment', 'reapse_employment_shortcode');
}
// Testimonial wrap
if(! function_exists('reapse_client_wrapper_shortcode')){
	function reapse_client_wrapper_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
				'bg_color'=>'',		

			), $atts) );
			$html='';
			$html .= '<div class="testimonials-slider">';
			$html .= do_shortcode($content);
			$html .= '</div>';

		return $html;
	}
	add_shortcode('reapse_client_wrapper', 'reapse_client_wrapper_shortcode');
}
if(! function_exists('reapse_client_shortcode')){
	function reapse_client_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
				't_content'=>'',
				'c_name'=>'',
				'c_img'=>'',
				'c_deg'=>'',		

			), $atts) );
			$html='';
			$html .= '<div class="testimonial">';
			$html .= '<div class="author-img">';
			$html .= '<img src="'.$c_img.'" alt>';
			$html .= '</div>';
			$html .= '<div class="content">';
			$html .= '<div class="author-info">';
			$html .= '<strong>'.$c_name.'</strong>';
			$html .= '<span>'.$c_deg.'</span>';
			$html .= '</div>';
			$html .= '<p>'.$t_content.'</p>';
			$html .= '</div>';
			$html .= '</div>';

		return $html;
	}
	add_shortcode('reapse_client', 'reapse_client_shortcode');
}

// Portfolio

if(! function_exists('reapse_portfolio_shortcode')){
	function reapse_portfolio_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'class'=>'',
			'id'=>'',					

			), $atts) );

		$html='';
		
		if(!get_post_meta(get_the_ID(), 'portfolio_category', true)):
		$portfolio_category = get_terms('portfolio_category');
		if($portfolio_category):
		$html .= '<ul class="portfolio-filters">';
		$html .= '<li><a href="#" class="active"  data-group="all">All</a></li>';
		foreach($portfolio_category as $portfolio_cat):
		$html .= '<li><a href="#" data-group="';
		$html .= $portfolio_cat->slug;;
		$html .= '">';
		$html .= $portfolio_cat->name;
		$html .= '</a></li>';
		endforeach;
		$html .= '</ul>';
		endif;
		endif;
		$html .= '<ul class="portfolio-items">';
		global $post;
		query_posts(array('post_type' => 'portfolio',
						  'showposts' => -1
						    ));
		while ( have_posts() ) : the_post();
		$portfolio_category = wp_get_post_terms($post->ID,'portfolio_category');
		$cats = array();
		$cat_name = array();
		foreach($portfolio_category as $portfolio_category){        
		array_push($cats,$portfolio_category->slug);
		array_push($cat_name,$portfolio_category->name);
		}
		$portfolio_category = implode('","',$cats); 
		$html .= '<li data-groups=["';
		$html .= $portfolio_category;
		$html .= '"]>';
		$html .= '<div class="inner">';			
		$url=wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
		$html .= '<img src="';
		$html .= $url;
		$html .= '" alt="">';		
		$html .= '<a href="#';
		global $post;
		$slug = get_post( $post )->post_name;
		$html .= $slug;
		$html .= '" class="overlay has-popup">';
		$html .= '<h4>';
		$html .= get_the_title();
		$html .= '</h4>';
		$html .= '<p>';
		$html .= $portfolio_category;
		$html .= '</p>';
		$html .= '</a>';
		$html .= '</div>';
		$html .= '<div id="';		
		$html .= $slug;
		$html .= '" class="popup-box zoom-anim-dialog mfp-hide">';
		$html .= '<figure>';		
		$html .= '<img src="';
		$html .= $url;
		$html .= '" alt>';
		$html .= '</figure>';
		$html .= '<div class="content">';
		$html .= '<h4>';
		$html .= get_the_title();
		$html .= '</h4>';
		$html .= '<p>';
		$html .= get_the_content();
		$html .= '</p>';
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</li>';		
		endwhile;
		wp_reset_query();		
		$html .= '</ul>';
				
		return $html;
	}
	add_shortcode('reapse_portfolio', 'reapse_portfolio_shortcode');
}
// Blog
if(! function_exists('reapse_blog_shortcode')){
	function reapse_blog_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			'headline'=>'',
			
			), $atts) );

			$html='';
			
			$html .= '<ul class="blog-posts">';			
			global $post;
			query_posts(array('post_type' => 'post',
							  'showposts' => -1
							    ));
			while ( have_posts() ) : the_post();
			$html .= '<li>';			
			$html .= '<div class="blog-post">';
			$html .= '<figure>';
			$url=wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') );
			$html .= '<img src="';
			$html .= $url;
			$html .= '" alt>';
			$html .= '</figure>';	
			$html .= '<div class="content">';
			$html .= '<h4>';
			$html .= '<a href="';
			$html .= get_the_permalink();
			$html .= '">';
			$html .= get_the_title();
			$html .= '</a>';			
			$html .= '</h4>';
			$html .= '<ul class="post-icons">';
			$html .= '<li>';
			$html .= '<i class="ion-ios-person"></i>';
			$html .= '<span>';
			$html .= get_the_author();
			$html .= '</span>';
			$html .= '</li>';
			$html .= '<li>';
			$html .= '<i class="ion-ios-clock"></i>';
			$html .= '<span>';
			$html .= get_the_date('m F');
			$html .= '</span>';
			$html .= '</li>';
			$html .= '<li>';
			$html .= '<i class="ion-ios-pricetag"></i>';
			$html .= '<span>';
			$cats = array();
		     $cat_name = array();
		     $categories = get_the_category();
		     foreach($categories as $category){        
		      array_push($cats,$category->slug);
		      array_push($cat_name,$category->name);
		     }

		     $post_categories = implode(', ',$cats);
		    $html .= $post_categories;
			$html .= '</span>';
			$html .= '</li>';			
			$html .= '</ul>';
			$html .= '</div>';
			$html .= '<p>';
			$html .= get_the_excerpt();
			$html .= '</p>';
			$html .= '<a href="';
			$html .= get_the_permalink();
			$html .= '" class="read-more">';
			$html .= 'Read More';
			$html .= '</a>';
			$html .= '</div>';
			$html .= '</li>';
			endwhile;			
			$html .= '</ul>';

		return $html;
	}
	add_shortcode('reapse_blog', 'reapse_blog_shortcode');
}

// Contact

if(! function_exists('reapse_contact_shortcode')){
	function reapse_contact_shortcode($atts, $content = null){
		extract(shortcode_atts( array(
			
			), $atts) );
		
			$html='';

			$html .= '<div class="row contact-infos">';	
			$html .= '<div class="col-sm-4 col-xs-6">';
			$html .= '<div class="contact-info">';
			$html .= '<i class="icon-basic-mail"></i>';			
			$html .= '<p>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('weba');
			$html .= '</p>';
			$html .= '</div>';
			$html .= '</div>';		
			$html .= '<div class="col-sm-4 col-xs-6">';
			$html .= '<div class="contact-info">';
			$html .= '<i class="ion-ios-location-outline"></i>';			
			$html .= '<p>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('address');			
			$html .= '</p>';
			$html .= '</div>';
			$html .= '</div>';
			$html .= '<div class="col-sm-4 col-xs-6">';
			$html .= '<div class="contact-info">';
			$html .= '<i class="icon-basic-smartphone"></i>';			
			$html .= '<p>';
			$html .= reapse_AfterSetupTheme::reapse_return_theme_option('phone');
			$html .= '</p>';
			$html .= '</div>';
			$html .= '</div>';			
			$html .= '</div>';
			$html .= '<div class="contact-form">';
			$html .= '<div id="contact-form-result"></div>';
			$html .= do_shortcode($content);
			$html .= '</div>';					
				
		return $html;
	}
	add_shortcode('reapse_contact', 'reapse_contact_shortcode');
}