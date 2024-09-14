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
//Insert Fields Color Data
function insertFieldsColorData($tableName, $insertData){
    //Data Key
    $keys = array_keys($insertData);
    $fieldKey = implode(',', $keys);
    
    //Data Value
    $values = array_values($insertData);
    $fieldValue = implode(',', $values);

    $insertFieldsColorData = "INSERT INTO $tableName ($fieldKey) VALUES ($fieldValue)";
    $insertFieldsColorDataResult = $GLOBALS['db']->query($insertFieldsColorData);

    return $insertFieldsColorDataResult;
}//end of function

//Update Fields Color Data
function updateFieldsColorData($tableName, $updateData, $where){
    $updateFieldsColorData = "UPDATE $tableName SET";
    $i = 0;
    $dataCount = count($updateData);

    foreach ($updateData as $key => $value) {
        if (($i+1) != $dataCount) {
          $updateFieldsColorData .= " $key=$value,";
        }else{
          $updateFieldsColorData .= " $key=$value";
        }//end of else
        $i++;
    }//end of foreach
    if(!empty($where)){
        $updateFieldsColorData .= " WHERE";
    }//end of if

    $j = 0;
    $count = count($where);
    foreach($where as $k => $val){
        if (($j+1) != $count) {
          $updateFieldsColorData .=" $k=$val AND";
        }else{
          $updateFieldsColorData .=" $k=$val";
        }//end of else
        $j++;
    }//end of foreach

    $updateFieldsColorDataResult = $GLOBALS['db']->query($updateFieldsColorData);
    return $updateFieldsColorDataResult;
}//end of function 

//Delete Fields Color Condition Data
function deleteFieldsColorData($tableName, $where){
    $delFieldsColorData = "DELETE FROM $tableName";
    foreach($where as $k => $val){
        $delFieldsColorData .=" WHERE $k = $val";
    }//end of foreach

    $delFieldsColorDataResult = $GLOBALS['db']->query($delFieldsColorData);
    return $delFieldsColorDataResult;
}//end of function

//Get all Fields Color Data
function getFieldsColorData($tableName, $fieldName, $where, $orderBy){
    $getFieldsColorData = '';
    $getFieldsColorData .= "SELECT ";

    foreach ($fieldName as $key => $value) {
        if($key == 0){
          $getFieldsColorData .= $value;
        }else{
          $getFieldsColorData .= ",".$value;
        }//end of else
    }//end of foreach

    $getFieldsColorData .= " FROM $tableName";
    $i = 0;
    if(!empty($where)){
        $getFieldsColorData .= " WHERE";
        $dataCount = count($where);

        foreach ($where as $key => $fieldData) {
            $operator = $fieldData['operator'];
            $value = $fieldData['value'];

            if($dataCount > 1 && $i >= 1){
                $getFieldsColorData .= " AND ".$key." ".$operator." ".$value;
            }else{
                $getFieldsColorData .= " ".$key." ".$operator." ".$value;
            }//end of else
            $i++;
        }//end of foreach
    }//end of if

    if(!empty($orderBy)){
        $getFieldsColorData .= " ORDER BY";  
        foreach($orderBy as $k => $v){
            $getFieldsColorData .= " $k $v";
        }//end of foreach 
    }//end of if
    return $getFieldsColorData;
}//end of function

//Get Enable Primary Module List
function getFieldsColorAllPrimaryModuleList(){
    require_once("modules/MySettings/TabController.php");
    $controller = new TabController();
    $tabs = $controller->get_tabs_system();
    foreach ($tabs[0] as $key=>$value) {
        if($key != 'Home' && $key != 'Calendar' && $key != 'AOR_Reports' && $key != 'Emails' && $key != 'Campaigns' && $key != 'jjwg_Address_Cache' && $key != 'AOW_WorkFlow' && $key != 'EmailTemplates'){
            $moduleList[$key] = translate($key);
        }//end of if
    }//end of foreach

    asort($moduleList);
    return $moduleList;
}//end of function

//Get Module All Fields
function getFieldsColorModuleFields($module, $stepName) {
    require_once('include/utils.php');
    $bean = BeanFactory::newBean($module);
    $field = $bean->getFieldDefinitions();

    $addressFieldData = array();
    foreach($field as $value){
        if($value['type'] == 'varchar'){
            if(isset($value['group'])){
                $fieldName = $value['name'];
                $fieldLabel = translate($value['vname'], $module);
                $lastChar = substr($fieldLabel, -1);
                if($lastChar == ':'  || $lastChar == ''){
                    $fieldLabel = substr_replace($fieldLabel, "", -1);
                    $lastCharColon = substr($fieldLabel, -1);
                    if($lastCharColon == ':'){
                        $fieldLabel = substr_replace($fieldLabel, "", -1);
                    }//end of if
                }//end of if
                $addressFieldData[$fieldName] = $fieldLabel;
            }//end of if
        }//end of if
    }//end of foreach

    unset($addressFieldData['email1']);
    unset($addressFieldData['email2']);

    $editViewFieldData = getFieldsColorEditDetailViewFields('editview', $module, $stepName);
    $detailViewFieldData = getFieldsColorEditDetailViewFields('detailview', $module, $stepName);
    $editDetailViewFieldsMerge = array_merge($editViewFieldData, $addressFieldData, $detailViewFieldData); //merge array
    
    if($stepName == 'stepOne'){
        return json_encode($editDetailViewFieldsMerge);
    }else if($stepName == 'stepTwo'){
        $value = '';
        asort($editDetailViewFieldsMerge);
        return get_select_options_with_id($editDetailViewFieldsMerge, $value);
        die;
    }//end of else if
}//end of function

