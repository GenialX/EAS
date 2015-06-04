var _idsArr = []; // 选中的id号
var _module_path = ''; //module的路径

var Manage = function() {
	
	/**
	 * 提交表单.
	 */
	var runFormCheckbox = function() {
		// 全选
		$('input[type="checkbox"].selectall').on('ifChecked', function(event) {
			$(this).closest("table").find(".foocheck").each(function() {
				_idsArr.push($(this).attr("id-val"));
			});
		// 取消全选
		}).on('ifUnchecked', function(event) {
			_idsArr = [];
		});
		
		$("input[type='checkbox'].foocheck").on('ifChecked', function() {
			if($.inArray($(this).attr("id-val"), _idsArr) == -1) {
				_idsArr.push($(this).attr("id-val"));
			}
		}).on('ifUnchecked', function() {
			_idsArr.splice($.inArray($(this).attr("id-val"), _idsArr), 1);
		});
		
	};
	
	/**
	 * 批量删除.
	 */
	var runBatchDeleteBtn = function() {
		var btn = $("#batch-delete-btn");
		btn.on("click", function() {
			var ids = _idsArr.join(",");
			window.location.href = "/Teacher/Equipment/delete/ids/" + ids + "/";
		});
	};
	
	return {
		init: function(module_path) {
			_module_path = module_path;
			runFormCheckbox();
			runBatchDeleteBtn();
		}
	};
	
}();