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
require_once("modules/AOW_WorkFlow/aow_utils.php");
require_once('VIFieldsColorFunctions.php');
class VIFieldsColorModuleFieldType{
    public function __construct(){
        $this->getModuleFieldType();
    }
    
    //Get Module Field Type
    public function getModuleFieldType(){
        $relModule = $_REQUEST['aow_module'];
        $module = $_REQUEST['aow_module'];
        $fieldName = $_REQUEST['aow_fieldname'];
        $aowField = $_REQUEST['aow_newfieldname'];
        $fileName = $_REQUEST['filename'];

        if (isset($_REQUEST['view'])) {
            $view = $_REQUEST['view'];
        } else {
            $view= 'EditView';
        }//end of else

        if (isset($_REQUEST['aow_value'])) {
            $value = $_REQUEST['aow_value'];
        } else {
            $value = '';
        }//end of else

        switch($_REQUEST['aow_type']) {
            case 'Date':
                echo getFieldsColorModuleDateField($module, $aowField, "EditView", $value, false, $fieldName);
                break;
            case 'Value':
            default:
                if($view == 'vi_fieldscoloreditview'){
                    $oldName = "cache/modules/AOW_WorkFlow/".$relModule."EditView".$fieldName.".tpl";
                    if(file_exists($oldName)){
                        $newName = "cache/modules/AOW_WorkFlow/".$relModule."EditView".$fieldName.$fileName.".tpl";
                        rename($oldName, $newName);
                    }//end of if
                    echo getFieldsColorModuleFieldHtml($relModule, $fieldName, $aowField, 'EditView', $value);
                    break;
                }//end of if
        }//end of switch
        die;
    }//end of functions
}//end of class
new VIFieldsColorModuleFieldType();
?>