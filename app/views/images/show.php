<?php
use Carbon\Carbon;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>


    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            /* width: 100%; */
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: center;
            padding: 8px;
        }
    </style>
</head>

<body>

    <?php require_once __DIR__ . '/../elements/home.php' ?>

    <div class="content" style="text-align: center;">

        <h1>
            <?= $data->path; ?>
        </h1>
        <div>Created <strong>
                <?= Carbon::createFromFormat('Y-m-d H:i:s', $data->created)->diffForHumans(); ?>
            </strong>
        </div>

    </div>

    <section style="border: 3px solid gray; padding: 5px;">
        <h2>Resize Image</h2>

        <form action="" method="GET">
            <label for="height">Height:</label><br>
            <input type="number" min="1" id="height" name="height" placeholder="10" autofocus><br>
            <br>
            <label for="width">Width:</label><br>
            <input type="number" min="1" id="width" name="width" placeholder="10">
            <br>
            <input type="checkbox" id="crop" name="crop">
            <label for="crop">Crop?</label><br>

            <button style="display: block; margin-top: 10px;">Resize Now</button>
        </form>
    </section>
    <hr>

    <img src="<?= $data->base64 ?>" alt="Logo"
        style="display: block; margin-left: auto; margin-right: auto; max-width:100%;">

</body>

</html>