<?php
use Carbon\Carbon;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= SITENAME ?>
    </title>


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
            <?= SITENAME ?>
        </h1>
        <table style="margin-left: auto; margin-right: auto;">

            <th>File Name</th>
            <th>Created</th>
            <th>Image</th>
            <?php foreach ($data['result'] as $img): ?>
                <tr>
                    <td>
                        <a href="<?= URLROOT ?>/image/show/<?= $img['id'] ?>">
                            <?= $img['path'] ?>
                        </a>
                    </td>
                    <td>
                        <?= Carbon::createFromFormat('Y-m-d H:i:s', $img['created'])->diffForHumans(); ?>

                    </td>
                    <td style="height: fit-content;">
                        <img src="<?= APP ?>/image-files/<?= $img['path'] ?>" width="200" height="140" alt="Logo">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <?php $imgsCount = (int) $data['count'][0]['count'];
        if ($imgsCount > 3) {

            echo '<hr> <div class="pagination">';
            $pagesCount = ceil($imgsCount / 3);

            for ($i = 0; $i < $pagesCount; $i++) {
                echo "<a href=\"" . URLROOT . "/Pages/index/" . (string) ($i) . "\">" . (string) ($i + 1) . "</a>  ";
            }
            echo '</div>';
        }
        ?>
    </div>
</body>

</html>