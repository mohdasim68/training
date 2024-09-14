<?php
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
global $sugar_config;
$databaseType = $sugar_config['dbconfig']['db_type'];

if($databaseType == 'mysql'){

    //Fields Color Config Table
    $fieldsColorConfig = "CREATE TABLE IF NOT EXISTS vi_fields_color(
                                                fields_color_id CHAR(36) NOT NULL PRIMARY KEY,
                                                fields_color_name VARCHAR(255) NOT NULL,
                                                module_name VARCHAR(255) NOT NULL,
                                                fields_color_field longtext NOT NULL,
                                                status TINYINT(1) NOT NULL,
                                                text_color VARCHAR(200) NULL,
                                                background_color VARCHAR(200) NULL,
                                                related_record_color VARCHAR(200) NULL,
                                                color_label VARCHAR(20) NULL,
                                                conditional_operator VARCHAR(5) NULL,
                                                date_entered DATETIME NOT NULL,
                                                date_modified DATETIME NOT NULL,
                                                deleted TINYINT(1) NOT NULL DEFAULT '0'
                                                )";
    $fieldsColorConfigResult = $GLOBALS['db']->query($fieldsColorConfig);

    //Fields Color Condition Table
    $fieldsColorCondition = "CREATE TABLE IF NOT EXISTS vi_fields_color_condition(
                                                id CHAR(36) NOT NULL PRIMARY KEY,
                                                module_path VARCHAR(255) NULL,
                                                field VARCHAR(255) NULL,
                                                operator VARCHAR(255) NULL,
                                                value_type VARCHAR(255) NULL,
                                                value VARCHAR(255) NULL,
                                                fields_color_id CHAR(36) NULL,
                                                condition_type VARCHAR(5) NULL,
                                                date_entered DATETIME NOT NULL,
                                                deleted TINYINT(1) NOT NULL DEFAULT '0'
                                                )";
    $fieldsColorConditionResult = $GLOBALS['db']->query($fieldsColorCondition);

}else if($databaseType == 'mssql'){

    //Fields Color Config Table
    $fieldsColorConfig = "IF NOT EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'dbo.[vi_fields_color]') and OBJECTPROPERTY(id, N'IsTable') = 1)
                    BEGIN

                    CREATE TABLE [dbo].[vi_fields_color](
                        [fields_color_id] [CHAR](36) NOT NULL PRIMARY KEY,
                        [fields_color_name] [VARCHAR](255) NOT NULL,
                        [module_name] [VARCHAR](255) NOT NULL,
                        [fields_color_field] [NVARCHAR](MAX) NOT NULL,
                        [status] [SMALLINT] NOT NULL,
                        [text_color] [VARCHAR](200) NULL,
                        [background_color] [VARCHAR](200) NULL,
                        [related_record_color] [VARCHAR](200) NULL,
                        [color_label] [VARCHAR](20) NULL,
                        [conditional_operator] [VARCHAR](255) NULL,
                        [date_entered] [DATETIME] NOT NULL,
                        [date_modified] [DATETIME] NOT NULL,
                        [deleted] [SMALLINT] NOT NULL DEFAULT 0
                    )
                    END";
    $fieldsColorConfigResult = $GLOBALS['db']->query($fieldsColorConfig);

    //Fields Color Condition Table
    $fieldsColorCondition = "IF NOT EXISTS (SELECT * FROM dbo.sysobjects where id = object_id(N'dbo.[vi_fields_color_condition]') and OBJECTPROPERTY(id, N'IsTable') = 1)
                    BEGIN

                    CREATE TABLE [dbo].[vi_fields_color_condition](
                        [id] [CHAR](36) NOT NULL PRIMARY KEY,
                        [module_path] [VARCHAR](255) NULL,
                        [field] [VARCHAR](255) NULL,
                        [operator] [VARCHAR](255) NULL,
                        [value_type] [VARCHAR](255) NULL,
                        [value] [VARCHAR](255) NULL,
                        [fields_color_id] [CHAR](36) NULL,
                        [condition_type] [VARCHAR](5) NULL,
                        [date_entered] [DATETIME] NOT NULL,
                        [deleted] [SMALLINT] NOT NULL DEFAULT 0
                    )
                    END";
    $fieldsColorConditionResult = $GLOBALS['db']->query($fieldsColorCondition); 
}//end of else if