$(document).ready(function () {

		$(".subir_top").click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});

		$(".bt_nacional").click(function () {
			$('body,html').animate({
				scrollTop: 450
			}, 800);
			return false;
		});

		$(".bt_internacional").click(function () {
			$('body,html').animate({
				scrollTop: 740
			}, 800);
			return false;
		});

		$(".bt_deportes").click(function () {
			$('body,html').animate({
				scrollTop: 1030
			}, 800);
			return false;
		});

		$(".bt_farandula").click(function () {
			$('body,html').animate({
				scrollTop: 1295
			}, 800);
			return false;
		});
		
		// SLIDER 
		SyntaxHighlighter.all();

		$('.flexslider').flexslider({
		animation: "slide",
		controlNav: false,

		start: function(slider){
		  // $('body').removeClass('loading');
		}

		});

});