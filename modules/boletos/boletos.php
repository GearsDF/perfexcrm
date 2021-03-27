<?php /**
 * Ensures that the module init file can't be accessed directly, only within the application.
 */ defined('BASEPATH') or exit('No direct script access allowed');

/*
Module Name: Boletos
Description: Modulo Boletos Bancarios.
Version: 1.0.0
Requires at
least: 2.3.*
*/

require(__DIR__ . '/vendor/autoload.php');

define('BOLETOS_MODULE_NAME', 'boletos');
hooks()->add_action('admin_init', 'boletos_menu_item_collapsible');

register_language_files('boletos', ['portuguese_br']);

function processar() {
    $CI = &get_instance();
    $CI->load->library(BOLETOS_MODULE_NAME . '/' . 'RetornoBanco');
    $CI->load->library(BOLETOS_MODULE_NAME . '/' . 'RetornoFactory');
}

function boletos_menu_item_collapsible() {
    $CI = &get_instance();
    // The first paremeter is the parent menu ID/Slug
    $CI->app_menu->add_sidebar_children_item('sales', [
        'slug' => 'child-to-custom-menu-item', // Required ID/slug UNIQUE for the child menu
        'name' => 'Boletos', // The name if the item
        'href' => admin_url('boletos'), // URL of the item
        'position' => 9, // The menu position // 'icon' => 'fa fa-barcode', // Font awesome icon
    ]);

     $CI->app_tabs->add_settings_tab('boletos', [
        'name' => ('Boletos'),
        'view' => ('boletos/includes/boletos'),
        'position' => 100,
    ]);









}

