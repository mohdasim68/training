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
class VIFieldsColorModuleFieldLabel{
	public function __construct(){
		$this->getFieldName();
	}

	public function getFieldName(){
        $moduleName = $_REQUEST['module'];

        $fieldLabel = array();
        $bean = BeanFactory::newBean($moduleName);
        $fieldList = $bean->getFieldDefinitions();

        foreach ($fieldList as $key => $value) {
            $fieldLabel[] = $key;
        }//end of foreach
        $fieldLabelArray = array('fieldLabel' => $fieldLabel);
        echo json_encode($fieldLabelArray);
    }//end of function
}//end of class
new VIFieldsColorModuleFieldLabel();
?>