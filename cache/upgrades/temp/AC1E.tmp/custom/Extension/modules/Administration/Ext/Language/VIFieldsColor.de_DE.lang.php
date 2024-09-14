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
$mod_strings['LBL_FIELDS_COLOR'] = 'Feldfarbe';
$mod_strings['LBL_FIELDS_COLOR_DESCRIPTION'] = 'Feldfarbe für Module verwalten.';

//License validation
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ACTIVE_LABEL_MESSAGE'] = "VIFieldsColorLicenseAddon ist aus folgendem Grund nicht mehr aktiv:";
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ISSUES'] = "Benutzer haben keinen Zugriff, bis das Problem behoben ist";
$mod_strings['LBL_CLICK_HERE'] = 'Klicken Sie hier';
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_ACTIVE_MESSAGE'] = "VIFieldsColorLicenseAddon ist nicht mehr aktiv";
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_MESSAGE'] = "Bitte erneuern Sie Ihr Abonnement oder überprüfen Sie Ihre Lizenzkonfiguration.";

//List View
$mod_strings['LBL_UPDATE_LICENSE'] = 'Lizenz aktualisieren';
$mod_strings['LBL_CREATE_MESSAGE'] = 'Sie haben derzeit keine Datensätze gespeichert.';
$mod_strings['LBL_CREATE'] = 'SCHAFFEN';
$mod_strings['LBL_CREATE_MESSAGE_ONE'] = 'Eine jetzt';
$mod_strings['LBL_ADD_NEW'] = "+ Neu hinzufügen";
$mod_strings['LBL_FIELDS_TO_COLOR'] = 'Felder zum Einfärben';
$mod_strings['LBL_BULK_ACTION'] = 'Bulk-Aktion';
$mod_strings['LBL_ACTIVE'] = 'Aktiv';
$mod_strings['LBL_INACTIVE'] = 'Inaktiv';
$mod_strings['LBL_DELETE'] = 'Löschen';
$mod_strings['LBL_MODULE'] = 'Modul';
$mod_strings['LBL_DATE_CREATED'] = 'Datum erstellt';
$mod_strings['LBL_DATE_MODIFIED'] = 'Datum geändert';
$mod_strings['LBL_DELETE_CONFIRM_MESSAGE'] = 'Möchten Sie wirklich löschen?';
$mod_strings['LBL_THIS'] = 'Dies';
$mod_strings['LBL_THESE'] = 'diese';
$mod_strings['LBL_ROW'] = 'Reihe?';
$mod_strings['LBL_EDIT'] = 'Bearbeiten';

//Edit View
//Step 1
$mod_strings['LBL_BACK'] = "Zurück";
$mod_strings['LBL_SAVE'] = 'Sparen';
$mod_strings['LBL_CANCEL'] = 'Stornieren';
$mod_strings['LBL_CLEAR'] = 'Klar';
$mod_strings['LBL_SELECT_MODULE'] = 'Modul auswählen';
$mod_strings['LBL_APPLY_CONDITION'] = "Bedingung anwenden";
$mod_strings['LBL_NEXT'] = 'Nächste';
$mod_strings['LBL_NAME'] = 'Name';
$mod_strings['LBL_SELECT_AN_OPTION'] = 'Wähle eine Option';
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR'] = 'Wählen Sie Felder zum Färben';
$mod_strings['LBL_STATUS'] = 'Status';
$mod_strings['LBL_TEXT_COLOR'] = 'Textfarbe';
$mod_strings['LBL_BACKGROUND_COLOR'] = 'Hintergrundfarbe';
$mod_strings['LBL_RELATED_RECORD_COLOR'] = 'Datensatzfarbe verknüpfen';
$mod_strings['LBL_COLOR_THE_LABEL'] = 'Färben Sie das Etikett';
$mod_strings['LBL_YES'] = 'ja';
$mod_strings['LBL_NO'] = 'Kein';

