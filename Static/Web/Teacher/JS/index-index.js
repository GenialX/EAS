var _easAPI = ""; //官方接口

var Index = function() {"use strict";

	var runNews = function(){
		
		var url = _easAPI + "/notice.php";
		var ajaxContainer = $("#ajax-content");
		window.setTimeout(function() {
			ajaxLoader(url, ajaxContainer);
		}, 500);
	};
	
	// function to load content with ajax
	var ajaxLoader = function(url, element) {
		element.removeClass("fadeIn shake");
		var backdrop = $('.ajax-white-backdrop');

		$(".main-container").append('<div class="ajax-white-backdrop"></div>');
		backdrop.show();

		if($body.hasClass("sidebar-mobile-open")) {
			var configAnimation, extendOptions, globalOptions = {
				duration: 200,
				easing: "ease",
				mobileHA: true,
				progress: function() {
					activeAnimation = true;
				}
			};
			extendOptions = {
				complete: function() {
					inner.attr('style', '').removeClass("inner-transform");
					// remove inner-transform (hardware acceleration) for restore z-index
					$body.removeClass("sidebar-mobile-open");
					loadPage(url, element);
					activeAnimation = false;
				}
			};
			configAnimation = $.extend({}, extendOptions, globalOptions);

			inner.velocity({
				translateZ: 0,
				translateX: [-sidebarWidth, 0]
			}, configAnimation);
		} else {
			loadPage(url, element);
		}
	
		function loadPage(url, element) {
			$.ajax({
				type: "GET",
				cache: false,
				url: url,
				dataType: "html",
				success: function(data) {
					backdrop.remove();
					element.html(data).addClass("fadeIn");
				},
				error: function(xhr, ajaxOptions, thrownError) {
					backdrop.remove();
					element.html('<h4>Could not load the requested content.</h4>').addClass("shake");
				}
			});
		};
	};
	
	return {
		init: function(easAPI) {
			_easAPI = easAPI;
			runNews();
		}
	};
}();
