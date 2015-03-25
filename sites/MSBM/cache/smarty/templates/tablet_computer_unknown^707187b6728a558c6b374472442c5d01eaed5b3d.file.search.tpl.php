<?php /* Smarty version Smarty-3.0.7, created on 2015-03-24 14:26:16
         compiled from "C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\modules\\calendar\\templates\\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:316795511ac48031fc6-28404286%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '707187b6728a558c6b374472442c5d01eaed5b3d' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\Kurogo-Mobile-Web\\\\app\\\\modules\\\\calendar\\\\templates\\\\search.tpl',
      1 => 1425410390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '316795511ac48031fc6-28404286',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:\MAMP\htdocs\msbm\Kurogo-Mobile-Web\lib\smarty\plugins\modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php ob_start(); ?>
<?php if ($_smarty_tpl->getVariable('totalFeeds')->value>1){?>
  <select id="calendars" name="calendar">
  <?php  $_smarty_tpl->tpl_vars['typeFeeds'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('feeds')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['typeFeeds']->key => $_smarty_tpl->tpl_vars['typeFeeds']->value){
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['typeFeeds']->key;
?>
  <?php if (count($_smarty_tpl->getVariable('feeds')->value)>1){?>
  <optgroup label="<?php echo $_smarty_tpl->tpl_vars['type']->value;?>
">
  <?php }?>
  <?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['feed'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['typeFeeds']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value){
 $_smarty_tpl->tpl_vars['feed']->value = $_smarty_tpl->tpl_vars['title']->key;
?>
      <option value="<?php echo $_smarty_tpl->tpl_vars['feed']->value;?>
"<?php if ($_smarty_tpl->getVariable('searchCalendar')->value==$_smarty_tpl->tpl_vars['feed']->value){?> selected<?php }?>>in <?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['title']->value);?>
</option>
  <?php }} ?>
  <?php if (count($_smarty_tpl->getVariable('feeds')->value)>1){?>
  </optgroup>
  <?php }?>
  <?php }} ?>
  </select>
<?php }elseif(strlen($_smarty_tpl->getVariable('searchCalendar')->value)){?>
<input type="hidden" name="calendar" value="<?php echo $_smarty_tpl->getVariable('searchCalendar')->value;?>
" />
<?php }?>
  <select id="timeframe" name="timeframe">
    <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('searchOptions')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
      <option value="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->getVariable('selectedOption')->value==$_smarty_tpl->tpl_vars['key']->value){?> selected="selected"<?php }?> >
        <?php echo $_smarty_tpl->tpl_vars['option']->value['phrase'];?>

      </option>
    <?php }} ?>
  </select>
<?php  $_smarty_tpl->assign("selectSection", ob_get_contents()); Smarty::$_smarty_vars['capture']["selectSection"]=ob_get_clean();?>

<?php $_smarty_tpl->tpl_vars['resultCount'] = new Smarty_variable(count($_smarty_tpl->getVariable('events')->value), null, null);?>
<?php if (!$_smarty_tpl->getVariable('resultCount')->value){?>
  <?php $_smarty_tpl->tpl_vars['resultCount'] = new Smarty_variable(null, null, null);?>
<?php }?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/search.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('additionalInputs',$_smarty_tpl->getVariable('selectSection')->value);$_template->assign('resultCount',$_smarty_tpl->getVariable('resultCount')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->getVariable('events')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
