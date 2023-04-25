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

    <div class="container mt-5 text-center">
        <div class="row col-md-12">
            <h1>Zvolte si doménu</h1>
        </div>
        <div class="m-5"> </div>
        <form method="post" class="row col-md-12">
            <div class="m-auto col-auto">
                <div class="input-group">
                    <div class="input-group-text text-addon" id="btnGroupAddon">www.</div>
                    <input type="text" class="form-control full-border" style="width:20rem;" id="floatingInput"
                        name="domain" placeholder="vasweb" required autofocus>
                    <button type="button" class="btn btn-success" id="verify-button">Ověřit</button>
                </div>
            </div>
        </form>
        <div class="row col-md-12 table-container table-responsive">
            <table class="table table-bordered table-hover">
                <!-- <caption>Volné domény</caption> -->
                <thead class="thead-green">
                    <tr>
                        <th scope="col">Doména</th>
                        <th scope="col">Cena</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
        </div>
        <div class="row col-md-12" id="no-data-container" style="margin-top: 2rem;">
            <h4>Tato doména již má svého vlastníka, vyberte si prosím jinou</h4>
        </div>
    </div>
    <div class="fixed-bottom">
        <?php include 'footer.html' ?>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
    <script src="js/ajaptor.js"></script>
    <script src="js/dialog.js"></script>
    <script src="js/domain.js"></script>
</body>