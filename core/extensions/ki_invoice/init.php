<?php

// ==================================
// = implementing standard includes =
// ==================================
include('../../includes/basics.php');

$usr = checkUser();

// set smarty config
require_once('../../libraries/smarty/Smarty.class.php');
$tpl = new Smarty();
$tpl->template_dir = 'templates/';
$tpl->compile_dir  = 'compile/';

$tpl->assign('kga', $kga);

if ($kga['server_conn'] == 'pdo') {

// select for projects
$sel = makeSelectBox("pct",$kga['usr']['usr_grp']);
$tpl->assign('sel_pct_names', $sel[0]);
$tpl->assign('sel_pct_IDs',   $sel[1]);

$tpl->assign('sel_round_names', array('0.5h', '1.0h') );
$tpl->assign('sel_round_IDs',   array(5, 10) );

$timespace = get_timespace();
$tpl->assign('in', $timespace[0]);
$tpl->assign('out', $timespace[1]);

$tpl->assign('timespan_display', $tpl->fetch("timespan.tpl"));

$tpl->display('main.tpl');

}

else {
$tpl->display('unusable.tpl');
}

?>