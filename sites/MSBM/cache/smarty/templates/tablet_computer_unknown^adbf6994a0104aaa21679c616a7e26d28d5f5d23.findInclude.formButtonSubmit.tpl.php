<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 10:57:46
         compiled from "findInclude:common/templates/formButtonSubmit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2545054fdb4ea739121-60253276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adbf6994a0104aaa21679c616a7e26d28d5f5d23' => 
    array (
      0 => 'findInclude:common/templates/formButtonSubmit.tpl',
      1 => 1425410389,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '2545054fdb4ea739121-60253276',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<span class="formbuttoncontainer">
  <input type="submit" name="<?php echo (($tmp = @$_smarty_tpl->getVariable('buttonName')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('buttonTitle')->value : $tmp);?>
" class="formbutton" value="<?php echo $_smarty_tpl->getVariable('buttonTitle')->value;?>
"<?php if ($_smarty_tpl->getVariable('buttonOnclick')->value){?> onclick="<?php echo $_smarty_tpl->getVariable('buttonOnclick')->value;?>
"<?php }?> />
</span>
