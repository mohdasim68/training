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
$mod_strings['LBL_FIELDS_COLOR'] = 'Couleur des champs';
$mod_strings['LBL_FIELDS_COLOR_DESCRIPTION'] = 'Gérer la couleur des champs pour les modules.';

//License validation
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ACTIVE_LABEL_MESSAGE'] = "VIFieldsColorLicenseAddon n'est plus actif pour la raison suivante:";
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ISSUES'] = "Les utilisateurs auront un accès limité ou nul jusqu'à ce que le problème soit résolu";
$mod_strings['LBL_CLICK_HERE'] = 'Cliquez ici';
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_ACTIVE_MESSAGE'] = "VIFieldsColorLicenseAddon n'est plus actif";
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_MESSAGE'] = "Veuillez renouveler votre abonnement ou vérifier la configuration de votre licence.";

//List View
$mod_strings['LBL_UPDATE_LICENSE'] = 'Mettre à jour la licence';
$mod_strings['LBL_CREATE_MESSAGE'] = "Vous n'avez actuellement aucun enregistrement enregistré.";
$mod_strings['LBL_CREATE'] = 'CRÉER';
$mod_strings['LBL_CREATE_MESSAGE_ONE'] = 'un maintenant';
$mod_strings['LBL_ADD_NEW'] = "+ Ajouter un nouveau";
$mod_strings['LBL_FIELDS_TO_COLOR'] = 'Champs à colorer';
$mod_strings['LBL_BULK_ACTION'] = 'Action en masse';
$mod_strings['LBL_ACTIVE'] = 'actif';
$mod_strings['LBL_INACTIVE'] = 'Inactif';
$mod_strings['LBL_DELETE'] = 'Supprimez';
$mod_strings['LBL_MODULE'] = 'Module';
$mod_strings['LBL_DATE_CREATED'] = 'date créée';
$mod_strings['LBL_DATE_MODIFIED'] = 'Date modifiée';
$mod_strings['LBL_DELETE_CONFIRM_MESSAGE'] = 'Voulez-vous vraiment supprimer';
$mod_strings['LBL_THIS'] = 'cette';
$mod_strings['LBL_THESE'] = 'ces';
$mod_strings['LBL_ROW'] = 'ligne?';
$mod_strings['LBL_EDIT'] = 'Éditer';

//Edit View
//Step 1
$mod_strings['LBL_BACK'] = "Arrière";
$mod_strings['LBL_SAVE'] = 'Enregistrer';
$mod_strings['LBL_CANCEL'] = 'Annuler';
$mod_strings['LBL_CLEAR'] = 'Dégager';
$mod_strings['LBL_SELECT_MODULE'] = 'Sélectionnez un module';
$mod_strings['LBL_APPLY_CONDITION'] = "Appliquer la condition";
$mod_strings['LBL_NEXT'] = 'Prochain';
$mod_strings['LBL_NAME'] = 'Nom';
$mod_strings['LBL_SELECT_AN_OPTION'] = 'Sélectionner une option';
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR'] = 'Sélectionnez les champs à colorier';
$mod_strings['LBL_STATUS'] = 'Statut';
$mod_strings['LBL_TEXT_COLOR'] = 'Couleur du texte';
$mod_strings['LBL_BACKGROUND_COLOR'] = "Couleur de l'arrière plan";
$mod_strings['LBL_RELATED_RECORD_COLOR'] = "Relier la couleur de l'enregistrement";
$mod_strings['LBL_COLOR_THE_LABEL'] = "Colorez l'étiquette";
$mod_strings['LBL_YES'] = 'Oui';
$mod_strings['LBL_NO'] = 'Non';

