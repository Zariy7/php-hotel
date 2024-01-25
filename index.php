<?php
    $hotels = [
        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],
    ];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php 
                        echo '<table class="table">';
                        
                        echo 
                        '<thead>
                            <tr>
                                <th scope="col">Result</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Parking</th>
                                <th scope="col">Vote</th>
                                <th scope="col">Distance-to-Center</th>
                            </tr>
                        </thead>';

                        foreach($hotels as $key => $hotel){
                            echo '<tr>';
                            echo '<th scope="row">'.($key+1).'</th>';

                            foreach($hotel as $info){
                                if($info === true){
                                    echo '<td> Yes </td>';
                                }
                                else{
                                    if($info === false){
                                        echo '<td> No </td>';
                                    }
                                    else{
                                        echo '<td>'.$info.'</td>';
                                    }
                                }
                            }

                            echo '</tr>';
                        }

                        echo '</table>';
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>