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
$mod_strings['LBL_FIELDS_COLOR'] = 'Mezők színe';
$mod_strings['LBL_FIELDS_COLOR_DESCRIPTION'] = 'A modulok mezőinek színének kezelése.';

//License validation
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ACTIVE_LABEL_MESSAGE'] = "A VIFieldsColorLicenseAddon a következő ok miatt már nem aktív:";
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ISSUES'] = "A felhasználók hozzáférése korlátozott lesz, amíg a problémát meg nem oldják";
$mod_strings['LBL_CLICK_HERE'] = 'Kattints ide';
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_ACTIVE_MESSAGE'] = "A VIFieldsColorLicenseAddon már nem aktív";
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_MESSAGE'] = "Kérjük, újítsa meg előfizetését, vagy ellenőrizze a licenckonfigurációt.";

//List View
$mod_strings['LBL_UPDATE_LICENSE'] = 'Licenc frissítése';
$mod_strings['LBL_CREATE_MESSAGE'] = 'Jelenleg nincs mentett rekordja.';
$mod_strings['LBL_CREATE'] = 'TEREMT';
$mod_strings['LBL_CREATE_MESSAGE_ONE'] = 'most egyet';
$mod_strings['LBL_ADD_NEW'] = "+ Új hozzáadása";
$mod_strings['LBL_FIELDS_TO_COLOR'] = 'Mezők Színezni';
$mod_strings['LBL_BULK_ACTION'] = 'Tömeges akció';
$mod_strings['LBL_ACTIVE'] = 'Aktív';
$mod_strings['LBL_INACTIVE'] = 'Inaktív';
$mod_strings['LBL_DELETE'] = 'Töröl';
$mod_strings['LBL_MODULE'] = 'Modul';
$mod_strings['LBL_DATE_CREATED'] = 'Létrehozás dátuma';
$mod_strings['LBL_DATE_MODIFIED'] = 'Módosítás dátuma';
$mod_strings['LBL_DELETE_CONFIRM_MESSAGE'] = 'Biztosan törölni szeretné?';
$mod_strings['LBL_THIS'] = 'ez';
$mod_strings['LBL_THESE'] = 'ezek';
$mod_strings['LBL_ROW'] = 'sor?';
$mod_strings['LBL_EDIT'] = 'Szerkesztés';

//Edit View
//Step 1
$mod_strings['LBL_BACK'] = "Vissza";
$mod_strings['LBL_SAVE'] = 'Megment';
$mod_strings['LBL_CANCEL'] = 'Megszünteti';
$mod_strings['LBL_CLEAR'] = 'Egyértelmű';
$mod_strings['LBL_SELECT_MODULE'] = 'Válassza a Modul lehetőséget';
$mod_strings['LBL_APPLY_CONDITION'] = "Feltétel alkalmazása";
$mod_strings['LBL_NEXT'] = 'Következő';
$mod_strings['LBL_NAME'] = 'Név';
$mod_strings['LBL_SELECT_AN_OPTION'] = 'Válasszon egy Opciót';
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR'] = 'Válassza a Színezendő mezők lehetőséget';
$mod_strings['LBL_STATUS'] = 'Állapot';
$mod_strings['LBL_TEXT_COLOR'] = 'Szöveg szín';
$mod_strings['LBL_BACKGROUND_COLOR'] = 'Háttérszín';
$mod_strings['LBL_RELATED_RECORD_COLOR'] = 'A felvétel színének összekapcsolása';
$mod_strings['LBL_COLOR_THE_LABEL'] = 'Színezd ki a címkét';
$mod_strings['LBL_YES'] = 'Igen';
$mod_strings['LBL_NO'] = 'Nem';