//Get Module EditView DetaiView Fields
function getFieldsColorEditDetailViewFields($view, $module, $stepName) {
    require_once('modules/ModuleBuilder/parsers/ParserFactory.php');
    $view_array = ParserFactory::getParser($view, $module);
    $panelArray = $view_array->_viewdefs['panels'];//editview panels
    $bean = BeanFactory::newBean($module);
    $field = $bean->getFieldDefinitions();

    //editview fields
    $editViewFieldArray = array();
    foreach ($panelArray as $key => $value) {
        foreach ($value as $keys => $values) {
            $editViewFieldArray[] = $values;
        }//end of foreach
    }//end of foreach
    
    if($stepName == 'stepOne' || $stepName == 'moduleEditView'){
        $data = array();
    }else if($stepName == 'stepTwo'){
        $data = array('' => '--None--');
    }//end of else if
    
    foreach($editViewFieldArray as $key => $value) {
        foreach($value as $k => $v) {
            if(array_key_exists($v, $field)) {
                require_once('include/utils.php');
                $fieldName = $v;
                if($field[$v]['type'] == 'enum' && isset($field[$v]['options']) && $module == 'AOW_WorkFlow'){
                    if($field[$v]['vname'] == 'LBL_RUN_ON'){
                        $fieldLabel = translate('LBL_FLOW_RUN_ON', 'AOW_WorkFlow');
                    }else{
                        $fieldLabel = translate($field[$v]['vname'], 'AOW_WorkFlow');
                    }//end of foreach
                }else{
                    $fieldLabel = translate($field[$v]['vname'], $module); 
                }//end of else

                $lastChar = substr($fieldLabel, -1);
                if($lastChar == ':'  || $lastChar == ' '){
                    $fieldLabel = substr_replace($fieldLabel, "", -1);
                    $lastCharColon = substr($fieldLabel, -1);
                    if($lastCharColon == ':'){
                        $fieldLabel = substr_replace($fieldLabel, "", -1);
                    }//end of if
                }//end of if

                $data[$fieldName] = $fieldLabel;
            }//end of if 
        }//end of foreach
    }//end of foreach

    //unset fields
    $unsetData = array('sample', 'insert_fields', 'update_text', 'case_update_form', 'aop_case_updates_threaded', 'internal', 'survey_questions_display', 'line_items', 'email1', 'email2', 'suggestion_box', 'filename', 'product_image', 'configurationGUI', 'invite_templates', 'action_lines', 'condition_lines', 'survey_url_display', 'reminders', 'pdffooter', 'pdffooter');
    foreach ($unsetData as $key => $value) {
        unset($data[$value]);
    }//end of foreach

    if($module == 'jjwg_Maps' || $module == 'Meetings' || $module == 'Notes' || $module == 'Tasks' || $module == 'Calls'){
        unset($data['parent_name']);
    }//end of if

    if($module == 'AOS_PDF_Templates' || $module == 'AOK_KnowledgeBase' || $module == 'Cases'){
        unset($data['description']);
    }//end of if

    if($module == 'AOS_Invoices'){
        unset($data['number']);
    }//end of if

    if($module == 'Meetings' || $module == 'FP_events'){
        unset($data['duration']);
    }//end of if
    return $data;
}//end of function

//Get Module Date Field Value Type
function getFieldsColorModuleDateField($module, $aowField, $view, $value = null, $fieldOption = true, $fieldName){
    global $app_list_strings;
    // set $view = 'EditView' as default
    if (!$view) {
        $view = 'EditView';
    }//end of if

    $value = json_decode(html_entity_decode_utf8($value), true);

    if(!file_exists('modules/AOBH_BusinessHours/AOBH_BusinessHours.php')) unset($app_list_strings['aow_date_type_list']['business_hours']);

    $field = '';

    if($view == 'EditView'){
        $field .= "<select type='text' name='$aowField".'[0]'."' id='$aowField".'[0]'."' title='' tabindex='116'>". getFieldsColorModuleDateFields($module, $view, $value[0], $fieldOption, $fieldName) ."</select>&nbsp;&nbsp;";
        $field .= "<select type='text' name='$aowField".'[1]'."' id='$aowField".'[1]'."' onchange='fieldsColorDateFieldChange(\"$aowField\")'  title='' tabindex='116'>". get_select_options_with_id($app_list_strings['aow_date_operator'], $value[1]) ."</select>&nbsp;";
        $display = 'none';
        if($value[1] == 'plus' || $value[1] == 'minus') $display = '';
        $field .= "<input  type='text' style='display:$display' name='$aowField".'[2]'."' id='$aowField".'[2]'."' title='' value='$value[2]' tabindex='116'>&nbsp;";
        $field .= "<select type='text' style='display:$display' name='$aowField".'[3]'."' id='$aowField".'[3]'."' title='' tabindex='116'>". get_select_options_with_id($app_list_strings['aow_date_type_list'], $value[3]) ."</select>";
    }//end of if
    return $field;
}//end of function

//Get Module Date Fields Data
function getFieldsColorModuleDateFields($module, $view='EditView', $value = '', $fieldOption = true, $fieldName) {
    global $beanList, $app_list_strings;

    $fields = $app_list_strings['aow_date_options'];

    if(!$fieldOption) unset($fields['field']);
    $mod = new $beanList[$module]();
    $fieldData = $mod->field_defs[$fieldName];
    $fieldType = $fieldData['type'];
    if ($module != '') {
        if(isset($beanList[$module]) && $beanList[$module]){
            $mod = new $beanList[$module]();
            foreach($mod->field_defs as $name => $arr){
                if($fieldType == 'date' ){
                    if($arr['type'] == 'date'){
                        if(isset($arr['vname']) && $arr['vname'] != ''){
                            $fieldLabel = translate($arr['vname'], $mod->module_dir);
                            if(strpos($fieldLabel, ':')){
                                $fieldLabel = substr_replace($fieldLabel, "", -1);
                            }//end of if
                            $fields[$name] = $fieldLabel;
                        } else {
                            $fields[$name] = $name;
                        }//end of else
                    }//end of if
                }else if($fieldType == 'datetime' || $fieldType == 'datetimecombo'){
                    if($arr['type'] == 'datetime' || $arr['type'] == 'datetimecombo'){
                        if(isset($arr['vname']) && $arr['vname'] != ''){
                            $fieldLabel = translate($arr['vname'], $mod->module_dir);
                            if(strpos($fieldLabel, ':')){
                                $fieldLabel = substr_replace($fieldLabel, "", -1);
                            }//end of if
                            $fields[$name] = $fieldLabel;
                        } else {
                            $fields[$name] = $name;
                        }//end of else
                    }//end of if
                }//end of else
            }//end of foreach
        }//end of if
    }//end of if
    if($view == 'EditView'){
        return get_select_options_with_id($fields, $value);
    }//end of if
}//end of function

