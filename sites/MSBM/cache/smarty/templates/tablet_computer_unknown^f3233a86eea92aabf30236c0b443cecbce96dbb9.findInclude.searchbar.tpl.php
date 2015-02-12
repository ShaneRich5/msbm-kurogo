<?php /* Smarty version Smarty-3.0.7, created on 2015-02-05 22:09:48
         compiled from "findInclude:modules/map/templates/searchbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1095354d4307c0c7b47-87691694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3233a86eea92aabf30236c0b443cecbce96dbb9' => 
    array (
      0 => 'findInclude:modules/map/templates/searchbar.tpl',
      1 => 1364684944,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '1095354d4307c0c7b47-87691694',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:\MAMP\htdocs\msbm\Kurogo-Mobile-Web\lib\smarty\plugins\modifier.escape.php';
?><div id="toolbar">
    <div id="searchbar" class="searchbar">
        <form id="search-form"
              method="get"
            <?php if (!$_smarty_tpl->getVariable('mapURL')->value){?>
              onsubmit="submitMapSearch(this);return false"
            <?php }?>
            >
            <fieldset class="inputcombo">
          		<div class="searchwrapper">
                    <input id="search_terms"
                        class="search-form"
                        type="text"
                        value="<?php echo smarty_modifier_escape((($tmp = @$_smarty_tpl->getVariable('searchTerms')->value)===null||$tmp==='' ? '' : $tmp));?>
"
                        name="filter"
                        placeholder="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("MAP_SEARCH_PLACEHOLDER");?>
"
                        onfocus="androidPlaceholderFix(this);showSearchFormButtons();" />
                    <?php if ($_smarty_tpl->getVariable('group')->value&&!$_smarty_tpl->getVariable('campuses')->value){?>
                        <input type="hidden" name="group" value="<?php echo $_smarty_tpl->getVariable('group')->value;?>
" />
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('feedId')->value){?>
                        <input type="hidden" name="feed" value="<?php echo $_smarty_tpl->getVariable('feedId')->value;?>
" />
                    <?php }?>
                    <?php if ($_smarty_tpl->getVariable('mapURL')->value){?>
                    <input type="hidden" name="listview" value=1 />
                    <?php }?>
                </div>
                <div id="toolbar-buttons">
                    <div class="toolbar-button">
                        <a href="<?php echo $_smarty_tpl->getVariable('bookmarkLink')->value[0]['url'];?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCHBAR_BUTTON_FAVORITES");?>
">
                            <img src="/modules/map/images/map-button-favorites.png" width="24" height="24" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCHBAR_BUTTON_FAVORITES");?>
"/>
                        </a>
                    </div>
                    <?php if ($_smarty_tpl->getVariable('mapURL')->value){?>
                        <div class="toolbar-button">
                            <a id="mapLink" href="<?php echo $_smarty_tpl->getVariable('mapURL')->value;?>
"><img src="/modules/map/images/map-button-placemark.png" width="24" height="24" /></a>
                        </div>
                    <?php }else{ ?>
                        <div class="toolbar-button">
                            <a id="browseLink" href="<?php echo $_smarty_tpl->getVariable('browseURL')->value;?>
" title="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCHBAR_BUTTON_BROWSE");?>
">
                                <img src="/modules/map/images/map-button-browse.png" width="24" height="24" alt="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCHBAR_BUTTON_BROWSE");?>
"/>
                            </a>
                        </div>
                    <?php }?>
                </div>
                <div id="search-options">
                    <?php if ($_smarty_tpl->getVariable('campuses')->value){?>
                        <?php $_template = new Smarty_Internal_Template("findInclude:modules/map/templates/selectcampus.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('campuses',$_smarty_tpl->getVariable('campuses')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
                    <?php }?>
                    <div id="searchbar-buttons">
                        <div id="searchButton">
                            <input type="button"
                                   onclick="<?php if (!$_smarty_tpl->getVariable('mapURL')->value){?>submitMapSearch(this.form)<?php }else{ ?>this.form.submit()<?php }?>"
                                   value=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCHBAR_BUTTON_SEARCH");?>
 
                                   ontouchstart="this.className='pressedaction'" ontouchend="this.className=''" />
                        </div>
                        <div id="clearButton">
                            <input type="button" onmousedown="clearSearch(event, this.form)" ontouchstart="this.className='pressedaction'" ontouchend="this.className=''" value=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCHBAR_BUTTON_CLEAR");?>
 />
                        </div>
                        <div id="cancelButton">
                            <input type="button" onclick="hideSearchFormButtons()"  ontouchstart="this.className='pressedaction'" ontouchend="this.className=''" value=<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCHBAR_BUTTON_CANCEL");?>
 />
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div> <!-- id="searchbar" -->
</div> <!-- id="toolbar" -->
