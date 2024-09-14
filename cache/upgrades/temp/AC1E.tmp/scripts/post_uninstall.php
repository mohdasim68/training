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
global $db;
$db->dropTableName('vi_fields_color');
$db->dropTableName('vi_fields_color_condition');

$sqlFieldsColor = "DELETE from config where name = 'fields-color'";
$result = $GLOBALS['db']->query($sqlFieldsColor);

$sqlLicenseKey = "DELETE from config where name = 'lic_fields-color'";
$result2 = $GLOBALS['db']->query($sqlLicenseKey);