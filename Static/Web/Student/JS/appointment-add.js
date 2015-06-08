var _teacherID  = 0; // 教师的ID
var _isSaving	= false; // 标志是否正在保存中
var _aTime	 	= ''; // 预约时间
var _equipment  = null; // 实验器材 array(0 => array("id"=>28, "count"=>2), 1 => array()...)
/**
 * 新增一个器材[临时用,解决传值问题] object.
 * 
 * EG: 
 * o.name 	器材名称
 * o.id 	器材id
 * o.count 	器材数量
 * o.type 	1 新增; 2 删除; 3 编辑
 */
var _newEquipmentItem = null;  
var _appAddLang = null; // 语言包 object
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
			_teacherID = e.val;
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
        	var $toast = toastr['info']("Gnome & Growl type non-blocking notifications", "Toastr Notifications");                
        	// ajax...
        	l.stop();
        	_isSaving = false;
        });
	};
	

	var runEquipmentTable = function() {

		var oTable = $('#sample_1').dataTable({
			"aoColumnDefs" : [{
				"aTargets" : [0]
			}],
			"oLanguage" : {
				"sLengthMenu" : _appAddLang.SHOW + " _MENU_ " + _appAddLang.ROWS,
				"sSearch" : "",
				"oPaginate" : {
					"sPrevious" : "",
					"sNext" : ""
				}
			},
			"aaSorting" : [[1, 'asc']],
			"aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, _appAddLang.ALL] // change per page values here
			],
			// set the initial value
			"iDisplayLength" : 10,
		});
		$('#sample_1_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", _appAddLang.SEARCH);
		// modify table search input
		$('#sample_1_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		$('#sample_1_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		$('#sample_1_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});

	};
	

	var runSelectedEquipmentTable = function() {
		var newRow = false;
		var actualEditingRow = null;
		function restoreRow(oTable, nRow) {
			var aData = oTable.fnGetData(nRow);
			var jqTds = $('>td', nRow);

			for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
				oTable.fnUpdate(aData[i], nRow, i, false);
			}

			oTable.fnDraw();
		}

		function editRow(oTable, nRow) {
			var aData = oTable.fnGetData(nRow);
			var jqTds = $('>td', nRow);
			jqTds[0].innerHTML = '<input type="text" class="form-control" value="' + aData[0] + '">';
			jqTds[1].innerHTML = '<input type="text" class="form-control" value="' + aData[1] + '">';

			jqTds[2].innerHTML = '<a class="save-row" href="">Save</a>';
			jqTds[3].innerHTML = '<a class="cancel-row" href="">Cancel</a>';

		}

		function saveRow(oTable, nRow) {
			var jqInputs = $('input', nRow);
			oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
			oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
			oTable.fnUpdate('<a class="edit-row" href="">Edit</a>', nRow, 2, false);
			oTable.fnUpdate('<a class="delete-row" href="">Delete</a>', nRow, 3, false);
			oTable.fnDraw();
			newRow = false;
			actualEditingRow = null;
		}

		/**
		 * 新增一个器材.
		 * 
		 * 按钮被取消[html]，需要模拟触发事件。
		 * 
		 */
		$('body').on('click', '.add-row', function(e) {
			e.preventDefault();
			if (newRow == false) {
				if (actualEditingRow) {
					restoreRow(oTable, actualEditingRow);
				}
				newRow = true;
				var aiNew = oTable.fnAddData([_newEquipmentItem.name, _newEquipmentItem.count, '', '']);
				var nRow = oTable.fnGetNodes(aiNew[0]);
				editRow(oTable, nRow);
				actualEditingRow = nRow;
				$.blockUI({
					message : '<i class="fa fa-spinner fa-spin"></i> 请稍后...'
					});
				setTimeout(function(){
					$.unblockUI();
					saveRow(oTable, nRow);
				},500);
			}
		});
		
		$('#sample_2').on('click', '.cancel-row', function(e) {
			e.preventDefault();
			if (newRow) {
				newRow = false;
				actualEditingRow = null;
				var nRow = $(this).parents('tr')[0];
				oTable.fnDeleteRow(nRow);

			} else {
				restoreRow(oTable, actualEditingRow);
				actualEditingRow = null;
			}
		});
		
		/**
		 * 删除一个器材事件.
		 */
		$('#sample_2').on('click', '.delete-row', function(e) {
			e.preventDefault();
			if (newRow && actualEditingRow) {
				oTable.fnDeleteRow(actualEditingRow);
				newRow = false;

			}
			var nRow = $(this).parents('tr')[0];
			bootbox.confirm("确定删除么？", function(result) {
				if (result) {
					$.blockUI({
					message : '<i class="fa fa-spinner fa-spin"></i> 请稍后...'
					});
					setTimeout(function() {
						$.unblockUI();
						 oTable.fnDeleteRow(nRow);	
					}, 500);
				}
			});
			
		});
		
		/**
		 * 保存一个器材的事件.
		 */
		$('#sample_2').on('click', '.save-row', function(e) {
			e.preventDefault();
			
			var nRow = $(this).parents('tr')[0];
			$.blockUI({
					message : '<i class="fa fa-spinner fa-spin"></i> 请稍后...'
					});
					setTimeout(function() {
						$.unblockUI();
						saveRow(oTable, nRow);
					}, 500);
		});
		
		$('#sample_2').on('click', '.edit-row', function(e) {
			e.preventDefault();
			if (actualEditingRow) {
				if (newRow) {
					oTable.fnDeleteRow(actualEditingRow);
					newRow = false;
				} else {
					restoreRow(oTable, actualEditingRow);

				}
			}
			var nRow = $(this).parents('tr')[0];
			editRow(oTable, nRow);
			actualEditingRow = nRow;

		});
		var oTable = $('#sample_2').dataTable({
			"aoColumnDefs" : [{
				"aTargets" : [0]
			}],
			"oLanguage" : {
				"sLengthMenu" : _appAddLang.SHOW + " _MENU_ " + _appAddLang.ROWS,
				"sSearch" : "",
				"oPaginate" : {
					"sPrevious" : "",
					"sNext" : ""
				}
			},
			"aaSorting" : [[1, 'asc']],
			"aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, _appAddLang.ALL] // change per page values here
			],
			// set the initial value
			"iDisplayLength" : 10,
		});
		$('#sample_2_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", _appAddLang.SEARCH);
		// modify table search input
		$('#sample_2_wrapper .dataTables_length select').addClass("m-wrap small");
		// modify table per page dropdown
		$('#sample_2_wrapper .dataTables_length select').select2();
		// initialzie select2 dropdown
		$('#sample_2_column_toggler input[type="checkbox"]').change(function() {
			/* Get the DataTables object again - this is not a recreation, just a get of the object */
			var iCol = parseInt($(this).attr("data-column"));
			var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
			oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
		});
	};
	
	//function to initiate bootstrap extended modals
	var initModals = function() {
		$.fn.modalmanager.defaults.resize = true;
		$.fn.modal.defaults.spinner = $.fn.modalmanager.defaults.spinner = '<div class="loading-spinner" style="width: 200px; margin-left: -100px;">' + '<div class="progress progress-striped active">' + '<div class="progress-bar" style="width: 100%;"></div>' + '</div>' + '</div>';
		var $modal = $('#ajax-modal');
		$('.ajax .demo').on('click', function() {
			// create the backdrop and wait for next modal to be triggered
			$('body').modalmanager('loading');
			setTimeout(function() {
				$modal.load('modal_ajax_test.html', '', function() {
					$modal.modal();
				});
			}, 1000);
		});
		$modal.on('click', '.update', function() {
			$modal.modal('loading');
			setTimeout(function() {
				$modal.modal('loading').find('.modal-body').prepend('<div class="alert alert-info fade in">' + 'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' + '</div>');
			}, 1000);
		});
	};
	//function to initiate programmatic dialog boxes
	var initDialogBoxes = function() {
		var demos = {};

		$(document).on("click", "button[data-bb]", function(e) {
			e.preventDefault();
			var type = $(this).data("bb");

			if ( typeof demos[type] === 'function') {
				demos[type](this);
			}
		});

		// let's namespace the demo methods; it makes them easier
		// to invoke
		
		/**
		 * 对话框事件.
		 * 
		 * @param o 触发事件的button[object]
		 */
		demos.prompt = function(o) {
			var o 		  = o;
			var leftCount = $("#left-count-" + $(o).attr("id-value")).html();
			var name      = $("#name-" + $(o).attr("id-value")).html();
			leftCount 	  = parseInt(leftCount);
			var id	      = $(o).attr("id-value");
			bootbox.prompt("请输入<strong>" + name + "</strong>的数量(不大于" + leftCount + ")", function(result) {
				result = parseInt(result);
				if( ! (result >= 0) ) {
					toastr.warning("添加失败");
				} else {
					if(leftCount - result < 0) {
						// 失败
						toastr.warning("添加失败");
					} else {
						$("#left-count-" + $(o).attr("id-value")).html(leftCount - result);
						
						/** 添加到“已选择的器材”列表 **/
						_newEquipmentItem = {id:id, name:name, count:result, type:1};
						$("body .add-row").click();
						
						/** 提示 **/
						toastr.success("添加成功");
					}
				}
			});
		};
	};
	
	return {
		init : function(appAddLang) {
			_appAddLang = appAddLang;
			runDateTimePicker();
			runSelect2();
			runButton();
			runEquipmentTable();
			runSelectedEquipmentTable();
			initModals();
			initDialogBoxes();
		},
	};
	
}();