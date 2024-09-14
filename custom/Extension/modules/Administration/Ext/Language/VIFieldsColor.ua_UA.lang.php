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
$mod_strings['LBL_FIELDS_COLOR'] = 'Колір полів';
$mod_strings['LBL_FIELDS_COLOR_DESCRIPTION'] = 'Керування кольором полів для модулів.';

//License validation
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ACTIVE_LABEL_MESSAGE'] = "VIFieldsColorLicenseAddon більше не активний з таких причин:";
$mod_strings['LBL_FIELDS_COLOR_LICENCE_ISSUES'] = "Користувачі матимуть обмежений доступ, доки проблему не буде вирішено";
$mod_strings['LBL_CLICK_HERE'] = 'Натисніть тут';
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_ACTIVE_MESSAGE'] = "VIFieldsColorLicenseAddon більше не активний";
$mod_strings['LBL_FIELDS_COLOR_RENEW_LICENCE_MESSAGE'] = "Поновіть підписку або перевірте конфігурацію ліцензії.";

//List View
$mod_strings['LBL_UPDATE_LICENSE'] = 'Оновити ліцензію';
$mod_strings['LBL_CREATE_MESSAGE'] = 'Наразі у вас немає збережених записів.';
$mod_strings['LBL_CREATE'] = 'СТВОРИТИ';
$mod_strings['LBL_CREATE_MESSAGE_ONE'] = 'один зараз';
$mod_strings['LBL_ADD_NEW'] = "+ Додати новий";
$mod_strings['LBL_FIELDS_TO_COLOR'] = 'Поля для кольору';
$mod_strings['LBL_BULK_ACTION'] = 'Масова дія';
$mod_strings['LBL_ACTIVE'] = 'Активний';
$mod_strings['LBL_INACTIVE'] = 'Неактивний';
$mod_strings['LBL_DELETE'] = 'Видалити';
$mod_strings['LBL_MODULE'] = 'Модуль';
$mod_strings['LBL_DATE_CREATED'] = 'Дата створення';
$mod_strings['LBL_DATE_MODIFIED'] = 'Дата зміни';
$mod_strings['LBL_DELETE_CONFIRM_MESSAGE'] = 'Ви впевнені, що хочете видалити';
$mod_strings['LBL_THIS'] = 'це';
$mod_strings['LBL_THESE'] = 'ці';
$mod_strings['LBL_ROW'] = 'рядка?';
$mod_strings['LBL_EDIT'] = 'Редагувати';

//Edit View
//Step 1
$mod_strings['LBL_BACK'] = "Назад";
$mod_strings['LBL_SAVE'] = 'Зберегти';
$mod_strings['LBL_CANCEL'] = 'Скасувати';
$mod_strings['LBL_CLEAR'] = 'Ясно';
$mod_strings['LBL_SELECT_MODULE'] = 'Виберіть модуль';
$mod_strings['LBL_APPLY_CONDITION'] = "Застосувати умову";
$mod_strings['LBL_NEXT'] = 'Далі';
$mod_strings['LBL_NAME'] = "Ім'я";
$mod_strings['LBL_SELECT_AN_OPTION'] = 'Виберіть параметр';
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR'] = 'Виберіть Поля для кольору';
$mod_strings['LBL_STATUS'] = 'Статус';
$mod_strings['LBL_TEXT_COLOR'] = 'Колір тексту';
$mod_strings['LBL_BACKGROUND_COLOR'] = 'Колір фонуr';
$mod_strings['LBL_RELATED_RECORD_COLOR'] = 'Пов’язаний колір запису';
$mod_strings['LBL_COLOR_THE_LABEL'] = 'Розфарбуйте етикетку';
$mod_strings['LBL_YES'] = 'Так';
$mod_strings['LBL_NO'] = 'Немає';

