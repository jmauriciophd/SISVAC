<?php
class homeController extends controller
{
    public function __construct()
    {
        $logado = new UsuarioDao();
        if (!$logado->isLogado()) {
            header('Location:' . BASE_URL . "/login");
        }
    }
    public function index()
    {
        $dados = array(0 => 'msg', 1 => 'nome_campanha', 2 => 'nome_user');
        $dados['nome_campanha'] =  $this->consultarCampanha();
        $dados['local_vacina']  = $this->consultarLocalVacina();

        if (isset($_POST['campanha']) && !empty($_POST['campanha'])) {
            $_SESSION['nome_campanha']  = $_POST['campanha'];
            $_SESSION['local_vacinacao'] = $_POST['local'];
            
        }
        if (isset($_SESSION['nome_campanha']) && !empty($_SESSION['nome_campanha']) && isset($_SESSION['local_vacinacao']) && !empty($_SESSION['local_vacinacao'])) {
            $this->cadastrarRegVacina();            
        }
        $this->loadTemplate('home', $dados);
    }
    //CADASTRA USUARIO AVULSO
    public function usuarioAvulso()
    {
        $array = array(1 => "msg");
        $vacinadao = new VacinaDao();     
        if(isset($_POST["CPF"]) && !empty($_POST["CPF"])) {
            $nomeusuario = addslashes($_POST["nomeusuario"]);
            $CPF = addslashes($_POST["CPF"]);
            $telefone = addslashes($_POST["telefone"]);
            $lotacao = "Sem vinculo com o STJ";
            $situcao = "Usuário Externo";
            $funcao = "Usuário Externo";
            $tipoServidor = "Dependente ou Parente Proximo";
            $novoUsuario = new UsuarioDao();
            $this->retirarTracosePontos($CPF);
            $this->retirarTracosePontos($telefone);
            $vacina = $this->consultarVacina();           
            $dose = $this->consultarVacina();

            if ($novoUsuario->cadastrarUsuarioAvulso($CPF, $nomeusuario, $telefone, $lotacao, $situcao, $situcao, $funcao, $tipoServidor)) {
                $vacinadao->notVacinado($nomeusuario,  $vacina[0]["VAC_NOME"], $_SESSION['nome_campanha'],$dose[0]["DOSE"], $_SESSION['local_vacinacao']);
                $array['msg'] = "Usuario CADASTRADO e VACINADO com sucesso";                
                header("Refresh:5;".BASE_URL);
            } else {
                $array['msg'] = "Erro ao cadastrar o usuário";
                header("Refresh:3");
            }
        }
        $this->loadTemplate('usuariosavulso', $array);
    }
    //CADASTRAR REGISTRO DE VACINAS VACINAS
    public function cadastrarRegVacina()
    {
        $dados = array(0 => 'msg', 1 => 'dados_usuarios', 2 => 'nome_vacina', 3 => 'qtdvacinados', 4 => 'vacinadosposto', 5 => 'ultimosVacinados');
        $vacinadao = new VacinaDao();

        $dados['dados_usuarios'] =  $this->consultarDadosUsuarios();
        $dados['nome_vacina'] = $this->consultarVacina();
        $dados['qtdvacinados']  =    $vacinadao->qtdVacinados();
        $dados['qtdvacinadosdia']  = $vacinadao->qtdVacinadosDia();
        $dados['vacinadosposto'] = $vacinadao->vacinadosPosto($_SESSION['local_vacinacao']);
        $dados['ultimosVacinados'] = $vacinadao->ultimosVacinados();

        if (isset($_POST['nome']) && !empty($_POST['nome'])) {
            $nome = addslashes($_POST['nome']);
            $vacina =  addslashes($_POST['vacina']);
            $_SESSION['vacina'] = $vacina;
            $campanha =  addslashes($_SESSION['nome_campanha']);
            $localVacinado =  addslashes($_SESSION['local_vacinacao']);
            $dose =  addslashes($_POST['dose']);
           

            if ($vacinadao->isvacinado($nome, $vacina, $campanha, $dose, $localVacinado)) {
                $dados['msg'] = "Esta pessoa já foi vacinada";
            } else {
                if ($vacinadao->notVacinado($nome, $vacina, $campanha, $dose, $localVacinado)) {
                    $dados['msg'] = "VACINADO COM SUCESSO";
                }
                header("Refresh:3");
            }
        }
        $this->loadTemplate('dadosusuarios', $dados);
    }

