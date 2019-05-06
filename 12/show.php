
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Title</title>
    </head>
    <body>
    <form action="helper.php" method="post">
        <label for="area1">Введите текст</label>
        <textarea name="area1" id="area1" value="<?php
        if (isset($_SESSION['text']))
            echo $_SESSION['text'];
        ?>"><?php
            if (isset($_SESSION['text']))
                echo $_SESSION['text'];
            ?></textarea><br />
        <input type="submit" value="Нажмите кнопку"><br />
    </form>

    </body>
    </html>

