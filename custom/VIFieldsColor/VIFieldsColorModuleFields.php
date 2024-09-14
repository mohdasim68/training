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
class VIFieldsColorModuleFields{
    public function __construct(){
        $this->getModuleFields();
    }

    //Get Module Fields
    public function getModuleFields(){
        $module = $_REQUEST['moduleName']; //module
        $stepName = $_REQUEST['stepName'];
        
        if($module != ''){
            $editDetailViewFields = getFieldsColorModuleFields($module, $stepName);
            echo $editDetailViewFields;
        }else{
            $editDetailViewFields = array();
            echo json_encode($editDetailViewFields);
        }//end of else
    }//end of function  
}//end of class
new VIFieldsColorModuleFields();
?>