//Get Module Fields Html
function getFieldsColorModuleFieldHtml($module, $fieldName, $aowField, $view='EditView', $value = '', $altType = '', $currencyId = '', $params= array()){
    
    global $current_language, $app_strings, $app_list_strings, $current_user, $beanFiles, $beanList;

    // use the mod_strings for this module
    $mod_strings = return_module_language($current_language,$module);

    // set the filename for this control
    $file = create_cache_directory('modules/AOW_WorkFlow/') . $module . $view . $altType . $fieldName . $aowField .'.tpl';

    $displayParams = array();

    if ( !is_file($file)
        || inDeveloperMode()
        || !empty($_SESSION['developerMode']) ) {

        if ( !isset($vardef) ) {
            require_once($beanFiles[$beanList[$module]]);
            $focus = new $beanList[$module];
            $vardef = $focus->getFieldDefinition($fieldName);
        }//end of if

        // Bug: check for AOR value SecurityGroups value missing
        if(stristr($fieldName, 'securitygroups') != false && empty($vardef)) {
            require_once($beanFiles[$beanList['SecurityGroups']]);
            $module = 'SecurityGroups';
            $focus = new $beanList[$module];
            $vardef = $focus->getFieldDefinition($fieldName);
        }//end of if

        //$displayParams['formName'] = 'EditView';

        // if this is the id relation field, then don't have a pop-up selector.
        if( $vardef['type'] == 'relate' && $vardef['id_name'] == $vardef['name']) {
            $vardef['type'] = 'varchar';
        }//end of if

        if(isset($vardef['precision'])) unset($vardef['precision']);

        //$vardef['precision'] = $locale->getPrecedentPreference('default_currency_significant_digits', $current_user);

        if( $vardef['type'] == 'datetime') {
            $vardef['type'] = 'datetimecombo';
        }//end of if
        if( $vardef['type'] == 'datetimecombo') {
            $displayParams['originalFieldName'] = $aowField;
            // Replace the square brackets by a deliberately complex alias to avoid JS conflicts
            $displayParams['idName'] = fieldsColorCreateBracket($aowField);
        }//end of if

        // trim down textbox display
        if( $vardef['type'] == 'text' ) {
            $vardef['rows'] = 2;
            $vardef['cols'] = 32;
        }//end of if

        // create the dropdowns for the parent type fields
        if ( $vardef['type'] == 'parent_type' ) {
            $vardef['type'] = 'enum';
        }//end of if

        if($vardef['type'] == 'link'){
            $vardef['type'] = 'relate';
            $vardef['rname'] = 'name';
            $vardef['id_name'] = $vardef['name'].'_id';
            if((!isset($vardef['module']) || $vardef['module'] == '') && $focus->load_relationship($vardef['name'])) {
                $relName = $vardef['name'];
                $vardef['module'] = $focus->$relName->getRelatedModuleName();
            }//end of if
        }//end of if

        //check for $altType
        if ( $altType != '' ) {
            $vardef['type'] = $altType;
        }//end of if

        // remove the special text entry field function 'getEmailAddressWidget'
        if ( isset($vardef['function'])
            && ( $vardef['function'] == 'getEmailAddressWidget'
                || $vardef['function']['name'] == 'getEmailAddressWidget' ) )
            unset($vardef['function']);

        if(isset($vardef['name']) && ($vardef['name'] == 'date_entered' || $vardef['name'] == 'date_modified')){
            $vardef['name'] = 'aow_temp_date';
        }//end of if

        // load SugarFieldHandler to render the field tpl file
        static $sfh;

        if(!isset($sfh)) {
            require_once('include/SugarFields/SugarFieldHandler.php');
            $sfh = new SugarFieldHandler();
        }//end of if

        $contents = $sfh->displaySmarty('fields', $vardef, $view, $displayParams);

        // Remove all the copyright comments
        $contents = preg_replace('/\{\*[^\}]*?\*\}/', '', $contents);

        if ($view == 'EditView' && ($vardef['type'] == 'relate' || $vardef['type'] == 'parent')) {
            $contents = str_replace('"' . $vardef['id_name'] . '"',
                '{/literal}"{$fields.' . $vardef['name'] . '.id_name}"{literal}', $contents);
            $contents = str_replace('"' . $vardef['name'] . '"',
                '{/literal}"{$fields.' . $vardef['name'] . '.name}"{literal}', $contents);
        }//end of if
        if ($view == 'DetailView' && $vardef['type'] == 'image') {
            $contents = str_replace('{$fields.id.value}', '{$record_id}', $contents);
        }//end of if
        // hack to disable one of the js calls in this control
        if (isset($vardef['function']) && ($vardef['function'] == 'getCurrencyDropDown' || $vardef['function']['name'] == 'getCurrencyDropDown')) {
            $contents .= "{literal}<script>function CurrencyConvertAll() { return; }</script>{/literal}";
        }//end of if

        // Save it to the cache file
        if ($fh = @sugar_fopen($file, 'w')) {
            fputs($fh, $contents);
            fclose($fh);
        }//end of if
    }//end of if

    // Now render the template we received
    $ss = new Sugar_Smarty();

    // Create Smarty variables for the Calendar picker widget
    global $timedate;
    $time_format = $timedate->get_user_time_format();
    $date_format = $timedate->get_cal_date_format();
    $ss->assign('USER_DATEFORMAT', $timedate->get_user_date_format());
    $ss->assign('TIME_FORMAT', $time_format);
    $time_separator = ":";
    $match = array();
    if(preg_match('/\d+([^\d])\d+([^\d]*)/s', $time_format, $match)) {
        $time_separator = $match[1];
    }//end of if
    $t23 = strpos($time_format, '23') !== false ? '%H' : '%I';
    if(!isset($match[2]) || $match[2] == '') {
        $ss->assign('CALENDAR_FORMAT', $date_format . ' ' . $t23 . $time_separator . "%M");
    }//end of if
    else {
        $pm = $match[2] == "pm" ? "%P" : "%p";
        $ss->assign('CALENDAR_FORMAT', $date_format . ' ' . $t23 . $time_separator . "%M" . $pm);
    }//end of if

    $ss->assign('CALENDAR_FDOW', $current_user->get_first_day_of_week());

    // populate the fieldlist from the vardefs
    $fieldlist = array();
    if ( !isset($focus) || !($focus instanceof SugarBean) )
        require_once($beanFiles[$beanList[$module]]);
    $focus = new $beanList[$module];
    // create the dropdowns for the parent type fields
    $vardefFields = $focus->getFieldDefinitions();
    if (isset($vardefFields[$fieldName]['type']) && $vardefFields[$fieldName]['type'] == 'parent_type' ) {
        $focus->field_defs[$fieldName]['options'] = $focus->field_defs[$vardefFields[$fieldName]['group']]['options'];
    }//end of if
    foreach ( $vardefFields as $name => $properties ) {
        $fieldlist[$name] = $properties;
        // fill in enums
        if(isset($fieldlist[$name]['options']) && is_string($fieldlist[$name]['options']) && isset($app_list_strings[$fieldlist[$name]['options']]))
            $fieldlist[$name]['options'] = $app_list_strings[$fieldlist[$name]['options']];
        // Bug 32626: fall back on checking the mod_strings if not in the app_list_strings
        elseif(isset($fieldlist[$name]['options']) && is_string($fieldlist[$name]['options']) && isset($mod_strings[$fieldlist[$name]['options']]))
            $fieldlist[$name]['options'] = $mod_strings[$fieldlist[$name]['options']];
    }//end of foreach

    // fill in function return values
    if ( !in_array($fieldName,array('email1','email2')) )
    {
        if (!empty($fieldlist[$fieldName]['function']['returns']) && $fieldlist[$fieldName]['function']['returns'] == 'html')
        {
            $function = $fieldlist[$fieldName]['function']['name'];
            // include various functions required in the various vardefs
            if ( isset($fieldlist[$fieldName]['function']['include']) && is_file($fieldlist[$fieldName]['function']['include']))
                require_once($fieldlist[$fieldName]['function']['include']);
            $_REQUEST[$fieldName] = $value;
            $value = $function($focus, $fieldName, $value, $view);

            $value = str_ireplace($fieldName, $aowField, $value);
        }//end of if
    }//end of if

    if(isset($fieldlist[$fieldName]['type']) && $fieldlist[$fieldName]['type'] == 'link'){
        $fieldlist[$fieldName]['id_name'] = $fieldlist[$fieldName]['name'].'_id';

        if((!isset($fieldlist[$fieldName]['module']) || $fieldlist[$fieldName]['module'] == '') && $focus->load_relationship($fieldlist[$fieldName]['name'])) {
            $relName = $fieldlist[$fieldName]['name'];
            $fieldlist[$fieldName]['module'] = $focus->$relName->getRelatedModuleName();
        }//end of if
    }//end of if

    if(isset($fieldlist[$fieldName]['name']) && ($fieldlist[$fieldName]['name'] == 'date_entered' || $fieldlist[$fieldName]['name'] == 'date_modified')){
        $fieldlist[$fieldName]['name'] = 'aow_temp_date';
        $fieldlist['aow_temp_date'] = $fieldlist[$fieldName];
        $fieldName = 'aow_temp_date';
    }//end of if

    $quicksearch_js = '';
    if(isset( $fieldlist[$fieldName]['id_name'] ) && $fieldlist[$fieldName]['id_name'] != '' && $fieldlist[$fieldName]['id_name'] != $fieldlist[$fieldName]['name']){
        $rel_value = $value;

        require_once("include/TemplateHandler/TemplateHandler.php");
        $template_handler = new TemplateHandler();
        $quicksearch_js = $template_handler->createQuickSearchCode($fieldlist,$fieldlist,$view);
        $quicksearch_js = str_replace($fieldName, $aowField.'_display', $quicksearch_js);
        $quicksearch_js = str_replace($fieldlist[$fieldName]['id_name'], $aowField, $quicksearch_js);

        echo $quicksearch_js;

        if(isset($fieldlist[$fieldName]['module']) && $fieldlist[$fieldName]['module'] == 'Users'){
            $rel_value = get_assigned_user_name($value);
        } else if(isset($fieldlist[$fieldName]['module'])){
            require_once($beanFiles[$beanList[$fieldlist[$fieldName]['module']]]);
            $rel_focus = new $beanList[$fieldlist[$fieldName]['module']];
            $rel_focus->retrieve($value);
            if(isset($fieldlist[$fieldName]['rname']) && $fieldlist[$fieldName]['rname'] != ''){
                $relDisplayField = $fieldlist[$fieldName]['rname'];
            } else {
                $relDisplayField = 'name';
            }//end of else
            $rel_value = $rel_focus->$relDisplayField;
        }//end of else if

        $fieldlist[$fieldlist[$fieldName]['id_name']]['value'] = $value;
        $fieldlist[$fieldName]['value'] = $rel_value;
        $fieldlist[$fieldName]['id_name'] = $aowField;
        $fieldlist[$fieldlist[$fieldName]['id_name']]['name'] = $aowField;
        $fieldlist[$fieldName]['name'] = $aowField.'_display';
    } else if(isset( $fieldlist[$fieldName]['type'] ) && $view == 'DetailView' && ($fieldlist[$fieldName]['type'] == 'datetimecombo' || $fieldlist[$fieldName]['type'] == 'datetime' || $fieldlist[$fieldName]['type'] == 'date')){
        $value = $focus->convertField($value, $fieldlist[$fieldName]);
        if(!empty($params['date_format']) && isset($params['date_format'])){
            $convert_format = "Y-m-d H:i:s";
            if($fieldlist[$fieldName]['type'] == 'date') $convert_format = "Y-m-d";
            $fieldlist[$fieldName]['value'] = $timedate->to_display($value, $convert_format, $params['date_format']);
        }else{
            $fieldlist[$fieldName]['value'] = $timedate->to_display_date_time($value, true, true);
        }//end of else
        $fieldlist[$fieldName]['name'] = $aowField;
    } else if(isset( $fieldlist[$fieldName]['type'] ) && ($fieldlist[$fieldName]['type'] == 'datetimecombo' || $fieldlist[$fieldName]['type'] == 'datetime' || $fieldlist[$fieldName]['type'] == 'date')){
        $value = $focus->convertField($value, $fieldlist[$fieldName]);
        $displayValue = $timedate->to_display_date_time($value);
        $fieldlist[$fieldName]['value'] = $fieldlist[$aowField]['value'] = $displayValue;
        $fieldlist[$fieldName]['name'] = $aowField;
    } else {
        $fieldlist[$fieldName]['value'] = $value;
        $fieldlist[$fieldName]['name'] = $aowField;
    }//end of else

    if (isset($fieldlist[$fieldName]['type']) && $fieldlist[$fieldName]['type'] == 'datetimecombo' || $fieldlist[$fieldName]['type'] == 'datetime' ) {
        $fieldlist[$aowField]['aliasId'] = fieldsColorCreateBracket($aowField);
        $fieldlist[$aowField]['originalId'] = $aowField;
    }//end of if

    if(isset($fieldlist[$fieldName]['type']) && $fieldlist[$fieldName]['type'] == 'currency' && $view != 'EditView'){
        static $sfh;

        if(!isset($sfh)) {
            require_once('include/SugarFields/SugarFieldHandler.php');
            $sfh = new SugarFieldHandler();
        }//end of if

        if($currency_id != '' && !stripos($fieldName, '_USD')){
            $userCurrencyId = $current_user->getPreference('currency');
            if($currency_id != $userCurrencyId){
                $currency = new Currency();
                $currency->retrieve($currency_id);
                $value = $currency->convertToDollar($value);
                $currency->retrieve($userCurrencyId);
                $value = $currency->convertFromDollar($value);
            }//end of if
        }//end of if

        $parentfieldlist[strtoupper($fieldName)] = $value;

        return($sfh->displaySmarty($parentfieldlist, $fieldlist[$fieldName], 'ListView', $displayParams));
    }//end of if
    
    $ss->assign("QS_JS", $quicksearch_js);
    $ss->assign("fields", $fieldlist);
    $ss->assign("form_name", $view);
    $ss->assign("bean", $focus);

    // Add in any additional strings
    $ss->assign("MOD", $mod_strings);
    $ss->assign("APP", $app_strings);
    $ss->assign("module", $module);
    if (isset($params['record_id'])) {
        $ss->assign("record_id", $params['record_id']);
    }//end of if

    return $ss->fetch($file);
}//end of function

