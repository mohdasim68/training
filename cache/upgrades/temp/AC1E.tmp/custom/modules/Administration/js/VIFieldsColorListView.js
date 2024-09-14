/*********************************************************************************
 * This file is part of package Fields Color.
 * 
 * Author : Variance InfoTech PVT LTD (http://www.varianceinfotech.com)
 * All rights (c) 2021 by Variance InfoTech PVT LTD
 *
 * This Version of Fields Color is licensed software and may only be used in 
 * alignment with the License Agreement received with this Software.
 * This Software is copyrighted and may not be further distributed without
 * written consent of Variance InfoTech PVT LTD
 * 
 * You can contact via email at info@varianceinfotech.com
 * 
 ********************************************************************************/
//Select All Checkbox
$('#selectAll').click(function(e) {
	$('#actionMenu').css('display', 'none');

	if(this.checked) {
		$('.bulkAction').css('display', 'none');
        $('#actionLinkTop').css('display', 'block');

		$('.listviewCheckbox').each(function() {
		  this.checked = true;                        
		});
	} else {
		$('.bulkAction').css('display', 'inline-block');
        $('#actionLinkTop').css('display', 'none');

		$('.listviewCheckbox').each(function() {
		  this.checked = false;                       
		});
	}//end of else
});

//Select Checkbox
$('.listviewCheckbox').on('click', function(){
    if($(".listviewCheckbox").length == $(".listviewCheckbox:checked").length) {
        $("#selectAll").prop("checked", true);
    }else{
        $("#selectAll").prop("checked", false);
    }//end of else

    $('#actionMenu').css('display', 'none');

    if($(".listviewCheckbox:checked").length > 0){
        $('.bulkAction').css('display', 'none');
        $('#actionLinkTop').css('display', 'block');
    }else{
        $('.bulkAction').css('display', 'inline-block');
        $('#actionLinkTop').css('display', 'none');
    }//end of else
});//end of function

//Open Bulk Action Dropdown
$('.actionButton').on('click', function(){
    if($('#actionMenu').css('display') == "none"){
        $('#actionMenu').css('display', 'inline-block');        
        $('#actionMenu').css('margin-top', '15px');
    }else{
        $('#actionMenu').css('display', 'none');  
    }//end of else
});//end of function

//Update Fields Color Status Using Slider
$(document).on('click', '#statusAction', function() {
	if($(this).is(':checked')){
		$(this).val('1');
	}else{
		$(this).val('0');
		$(this).removeAttr('checked');
	}//end of else
	var status = $(this).val();
	var fieldsColorId = $(this).closest('tr').attr('data-id');
	updateFieldsColorActionStatus(status, fieldsColorId, 'sliderClick');
});

//Update Fields Color Status
function updateFieldsColorActionStatus(checkValue, fieldsColorId, eventName){
    SUGAR.ajaxUI.showLoadingPanel();
    var ids = [];
    $(".listviewCheckbox:checked").each(function() {
        ids.push($(this).val());
    });//end of each
   
    var selectedValues = '';
    if(fieldsColorId == ''){
    	selectedValues = ids.join(",");
    }else{
    	selectedValues = fieldsColorId;
    }//end of else
    
    $.ajax({
        url: "index.php?entryPoint=VIAddFieldsColorData",
        type: "POST",
        data: {status : checkValue,
                recordId : selectedValues},
        success: function (response) {
        	SUGAR.ajaxUI.hideLoadingPanel();
        	if(eventName == 'sliderClick'){
        		if(checkValue == 0){
        			alert(SUGAR.language.get('Administration', 'LBL_FIELDS_COLOR_DEACTIVATED'));
        		}else{
        			alert(SUGAR.language.get('Administration', 'LBL_FIELDS_COLOR_ACTIVATED'));
        		}//end of else
        	}//end of if
        	window.location.href = listViewUrl;
        }//end of success
    });//end of ajax
}//end of function

//Delete Fields Color Configuration Records
function deleteFieldsColorData(){
	var id = [];
	$(".listviewCheckbox:checked").each(function() {
		id.push($(this).val());
	});

	var confirmMsg = SUGAR.language.get('Administration', 'LBL_DELETE_CONFIRM_MESSAGE')+" "+(id.length>1?SUGAR.language.get('Administration', 'LBL_THESE'):SUGAR.language.get('Administration', 'LBL_THIS'))+" "+id.length+" "+SUGAR.language.get('Administration', 'LBL_ROW');
	if(confirm(confirmMsg)){
		var selectedIds = id.join(",");
		$.ajax({
			url: "index.php?entryPoint=VIDeleteFieldsColorData",
			type: "POST",
			data: {deleteId : selectedIds},
			success: function(response) {
				window.location.href = listViewUrl;
			}//end of success
		});//end of ajax
	}//end of if
}//end of function

//Redirect to Admin Page
function backToAdminPage(){
	window.location.href = administrationPageUrl;
}//end of function