(function($) {
    "use strict";
    jQuery(document).ready(function($) {
		
		/*----------------------------------------------------
						One Page Menu
		/*----------------------------------------------------*/
		if($("#theme-menu-list").length ) {
			$('#theme-menu-list a').click(function(e) {
				var $this = $(this),
					target = $this.attr('href');
				if(target.match(/#/g)){	
					var res = target.split("#");
					target = '#'+res[1];
				}
				// Don't return false!
				if (target == '#') return;
				var offset = $(target).offset().top ;
				$( 'html, body' ).animate({
					scrollTop: offset
				}, 500);
			});
		}
			
      	/*----------------------------------------------------
						Sidebar widgets 
		/*----------------------------------------------------*/
		 if( $("#sidebar-actions").length){
			$('#sidebar-actions').on('click', function(e) {
				e.preventDefault();
				$(this).toggleClass('active');
				$('body').toggleClass('nav-expanded');
			});
		}
		/*----------------------------------------------------
						Aside Action 
		/*----------------------------------------------------*/	
		
		 if( $("#aside-nav-actions").length){
			$('#aside-nav-actions').on('click', function(e) {
				e.preventDefault();
				$(this).toggleClass('active');
				$('#aside-nav-wrapper').toggleClass('show');
			});
		}
	
		
		/*----------------------------------------------------
						Responsive Load Drop down 
		/*----------------------------------------------------*/
		if( $('#aside-nav-wrapper .navbar-nav li.menu-item-has-children').length ){
			
			$('#aside-nav-wrapper .navbar-nav li.menu-item-has-children').each(function(index, element) {
                $(this).append('<i class="responsive-nav-show-hide fa fa-chevron-down"></i>');
				
            });
		}
		
	
		/*----------------------------------------------------
						Responsive drop down menu 
		/*----------------------------------------------------*/
		if( $(".responsive-nav-show-hide").length){
			$('.responsive-nav-show-hide').on('click', function(e) {
				e.preventDefault();
				$(this).toggleClass('fa-chevron-down').toggleClass('fa-chevron-up');
				$(this).parents('li').find('ul.sub-menu').eq(0).toggle();
				
			});
		}

		
		/*----------------------------------------------------
						Counter Function 
		/*----------------------------------------------------*/
        var timer = $('.timer');
        if(timer.length) {
           timer.countTo();
        }
		
		 
		/*----------------------------------------------------
						Gallery Slider 
		/*----------------------------------------------------*/ 
        if( $('.theme-own-carousel .gallery').length ){
			$(".theme-own-carousel .gallery").owlCarousel({
				
				stagePadding: 0,
				loop: true,
				autoplay: true,
				autoplayTimeout: 2000,
				margin: 10,
				nav: false,
				dots: false,
				smartSpeed: 1000,
				responsive: {
					0: {
						items: 1
					},
					600: {
						items: 1
					},
					1000: {
						items: 1
					}
				}
			});
		}
		/*----------------------------------------------------
						Partner Logo 
		/*----------------------------------------------------*/
        var logoslider = $ (".partner-logo");
          if(logoslider.length) {
			 
              logoslider.owlCarousel({
                loop:true,
                nav:false,
                dots:false,
                autoplay:true,
                autoplayTimeout:4000,
                autoplaySpeed:1000,
                lazyLoad:true,
                singleItem:true,
                responsive:{
                    0:{
                        items:1
                    },
                    550:{
                        items:2
                    },
                    768:{
                        items:3
                    },
                    992:{
                        items:4
                    }
                }
            });
          }
		/*----------------------------------------------------
						magnificPopup
		/*----------------------------------------------------*/  
		
		if( $(".image-popup").length ){
			 $('.image-popup').magnificPopup({type:'image'});
		}
      
		/*----------------------------------------------------
						Testimonial SLider
		/*----------------------------------------------------*/
          var tsSlider = $ (".client-slider");
            if(tsSlider.length) {
                tsSlider.owlCarousel({
                  loop:true,
                  nav:false,
                  dots:false,
                  autoplay:true,
                  margin:30,
                  autoplayTimeout:4000,
                  autoplaySpeed:1000,
                  lazyLoad:true,
                  singleItem:true,
                  responsive:{
                      0:{
                          items:1
                      },
                      768:{
                          items:2
                      }
                  }
              });
            }
			/*----------------------------------------------------
							Portfolio Grid
			/*----------------------------------------------------*/
			 if($(".online-cv-resume-pro-portfolio-grid").length ) {
				
				//$('#online-cv-resume-pro-portfolio-grid').mixItUp();
				 var mixer = mixitup(".online-cv-resume-pro-portfolio-grid");
			 }
        
	     	/*----------------------------------------------------
							Aside slimscroll
			/*----------------------------------------------------*/
			if($("#aside-nav-wrapper.fixed .scroll-type-fixed").length ) {
				$('#aside-nav-wrapper.fixed .scroll-type-fixed').slimScroll({
					height: '100vh'
				});
			}
			/*----------------------------------------------------
							Progress Bar
			/*----------------------------------------------------*/
			
			$('.progress-bar').each(function(){
				var width = $(this).data('percent');
				$(this).css({'transition': 'width 3s'});
				$(this).appear(function() {
					console.log('hello');
					$(this).css('width', width + '%');
					$(this).find('.count').countTo({
						from: 0,
						to: width,
						speed: 3000,
						refreshInterval: 50,
					});
				});
			});
			/*----------------------------------------------------
							One Page Menu
			/*----------------------------------------------------*/
		   if($("#theme-menu-list").length) {
          $('#theme-menu-list a').on('click', function(){
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
              if (target.length) {
                $('html, body').animate({
                  scrollTop: (target.offset().top - 0)
                }, 1000, "easeInOutExpo");
                return false;
              }
            }
          });
		}
		
    });

    
    $(window).on ('load', function (){ // makes sure the whole site is loaded
		/*----------------------------------------------------
							Page Loader
		/*----------------------------------------------------*/
		if( $('#loader-wrapper').length ){
			$('#loader').fadeOut(); // will first fade out the loading animation
			$('#loader-wrapper').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
			$('body').delay(350).css({'overflow':'visible'});
		}
		
		/*----------------------------------------------------
							AOS Animation
		/*----------------------------------------------------*/
        AOS.init({
          duration: 1000,
          mirror: true
        });


	});
	
})(jQuery);

