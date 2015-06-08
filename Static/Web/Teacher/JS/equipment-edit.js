var _isSaving 		= false; // 标志是否正在保存中
var _isAjax 		= true; // 标志通过ajax访问
var _buttonMsg		= null; //语言包对象
var _id				= null // 主键
var Edit = function() {
	
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
        	var name 			= $("#name-input").val();
        	var sumCount 		= $("#sum-count-input").val();
        	_id					= $("#id-input").val();
        	setTimeout(function() {
        		$.post("/Teacher/Equipment/update/", {
            		isAjax : _isAjax,
            		name : name,
            		sum_count : sumCount,
            		id : _id,
            	}, function(result) {
            		result = $.parseJSON(result);
            		switch(result.errCode) {
            		case 0:
            			alertMsg(_buttonMsg.suc_content, _buttonMsg.suc_title, 'success');
            			break;
            		case -1:
            			alertMsg(_buttonMsg.fai_content, _buttonMsg.fai_title, 'error');
            			break;
            		default:
            			alertMsg(_buttonMsg.net_err_content, _buttonMsg.fai_title,'warning');
            			break;
            		}
            	}); 
            	l.stop();
            	_isSaving = false;
			}, 500);
        });
        
	};
	
	var runInput = function() {
		$("input[name='sum-count']").TouchSpin({
			postfix_extraclass: "btn btn-default",
			max:4294967295,
		});
	};
	
	var alertMsg = function(con, title, type) {
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
    	var toast = toastr[type](con, title);                

	}

	
	return {
		init : function(buttonMsg) {
			_buttonMsg = buttonMsg;
			runButton();
			runInput();
		},
	};
}();