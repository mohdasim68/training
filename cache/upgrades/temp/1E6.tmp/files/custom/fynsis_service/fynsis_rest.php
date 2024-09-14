<?php

 
    // allow this file to be an entry point
    if(!defined('sugarEntry')) define('sugarEntry', true);
 
    // change to entry normal entry point directory
    chdir('../../');
 
    // the name of the class that will inherit from Sugar's SugarRestService
    $webservice_class = 'FynsisRestService';
 
    // where this class is defined - though really we can use the original SugarRestService
    $webservice_path = 'custom/fynsis_service/FynsisRestService.php';
 
    // the name of the class that will inherit from Sugar's SugarRestServiceImp
    // this will be the class that holds any new methods we want to define for the web service
    $webservice_impl_class = 'FynsisRestServiceImpl';
 
    // where this implmentation class resides
    $webservice_impl_class_path = 'custom/fynsis_service/FynsisRestServiceImpl.php';
 
    // variable etc needed by all web services to get started
    $registry_class = 'registry';
    $location = '/custom/service/fynsis_rest.php';
    $registry_path = 'service/v4_1/registry.php';
 
    require_once('service/core/webservice.php');
 
?>