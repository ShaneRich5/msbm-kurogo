<?php /* Smarty version Smarty-3.0.7, created on 2015-03-18 17:46:22
         compiled from "/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/app/modules/calendar/templates/day.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8037611415509f22ea246b3-93724077%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c64db4d6d1c6b77be37ed30e6e01a0c41d74a4aa' => 
    array (
      0 => '/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/app/modules/calendar/templates/day.tpl',
      1 => 1426359653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8037611415509f22ea246b3-93724077',
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
