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

  // EDITAR
  if ( isset($_GET['editar_form']) && !isset($_POST['alterar']) ) {

    //Recuperar dados
    $id = preg_replace('/\D/', '', $_GET['editar_form']);

    $consultaBanco = $wpdb->get_results("SELECT nome, whatsapp 
                          FROM {$wpdb->prefix}agenda 
                          WHERE id = $id");

    require 'form_editar.php';
    exit();
  }

  // EDITAR
  if ( isset($_POST['alterar']) ) {

    $wpdb->query($wpdb->prepare(
      "             UPDATE  {$wpdb->prefix}agenda
                    SET nome = %s, whatsapp = %d
                    WHERE id = %d
      ",
      $_POST['nome'],
      $_POST['whatsapp'],
      $_POST['id']
    ));
  }



  // GRAVAR e EDITAR
  // GRAVAR
  if (isset($_POST['submit'])) {
    if (isset($_POST['submit']) == 'Gravar' && !isset($_POST['alterar'])) {

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