function fieldsColorCreateBracket($variable){
    $replaceRightBracket = str_replace(']', '', $variable);
    $replaceLeftBracket =  str_replace('[', '', $replaceRightBracket);
    return $replaceLeftBracket;
}//end of function

//Update Fields Color Condition Data
function updateFieldsColorConditionsData($fieldName, $delId, $conditionId, $fieldsColorConditionTableName, $operatorName, $valueType, $fieldValue, $module){
    //Condition field 
    $updateFieldsColorConditionFieldData = updateFieldsColorConditionField($fieldName, $delId, $conditionId, $fieldsColorConditionTableName);

    //Condition operator
    $updateFieldsColorConditionOperatorData = updateFieldsColorConditionOperator($operatorName, $delId, $conditionId, $fieldsColorConditionTableName);

    //Condition value type
    $updateFieldsColorConditionValueTypeData = updateFieldsColorConditionValueType($valueType, $delId, $conditionId, $fieldsColorConditionTableName);

    //Condition value
    $updateFieldsColorConditionFieldValueData = updateFieldsColorConditionFieldValue($fieldValue, $fieldName, $valueType, $module, $delId, $conditionId, $fieldsColorConditionTableName);
}//end of function

//Update Condition Field 
function updateFieldsColorConditionField($fieldName, $delId, $conditionId, $fieldsColorConditionTableName){
    //Condition field 
    if(!empty($fieldName)){ 
        foreach($fieldName as $key => $value) {
            $updateFieldData = array('field' => "'".$value."'",
                                     'deleted' => $delId[$key]);
            $whereCondition = array('id' => "'".$conditionId[$key]."'");
            $updateFieldsColorData = updateFieldsColorData($fieldsColorConditionTableName, $updateFieldData, $whereCondition);
        }//end of foreach
    }//end of if
}//end of function

