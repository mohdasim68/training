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
require_once('modules/VIFieldsColorLicenseAddon/license/VIFieldsColorOutfittersLicense.php');
require_once('include/MVC/Controller/SugarController.php');
require_once('custom/VIFieldsColor/VIFieldsColorFunctions.php');

global $sugar_config, $mod_strings;
$siteURL = $sugar_config['site_url'];
$licenseURL = $siteURL."/index.php?module=VIFieldsColorLicenseAddon&action=license";

$selectFieldsName = array("*");
$whereCondition = array('name' => array('operator' => '=', 'value' => "'lic_fields-color'"));
$getFieldsColorLicenseQuery = getFieldsColorData('config', $selectFieldsName, $whereCondition, $orderBy=array());
$getFieldsColorLicenseresult = $GLOBALS['db']->fetchOne($getFieldsColorLicenseQuery);

if(!empty($getFieldsColorLicenseresult)){
	// $validateLicense = VIFieldsColorOutfittersLicense::isValid('VIFieldsColorLicenseAddon');
	$validateLicense = true;
	if($validateLicense !== true) {
   		if(is_admin($current_user)) {
      		SugarApplication::appendErrorMessage($mod_strings['LBL_FIELDS_COLOR_LICENCE_ACTIVE_LABEL_MESSAGE'].' '.$validateLicense.' '.$mod_strings['LBL_FIELDS_COLOR_LICENCE_ISSUES'].' <a href='.$licenseURL.'>'.$mod_strings['LBL_CLICK_HERE'].'</a>');
     	}//end of if
      	echo '<h2><p class="error">'.$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_ACTIVE_MESSAGE'].'</p></h2><p class="error">'.$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_MESSAGE'].'</p><a href='.$licenseURL.'>'.$mod_strings['LBL_CLICK_HERE'].'</a>';
 	}else{
		foreach ($admin_group_header as $key => $value) {
		   $values[] = $value[0];
		}//end of foreach
		if (in_array("Other", $values)){
		   $array['FieldsColor'] = array('FieldsColor', $mod_strings["LBL_FIELDS_COLOR"], $mod_strings["LBL_FIELDS_COLOR_DESCRIPTION"], './index.php?module=Administration&action=vi_fieldscolorlistview', 'fields-color');
		   $admin_group_header['Other'][3]['Administration'] = array_merge($admin_group_header['Other'][3]['Administration'], $array);
		}else{
			$admin_option_defs = array();
			$admin_option_defs['Administration']['FieldsColor'] = array(
				//Icon name. Available icons are located in ./themes/default/images
				'FieldsColor',

				//Link name label 
				$mod_strings["LBL_FIELDS_COLOR"],

				//Link description label
				$mod_strings["LBL_FIELDS_COLOR_DESCRIPTION"],

				//Link URL
				'./index.php?module=Administration&action=vi_fieldscolorlistview',
				'fields-color',
			);
			$admin_group_header['Other'] = array(
				//Section header label
				'Other',

				//$other_text parameter for get_form_header()
				'',

				//$show_help parameter for get_form_header()
				false,

				//Section links
				$admin_option_defs,

				//Section description label
				''
			);
		}//end of else
	}//end of else
}else{
	foreach ($admin_group_header as $key => $value) {
	   $values[] = $value[0];
	}//end of foreach
	if (in_array("Other", $values)){
	   $array['FieldsColor'] = array('FieldsColor', $mod_strings["LBL_FIELDS_COLOR"], $mod_strings["LBL_FIELDS_COLOR_DESCRIPTION"], './index.php?module=VIFieldsColorLicenseAddon&action=license', 'fields-color');
	    
	   $admin_group_header['Other'][3]['Administration'] = array_merge($admin_group_header['Other'][3]['Administration'], $array);
	}else{
		$admin_option_defs = array();
		$admin_option_defs['Administration']['FieldsColor'] = array(
			//Icon name. Available icons are located in ./themes/default/images
			'FieldsColor',

			//Link name label 
			$mod_strings["LBL_FIELDS_COLOR"],

			//Link description label
			$mod_strings["LBL_FIELDS_COLOR_DESCRIPTION"],

			//Link URL
			'./index.php?module=VIFieldsColorLicenseAddon&action=license',
			'fields-color',
		);
		$admin_group_header['Other'] = array(
			//Section header label
			'Other',

			//$other_text parameter for get_form_header()
			'',

			//$show_help parameter for get_form_header()
			false,

			//Section links
			$admin_option_defs,

			//Section description label
			''
		);
	}//end of else
}//end of else
?>