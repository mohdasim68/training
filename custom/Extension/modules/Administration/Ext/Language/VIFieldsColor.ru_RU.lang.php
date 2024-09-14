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
$mod_strings['LBL_FIELDS_COLOR'] = 'Цвет Поля';
$mod_strings['LBL_FIELDS_COLOR_DESCRIPTION'] = 'Управление цветом полей модулей.';

//License validation
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ACTIVE_LABEL_MESSAGE'] = "VIFieldsColorLicenseAddon больше не активен по следующей причине:";
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ISSUES'] = "Пользователи не будут иметь доступа до тех пор, пока проблема не будет решена.";
$mod_strings['LBL_CLICK_HERE'] = 'Кликните сюда';
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_ACTIVE_MESSAGE'] = "VIFieldsColorLicenseAddon больше не активен";
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_MESSAGE'] = "Продлите подписку или проверьте конфигурацию лицензии.";

//List View
$mod_strings['LBL_UPDATE_LICENSE'] = 'Обновить лицензию';
$mod_strings['LBL_CREATE_MESSAGE'] = 'В настоящее время у вас нет сохраненных записей.';
$mod_strings['LBL_CREATE'] = 'СОЗДАЙТЕ';
$mod_strings['LBL_CREATE_MESSAGE_ONE'] = 'один сейчас';
$mod_strings['LBL_ADD_NEW'] = "+ Добавить новый";
$mod_strings['LBL_FIELDS_TO_COLOR'] = 'Поля для раскрашивания';
$mod_strings['LBL_BULK_ACTION'] = 'Массовое действие';
$mod_strings['LBL_ACTIVE'] = 'Активный';
$mod_strings['LBL_INACTIVE'] = 'Неактивный';
$mod_strings['LBL_DELETE'] = 'Удалить';
$mod_strings['LBL_MODULE'] = 'Модуль';
$mod_strings['LBL_DATE_CREATED'] = 'Дата создания';
$mod_strings['LBL_DATE_MODIFIED'] = 'Дата изменена';
$mod_strings['LBL_DELETE_CONFIRM_MESSAGE'] = 'Вы уверены, что хотите удалить';
$mod_strings['LBL_THIS'] = 'это';
$mod_strings['LBL_THESE'] = 'эти';
$mod_strings['LBL_ROW'] = 'ряд?';
$mod_strings['LBL_EDIT'] = 'Редактировать';

//Edit View
//Step 1
$mod_strings['LBL_BACK'] = "Назад";
$mod_strings['LBL_SAVE'] = 'Сохранить';
$mod_strings['LBL_CANCEL'] = 'Отмена';
$mod_strings['LBL_CLEAR'] = 'Очистить';
$mod_strings['LBL_SELECT_MODULE'] = 'Выбрать модуль';
$mod_strings['LBL_APPLY_CONDITION'] = "Применить условие";
$mod_strings['LBL_NEXT'] = 'Следующий';
$mod_strings['LBL_NAME'] = 'Имя';
$mod_strings['LBL_SELECT_AN_OPTION'] = 'Выберите вариант';
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR'] = 'Выберите поля для раскраски';
$mod_strings['LBL_STATUS'] = 'Положение дел';
$mod_strings['LBL_TEXT_COLOR'] = 'Цвет текста';
$mod_strings['LBL_BACKGROUND_COLOR'] = 'Фоновый цвет';
$mod_strings['LBL_RELATED_RECORD_COLOR'] = 'Связать цвет записи';
$mod_strings['LBL_COLOR_THE_LABEL'] = 'Раскрасьте этикетку';
$mod_strings['LBL_YES'] = 'да';
$mod_strings['LBL_NO'] = 'Нет';

//Step 2
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS'] = '<b> Вариант 1: Все условия (условие И между каждой строкой условия) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS'] = '<b> Вариант 2: любое условие (условие ИЛИ между каждой строкой условия) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS_MESSAGE'] = 'Укажите условия любых полей Модуля. Если все условия совпадают, функция цвета полей добавляется к модулю, который выбран на шаге 1 (Выбрать модуль).';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS_MESSAGE'] = 'Укажите условия любых полей Модуля. Если какое-либо условие соответствует, функция цвета полей добавляется в модуль, который выбран на шаге 1 (Выбрать модуль).';
$mod_strings['LBL_CONDITIONAL_OPERATOR'] = 'Условный оператор :';
$mod_strings['LBL_AND'] = 'А ТАКЖЕ';
$mod_strings['LBL_OR'] = 'ИЛИ';
$mod_strings['LBL_ADD_CONDITIONS'] = 'Добавить условия';
$mod_strings['LBL_MODULE_PATH'] = 'Выбранный модуль';
$mod_strings['LBL_FIELD'] = 'Поле';
$mod_strings['LBL_OPERATOR'] = 'Оператор';
$mod_strings['LBL_VALUE_TYPE'] = 'Тип значения';
$mod_strings['LBL_VALUE'] = 'Ценить';
$mod_strings['LBL_DOES_NOT_CONTAINS'] = 'Не содержит';
$mod_strings['LBL_IS_EMPTY'] = 'Пустой';
$mod_strings['LBL_IS_NOT_EMPTY'] = 'Не пусто';
$mod_strings['LBL_TODAY'] = 'Сегодня';
$mod_strings['LBL_TOMORROW'] = 'Завтра';
$mod_strings['LBL_YESTERDAY'] = 'Вчера';
$mod_strings['LBL_IS_IN_LAST_7_DAYS'] = 'За последние 7 дней';
$mod_strings['LBL_IS_IN_LAST_30_DAYS'] = 'За последние 30 дней';
$mod_strings['LBL_IS_IN_LAST_60_DAYS'] = 'За последние 60 дней';
$mod_strings['LBL_IS_IN_LAST_90_DAYS'] = 'За последние 90 дней';
$mod_strings['LBL_IS_IN_LAST_120_DAYS'] = 'За последние 120 дней';
$mod_strings['LBL_IS_IN_THIS_WEEK'] = 'На этой неделе';
$mod_strings['LBL_IS_IN_THE_LAST_WEEK'] = 'На прошлой неделе';
$mod_strings['LBL_IS_IN_THIS_MONTH'] = 'В этом месяце';
$mod_strings['LBL_IS_IN_THE_LAST_MONTH'] = 'В прошлом месяце';

//Alert Messages
$mod_strings['LBL_FIELDS_COLOR_NAME_EMPTY_ERROR'] = 'Пожалуйста, введите название цвета поля.';
$mod_strings['LBL_SELECT_MODULE_EMPTY_ERROR'] = 'Пожалуйста, выберите модуль.';
$mod_strings['LBL_FIELDS_COLOR_EMPTY_CONDITIONS_VALIDATION'] = 'Добавьте хотя бы одно условие.';
$mod_strings['LBL_REQUIRED_FIELD_VALIDATION'] = 'Пожалуйста, выберите / введите обязательные поля.';
$mod_strings['LBL_FIELDS_COLOR_ACTIVATED'] = "Функция цвета полей успешно активирована !!!";
$mod_strings['LBL_FIELDS_COLOR_DEACTIVATED']= "Функция цвета полей успешно отключена !!!";
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_EMPTY_ERROR'] = 'Выберите поля для раскраски.';

//Info Icon Message
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_INFO_MESSAGE'] = "Выберите поля, для которых вы хотите применить цвет шрифта и фона в поле «Значение поля на основе совпадения условий».";
$mod_strings['LBL_COLOR_THE_LABEL_INFO_MESSAGE'] = "Выберите «Да», если вы хотите применить цвет шрифта в метке поля на основе соответствия условию.";
?>