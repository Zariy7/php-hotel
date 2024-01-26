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

    $filteredHotels = $hotels;

    if(isset($_GET['parking']) && $_GET['parking']!=''){
        $parkingFilter = $_GET['parking'];
        if($parkingFilter === 'true'){
            $parkingFilter = true;
        }
        else{
            $parkingFilter = false;
        }

        foreach($filteredHotels as $key => $hotel){
            if($filteredHotels[$key]['parking'] != $parkingFilter){
                unset($filteredHotels[$key]);
            }
        }
    }

    //var_dump($filteredHotels);

    if(isset($_GET['rating']) && $_GET['rating']!=''){
        $voteFilter = $_GET['rating'];

        foreach($filteredHotels as $key => $hotel){
            if($filteredHotels[$key]['vote'] < $voteFilter){
                unset($filteredHotels[$key]);
            }
        }
    }

    //var_dump($filteredHotels);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/style.css">
        <title>Document</title>
    </head>
    <body>
        <?php include __DIR__.'/partials/header.php'; ?>

        <main class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <form action="./index.php" method="GET">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <label for="parking" class="form-label">Parking?</label>
                                        <select name="parking" id="parking" class="form-select">
                                            <option value="">Any</option>
                                            <option value="true">Yes</option>
                                            <option value="false">No</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="rating" class="form-label">Rating?</label>
                                        <select name="rating" id="rating" class="form-select">
                                            <option value="">Any</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" value="Filter" class="btn btn-success">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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
    
                            echo '<tbody>';
                            foreach($filteredHotels as $key => $hotel){
                                echo '<tr>';
                                echo '<th scope="row">'.($key+1).'</th>';
                                echo '<td>'.$hotel['name'].'</td>';
                                echo '<td>'.$hotel['description'].'</td>';
                                echo '<td>'.($hotel['parking'] ? 'Yes' : 'No').'</td>';
                                echo '<td>'.$hotel['vote'].'</td>';
                                echo '<td>'.$hotel['distance_to_center'].'</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
    
                            echo '</table>';
                        ?>
                    </div>
                </div>
            </div>
        </main>

        <?php include __DIR__.'/partials/footer.php'; ?>
    </body>
</html>