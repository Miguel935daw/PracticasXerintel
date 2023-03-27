<?php
    declare(strict_types=1);
    namespace Classes;

    class Mission{
        private int $missionId;
        private string $country;
        private int $date;
        private string $missionName;

        //Setters
        public function setMissionId(int $missionId){
            $this->missionId= $missionId;
        }

        public function setCountry(string $country){
            $this->country = $country;
        }

        public function setDate(timeStamp $date){
            $this->date = $date;
        }

        public function setMissionName(string $missionName){
            $this->missionName = $missionName;
        }

        //Getters
        public function getMissionId(){
            return $this->missionId;
        }

        public function getCountry(){
            return $this->country;
        }

        public function getDate(){
            return $this->toDate();
        }

        public function getMissionName(){
            return $this->missionName;
        }

        //Contructor
        public function __construct(int $missionId, string $country, string $date, string $missionName) {
            $this->missionId = $missionId;
            $this->country = $country;
            $this->date = strtotime($date);
            $this->missionName = $missionName;
        }

        //Métodos
        private function toDate(): Array{
            return getDate($this->date);
        }
    }
?>