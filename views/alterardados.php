<?php
if (isset($_POST["alterar"]) && !empty($_POST["alterar"])) : echo "aqui"; ?>
    <tr>
        <form name="alterardados" id="alterardados" action="" method="post">
            <td scope="row">
                <input type="text" name="nomevacinado" value="<?php echo $sevacinado['NOME_VACINADO']; ?>" />
            </td>
            <td scope="row">
                <input type="text" name="vacinada_aplicada" value="<?php echo $sevacinado['VACINA_APLICADA']; ?>" />
            </td>
            <td scope="row">
                <input type="text" name="doseaplicada" value="  <?php echo $sevacinado['DOSE']; ?>" />
            </td>
            <td scope="row">
                <input type="text" name="loca_vacinado" value="  <?php echo $sevacinado['LOCAL_VACINADO']; ?>" />
            </td>
            <td scope="row">
                <input type="submit" value="Limpar Consulta" class="btn btn-danger">
                <input type="submit" value="Alterar" />
        </form>
        </td>                       
    <?php endif;?>
</table>