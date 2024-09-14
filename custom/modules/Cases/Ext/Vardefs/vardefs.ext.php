<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2024-08-20 17:42:22
$dictionary["Case"]["fields"]["cases_aos_contracts_1"] = array (
  'name' => 'cases_aos_contracts_1',
  'type' => 'link',
  'relationship' => 'cases_aos_contracts_1',
  'source' => 'non-db',
  'module' => 'AOS_Contracts',
  'bean_name' => 'AOS_Contracts',
  'vname' => 'LBL_CASES_AOS_CONTRACTS_1_FROM_AOS_CONTRACTS_TITLE',
);


// created: 2024-08-20 16:00:57
$dictionary["Case"]["fields"]["leads_cases_1"] = array (
  'name' => 'leads_cases_1',
  'type' => 'link',
  'relationship' => 'leads_cases_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'vname' => 'LBL_LEADS_CASES_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_cases_1leads_ida',
);
$dictionary["Case"]["fields"]["leads_cases_1_name"] = array (
  'name' => 'leads_cases_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_CASES_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_cases_1leads_ida',
  'link' => 'leads_cases_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Case"]["fields"]["leads_cases_1leads_ida"] = array (
  'name' => 'leads_cases_1leads_ida',
  'type' => 'link',
  'relationship' => 'leads_cases_1',
  'source' => 'non-db',
  'reportable' => false,
  'side' => 'right',
  'vname' => 'LBL_LEADS_CASES_1_FROM_CASES_TITLE',
);


 // created: 2023-05-31 19:10:04
$dictionary['Case']['fields']['jjwg_maps_address_c']['inline_edit']=1;

 

 // created: 2023-05-31 19:10:04
$dictionary['Case']['fields']['jjwg_maps_geocode_status_c']['inline_edit']=1;

 

 // created: 2023-05-31 19:10:03
$dictionary['Case']['fields']['jjwg_maps_lat_c']['inline_edit']=1;

 

 // created: 2023-05-31 19:10:03
$dictionary['Case']['fields']['jjwg_maps_lng_c']['inline_edit']=1;

 
?>