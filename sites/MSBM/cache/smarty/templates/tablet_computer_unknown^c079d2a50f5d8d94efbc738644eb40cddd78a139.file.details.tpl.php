<?php /* Smarty version Smarty-3.0.7, created on 2015-03-18 19:19:56
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\courses\\templates\\details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17322550a081cc323d1-14593351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c079d2a50f5d8d94efbc738644eb40cddd78a139' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\courses\\\\templates\\\\details.tpl',
      1 => 1426716358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17322550a081cc323d1-14593351',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php  $_smarty_tpl->tpl_vars['content'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('contentList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['content']->key => $_smarty_tpl->tpl_vars['content']->value){
?>
    <h1 class="focal"><?php echo $_smarty_tpl->tpl_vars['content']->value['section_name'];?>
</h1>

    <div class="focal">

    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->tpl_vars['content']->value['section_details']); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

    </div>
<?php }} ?>
<form action="details" method="post">
    <input type="submit" value="Participate">
</form>
<form action="logout" method="post">
    <input type="submit" value="Logout">
</form>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>