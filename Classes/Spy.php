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
        public function getAgentsList(){
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
            foreach($this->agentsList as $agent){
                if($agent->getAgentId()==$agentId){
                    return $agent;
                }
            };
        }
        //Método para devolver una array con los agentes inactivos o activos
        public function statusFilter(String $status): array{
            $result = array();
            $status = $status == 'Active' ? TRUE : FALSE;
            //Recorro la lista de agentes y relleno un array con los agentes que tienen el mismo status que el recibido 
            foreach($this->agentsList as $agent){
                if($agent->status==$status){
                    $result[] = $agent;
                }
            }
            return $result;
        }
        //Método para rellenar la lista de misiones de cada agente mediante un csv
        public function fillAgentsMissions(String $file): void{
            foreach($this->agentsList as $agent){
                $agent->importMissions($file);
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