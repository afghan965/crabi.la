	$(document).ready(function() {

		$('.contenedor_cajas_seccion_nota').slick({
		        dots: false,
		        infinite: true,
		        speed: 300,
		        arrows: true,
		        slidesToShow: 7,
		        slidesToScroll: 1,
		        
		        responsive: [{
		            breakpoint: 1024,
		            settings: {
		                slidesToShow: 7,
		                slidesToScroll: 1,
		                infinite: true,
		                dots: true
		            }
		        }, {
		            breakpoint: 641,
		            settings: {
				        dots: false,
				        infinite: true,
				        speed: 300,
				        arrows: true,
		                slidesToShow: 5,
		                slidesToScroll: 1
		            }
		        }, {
		            breakpoint: 480,
		            settings: {
				        dots: false,
				        infinite: true,
				        speed: 300,
				        arrows: true,
		                slidesToShow: 4,
		                slidesToScroll: 1
		            }
		        }, {
		            breakpoint: 360,
		            settings: {
				        dots: false,
				        infinite: true,
				        speed: 300,
				        arrows: true,
		                slidesToShow: 3,
		                slidesToScroll: 1
		            }
		        }]
		    });

	});