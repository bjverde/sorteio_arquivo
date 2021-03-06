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

if ( !function_exists( 'sort_autoload') ) {
    function sort_autoload( $class_name )
    {
        $path = __DIR__.DS.$class_name.'.class.php';
        if (file_exists($path)){
            require_once $path;
        } else {
            return false;
        }
    }
spl_autoload_register('sort_autoload');
}