<?php /* Smarty version Smarty-3.0.7, created on 2015-03-03 13:41:52
         compiled from "/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/app/modules/kurogo/templates/error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:102033776154f600702bb5d5-61523097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1012c4a5fda6f7c4901968fa45c127e7e9616a9c' => 
    array (
      0 => '/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/app/modules/kurogo/templates/error.tpl',
      1 => 1425407566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102033776154f600702bb5d5-61523097',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include '/home/fearon/msbm-kurogo/Kurogo-Mobile-Web/lib/smarty/plugins/modifier.escape.php';
?><?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="focal">
  <p><?php echo $_smarty_tpl->getVariable('message')->value;?>
</p>

  <?php if (isset($_smarty_tpl->getVariable('url',null,true,false)->value)&&!$_smarty_tpl->getVariable('ajaxContentLoad')->value){?>
    <p>
      <a href="<?php echo smarty_modifier_escape($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['sanitize_url'][0][0]->smartyModifierSanitizeURL($_smarty_tpl->getVariable('url')->value));?>
"><?php echo $_smarty_tpl->getVariable('linkText')->value;?>
</a>
    </p>
  <?php }?>
</div>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
