<?php /* Smarty version Smarty-3.0.7, created on 2015-03-23 18:12:09
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\day.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137655108fb9cc3605-99817717%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfb59d0c8728ed08659dd05c6bc306db9be40106' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\day.tpl',
      1 => 1426887885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137655108fb9cc3605-99817717',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_template = new Smarty_Internal_Template("findInclude:modules/calendar/templates/include/eventslist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('title',$_smarty_tpl->getVariable('feedTitle')->value);$_template->assign('date',$_smarty_tpl->getVariable('current')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<form action="<?php echo $_smarty_tpl->getVariable('create_url')->value;?>
" method="get">
    <input type="submit" value="Submit Booking">
</form>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
