<?php
$data = [];
foreach ($allocation as $allocat){
    $item =[
        'title' => $allocat->vehicle->vehicle_type ,
        'start' => $allocat->date,
    ];
    $data[] = $item;
}
echo json_encode($data);