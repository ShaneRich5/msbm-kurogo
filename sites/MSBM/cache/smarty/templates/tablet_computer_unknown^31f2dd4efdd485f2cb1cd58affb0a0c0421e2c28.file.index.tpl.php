<?php /* Smarty version Smarty-3.0.7, created on 2015-02-05 22:12:47
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\hello\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:61154d4312f3aa928-30800557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31f2dd4efdd485f2cb1cd58affb0a0c0421e2c28' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\hello\\\\templates\\\\index.tpl',
      1 => 1423025062,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '61154d4312f3aa928-30800557',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?> 

<h1 class="focal"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</h1> 

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

