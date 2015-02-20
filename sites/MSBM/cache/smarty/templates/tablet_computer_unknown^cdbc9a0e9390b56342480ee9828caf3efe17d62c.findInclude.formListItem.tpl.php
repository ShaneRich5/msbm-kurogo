<?php /* Smarty version Smarty-3.0.7, created on 2015-02-19 22:47:51
         compiled from "findInclude:common/templates/formListItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1486754e6ae67a9c356-01571558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdbc9a0e9390b56342480ee9828caf3efe17d62c' => 
    array (
      0 => 'findInclude:common/templates/formListItem.tpl',
      1 => 1364684942,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '1486754e6ae67a9c356-01571558',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:\MAMP\htdocs\msbm\Kurogo-Mobile-Web\lib\smarty\plugins\modifier.escape.php';
?><?php if (isset($_smarty_tpl->getVariable('item',null,true,false)->value['label'])&&$_smarty_tpl->getVariable('item')->value['type']!='boolean'){?><label><?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
<?php if ((($tmp = @$_smarty_tpl->getVariable('labelColon')->value)===null||$tmp==='' ? true : $tmp)){?>:<?php }?></label><?php }?><?php if ($_smarty_tpl->getVariable('item')->value['type']!='label'){?><input type="hidden" name="_type[<?php echo (($tmp = @$_smarty_tpl->getVariable('item')->value['typename'])===null||$tmp==='' ? $_smarty_tpl->getVariable('item')->value['name'] : $tmp);?>
]" value="<?php echo $_smarty_tpl->getVariable('item')->value['type'];?>
" /><?php }?><?php if (isset($_smarty_tpl->getVariable('item',null,true,false)->value['subtitle'])){?><span class="smallprint"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('item')->value['subtitle']);?>
</span><?php }?><?php echo $_smarty_tpl->getVariable('item')->value['title'];?>
<?php if ($_smarty_tpl->getVariable('item')->value['type']=='text'){?><input type="text" name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('item')->value['value']);?>
" /><?php }elseif($_smarty_tpl->getVariable('item')->value['type']=='paragraph'){?><textarea name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" cols="28" rows="8"><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('item')->value['value']);?>
</textarea><?php }elseif($_smarty_tpl->getVariable('item')->value['type']=='boolean'){?><label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><input type="checkbox" id="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" value="1"<?php if ($_smarty_tpl->getVariable('item')->value['value']){?> checked<?php }?> /> <?php echo $_smarty_tpl->getVariable('item')->value['label'];?>
</label><?php }elseif($_smarty_tpl->getVariable('item')->value['type']=='submit'){?><input type="submit" name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('item')->value['value']);?>
"<?php if ($_smarty_tpl->getVariable('item')->value['confirm']){?> class="confirm"<?php }?> /><?php }elseif($_smarty_tpl->getVariable('item')->value['type']=='label'){?><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('item')->value['value']);?>
<?php }elseif($_smarty_tpl->getVariable('item')->value['type']=='radio'){?><span class="form-radio-options"><?php  $_smarty_tpl->tpl_vars['_label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['_value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['_label']->key => $_smarty_tpl->tpl_vars['_label']->value){
 $_smarty_tpl->tpl_vars['_value']->value = $_smarty_tpl->tpl_vars['_label']->key;
?><label for="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['_value']->value;?>
" class="form-radio-value"><input type="radio" id="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
_<?php echo $_smarty_tpl->tpl_vars['_value']->value;?>
" name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['_value']->value;?>
"<?php if ($_smarty_tpl->getVariable('item')->value['value']==$_smarty_tpl->tpl_vars['_value']->value){?> checked<?php }?>> <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['_label']->value);?>
</label><?php }} ?></span><?php }elseif($_smarty_tpl->getVariable('item')->value['type']=='select'){?><select name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
"><?php if ($_smarty_tpl->getVariable('item')->value['default']){?><option value=""><?php echo smarty_modifier_escape($_smarty_tpl->getVariable('item')->value['default']);?>
</option><?php }?><?php  $_smarty_tpl->tpl_vars['_label'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['_value'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('item')->value['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['_label']->key => $_smarty_tpl->tpl_vars['_label']->value){
 $_smarty_tpl->tpl_vars['_value']->value = $_smarty_tpl->tpl_vars['_label']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['_value']->value;?>
"<?php if ($_smarty_tpl->getVariable('item')->value['value']==$_smarty_tpl->tpl_vars['_value']->value){?> selected<?php }?>><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['_label']->value);?>
</option><?php }} ?></select><?php }elseif($_smarty_tpl->getVariable('item')->value['type']=='url'){?><a href="<?php echo $_smarty_tpl->getVariable('item')->value['value'];?>
" class="<?php echo (($tmp = @$_smarty_tpl->getVariable('item')->value['class'])===null||$tmp==='' ? '' : $tmp);?>
"<?php if ($_smarty_tpl->getVariable('linkTarget')->value){?> target="<?php echo $_smarty_tpl->getVariable('linkTarget')->value;?>
"<?php }?>><?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
</a><?php }else{ ?><input type="<?php echo $_smarty_tpl->getVariable('item')->value['type'];?>
" name="<?php echo $_smarty_tpl->getVariable('item')->value['name'];?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('item')->value['value']);?>
" /><?php }?>
