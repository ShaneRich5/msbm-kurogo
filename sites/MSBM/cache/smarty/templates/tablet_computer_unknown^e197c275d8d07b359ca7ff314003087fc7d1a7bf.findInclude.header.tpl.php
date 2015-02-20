<?php /* Smarty version Smarty-3.0.7, created on 2015-02-20 12:15:23
         compiled from "findInclude:modules/admin/templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:390054e76babda7ab2-69230967%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e197c275d8d07b359ca7ff314003087fc7d1a7bf' => 
    array (
      0 => 'findInclude:modules/admin/templates/header.tpl',
      1 => 1364684944,
      2 => 'findInclude',
    ),
  ),
  'nocache_hash' => '390054e76babda7ab2-69230967',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_modifier_escape')) include 'C:\MAMP\htdocs\msbm\Kurogo-Mobile-Web\lib\smarty\plugins\modifier.escape.php';
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php echo $_smarty_tpl->getVariable('charset')->value;?>
" />
<!--[if lt IE 9]>
<script src="<?php echo $_smarty_tpl->getVariable('http_protocol')->value;?>
://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
  <?php if ($_smarty_tpl->getVariable('session_max_idle')->value){?>
    <meta http-equiv="refresh" content="<?php echo $_smarty_tpl->getVariable('session_max_idle')->value+2;?>
" />
  <?php }?>
  <title><?php echo $_smarty_tpl->getVariable('moduleName')->value;?>
<?php if (!$_smarty_tpl->getVariable('isModuleHome')->value){?>: <?php echo $_smarty_tpl->getVariable('pageTitle')->value;?>
<?php }?></title>
  <link rel="shortcut icon" href="/favicon.ico" />
  <link href="<?php echo $_smarty_tpl->getVariable('minify')->value['css'];?>
" rel="stylesheet" media="all" type="text/css"/>
  <?php  $_smarty_tpl->tpl_vars['css'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineCSSBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['css']->key => $_smarty_tpl->tpl_vars['css']->value){
?>
    <style type="text/css" media="screen">
      <?php echo $_smarty_tpl->tpl_vars['css']->value;?>

    </style>
  <?php }} ?>
  <?php  $_smarty_tpl->tpl_vars['cssURL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('cssURLs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['cssURL']->key => $_smarty_tpl->tpl_vars['cssURL']->value){
?>
    <link href="<?php echo $_smarty_tpl->tpl_vars['cssURL']->value;?>
" rel="stylesheet" media="all" type="text/css"/>
  <?php }} ?>
    <script type="text/javascript">var URL_BASE='<?php echo @URL_BASE;?>
';</script>
    <?php  $_smarty_tpl->tpl_vars['inlineJavascriptBlock'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['inlineJavascriptBlock']->key => $_smarty_tpl->tpl_vars['inlineJavascriptBlock']->value){
?>
      <script type="text/javascript"><?php echo $_smarty_tpl->tpl_vars['inlineJavascriptBlock']->value;?>
</script>
    <?php }} ?>
    
    <?php  $_smarty_tpl->tpl_vars['url'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('javascriptURLs')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['url']->key => $_smarty_tpl->tpl_vars['url']->value){
?>
      <script src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
" type="text/javascript"></script>
    <?php }} ?>
    
    <script src="<?php echo $_smarty_tpl->getVariable('minify')->value['js'];?>
" type="text/javascript"></script>
</head>
<body>
<div id="pagewrap">
<header>
	<a href="<?php echo @URL_BASE;?>
"><img src="/modules/admin/images/kurogo-logo.png" alt="Kurogo" width="90" height="90" id="logo" border="0" /></a>
	<h1>	
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("KUROGO_ADMIN_TITLE");?>

		<span id="sitename"><?php echo $_smarty_tpl->getVariable('strings')->value['SITE_NAME'];?>
</span>
	</h1>
	<div id="utility">
        <?php if ($_smarty_tpl->getVariable('session_isLoggedIn')->value){?><div id="user"><?php echo $_smarty_tpl->getVariable('footerLoginText')->value;?>
 <a id="signout" href="<?php echo $_smarty_tpl->getVariable('session_logout_url')->value;?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['getLocalizedString'][0][0]->getLocalizedString("SIGN_OUT");?>
</a></div>
        <?php }?>
	</div>
</header>

<div id="contentwrap">
	<nav>
		<ul>
		<?php  $_smarty_tpl->tpl_vars['navSection'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('navSections')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['navSection']->key => $_smarty_tpl->tpl_vars['navSection']->value){
?>
        <li><a href="<?php echo $_smarty_tpl->tpl_vars['navSection']->value['url'];?>
" title="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['navSection']->value['description']);?>
"><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['navSection']->value['title']);?>
</a>
        <?php if ($_smarty_tpl->getVariable('page')->value==$_smarty_tpl->tpl_vars['navSection']->value['id']&&$_smarty_tpl->getVariable('subNavSections')->value){?>
        <ul>
		<?php  $_smarty_tpl->tpl_vars['subNavSection'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subNavSections')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subNavSection']->key => $_smarty_tpl->tpl_vars['subNavSection']->value){
?>
            <li><a<?php if ($_smarty_tpl->tpl_vars['subNavSection']->value['id']==$_smarty_tpl->getVariable('section')->value){?> class="current"<?php }?> href="<?php echo $_smarty_tpl->tpl_vars['subNavSection']->value['url'];?>
" section="<?php echo $_smarty_tpl->tpl_vars['subNavSection']->value['id'];?>
"><?php if ($_smarty_tpl->tpl_vars['subNavSection']->value['img']){?><img src="<?php echo $_smarty_tpl->tpl_vars['subNavSection']->value['img'];?>
" height="16" /> <?php }?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['subNavSection']->value['title']);?>
</a></li>
        <?php }} ?>
        </ul>
        <?php }?>
        </li>
        <?php }} ?>
        </ul>
	</nav>
	
	<div id="content">
    <div id="message"></div>
