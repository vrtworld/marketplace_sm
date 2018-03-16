(function($){
	$(document).ready(function(){
		particlesJS('particles-js',
  
  {
  "particles": {
    "number": {
      "value": 142,
      "density": {
        "enable": true,
        "value_area": 2367.442924896818
      }
    },
    "color": {
      "value": "#ffffff"
    },
    "shape": {
      "type": "circle",
      "stroke": {
        "width": 0,
        "color": "#000000"
      },
      "polygon": {
        "nb_sides": 5
      },
      "image": {
        "src": "img/github.svg",
        "width": 100,
        "height": 100
      }
    },
    "opacity": {
      "value": 0.5,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 1,
        "opacity_min": 0.1,
        "sync": false
      }
    },
    "size": {
      "value": 4.008530152163807,
      "random": true,
      "anim": {
        "enable": false,
        "speed": 40,
        "size_min": 0.1,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false,
      "distance": 150,
      "color": "#ffffff",
      "opacity": 0.4,
      "width": 1
    },
    "move": {
      "enable": true,
      "speed": 2.2,
      "direction": "none",
      "random": true,
      "straight": false,
      "out_mode": "out",
      "bounce": false,
      "attract": {
        "enable": false,
        "rotateX": 600,
        "rotateY": 1200
      }
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false,
        "mode": "repulse"
      },
      "onclick": {
        "enable": true,
        "mode": "push"
      },
      "resize": true
    },
    "modes": {
      "grab": {
        "distance": 400,
        "line_linked": {
          "opacity": 1
        }
      },
      "bubble": {
        "distance": 400,
        "size": 40,
        "duration": 2,
        "opacity": 8,
        "speed": 3
      },
      "repulse": {
        "distance": 200,
        "duration": 0.4
      },
      "push": {
        "particles_nb": 4
      },
      "remove": {
        "particles_nb": 2
      }
    }
  },
  "retina_detect": true
}
);
		$('.contact-popup').magnificPopup({
        type: 'inline',
        mainClass: 'contact-popup',
    });
    $('.popup-login').magnificPopup({
		    type: 'inline',
		    mainClass: 'contact-popup',
		});
		$('.front-slider-carousel').owlCarousel({
	    	items:1,
	   		nav:false,
	    	dots:false,
	    	
	    	margin:0,
	    });
	    $('.product-slider-carousel').owlCarousel({
	    	items:2,
	   		nav:true,
	    	dots:false,
	    	video:true,
	    	margin:0,
        
        autoWidth:true,
        navText:['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
    

	    });
	    var owlProducts = $('.category-products');
	    owlProducts.owlCarousel({
	    	items:3,
	   		nav:true,
	    	dots:false,
	    	autoWidth:true,
	    	margin:0,
	    	navText:['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
	    });

	    $('.news-block').owlCarousel({
        items:2,
        nav:true,
        dots:false,
        margin:0,
        navText:['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
      
      });
      $('.categories-main').owlCarousel({
	    	items:5,
	   		nav:true,
	    	dots:false,
	    	margin:20,
	    	navText:['<i class="fas fa-angle-left"></i>','<i class="fas fa-angle-right"></i>'],
	    
	    });
	    if (Drupal.settings.time_end != undefined) {
	    	var time_start = Drupal.settings.time_end;
	    	$('#timer-end').countdown(time_start).on('update.countdown', function(event) {
			  var $this = $(this).html(event.strftime(''
			    + '<span>%H</span>:'
			    + '<span>%M</span>:'
			    + '<span>%S</span>'));
			});
	    	
	    }
	    if (Drupal.settings.wallet_qr != undefined) {
	    	new QRCode(document.getElementById("qrcode"), Drupal.settings.wallet_qr);
		}
	});		
})(jQuery);