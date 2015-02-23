<?php /* Smarty version Smarty-3.0.7, created on 2015-02-22 18:24:18
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\courses\\templates\\details.tpl" */ ?>
<?php /*%%SmartyHeaderCode:555054ea6522c84964-44700200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c079d2a50f5d8d94efbc738644eb40cddd78a139' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\courses\\\\templates\\\\details.tpl',
      1 => 1424647455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '555054ea6522c84964-44700200',
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
    <ul class="results">
        <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['content']->value['section_details']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
?>
            <li>
                <?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

                <?php echo $_smarty_tpl->tpl_vars['item']->value['contents'];?>

            </li>
        <?php }} ?>
    </ul>
    </div>
<?php }} ?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>