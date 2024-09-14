<?php 
 $GLOBALS["dictionary"]["BOARD"]=array (
  'table' => 'board',
  'audited' => false,
  'inline_edit' => true,
  'duplicate_merge' => true,
  'fields' => 
  array (
    'id' => 
    array (
      'name' => 'id',
      'vname' => 'LBL_ID',
      'type' => 'id',
      'required' => true,
      'reportable' => true,
      'comment' => 'Unique identifier',
      'inline_edit' => false,
    ),
    'config' => 
    array (
      'name' => 'config',
      'vname' => 'LBL_CONFIG',
      'type' => 'text',
      'comment' => '',
      'rows' => 6,
      'cols' => 80,
    ),
  ),
  'relationships' => 
  array (
  ),
  'optimistic_locking' => true,
  'unified_search' => true,
  'custom_fields' => false,
);