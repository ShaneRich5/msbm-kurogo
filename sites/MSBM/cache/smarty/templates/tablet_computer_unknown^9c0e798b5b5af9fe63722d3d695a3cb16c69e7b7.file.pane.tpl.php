<?php /* Smarty version Smarty-3.0.7, created on 2015-02-25 10:07:30
         compiled from "/home/projects/msbm/kurogo/app/modules/emergency/templates/pane.tpl" */ ?>
<?php /*%%SmartyHeaderCode:171687476854ed76110a9e14-20735156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c0e798b5b5af9fe63722d3d695a3cb16c69e7b7' => 
    array (
      0 => '/home/projects/msbm/kurogo/app/modules/emergency/templates/pane.tpl',
      1 => 1424848287,
      2 => 'file',
    ),
    '1be818425efe613df6108205a7fc39d7491ae20f' => 
    array (
      0 => '/home/projects/msbm/kurogo/app/common/templates/pane.tpl',
      1 => 1424848287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '171687476854ed76110a9e14-20735156',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_date_format')) include '/home/projects/msbm/kurogo/lib/smarty/plugins/modifier.date_format.php';
?>
  <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineCSSBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
?>
    <style type="text/css" media="screen">
      <?php echo $_smarty_tpl->tpl_vars['css']->value;?>

    </style>
  <?php }} ?>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>



  <?php if (count($_smarty_tpl->getVariable('onOrientationChangeBlocks')->value)){?>
    <script type="text/javascript">
      registerPaneResizeHandler(function () {
        <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onOrientationChangeBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?><?php echo $_smarty_tpl->tpl_vars['script']->value;?>
<?php }} ?>
      });
    </script>
  <?php }?>



  <div class="emergency-module-link-wrapper">
    <?php $_smarty_tpl->tpl_vars['emergencyPaneInstanceId'] = new Smarty_variable(($_smarty_tpl->getVariable('configModule')->value)."PaneInstanceId", null, null);?>
    <a id="<?php echo $_smarty_tpl->getVariable('emergencyPaneInstanceId')->value;?>
" class="emergency-module-link" href="<?php echo $_smarty_tpl->getVariable('emergencyModuleURL')->value;?>
">
      <div class="emergency-notice-wrapper">
        <?php if ($_smarty_tpl->getVariable('hasNotice')->value){?>
            <div class="emergency-notice<?php if ($_smarty_tpl->getVariable('emergencyNotice')->first){?> emergency-featured<?php }?>">
              <div class="title"><?php echo $_smarty_tpl->getVariable('title')->value;?>
</div>
              <div class="pubdate"><?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('date')->value,$_smarty_tpl->getVariable('dateFormat')->value);?>
 <?php echo smarty_modifier_date_format($_smarty_tpl->getVariable('date')->value,$_smarty_tpl->getVariable('timeFormat')->value);?>
</div>
              <div class="content"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['sanitize_html'][0][0]->smartyModifierSanitizeHTML($_smarty_tpl->getVariable('text')->value,"inline|block|list");?>
</div>
            </div>
        <?php }else{ ?>
          <?php echo $_smarty_tpl->getVariable('moduleStrings')->value['NO_EMERGENCY'];?>

        <?php }?>
      </div>
    </a>
  </div>
  <script type="text/javascript">
    var <?php echo $_smarty_tpl->getVariable('configModule')->value;?>
PaneEllipsizer = new ellipsizer();
    var elem = document.getElementById('<?php echo $_smarty_tpl->getVariable('emergencyPaneInstanceId')->value;?>
');
    if (elem) <?php echo $_smarty_tpl->getVariable('configModule')->value;?>
PaneEllipsizer.addElement(elem);
  </script>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptFooterBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>



  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onLoadBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>
  <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onOrientationChangeBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
    <script type="text/javascript">
      <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

    </script>
  <?php }} ?>

