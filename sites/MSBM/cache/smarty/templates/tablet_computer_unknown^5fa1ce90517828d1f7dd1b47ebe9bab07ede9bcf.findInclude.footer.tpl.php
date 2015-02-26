<<<<<<< HEAD
<?php /* Smarty version Smarty-3.0.7, created on 2015-02-23 10:33:04
         compiled from "findInclude:common/templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:553554eb4830d6ef88-88317354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
=======
<?php /* Smarty version Smarty-3.0.7, created on 2015-02-25 10:07:30
         compiled from "findInclude:common/templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166296507354ed75c129abb0-74348026%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
>>>>>>> ab25c7a18bf13d6ae04ee4658daffc4301f49165
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fa1ce90517828d1f7dd1b47ebe9bab07ede9bcf' => 
    array (
      0 => 'findInclude:common/templates/footer.tpl',
<<<<<<< HEAD
      1 => 1364684942,
      2 => 'findInclude',
    ),
    'd806b43c0881cbb1da33a2802474f53e8a4485ee' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\common\\templates\\footer.tpl',
      1 => 1364684942,
=======
      1 => 1424848287,
      2 => 'findInclude',
    ),
    '1d1c69f34e9c0832e46bd91151423a2e71d19128' => 
    array (
      0 => '/home/projects/msbm/kurogo/app/common/templates/footer.tpl',
      1 => 1424848287,
>>>>>>> ab25c7a18bf13d6ae04ee4658daffc4301f49165
      2 => 'file',
    ),
    '' => 
    array (
      0 => 'findInclude:common/templates/page/moduleDebug.tpl',
<<<<<<< HEAD
      1 => 1364684942,
      2 => 'findInclude',
    ),
    '369720295b1eb622e3344b5374618464a06284b6' => 
    array (
      0 => 'C:\\MAMP\\htdocs\\msbm\\Kurogo-Mobile-Web\\app\\common\\templates\\page\\login.tpl',
      1 => 1364684942,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '553554eb4830d6ef88-88317354',
=======
      1 => 1424848287,
      2 => 'findInclude',
    ),
    '1675cb49a54703e464cdec691f787b0e1939c86b' => 
    array (
      0 => '/home/projects/msbm/kurogo/app/common/templates/page/login.tpl',
      1 => 1424848287,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166296507354ed75c129abb0-74348026',
>>>>>>> ab25c7a18bf13d6ae04ee4658daffc4301f49165
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!$_smarty_tpl->getVariable('webBridgeAjaxContentLoad')->value&&!$_smarty_tpl->getVariable('ajaxContentLoad')->value){?>
  
  
  

  <?php ob_start(); ?>
    
      <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptFooterBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
        <script type="text/javascript">
          <?php echo $_smarty_tpl->tpl_vars['script']->value;?>
 
        </script>
      <?php }} ?>
    
    
    
      <?php if (strlen($_smarty_tpl->getVariable('GOOGLE_ANALYTICS_ID')->value)){?>
        <script type="text/javascript">
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        </script>
      <?php }?>
    
  <?php  $_smarty_tpl->assign("kgoFooterJavascript", ob_get_contents()); Smarty::$_smarty_vars['capture']["kgoFooterJavascript"]=ob_get_clean();?>
  
  
    <?php echo $_smarty_tpl->getVariable('kgoFooterJavascript')->value;?>

  
  
  
      </div> <!-- container -->
    </div> <!-- container-wrapper -->
  </div> <!-- wrapper -->

  
  
  
  </body>
  </html>
<?php }else{ ?>
  
    <script type="text/javascript">
      <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('inlineJavascriptFooterBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
        <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

      <?php }} ?>
      
      <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onLoadBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
        <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

      <?php }} ?>
    
      <?php if (count($_smarty_tpl->getVariable('onOrientationChangeBlocks')->value)){?>
        addOnOrientationChangeCallback(function () {
          <?php  $_smarty_tpl->tpl_vars['script'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('onOrientationChangeBlocks')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['script']->key => $_smarty_tpl->tpl_vars['script']->value){
?>
            <?php echo $_smarty_tpl->tpl_vars['script']->value;?>

          <?php }} ?>
        });
      <?php }?>
      
      onOrientationChange();
    </script>
  
<?php }?>
