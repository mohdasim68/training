{*
/*********************************************************************************
 * This file is part of package Field Color.
 * 
 * Author : Variance InfoTech PVT LTD (http://www.varianceinfotech.com)
 * All rights (c) 2021 by Variance InfoTech PVT LTD
 *
 * This Version of Field Color is licensed software and may only be used in 
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

  <div class="moduleTitle">
    <h2 class="module-title-text">{$MOD.LBL_FIELDS_COLOR}</h2>
    <div class="updateLicense">
      <a href="{$UPDATE_LICENSE_URL}"><button class="button">{$MOD.LBL_UPDATE_LICENSE}</button></a>
    </div>
    <div class="clear"></div>
    {$HELP_BOX_CONTENT}
  </div>

  {if $FIELDS_COLOR_DATA|@count gt 0}
    <div>
      <table class="addRecordTable">
        <tr>
          <td>
            <input type="button" name="addNew" value="{$MOD.LBL_ADD_NEW}" class="button" onclick="location.href='{$EDITVIEW_URL}';" >
          </td>

          <td class="floatRight">
            <input type="button" name="btnBack" value="{$MOD.LBL_BACK}" class="button" onclick="backToAdminPage();" >
          </td>

          <td class="floatRight marginRight">
            <div>
              <button class="bulkAction">
                <label class="selected-actions-label hidden-desktop" style="padding: 10px;">{$MOD.LBL_BULK_ACTION}
                  <span class="suitepicon suitepicon-action-caret actionIcon"></span>
                </label>
              </button>

              <ul id="actionLinkTop" class="clickMenu selectActions fancymenu SugarActionMenu" style="display:none;" name="selectActions">
                <li class="sugar_action_button actionButton" style="height:39px;">
                  <label class="selected-actions-label hidden-desktop actionLabel" style="font-size:12.2px;padding: 10px;">{$MOD.LBL_BULK_ACTION}
                    <span class="suitepicon suitepicon-action-caret actions actionIcon"></span>
                  </label>
                  <ul class="subnav ddopen" id="actionMenu" style="display:none;">
                    <li>
                      <a onclick="updateFieldsColorActionStatus(1, '', 'bulkActionClick')">{$MOD.LBL_ACTIVE}</a>
                    </li>
                    <li>
                      <a onclick="updateFieldsColorActionStatus(0, '', 'bulkActionClick')">{$MOD.LBL_INACTIVE}</a>
                    </li>
                    <li>
                      <a onclick="deleteFieldsColorData();">{$MOD.LBL_DELETE}</a>
                    </li>
                  </ul>
                </li>
              </ul> 
            </div>
          </td>

        </tr>
      </table>
    </div>

    <div class="list-view-rounded-corners">
      <table class="list view table-responsive">
        <thead>
          <th>
            <input type="checkbox" id="selectAll">
          </th>
          <th></th>
          <th>{$MOD.LBL_STATUS}</th>
          <th>{$MOD.LBL_NAME}</th>
          <th>{$MOD.LBL_MODULE}</th>
          <th>{$MOD.LBL_FIELDS_TO_COLOR}</th>
          <th>{$MOD.LBL_DATE_CREATED}</th>
          <th>{$MOD.LBL_DATE_MODIFIED}</th>
        </thead>
        {foreach from=$FIELDS_COLOR_DATA key=key item=value}
          <tr class="oddListRowS1" height="20" data-id="{$value.fieldsColorId}">
            <td>
              <input class="listviewCheckbox" name="mass[]" id="mass[]" value="{$value.fieldsColorId}" type="checkbox">
            </td>
            <td>
              <a class="edit-link" title="{$MOD.LBL_EDIT}" id="{$value.fieldsColorId}" href="{$EDITVIEW_URL}&records={$value.fieldsColorId}">
              {if $THEME eq 'SuiteP'}
                <img src="themes/{$THEME}/images/edit_inline.png">
              {else}
                <img src="themes/{$THEME}/images/edit.gif">
              {/if}
              </a>
            </td>

            <td field="status">
              <b>
              <label class="switch marginLeft">
                <input type="checkbox" id="statusAction" value="{$value.status}" {if $value.status eq 1} checked{/if}>
                <span class="slider round"></span>
              </label>
              </b>
            </td>

            <td field="name">
              <b>{$value.fieldsColorName}</b>
            </td>

            <td field="module">
              <b>{$value.moduleLabel}</b>
            </td>

            <td field="field">
              <b>{$value.fieldsHtml}</b>
            </td>

            <td field="dateCreated">
              <b>{$value.dateEntered}<br></b>
            </td>

            <td field="dateModified">
              <b>{$value.dateModified}<br></b>
            </td>
          </tr>
        {/foreach}
      </table>
    </div>
  {else}
    <br>
    <div class="list view listViewEmpty">
      <br>
      <p class="msg">{$MOD.LBL_CREATE_MESSAGE}
        <a href="{$EDITVIEW_URL}">{$MOD.LBL_CREATE}</a>{$MOD.LBL_CREATE_MESSAGE_ONE}
      </p>
    </div>
  {/if}
</html>

{literal}
<script type="text/javascript">
  var listViewUrl = "{/literal}{$LISTVIEW_URL}{literal}";
  var administrationPageUrl = "{/literal}{$ADMINISTRATION_PAGE_URL}{literal}";

  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "custom/modules/Administration/js/VIFieldsColorListView.js?v="+Math.random();
  document.body.appendChild(script);
</script>
{/literal}