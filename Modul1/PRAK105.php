<?php
$data = [
    "s1" => "Samsung Galaxy S22",
    "s2" => "Samsung Galaxy S22+",
    "s3" => "Samsung Galaxy A03",
    "s4" => "Samsung Galaxy Xcover 5"
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
            background-color: red;
            font-weight: bold;
            font-size: 24px;
            padding: 10px 0px;
        }
    </style>
</head>

<body>

    <table>
        <tr>
            <td class="judul">Daftar Smartphone Samsung</td>
        </tr>

        <?php
        foreach ($data as $key => $value) {
            echo "<tr>";
            echo "<td>" . $data[$key] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>
