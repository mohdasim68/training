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
var fieldsColorId;
$(document).ready(function (){
	//get fieldsColorId from url
 	var decodeUrl = decodeURIComponent(window.location.href);
	function getParam( name ){
		name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
		var regexS = "[\\?&]"+name+"=([^&#]*)";
		var regex = new RegExp( regexS );
		var results = regex.exec(decodeUrl);
		if( results == null )
		return "";
		else
		return results[1];
	}//end of function 
    fieldsColorId = getParam('records');

    $('#backButton, #btnSave').hide();
});

var conditionOperators = ['is_null', 'is_not_null', 'today', 'tomorrow', 'yesterday', 'is_in_last_7_days', 'is_in_last_30_days', 'is_in_last_60_days', 'is_in_last_90_days', 'is_in_last_120_days', 'is_in_this_week', 'is_in_the_last_week', 'is_in_this_month', 'is_in_the_last_month'];

//Set Status Value
$(document).on('click', '#status', function() {
	if($(this).is(':checked')){
		$(this).val('1');
		$('#status').next('span.slider').css('background-color', '#f08377');
		$('body').append('<style>.slider:before{position: absolute;content: "";height: 19px;width: 19px;left: 3px;bottom: 3px;background-color: white;-webkit-transition: .4s;transition: .4s;transform:translateX(22px);}</style>');
	}else{
		$(this).val('0');
		$('#status').next('span.slider').css('background-color', '#808f9c');
		$('body').append('<style>.slider:before{position: absolute;content: "";height: 19px;width: 19px;left: 3px;bottom: 3px;background-color: white;-webkit-transition: .4s;transition: .4s;transform:translateX(0px);}</style>');
	}//end of else
});

//Get Module Fields Based on Module 
$('#moduleName').on('change', function() {
	clearStepOneValues();
	var moduleName = $(this).val();
	var moduleLabel = $('#moduleName option:selected').text();
		
	$('body').find('table#allCondition > tbody > tr > th > h4 > span.selectedModuleName, table#anyCondition > tbody > tr > th > h4 > span.selectedModuleName').html(moduleLabel);
	$('#conditionalOperator').val('AND');

	$.ajax({
		url: "index.php?entryPoint=VIFieldsColorModuleFields",
	    type: 'POST',
	    dataType: 'JSON',
	   	data:{moduleName: moduleName,
	   			stepName: 'stepOne'},
	    success: function (response) {
	    	$('#fieldsForColor').empty();
	    	$.each(response, function(fieldValue, fieldName){
	    		$('#fieldsForColor').append('<option value="'+fieldValue+'">'+fieldName+'</option>');
	     	});//end of each
	    }//end of success 
	});//end of ajax
});

$(document).on('click', '#backButton', function() {
	var wizardCurrentStep = $('.navSteps.selected').attr('data-nav-step');
    if(wizardCurrentStep == 2){
        $('#step1').css('display', 'block');
        $('#step2').css('display', 'none');
        $('#navStep1').addClass('selected');
        $('#navStep2').removeClass('selected');
        $('#btnNext').show();
        $('#backButton, #btnSave').hide();
   	}//end of if
});

$(document).on('click', '#btnNext', function() {
	var wizardCurrentStep = $('.navSteps.selected').attr('data-nav-step');
    if(wizardCurrentStep == 1){
    	var fieldsColorName = $('#fieldsColorName').val();
        var moduleName = $('#moduleName').val();
        var moduleFields = $('#fieldsForColor').val();
        var moduleLabel = $('#moduleName option:selected').text();
			
		if(fieldsColorName == ''){
			alert(SUGAR.language.get('Administration', 'LBL_FIELDS_COLOR_NAME_EMPTY_ERROR'));
	        return false;
		}else if(moduleName == ''){
	        alert(SUGAR.language.get('Administration', 'LBL_SELECT_MODULE_EMPTY_ERROR'));
	        return false;
        }else if(moduleFields == null){
        	alert(SUGAR.language.get('Administration', 'LBL_SELECT_FIELDS_TO_COLOR_EMPTY_ERROR'));
        	return false;
        }else{
			$('#backButton, #btnSave').show();
			$('#step1').css('display', 'none');
            $('#step2').css('display', 'inline-table');
            $('#btnNext').hide();
            $('#navStep2').addClass('selected');
            $('#navStep1').removeClass('selected');

            if(fieldsColorId == ''){
		    	$('body').find('table#allCondition > tbody > tr > th > h4 > span.selectedModuleName, table#anyCondition > tbody > tr > th > h4 > span.selectedModuleName').html(moduleLabel);
		    }//end of if
        }//end of else
    }//end of else
});

