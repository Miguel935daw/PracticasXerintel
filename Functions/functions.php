<?php
    //Función para crear la lista de enlaces según un Status
    function createAgentList(array $agentList, String $status): void{
        foreach($agentList as $agent){
            $status = $status == 'Active' ? TRUE : FALSE;
            if($agent->getAgentStatus()==$status){
                $url = "missions.php?id=".strval($agent->getAgentId());
                echo '<li class="list-item"><a href='.$url.'>'.$agent->getAgentName().'</a></li>';
            }
            
        }
    }
    //Función para crear la lista de misiones
    function createMissionList(array $missionList): void{
        foreach($missionList as $mission){
            $info = strtoUpper($mission->getMissionName()).' Op, '.$mission->getCountry().', completed at '.$mission->getDate()["month"].' '.$mission->getDate()["mday"].', '.$mission->getDate()["year"];
                echo '<li class="list-item">'.$info.'</li>';
            }
        }
    
    
?>