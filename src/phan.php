<?php declare(strict_types=1);

assert(extension_loaded('ast'),
    "The php-ast extension must be loaded in order for Phan to work. See https://github.com/etsy/phan#getting-it-running for more details.");

assert((int)phpversion()[0] >= 7,
    "Phan requires PHP version 7 or greater. See https://github.com/etsy/phan#getting-it-running for more details.");

// Grab these before we define our own classes
$internal_class_name_list = get_declared_classes();
$internal_interface_name_list = get_declared_interfaces();
$internal_trait_name_list = get_declared_traits();
$internal_function_name_list = get_defined_functions()['internal'];

require_once(__DIR__.'/Phan/Bootstrap.php');

use \Phan\CLI;
use \Phan\CodeBase;
use \Phan\Config;
use \Phan\Log;
use \Phan\Phan;

// Create our CLI interface and load arguments
$cli = new CLI();

$code_base = new CodeBase(
    $internal_class_name_list,
    $internal_interface_name_list,
    $internal_trait_name_list,
    $internal_function_name_list
);

// Analyze the file list provided via the CLI
(new Phan)->analyzeFileList(
    $code_base,
    $cli->getFileList()
);
