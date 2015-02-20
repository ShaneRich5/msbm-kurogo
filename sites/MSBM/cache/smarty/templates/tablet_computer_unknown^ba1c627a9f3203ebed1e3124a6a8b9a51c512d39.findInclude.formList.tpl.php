<?php /* Smarty version Smarty-3.0.7, created on 2015-02-19 22:47:51
         compiled from "findInclude:common/templates/formList.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25854e6ae678d8674-57179081%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ba1c627a9f3203ebed1e3124a6a8b9a51c512d39' => 
    array (
      0 => 'findInclude:common/templates/formList.tpl',
      1 => 1364684942,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '25854e6ae678d8674-57179081',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div class="nonfocal formlist"<?php if ($_smarty_tpl->getVariable('formlistID')->value){?> id="<?php echo $_smarty_tpl->getVariable('formlistID')->value;?>
"<?php }?>>
  <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('advancedFields')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
    <p class="formelement form-<?php echo $_smarty_tpl->tpl_vars['item']->value['type'];?>
">
      <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/formListItem.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    </p>
  <?php }} ?>
</div>
