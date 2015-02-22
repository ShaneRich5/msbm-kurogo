<?php /* Smarty version Smarty-3.0.7, created on 2015-02-20 18:37:13
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2000554e7c5298ceba7-41420922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '983f9412f287ff2d301c6fa806c85ce5f6848420' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\index.tpl',
      1 => 1424475413,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2000554e7c5298ceba7-41420922',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h2 class="focal">Login</h2>
<div class="focal">
    <form action="all" method="post">
        <p>
            <label for="username">Username: </label>
            <input id="username" type="text" name="username">
        </p>

        <p>
            <label for="password">Password: </label>
            <input id="password" type="password" name="password">
        </p>
        <p>
            <input type="submit" value="Login">
        </p>
    </form>
</div>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>