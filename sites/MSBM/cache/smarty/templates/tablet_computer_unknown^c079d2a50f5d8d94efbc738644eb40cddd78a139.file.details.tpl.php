<?php /* Smarty version Smarty-3.0.7, created on 2015-02-19 21:12:06
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\courses\\templates\\details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:870354e697f61249f0-90414522%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c079d2a50f5d8d94efbc738644eb40cddd78a139' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\courses\\\\templates\\\\details.tpl',
      1 => 1424398324,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '870354e697f61249f0-90414522',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<h1 class="focal">Hello World</h1>
<h2 class="focal"><?php echo $_smarty_tpl->getVariable('wstoken')->value;?>
 <?php echo $_smarty_tpl->getVariable('func')->value;?>
 <?php echo $_smarty_tpl->getVariable('id')->value;?>
 </h2>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->getVariable('contentList')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>