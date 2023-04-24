$(document).ready(function () {
    $(".table-container").hide();
    $("#no-data-container").hide();

    let isDomainFree = true; //ten boolean by se mel zmenit pokud zvolena domena je/neni volna
    $("#verify-button").click(function () {
        var domain = $("input").val();

        if ($("input").val()) {
            if (isDomainFree) {
                $("#no-data-container").hide();
                //tady asi nacist data z databaze, obnovit obsah tabulky
                updateTable();
                $(".table-container").hide().slideDown("fast");
            } else {
                $(".table-container").hide()
                $("#no-data-container").hide().slideDown("fast");
            }
        } else {
            showMessageDialog("Neuvedl jste žádnou doménu!")
        }
    });

    $(".order-button").click(function () {

    });
})

function updateTable() {

};