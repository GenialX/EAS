var _cn = false;
var _root = null;
var loginMessages = {};
var getPasswordMessages = {};
var isRemember = $.cookie("isRemember");

var Login = function() {
	"use strict";
	
	var rememberMe = function() {
		if(isRemember == 'true') {
			$('#remember').iCheck('check');
			if($.cookie("ebes0csjd") != "null" && $.cookie("ebes0csjd") != "") 
			$("#ebes0csjd-input").val($.cookie("ebes0csjd"));
			if($.cookie("do98jf7hs") != "null" && $.cookie("do98jf7hs") != "") 
			$("#do98jf7hs-input").val($.cookie("do98jf7hs"));
		} else {
			$('#remember').iCheck('uncheck');
			$("#ebes0csjd-input").val("");
			$("#do98jf7hs-input").val("");
		}
		
		$('#remember').on('ifChecked ifUnchecked', function(event){
			var status = event.type.replace('if', '').toLowerCase();
			if(status == 'checked') {
				isRemember = true;
				$.cookie("isRemember",isRemember);
			}
			if(status == 'unchecked') {
				isRemember = false;
				$.cookie("ebes0csjd",null);
				$.cookie("do98jf7hs",null);
				$.cookie("isRemember",isRemember);
			}
		});
		
		$("#form-login").submit(function(){
			$.cookie("isRemember",isRemember);
			if(isRemember) {
				$.cookie("ebes0csjd",$("#ebes0csjd-input").val());
				$.cookie("do98jf7hs",$("#do98jf7hs-input").val());
			} else {
				$.cookie("ebes0csjd",null);
				$.cookie("do98jf7hs",null);
			}
		});
	};
	
	var initMessages = function() {
		if(_cn == true) {
			loginMessages = {
					ebes0csjd: {
					    required: "用户名不能为空", 
					    minlength: "用户名长度不能小于2个字符",
					},
					do98jf7hs: {
					    required: "密码不能为空",  
					    minlength: "密码长度不能小于6个字符",
					},
				};
			getPasswordMessages = {
					email: {
					    required: "邮件不能为空",  
					    email: "邮件格式不正确",
					},	
			};
		} else {
			loginMessages = {
					ebes0csjd: {
					    required: "Username is required.",  
					},
					do98jf7hs: {
					    required: "Password is required.",  
					},
				};
			getPasswordMessages = {
					email: {
					    required: "Email is required.",  
					},	
			};
		}
	};
	
	var runBoxToShow = function() {
		var el = $('.box-login');
		if (getParameterByName('box').length) {
			switch(getParameterByName('box')) {
				case "forgot" :
					el = $('.box-forgot');
					break;
				default :
					el = $('.box-login');
					break;
			}
		}
		el.show().addClass("animated flipInX").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
			$(this).removeClass("animated flipInX");
		});
	};
	var runLoginButtons = function() {
		$('.forgot').on('click', function() {
			$('.box-login').removeClass("animated flipInX").addClass("animated bounceOutRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).hide().removeClass("animated bounceOutRight");

			});
			$('.box-forgot').show().addClass("animated bounceInLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInLeft");

			});
		});
		$('.go-back').click(function() {
			var boxToShow;
			if ($('.box-register').is(":visible")) {
				boxToShow = $('.box-register');
			} else {
				boxToShow = $('.box-forgot');
			}
			boxToShow.addClass("animated bounceOutLeft").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				boxToShow.hide().removeClass("animated bounceOutLeft");

			});
			$('.box-login').show().addClass("animated bounceInRight").on('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
				$(this).show().removeClass("animated bounceInRight");

			});
		});
	};
	//function to return the querystring parameter with a given name.
	var getParameterByName = function(name) {
		name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
		var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"), results = regex.exec(location.search);
		return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
	};
	var runSetDefaultValidation = function() {
		$.validator.setDefaults({
			errorElement : "span", // contain the error msg in a small tag
			errorClass : 'help-block',
			errorPlacement : function(error, element) {// render error placement for each input type
				if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {// for chosen elements, need to insert the error after the chosen container
					error.insertAfter($(element).closest('.form-group').children('div').children().last());
				} else if (element.attr("name") == "card_expiry_mm" || element.attr("name") == "card_expiry_yyyy") {
					error.appendTo($(element).closest('.form-group').children('div'));
				} else {
					error.insertAfter(element);
					// for other inputs, just perform default behavior
				}
			},
			ignore : ':hidden',
			success : function(label, element) {
				label.addClass('help-block valid');
				// mark the current input as valid and display OK icon
				$(element).closest('.form-group').removeClass('has-error');
			},
			highlight : function(element) {
				$(element).closest('.help-block').removeClass('valid');
				// display OK icon
				$(element).closest('.form-group').addClass('has-error');
				// add the Bootstrap error class to the control group
			},
			unhighlight : function(element) {// revert the change done by hightlight
				$(element).closest('.form-group').removeClass('has-error');
				// set error class to the control group
			}
		});
	};
	var runLoginValidator = function() {
		var form = $('.form-login');
		var errorHandler = $('.errorHandler', form);
		form.validate({
			rules : {
				ebes0csjd : {
					minlength : 2,
					required : true,
				},
				do98jf7hs : {
					minlength : 6,
					required : true,
				}, 
			}, 
			messages: loginMessages,
			submitHandler : function(form) {
				errorHandler.hide();
				form.submit();
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler.show();
			}
		});
	};
	var runForgotValidator = function() {
		var form2 = $('.form-forgot');
		var errorHandler2 = $('.errorHandler', form2);
		var emailSentHandler = $(".email-sent", form2);
		var emailNotSentHandler = $(".email-not-sent", form2);
		form2.validate({
			rules : {
				email : {
					required : true
				}
			},
			messages: getPasswordMessages,
			submitHandler : function(form) {
				errorHandler2.hide();
				var button = $("button", form2)[0];
				$(button).addClass("disabled");
				var email = $(".form-forgot input[name='email']").val();
				var data = {"email": email};  
				$.post(_root + "/Login/forgotPassword", data, function(res) {
					var _res = $.parseJSON(res);
					if(_res.errCode == 0) {
						$(button).removeClass("disabled");
						emailSentHandler.show();
					} else {
						$(button).removeClass("disabled");
						emailNotSentHandler.show();
					}
					
				});
			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				errorHandler2.show();
			}
		});
	};
	return {
		//main function to initiate template pages
		init : function(cn,root) {
			_cn = cn;
			_root = root;
			initMessages();
			rememberMe();
			runBoxToShow();
			runLoginButtons();
			runSetDefaultValidation();
			runLoginValidator();
			runForgotValidator();
		}
	};
}();

