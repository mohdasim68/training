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
$now = date("Y-m-d");

//EntryPoint
if(is_dir('custom/VIFieldsColor')) {
    $changeFieldsColorFolderName = 'VIFieldsColor'.$now;
    rename("custom/VIFieldsColor","custom/".$changeFieldsColorFolderName);
}

//include
if(is_dir('custom/include/VIFieldsColor')) {
    $fieldsColorFolderName = 'VIFieldsColor'.$now;
    rename("custom/include/VIFieldsColor","custom/include/".$fieldsColorFolderName);
}

//Administration
if(file_exists('custom/modules/Administration/css/VIFieldsColorConfig.css')) {
    $nowVIFieldsColorConfig = 'VIFieldsColorConfig'.$now.'.'.'css';
    rename("custom/modules/Administration/css/VIFieldsColorConfig.css","custom/modules/Administration/css/".$nowVIFieldsColorConfig);
}
if(file_exists('custom/modules/Administration/js/VIFieldsColorListView.js')) {
    $nowVIFieldsColorListViewJs = 'VIFieldsColorListView'.$now.'.'.'js';
    rename("custom/modules/Administration/js/VIFieldsColorListView.js","custom/modules/Administration/js/".$nowVIFieldsColorListViewJs);
}
if(file_exists('custom/modules/Administration/js/VIFieldsColorEditView.js')) {
    $nowVIFieldsColorEditViewJs = 'VIFieldsColorEditView'.$now.'.'.'js';
    rename("custom/modules/Administration/js/VIFieldsColorEditView.js","custom/modules/Administration/js/".$nowVIFieldsColorEditViewJs);
}
if(file_exists('custom/modules/Administration/js/VIFieldsColorConditionLine.js')) {
    $nowVIFieldsColorConditionLineJs = 'VIFieldsColorConditionLine'.$now.'.'.'js';
    rename("custom/modules/Administration/js/VIFieldsColorConditionLine.js","custom/modules/Administration/js/".$nowVIFieldsColorConditionLineJs);
}

if(file_exists('custom/modules/Administration/tpl/vi_fieldscolorlistview.tpl')) {
    $nowVIFieldsColorListViewTPL = 'vi_fieldscolorlistview'.$now.'.'.'tpl';
    rename("custom/modules/Administration/tpl/vi_fieldscolorlistview.tpl","custom/modules/Administration/tpl/".$nowVIFieldsColorListViewTPL);
}
if(file_exists('custom/modules/Administration/tpl/vi_fieldscoloreditview.tpl')) {
    $nowVIFieldsColorEditViewTPL = 'vi_fieldscoloreditview'.$now.'.'.'tpl';
    rename("custom/modules/Administration/tpl/vi_fieldscoloreditview.tpl","custom/modules/Administration/tpl/".$nowVIFieldsColorEditViewTPL);
}
if(file_exists('custom/modules/Administration/views/view.vi_fieldscolorlistview.php')) {
    $nowVIFieldsColorListViewPhp = 'view.vi_fieldscolorlistview'.$now.'.'.'php';
    rename("custom/modules/Administration/views/view.vi_fieldscolorlistview.php","custom/modules/Administration/views/".$nowVIFieldsColorListViewPhp);
}
if(file_exists('custom/modules/Administration/views/view.vi_fieldscoloreditview.php')) {
    $nowVIFieldsColorEditViewPhp = 'view.vi_fieldscoloreditview'.$now.'.'.'php';
    rename("custom/modules/Administration/views/view.vi_fieldscoloreditview.php","custom/modules/Administration/views/".$nowVIFieldsColorEditViewPhp);
}

//images
//SuiteP
if(file_exists('themes/SuiteP/images/FieldsColor.png')) {
    $nowFieldsColorIconPng = 'FieldsColor'.$now.'.'.'png';
    rename("themes/SuiteP/images/FieldsColor.png", "themes/SuiteP/images/".$nowFieldsColorIconPng);
}
if(file_exists('themes/SuiteP/images/FieldsColor.svg')) {
    $nowFieldsColorIconSvg = 'FieldsColor'.$now.'.'.'svg';
    rename("themes/SuiteP/images/FieldsColor.svg", "themes/SuiteP/images/".$nowFieldsColorIconSvg);
}

//default
if(file_exists('themes/default/images/FieldsColor.png')) {
    $nowFieldsColorIconPng = 'FieldsColor'.$now.'.'.'png';
    rename("themes/default/images/FieldsColor.png", "themes/default/images/".$nowFieldsColorIconPng);
}
if(file_exists('themes/default/images/FieldsColor.svg')) {
    $nowFieldsColorIconSvg = 'FieldsColor'.$now.'.'.'svg';
    rename("themes/default/images/FieldsColor.svg", "themes/default/images/".$nowFieldsColorIconSvg);
}