//Update Condition Operator
function updateFieldsColorConditionOperator($operatorName, $delId, $conditionId, $fieldsColorConditionTableName){
    //Condition Operator
    if(!empty($operatorName)){ 
        foreach($operatorName as $key => $value) {
            $updateOperatorData = array('operator' => "'".$value."'",
                                       'deleted' => $delId[$key]);
            $whereCondition = array('id' => "'".$conditionId[$key]."'");
            $updateFieldsColorData = updateFieldsColorData($fieldsColorConditionTableName, $updateOperatorData, $whereCondition);
        }//end of foreach
    }//end of if
}//end of function

//Update Condition Value Type
function updateFieldsColorConditionValueType($valueType, $delId, $conditionId, $fieldsColorConditionTableName){
    //Condition value type
    if(!empty($valueType)){ 
        foreach($valueType as $key => $value) {
            $updateValueTypeData = array('value_type' => "'".$value."'",
                                       'deleted' => $delId[$key]);
            $whereCondition = array('id' => "'".$conditionId[$key]."'");
            $updateFieldsColorData = updateFieldsColorData($fieldsColorConditionTableName, $updateValueTypeData, $whereCondition);
        }//end of foreach
    }//end of if
}//end of function

//Update Condition Field Value
function updateFieldsColorConditionFieldValue($fieldValue, $fieldName, $valueType, $module, $delId, $conditionId, $fieldsColorConditionTableName){
    //Condition value
    if(!empty($fieldValue)){
        foreach($fieldValue as $key => $values) {
            $field = $fieldName[$key];
            $selValueType = $valueType[$key];
            if($selValueType == 'Value'){
                $values = getFieldsColorFieldValues($module, $field, $values, $selValueType);
            }else if($selValueType == 'Date'){
                $values = base64_encode(serialize($values));
            }//end of else if
            
            $updateValueData = array('value' => "'".$values."'",
                                     'deleted' => $delId[$key]);
            $whereCondition = array('id' => "'".$conditionId[$key]."'");
            $updateFieldsColorData = updateFieldsColorData($fieldsColorConditionTableName, $updateValueData, $whereCondition);         
        }//end of foreach
    }//end of if
}//end of function

//Get Selected Module Fields Values in Condition Block
function getFieldsColorFieldValues($module, $fieldName, $value, $selValueType){
    global $timedate;
    $bean = BeanFactory::newBean($module);
    $fieldDef = $bean->field_defs[$fieldName];
    if($fieldDef['type'] == 'datetime' || $fieldDef['type'] == 'datetimecombo'){
        $date = date('Y-m-d', strtotime($value));
        $time = date('h:i:s', strtotime($value));
        $dbtime = $timedate->to_db_time($value);
        $value = $date.' '.$dbtime;
    }else if($fieldDef['type'] == 'date'){
        $value = date('Y-m-d', strtotime($value));
    }else if($fieldDef['type'] == 'multienum'){
        $value = encodeMultienumValue($value);
    }else if($fieldDef['type'] == 'enum'){
        if($selValueType == 'Multi'){
            $value = encodeMultienumValue($value);
        }//end of if
    }else {
        $numericValue = str_replace(',', '', $value);
        if( is_numeric( $numericValue ) ) {
            $value = $numericValue;
        }//end of if
    }//end of else
    return $value;
}//end of function

