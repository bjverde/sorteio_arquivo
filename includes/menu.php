<?php
/**
 * System generated by SysGen (System Generator with Formdin Framework) 
 * Download SysGen: https://github.com/bjverde/sysgen
 * Download Formdin Framework: https://github.com/bjverde/formDin
 * 
 * SysGen  Version: 1.4.1-alpha
 * FormDin Version: 4.5.3-alpha
 * 
 * System sort created in: 2019-05-06 18:55:08
 */

$menu = new TMenuDhtmlx();
$menu->add('1',null,'Sorteia Nomes','modulos/sorteio.php', null, 'Icon_35-512.png');

$menu->add('9', null, 'Sobre', 'modulos/sys_about.php', null, 'information-circle.jpg');

$menu->add('10',null,'Config Ambiente',null,null,'setting-gear-512.png');
$menu->add('10.1','10','Ambiente Resumido','modulos/sys_environment_summary.php',null,'information-circle.jpg');
$menu->add('10.2','10','PHPInfo','modulos/sys_environment.php',null,'php_logo.png');
$menu->add('10.4','10','Gerador VO/DAO','../base/includes/gerador_vo_dao.php');
$menu->add('10.5','10','Gerador Form VO/DAO','../base/includes/gerador_form_vo_dao.php',null,'smiley-1-512.png');
$menu->getXml();
?>