//Step 2
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS'] = '<b>1. lehetőség: Minden feltétel (ÉS feltétel a Feltétel egyes sorai között) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS'] = '<b>2. lehetőség : Bármilyen feltétel (VAGY Feltétel a Feltétel egyes sorai között) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS_MESSAGE'] = 'Adja meg a Modul bármely mezőjének feltételeit. Ha minden feltétel megegyezett, akkor a Mezők színe funkció hozzáadva a modulhoz, amelyet az 1. lépésben (Modul kiválasztása) választottunk ki.';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS_MESSAGE'] = 'Adja meg a Modul bármely mezőjének feltételeit. Ha bármely feltétel megfelelt, akkor a Mezők színe funkció hozzáadva a modulhoz, amelyet az 1. lépésben (Modul kiválasztása) választottunk ki.';
$mod_strings['LBL_CONDITIONAL_OPERATOR'] = 'Feltételes kezelő :';
$mod_strings['LBL_AND'] = 'ÉS';
$mod_strings['LBL_OR'] = 'VAGY';
$mod_strings['LBL_ADD_CONDITIONS'] = 'Feltételek hozzáadása';
$mod_strings['LBL_MODULE_PATH'] = 'Kiválasztott modul';
$mod_strings['LBL_FIELD'] = 'Mező';
$mod_strings['LBL_OPERATOR'] = 'Kezelő';
$mod_strings['LBL_VALUE_TYPE'] = 'Érték tipusa';
$mod_strings['LBL_VALUE'] = 'Érték';
$mod_strings['LBL_DOES_NOT_CONTAINS'] = 'Nem tartalmaz';
$mod_strings['LBL_IS_EMPTY'] = 'Üres';
$mod_strings['LBL_IS_NOT_EMPTY'] = 'Nem Üres';
$mod_strings['LBL_TODAY'] = 'Ma';
$mod_strings['LBL_TOMORROW'] = 'Holnap';
$mod_strings['LBL_YESTERDAY'] = 'Tegnap';
$mod_strings['LBL_IS_IN_LAST_7_DAYS'] = 'Az elmúlt 7 napban van';
$mod_strings['LBL_IS_IN_LAST_30_DAYS'] = 'Az elmúlt 30 napban van';
$mod_strings['LBL_IS_IN_LAST_60_DAYS'] = 'Az elmúlt 60 napban van';
$mod_strings['LBL_IS_IN_LAST_90_DAYS'] = 'Az elmúlt 90 napban van';
$mod_strings['LBL_IS_IN_LAST_120_DAYS'] = 'Az elmúlt 120 napban van';
$mod_strings['LBL_IS_IN_THIS_WEEK'] = 'Ezen a héten';
$mod_strings['LBL_IS_IN_THE_LAST_WEEK'] = 'A múlt héten van';
$mod_strings['LBL_IS_IN_THIS_MONTH'] = 'Ebben a hónapban van';
$mod_strings['LBL_IS_IN_THE_LAST_MONTH'] = 'Az utolsó hónapban van';

//Alert Messages
$mod_strings['LBL_FIELDS_COLOR_NAME_EMPTY_ERROR'] = 'Kérjük, adja meg a mezők színének nevét.';
$mod_strings['LBL_SELECT_MODULE_EMPTY_ERROR'] = 'Kérjük, válassza a Modul lehetőséget.';
$mod_strings['LBL_FIELDS_COLOR_EMPTY_CONDITIONS_VALIDATION'] = 'Kérjük, adjon meg legalább egy feltételt.';
$mod_strings['LBL_REQUIRED_FIELD_VALIDATION'] = 'Kérjük, válassza ki/adja meg a kötelező mezőket.';
$mod_strings['LBL_FIELDS_COLOR_ACTIVATED'] = "A Fields Color funkció sikeresen aktiválva!!!";
$mod_strings['LBL_FIELDS_COLOR_DEACTIVATED']= "A mezők színfunkciója sikeresen deaktiválva!!!";
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_EMPTY_ERROR'] = 'Kérjük, válassza ki a kiszínezendő mezőket.';

//Info Icon Message
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_INFO_MESSAGE'] = "Válassza ki azokat a mezőket, amelyekhez alkalmazni szeretné a betűtípust és a háttérszínt a Mezőérték mezőben a Feltételegyezés alapján.";
$mod_strings['LBL_COLOR_THE_LABEL_INFO_MESSAGE'] = "Válassza az Igen lehetőséget, ha a Mezőcímke betűszínét a feltételegyezés alapján szeretné alkalmazni.";
?>