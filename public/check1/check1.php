    <!-- <table class="table table-bordered">
        <tr>
            <td>Japanese</td>
            <td>60</td>
        </tr>
        <tr>
            <td>English</td>
            <td>70</td>
        </tr>
        <tr>
            <td>Mathematics</td>
            <td><span class="text-danger fw-bold">50</span></td>
        </tr>
        <tr>
            <td>History</td>
            <td>60</td>
        </tr>
        <tr>
            <td>Biology</td>
            <td><span class="text-danger fw-bold">45</span></td>
        </tr>
        <tr>
            <th>Total</th>
            <th>285</th>
        </tr>
    </table> -->

    <html>

    <head>
        <!-- bootstrap をつかいたい人は↓
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    -->
        <style>
            .red {
                color: red;
            }

            table {
                width: 400px;
                border: 1px solid #000;
            }

            tr,
            td {
                border: 1px solid #000;
            }
        </style>
    </head>

    <body>
        <table>
            <?php
            $results = array(
                "Japanese" => 60,
                "English" => 70,
                "Mathematics" => 50,
                "History" => 60,
                "Biology" => 45
            );
            $total_score = 0;
            foreach ($results as $con => $value) {
                $total_score = $total_score + $value;
                echo "<tr>";
                echo "<td>" . $con . "</td>";
                if ($value < 60) {
                    echo "<td class=red>" . $value . "</td>";
                } else {
                    echo "<td>" . $value . "</td>";
                };
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td>total</td>";
            echo "<td>" . $total_score . "</td>";
            echo "</tr>";

            ?>
        </table>




    </body>

    </html>