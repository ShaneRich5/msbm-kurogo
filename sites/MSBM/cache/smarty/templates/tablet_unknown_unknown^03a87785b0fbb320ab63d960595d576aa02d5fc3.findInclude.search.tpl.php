<?php /* Smarty version Smarty-3.0.7, created on 2015-03-18 17:38:07
         compiled from "findInclude:common/templates/search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11663437235509f03f8326b1-73211156%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03a87785b0fbb320ab63d960595d576aa02d5fc3' => 
    array (
      0 => 'findInclude:common/templates/search.tpl',
      1 => 1426359653,
      2 => 'findInclude',
    ),
    '3d8d2c3f42ccbf031c0444c6bf3f1442b3d86460' => 
    array (
      0 => '/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/app/common/templates/search.tpl',
      1 => 1426359653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11663437235509f03f8326b1-73211156',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><?php ob_start(); ?>
  <?php if ((!isset($_smarty_tpl->getVariable('searchPage',null,true,false)->value)&&($_smarty_tpl->getVariable('page')->value=='search'))||($_smarty_tpl->getVariable('page')->value==$_smarty_tpl->getVariable('searchPage')->value)){?>
    <?php $_smarty_tpl->tpl_vars['hiddenArgs'] = new Smarty_variable($_smarty_tpl->getVariable('breadcrumbSamePageArgs')->value, null, null);?>
  <?php }else{ ?>
    <?php $_smarty_tpl->tpl_vars['hiddenArgs'] = new Smarty_variable($_smarty_tpl->getVariable('breadcrumbArgs')->value, null, null);?>
  <?php }?>
  
  <?php if (isset($_smarty_tpl->getVariable('extraArgs',null,true,false)->value)){?>
    <?php $_smarty_tpl->tpl_vars['hiddenArgs'] = new Smarty_variable(array_merge($_smarty_tpl->getVariable('extraArgs')->value,$_smarty_tpl->getVariable('hiddenArgs')->value), null, null);?>
  <?php }?>
  <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
 $_smarty_tpl->tpl_vars['arg'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hiddenArgs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
 $_smarty_tpl->tpl_vars['arg']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
    <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['arg']->value;?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['value']->value);?>
" />
  <?php }} ?>
<?php  $_smarty_tpl->assign("hiddenArgHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["hiddenArgHTML"]=ob_get_clean();?>

<?php ob_start(); ?>
  <?php if ($_smarty_tpl->getVariable('inlineSearchError')->value){?>
    <p><?php echo $_smarty_tpl->getVariable('inlineSearchError')->value;?>
</p>
  <?php }elseif(isset($_smarty_tpl->getVariable('resultCount',null,true,false)->value)){?>
    <?php if ($_smarty_tpl->getVariable('resultCount')->value==0){?>
      <p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("NO_MATCHES_FOUND");?>
</p>
    <?php }elseif($_smarty_tpl->getVariable('resultCount')->value==1){?>
      <p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("ONE_MATCH_FOUND");?>
</p>
    <?php }else{ ?>
      <p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("NUM_MATCHES_FOUND",$_smarty_tpl->getVariable('resultCount')->value);?>
</p>
    <?php }?>
  <?php }?>
<?php  $_smarty_tpl->assign("inlineErrorHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["inlineErrorHTML"]=ob_get_clean();?>

<?php ob_start(); ?>
  <?php if (isset($_smarty_tpl->getVariable('tip',null,true,false)->value)){?>
    <p class="legend nonfocal">
      <strong><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SEARCH_TIP_TITLE");?>
</strong> <?php echo $_smarty_tpl->getVariable('tip')->value;?>

    </p>
  <?php }?>
<?php  $_smarty_tpl->assign("tipHTML", ob_get_contents()); Smarty::$_smarty_vars['capture']["tipHTML"]=ob_get_clean();?>

<?php $_smarty_tpl->tpl_vars['searchAction'] = new Smarty_variable((($tmp = @$_smarty_tpl->getVariable('searchPage')->value)===null||$tmp==='' ? "/".($_smarty_tpl->getVariable('configModule')->value)."/search" : $tmp), null, null);?>


  <?php if (!$_smarty_tpl->getVariable('insideForm')->value){?>
    <div class="nonfocal" id="searchformcontainer">
      <form method="get" action="<?php echo $_smarty_tpl->getVariable('searchAction')->value;?>
">
  <?php }?>
  
        <fieldset class="inputcombo<?php if ((($tmp = @$_smarty_tpl->getVariable('emphasized')->value)===null||$tmp==='' ? $_smarty_tpl->getVariable('isModuleHome')->value : $tmp)){?> emphasized<?php }?>">
          <input class="forminput" type="text" id="<?php echo (($tmp = @$_smarty_tpl->getVariable('inputName')->value)===null||$tmp==='' ? 'filter' : $tmp);?>
" name="<?php echo (($tmp = @$_smarty_tpl->getVariable('inputName')->value)===null||$tmp==='' ? 'filter' : $tmp);?>
" placeholder="<?php echo (($tmp = @$_smarty_tpl->getVariable('placeholder')->value)===null||$tmp==='' ? '' : $tmp);?>
" value="<?php echo smarty_modifier_escape($_smarty_tpl->getVariable('searchTerms')->value);?>
" />
          <input class="hiddensubmit" type="submit" value="submit" />
          <?php echo $_smarty_tpl->getVariable('hiddenArgHTML')->value;?>

        </fieldset>
        <?php if (isset($_smarty_tpl->getVariable('additionalInputs',null,true,false)->value)){?>
          <fieldset>
            <?php echo $_smarty_tpl->getVariable('additionalInputs')->value;?>

          </fieldset>
        <?php }?>
        <?php echo $_smarty_tpl->getVariable('tipHTML')->value;?>

        <?php echo $_smarty_tpl->getVariable('inlineErrorHTML')->value;?>

      
  <?php if (!$_smarty_tpl->getVariable('insideForm')->value){?>
      </form>
    </div>
  <?php }?>

