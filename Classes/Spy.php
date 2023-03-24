<?php
    declare(strict_types=1);
    namespace Classes;
    
    use Classes\Misc;

    spl_autoload_register(function($class){
        require_once str_replace('\\', '/',$class) . '.php';
    });
    
    class Spy extends Misc{
        private array $agentsList;

        //Setters
        public function setAgentList(array $agentsList){
            $this->agentsList = $agentsList;
        }

        //Getters
        public function getAgentList(){
            return $this->agentsList;
        }

        //Contructor
        public function __construct(array $agentsList = []) {
           $this->agentsList = $agentsList; 
        }

        //Métodos
        private function addAgent(Agent $newAgent): void{
            $this->agentsList[] = $newAgent;
        }

        public function getAgent(int $agentId): Agent{
            //Con array_filter obtengo un array con los objetos que cumplen la función anónima que uso de filtro, en este caso obtendré un array con el agente que tiene el id recibido como parametro
            //Uso el [0] para devolver el objeto y no el array
            return array_filter($this->agentsList, function($m) use ($agentId) {
                return $m->getAgentId() == $agentId;
            })[0];
        }

        public function drawAgentsList(): String{
            $agentList = '';
            foreach($this->$agentList as $agent){
                
            }
        }

        //Método para rellenar la lista de agentes desde un csv, creando un objeto Agent con cada linea del csv, y añadiendolo a agentsList
        public function importAgents(string $file): void{
            $agents = $this->importFile($file);
            foreach($agents as $agent){
                $this->addAgent(new Agent(intval($agent[0]),$agent[1],$agent[2]));
            }
        }  
    }

   $perico = new Spy();
   $perico -> importAgents("agents.csv");
?> 