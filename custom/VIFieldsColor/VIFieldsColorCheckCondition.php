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
class VIFieldsColorCheckCondition{
    public function __construct(){
        $this->fieldsColorCheckCondition();
    }

    //Check Fields Color Condition
    public function fieldsColorCheckCondition(){
        $moduleName = $_POST['moduleName']; //module
        $actionName = $_REQUEST['actionName'];
        $recordId = isset($_POST['recordId'])?$_POST['recordId']:'';
        $fieldName = isset($_POST['fieldName'])?$_POST['fieldName']:'';
        
        if(isset($_REQUEST['formData'])){
            parse_str($_REQUEST['formData'], $formData);
        }else{
            $formData = array();
        }//end of else

        $fieldsColorData = getFieldsColorModuleData($moduleName);
        
        $fieldsColorConfigSuccessData = $fieldsColorConfigData = array();
        foreach ($fieldsColorData as $fieldsColorId => $fieldsColorDataValue) {
            $conditionMatchedRecord = matchFieldsColorCondition($moduleName, $fieldsColorDataValue, $recordId, $formData, $fieldName);
            $fieldsToColor = $fieldsColorDataValue['fieldsToColor'];
            $moduleBean = BeanFactory::newBean($moduleName);

            $editDetailViewFields = json_decode(getFieldsColorModuleFields($moduleName, $stepName="stepOne"));
            
            $fieldsDataArray = $removeFieldsArray = array();
            foreach ($editDetailViewFields as $key => $value) {
                $fieldData = $moduleBean->field_defs[$key];
                if(in_array($key, $fieldsToColor)){
                    $fieldsDataArray[] = array('fieldName' => $key, 
                                        'textColor' => $fieldsColorDataValue['textColor'],
                                        'backgroundColor' => $fieldsColorDataValue['backgroundColor'],
                                        'relatedRecordColor' => $fieldsColorDataValue['relatedRecordColor'],
                                        'colorLabel' => $fieldsColorDataValue['colorLabel'],
                                        'type' => $fieldData['type']);
                }else{
                    $removeFieldsArray[] = array('fieldName' => $key, 
                                        'textColor' => $fieldsColorDataValue['textColor'],
                                        'backgroundColor' => $fieldsColorDataValue['backgroundColor'],
                                        'relatedRecordColor' => $fieldsColorDataValue['relatedRecordColor'],
                                        'colorLabel' => $fieldsColorDataValue['colorLabel'],
                                        'type' => $fieldData['type']);
                }//end of else
            }//end of foreach

            if($conditionMatchedRecord == 1){
                $fieldsColorConfigSuccessData[$fieldsColorId] = array('success' => 'true', 'fieldsTypeArray' => $fieldsDataArray, 'removeFieldsArray' => $removeFieldsArray); 
            }else{
                $fieldsColorConfigData[$fieldsColorId] = array('success' => 'false', 'fieldsTypeArray' => $fieldsDataArray); 
            }//end of else
        }//end of foreach

        $result = array_merge($fieldsColorConfigData, $fieldsColorConfigSuccessData);
        if(empty($result)){
            if(empty($fieldsColorConfigData)){
                $fieldsColorFinalData = $fieldsColorConfigSuccessData;
            }else{
                $fieldsColorFinalData = $fieldsColorConfigData;
            }//end of else
        }else{
            $fieldsColorFinalData = $result;
        }//end of else
        echo json_encode($fieldsColorFinalData);
    }//end of function  
}//end of class
new VIFieldsColorCheckCondition();
?>