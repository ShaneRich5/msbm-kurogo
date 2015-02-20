<?php /* Smarty version Smarty-3.0.7, created on 2015-02-19 22:47:51
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2516554e6ae677ddf52-24980596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983f9412f287ff2d301c6fa806c85ce5f6848420' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\index.tpl',
      1 => 1424404069,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2516554e6ae677ddf52-24980596',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h1 class="focal">Book</h1>
<a href="<?php echo $_smarty_tpl->getVariable('item')->value['url'];?>
"><?php echo $_smarty_tpl->getVariable('message')->value;?>
</a>
<h1 class="focal"><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/listItem.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('item',$_smarty_tpl->getVariable('nav')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?></h1>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/formList.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('formlistID',$_smarty_tpl->getVariable('formId')->value);$_template->assign('advancedFields',$_smarty_tpl->getVariable('formFields')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>


<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
