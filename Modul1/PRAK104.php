<?php
$data = [
    "Samsung Galaxy S22",     
    "Samsung Galaxy S22+",    
    "Samsung Galaxy A03",     
    "Samsung Galaxy Xcover 5" 
];
?>

<!DOCTYPE html>
<html>
<head>
<style>
    table {
        border-collapse: separate; 
        border-spacing: 2px; 
        border: 1px solid black;
    }

    td {
        border: 1px solid black;
        font-family: "Times New Roman", Times, serif;
        font-size: 16px;
    }

    .judul {
        font-weight: bold;
    }
</style>
</head>
<body>

<table>
    <tr>
        <td class="judul">Daftar Smartphone Samsung</td>
    </tr>

    <?php
    for ($i = 0; $i < count($data); $i++) {
        echo "<tr>";
        echo "<td>" . $data[$i] . "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
