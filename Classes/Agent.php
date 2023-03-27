<?php
   declare(strict_types=1);
   namespace Classes;

   use Classes\Misc;

   spl_autoload_register(function($class){
      require_once str_replace('\\', '/',$class) . '.php';
   });

   class Agent extends Misc{
      private int $agentId;
      private string $name;
      private bool $status;
      private array $missionList;

      //Setters
      public function setAgentId(int $agentId){
         $this->agentId = $agentId;
      }

      public function setName(string $name){
         $this->name = $name;
      }

      public function setStatus(bool $status){
         $this->status = $status;
      }

      public function setMissionList(array $missionList){
         $this->missionList = $missionList;
      }

      //Getters
      public function getAgentId(){
         return $this->agentId;
      }

      public function getAgentName(){
         return $this->name;
      }

      public function getAgentStatus(){
         return $this->status;
      }

      public function getMissionList(){
         return $this->missionList;
      }

      //Constructor
      public function __construct(int $agentId, string $name, string $status,array $missionList=[]) {
         $this->agentId = $agentId;
         $this->name = $name;
         //Uso una ternaria para que el valor del atributo $status sea TRUE si el valor del parámetro es Active, y FALSE sino.
         $this->status = $status == 'Active' ? TRUE : FALSE;
         $this->missionList = $missionList;
      }

      //Métodos
      private function addMission(Mission $newMission): void{
         $this->missionList[] = $newMission; 
      }

      public function getMission(int $missionId): Mission{
         foreach($this->missionsList as $mission){
            if($mission->getMissionId()==$missionId){
                return $mission;
            }
        };
      }

      //Método para rellenar la lista de misiones desde un csv, creando un objeto Mission con cada linea del csv, y añadiendolo a missionList en caso de que la misión corresponda al agente
      public function importMissions(string $file): void{
         $missions = $this->importFile($file);
         foreach($missions as $mission){
            if($this->agentId == intval($mission[0])){
               $this->addMission(new Mission(intval($mission[0]),$mission[1],$mission[2],$mission[3]));
            }
            
         }
      }

   }
?>