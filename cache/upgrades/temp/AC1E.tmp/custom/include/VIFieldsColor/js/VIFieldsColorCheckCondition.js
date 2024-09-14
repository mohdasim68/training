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
if(actionName == 'SubpanelCreates'){
    var formId = 'form_SubpanelQuickCreate_'+moduleName;
}else if(actionName == 'EditView'){
    var formId = 'EditView';
}//end of else if

$(document).ready(function(){
    function getParam(decodeUrl, name){
        name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
        var regexS = "[\\?&]"+name+"=([^&#]*)";
        var regex = new RegExp( regexS );
        var results = regex.exec(decodeUrl);
        if( results == null )
            return "";
        else
            return results[1];
    }//end of function

    if(actionName == 'EditView' || actionName == 'SubpanelCreates'){
        if(recordId != ''){
            var formData = $("#EditView").serialize();
            $.ajax({
                url: "index.php?entryPoint=VIFieldsColorCheckCondition",
                type: "post",
                data: {moduleName : moduleName,
                      formData : formData,
                      actionName : actionName,
                      recordId : recordId},
                dataType: "JSON",
                success: function(response) {
                    hasLooped = false;
                    $.each(response, function(index, fieldsColorData){
                        if(fieldsColorData['success'] == 'true'){
                            if(!hasLooped){
                                moduleEditViewFieldsColor(fieldsColorData['fieldsTypeArray'], 'Add');
                                hasLooped = true;
                            }//end of if
                        }//end of if
                    });//end of each
                }//end of success        
            });//end of ajax
        }//end of if
        $.ajax({
            url: "index.php?entryPoint=VIFieldsColorModuleFieldLabel",
            type: "POST",
            data: {module : moduleName},
            dataType : "JSON",
            success: function (response) {
                var fieldLabel = response['fieldLabel'];
                $.each(fieldLabel, function (index, fieldName) {
                    YAHOO.util.Event.onDOMReady(function(){
                        fieldType = $("#"+formId+" div[field='"+fieldName+"']").attr('type'); //field type
                
                        if(fieldName == 'direction'){
                            fieldType = 'enum';
                        }//end of if

                        if(fieldType == 'enum'){
                            val = "select[name="+fieldName+"]";
                        }else if(fieldType == 'multienum'){
                            val = "select[name='"+fieldName+"[]']";
                        }else if(fieldType == 'text'){
                            val = "textarea[name="+fieldName+"]";
                        }else {
                            val = "input[name="+fieldName+"]";
                        }//end of else

                        YAHOO.util.Event.addListener(YAHOO.util.Selector.query(val), 'change', function(){
                            var formData = $("#"+formId).serialize(); //formdata
                            if($("#"+formId+" div[field='"+fieldName+"']").attr('type') == 'relate'){
                                fieldName = $("#"+formId+" div[field='"+fieldName+"']").after().find("input[type='hidden']").attr('name');  
                            }//end of if

                            $.ajax({
                                url: "index.php?entryPoint=VIFieldsColorCheckCondition",
                                type: "post",
                                data: {moduleName : moduleName,
                                      fieldName : fieldName,
                                      formData : formData,
                                      actionName : actionName,
                                      recordId : recordId},
                                async: false,
                                dataType: "JSON",
                                success: function(result) {
                                    hasLooped = false;
                                    $.each(result, function(index, fieldsColorData){
                                        if(fieldsColorData['success'] == 'true'){
                                            if(!hasLooped){
                                                moduleEditViewFieldsColor(fieldsColorData['fieldsTypeArray'], 'Add');
                                                moduleEditViewFieldsColor(fieldsColorData['removeFieldsArray'], 'remove');
                                                hasLooped = true;
                                            }//end of if
                                        }else if(fieldsColorData['success'] == 'false'){
                                            moduleEditViewFieldsColor(fieldsColorData['fieldsTypeArray'], 'remove');
                                        }//end of else if
                                    });//end of each
                                }//end of success        
                            });//end of ajax
                        });//end of function
                    });//end of function
                });//end of each
            }//end of success
        });//end of ajax
    }else{
        //Fields Color displayed on Record Detailview
        $.ajax({
            url: "index.php?entryPoint=VIFieldsColorCheckCondition",
            type: "POST",
            data: {moduleName : moduleName,
                    recordId : recordId,
                    actionName : actionName},
            async: false,
            dataType : "JSON",
            success: function(response) {
                hasLooped = false;
                $.each(response, function(index, fieldsColorData){
                    if(fieldsColorData['success'] == 'true'){
                        if(!hasLooped){
                            moduleDetailViewFieldsColor(fieldsColorData['fieldsTypeArray'], 'Add');
                            hasLooped = true;
                        }//end of if
                    }//end of if
                });//end of each
            }//end of success
        });//end of ajax
    }//end of else
});

