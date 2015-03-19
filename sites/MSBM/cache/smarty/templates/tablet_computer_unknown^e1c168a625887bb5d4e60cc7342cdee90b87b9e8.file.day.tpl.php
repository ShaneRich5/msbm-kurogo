<?php /* Smarty version Smarty-3.0.7, created on 2015-03-19 19:07:26
         compiled from "C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\modules\\calendar\\templates\\day.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12176550b56aef1e218-38939198%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1c168a625887bb5d4e60cc7342cdee90b87b9e8' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\Kurogo-Mobile-Web\\\\app\\\\modules\\\\calendar\\\\templates\\\\day.tpl',
      1 => 1425410390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12176550b56aef1e218-38939198',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_template = new Smarty_Internal_Template("findInclude:modules/calendar/templates/include/eventslist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',$_smarty_tpl->getVariable('feedTitle')->value);$_template->assign('date',$_smarty_tpl->getVariable('current')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
