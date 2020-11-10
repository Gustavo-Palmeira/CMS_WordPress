<div class="wrap">
  <h1>Configurações do Plug-in</h1>
  <br><br>

  <form method="post" action="options.php"> <!-- options da tabela wp_option -->

    <?php

      settings_fields('configs-exemplo');
      do_settings_sections('configs-exemplo');

    ?>

    <label for="api-token"> Token da API </label>
    <input type="text" id="api-token" name="api-token" value="<?php echo get_option('api-token'); ?>">
    <br><br>
    <label for="api-url"> URL da API </label>
    <input type="text" id="api-url" name="api-url" value="<?php echo get_option('api-url'); ?>">

    <?php submit_button('Salvar'); ?>

  </form>
</div>