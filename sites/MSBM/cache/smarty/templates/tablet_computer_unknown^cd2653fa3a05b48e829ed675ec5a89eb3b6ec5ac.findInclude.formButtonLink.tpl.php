<?php /* Smarty version Smarty-3.0.7, created on 2015-02-05 22:10:00
         compiled from "findInclude:common/templates/formButtonLink.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1469754d4308807f120-77590005%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd2653fa3a05b48e829ed675ec5a89eb3b6ec5ac' => 
    array (
      0 => 'findInclude:common/templates/formButtonLink.tpl',
      1 => 1364684942,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '1469754d4308807f120-77590005',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<a href="<?php if ($_smarty_tpl->getVariable('buttonURL')->value){?><?php echo $_smarty_tpl->getVariable('buttonURL')->value;?>
<?php }else{ ?>javascript:void(0);<?php }?>" class="formbutton"<?php if ($_smarty_tpl->getVariable('buttonOnclick')->value){?> onclick="<?php echo $_smarty_tpl->getVariable('buttonOnclick')->value;?>
"<?php }?>>
  <div><?php echo $_smarty_tpl->getVariable('buttonTitle')->value;?>
</div>
</a>
