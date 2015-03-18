<?php /* Smarty version Smarty-3.0.7, created on 2015-03-14 15:38:56
         compiled from "/home/fearon/msbm-kurogo/sites/MSBM/app/modules/courses/templates/all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:182650718655048e501ed8c1-38653020%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11df4074d2910e626b7cd27b2ae20e4cf5467823' => 
    array (
      0 => '/home/fearon/msbm-kurogo/sites/MSBM/app/modules/courses/templates/all.tpl',
      1 => 1426359654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '182650718655048e501ed8c1-38653020',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->getVariable('coursesList')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<form action="logout" method="post">
    <input type="submit" value="Logout">
</form>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>