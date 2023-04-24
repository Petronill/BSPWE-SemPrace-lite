<!DOCTYPE html>
<html>

<head>
    <title>GreenHost</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

    <?php include 'navbar.html' ?>

    <div class="container mt-5 text-center" style="margin-bottom: 10rem">
        <div class="form-signin col-md-6 m-auto">
            <form method="post">
                <div class="row">
                    <div class="text-center">
                        <?php if (isset($message) && strlen($message) > 0)
                            echo $message; ?>
                    </div>
                </div>

                <h1 class="h4 mb-3 fw-normal" style="margin-top:20px;">Přihlaste se, prosím</h1>
                <div class="form-floating m-auto" style="width:290px">
                    <input type="email" class="form-control" id="floatingInput" name="email"
                        placeholder="name@example.com" required>
                    <label class="form-label" for="floatingInput">Email</label>
                </div>
                <div style="margin:1rem;"> </div>
                <div class="form-floating m-auto" style="width:290px">
                    <input type="password" class="form-control" id="floatingPassword" name="password"
                        placeholder="Password" required>
                    <label class="form-label" for="floatingPassword">Heslo</label>
                </div>

                <p style="margin-top:20px;">Nemáte účet? <a class="link-green" href="signUp.php">Vytvořte si ho</a></p>
                <button id="login" name="login" class="btn btn-lg btn-success" type="button"
                    style="width:200px">Přihlásit se</button>
            </form>
        </div>
    </div>

    <div class="fixed-bottom">
        <?php include 'footer.html' ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script src="js/dialog.js"></script>
    <script>
        $(document).ready(function () {
            $("#login").on("click", function () {
                showMessageDialog("Úspěšně jste se přihlásil(a)!");
            })
        });
    </script>
</body>