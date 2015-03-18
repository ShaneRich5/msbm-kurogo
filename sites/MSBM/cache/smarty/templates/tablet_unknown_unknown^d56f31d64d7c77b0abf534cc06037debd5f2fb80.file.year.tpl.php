<?php /* Smarty version Smarty-3.0.7, created on 2015-03-18 17:44:13
         compiled from "/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/app/modules/calendar/templates/year.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6312092545509f1adcf26d0-66392458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd56f31d64d7c77b0abf534cc06037debd5f2fb80' => 
    array (
      0 => '/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/app/modules/calendar/templates/year.tpl',
      1 => 1426359653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6312092545509f1adcf26d0-66392458',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_template = new Smarty_Internal_Template("findInclude:modules/calendar/templates/include/eventslist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',($_smarty_tpl->getVariable('feedTitle')->value)." for ".($_smarty_tpl->getVariable('current')->value));$_template->assign('date',false);$_template->assign('linkDateFormat',false); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
