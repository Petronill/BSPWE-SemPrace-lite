<!DOCTYPE html>
<html lang="cs">

<head>
    <title>GreenHost</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="css/fileInput.css">
</head>

<body>

    <?php include 'navbar.html' ?>

    <div class="container mt-5 text-center">
        <div class="row col-md-12">
            <h2>Zde prosím nahrajte své soubory</h2>
        </div>

        <div class="m-4"></div>

        <div class="row col-8 m-auto align-items-center d-flex justify-content-center">
            <div class="d-inline file-uploader col-5">
                <input type="file" id="uploadInput" multiple class="form-control" style="display: none;">
                <label for="uploadInput"><i class="btn btn-success bi bi-upload upload-button"></i>Přidat</label>
            </div>

            <form class="d-inline col-5">
                <div>
                    <button id="saveButton" type="button" class="btn btn-success border-green col-md-8"
                        style="height:50px">Uložit</button>
                </div>
            </form>
        </div>

        <div class="m-4"></div>

        <div id="fileList" class="file-list row col-md-10 m-auto align-items-center">
            <div id="noFilesText" class=" d-block">
                <i class="bi bi-plus-circle-dotted"></i>
                <p>nahrajte váše soubory pomocí drag and drop</p>
            </div>
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
    <script src="js/hosting.js"></script>
</body>