<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 11:09:38
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\courses\\templates\\all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2204554fdb7b2c71604-99066589%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '901eaf408ec1374f4f5367d06d65dec1f97f4d1b' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\courses\\\\templates\\\\all.tpl',
      1 => 1425410395,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2204554fdb7b2c71604-99066589',
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