//Step 2
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS'] = '<b>Option 1 : Toutes les conditions (ET Condition entre chaque ligne de Condition) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS'] = '<b>Option 2 : Toute condition (OU Condition entre chaque ligne de Condition) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS_MESSAGE'] = "Spécifiez les conditions de tous les champs du module. Si toutes les conditions correspondent, la fonction de couleur des champs est ajoutée au module sélectionné à l'étape 1 (sélectionner le module)";
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS_MESSAGE'] = "Spécifiez les conditions de tous les champs du module. Si une condition correspondait, la fonction de couleur des champs a été ajoutée au module sélectionné à l'étape 1 (Sélectionner le module)";
$mod_strings['LBL_CONDITIONAL_OPERATOR'] = 'Opérateur conditionnel :';
$mod_strings['LBL_AND'] = 'ET';
$mod_strings['LBL_OR'] = 'OU';
$mod_strings['LBL_ADD_CONDITIONS'] = 'Ajouter des conditions';
$mod_strings['LBL_MODULE_PATH'] = 'Module sélectionné';
$mod_strings['LBL_FIELD'] = 'Champ';
$mod_strings['LBL_OPERATOR'] = 'Opérateur';
$mod_strings['LBL_VALUE_TYPE'] = 'Type de valeur';
$mod_strings['LBL_VALUE'] = 'Valeur';
$mod_strings['LBL_DOES_NOT_CONTAINS'] = 'Ne contient pas';
$mod_strings['LBL_IS_EMPTY'] = 'Est vide';
$mod_strings['LBL_IS_NOT_EMPTY'] = "N'est pas vide";
$mod_strings['LBL_TODAY'] = "Aujourd'hui";
$mod_strings['LBL_TOMORROW'] = 'Demain';
$mod_strings['LBL_YESTERDAY'] = 'Hier';
$mod_strings['LBL_IS_IN_LAST_7_DAYS'] = 'Est dans les 7 derniers jours';
$mod_strings['LBL_IS_IN_LAST_30_DAYS'] = 'Est dans les 30 derniers jours';
$mod_strings['LBL_IS_IN_LAST_60_DAYS'] = 'Est dans les 60 derniers jours';
$mod_strings['LBL_IS_IN_LAST_90_DAYS'] = 'Est dans les 90 derniers jours';
$mod_strings['LBL_IS_IN_LAST_120_DAYS'] = 'Est dans les 120 derniers jours';
$mod_strings['LBL_IS_IN_THIS_WEEK'] = 'Est dans cette semaine';
$mod_strings['LBL_IS_IN_THE_LAST_WEEK'] = 'est dans la semaine dernière';
$mod_strings['LBL_IS_IN_THIS_MONTH'] = 'Est dans ce mois';
$mod_strings['LBL_IS_IN_THE_LAST_MONTH'] = 'Est dans le dernier mois';

//Alert Messages
$mod_strings['LBL_FIELDS_COLOR_NAME_EMPTY_ERROR'] = 'Veuillez saisir le nom de la couleur des champs.';
$mod_strings['LBL_SELECT_MODULE_EMPTY_ERROR'] = 'Veuillez sélectionner un module.';
$mod_strings['LBL_FIELDS_COLOR_EMPTY_CONDITIONS_VALIDATION'] = 'Veuillez ajouter au moins une condition.';
$mod_strings['LBL_REQUIRED_FIELD_VALIDATION'] = 'Veuillez sélectionner/entrer les champs obligatoires.';
$mod_strings['LBL_FIELDS_COLOR_ACTIVATED'] = "Fonctionnalité de couleur des champs activée avec succès !!!";
$mod_strings['LBL_FIELDS_COLOR_DEACTIVATED']= "Fonctionnalité de couleur des champs désactivée avec succès !!!";
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_EMPTY_ERROR'] = 'Veuillez sélectionner les champs à colorier.';

//Info Icon Message
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_INFO_MESSAGE'] = "Sélectionnez les champs pour lesquels vous souhaitez appliquer la police et la couleur d'arrière-plan dans Valeur du champ en fonction de la correspondance de la condition.";
$mod_strings['LBL_COLOR_THE_LABEL_INFO_MESSAGE'] = "Sélectionnez Oui si vous souhaitez appliquer la couleur de police dans l'étiquette de champ en fonction de la correspondance de la condition.";
?>