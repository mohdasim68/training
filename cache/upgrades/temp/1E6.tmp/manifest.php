<?php

/**
Notes:
    1. Change the name of the following files to contain the name of YOUR add-on:
        i. /license_admin/language/en_us.SampleLicenseAddon.php
            * Change filename in language array below to match.
        ii. /license_admin/menu/SampleLicenseAddon_admin.php
            * Change filename in adminstration array below to match.
        iii. /license_admin/actionviewmap/SampleLicenseAddon_actionviewmap.php
            * Change filename in actionviewmap array below to match
    2. Edit the config in /license/license/config.php
        'name' => 'SampleLicenseAddon', //The same name of the Add-on listed in your manifest file.
        'shortname' => 'samplelicenseaddon', //The short name of your Add-on
        'public_key' => '', //The public key associated with the group this download is associated with
        'api_url' => 'https://www.sugaroutfitters.com/api/v1', //generall leave as is
        'validate_users' => false, //whether you want to validate users or not. This should match the "Require User Count Verification" option in the group this download is associated with
        'continue_url' => '', //[optional] Will show a button after license validation that will redirect to this page. Could be used to redirect to a configuration page such as index.php?module=MyCustomModule&action=config
    3. Change the 'to' in the copy array below
    4. Edit /scripts/post_install.php and change redirect to your module
    5. Double check each line in the manifest that has "// <-- CHANGE NAME HERE" tagged at the end of the line
    6. Do a search/replace of SampleLicenseAddon, samplelicenseaddon, and SAMPLELICENSEADDON in all files0
*/
$manifest = array (
    'acceptable_sugar_versions' =>  array (
        'regex_matches' => array(
            '.*',
        ),
    ),
    'acceptable_sugar_flavors' => array(
        'CE',
        'PRO',
        'ENT',
        'CORP',
        'ULT',
    ),
    'readme'=>'',
    'key'=>'',
    'author' => 'Fynsis Softlabs',
    'description' => 'Live Helper Chat Integration License Validation Package',
    'icon' => '',
    'is_uninstallable' => true,
    'name' => 'LiveHelperChat', // <-- CHANGE NAME HERE - To your module name, whatever you put here needs to go in license/config.php
    'published_date' => '2017/08/25',
    'type' => 'module',
    'version' => '2.1.1',
    'remove_tables' => 'prompt',

);
$installdefs = array (
    'id' => 'LiveHelperChat', // <-- CHANGE NAME HERE - To your module name
    'copy' =>
        array (
            //copy license directory to your module
            array (
                'from' => '<basepath>/license',
                'to' => 'modules/LiveHelperChat', // <-- CHANGE NAME HERE - To your module name
            ),
            //Rest of your copy records below here....
            
            array (
                'from' => '<basepath>/files/custom/fynsis_service/fynsis_rest.php',
                'to' => 'custom/fynsis_service/fynsis_rest.php',
            ),
            
            array (
                'from' => '<basepath>/files/custom/fynsis_service/FynsisRestService.php',
                'to' => 'custom/fynsis_service/FynsisRestService.php',
            ),
            
            array (
                'from' => '<basepath>/files/custom/fynsis_service/FynsisRestServiceImpl.php',
                'to' => 'custom/fynsis_service/FynsisRestServiceImpl.php',
            ),
            
            array (
                'from' => '<basepath>/files/custom/modules/Notes/metadata/detailviewdefs.php',
                'to' => 'custom/modules/Notes/metadata/detailviewdefs.php',
            ),
        ),
    'language' =>
        array (
            array(
                'from'=> '<basepath>/license_admin/language/en_us.LiveHelperChat.php', // <-- CHANGE NAME HERE
                'to_module'=> 'Administration',
                'language'=>'en_us'
            ),
        ),
    'administration' =>
        array(
            array(
                'from'=>'<basepath>/license_admin/menu/LiveHelperChat_admin.php', // <-- CHANGE NAME HERE
                'to' => 'modules/Administration/LiveHelperChat_admin.php', // <-- CHANGE NAME HERE - Leave Administration as is
            ),
        ),
    'action_view_map' =>
        array (
            array(
                'from'=> '<basepath>/license_admin/actionviewmap/LiveHelperChat_actionviewmap.php', // <-- CHANGE NAME HERE
                'to_module'=> 'LiveHelperChat', // <-- CHANGE NAME HERE - To your module name
            ),
        ),
);

?>