//Step 2
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS'] = '<b>Option 1: Alle Bedingung (UND-Bedingung zwischen jeder Bedingungszeile) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS'] = '<b>Option 2: Beliebige Bedingung (ODER-Bedingung zwischen jeder Bedingungszeile) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS_MESSAGE'] = 'Geben Sie die Bedingungen für alle Felder des Moduls an. Wenn alle Bedingungen erfüllt sind, wird die Funktion "Feldfarbe" zum Modul hinzugefügt, das in Schritt 1 (Modul auswählen) ausgewählt wurde.';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS_MESSAGE'] = 'Geben Sie die Bedingungen für alle Felder des Moduls an. Wenn eine Bedingung erfüllt ist, wird die Funktion "Feldfarbe" zum Modul hinzugefügt, das in Schritt 1 (Modul auswählen) ausgewählt wurde.';
$mod_strings['LBL_CONDITIONAL_OPERATOR'] = 'Bedingter Operator :';
$mod_strings['LBL_AND'] = 'UND';
$mod_strings['LBL_OR'] = 'ODER';
$mod_strings['LBL_ADD_CONDITIONS'] = 'Bedingungen hinzufügen';
$mod_strings['LBL_MODULE_PATH'] = 'Ausgewähltes Modul';
$mod_strings['LBL_FIELD'] = 'Feld';
$mod_strings['LBL_OPERATOR'] = 'Operator';
$mod_strings['LBL_VALUE_TYPE'] = 'Werttyp';
$mod_strings['LBL_VALUE'] = 'Wert';
$mod_strings['LBL_DOES_NOT_CONTAINS'] = 'Enthält nicht';
$mod_strings['LBL_IS_EMPTY'] = 'Ist leer';
$mod_strings['LBL_IS_NOT_EMPTY'] = 'Ist nicht leer';
$mod_strings['LBL_TODAY'] = 'Heute';
$mod_strings['LBL_TOMORROW'] = 'Morgen';
$mod_strings['LBL_YESTERDAY'] = 'Gestern';
$mod_strings['LBL_IS_IN_LAST_7_DAYS'] = 'Ist in den letzten 7 Tagen';
$mod_strings['LBL_IS_IN_LAST_30_DAYS'] = 'Ist in den letzten 30 Tagen';
$mod_strings['LBL_IS_IN_LAST_60_DAYS'] = 'Ist in den letzten 60 Tagen';
$mod_strings['LBL_IS_IN_LAST_90_DAYS'] = 'Ist in den letzten 90 Tagen';
$mod_strings['LBL_IS_IN_LAST_120_DAYS'] = 'Ist in den letzten 120 Tagen';
$mod_strings['LBL_IS_IN_THIS_WEEK'] = 'Ist in dieser Woche';
$mod_strings['LBL_IS_IN_THE_LAST_WEEK'] = 'Ist in der Letzten Woche';
$mod_strings['LBL_IS_IN_THIS_MONTH'] = 'Ist in diesem Monat';
$mod_strings['LBL_IS_IN_THE_LAST_MONTH'] = 'Ist im letzten Monat';

//Alert Messages
$mod_strings['LBL_FIELDS_COLOR_NAME_EMPTY_ERROR'] = 'Bitte geben Sie den Farbnamen der Felder ein.';
$mod_strings['LBL_SELECT_MODULE_EMPTY_ERROR'] = 'Bitte Modul auswählen.';
$mod_strings['LBL_FIELDS_COLOR_EMPTY_CONDITIONS_VALIDATION'] = 'Bitte fügen Sie mindestens eine Bedingung hinzu.';
$mod_strings['LBL_REQUIRED_FIELD_VALIDATION'] = 'Bitte wählen Sie die erforderlichen Felder aus/geben Sie sie ein.';
$mod_strings['LBL_FIELDS_COLOR_ACTIVATED'] = "Fields Color Feature erfolgreich aktiviert!!!";
$mod_strings['LBL_FIELDS_COLOR_DEACTIVATED']= "Fields Color Feature erfolgreich deaktiviert!!!";
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_EMPTY_ERROR'] = 'Bitte Felder zum Färben auswählen.';

//Info Icon Message
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_INFO_MESSAGE'] = "Wählen Sie die Felder aus, für die Sie die Schrift- und Hintergrundfarbe in Feldwert basierend auf Bedingungsübereinstimmung anwenden möchten.";
$mod_strings['LBL_COLOR_THE_LABEL_INFO_MESSAGE'] = "Wählen Sie Ja aus, wenn Sie die Schriftfarbe in Feldbeschriftung basierend auf Bedingungsübereinstimmung anwenden möchten.";
?>