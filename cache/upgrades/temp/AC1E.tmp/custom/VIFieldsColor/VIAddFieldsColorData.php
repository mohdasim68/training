<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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
require_once('VIFieldsColorFunctions.php');
class VIAddFieldsColorData{
    public function __construct(){
        $this->addFieldsColorData();
    } 

    //Add Fields Color Data
    public function addFieldsColorData() {
        if(isset($_REQUEST['formData'])){
            parse_str($_REQUEST['formData'], $formData); //form data
            $fieldsColorName = $formData['fieldsColorName'];
            $moduleName = $formData['moduleName'];
            $fieldsForColor = isset($formData['fieldsForColor'])?implode(',', $formData['fieldsForColor']):'';
            $textColor = isset($formData['textColor'])?$formData['textColor']:'';
            $backgroundColor = isset($formData['backgroundColor'])?$formData['backgroundColor']:'';
            $relateRecordColor = isset($formData['relateRecordColor'])?$formData['relateRecordColor']:'';
            $colorLabel = $formData['colorLabel'];
            $conditionalOperator = $formData['conditionalOperator'];
            $status = $_POST['status'];
            $recordId = $_POST['fieldsColorId'];

            $dateCreatedModified = date("Y-m-d H:i:s");
            $fieldsColorIds = create_guid();

            if($recordId == ''){
                $fieldsColorId = $fieldsColorIds;     
            }else{
                $fieldsColorId = $recordId;
            }//end of else

            //All Condition block field value
            $allConditionFieldName = isset($formData['aowAllConditionsField'])?$formData['aowAllConditionsField']:'';
            $allContionOperatorName = isset($formData['aowAllConditionsOperator'])?$formData['aowAllConditionsOperator']:'';
            $allConditionValueType = isset($formData['aowAllConditionsValueType'])?$formData['aowAllConditionsValueType']:'';
            $allConditionFieldValue = isset($formData['aowAllConditionsValue'])?$formData['aowAllConditionsValue']:'';

            //Any Condition block field value
            $anyConditionFieldName = isset($formData['aowAnyConditionsField'])?$formData['aowAnyConditionsField']:'';
            $anyConditionOperatorName = isset($formData['aowAnyConditionsOperator'])?$formData['aowAnyConditionsOperator']:'';
            $anyConditionValueType = isset($formData['aowAnyConditionsValueType'])?$formData['aowAnyConditionsValueType']:'';
            $anyConditionFieldValue = isset($formData['aowAnyConditionsValue'])?$formData['aowAnyConditionsValue']:'';

           $fieldsColorData = array('fields_color_id' => "'".$fieldsColorId."'",
                    'fields_color_name' => "'".$fieldsColorName."'",
                    'module_name' => "'".$moduleName."'",
                    'fields_color_field' => "'".$fieldsForColor."'",
                    'status' => "'".$status."'",
                    'text_color' => "'".$textColor."'",
                    'background_color' => "'".$backgroundColor."'",
                    'related_record_color' => "'".$relateRecordColor."'",
                    'color_label' => "'".$colorLabel."'",
                    'conditional_operator' => "'".$conditionalOperator."'",
                    'date_entered' => "'".$dateCreatedModified."'",
                    'date_modified' => "'".$dateCreatedModified."'");

            if($recordId == ''){
                //Insert Fields Color Data 
                $insDataResult = insertFieldsColorData('vi_fields_color', $fieldsColorData);
            }else{
                //Update Fields Color Data
                unset($fieldsColorData['fields_color_id']);
                unset($fieldsColorData['date_entered']);
                $whereCondition = array('fields_color_id' => "'".$fieldsColorId."'");
                $updateFieldsColorDataResult = updateFieldsColorData('vi_fields_color', $fieldsColorData, $whereCondition);

                //Delete Fields Color Conditions Data
                $deleteFieldsColorDataResult = deleteFieldsColorData('vi_fields_color_condition', $whereCondition);
            }//end of else

            //Update Fields Color All Condition Data
            if(isset($formData['aowAllConditionsDeleted']) && !empty($formData['aowAllConditionsDeleted'])){
                $delId = $formData['aowAllConditionsDeleted'];
            }else{
                $delId = '';
            }//end of else

            //All Condition module_path
            $allConditionId = array();
            if(isset($formData['aowAllConditionsModulePath']) && !empty($formData['aowAllConditionsModulePath'])){
                foreach($formData['aowAllConditionsModulePath'] as $keys => $values) {
                    foreach ($values as $key => $value) {
                        $id = create_guid();
                        $insConditionModuleData = array('id' => "'".$id."'",
                                                 'module_path' => "'".$value."'",
                                                 'fields_color_id' => "'".$fieldsColorId."'",
                                                 'condition_type' => "'All'",
                                                 'date_entered' => "'".$dateCreatedModified."'");
                        $insConditionModuleDataResult = insertFieldsColorData('vi_fields_color_condition', $insConditionModuleData);
                        $allConditionId[] = $id;  
                    }//end of if 
                }//end of foreach
            }//end of if

            $updateFieldsColorConditionsData = updateFieldsColorConditionsData($allConditionFieldName, $delId, $allConditionId, 'vi_fields_color_condition', $allContionOperatorName, $allConditionValueType, $allConditionFieldValue, $moduleName);

            //Update Fields Color Any Condition Data
            if(isset($formData['aowAnyConditionsDeleted']) && !empty($formData['aowAnyConditionsDeleted'])){
                $anyDelId = $formData['aowAnyConditionsDeleted'];
            }else{
                $anyDelId = '';
            }//end of else

            //Any Condition module_path
            $anyConditionId = array();
            if(isset($formData['aowAnyConditionsModulePath']) && !empty($formData['aowAnyConditionsModulePath'])){
                foreach($formData['aowAnyConditionsModulePath'] as $keys => $values) {
                    foreach ($values as $key => $value) {
                        $id = create_guid();
                        $insConditionModuleData = array('id' => "'".$id."'",
                                                 'module_path' => "'".$value."'",
                                                 'fields_color_id' => "'".$fieldsColorId."'",
                                                 'condition_type' => "'Any'",
                                                 'date_entered' => "'".$dateCreatedModified."'");
                        $insConditionModuleDataResult = insertFieldsColorData('vi_fields_color_condition', $insConditionModuleData);
                        $anyConditionId[] = $id;  
                    }//end of if 
                }//end of foreach
            }//end of if

            $updateFieldsColorConditionsData = updateFieldsColorConditionsData($anyConditionFieldName, $anyDelId, $anyConditionId, 'vi_fields_color_condition', $anyConditionOperatorName, $anyConditionValueType, $anyConditionFieldValue, $moduleName);
        }else{
            if(isset($_REQUEST['recordId'])){
                $records = explode(',', $_REQUEST['recordId']);
                foreach ($records as $key => $value) {
                    $updateStatus = array('status' => "'".$_REQUEST['status']."'");
                    $whereCondition = array('fields_color_id' => "'".$value."'");
                    updateFieldsColorData('vi_fields_color', $updateStatus, $whereCondition);
                }//end of foreach
            }//end of if
        }//end of else
    }//end of function
}//end of class
new VIAddFieldsColorData();
?>