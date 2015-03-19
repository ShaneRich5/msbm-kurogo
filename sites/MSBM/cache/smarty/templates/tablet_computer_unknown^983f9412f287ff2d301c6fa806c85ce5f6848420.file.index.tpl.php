<?php /* Smarty version Smarty-3.0.7, created on 2015-03-18 16:50:37
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:296465509e51d563326-62215593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983f9412f287ff2d301c6fa806c85ce5f6848420' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\index.tpl',
      1 => 1426349151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '296465509e51d563326-62215593',
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