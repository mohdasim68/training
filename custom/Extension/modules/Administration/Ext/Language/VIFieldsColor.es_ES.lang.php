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
//Admin Link
$mod_strings['LBL_FIELDS_COLOR'] = 'Color de los campos';
$mod_strings['LBL_FIELDS_COLOR_DESCRIPTION'] = 'Administrar el color de los campos para los módulos.';

//License validation
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ACTIVE_LABEL_MESSAGE'] = "VIFieldsColorLicenseAddon ya no está activo por el siguiente motivo:";
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ISSUES'] = "Los usuarios tendrán acceso limitado a ningún acceso hasta que se haya resuelto el problema";
$mod_strings['LBL_CLICK_HERE'] = 'Haga clic aquí';
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_ACTIVE_MESSAGE'] = "VIFieldsColorLicenseAddon ya no está activo";
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_MESSAGE'] = "Renueve su suscripción o verifique la configuración de su licencia.";

//List View
$mod_strings['LBL_UPDATE_LICENSE'] = 'Actualizar licencia';
$mod_strings['LBL_CREATE_MESSAGE'] = 'Actualmente no tiene registros guardados.';
$mod_strings['LBL_CREATE'] = 'CREAR';
$mod_strings['LBL_CREATE_MESSAGE_ONE'] = 'uno ahora';
$mod_strings['LBL_ADD_NEW'] = "+ Agregar nuevo";
$mod_strings['LBL_FIELDS_TO_COLOR'] = 'Campos para colorear';
$mod_strings['LBL_BULK_ACTION'] = 'Acción masiva';
$mod_strings['LBL_ACTIVE'] = 'Activo';
$mod_strings['LBL_INACTIVE'] = 'Inactivo';
$mod_strings['LBL_DELETE'] = 'Borrar';
$mod_strings['LBL_MODULE'] = 'Módulo';
$mod_strings['LBL_DATE_CREATED'] = 'fecha de creacion';
$mod_strings['LBL_DATE_MODIFIED'] = 'Fecha modificada';
$mod_strings['LBL_DELETE_CONFIRM_MESSAGE'] = '¿Estás seguro de que quieres eliminar?';
$mod_strings['LBL_THIS'] = 'esta';
$mod_strings['LBL_THESE'] = 'estas';
$mod_strings['LBL_ROW'] = '¿hilera?';
$mod_strings['LBL_EDIT'] = 'Editar';

//Edit View
//Step 1
$mod_strings['LBL_BACK'] = "Espalda";
$mod_strings['LBL_SAVE'] = 'Salvar';
$mod_strings['LBL_CANCEL'] = 'Cancelar';
$mod_strings['LBL_CLEAR'] = 'Claro';
$mod_strings['LBL_SELECT_MODULE'] = 'Seleccionar módulo';
$mod_strings['LBL_APPLY_CONDITION'] = "Aplicar condición";
$mod_strings['LBL_NEXT'] = 'Siguiente';
$mod_strings['LBL_NAME'] = 'Nombre';
$mod_strings['LBL_SELECT_AN_OPTION'] = 'Seleccione una opción';
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR'] = 'Seleccionar campos para colorear';
$mod_strings['LBL_STATUS'] = 'Estatus';
$mod_strings['LBL_TEXT_COLOR'] = 'Color de texto';
$mod_strings['LBL_BACKGROUND_COLOR'] = 'Color de fondo';
$mod_strings['LBL_RELATED_RECORD_COLOR'] = 'Relacionar Color de registro';
$mod_strings['LBL_COLOR_THE_LABEL'] = 'Colorea la etiqueta';
$mod_strings['LBL_YES'] = 'sí';
$mod_strings['LBL_NO'] = 'No';

