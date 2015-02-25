<?php /* Smarty version Smarty-3.0.7, created on 2015-02-25 10:17:02
         compiled from "/home/projects/msbm/sites/MSBM/app/modules/courses/templates/all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107613699154ede76e60bae6-00434810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c65eaacfc626fb6208431fcaddb44389824ba25' => 
    array (
      0 => '/home/projects/msbm/sites/MSBM/app/modules/courses/templates/all.tpl',
      1 => 1424848288,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107613699154ede76e60bae6-00434810',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<div class="focal"><?php ob_start();?><?php echo $_smarty_tpl->getVariable('token')->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_tmp1;?>
</div>

<<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/results.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('results',$_smarty_tpl->getVariable('coursesList')->value); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>