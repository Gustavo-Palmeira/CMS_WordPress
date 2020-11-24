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
        </tr>

        <tr>
          <td><input type="text" name="nome" value="<?php echo $consultaBanco[0]->nome; ?>"> </td>
          <td><input type="text" name="whatsapp" value="<?php echo $consultaBanco[0]->whatsapp; ?>"> </td>
          <td> <input type="hidden" name="id" value="<?php echo $id; ?>">
               <input type="hidden" name="alterar" value="1"> 
               <?php submit_button('alterar'); ?> 
          </td>
        </tr>

      </table>
    </form>
  </center>

</div>