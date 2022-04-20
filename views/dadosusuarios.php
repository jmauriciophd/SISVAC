        <form method="post"  id="formBuscar">
            <div class="mb-3 ">
                <label for="form"  class="form-label">INFORME NICK OU MATRICULA:</label>
                <input type="text" tabindex="0" class="form-control" id="valorCampo" name="valor" index="0" placeholder="CPF/MATRICULA">
            </div><br><br><br>
        </form>
        <form action="" class="cadastrar_reg" method="post" enctype="multipart/form">
            <?php if (!empty($msg)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $msg; ?>
                </div>
                <?php }
            if (!empty($dados_usuarios)) : foreach ($dados_usuarios as $dado) :  ?>
                    <div class="mb-3">
                        <input type="text" name="nome" required value="<?php echo $dado['NOME']; ?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="ramal" required value="<?php echo $dado['RAMAL']; ?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="situacao" required value="<?php echo $dado['SITUACAO']; ?>" class="form-control" id="formGroupExampleInput2" placeholder="NOME SERVIDOR">
                    </div>
                <?php endforeach; ?>
                <div class="mb-3">
                    <select required name="vacina" class="form-select" aria-label="">
                        <?php if (!empty($nome_vacina)) : foreach ($nome_vacina as $vacina) : ?>
                                <option value="<?php echo $vacina['VAC_NOME']; ?>"> <?php echo $vacina['VAC_NOME']; ?></option>

                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" value="<?php echo $vacina['DOSE']; ?>" required name="dose" class="form-control" id="formGroupExampleInput2" placeholder="dose">
                </div>
        <?php endforeach;
                        endif; ?>
        <div class="mb-3">
        </div>
        <input type="submit" onclick="focusMethod()" class="btn btn-primary" value="Gravar">
        <?php else : echo "";
            endif; ?>
        </form>

        <div class="container ml-1 px-3 p-3 ">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Total</th>
                        <th scope="col">vacinados hoje</th>
                        <th scope="col">Total Vacinados</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>

                        <td><?php
                            foreach ($qtdvacinadosdia as $vacinadosdia) {
                                echo $vacinadosdia['vacinadosdia'] ." vacinados neste Posto...";
                            } ?>
                        </td>
                        <td>
                            <?php
                            foreach ($qtdvacinados as $vacinados) {
                                echo $vacinados['totalvacinados'] ."  vacinados ate agora... ";
                            } ?> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>