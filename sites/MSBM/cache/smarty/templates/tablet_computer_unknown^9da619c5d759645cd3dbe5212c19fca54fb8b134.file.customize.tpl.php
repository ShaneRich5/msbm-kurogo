<?php /* Smarty version Smarty-3.0.7, created on 2015-02-05 22:09:52
         compiled from "C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\modules\\home\\templates\\customize.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1767854d43080bc0c33-08139398%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9da619c5d759645cd3dbe5212c19fca54fb8b134' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\Kurogo-Mobile-Web\\\\app\\\\modules\\\\home\\\\templates\\\\customize.tpl',
      1 => 1364684944,
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/formButtonLink.tpl',
      1 => 1364684942,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '1767854d43080bc0c33-08139398',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:\MAMP\htdocs\msbm\Kurogo-Mobile-Web\lib\smarty\plugins\modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<?php if ($_smarty_tpl->getVariable('allowCustomize')->value){?>

  <div class="nonfocal smallprint"> 
    <?php if ($_smarty_tpl->getVariable('customizeUserContextList')->value){?>
    
    <div id="customizeUserContextList" class="userContextList">
    <p><?php echo $_smarty_tpl->getVariable('customizeUserContextListDescription')->value;?>
</p>
    <ul>
    <?php  $_smarty_tpl->tpl_vars['contextItem'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('customizeUserContextList')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['contextItem']->key => $_smarty_tpl->tpl_vars['contextItem']->value){
?>
    <li context="<?php echo $_smarty_tpl->tpl_vars['contextItem']->value['context'];?>
" url="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['contextItem']->value['url']);?>
"<?php if ($_smarty_tpl->tpl_vars['contextItem']->value['active']){?> class="contextSelected"<?php }?>><a href="#" onclick="return customizeSetUserContext(this, 'customizemodules');"><?php echo $_smarty_tpl->tpl_vars['contextItem']->value['title'];?>
</a></li>
    <?php }} ?>
    </ul>
    <p><?php echo $_smarty_tpl->getVariable('customizeUserContextListDescriptionFooter')->value;?>
</p>
    </div>
    
    <?php }else{ ?>
    <?php echo $_smarty_tpl->getVariable('customizeInstructions')->value;?>

    <?php }?>
  </div> 

  <div id="customizemodules">  
  <?php $_template = new Smarty_Internal_Template("findInclude:modules/home/templates/customizemodules.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->properties['nocache_hash']  = '1767854d43080bc0c33-08139398';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2015-02-05 22:09:52
         compiled from "findInclude:modules/home/templates/customizemodules.tpl" */ ?>
  <ul class="nav iconic" id="homepageList">
    <?php  $_smarty_tpl->tpl_vars['info'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('modules')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['info']->key => $_smarty_tpl->tpl_vars['info']->value){
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['info']->key;
?>
      <li id="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" class="<?php if ($_smarty_tpl->tpl_vars['info']->value['visible']){?>moduleVisible<?php }else{ ?>moduleHidden<?php }?>">
        <?php if ($_smarty_tpl->tpl_vars['info']->value['hideable']){?>
          <input type="checkbox" onclick="toggle(this);"<?php if ($_smarty_tpl->tpl_vars['info']->value['visible']){?> checked="checked"<?php }?> />
        <?php }?>
        <span class="nolinkbuttons"> 
          <a href="#" onclick="moveUp(this); return false;" class="moveup"><img src="/modules/<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
/images/button-up.png" border="0" alt="Up" /></a>
          <a href="#" onclick="moveDown(this); return false;" class="movedown"><img src="/modules/<?php echo $_smarty_tpl->getVariable('configModule')->value;?>
/images/button-down.png" border="0" alt="Down" /></a> 
        </span> 
        <span class="nolink">
          <img src="<?php echo $_smarty_tpl->tpl_vars['info']->value['img'];?>
" width="30" height="30" class="homeicon" /><?php echo $_smarty_tpl->tpl_vars['info']->value['title'];?>

        </span>                   
      </li>
    <?php }} ?>
  </ul>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:modules/home/templates/customizemodules.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  </div>
  <div class="formbuttons">
    <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/formButtonLink.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('buttonTitle',$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("CUSTOMIZE_RETURN_HOME"));$_template->assign('buttonURL',"index");$_template->properties['nocache_hash']  = '1767854d43080bc0c33-08139398';
$_tpl_stack[] = $_smarty_tpl; $_smarty_tpl = $_template;?>
<?php /* Smarty version Smarty-3.0.7, created on 2015-02-05 22:09:52
         compiled from "findInclude:common/templates/formButtonLink.tpl" */ ?>

<a href="<?php if ($_smarty_tpl->getVariable('buttonURL')->value){?><?php echo $_smarty_tpl->getVariable('buttonURL')->value;?>
<?php }else{ ?>javascript:void(0);<?php }?>" class="formbutton"<?php if ($_smarty_tpl->getVariable('buttonOnclick')->value){?> onclick="<?php echo $_smarty_tpl->getVariable('buttonOnclick')->value;?>
"<?php }?>>
  <div><?php echo $_smarty_tpl->getVariable('buttonTitle')->value;?>
</div>
</a>
<?php $_smarty_tpl->updateParentVariables(0);?>
<?php /*  End of included template "findInclude:common/templates/formButtonLink.tpl" */ ?>
<?php $_smarty_tpl = array_pop($_tpl_stack);?><?php unset($_template);?>
  </div>

<?php }else{ ?>
<div class="focal">
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("CUSTOMIZE_DISABLED");?>

</div>
<?php }?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