//Save Fields Color Configuration Data
var saveClickCount = 0;
function saveFieldsColorConfigData(){
	var wizardCurrentStep = $('.navSteps.selected').attr('data-nav-step');

	//Condition Lines Validations
	if(wizardCurrentStep == 2){
		var allConditionTotalRowCount = $("#aowAllConditionLines > tbody > tr:visible").length;
		var anyConditionTotalRowCount = $("#aowAnyConditionLines > tbody > tr:visible").length;
		if(allConditionTotalRowCount == 0 && anyConditionTotalRowCount == 0){
			alert(SUGAR.language.get('Administration', 'LBL_FIELDS_COLOR_EMPTY_CONDITIONS_VALIDATION'));
			return false;
		}else{
			var checkAllConditionValue = checkAnyConditionValue = 0;
			checkAllConditionValue = checkFieldsColorConditionValidation('aowAllConditionLines', 'aowAllProductLine', 'aowAllConditionsField', 'aowAllConditionsFieldInput', 'aowAllConditionsValue');
			checkAnyConditionValue = checkFieldsColorConditionValidation('aowAnyConditionLines', 'aowAnyProductLine', 'aowAnyConditionsField', 'aowAnyConditionsFieldInput', 'aowAnyConditionsValue');
		}//end of else
    }//end of if

    if(checkAllConditionValue == 1 || checkAnyConditionValue == 1){
    	alert(SUGAR.language.get('Administration', 'LBL_REQUIRED_FIELD_VALIDATION'));
    	return false;
    }else{
    	var formData = $('form');
	    var disabled = formData.find(':disabled').removeAttr('disabled');
	    var formData = formData.serialize();
    	var status = $('#status').val();

    	if(saveClickCount == 0){
        	$.ajax({
			    url: 'index.php?entryPoint=VIAddFieldsColorData',
			    type: 'POST',
			   	data: {formData : formData,
			   		fieldsColorId : fieldsColorId,
			   		status: status}, 
			    success: function (response) {
			    	window.location.href = listViewUrl;
			    }//end of success
			});//end of ajax
			saveClickCount++;
		}//end of if
    }//end of else
}//end of function

//Check Condition Block Empty Validation
function checkFieldsColorConditionValidation(tableName, lineId, fieldId, fieldInputId, fieldValue){
	var rowCount = $("#"+tableName+" > tbody > tr").length;

	var checkConditionValue = 0;
	var conditionValue = '';

	for(var i=0; i<rowCount; i++){
		if($('#'+lineId+i).is(':visible')){

			var field = document.getElementById(fieldId+i).value;
			if(field != ''){
                if(tableName == 'aowAllConditionLines' || tableName == 'aowAnyConditionLines'){
                	if(tableName == 'aowAllConditionLines'){
                		var valueType = document.getElementById('aowAllConditionsValueType['+i+']').value;
                		var operator = document.getElementById('aowAllConditionsOperator['+i+']').value; //operator
                	}else if(tableName == 'aowAnyConditionLines'){
                		var valueType = document.getElementById('aowAnyConditionsValueType['+i+']').value;
                		var operator = document.getElementById('aowAnyConditionsOperator['+i+']').value; //operator
                	}//end of else

                	if(valueType == 'Date'){
                		param0 = document.getElementById(fieldValue+'['+i+'][0]').value;
	                    param1 = document.getElementById(fieldValue+'['+i+'][1]').value;
	                    param2 = document.getElementById(fieldValue+'['+i+'][2]').value;
	                    param3 = document.getElementById(fieldValue+'['+i+'][3]').value;
	                    if(param1 == 'now'){
	                        param2 = '0';
	                        param3 = '0';
	                    }//end of if

	                    if(param0 == '' || param1 == '' || param2 == '' || param3 == ''){
	                        conditionValue = '0';
	                    }else{
	                        conditionValue = '1';
	                    }//end of else
                	}else{
                		var checkDateTimeComboTDType = $('td #'+fieldInputId+i).closest('tr').find("td input.datetimecombo_date").length;
						if(field == 'currency_id'){
		                    conditionValue = document.getElementById(fieldValue+'['+i+']_select').value;
		                }else if(checkDateTimeComboTDType > 0){
		                    conditionValue = $('td #'+fieldInputId+i).closest('tr').find("td input.datetimecombo_date").val();
		                }else{
		                    conditionValue = document.getElementById(fieldValue+'['+i+']').value;    
		                }//end of else				                
                	}//end of else
                	
                	if(jQuery.inArray(operator, conditionOperators) != -1){
                		checkConditionValue = '0';
				    }else{
				    	if(conditionValue == ''){
	                        checkConditionValue = 1;
	                    }//end of if
				    }//end of else
	                
                }else{
                	if(conditionValue == ''){
                    	checkConditionValue = 1;
                	}//end of if
                }//end of else
            }else{
            	checkConditionValue = 1;
            }//end of else
		}//end of if		
	}//end of for

	return checkConditionValue;
}//end of function

//Clear All Field Value
function clearall(){
	var wizardCurrentStep = $('.navSteps.selected').attr('data-nav-step');
    if(wizardCurrentStep == 1){
    	$('#fieldsColorName, #moduleName').val('');
		$('#fieldsForColor').empty();
		clearStepOneValues();
	}else if(wizardCurrentStep == 2){
		$('#aowAllConditionLines, #aowAnyConditionLines').empty();
		$('#conditionalOperator').val('AND');
    }//end of else if
}//end of function

//Clear First Step Value
function clearStepOneValues(){
	$("#status").val('0');
	$('#status').removeAttr('checked');
	$('#status').next('span.slider').css('background-color', '#808f9c');
	$('body').append('<style>.slider:before{position: absolute;content: "";height: 19px;width: 19px;left: 3px;bottom: 3px;background-color: white;-webkit-transition: .4s;transition: .4s;transform:translateX(0px);}</style>');
	$('#textColor, #backgroundColor, #relateRecordColor').val('FFFFFF');
	$('#textColor, #backgroundColor, #relateRecordColor').css('color', '#000000');
	$('#textColor, #backgroundColor, #relateRecordColor').css('background', '#FFFFFF');
	$("#colorLabel").val('yes');
}//end of function

//Redirect to Listview Page of Configuration
function cancel(){
	window.location.href = listViewUrl;
}//end of function

//Display Fields to Color Info
function dispalyFieldsToColorInfo(obj) {
    return SUGAR.util.showHelpTips(obj, fieldsToColorMessage);    
}//end of function

//Display Color the Label Info
function dispalyColorTheLabelInfo(obj) {
    return SUGAR.util.showHelpTips(obj, colorTheLabelMessage);    
}//end of function