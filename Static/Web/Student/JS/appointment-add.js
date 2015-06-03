var _teacher_id = 0; // 教师的ID
var _isSaving = false; // 标志是否正在保存中
var _a_time = ''; // 预约时间
var Add = function() {
	
	/**
	 * 时间选择器插件.
	 */
	var runDateTimePicker = function() {
		/** 选择预约时间 **/
	    $('.form_datetime').datetimepicker({
	        language:  'zh-CN',
	        todayBtn:  1,
	        autoclose: 1,
	        todayHighlight: 1,
	        startView: 2,
	        forceParse: 1,
	        initialDate: new Date(),
	    });
	};
	
	/**
	 * 下拉选择框.
	 */
	var runSelect2 = function() {
		/** 选择教师 **/
		$(".search-select").select2({
			placeholder: "",
			allowClear: false
		});
		
		$("#teacher-select").on("change", function(e) { 
			_teacher_id = e.val;
		});
	    
	};
	
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
        	var $toast = toastr[success]("Gnome & Growl type non-blocking notifications", "Toastr Notifications");    
            $toastlast = $toast;
            if ($toast.find('#okBtn').length) {
                $toast.delegate('#okBtn', 'click', function () {
                    alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                    $toast.remove();
                });
            }
            if ($toast.find('#surpriseBtn').length) {
                $toast.delegate('#surpriseBtn', 'click', function () {
                    alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                });
            }
        	l.stop();
        	_isSaving = false;
        });
	};
	
	return {
		init : function() {
			runDateTimePicker();
			runSelect2();
			runButton();
		},
	};
	
}();