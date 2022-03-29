<?php
class homeController extends controller{
    public function __construct(){              
        $logado = new UsuarioDao();
         if(!$logado->isLogado()){
             header('Location:'.BASE_URL."/login");
         }
    }
    public function index(){      
           $dados = array(0=>'msg',1=>'dados_usuarios',2=>'nome_campanha',3=>'nome_vacina'); 
             $dados['nome_campanha'] =  $this->consultarCapanha();
             $dados['nome_vacina'] = $this->consultarVacina();         
             $dados['dados_usuarios']=  $this->consultarDados();
             
             $this->cadastrarUsuario();
           $this->loadTemplate('home',$dados); 
    }    

    private function cadastrarRegVacina() {

    }
    private function consultarVacina(){
         $consultaVac = new VacinaDao();
         return $consultaVac->consultaVacina();
    }
    private function consultarCapanha(){ 
        $consultaVac = new CapanhaDao();
        return $consultaVac->consultaCampanha();
    }
    public function consultarDados(){  
        $array = array();
        if(isset($_POST["valor"]) && !empty($_POST["valor"])){
            $valor = $_POST["valor"];
            $consulta = new UsuarioDao();            
            return $array =  $consulta->consultaDados($valor);

       }           
    }
    public function consultaNick(){
        $consulta = new UsuarioDao(); 
            if(isset($_POST["valor"]) && !empty($_POST["valor"])){   
            $valor = addslashes($_POST["valor"]);
            return $array =  $consulta->getNick($valor);
        }
    }
    private function cadastrarUsuario(){
        $array = array(
            1=>"msg"
        );
        if(isset($_POST["nick"]) && !empty($_POST["nick"])){
         $cadastrar = new UsuarioDao();    
         $nick = addslashes($_POST["nick"]);
         $senha = addslashes(MD5($_POST["password"]));     
         $tipo =  addslashes($_POST["tipo"]);  
         if($cadastrar->consultaNick($nick)){
            return $array['msg'] =   "Usuario já cadastrado";
         }else{
            if($cadastrar->cadastarUsuario($nick,$senha,$tipo)){
                return $array['msg'] =   "Cadastro com sucesso";
              }else{
                return $array['msg'] =   "Erro ao Cadastrar";
              }
           }         
        }      
       
    }
    public function campanha(){
        $cadastrar = new CapanhaDao();  
        $dados = array(1=>'msg');
            
             if(isset($_POST["NOME_CAMPANHA"]) && !empty($_POST["NOME_CAMPANHA"])){  
                  
                $NOME_CAMPANHA = addslashes($_POST["NOME_CAMPANHA"]);
                $PERIODO_INICIAL = addslashes($_POST["PERIODO_INICIAL"]);     
                $PERIODO_FINAL =  addslashes($_POST["PERIODO_FINAL"]);
                $POSTO_VACINACAO =  addslashes($_POST["POSTO_VACINACAO"]);

             if($cadastrar->cadastraCampanha($NOME_CAMPANHA,$PERIODO_INICIAL,$PERIODO_FINAL, $POSTO_VACINACAO )){
                echo $dados['msg'] =   "Cadastrada com sucesso";
             }else{
                echo  $dados['msg'] =   "Erro ao Cadastrar";
             }
           }
        $this->carregaView('campanha',$dados);
    }
    public function usuarios(){
        $dados = array(1=>"NICK_MAT");
        $consultaNick = new UsuarioDao();
         $dados[]= $consultaNick->getNick();
        foreach ($dados  as $d){
            $dados['NICK_MAT'] = $d;
        }
        $dados['msg']=$this->cadastrarUsuario();
        $this->carregaView('usuarios',$dados);
    }
    public function vacina(){
        $cadastrar = new VacinaDao();  
        $dados = array(1=>'msg');
            
             if(isset($_POST["nome_vacina"]) && !empty($_POST["nome_vacina"])){ 
                  
                $nome_vacina = addslashes($_POST["nome_vacina"]);
                $numerolote = addslashes($_POST["numerolote"]);     
                $vacinatipo =  addslashes($_POST["vacinatipo"]);
                $datavalidade =  addslashes($_POST["datavalidade"]);
                $vacinafabricante =  addslashes($_POST["vacinafabricante"]);

             if($cadastrar->cadastraVacina($nome_vacina,$numerolote,$vacinatipo, $datavalidade,$vacinafabricante )){
                echo $dados['msg'] =   "Cadastrada com sucesso";
             }else{
                echo  $dados['msg'] =   "Erro ao Cadastrar";
             }
           }
        $this->carregaView('vacina',$dados);
    }
    
     
}
