<?php /* Smarty version Smarty-3.0.7, created on 2015-02-10 16:02:37
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\courses\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1806154da71ed46e302-46371310%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd46393d19fc20fd1738d317b2402b70d8d6b15dc' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\courses\\\\templates\\\\index.tpl',
      1 => 1423602155,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1806154da71ed46e302-46371310',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h3 class="focal"><?php echo $_smarty_tpl->getVariable('info')->value;?>
</h3>
<h1 class="focal">My Courses</h1>
<?php  $_smarty_tpl->tpl_vars['course'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('coursesList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['course']->key => $_smarty_tpl->tpl_vars['course']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['course']->key;
?>
    <?php if ($_smarty_tpl->tpl_vars['course']->value){?>
        <p class="focal"><?php echo $_smarty_tpl->tpl_vars['course']->value['id'];?>
 <?php echo $_smarty_tpl->tpl_vars['course']->value['shortname'];?>
 <?php echo $_smarty_tpl->tpl_vars['course']->value['fullname'];?>
 <?php echo $_smarty_tpl->tpl_vars['course']->value['usercount'];?>
 <?php echo $_smarty_tpl->tpl_vars['course']->value['idnumber'];?>
 <a href="<?php echo $_smarty_tpl->tpl_vars['course']->value['url'];?>
">link</a></p>
    <?php }?>
<?php }} ?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>