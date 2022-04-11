        <form method="post" id="formBuscar">
            <div class="mb-3 ">
                <label for="form" class="form-label">INFORME NICK OU MATRICULA:</label>
                <input type="text" class="form-control" id="valorCampo" name="valor" index="0" placeholder="CPF/MATRICULA">
            </div><br><br><br>
        </form>
        <form action=""  name="cadastrar_reg" method="post" enctype="multipart/form">
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
                        <option selected>Selecione a Vacina</option>
                        <?php if (!empty($nome_vacina)) : foreach ($nome_vacina as $vacina) : ?>
                                <option value="<?php echo $vacina['VAC_NOME']; ?>"> <?php echo $vacina['VAC_NOME']; ?></option>
                        <?php endforeach;
                        endif; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="number" required name="dose" class="form-control" id="formGroupExampleInput2" placeholder="dose">
                </div>
                <div class="mb-3">
                </div>
                <button type="submit" id="submit" class="btn btn-primary">GRAVAR</button>
            <?php else : echo "";
            endif; ?>
        </form>

        <div class="container ml-1 px-3 p-3 ">
            <div class="row">
                <div class="col text-center border-bottom">TOTAL VACINADOS</div>
                <div class="row text-center">
                    <?php
                       foreach ($qtdvacinados as $vacinados){
                            echo $vacinados['totalvacinados'];
                       }?>
                    vacinados ate agora...</div>
            </div>
        </div>