//Condition Block Html
function getFieldsColorConditionBlockHtml($moduleName, $recordId, $conditionType, $getFieldsNames){
   
    $randNumber = rand();
    $conditionLinesHtml = '';
    
    if($conditionType == 'All'){
        $tableId = 'aowAllConditionLines';
        $conditionButtonId = 'btnAllConditionLine';
        $conditionLinesHtml .= '<script src="custom/modules/Administration/js/VIFieldsColorConditionLine.js?v='.$randNumber.'"></script>';
    }else{
        $tableId = 'aowAnyConditionLines';
        $conditionButtonId = 'btnAnyConditionLine';
    }//end of else

    $conditionLinesHtml .= "<table border='0' cellspacing='4' width='100%' id='".$tableId."'></table>";
    $conditionLinesHtml .= "<div style='padding-top: 10px; padding-bottom:10px;'>";
    $conditionLinesHtml .= "<input type=\"button\" tabindex=\"116\" class=\"button\" value=\"Add Condition\" id='".$conditionButtonId."' onclick=\"insertFieldsColorConditionLine('".$conditionType."')\"/>";
    $conditionLinesHtml .= "</div>";

    if($moduleName != ''){
        $relatedModules[$moduleName] = translate($moduleName);
        $flowRelModules = get_select_options_with_id($relatedModules, $moduleName);

        require_once("modules/AOW_WorkFlow/aow_utils.php");
        $conditionLinesHtml .= "<script>";
        $conditionLinesHtml .= "flowRelModules = \"".trim(preg_replace('/\s+/', ' ', $flowRelModules))."\";";
        $conditionLinesHtml .= "flowModule = \"".$moduleName."\";";

        $whereCondition = array('fields_color_id' => array('operator' => '=', 'value' => "'".$recordId."'"), 'condition_type' => array('operator' => '=', 'value' => "'".$conditionType."'"), 'module_path' => array('operator' => '=', 'value' => "'".$moduleName."'"), 'deleted' => array('operator' => '=', 'value' => 0));
        $orderBy = array('date_entered' => 'ASC');
        $getConditions = getFieldsColorData('vi_fields_color_condition', $getFieldsNames, $whereCondition, $orderBy);
        $getConditionsResult = $GLOBALS['db']->query($getConditions);

        $fields = '';
        $fields .= "flowFields = \"".trim(preg_replace('/\s+/', ' ', getFieldsColorModuleFields($moduleName, 'stepTwo')))."\";";
        while ($getConditionsRow = $GLOBALS['db']->fetchByAssoc($getConditionsResult)) {
            $conditionLinesHtml .= $fields;
            $fieldItem = json_encode($getConditionsRow);

            if($getConditionsRow['value_type'] == 'Date'){
                $conditionVal = json_encode(unserialize(base64_decode($getConditionsRow['value'])));    
            }else{
                $conditionVal = json_encode($getConditionsRow['value']);
            }//end of else

            $conditionLinesHtml .= "loadFieldsColorConditionLine(".$fieldItem.", ".$conditionVal.", '".$getConditionsRow['condition_type']."');";
        }//end of while
        $conditionLinesHtml .= $fields;
        $conditionLinesHtml .= "</script>";
    }//end of if

    return $conditionLinesHtml;
}//end of function

//Get Fields Color Data for module
function getFieldsColorModuleData($moduleName){
    $getFieldsNames = array("*");
    $whereCondition = array('module_name' => array('operator' => '=', 'value' => "'".$moduleName."'"), 'status' => array('operator' => '=', 'value' => 1), 'deleted' => array('operator' => '=', 'value' => 0));
    $orderBy = array('date_entered' => 'DESC');
    $getFieldsColor = getFieldsColorData('vi_fields_color', $getFieldsNames, $whereCondition, $orderBy);
    $getFieldsColorResult = $GLOBALS['db']->query($getFieldsColor);
    
    $fieldsColorData = array();
    while($fieldsColorRow = $GLOBALS['db']->fetchByAssoc($getFieldsColorResult)){
        $fieldsColorId = $fieldsColorRow['fields_color_id'];

        $whereCondition = array('fields_color_id' => array('operator' => '=', 'value' => "'".$fieldsColorId."'"), 'deleted' => array('operator' => '=', 'value' => 0));
        $orderBy = array('date_entered' => 'ASC');
        $getFieldsColorConditions = getFieldsColorData('vi_fields_color_condition', $getFieldsNames, $whereCondition, $orderBy);
        $getFieldsColorConditionsResult = $GLOBALS['db']->query($getFieldsColorConditions);

        $fieldsColorConditionsData = array();
        while($getFieldsColorConditionsResultRow = $GLOBALS['db']->fetchByAssoc($getFieldsColorConditionsResult)){

            $modulePath = $getFieldsColorConditionsResultRow['module_path']; //module Name
            $field = $getFieldsColorConditionsResultRow['field']; //fields Name 
            $relatedBean = BeanFactory::newBean($modulePath);
            $fieldData = $relatedBean->field_defs[$field];

            if($fieldData['type'] == 'relate'){
                $field = $fieldData['id_name'];
            }//end of if

            $fieldsColorConditionsData[$modulePath][] = array('modulePath' => $modulePath,
                                            'field' => $field,
                                            'operator' => $getFieldsColorConditionsResultRow['operator'],
                                            'valueType' => $getFieldsColorConditionsResultRow['value_type'],
                                            'value' => $getFieldsColorConditionsResultRow['value'],
                                            'conditionType' => $getFieldsColorConditionsResultRow['condition_type']
                                            );
        }//end of while

        $fieldsColorData[$fieldsColorId] = array('conditions' => $fieldsColorConditionsData,
                            'fieldsColorId' => $fieldsColorRow['fields_color_id'],
                            'fieldsColorName' => $fieldsColorRow['fields_color_name'],
                            'moduleName' => $fieldsColorRow['module_name'],
                            'moduleLable' => translate($fieldsColorRow['module_name']),
                            'status' => $fieldsColorRow['status'],
                            'fieldsToColor' => explode(',', $fieldsColorRow['fields_color_field']),
                            'textColor' => $fieldsColorRow['text_color'],
                            'backgroundColor' => $fieldsColorRow['background_color'],
                            'relatedRecordColor' => $fieldsColorRow['related_record_color'],
                            'colorLabel' => $fieldsColorRow['color_label'],
                            'conditionalOperator' => $fieldsColorRow['conditional_operator'],
                            'dateEntered' => $fieldsColorRow['date_entered'],
                            );
    }//end of while
    return $fieldsColorData;
}//end of function

