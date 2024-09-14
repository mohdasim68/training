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
//At bottom of post_install - redirect to license validation page 
function post_install() {
    //install table for user management
    global $sugar_version;
    require_once("modules/Administration/QuickRepairAndRebuild.php"); 
    $repairRebuild = new RepairAndClear(); 
    $repairRebuild ->repairAndClearAll(array('clearAll'), array(translate('LBL_ALL_MODULES')), FALSE, TRUE);

    if(preg_match( "/^6.*/", $sugar_version)) {
        echo "
            <script>
            document.location = 'index.php?module=VIFieldsColorLicenseAddon&action=license';
            </script>"
        ;
    } else {
        echo "
            <script>
            var app = window.parent.SUGAR.App;
            window.parent.SUGAR.App.sync({callback: function(){
                app.router.navigate('#bwc/index.php?module=VIFieldsColorLicenseAddon&action=license', {trigger:true});
            }});
            </script>"
        ;
    }
}//end of function
?>