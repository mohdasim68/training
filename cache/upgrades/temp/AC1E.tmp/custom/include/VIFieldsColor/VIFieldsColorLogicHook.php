<?php
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
require_once('custom/VIFieldsColor/VIFieldsColorFunctions.php');
class VIFieldsColorLogicHook{
	function fieldsColorLogicHook($event, $arguments){

		if(($GLOBALS['app']->controller->action == 'DetailView' || $GLOBALS['app']->controller->action == 'view_GanttChart' || $_REQUEST['action'] == 'DetailView' || $GLOBALS['app']->controller->action == 'EditView' || $_REQUEST['action'] == 'EditView' || $_REQUEST['action'] == 'SubpanelCreates') && $_REQUEST['module'] != 'ModuleBuilder'){
			
			$actionName = $_REQUEST['action'];
			//Module Name
            if($_REQUEST['action'] == 'SubpanelCreates'){
                $moduleName = json_encode($_REQUEST['target_module']);
            }else{
                $moduleName = json_encode($_REQUEST['module']);
            }//end of else

            //Record Id
            if(isset($_REQUEST['record']) && !empty($_REQUEST['record'])){
                $recordId = json_encode($_REQUEST['record']);
            }else{
                $recordId = json_encode('');
            }//end of else

			echo '<script type="text/javascript">            	
        		var actionName = '.json_encode($actionName).';
        		var moduleName = '.$moduleName.';
        		var recordId = '.$recordId.';
        		
        		var script = document.createElement("script");
				script.type = "text/javascript";
				script.src = "custom/include/VIFieldsColor/js/VIFieldsColorCheckCondition.js?v='.rand().'"
				document.body.appendChild(script);
            </script>';
		}//end of if

		if($GLOBALS['app']->controller->action == 'index' && $_REQUEST['module'] == 'Administration'){
     		echo '<link rel="stylesheet" type="text/css" href="custom/include/VIFieldsColor/css/VIFieldsColorIcon.css">';
		}//end of if
  	}//end of function
}//end of class
?>