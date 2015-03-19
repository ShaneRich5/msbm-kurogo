<?php /* Smarty version Smarty-3.0.7, created on 2015-03-18 16:50:49
         compiled from "C:\\MAMP\\htdocs\\msbm\\sites\\MSBM\\app\\modules\\bookings\\templates\\create.tpl" */ ?>
<?php /*%%SmartyHeaderCode:104065509e5298a33d8-06277354%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e53253d9ea377603a2cc107f0cec186e6d990c77' => 
    array (
      0 => 'C:\\\\MAMP\\\\htdocs\\\\msbm\\\\sites\\\\MSBM\\\\app\\\\modules\\\\bookings\\\\templates\\\\create.tpl',
      1 => 1426653891,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104065509e5298a33d8-06277354',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/header.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>

<div class="focal">
    <h1>Create an event</h1>

    <form action="create" method="post">
        <h2>ID: <?php echo $_smarty_tpl->getVariable('id')->value;?>
</h2>
        <p>
            <label for="event-name">Name: </label>
            <input id="event-name" type="text" name="event-name">
        </p>

        <div>
            <h2>Start</h2>
            <h3>Date</h3>
            <p>
                <label for="start-date-year">Year: </label>
                <input id="start-date-year" type="number" name="start-date-year" min="2000" max="3000">
                <label for="start-date-month">Month: </label>
                <input id="start-date-month" type="number" name="start-date-month" min="1" max="12">
                <label for="start-date-day">Day: </label>
                <input id="start-date-day" type="number" name="start-date-day" min="1" max="31">
            </p>
            <h3>Time</h3>
            <p>
                <label for="start-date-hour">Hour: </label>
                <input id="start-date-hour" type="text" name="start-date-hour" min="1" max="12">
                <label for="start-date-minute">Minutes: </label>
                <input id="start-date-minute" type="text" name="start-date-minute" min="0" max="59">
                <select id="start-date-am-pm" name="start-date-am-pm">
                    <option value="AM">A.M.</option>
                    <option value="PM">P.M.</option>
                </select>
            </p>
        </div>

        <h2>End</h2>
        <div>
            <h3>Date</h3>
            <p>
                <label for="end-date-year">Year: </label>
                <input id="end-date-year" type="text" name="end-date-year" min="2000" max="3000">
                <label for="end-date-month">Month: </label>
                <input id="end-date-month" type="text" name="end-date-month" min="1" max="12">
                <label for="end-date-day">Day: </label>
                <input id="end-date-day" type="text" name="end-date-day" min="1" max="31">
            </p>
            <h3>Time</h3>
            <p>
                <label for="end-date-hour">Hour: </label>
                <input id="end-date-hour" type="text" name="end-date-hour" min="1" max="12">
                <label for="end-date-minute">Minutes: </label>
                <input id="end-date-minute" type="text" name="end-date-minute" min="0" max="59">
                <select id="end-date-am-pm" name="end-date-am-pm">
                    <option value="AM">A.M.</option>
                    <option value="PM">P.M.</option>
                </select>
            </p>
        </div>
        <p>
            <label for="moodle-email">Created by: </label>
            <input type="email" id="moodle-email" name="moodle-email" value="<?php echo $_smarty_tpl->getVariable('email')->value;?>
" readonly>
        </p>
        <p>
            <label for="event-location">Location: </label>
            <select id="event-location" name="event-location">
                <?php  $_smarty_tpl->tpl_vars['location'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('locations')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['location']->key => $_smarty_tpl->tpl_vars['location']->value){
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['location']->value['name'];?>
</option>
                <?php }} ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Book">
            <input type="reset" value="Clear">
        </p>

    </form>

</div>

<?php $_template = new Smarty_Internal_Template("findInclude:common/templates/footer.tpl", $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate();?><?php unset($_template);?>