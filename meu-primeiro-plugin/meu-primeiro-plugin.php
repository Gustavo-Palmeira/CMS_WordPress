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
