<!Doctype html>
<html lang=en>
    <head>
    <title></title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
    </head>
    <body>
        <?php 
        $upOne = dirname(__DIR__,1);
        require $upOne . '/header.php';
        ?>
        
        <div id="main">
            <h1 class="center">Join us</h1>
            <form action="<?php  echo constant('URL');?>newModelController/registerUser" method="POST">
                <p>
                    <label for="email id">Email id</label><br>
                    <input type="text" name="emailId" id="" required>
                </p>
                <p>
                    <label for="name">Name</label><br>
                    <input type="text" name="name" id="" required>
                </p>
                <p>
                    <label for="Surname">Surname</label><br>
                    <input type="text" name="surname" id="" required>
                </p>
                <p>
                    <label for="userId">User Id</label><br>
                    <input type="text" name="userId" id="" required>
                </p>
                <p>
                    <label for="password">Password</label><br>
                    <input type="text" name="password" id="" required>
                </p>
                <p>
                    <input type="submit" value="Register">
                </p>
            </form>
        </div>
        <?php   $upOne = dirname(__DIR__,1);
        require $upOne . '/footer.php';?>
    </body>
</html>  