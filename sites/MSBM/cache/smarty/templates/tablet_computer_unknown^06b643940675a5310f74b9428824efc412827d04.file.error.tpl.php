<?php /* Smarty version Smarty-3.0.7, created on 2015-03-24 14:42:21
         compiled from "C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\modules\\kurogo\\templates\\error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:245915511b00d6f6c72-12682917%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06b643940675a5310f74b9428824efc412827d04' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\Kurogo-Mobile-Web\\\\app\\\\modules\\\\kurogo\\\\templates\\\\error.tpl',
      1 => 1425410390,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '245915511b00d6f6c72-12682917',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:\MAMP\htdocs\msbm\Kurogo-Mobile-Web\lib\smarty\plugins\modifier.escape.php';
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
