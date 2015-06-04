var _isSaving = false; // 标志是否正在保存中
var Add = function() {
	
	/**
	 * 按钮事件.
	 */
	var runButton = function() {
		/** 保存按钮 **/
        $("button.save-button").on("click", function() {
        	if(_isSaving == true) return;
        	_isSaving = true;
        	var l = Ladda.create(this);
        	l.start();
        	toastr.options = {
        			  "closeButton": true,
        			  "positionClass": "toast-top-right",
        			  "onclick": null,
        			  "showDuration": "1000",
        			  "hideDuration": "1000",
        			  "timeOut": "5000",
        			  "extendedTimeOut": "1000",  
        			  "showEasing": "swing",
        			  "hideEasing": "linear",
        			  "showMethod": "fadeIn",
        			  "hideMethod": "fadeOut"
        			};
        	var $toast = toastr['info']("Gnome & Growl type non-blocking notifications", "Toastr Notifications");                
        	// ajax...
        	l.stop();
        	_isSaving = false;
        });
        
	};
	
	var runInput = function() {
		$("input[name='sum-count-input']").TouchSpin({
			postfix_extraclass: "btn btn-default",
			max:4294967295,
		});
	};

	
	return {
		init : function() {
			runButton();
			runInput();
		},
	};
}();