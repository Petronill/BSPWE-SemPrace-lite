<!DOCTYPE html>
<html>

<head>
    <title>GreenHost</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>

    <?php include 'navbar.html' ?>

    <div class="container col-md-12 m-4">
        <div id="profileInfoContainer" class="col-md-3 d-flex flex-column text-center">
            <i id="profileIcon" class="bi bi-person-circle"></i>
            <span id="email" class="text-white">denis.frantsev@gmail.com</span> <!-- sem vkladat email -->
            <span class="m-2"><button id="editButton" class="btn btn-secondary" type="button">Změnit heslo</button></span>
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
            $("#editDialogContainer").hide();

            $("#editButton").on("click", function(){
                $("#editDialogContainer").fadeIn(100);
                $("#editDialog").slideDown(100);
            });

            $(".close-button").on("click", function(){
                $("#editDialogContainer").fadeOut(100);
                $("#editDialog").slideUp(100);
            })
        });
    </script>

    <div id="editDialogContainer" class="">
        <div id="editDialog">
            <span class="close-button">&times;</span>
            <h1 class="h4 mb-3 fw-normal" style="margin-top:20px;">Zadejte nové heslo</h1>
            <div style="margin:1rem;"> </div>
            <div class="form-floating m-2" style="width:290px">
                <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password"
                    required>
                <label class="form-label" for="floatingPassword">Heslo</label>
            </div>
            <button id="save" name="save" class="btn btn-success m-2" type="button"
                    style="width:200px">Uložit</button>
        </div>
    </div>
</body>