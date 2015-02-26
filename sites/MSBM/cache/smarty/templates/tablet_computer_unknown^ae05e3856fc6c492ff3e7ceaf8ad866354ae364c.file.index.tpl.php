<?php /* Smarty version Smarty-3.0.7, created on 2015-02-25 02:15:13
         compiled from "/home/projects/msbm/sites/MSBM/app/modules/courses/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34579050354ed76818fd3d1-19661511%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae05e3856fc6c492ff3e7ceaf8ad866354ae364c' => 
    array (
      0 => '/home/projects/msbm/sites/MSBM/app/modules/courses/templates/index.tpl',
      1 => 1424848288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34579050354ed76818fd3d1-19661511',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<h2 class="focal">Login</h2>
<div class="focal">
    <form action="index" method="post">
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
<div class="focal"><p>
        <?php echo $_smarty_tpl->getVariable('token')->value;?>

        <?php echo $_smarty_tpl->getVariable('username')->value;?>

        <?php echo $_smarty_tpl->getVariable('password')->value;?>

    </p></div>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>