<?php

global $sugar_version;

$admin_option_defs=array();

if(preg_match( "/^6.*/", $sugar_version) ) {
    $admin_option_defs['Administration']['livehelperchat_info']= array('helpInline','LBL_LIVEHELPERCHAT_LICENSE_TITLE','LBL_LIVEHELPERCHAT_LICENSE','./index.php?module=LiveHelperChat&action=license');
} else {
    $admin_option_defs['Administration']['livehelperchat_info']= array('helpInline','LBL_LIVEHELPERCHAT_LICENSE_TITLE','LBL_LIVEHELPERCHAT_LICENSE','javascript:parent.SUGAR.App.router.navigate("#bwc/index.php?module=LiveHelperChat&action=license", {trigger: true});');
}

$admin_group_header[]= array('LBL_LIVEHELPERCHAT','',false,$admin_option_defs, '');
