<?php /* Smarty version Smarty-3.0.7, created on 2015-03-25 00:04:40
         compiled from "/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:573059200551233d8701769-24940672%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c556b9f750a6011af249641e83f5aa257642460' => 
    array (
      0 => '/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/index.tpl',
      1 => 1427150082,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '573059200551233d8701769-24940672',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.date_format.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="nonfocal">
    <h2><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('today')->value,$_smarty_tpl->getVariable('dateFormat')->value);?>
</h2>
</div>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->getVariable('feeds')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>


<form action="<?php echo $_smarty_tpl->getVariable('create_url')->value;?>
" method="get">
    <input type="submit" value="Create Event">
</form>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>