<?php /* Smarty version Smarty-3.0.7, created on 2015-02-20 12:16:15
         compiled from "C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\modules\\admin\\templates\\overview.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2491154e76bdfe344b6-23436447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b8756fc1e09692fd50c8dc3dafde39808461eb06' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\Kurogo-Mobile-Web\\\\app\\\\modules\\\\admin\\\\templates\\\\overview.tpl',
      1 => 1364684944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2491154e76bdfe344b6-23436447',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:\MAMP\htdocs\msbm\Kurogo-Mobile-Web\lib\smarty\plugins\modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:modules/admin/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<form method="post" id="adminForm" class="<?php echo $_smarty_tpl->getVariable('section')->value;?>
">
<input id="adminSubmit" type="submit" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("BUTTON_SAVE");?>
" /> 
<h1><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_TITLE");?>
</h1>
<p id="moduleDescription" class="preamble"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_DESCRIPTION");?>
</p>

<dl class="legend">
    <dt><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_ID_TITLE");?>
</dt>
    <dd><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_ID_DESCRIPTION");?>
</dd>
    <dt><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_TYPE_TITLE");?>
</dt>
    <dd><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_TYPE_DESCRIPTION");?>
</dd>
    <dt><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_ENABLED_TITLE");?>
</dt>
    <dd><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_ENABLED_DESCRIPTION");?>
</dd>
    <dt><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_HOME_TITLE");?>
</dt>
    <dd><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_HOME_DESCRIPTION");?>
</dd>
    <dt><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_SSL_TITLE");?>
</dt>
    <dd><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_SSL_DESCRIPTION");?>
</dd>
    <dt><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_FEDSEARCH_TITLE");?>
</dt>
    <dd><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_FEDSEARCH_DESCRIPTION");?>
</dd>
</dl>
<table id="overviewTable" class="configtable" summary="Overview table of modules and their high-level configuration">
<thead>
    <tr>
        <th></th>
        <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_MODULENAME_TITLE");?>
</th>
        <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_ID_TITLE");?>
</th>
        <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_TYPE_TITLE");?>
</th>
        <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_ENABLED_TITLE");?>
</th>
        <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_HOME_TITLE");?>
</th>
        <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_SSL_TITLE");?>
</th>
        <th><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ADMIN_MODULES_OVERVIEW_FEDSEARCH_TITLE");?>
</th>
    </tr>
</thead>
<tbody>
<?php  $_smarty_tpl->tpl_vars['moduleData'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('modules')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['moduleData']->key => $_smarty_tpl->tpl_vars['moduleData']->value){
?>
<tr>
    <td><img src="<?php if ($_smarty_tpl->getVariable('navigation_icon_set')->value){?>/common/images/iconsets/<?php echo $_smarty_tpl->getVariable('navigation_icon_set')->value;?>
/30/<?php }else{ ?>/modules/<?php echo $_smarty_tpl->getVariable('homeModuleID')->value;?>
/images/compliant/<?php }?><?php echo $_smarty_tpl->tpl_vars['moduleData']->value['icon'];?>
.png" width="30" height="30" alt="" /></td>
    <td><a href="<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['url'];?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['moduleData']->value['title']);?>
</a></td>
    <td><?php echo $_smarty_tpl->tpl_vars['moduleData']->value['id'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['moduleData']->value['type'];?>
</td>
    <td><?php if ($_smarty_tpl->tpl_vars['moduleData']->value['canDisable']){?><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['id'];?>
[disabled]" value="1" /> <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['id'];?>
[disabled]" value="0"<?php if (!$_smarty_tpl->tpl_vars['moduleData']->value['disabled']){?> checked<?php }?> /><?php }else{ ?>
    <img src="/common/images/available.png" alt="Yes" /><?php }?>
    </td>
    <td><?php if ($_smarty_tpl->tpl_vars['moduleData']->value['home']){?><img src="/common/images/available.png" alt="Yes" /><?php }?></td>
    <td><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['id'];?>
[secure]" value="0" /> <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['id'];?>
[secure]" value="1"<?php if ($_smarty_tpl->tpl_vars['moduleData']->value['secure']){?> checked<?php }?> /></td>
    <td><input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['id'];?>
[search]" value="0" /> <input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['moduleData']->value['id'];?>
[search]" value="1"<?php if ($_smarty_tpl->tpl_vars['moduleData']->value['search']){?> checked<?php }?> /></td>
</tr>
<?php }} ?>
</tbody>
</table>
</form>
<?php $_template = new Smarty_Internal_Template("findInclude:modules/admin/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
