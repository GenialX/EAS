var Lock = function() {
	
	var runLockForm = function() {
		$("#form-lock").submit(function(){
			if($("#do98jf7hs-input").val().length != 32) {
				// 密码没有经过加密
				var pwd = $.md5($("#do98jf7hs-input").val());
				$("#do98jf7hs-input").val(pwd);
			}
		});
	};
	
	return {
		init : function() {
			runLockForm();
		}
	};

}();