//Step 2
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS'] = '<b> Opción 1: todas las condiciones (Y las condiciones entre cada fila de las condiciones) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS'] = '<b> Opción 2: cualquier condición (O condición entre cada fila de condición) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS_MESSAGE'] = 'Especifique las condiciones de cualquier campo del Módulo. Si todas las condiciones coinciden, la función Color de los campos se agrega al Módulo que se selecciona en el Paso 1 (Seleccionar módulo)';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS_MESSAGE'] = 'Especifique las condiciones de cualquier campo del Módulo. Si alguna condición coincide, se agrega la función Color de campos al módulo que se selecciona en el Paso 1 (Seleccionar módulo)';
$mod_strings['LBL_CONDITIONAL_OPERATOR'] = 'Operador condicional :';
$mod_strings['LBL_AND'] = 'Y';
$mod_strings['LBL_OR'] = 'O';
$mod_strings['LBL_ADD_CONDITIONS'] = 'Agregar condiciones';
$mod_strings['LBL_MODULE_PATH'] = 'Módulo Seleccionado';
$mod_strings['LBL_FIELD'] = 'Campo';
$mod_strings['LBL_OPERATOR'] = 'Operador';
$mod_strings['LBL_VALUE_TYPE'] = 'Tipo de valor';
$mod_strings['LBL_VALUE'] = 'Valor';
$mod_strings['LBL_DOES_NOT_CONTAINS'] = 'No contiene';
$mod_strings['LBL_IS_EMPTY'] = 'Esta vacio';
$mod_strings['LBL_IS_NOT_EMPTY'] = 'No está vacío';
$mod_strings['LBL_TODAY'] = 'Hoy dia';
$mod_strings['LBL_TOMORROW'] = 'Mañana';
$mod_strings['LBL_YESTERDAY'] = 'El dia de ayer';
$mod_strings['LBL_IS_IN_LAST_7_DAYS'] = 'Está en los últimos 7 días';
$mod_strings['LBL_IS_IN_LAST_30_DAYS'] = 'Está en los últimos 30 días';
$mod_strings['LBL_IS_IN_LAST_60_DAYS'] = 'Está en los últimos 60 días';
$mod_strings['LBL_IS_IN_LAST_90_DAYS'] = 'Está en los últimos 90 días';
$mod_strings['LBL_IS_IN_LAST_120_DAYS'] = 'Está en los últimos 120 días';
$mod_strings['LBL_IS_IN_THIS_WEEK'] = 'Es en esta semana';
$mod_strings['LBL_IS_IN_THE_LAST_WEEK'] = 'Está en la última semana';
$mod_strings['LBL_IS_IN_THIS_MONTH'] = 'Es en este mes';
$mod_strings['LBL_IS_IN_THE_LAST_MONTH'] = 'Está en el último mes';

//Alert Messages
$mod_strings['LBL_FIELDS_COLOR_NAME_EMPTY_ERROR'] = 'Ingrese el nombre del color de los campos.';
$mod_strings['LBL_SELECT_MODULE_EMPTY_ERROR'] = 'Por favor seleccione Módulo.';
$mod_strings['LBL_FIELDS_COLOR_EMPTY_CONDITIONS_VALIDATION'] = 'Por favor, agregue al menos una condición.';
$mod_strings['LBL_REQUIRED_FIELD_VALIDATION'] = 'Por favor, seleccione / ingrese los campos obligatorios.';
$mod_strings['LBL_FIELDS_COLOR_ACTIVATED'] = "¡La característica de color de los campos se activó correctamente!";
$mod_strings['LBL_FIELDS_COLOR_DEACTIVATED']= "¡La característica de color de los campos se desactivó correctamente!";
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_EMPTY_ERROR'] = 'Por favor, seleccione los campos para colorear.';

//Info Icon Message
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_INFO_MESSAGE'] = "Seleccione los campos a los que desea aplicar la fuente y el color de fondo en Valor de campo según la coincidencia de condición.";
$mod_strings['LBL_COLOR_THE_LABEL_INFO_MESSAGE'] = "Seleccione Sí si desea aplicar el color de fuente en Etiqueta de campo según la coincidencia de condición.";
?>