    //CONSULTA LOCAL DE VACINAS
    private function consultarLocalVacina()
    {
        $consultaVac = new CampanhaDao();
        return $consultaVac->consultaLocal();
    }

    //CONSULTA VACINAS
    private function consultarVacina()
    {
        $consultaVac = new VacinaDao();
        return $consultaVac->consultaVacina();
    }
    //CONSULTA CAMPANHAS
    private function consultarCampanha()
    {
        $consultaVac = new CampanhaDao();
        return $consultaVac->consultaCampanha();
    }
    //CONSULTA DADOS DO USUARIO
    public function consultarDadosUsuarios()
    {
        $array = array(1 => 'msg', 2 => 'dados_usuarios');
        $consultaNick = new UsuarioDao();
        if (isset($_POST["valor"]) && !empty($_POST["valor"])) {
            $valor = addslashes($_POST["valor"]);
            
            if (!$consultaNick->getNick($valor)) {    
                 $_SESSION['CPF'] = $valor;                     
                 header("Location:".BASE_URL."/home/usuarioAvulso");
            } else {
                return $array =  $consultaNick->consultaDados($valor);
                var_dump($array);
            }
        }
    }
    public function consultarDadosVacina()
    {
        $array = array(1 => 'msg');
        if (isset($_POST["valor"]) && !empty($_POST["valor"])) {
            $valor = $_POST["valor"];
            $consulta = new UsuarioDao();
            return $dados =  $consulta->consultaDados($valor);
            
        }
    }
    //CONSULTA NICKS
    public function consultaNick()
    {
        $consulta = new UsuarioDao();
        if (isset($_POST["valor"]) && !empty($_POST["valor"])) {
            $valor = addslashes($_POST["valor"]);
            return $array =  $consulta->getNick($valor);
        }
    }
    private function retirarTracosePontos($valor){
        return preg_replace('/(^0-9)/',"",$valor);
    }
    
