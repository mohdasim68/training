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
$mod_strings['LBL_FIELDS_COLOR'] = 'Colore campi';
$mod_strings['LBL_FIELDS_COLOR_DESCRIPTION'] = 'Gestisci il colore dei campi per i moduli.';

//License validation
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ACTIVE_LABEL_MESSAGE'] = "VIFieldsColorLicenseAddon non è più attivo per il seguente motivo:";
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ISSUES'] = "Gli utenti avranno accesso limitato o nullo fino a quando il problema non sarà stato risolto";
$mod_strings['LBL_CLICK_HERE'] = 'Clicca qui';
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_ACTIVE_MESSAGE'] = "VIFieldsColorLicenseAddon non è più attivo";
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_MESSAGE'] = "Rinnova l'abbonamento o controlla la configurazione della licenza.";

//List View
$mod_strings['LBL_UPDATE_LICENSE'] = 'Aggiorna licenza';
$mod_strings['LBL_CREATE_MESSAGE'] = 'Al momento non hai record salvati.';
$mod_strings['LBL_CREATE'] = 'CREARE';
$mod_strings['LBL_CREATE_MESSAGE_ONE'] = 'uno adesso';
$mod_strings['LBL_ADD_NEW'] = "+ Aggiungi nuovo";
$mod_strings['LBL_FIELDS_TO_COLOR'] = 'Campi da colorare';
$mod_strings['LBL_BULK_ACTION'] = 'Azione in blocco';
$mod_strings['LBL_ACTIVE'] = 'Attivo';
$mod_strings['LBL_INACTIVE'] = 'Inattivo';
$mod_strings['LBL_DELETE'] = 'Elimina';
$mod_strings['LBL_MODULE'] = 'Modulo';
$mod_strings['LBL_DATE_CREATED'] = 'data di creazione';
$mod_strings['LBL_DATE_MODIFIED'] = 'Data modificata';
$mod_strings['LBL_DELETE_CONFIRM_MESSAGE'] = 'Sei sicuro di voler cancellare';
$mod_strings['LBL_THIS'] = 'questo';
$mod_strings['LBL_THESE'] = 'queste';
$mod_strings['LBL_ROW'] = 'riga?';
$mod_strings['LBL_EDIT'] = 'Modificare';

//Edit View
//Step 1
$mod_strings['LBL_BACK'] = "Di ritorno";
$mod_strings['LBL_SAVE'] = 'Salva';
$mod_strings['LBL_CANCEL'] = 'Annulla';
$mod_strings['LBL_CLEAR'] = 'Chiaro';
$mod_strings['LBL_SELECT_MODULE'] = 'Seleziona modulo';
$mod_strings['LBL_APPLY_CONDITION'] = "Applica condizione";
$mod_strings['LBL_NEXT'] = 'Prossimo';
$mod_strings['LBL_NAME'] = 'Nome';
$mod_strings['LBL_SELECT_AN_OPTION'] = "Seleziona un'opzione";
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR'] = 'Seleziona campi da colorare';
$mod_strings['LBL_STATUS'] = 'Stato';
$mod_strings['LBL_TEXT_COLOR'] = 'Colore del testo';
$mod_strings['LBL_BACKGROUND_COLOR'] = 'Colore di sfondo';
$mod_strings['LBL_RELATED_RECORD_COLOR'] = 'Correla colore record';
$mod_strings['LBL_COLOR_THE_LABEL'] = "Colora l'etichetta";
$mod_strings['LBL_YES'] = 'sì';
$mod_strings['LBL_NO'] = 'No';

