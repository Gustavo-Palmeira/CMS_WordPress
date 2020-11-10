<?php
/*  

Plugin Name: CRUD Settings
PLugin URI: 
Description: CRUD na tela de configuração 
Version: 0.0.1
Author: Gustavo Palmeira Pinto
Author URI: https://github.com/Gustavo-Palmeira
Lisence: CC BY

*/

if (!defined('WPINC')) exit;

register_activation_hook(__FILE__, 'criar_tabela');

function criar_tabela()
{

  global $wpdb;

  $wpdb->query("CREATE TABLE {$wpdb->prefix}agenda
                   (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    nome varchar(255) NOT NULL,
                    whatsapp BIGINT UNSIGNED NOT NULL)");
}
