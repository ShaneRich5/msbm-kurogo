<?php /* Smarty version Smarty-3.0.7, created on 2015-03-20 17:43:25
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3113550c947ddc7391-44077867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983f9412f287ff2d301c6fa806c85ce5f6848420' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\index.tpl',
      1 => 1426887802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3113550c947ddc7391-44077867',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include 'C:\MAMP\htdocs\msbm\Kurogo-Mobile-Web\lib\smarty\plugins\modifier.date_format.php';
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