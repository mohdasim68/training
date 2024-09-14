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
$manifest = array (
    0 => 
        array (
            'acceptable_sugar_versions' => 
            array (
                0 => '',
            ),
        ),
    1 => 
        array (
            'acceptable_sugar_flavors' => 
            array (
                0 => 'CE',
                1 => 'PRO',
                2 => 'ENT',
            ),
        ),
    'readme' => '',
    'key' => '',
    'author' => 'Variance Infotech PVT. LTD',
    'description' => 'Fields Color Plugin',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'Fields Color',
    'published_date' => '2021-11-15 05:58:00',
    'type' => 'module',
    'version' => 'v1.0',
    'remove_tables' => 'prompt',
);

$installdefs = array (
    'id' => 'FieldsColor',
    'beans' => //remove this bean or replace with your own module name.
        array (
            array (
              'module' => 'VIFieldsColorLicenseAddon',
              'class' => 'VIFieldsColorLicenseAddon',
              'path' => 'modules/VIFieldsColorLicenseAddon/VIFieldsColorLicenseAddon.php',
              'tab' => false,
            ),
        ),
    'post_install' => array(  0 =>  '<basepath>/scripts/post_install.php',),
    'post_execute' => array(  0 =>  '<basepath>/scripts/post_execute.php',),
    'post_uninstall' => array(  0 =>  '<basepath>/scripts/post_uninstall.php',),
    'pre_execute' => array(  0 =>  '<basepath>/scripts/pre_execute.php',),
    'copy' => array (
        0 => 
            array (
                'from' => '<basepath>/custom/Extension/application/Ext/EntryPointRegistry/VIFieldsColorEntryPoint.php',
                'to' => 'custom/Extension/application/Ext/EntryPointRegistry/VIFieldsColorEntryPoint.php',
            ),
        1 => 
            array (
                'from' => '<basepath>/custom/Extension/application/Ext/LogicHooks/VIFieldsColor_LogicHook.php',
                'to' => 'custom/Extension/application/Ext/LogicHooks/VIFieldsColor_LogicHook.php',
            ),
        2 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/ActionViewMap/VIFieldsColorAction_View_Map.ext.php',
                'to' => 'custom/Extension/modules/Administration/Ext/ActionViewMap/VIFieldsColorAction_View_Map.ext.php',
            ),
        3 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Administration/VIFieldsColorAdministration.ext.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Administration/VIFieldsColorAdministration.ext.php',
            ),
        4 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.de_DE.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.de_DE.lang.php',
            ),
        5 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.en_us.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.en_us.lang.php',
            ),
        6 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.es_ES.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.es_ES.lang.php',
            ),
        7 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.fr_FR.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.fr_FR.lang.php',
            ),
        8 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.hu_HU.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.hu_HU.lang.php',
            ),
        9 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.it_IT.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.it_IT.lang.php',
            ),
        10 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.nl_NL.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.nl_NL.lang.php',
            ),
        11 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.pt_BR.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.pt_BR.lang.php',
            ),
        12 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.ru_RU.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.ru_RU.lang.php',
            ),
        13 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.ua_UA.lang.php',
                'to' => 'custom/Extension/modules/Administration/Ext/Language/VIFieldsColor.ua_UA.lang.php',
            ),
        14 => 
            array (
                'from' => '<basepath>/custom/Extension/modules/VIFieldsColorLicenseAddon/',
                'to' => 'custom/Extension/modules/VIFieldsColorLicenseAddon/',
            ),
        15 => 
            array (
                'from' => '<basepath>/custom/include/VIFieldsColor/css/VIFieldsColorIcon.css',
                'to' => 'custom/include/VIFieldsColor/css/VIFieldsColorIcon.css',
            ),
        16 => 
            array (
                'from' => '<basepath>/custom/include/VIFieldsColor/js/VIFieldsColorCheckCondition.js',
                'to' => 'custom/include/VIFieldsColor/js/VIFieldsColorCheckCondition.js',
            ),
        17 => 
            array (
                'from' => '<basepath>/custom/include/VIFieldsColor/VIFieldsColorLogicHook.php',
                'to' => 'custom/include/VIFieldsColor/VIFieldsColorLogicHook.php',
            ),
        18 => 
            array (
                'from' => '<basepath>/custom/modules/Administration/css/VIFieldsColorConfig.css',
                'to' => 'custom/modules/Administration/css/VIFieldsColorConfig.css',
            ),
        19 => 
            array (
                'from' => '<basepath>/custom/modules/Administration/js/VIFieldsColorListView.js',
                'to' => 'custom/modules/Administration/js/VIFieldsColorListView.js',
            ),
        20 => 
            array (
                'from' => '<basepath>/custom/modules/Administration/js/VIFieldsColorEditView.js',
                'to' => 'custom/modules/Administration/js/VIFieldsColorEditView.js',
            ),
        21 => 
            array (
                'from' => '<basepath>/custom/modules/Administration/js/VIFieldsColorConditionLine.js',
                'to' => 'custom/modules/Administration/js/VIFieldsColorConditionLine.js',
            ),
        22 => 
            array (
                'from' => '<basepath>/custom/modules/Administration/tpl/vi_fieldscolorlistview.tpl',
                'to' => 'custom/modules/Administration/tpl/vi_fieldscolorlistview.tpl',
            ),
        23 => 
            array (
                'from' => '<basepath>/custom/modules/Administration/tpl/vi_fieldscoloreditview.tpl',
                'to' => 'custom/modules/Administration/tpl/vi_fieldscoloreditview.tpl',
            ),
        24 => 
            array (
                'from' => '<basepath>/custom/modules/Administration/views/view.vi_fieldscolorlistview.php',
                'to' => 'custom/modules/Administration/views/view.vi_fieldscolorlistview.php',
            ),    
        25 => 
            array (
                'from' => '<basepath>/custom/modules/Administration/views/view.vi_fieldscoloreditview.php',
                'to' => 'custom/modules/Administration/views/view.vi_fieldscoloreditview.php',
            ),
        26 => 
            array (
                'from' => '<basepath>/custom/modules/VIFieldsColorLicenseAddon/',
                'to' => 'custom/modules/VIFieldsColorLicenseAddon',
            ),
        27 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIAddFieldsColorData.php',
                'to' => 'custom/VIFieldsColor/VIAddFieldsColorData.php',
            ),
        28 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIDeleteFieldsColorData.php',
                'to' => 'custom/VIFieldsColor/VIDeleteFieldsColorData.php',
            ),
        29 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIFieldsColorCheckCondition.php',
                'to' => 'custom/VIFieldsColor/VIFieldsColorCheckCondition.php',
            ),
        30 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIFieldsColorFieldTypeOptions.php',
                'to' => 'custom/VIFieldsColor/VIFieldsColorFieldTypeOptions.php',
            ),
        31 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIFieldsColorFunctions.php',
                'to' => 'custom/VIFieldsColor/VIFieldsColorFunctions.php',
            ),
        32 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIFieldsColorModuleFieldLabel.php',
                'to' => 'custom/VIFieldsColor/VIFieldsColorModuleFieldLabel.php',
            ),
        33 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIFieldsColorModuleFields.php',
                'to' => 'custom/VIFieldsColor/VIFieldsColorModuleFields.php',
            ),
        34 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIFieldsColorModuleFieldType.php',
                'to' => 'custom/VIFieldsColor/VIFieldsColorModuleFieldType.php',
            ),
        35 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIFieldsColorModuleOperatorField.php',
                'to' => 'custom/VIFieldsColor/VIFieldsColorModuleOperatorField.php',
            ),
        36 => 
            array (
                'from' => '<basepath>/custom/VIFieldsColor/VIFieldsColorModuleRelationships.php',
                'to' => 'custom/VIFieldsColor/VIFieldsColorModuleRelationships.php',
            ),
        37 => 
            array (
                'from' => '<basepath>/modules/VIFieldsColorLicenseAddon/',
                'to' => 'modules/VIFieldsColorLicenseAddon/',
            ),
        38 => 
            array (
                'from' => '<basepath>/images/FieldsColor.png',
                'to' => 'themes/default/images/FieldsColor.png',
            ),
        39 => 
            array (
                'from' => '<basepath>/images/FieldsColor.svg',
                'to' => 'themes/default/images/FieldsColor.svg',
            ),
        40 => 
            array (
                'from' => '<basepath>/images/FieldsColor.png',
                'to' => 'themes/SuiteP/images/FieldsColor.png',
            ),
        41 => 
            array (
                'from' => '<basepath>/images/FieldsColor.svg',
                'to' => 'themes/SuiteP/images/FieldsColor.svg',
            ),
    ),
);