//Step 2
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS'] = '<b>Варіант 1: Усі умови (І Умова між кожним рядком умови) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS'] = '<b>Варіант 2: будь-яка умова (або умова між кожним рядком умови) - </b>';
$mod_strings['LBL_FIELDS_COLOR_ALL_CONDITIONS_MESSAGE'] = 'Вкажіть умови будь-яких полів Модуля. Якщо всі умови відповідають, до модуля додано функцію кольору полів, який вибрано на кроці 1 (Вибір модуля)';
$mod_strings['LBL_FIELDS_COLOR_ANY_CONDITIONS_MESSAGE'] = 'Вкажіть умови будь-яких полів Модуля. Якщо будь-яка умова відповідає, до модуля додано функцію кольору полів, який вибрано на кроці 1 (Вибір модуля)';
$mod_strings['LBL_CONDITIONAL_OPERATOR'] = 'Умовний оператор :';
$mod_strings['LBL_AND'] = 'І';
$mod_strings['LBL_OR'] = 'АБО';
$mod_strings['LBL_ADD_CONDITIONS'] = 'Додати умови';
$mod_strings['LBL_MODULE_PATH'] = 'Вибраний модуль';
$mod_strings['LBL_FIELD'] = 'Поле';
$mod_strings['LBL_OPERATOR'] = 'Оператор';
$mod_strings['LBL_VALUE_TYPE'] = 'Тип значення';
$mod_strings['LBL_VALUE'] = 'Значення';
$mod_strings['LBL_DOES_NOT_CONTAINS'] = 'Не містить';
$mod_strings['LBL_IS_EMPTY'] = 'Пусто';
$mod_strings['LBL_IS_NOT_EMPTY'] = 'Не порожній';
$mod_strings['LBL_TODAY'] = 'Сьогодні';
$mod_strings['LBL_TOMORROW'] = 'Завтра';
$mod_strings['LBL_YESTERDAY'] = 'Вчора';
$mod_strings['LBL_IS_IN_LAST_7_DAYS'] = 'За останні 7 днів';
$mod_strings['LBL_IS_IN_LAST_30_DAYS'] = 'За останні 30 днів';
$mod_strings['LBL_IS_IN_LAST_60_DAYS'] = 'За останні 60 днів';
$mod_strings['LBL_IS_IN_LAST_90_DAYS'] = 'За останні 90 днів';
$mod_strings['LBL_IS_IN_LAST_120_DAYS'] = 'За останні 120 днів';
$mod_strings['LBL_IS_IN_THIS_WEEK'] = 'Є на цьому тижні';
$mod_strings['LBL_IS_IN_THE_LAST_WEEK'] = 'На останньому тижні';
$mod_strings['LBL_IS_IN_THIS_MONTH'] = 'Є в цьому місяці';
$mod_strings['LBL_IS_IN_THE_LAST_MONTH'] = 'За останній місяць';

//Alert Messages
$mod_strings['LBL_FIELDS_COLOR_NAME_EMPTY_ERROR'] = 'Будь ласка, введіть назву кольору полів.';
$mod_strings['LBL_SELECT_MODULE_EMPTY_ERROR'] = 'Будь ласка, виберіть модуль.';
$mod_strings['LBL_FIELDS_COLOR_EMPTY_CONDITIONS_VALIDATION'] = 'Будь ласка, додайте принаймні одну умову.';
$mod_strings['LBL_REQUIRED_FIELD_VALIDATION'] = "Будь ласка, виберіть/введіть обов'язкові поля.";
$mod_strings['LBL_FIELDS_COLOR_ACTIVATED'] = "Функція кольору полів активована успішно!!!";
$mod_strings['LBL_FIELDS_COLOR_DEACTIVATED']= "Функція кольору полів успішно деактивована!!!";
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_EMPTY_ERROR'] = 'Виберіть поля для кольору.';

//Info Icon Message
$mod_strings['LBL_SELECT_FIELDS_TO_COLOR_INFO_MESSAGE'] = "Виберіть поля, для яких потрібно застосувати шрифт і колір фону в Значення поля на основі відповідності умов.";
$mod_strings['LBL_COLOR_THE_LABEL_INFO_MESSAGE'] = "Виберіть Так, якщо ви хочете застосувати колір шрифту в мітці поля на основі відповідності умов.";
?>