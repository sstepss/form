<?php require_once "form.php" ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DZ</title>
</head>
<body>
    <div class="reg-form">
        <form action="./" method="post">
            <input type="text" name="name" /><br>
            <input type="text" name="surname" /><br>
            <input type="text" name="login" /><br>
            <input type="text" name="password" /><br>

            <button type="submit">
                Submit
            </button>
        </form>
        <?php $validate = valid($_POST) ?>

        <?php if (!empty($validate['error']) && $validate['error']):  ?>
            <?php foreach ($validate['messages'] as $message): ?>
                <p style="color: red">
                    <?php $message ?>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>


        <?php if (!empty($validate['success']) && $validate['success']):  ?>
            <?php foreach ($validate['messages'] as $message): ?>
                <p style="color: green">
                    <?php $message ?>
                </p>
            <?php endforeach; ?>
        <?php endif; ?>

    </div>

</body>
</html>
