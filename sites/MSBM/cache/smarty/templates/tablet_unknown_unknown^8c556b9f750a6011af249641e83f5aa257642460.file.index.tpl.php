<?php /* Smarty version Smarty-3.0.7, created on 2015-03-14 15:54:19
         compiled from "/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143025999550491ebec5223-79179174%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c556b9f750a6011af249641e83f5aa257642460' => 
    array (
      0 => '/home/fearon/msbm-kurogo/sites/MSBM/app/modules/bookings/templates/index.tpl',
      1 => 1426359654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143025999550491ebec5223-79179174',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<h1 class="focal">
    Room Booking
    <small>Click for more details</small>
</h1>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->getVariable('eventsList')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<form action="<?php echo $_smarty_tpl->getVariable('create_url')->value;?>
" method="get">
    <input type="submit" value="Create Event">
</form>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>