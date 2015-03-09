<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 11:44:36
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2654654fdbfe4c221b1-53460897%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983f9412f287ff2d301c6fa806c85ce5f6848420' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\index.tpl',
      1 => 1425915874,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2654654fdbfe4c221b1-53460897',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<h1 class="focal">Room Booking</h1>

<div class="nonfocal">
    <h3>Login <?php echo $_smarty_tpl->getVariable('token')->value;?>
</h3>
</div>
<form method="get" id="advancedSearchForm" action="/<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
/search">
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/formList.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('advancedFields',$_smarty_tpl->getVariable('formFields')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    <div class="formbuttons">
        <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/formButtonSubmit.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('buttonTitle',"Login"); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
    </div>
</form>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>