//Get Matched Condition Data
function matchFieldsColorCondition($moduleName, $fieldsColorDataValue, $recordId, $formData, $fieldName){
    global $timedate, $app_list_strings;
    $matchCondition = array();
    $matchAllCondition = $matchAnyCondition = $matchAllAnyCondition = 0;

    $bean = BeanFactory::newBean($moduleName);
    $conditionalOperator = $fieldsColorDataValue['conditionalOperator'];
    if(!empty($fieldsColorDataValue['conditions'])){
        foreach ($fieldsColorDataValue['conditions'] as $index => $conditionData) {
            foreach ($conditionData as $key => $value) {
                $flag = 0;
                $conditionFieldName = $value['field'];
                if(array_key_exists($conditionFieldName, $formData)){
                    $fieldValue = $formData[$conditionFieldName];
                    $fieldDef = $bean->field_defs[$conditionFieldName];
                    $flag = 1;
                }else{
                    if($recordId != ''){
                        if($moduleName == 'Documents'){
                            $getFieldsNames = array("*");
                            $whereCondition = array('id' => array('operator' => '=', 'value' => "'".$recordId."'"));
                            $getDocumentData = getFieldsColorData('documents', $getFieldsNames, $whereCondition, $orderBy=array());
                            $getDocumentDataRow = $GLOBALS['db']->fetchOne($getDocumentData);
                            $recordBean = BeanFactory::newBean($moduleName);   
                        }else{
                            $recordBean = BeanFactory::getBean($moduleName, $recordId);
                        }//end of else

                        if($moduleName == 'Documents'){
                            $fieldValue = $getDocumentDataRow[$conditionFieldName];
                        }else{
                            $fieldValue = $recordBean->$conditionFieldName;
                        }//end of else

                        $fieldDef = $recordBean->field_defs[$conditionFieldName];
                        $flag = 1;
                    }//end of if
                }//end of else

                if($flag == 1){
                    $conditionType = $value['conditionType'];
                    $fieldType = $fieldDef['type'];
                    $conditionValue = $value['value'];
                    $valueType = $value['valueType'];

                    if($valueType == 'Date'){
                        $params = unserialize(base64_decode($conditionValue));
                        $dateType = 'datetime';
                        if($params[0] == 'now'){
                            $conditionValue = date('Y-m-d H:i');
                            $fieldValue = strtotime(date('Y-m-d H:i', strtotime($fieldValue)));
                        }else if($params[0] == 'today'){
                            $dateType = 'date';
                            $conditionValue = date('Y-m-d');
                            $fieldValue = strtotime(date('Y-m-d', strtotime($fieldValue)));
                        }else {
                            $fieldNames = $params[0];
                            if(empty($formData)){
                                $conditionValue = $bean->$fieldNames;
                            }else{
                                if($recordId != ''){
                                    if(!isset($formData[$fieldNames])){
                                        $conditionValue = $recordBean->$fieldNames;
                                    }else{
                                        $conditionValue = $formData[$fieldNames];
                                    }//end of else
                                }else{
                                    $conditionValue = $formData[$fieldNames];
                                }//end of else
                            }//end of else
                            $fieldValue = strtotime(date('Y-m-d H:i',strtotime($fieldValue)));
                        }//end of else

                        if($params[1] != 'now'){
                            switch($params[3]) {
                                case 'business_hours';
                                    if(file_exists('modules/AOBH_BusinessHours/AOBH_BusinessHours.php')){
                                        require_once('modules/AOBH_BusinessHours/AOBH_BusinessHours.php');

                                        $businessHours = new AOBH_BusinessHours();
                                        $amount = $params[2];
                                        if($params[1] != "plus"){
                                            $amount = 0-$amount;
                                        }//end of if
                                        $conditionValue = date('Y-m-d H:i:s', strtotime($conditionValue));
                                        $conditionValue = $businessHours->addBusinessHours($amount, $timedate->fromDb($conditionValue));
                                        $conditionValue = strtotime($timedate->asDbType( $conditionValue, $dateType ));
                                        break;
                                    }//end of if
                                    //No business hours module found - fall through.
                                    $params[3] = 'hours';
                                default:
                                    $conditionValue = strtotime($conditionValue.' '.$app_list_strings['aow_date_operator'][$params[1]]." $params[2] ".$params[3]);
                                    if($dateType == 'date') $conditionValue = strtotime(date('Y-m-d', $conditionValue));
                                    break;
                            }//end of switch
                        }else{
                            $conditionValue = strtotime($conditionValue);
                        }//end of else
                    }else if($valueType == 'Value'){
                        if(($fieldType == 'datetimecombo' || $fieldType == 'datetime') && ($fieldValue != '')){
                            $conditionValue = $timedate->to_display_date_time($conditionValue);
                            $conditionValue = date('Y-m-d H:i', strtotime($conditionValue));//configuration value
                            
                            if(empty($formData)){
                                if($moduleName == 'Documents'){
                                    $fieldDate = date('Y-m-d', strtotime($getDocumentDataRow[$conditionFieldName]));
                                    $hour = date('H', strtotime($getDocumentDataRow[$conditionFieldName]));
                                    $minute = date('i', strtotime($getDocumentDataRow[$conditionFieldName]));
                                }else{
                                    $fieldDate = date('Y-m-d', strtotime($recordBean->$conditionFieldName));
                                    $hour = date('H', strtotime($recordBean->$conditionFieldName));
                                    $minute = date('i', strtotime($recordBean->$conditionFieldName));
                                }//end of else
                                $fieldValue = $fieldDate.' '.$hour.':'.$minute;// record value
                            }else{
                                $fieldValue = date('Y-m-d H:i', strtotime($fieldValue));
                            }//end of else

                        }else if($fieldType == 'date' && $fieldValue != ''){
                            $conditionValue = date('Y-m-d', strtotime($value['value']));
                            if($moduleName == 'Documents' && empty($formData)){
                                $fieldValue = date('Y-m-d',strtotime($getDocumentDataRow[$conditionFieldName])); 
                            }else{
                                $fieldValue = date('Y-m-d', strtotime($fieldValue));
                            }//end of else
                        }else if($fieldType == 'multienum'){
                            $fieldValue = encodeMultienumValue($fieldValue);
                        }else if($fieldType == 'enum'){
                            if($valueType == 'Multi'){
                                $fieldValue = encodeMultienumValue($fieldValue);
                            }//end of if

                            if(empty($formData)){
                                if($moduleName == 'Documents'){
                                    $fieldValue = $getDocumentDataRow[$conditionFieldName]; 
                                }else{
                                    $fieldValue = $recordBean->$conditionFieldName;
                                }//end of else
                            }//end of if
                        }else if($fieldType == 'relate'){
                            if(empty($formData)){
                                $relateFieldName = $fieldDef['id_name']; //id name
                                $fieldValue = $recordBean->$relateFieldName;
                            }//end of if
                        }else if($fieldType == 'id'){
                            if(empty($formData)){
                                $idName = $fieldDef['name']; //id name
                                $fieldValue = $recordBean->$idName;
                            }//end of if
                        }else{
                            $numericValue = str_replace(',', '', $fieldValue);
                            if( is_numeric( $numericValue ) ) {
                                $fieldValue = $numericValue;
                            }//end of if
                        }//end of else
                    }//end of else if

                    $operator = $value['operator'];
                    $dateOperators = array('today', 'is_in_last_7_days', 'is_in_last_30_days', 'is_in_last_60_days', 'is_in_last_90_days', 'is_in_last_120_days', 'is_in_this_week', 'is_in_the_last_week', 'is_in_this_month', 'is_in_the_last_month');
                    if(in_array($operator, $dateOperators)){
                        $conditionValue = date('Y-m-d');
                        $fieldValue = date('Y-m-d', strtotime($fieldValue));
                    }else if($operator == 'tomorrow'){
                        $conditionValue = date("Y-m-d", strtotime("tomorrow"));
                        $fieldValue = date('Y-m-d', strtotime($fieldValue));
                    }else if($operator == 'yesterday'){
                        $conditionValue = date("Y-m-d", strtotime("yesterday"));
                        $fieldValue = date('Y-m-d', strtotime($fieldValue));
                    }//end of else if

                    switch ($operator) {
                        case 'Equal_To':
                            if($fieldValue == $conditionValue && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'Not_Equal_To':
                            if($fieldValue != $conditionValue && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'Contains':
                            if(strpos($fieldValue, $conditionValue) !== false && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'Starts_With':
                            if(fieldsColorStartsWiths($fieldValue, $conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'Ends_With':
                            if(fieldsColorEndsWiths($fieldValue, $conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'Greater_Than':
                            if($fieldValue > $conditionValue && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'Less_Than':
                            if($fieldValue < $conditionValue && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1'; 
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'Greater_Than_or_Equal_To':
                            if($fieldValue >= $conditionValue && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'Less_Than_or_Equal_To':
                            if($fieldValue <= $conditionValue && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_null':
                            if(empty($fieldValue) || $fieldValue == ''){
                                $matchCondition[$conditionType][] = '1';    
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_not_null':
                            if(!empty($fieldValue) || $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';    
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'does_not_contains':
                            if(strpos($fieldValue, $conditionValue) === false && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'today':
                            if(strtotime($fieldValue) == strtotime($conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'tomorrow':
                            if(strtotime($fieldValue) == strtotime($conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'yesterday':
                            if(strtotime($fieldValue) == strtotime($conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_last_7_days':
                            $compareDate = date('Y-m-d', strtotime('-7 days'));
                            if(strtotime($fieldValue) >= strtotime($compareDate) && strtotime($fieldValue) < strtotime($conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_last_30_days':
                            $compareDate = date('Y-m-d', strtotime('-30 days'));
                            if(strtotime($fieldValue) >= strtotime($compareDate) && strtotime($fieldValue) < strtotime($conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_last_60_days':
                            $compareDate = date('Y-m-d', strtotime('-60 days'));
                            if(strtotime($fieldValue) >= strtotime($compareDate) && strtotime($fieldValue) < strtotime($conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_last_90_days':
                            $compareDate = date('Y-m-d', strtotime('-90 days'));
                            if(strtotime($fieldValue) >= strtotime($compareDate) && strtotime($fieldValue) < strtotime($conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_last_120_days':
                            $compareDate = date('Y-m-d', strtotime('-120 days'));
                            if(strtotime($fieldValue) >= strtotime($compareDate) && strtotime($fieldValue) < strtotime($conditionValue) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_this_week':
                            $monday = strtotime("last monday");
                            $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
                            $sunday = strtotime(date("Y-m-d", $monday)." +6 days");
                            $thisWeekSd = date("Y-m-d", $monday);
                            $thisWeekEd = date("Y-m-d", $sunday);
                            if(strtotime($fieldValue) >= strtotime($thisWeekSd) && strtotime($fieldValue) <= strtotime($thisWeekEd) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_the_last_week':
                            $monday = strtotime("last monday");
                            $monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
                            $sunday = strtotime(date("Y-m-d", $monday)." -6 days");
                            $lastWeekEd = date("Y-m-d", $monday);
                            $lastWeekSd = date("Y-m-d", $sunday);
                            if(strtotime($fieldValue) >= strtotime($lastWeekSd) && strtotime($fieldValue) <= strtotime($lastWeekEd) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_this_month':
                            $thisMonthFirstdate = date ('Y-m-d', strtotime ('first day of this month'));
                            $thisMonthLastdate =date ('Y-m-d', strtotime ('last day of this month'));
                            if(strtotime($fieldValue) >= strtotime($thisMonthFirstdate) && strtotime($fieldValue) <= strtotime($thisMonthLastdate) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        case 'is_in_the_last_month':
                            $lastMonthFirstdate = date ('Y-m-d', strtotime ('first day of last month'));
                            $lastMonthLastdate =date ('Y-m-d', strtotime ('last day of last month'));
                            if(strtotime($fieldValue) >= strtotime($lastMonthFirstdate) && strtotime($fieldValue) <= strtotime($lastMonthLastdate) && $fieldValue != ''){
                                $matchCondition[$conditionType][] = '1';
                            }else{
                                $matchCondition[$conditionType][] = '0';
                            }//end of else
                            break;
                        default:
                            echo "";
                            break;
                    }//end of switch
                }//end of if
            }//end of foreach
        }//end of foreach

        if(!empty($matchCondition)){
            if(isset($matchCondition['All'])){
                if(in_array('0', $matchCondition['All'])){
                    $matchAllCondition = '0';
                }else{
                    $matchAllCondition = '1';
                }//end of else
            }else{
                $matchAllCondition = '1';
            }//end of else

            if(isset($matchCondition['Any'])){
                if(in_array('1', $matchCondition['Any'])){
                    $matchAnyCondition = '1';
                }else{
                    $matchAnyCondition = '0';
                }//end of else
            }else{  
                $matchAnyCondition = '1';
            }//end of else
        }//end of if

        if($conditionalOperator == 'AND'){
            if($matchAllCondition == '1' &&  $matchAnyCondition == '1'){
                $matchAllAnyCondition = '1';
            }//end of if
        }else{
            if($matchAllCondition == '1' ||  $matchAnyCondition == '1'){
                $matchAllAnyCondition = '1';
            }//end of if
        }//end of else
    }else{
        $matchAllAnyCondition = '0';
    }//end of else

    return $matchAllAnyCondition;
}//end of function

//startsWiths
function fieldsColorStartsWiths($str, $substr){
    $sl = strlen($str);
    $ssl = strlen($substr);
    if ($sl >= $ssl) {
        if(strpos($str, $substr, 0) === 0){
            return true;
        }//end of if
    }//end of if
}//end of function

//endsWiths
function fieldsColorEndsWiths($str, $subStr) {
    $sl = strlen($str);
    $ssl = strlen($subStr);
    if ($sl >= $ssl) {
        if(substr_compare($str, $subStr, $sl - $ssl, $ssl) == 0){
            return true;
        }//end of if
    }//end of if
}//end of function

//Get Field Color HelpBox Content
function getFieldColorHelpBoxHtml($url){
    global $suitecrm_version, $theme, $current_language;
    
    $helpBoxContent = '';
    $curl = curl_init();

    $postData = json_encode(array('suiteCRMVersion' => $suitecrm_version, 'themeName' => $theme, 'currentLanguage' => $current_language));
    
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false);
    $data = curl_exec($curl);
    $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if($httpCode == 200){
        $helpBoxContent = $data;
    }//end of if
    curl_close($curl);

    return $helpBoxContent;
}//end of function
?>