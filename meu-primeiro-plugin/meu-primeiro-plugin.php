<?php
/*  

Plugin Name: Meu Primeiro Plugin
PLugin URI: 
Description: Plugin teste
Version: 0.0.1
Author: Gustavo Palmeira Pinto
Author URI: https://github.com/Gustavo-Palmeira
Lisence: CC BY

*/

add_filter('login_errors', 'altera_msg_login');

function altera_msg_login()
{
  return 'Credenciais inválidas';
}

add_action('wp_head', 'colocar_og_tags');

function colocar_og_tags()
{

  $dados_do_post = get_post(get_the_ID());
  $dados_do_site = get_bloginfo();

  $titulo = $dados_do_post->post_title;
  $resumo = $dados_do_post->post_excerpt;

  if (is_single()) {
    echo "    \n\n\n
              <meta property='og:title' content='" . $titulo . "'>
              <meta property='og:title_name' content='" . $dados_do_site . "'>
              <meta property='og:title_url' content='" . get_permalink() . "'>
              <meta property='og:title_description' content='" . $resumo . "'>
              \n\n\n";
  };
};
