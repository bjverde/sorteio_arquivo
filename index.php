<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.4.1-alpha
 * FormDin Version: 4.5.3-alpha
 * 
 * System sort created in: 2019-05-06 18:54:59
 */

require_once('includes/constantes.php');
require_once('includes/config_conexao.php');

//FormDin version: 4.5.3-alpha
require_once('../base/classes/webform/TApplication.class.php');
require_once('classes/autoload_sort.php');
require_once('dao/autoload_sort_dao.php');


$app = new TApplication(); // criar uma instancia do objeto aplicacao
$app->setAppRootDir(__DIR__);
$app->setFormDinMinimumVersion(FORMDIN_VERSION_MIN_VERSION);
$app->setTitle(SYSTEM_NAME);
$app->setSigla(SYSTEM_ACRONYM);
$app->setVersionSystem(SYSTEM_VERSION);

$app->setMainMenuFile('includes/menu.php');
$app->setDefaultModule('sorteio.php');
$app->run();
?>