<?php
/*  

Plugin Name: Plugin Com Menu
PLugin URI: 
Description: Plugin teste com menu acoplado
Version: 0.0.1
Author: Gustavo Palmeira Pinto
Author URI: https://github.com/Gustavo-Palmeira
Lisence: CC BY

*/

add_action('admin_menu', 'plugin_menu');

function plugin_menu()
{
  /* add_menu_page(
    'Configurações do Plug-in',
    'Meu Plug-in',
    'administrator',
    'Meu-plugin-config',
    'abre_configuracoes',
    'dashicons-admin-generic'
  ); */

  add_submenu_page(
    'options-general.php',
    'Configurações do Plug-in',
    'Meu Plug-in',
    'administrator',
    'Meu-plugin-config',
    'abre_configuracoes',
  );
}

function abre_configuracoes()
{
  require 'plugin-com-menu-tpl.php';
}
