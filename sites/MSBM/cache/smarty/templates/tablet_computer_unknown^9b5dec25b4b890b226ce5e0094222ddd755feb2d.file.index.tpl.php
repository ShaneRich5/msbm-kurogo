<?php /* Smarty version Smarty-3.0.7, created on 2015-03-18 18:21:07
         compiled from "C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\modules\\links\\templates\\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:261885509fa537a2238-82862748%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b5dec25b4b890b226ce5e0094222ddd755feb2d' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\Kurogo-Mobile-Web\\\\app\\\\modules\\\\links\\\\templates\\\\index.tpl',
      1 => 1425410391,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '261885509fa537a2238-82862748',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>


<?php if (isset($_smarty_tpl->getVariable('description',null,true,false)->value)&&strlen($_smarty_tpl->getVariable('description')->value)){?>

  <p class="nonfocal smallprint">
    <?php echo $_smarty_tpl->getVariable('description')->value;?>

  </p>

<?php }?>


<?php if ($_smarty_tpl->getVariable('displayType')->value=='springboard'){?>
  <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/springboard.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('springboardItems',$_smarty_tpl->getVariable('links')->value);$_template->assign('springboardID',"links"); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }elseif($_smarty_tpl->getVariable('displayType')->value=='list'){?>
  <?php $_template = new Smarty_Internal_Template("findInclude:common/templates/navlist.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
$_template->assign('navlistItems',$_smarty_tpl->getVariable('links')->value);$_template->assign('subTitleNewline',true); echo $_template->getRenderedTemplate();?><?php unset($_template);?>
<?php }?>

<p class="clear"> </p>

<?php if (isset($_smarty_tpl->getVariable('description_footer',null,true,false)->value)&&strlen($_smarty_tpl->getVariable('description_footer')->value)){?>

  <p class="nonfocal smallprint">
    <?php echo $_smarty_tpl->getVariable('description_footer')->value;?>

  </p>

<?php }?>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>
