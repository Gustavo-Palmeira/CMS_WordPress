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


// Ativação do Plugin
register_activation_hook(__FILE__, 'criar_tabela');
function criar_tabela()
{

  global $wpdb;

  $wpdb->query("CREATE TABLE {$wpdb->prefix}agenda
                   (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    nome varchar(255) NOT NULL,
                    whatsapp BIGINT UNSIGNED NOT NULL)");
}

// Desativação do Plugin
register_deactivation_hook(__FILE__, 'apagar_tabela');
function apagar_tabela()
{

  global $wpdb;

  $wpdb->query("DROP TABLE {$wpdb->prefix}agenda");
}

// Criando página 
add_action('admin_menu', 'crud_menu');
function crud_menu()
{
  add_menu_page(
    'Configurações do CRUD',
    'CRUD',
    'administrator',
    'Meu-plugin-config',
    'abre_configuracoes',
    'dashicons-database'
  );
}

function abre_configuracoes()
{

  global $wpdb;

  // DELETAR
  if (isset($_GET['apagar'])) {

    $id = preg_replace('/\D/', '', $_GET['apagar']);

    $wpdb->query("DELETE FROM {$wpdb->prefix}agenda WHERE id = $id");
  }


  // GRAVAR
  if (isset($_POST['submit'])) {
    if (isset($_POST['submit']) == 'Gravar') {

      $wpdb->query($wpdb->prepare(
        "INSERT INTO {$wpdb->prefix}agenda
                                        (nome, whatsapp) 
                                      VALUES
                                        ( %s, %d)",
        $_POST['nome'],
        $_POST['whatsapp']
      ));
    }
  }

  $contatos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda");

  require 'lista_tpl.php';
}
