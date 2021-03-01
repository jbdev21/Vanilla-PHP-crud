<?php
require_once "../includes/database/connection.php";
require '../vendor/autoload.php';
// reference the Dompdf namespace
use Dompdf\Dompdf;

$statement = "SELECT *, materials.name AS name, materials.id AS id, categories.name AS category, locations.name AS location FROM materials 
    INNER JOIN categories ON materials.category_id = categories.id 
    INNER JOIN locations ON materials.location_id = locations.id ";

if(!empty($_GET['category'])){
    $statement .= " WHERE materials.category_id = " . $_GET['category'];
}

if(!empty($_GET['location'])){
    $statement .= " AND materials.location_id = " . $_GET['location'];
}

if(isset($_GET['is_active'])){
    if($_GET['is_active'] != 2){
        $statement .= " AND materials.is_active = " . $_GET['is_active'];
    }
}

$statement .= " ORDER BY materials.created_at DESC";

// Query for getting all materials
$materialQuery = $conn->prepare($statement);
$materialQuery->execute();

$html = '
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Report</title>
        </head>
        <body>
            <h1>Report</h1>
            <table class="" style="width: 100%" border="1" cellspacing="0" cellpadding="0">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Stocks</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Active</th>
                    </tr>
                </thead>
                <tbody>';

                    foreach($materialQuery->fetchAll() as $material) {
                      $html  .= '<tr id="tr-' . $material['id'] . '">
                            <td>' . $material['barcode'] . '</td>
                            <td>' . $material['name'] . '</td>
                            <td>&#8369;' . number_format($material['price'], 2) . '</td>
                            <td>' . $material['description'] . '</td>
                            <td>' . $material['stocks'] . '</td>
                            <td>' . $material['category'] . '</td>
                            <td>' . $material['location'] . '</td>
                            <td>' . $material['is_active'] = 1 ? "Yes" : "No". '</td>
                        </tr>';
                    }

                $html .= '</tbody>
          </table>
        </body>
    </html>
';

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();