//Add/Remove Fields Color from Module Detailview Fields
function moduleDetailViewFieldsColor(fieldsColorData, action){
    var elementId = '';
    $.each(fieldsColorData, function(field, value){
        var colorLabel = value['colorLabel'];
        var textColor = value['textColor'];
        var backgroundColor = value['backgroundColor'];
        var relatedRecordColor = value['relatedRecordColor'];
        var fieldName = value['fieldName'];
        var fieldType = value['type'];

        if(textColor == 'FFFFFF' || action == 'remove'){
            textColor = '';
        }else{
            textColor = '#'+textColor;
        }//end of else

        if(backgroundColor == 'FFFFFF' || action == 'remove'){
            backgroundColor = '';
        }else{
            backgroundColor = '#'+backgroundColor;
        }//end of else

        if(relatedRecordColor == 'FFFFFF' || action == 'remove'){
            relatedRecordColor = '';
        }else{
            relatedRecordColor = '#'+relatedRecordColor;
        }//end of else

        if((fieldName == 'first_name' || fieldName == 'last_name') && moduleName == 'Leads'){
            fieldName = 'full_name';
        }//end of if

        elementId = $("div[field='"+fieldName+"']");
        if(fieldType == 'url'){
            $(elementId).find('a').css('color', textColor);
        }else if(fieldType == 'phone'){
            $(elementId).find('a').css('color', textColor);
            $(elementId).css('color', textColor);
        }else if(fieldType == 'relate' || fieldType == 'parent'){
            $(elementId).find('a').css('color', relatedRecordColor);
            $(elementId).find('span').css('color', relatedRecordColor);
        }else{
            var find = "_address_";
            if(fieldName.indexOf(find) != -1){
                $('#'+fieldName).closest('div').css('color', textColor);
                $('#'+fieldName).closest('div').css('background-color', backgroundColor);
            }else{
                if(moduleName == 'Spots'){
                    $("#"+fieldName).css('color', textColor);
                    $("#"+fieldName).css('background-color', backgroundColor);
                }else{
                    $(elementId).css('color', textColor);
                }//end of else
            }//end of else
        }//end of else
        $(elementId).css('background-color', backgroundColor);

        if(colorLabel == 'yes'){
            var find = "_address_";
            if(fieldName.indexOf(find) != -1){
                if(fieldName.startsWith('billing_')){
                    fieldName = 'billing_address_street';
                }else if(fieldName.startsWith('primary_')){
                    fieldName = 'primary_address_street';
                }else if(fieldName.startsWith('alt_')){
                    fieldName = 'alt_address_street';
                }else if(fieldName.startsWith('shipping_')){
                    fieldName = 'shipping_address_street';
                }//end of else if
                elementId = $("div[field='"+fieldName+"']");
            }//end of if
            $(elementId).closest('div').prev('div').css('color', textColor);
        }//end of if
    });//end of each
}//end of function

//Add/Remove Fields Color from Module Editview Fields
function moduleEditViewFieldsColor(fieldsColorData, action){
    var elementId = '';
    $.each(fieldsColorData, function(index, value){
        var textColor = value['textColor'];
        var backgroundColor = value['backgroundColor'];
        var relatedRecordColor = value['relatedRecordColor'];
        var colorLabel = value['colorLabel'];
        var fieldName = value['fieldName'];
        var fieldType = value['type'];
       
        if(textColor == 'FFFFFF' || action == 'remove'){
            textColor = '';
        }else{
            textColor = '#'+textColor;
        }//end of else

        if(backgroundColor == 'FFFFFF' || action == 'remove'){
            backgroundColor = '';
        }else{
            backgroundColor = '#'+backgroundColor;
        }//end of else

        if(relatedRecordColor == 'FFFFFF' || action == 'remove'){
            relatedRecordColor = '';
        }else{
            relatedRecordColor = '#'+relatedRecordColor;
        }//end of else

        if(fieldType == 'datetimecombo'){                
            $('#'+formId+' #'+fieldName+'_date').css('background-color',  backgroundColor);
            $('#'+formId+' #'+fieldName+'_hours').css('background-color',  backgroundColor);
            $('#'+formId+' #'+fieldName+'_minutes').css('background-color',  backgroundColor);

            $('#'+formId+' #'+fieldName+'_date').css('color', textColor);
            $('#'+formId+' #'+fieldName+'_hours').css('color', textColor);
            $('#'+formId+' #'+fieldName+'_minutes').css('color', textColor);
        }else if(fieldType == 'relate' || fieldType == 'parent'){
            elementId = $('#'+formId+' #'+fieldName);

            $(elementId).css('color', relatedRecordColor);
            $(elementId).css('background-color', backgroundColor);
        }else{
            if(fieldName == 'revision'){
                elementId = $('#'+formId+' input[name=revision]');
            }else if(fieldName == 'currency_id'){
                elementId = $('#'+formId+' #currency_id_select');
            }else{
                if(fieldName != ''){
                    var elementId = $('#'+formId+' #'+fieldName);
                }//end of if
            }//end of else
        }//end of else
        
        if(fieldType != 'relate' && fieldType != 'parent' && fieldType != 'datetimecombo'){
            $('body').find(elementId).css('background-color', backgroundColor);
            $('body').find(elementId).css('color', textColor);
        }//end of if

        if(colorLabel == 'yes'){
            addRemoveEditViewLableColor(fieldName, elementId, textColor, fieldType);
        }else{
            addRemoveEditViewLableColor(fieldName, elementId, '', fieldType);            
        }//end of else
    });//end of each
}//end of function

//Add/Remove EditView Label Color
function addRemoveEditViewLableColor(fieldName, elementId, textColor, fieldType){
    var find = "_address_";
    if(fieldName.indexOf(find) != -1){
        $(elementId).closest('td').prev('td').find('label').css('color', textColor);
    }else{
        if(fieldType == 'datetimecombo'){
            $('#'+formId+' #'+fieldName+'_date').closest('div').prev('div').css('color', textColor);
        }else{
            $(elementId).closest('div').prev('div').css('color', textColor);
        }//end of else
    }//end of else
}//end of function