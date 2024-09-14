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
class VIDeleteFieldsColorData{
	public function __construct(){
		$this->deleteFieldsColorData();
	} 
    
    //Delete Fields Color Data
	public function deleteFieldsColorData() {
        $deleteId = isset($_POST['deleteId'])?explode(',', $_POST['deleteId']):array();
        
        $deleteFieldsColorData = array('deleted' => 1);
        if(!empty($deleteId)){
            foreach($deleteId as $id){
                //Set deleted=1 for Fields Color Config Data
                $whereCondition = array('fields_color_id' => "'".$id."'");
                updateFieldsColorData('vi_fields_color', $deleteFieldsColorData, $whereCondition);

                //Set deleted=1 for Fields Color Conditions Data
                updateFieldsColorData('vi_fields_color_condition', $deleteFieldsColorData, $whereCondition);
            }//end of foreach
        }//end of if
	}//end of function
}//end of class
new VIDeleteFieldsColorData();
?>