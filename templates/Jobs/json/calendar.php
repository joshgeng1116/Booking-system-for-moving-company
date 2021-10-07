<?php
$data = [];
foreach ($allocation as $allocat){
    $vehicle_typee="";
    if($allocat->vehicle->vehicle_type == $size){
        if($allocat->vehicle->vehicle_type == 1){
            $this->set($vehicle_typee="2T");
        } elseif ($allocat->vehicle->vehicle_type == 2){
            $this->set($vehicle_typee="4T");
        } elseif ($allocat->vehicle->vehicle_type == 3){
            $this->set($vehicle_typee="8T");
        } elseif ($allocat->vehicle->vehicle_type == 4){
            $this->set($vehicle_typee="10T");
        } elseif ($allocat->vehicle->vehicle_type == 5){
            $this->set($vehicle_typee="12T");
        }
        $item =[
            'title' => $vehicle_typee,
            'start' => $allocat->date,
        ];
        $data[] = $item;
    }
}
echo json_encode($data);
