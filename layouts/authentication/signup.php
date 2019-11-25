<?php
include_once '../../config/database.php';
include_once '../../models/user.php';
$page_title = 'Login';

?>

<?php
if (isset($_POST['submit']) and !empty($_POST['pseudo']) and !empty($_POST['password'])) {
    echo $_POST['pseudo'];
    echo $_POST['password'];

    $databse = new Database();
    $db = $databse->getConnection();
    $user = new User($db);

    $user->pseudo = $_POST['pseudo'];
    // $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user->password = $_POST['password'];

    if ($user->create()) {
        header('Location: login.php');
    } else {
        echo 'error';
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php $page_title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="login.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <!-- <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign Up</h5>
                        <form class="form-signin" method="POST" action="signup.php" onsubmit="stopForm(event)">
                            <div class="form-label-group">
                                <input type="text" id="inputEmail" class="form-control" placeholder="Email address"
                                    name="pseudo" required autofocus>
                                <label for="inputEmail">Pseudo</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" id="inputPassword" class="form-control" placeholder="Password"
                                    name="password" required>
                                <label for="inputPassword">Password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <input class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"
                                name="sendForm">

                        </form>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <form action="signup.php" method="POST">
                    <div class="form-group row">
                        <label for="inputName" class="col-md-12 col-form-label">Pseudo</label>
                        <div class="col-sm-1-12">
                            <input type="text" class="form-control" name="pseudo" id="inputName" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputName" class="col-md-12 col-form-label">Password</label>
                        <div class="col-sm-1-12">
                            <input type="password" class="form-control" name="password" id="inputName" placeholder="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class=" col-md-6">
                            <button type="submit" class="btn btn-primary" name="submit">Register</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script>
    function stopForm(e) {
        e.preventDefault();
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>


</html>