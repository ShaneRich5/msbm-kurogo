<?php /* Smarty version Smarty-3.0.7, created on 2015-02-05 01:48:06
         compiled from "C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\modules\\admin\\templates\\site.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70754d31226bae943-32512192%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b27124b6bd2ea50c27bb8b6adc3178584355dc4' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\Kurogo-Mobile-Web\\\\app\\\\modules\\\\admin\\\\templates\\\\site.tpl',
      1 => 1364684944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70754d31226bae943-32512192',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:modules/admin/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<form method="post" id="adminForm" enctype="multipart/form-data">
<input type="hidden" name="type" value="site" />
<input type="hidden" name="section" id="section" value="<?php echo $_smarty_tpl->getVariable('section')->value;?>
" />
<input type="hidden" name="subsection" id="subsection" value="<?php echo $_smarty_tpl->getVariable('subsection')->value;?>
 /">
<input name="submit" id="adminSubmit" type="submit" value="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("BUTTON_SAVE");?>
" />
<h1 id="sectionTitle">&nbsp;</h1>
<ul id="adminSections"></ul>
<p id="sectionDescription" class="preamble">&nbsp;</p>
<div id="adminFields" class="formfields">

</div>
</form>
<script type="text/javascript">
    var adminSection = '<?php echo $_smarty_tpl->getVariable('section')->value;?>
';
    var adminSubsection = '<?php echo $_smarty_tpl->getVariable('subsection')->value;?>
';
</script>
<?php $_template = new Smarty_Internal_Template("findInclude:modules/admin/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
