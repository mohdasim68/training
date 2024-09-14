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
require_once('include/MVC/View/SugarView.php');
require_once('custom/VIFieldsColor/VIFieldsColorFunctions.php');
class Viewvi_fieldscoloreditview extends SugarView {
    public function __construct() {
        parent::init();
    }
    
    public function display() {
    	global $mod_strings;
        $smarty = new Sugar_Smarty();

        //Get RecordId
        if(isset($_REQUEST['records']) && !empty($_REQUEST['records'])){
            $recordId = $_REQUEST['records'];
        }else{
            $recordId = '';
        }//end of else

        //Get Enable Primary Module List
        $enablePrimaryModuleList = getFieldsColorAllPrimaryModuleList();
        
        if($recordId != ''){
            $getFieldsNames = array("*");
            $whereCondition = array('fields_color_id' => array('operator' => '=', 'value' => "'".$recordId."'"), 'deleted' => array('operator' => '=', 'value' => 0));
            $getFieldsColor = getFieldsColorData('vi_fields_color', $getFieldsNames, $whereCondition, $orderBy=array());
            $fieldsColorDataRow = $GLOBALS['db']->fetchOne($getFieldsColor);

            $moduleName = $fieldsColorDataRow['module_name'];
            $selectedModuleFieldValue = explode(',', $fieldsColorDataRow['fields_color_field']);
            $moduleFields = getFieldsColorModuleFields($fieldsColorDataRow['module_name'], 'stepOne');
            $moduleAllFields = (array)json_decode($moduleFields);

            $fieldsColorData = array();
            $fieldsColorData = array('moduleName' => $moduleName,
                                'moduleLabel' => translate($moduleName),
                                'fieldsColorName' => $fieldsColorDataRow['fields_color_name'],
                                'selectedModuleFieldValue' => $selectedModuleFieldValue,
                                'status' => $fieldsColorDataRow['status'],
                                'textColor' => $fieldsColorDataRow['text_color'],
                                'backgroundColor' => $fieldsColorDataRow['background_color'],
                                'relatedRecordColor' => $fieldsColorDataRow['related_record_color'],
                                'colorLabel' => $fieldsColorDataRow['color_label'],
                                'conditionalOperator' => $fieldsColorDataRow['conditional_operator'],
                                );
           
           //All Condition Block Html
            $fieldsColorAllConditionData = getFieldsColorConditionBlockHtml($moduleName, $recordId, $conditionType='All', $getFieldsNames);
            //Any Condition Block Html
            $fieldsColorAnyConditionData = getFieldsColorConditionBlockHtml($moduleName, $recordId, $conditionType='Any', $getFieldsNames);

            $smarty->assign("SELECTED_MODULE_FIELDS", $moduleAllFields);
            $smarty->assign("FIELDS_COLOR_DATA", $fieldsColorData);
            $smarty->assign("FIELDS_COLOR_ALL_CONDITION_DATA", $fieldsColorAllConditionData); //Fields Color All Condition Data
            $smarty->assign("FIELDS_COLOR_ANY_CONDITION_DATA", $fieldsColorAnyConditionData); //Fields Color Any Condition Data
        }//end of if

        $listViewUrl = "index.php?module=Administration&action=vi_fieldscolorlistview";
        $infoURL = "themes/default/images/helpInline.gif?v=".rand()."";

        $smarty->assign("MOD", $mod_strings);
        $smarty->assign("RANDOM_NUMBER", rand());
        $smarty->assign("RECORD_ID", $recordId);
        $smarty->assign("LISTVIEW_URL", $listViewUrl);
        $smarty->assign("ENABLE_PRIMARY_MODULE_LIST", $enablePrimaryModuleList);
        $smarty->assign("INFO_URL", $infoURL);
        
        parent::display();
        $smarty->display('custom/modules/Administration/tpl/vi_fieldscoloreditview.tpl');
    }//end of display
}//end of class 
?>