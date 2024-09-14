<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');


$json = file_get_contents('php://input');
$data = json_decode($json);

$itemName = $data->query;
$moduleName = $data->module;

$returnData = [];

if ($moduleName == "contacts"){

    $query = "SELECT id, first_name, last_name FROM $moduleName WHERE (first_name LIKE '%$itemName%' OR last_name LIKE '%$itemName%') AND deleted = 0 ORDER BY first_name ASC LIMIT 50";
    $resultFields = $GLOBALS['db']->query($query);

    while($rowFields = $GLOBALS['db']->fetchByAssoc($resultFields)){

        $fullName = $rowFields['first_name'] . " " . $rowFields['last_name'];

        $returnData[] = array("id"=>$rowFields['id'], "name"=>$fullName);
    }


}

if ($moduleName == "ldz_leadz" || $moduleName == "jw_projects"){

    $moduleCstm = $moduleName . "_cstm"; 

    $orderBy = "name";

    if ($moduleName == "ldz_leadz"){

        $searchTerm = "leadz_number_c";
        if ( is_numeric( substr($itemName, 0,3) ) ){
            $orderBy = $searchTerm;
        }

    }else{

        $searchTerm = "project_number_c";
        if ( is_numeric( substr($itemName, 0,3) ) ){
            $orderBy = $searchTerm;
        }
    }


    $query = "SELECT id, name, $searchTerm FROM $moduleName, $moduleCstm WHERE (name LIKE '%$itemName%' OR $searchTerm LIKE '%$itemName%') AND id = id_c AND deleted = 0 ORDER BY $orderBy ASC LIMIT 50 ";
    $resultFields = $GLOBALS['db']->query($query);

    while($rowFields = $GLOBALS['db']->fetchByAssoc($resultFields)){

        $combined = $rowFields[$searchTerm] . ":" . $rowFields['name'];
        $returnData[] = array("id"=>$rowFields['id'], "name"=>$combined);
    }



}

if ($moduleName == "leads") {

    $moduleCstm = $moduleName . "_cstm"; 

    $orderBy = "first_name";

    $searchTerm = "form_number_c";
  
    if ( is_numeric( substr($itemName, 0,3) ) ){
            $orderBy = $searchTerm;
        
    }


    $query = "SELECT id, first_name, last_name, $searchTerm FROM $moduleName, $moduleCstm WHERE (first_name LIKE '%$itemName%' OR last_name LIKE '%$itemName%' OR $searchTerm LIKE '%$itemName%')  AND id = id_c AND deleted = 0 ORDER BY $orderBy ASC LIMIT 50 ";
    $resultFields = $GLOBALS['db']->query($query);

     while($rowFields = $GLOBALS['db']->fetchByAssoc($resultFields)){

        $fullName = $rowFields['first_name'] . " " . $rowFields['last_name'];
        $combined = $rowFields[$searchTerm] . ":" . $fullName;
        $returnData[] = array("id"=>$rowFields['id'], "name"=>$combined);
    }

}

if ($moduleName != "leads" && $moduleName == "ldz_leadz" && $moduleName == "jw_projects" && $moduleName != "contacts" ){

    $query = "SELECT id, name FROM $moduleName WHERE name LIKE '%$itemName%' AND deleted = 0 ORDER BY name ASC LIMIT 50 ";
    $resultFields = $GLOBALS['db']->query($query);

    while($rowFields = $GLOBALS['db']->fetchByAssoc($resultFields)){
        $returnData[] = array("id"=>$rowFields['id'], "name"=>$rowFields['name']);
    }

}

echo json_encode($returnData);
