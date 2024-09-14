{*
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
*}

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="custom/modules/Administration/css/VIFieldsColorConfig.css">
  </head>

  <body>
    <div class="moduleTitle">
      <h2 class="module-title-text">{$MOD.LBL_FIELDS_COLOR}</h2>
      <div class="clear"></div>
    </div>
    
    <form name="EditView" id="EditView">
      <div class="progression-container">
        <ul class="progression">
          <li id="navStep1" class="navSteps selected" data-nav-step="1"><div>{$MOD.LBL_SELECT_MODULE}</div></li>
          <li id="navStep2" class="navSteps" data-nav-step="2"><div>{$MOD.LBL_APPLY_CONDITION}</div></li>
        </ul>
      </div>

      <div id ='buttons'>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr> 
            <td align="left" width='30%'>
              <table border="0" cellspacing="0" cellpadding="0" >
                <tr>
                  <td>
                    <div id="backButtonDiv">
                      <input id="backButton" type='button' title="{$MOD.LBL_BACK}" class="button" name="back" value="{$MOD.LBL_BACK}" style="margin-right: 20px;">
                    </div>
                  </td>

                  <td>
                    <div id="cancelButtonDiv">
                      <button type="button" class="button" name="btnCancel" id="btnCancel" onclick="cancel();">{$MOD.LBL_CANCEL}</button>
                    </div>
                  </td>

                  <td>
                    <div id="clearButtonDiv">
                      <button type="button" class="button marginLeft" name="btnClear" id="btnClear" onclick="clearall();">{$MOD.LBL_CLEAR}</button>
                    </div>
                  </td>

                  <td>
                    <div id="nextButtonDiv">
                      <button type="button" class="button marginLeft" name="btnNext" id="btnNext">{$MOD.LBL_NEXT}
                      </button>
                    </div>
                  </td>

                  <td>
                    <div id="saveButtonDiv">
                      <button type="button" class="button marginLeft" name="btnSave" id="btnSave" onclick="saveFieldsColorConfigData();">{$MOD.LBL_SAVE}</button>
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>

      <table cellspacing="1">
        <tr>
          <td class='edit view' rowspan='2' width='100%'>
            <div id=wizard class="wizard-unique-elem" style="width:1000px;">
              <div id="step1">
                <div class="template-panel">
                  <div class="template-panel-container panel">
                    <div class="template-container-full">
                      <table width="100%" border="0" cellspacing="10" cellpadding="0">
                        <tbody>
                          <tr>
                            <th colspan="4"><h4 class="header-4">{$MOD.LBL_SELECT_MODULE}</h4></th>
                          </tr>

                          <tr>
                            <td>
                              <b>{$MOD.LBL_NAME}<span class="required">*</span></b>
                            </td>
                            <td class="setvisibilityclass">
                              <input type="text" name="fieldsColorName" id="fieldsColorName" value="{$FIELDS_COLOR_DATA.fieldsColorName}">
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <b>{$MOD.LBL_SELECT_MODULE}<span class="required">*</span></b>
                            </td>
                            <td class="setvisibilityclass">
                              <select name="moduleName" id="moduleName">
                                <option value="" selected="selected">{$MOD.LBL_SELECT_AN_OPTION}</option>
                                {foreach from=$ENABLE_PRIMARY_MODULE_LIST key=moduleValue item=moduleName}
                                  <option label="{$moduleName}" value="{$moduleValue}" {if $FIELDS_COLOR_DATA.moduleName eq $moduleValue} selected="selected" {/if}>{$moduleName}</option>
                                {/foreach}
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <b>{$MOD.LBL_SELECT_FIELDS_TO_COLOR}<span class="required">*</span><img onclick="dispalyFieldsToColorInfo(this);" src="{$INFO_URL}" class="inlineHelpTip cursorStyle" border="0"></b>
                            </td>
                              
                            <td class="setvisibilityclass">
                              <select id="fieldsForColor" name="fieldsForColor[]" multiple="true">
                                {if $RECORD_ID neq ''}
                                  {foreach from=$SELECTED_MODULE_FIELDS key=fieldkey item=fieldvalue}
                                    <option value="{$fieldkey}" {if in_array($fieldkey, $FIELDS_COLOR_DATA.selectedModuleFieldValue)} selected="selected"{/if}>{$fieldvalue}</option>
                                  {/foreach}
                                {/if}
                              </select>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <b>{$MOD.LBL_STATUS}</b>
                            </td>

                            <td>
                              <label class="switch">
                                <input type="checkbox" value="{if $FIELDS_COLOR_DATA.status eq 1}1{else}0{/if}" id="status" {if $FIELDS_COLOR_DATA.status eq 1}checked='checked'{/if}>
                                <span class="slider round"></span>
                              </label>
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <b>{$MOD.LBL_TEXT_COLOR}</b>
                            </td>
                              
                            <td class="setvisibilityclass">
                              <input type="text" id="textColor" name="textColor" class="color" value="{$FIELDS_COLOR_DATA.textColor}">
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <b>{$MOD.LBL_BACKGROUND_COLOR}</b>
                            </td>
                              
                            <td class="setvisibilityclass">
                              <input type="text" id="backgroundColor" name="backgroundColor" class="color" value="{$FIELDS_COLOR_DATA.backgroundColor}">
                            </td>
                          </tr>

                          <tr>
                            <td>
                              <b>{$MOD.LBL_RELATED_RECORD_COLOR}</b>
                            </td>
                              
                            <td class="setvisibilityclass">
                              <input type="text" id="textColor" name="relateRecordColor" class="color" value="{$FIELDS_COLOR_DATA.relatedRecordColor}">
                            </td>
                          </tr>


                          <tr>
                            <td>
                              <b>{$MOD.LBL_COLOR_THE_LABEL} <img onclick="dispalyColorTheLabelInfo(this);" src="{$INFO_URL}" class="inlineHelpTip cursorStyle" border="0"></b>
                            </td>
                              
                            <td class="setvisibilityclass">
                              <select id="colorLabel" name="colorLabel">
                                <option value="yes" {if $FIELDS_COLOR_DATA.colorLabel eq 'yes'} selected="selected" {/if}>{$MOD.LBL_YES}</option>
                                <option value="no" {if $FIELDS_COLOR_DATA.colorLabel eq 'no'} selected="selected" {/if}>{$MOD.LBL_NO}</option>                                  
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div id="step2" style="display:none;">
                <div class="template-panel">
                  <div class="template-panel-container panel">
                    <div class="template-container-full">
                      <div class="conditionBlockBorder">
                        <span id="conditionLinesSpan">
                          <div id="conditionBorder">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tbody>
                                  <tr>
                                    <th colspan="4">
                                      <h4 class="header-4">{$MOD.LBL_APPLY_CONDITION}</h4>
                                    </th>
                                  </tr>
                              </tbody>
                            </table>

                            <table id="allCondition" width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tbody>
                                <tr><th colspan="4"><h4 class="header-4">{$MOD.LBL_FIELDS_COLOR_ALL_CONDITIONS}<span class="selectedModuleName">{$FIELDS_COLOR_DATA.moduleLabel}</span></h4></th></tr>
                              </tbody>
                            </table>
                            <span class="conditionMessage">{$MOD.LBL_FIELDS_COLOR_ALL_CONDITIONS_MESSAGE}</span>
                            <br/><br/>

                            {if $FIELDS_COLOR_ALL_CONDITION_DATA eq ''}
                              <script type="text/javascript" src="custom/modules/Administration/js/VIFieldsColorConditionLine.js?v={$RANDOM_NUMBER}"></script>
                                
                              <table id="aowAllConditionLines" width="100%" cellspacing="4" border="0">
                              </table>
                              <div class="allConditionButtonDiv">
                                <input tabindex="116" class="button" value="{$MOD.LBL_ADD_CONDITIONS}" id="btnAllConditionLine" onclick="insertFieldsColorConditionLine('All')" type="button">
                              </div>
                            {else} 
                              {$FIELDS_COLOR_ALL_CONDITION_DATA} 
                            {/if}
                          </div>

                          <br>
                          <label style="margin: 7px;">{$MOD.LBL_CONDITIONAL_OPERATOR}</label>
                          <select name="conditionalOperator" id="conditionalOperator">
                            <option value="AND" {if $FIELDS_COLOR_DATA.conditionalOperator eq 'AND'} selected="selected" {/if}>{$MOD.LBL_AND}</option>
                            <option value="OR" {if $FIELDS_COLOR_DATA.conditionalOperator eq 'OR'} selected="selected" {/if}>{$MOD.LBL_OR}</option>
                          </select>
                          <br><br>

                          <div id="conditionBorder">
                            <table id="anyCondition" width="100%" border="0" cellspacing="0" cellpadding="0">
                              <tbody>
                                <tr>
                                  <th colspan="4"><h4 class="header-4">{$MOD.LBL_FIELDS_COLOR_ANY_CONDITIONS}<span class="selectedModuleName">{$FIELDS_COLOR_DATA.moduleLabel}</span></h4></th>
                                </tr> 
                              </tbody>
                            </table>
                            <span class="conditionMessage">{$MOD.LBL_FIELDS_COLOR_ANY_CONDITIONS_MESSAGE}</span>
                            <br/><br/>
                              
                            {if $FIELDS_COLOR_ANY_CONDITION_DATA eq ''}
                              <table id="aowAnyConditionLines" width="100%" cellspacing="4" border="0">
                              </table>
                              <div class="anyConditionButtonDiv">
                                <input tabindex="116" class="button" value="{$MOD.LBL_ADD_CONDITIONS}" id="btnAnyConditionLine" onclick="insertFieldsColorConditionLine('Any')" type="button">
                              </div>
                            {else} 
                              {$FIELDS_COLOR_ANY_CONDITION_DATA} 
                            {/if}
                          </div>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>
          </td>
        </tr>
    </table>
    </form>
  </body>
</html>

{literal}
  <script type="text/javascript">
    var listViewUrl = "{/literal}{$LISTVIEW_URL}{literal}";
    var selModuleName = "{/literal}{$FIELDS_COLOR_DATA.moduleName}{literal}";
    var fieldsToColorMessage = {/literal}{$MOD.LBL_SELECT_FIELDS_TO_COLOR_INFO_MESSAGE|@json_encode}{literal};
    var colorTheLabelMessage = {/literal}{$MOD.LBL_COLOR_THE_LABEL_INFO_MESSAGE|@json_encode}{literal};

    var script = document.createElement("script");
    script.type = "text/javascript";
    script.src = "custom/modules/Administration/js/VIFieldsColorEditView.js?v="+Math.random();
    document.body.appendChild(script);
  </script>
{/literal}
