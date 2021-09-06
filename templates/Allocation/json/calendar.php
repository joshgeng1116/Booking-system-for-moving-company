<?php
$data = [];
foreach ($allocation as $allocat){
    $item =[
        'title' => 'Truck Busy',
        'start' => $allocat->date,
    ];
    $data[] = $item;
}
echo json_encode($data);