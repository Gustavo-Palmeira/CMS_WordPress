<div class="wrap">
  <h1>Configurações do CRUD</h1>
  <br><br>

  <center>
    <form method="post">
      <table width="50%" style="text-align: center">
        <tr>
          <td style="font-size: 25px;">Nome</td>
          <td style="font-size: 25px;">Whatsapp</td>
          <td></td>
          <td></td>
        </tr>

        <?php
        foreach ($contatos as $value) {
          echo "<tr>
                  <td><br> {$value->nome} </td>
                  <td><br> {$value->whatsapp} </td>
                  <td><br> <a href='?page={$_GET['page']}&apagar={$value->id}'> Apagar </a></td>
                  <td><br> <a href='?page={$_GET['page']}&editar_form={$value->id}'> Editar </a></td>
                </tr>";
        }
        ?>

        <tr>
          <td><input type="text" name="nome"> </td>
          <td><input type="text" name="whatsapp"> </td>
          <td> </td>
          <td><?php submit_button('Gravar'); ?> </td>
        </tr>

      </table>
    </form>
  </center>

</div>