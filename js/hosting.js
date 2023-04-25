$(document).ready(function () {
    $('#uploadInput').on('change', handleFileUpload);
    $('#fileList').on('click', '.remove-file', removeFile);
    $('#fileList').on('drop', handleFileDragAndDrop);
    var files;

    function handleFileDragAndDrop(event) {
        event.preventDefault();
        files = event.originalEvent.dataTransfer.files;
        handleFileUpdate(files);
    }

    function handleFileUpload(event) {
        files = event.target.files;
        handleFileUpdate(files);
    }

    function handleFileUpdate(files) {
        const fileList = $('#fileList');
        fileList.empty();
        displayFiles(files, fileList)
    }


    function removeFile(event) {
        const index = $(event.target).data('index');
        $(event.target).closest('.file-item').remove();
        fileListEmpty();
    }

    //fileList je div kde jsou umisteny jednotlive dokumenty
    const fileList = document.getElementById("fileList");

    //event listeners ktere zajistuji drag and drop funkcionalitu nad fileListem
    fileList.addEventListener("dragover", function (e) {
        e.preventDefault();
        fileList.classList.add("dragover");
    });

    fileList.addEventListener("dragleave", function (e) {
        e.preventDefault();
        fileList.classList.remove("dragover");
    });

    fileList.addEventListener("drop", function (e) {
        e.preventDefault();
        fileList.classList.remove("dragover");
        var files = e.dataTransfer.files;
    });

    $("#saveButton").on("click", function() {

        showMessageDialog("Soubory byly nahrány.");
    });

});

function displayFiles(files, fileList) {
    for (let i = 0; i < files.length; i++) {
        const file = files[i];
        const listItem = $('<div>').addClass('file-item container').html(`
                <i class="row m-auto text-center bi bi-file-earmark"></i>
                <span class="row m-auto text-center file-name">${file.name}</span>
                <span class="row m-auto text-center file-size">${(file.size / 1024).toFixed(2)}Mb</span>
                <span class="row m-auto text-center remove-file" data-index="${i}">&times;</span>
            `);
        fileList.append(listItem);
    }
    fileListEmpty();
}

function fileListEmpty(){
    if ($('#fileList').is(':empty')){
        $('#fileList').html(noFileText);
    }
}

const noFileText = `<div id="noFilesText" class=" d-block">
<i class="bi bi-plus-circle-dotted"></i>
<p>nahrajte váše soubory pomocí drag and drop</p>
</div>`;