//Step 2
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS'] = '<b>Opzione 1: tutte le condizioni (condizione AND tra ogni riga di condizione) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS'] = '<b>Opzione 2: qualsiasi condizione (OR Condizione tra ogni riga di condizione) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS_MESSAGE'] = 'Specificare le condizioni di qualsiasi campo del Modulo. Se tutte le condizioni sono soddisfatte, la funzione Colore campi è stata aggiunta al modulo selezionato nel passaggio 1 (Seleziona modulo)';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS_MESSAGE'] = 'Specificare le condizioni di qualsiasi campo del Modulo. Se una qualsiasi condizione corrispondeva, la funzione Colore campi è stata aggiunta al modulo selezionato nel passaggio 1 (Seleziona modulo)';
$mod_strings['LBL_CONDITIONAL_OPERATOR'] = 'Operatore condizionale :';
$mod_strings['LBL_AND'] = 'E';
$mod_strings['LBL_OR'] = 'O';
$mod_strings['LBL_ADD_CONDITIONS'] = 'Aggiungi condizioni';
$mod_strings['LBL_MODULE_PATH'] = 'Modulo selezionato';
$mod_strings['LBL_FIELD'] = 'Campo';
$mod_strings['LBL_OPERATOR'] = 'Operatore';
$mod_strings['LBL_VALUE_TYPE'] = 'Tipo di valore';
$mod_strings['LBL_VALUE'] = 'Valore';
$mod_strings['LBL_DOES_NOT_CONTAINS'] = 'Non contiene';
$mod_strings['LBL_IS_EMPTY'] = 'È vuoto';
$mod_strings['LBL_IS_NOT_EMPTY'] = 'Non è vuoto';
$mod_strings['LBL_TODAY'] = 'Oggi';
$mod_strings['LBL_TOMORROW'] = 'Domani';
$mod_strings['LBL_YESTERDAY'] = 'Ieri';
$mod_strings['LBL_IS_IN_LAST_7_DAYS'] = 'è negli ultimi 7 giorni';
$mod_strings['LBL_IS_IN_LAST_30_DAYS'] = 'È tra gli ultimi 30 giorni';
$mod_strings['LBL_IS_IN_LAST_60_DAYS'] = 'è negli ultimi 60 giorni';
$mod_strings['LBL_IS_IN_LAST_90_DAYS'] = 'È negli ultimi 90 giorni';
$mod_strings['LBL_IS_IN_LAST_120_DAYS'] = 'è negli ultimi 120 giorni';
$mod_strings['LBL_IS_IN_THIS_WEEK'] = 'è in questa settimana';
$mod_strings['LBL_IS_IN_THE_LAST_WEEK'] = "è nell'ultima settimana";
$mod_strings['LBL_IS_IN_THIS_MONTH'] = 'è in questo mese';
$mod_strings['LBL_IS_IN_THE_LAST_MONTH'] = "È nell'ultimo mese";

//Alert Messages
$mod_strings['LBL_FIELDS_COLOR_NAME_EMPTY_ERROR'] = 'Inserisci il nome del colore nei campi.';
$mod_strings['LBL_SELECT_MODULE_EMPTY_ERROR'] = 'Seleziona modulo.';
$mod_strings['LBL_FIELDS_COLOR_EMPTY_CONDITIONS_VALIDATION'] = 'Si prega di aggiungere almeno una condizione.';
$mod_strings['LBL_REQUIRED_FIELD_VALIDATION'] = 'Si prega di selezionare/inserire i campi obbligatori.';
$mod_strings['LBL_FIELDS_COLOR_ACTIVATED'] = "Caratteristica colore campi attivata con successo!!!";
$mod_strings['LBL_FIELDS_COLOR_DEACTIVATED']= "Caratteristica del colore dei campi disattivata con successo!!!";
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_EMPTY_ERROR'] = 'Si prega di selezionare i campi da colorare.';

//Info Icon Message
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_INFO_MESSAGE'] = "Seleziona i campi per i quali desideri applicare il carattere e il colore di sfondo in Valore campo in base alla corrispondenza della condizione.";
$mod_strings['LBL_COLOR_THE_LABEL_INFO_MESSAGE'] = "Selezionare Sì se si desidera applicare il colore del carattere nell'etichetta del campo in base alla corrispondenza delle condizioni.";
?>