<?php /* Smarty version Smarty-3.0.7, created on 2015-03-09 11:34:50
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1478354fdbd9a0a6ad3-01889421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1b5c95bb4f8ff5ef2d8b864eab673885dfe314ac' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\login.tpl',
      1 => 1425915287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1478354fdbd9a0a6ad3-01889421',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h2 class="focal">Login</h2>
<div class="focal">
    <form action="login" method="post">
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
<?php if ($_smarty_tpl->getVariable('error')->value){?>
    <div class="focal"><?php echo $_smarty_tpl->getVariable('error')->value;?>
</div>
<?php }?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>