    //CADASTRAR USUARIOS SISTEMA
    public function cadastrarUsuario()
    {
        $array = array(
            1 => "msg"
        );
        if (isset($_POST["password"]) && empty($_POST["password"])) {
            return $array['msg'] =   "Campo senha Vazio";
        } else {
            if (isset($_POST["nick"]) && !empty($_POST["nick"])) {
                $cadastrar = new UsuarioDao();
                $nick = addslashes($_POST["nick"]);
                $senha = addslashes(MD5("123456"));
                $tipo =  addslashes($_POST["tipo"]);
                if ($cadastrar->consultaNick($nick)) {
                    return $array['msg'] =   "Usuario já cadastrado";
                } else {
                    if ($cadastrar->cadastrarUsuarioSis($nick, $senha, $tipo)) {
                        return $array['msg'] =   "Cadastro com sucesso";
                    } else {
                        return $array['msg'] =   "Erro ao Cadastrar";
                    }
                }
            }
        }
    }
    //CADASTRAR LOCAL DE VACINAS
    private function cadastraLocalVacina()
    {
        $cadastrarLocal = new CampanhaDao();
        $dados = array(1 => 'msg_cadastro');
        if (isset($_POST['localvacinacao']) && empty($_POST['localvacinacao'])) {
            $dados['msg_cadastro'] = "CAMPO EM BRANCO";
        } else {
            if (isset($_POST['localvacinacao']) && !empty($_POST['localvacinacao'])) {
                $localvacinacao = addslashes($_POST["localvacinacao"]);
                if ($cadastrarLocal->cadastrarLocal($localvacinacao)) {
                    $dados['msg_cadastro'] = "LOCAL CADASTRADO COM SUCESSO";
                } else {
                    $dados['msg_cadastro'] = "LOCAL JA CADASTRADO";
                }
            }
        }
    }
    //CADASTRAR CAMPANHAS
    public function campanha()
    {
        $this->cadastraLocalVacina();

        $cadastrar = new CampanhaDao();
        $dados = array(1 => 'msg');

        if (isset($_POST["NOME_CAMPANHA"]) && !empty($_POST["NOME_CAMPANHA"])) {
            $NOME_CAMPANHA = addslashes($_POST["NOME_CAMPANHA"]);
            $PERIODO_INICIAL = addslashes($_POST["PERIODO_INICIAL"]);
            $PERIODO_FINAL =  addslashes($_POST["PERIODO_FINAL"]);
            if ($PERIODO_FINAL < $PERIODO_INICIAL or $PERIODO_INICIAL > $PERIODO_FINAL) {
                echo $dados['msg'] =   "Datas diferentes";
            } else {
                if ($cadastrar->cadastraCampanha($NOME_CAMPANHA, $PERIODO_INICIAL, $PERIODO_FINAL)) {
                    $dados['msg'] =   "Cadastrada com sucesso";
                } else {
                    $dados['msg'] =   "Erro ao Cadastrar";
                }
            }
        }
        $pagina = basename('campanha');
        $permissao = new permissaoController();
        $permissao->autenticadoAutorizado($pagina, $_SESSION['nivel']);
        $this->carregaView($pagina, $dados);
    }
    //CADASTRAR USUARIOS SISTEMAS
    public function usuarios()
    {
        $dados = array(1 => "NICK_MAT");
        $pagina = basename('usuarios');
       
        $permissao = new permissaoController();
        $permissao->autenticadoAutorizado($pagina, $_SESSION['nivel']);

        $consultaNick = new UsuarioDao();
        $dados[] = $consultaNick->consultaDados();

        foreach ($dados  as $d) {
            $dados['NICK_MAT'] = $d;
        }
          if($this->cadastrarUsuario()){
            $dados['msg'] = "Usuario Cadastrado com sucesso.";
          }


        $this->carregaView($pagina, $dados);
    }
    //CADASTRAR VACINAS
    public function vacina()
    {
        $cadastrar = new VacinaDao();
        $dados = array(1 => 'msg');
        if (
            isset($_POST["nome_vacina"]) && empty($_POST["nome_vacina"]) or
            isset($_POST["numerolote"]) && empty($_POST["numerolote"]) or
            isset($_POST["vacinatipo"]) && empty($_POST["vacinatipo"]) or
            isset($_POST["datavalidade"]) && empty($_POST["datavalidade"]) or
            isset($_POST["vacinafabricante"]) && empty($_POST["vacinafabricante"])
        ) {
            $dados['msg'] =   "Campos não preenchidos";
        }
        if (isset($_POST["nome_vacina"]) && !empty($_POST["nome_vacina"])) {
            $nome_vacina = addslashes($_POST["nome_vacina"]);
            $numerolote = addslashes($_POST["numerolote"]);
            $vacinatipo =  addslashes($_POST["vacinatipo"]);
            $datavalidade =  addslashes($_POST["datavalidade"]);
            $vacinafabricante =  addslashes($_POST["vacinafabricante"]);
            $dose =  addslashes($_POST["dose"]);

            if ($cadastrar->cadastraVacina($nome_vacina, $numerolote, $vacinatipo, $datavalidade, $vacinafabricante, $dose)) {
                echo $dados['msg'] =   "Cadastrada com sucesso";
            } else {
                echo  $dados['msg'] =   "Erro ao Cadastrar";
            }
        }
        $pagina = basename('vacina');
        $permissao = new permissaoController();
        $permissao->autenticadoAutorizado($pagina, $_SESSION['nivel']);
        $this->carregaView($pagina, $dados);
    }   
    public function alteraSenha(){
        $dados = array(1 => 'msg');

        if(isset($_POST['password']) && $_POST['password']){
            $password =  addslashes(MD5($_POST["password"]));
            $novasenha =  addslashes(MD5($_POST["novasenha"]));    

            if($password !== $novasenha){
                echo $dados['msg'] = "Senhas diferentes";
            }else{
                $alterarsenha = new UsuarioDao();
                if ($alterarsenha->alterarSenha($password)) {
                    echo $dados['msg'] =   "Senha alterada com sucesso";
                } else {
                    echo $dados['msg'] =   "Erro ao Cadastrar";
                }
            }
            
        }
        $this->loadTemplate('alterarsenha', $dados);
    } 
}
