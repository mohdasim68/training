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
class Viewvi_fieldscolorlistview extends SugarView {
    public function __construct() {
        parent::init();
    }
    
    public function display() {
    	global $mod_strings, $theme;
        $smarty = new Sugar_Smarty();

        //Get Fields Color Data
        $getFieldsNames = array("*");
        $whereCondition = array('deleted' => array('operator' => '=', 'value' => 0));
        $orderBy = array('date_modified' => 'DESC');
        $getFieldsColorQuery = getFieldsColorData('vi_fields_color', $getFieldsNames, $whereCondition, $orderBy);
        $getFieldsColorResult = $GLOBALS['db']->query($getFieldsColorQuery);

        $fieldsColorData = array();
        while($getFieldsColorDataRow = $GLOBALS['db']->fetchByAssoc($getFieldsColorResult)){

            $explodeFields = explode(',', $getFieldsColorDataRow['fields_color_field']);
            $moduleBean = BeanFactory::newBean($getFieldsColorDataRow['module_name']);

            $fieldsHtml = '';
            if(isset($explodeFields) && !empty($explodeFields)){
                foreach ($explodeFields as $key => $fieldValue) {
                    if($fieldValue != ''){
                        $fields = $moduleBean->field_defs[$fieldValue];
                        $fieldLabel = translate($fields['vname'], $getFieldsColorDataRow['module_name']);
                        $fieldLabel = str_replace(":", "", $fieldLabel);
                        $fieldsHtml .= $fieldLabel.'<br>';
                    }//end of if
                }//end of foreach
            }//end of if

            $fieldsColorData[] =  array(
                                        'fieldsColorId' => $getFieldsColorDataRow['fields_color_id'],
                                        'fieldsColorName' => $getFieldsColorDataRow['fields_color_name'],
                                        'moduleLabel' => translate($getFieldsColorDataRow['module_name']),
                                        'moduleName' => $getFieldsColorDataRow['module_name'],
                                        'fieldsHtml' => $fieldsHtml,
                                        'status'=> $getFieldsColorDataRow['status'],
                                        'dateEntered' => $getFieldsColorDataRow['date_entered'],
                                        'dateModified' => $getFieldsColorDataRow['date_modified']
                                    );
        }//end of while

        $url = "https://suitehelp.varianceinfotech.com";
        $helpBoxContent = getFieldColorHelpBoxHtml($url);

        $administrationPageUrl = "index.php?module=Administration&action=index";
        $listViewUrl = "index.php?module=Administration&action=vi_fieldscolorlistview";
        $editViewUrl = "index.php?module=Administration&action=vi_fieldscoloreditview";
        $updateLicenseUrl = "index.php?module=VIFieldsColorLicenseAddon&action=license";

        $smarty->assign("MOD", $mod_strings);
        $smarty->assign("THEME", $theme);
        $smarty->assign("LISTVIEW_URL", $listViewUrl);
        $smarty->assign("EDITVIEW_URL", $editViewUrl);
        $smarty->assign("ADMINISTRATION_PAGE_URL", $administrationPageUrl);
        $smarty->assign('UPDATE_LICENSE_URL', $updateLicenseUrl);
        $smarty->assign("FIELDS_COLOR_DATA", $fieldsColorData);
        $smarty->assign('HELP_BOX_CONTENT', $helpBoxContent);

        parent::display();
        $smarty->display('custom/modules/Administration/tpl/vi_fieldscolorlistview.tpl');
    }//end of display
}//end of class 
?>