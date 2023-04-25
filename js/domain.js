$(document).ready(function () {
    $(".table-container").hide();
    $("#no-data-container").hide();

    $("#verify-button").click(function () {
        var domain = $("input").val();
        if (domain) {
            seeDomain(domain);
        } else {
            showMessageDialog("Neuvedl jste žádnou doménu!");
        }
    });

    $(".order-button").click(function () {
        //getDomain(...);
    });
})

function seeDomain(domain) {
    post('/api/free_domain.php', valueToData('domain', domain), getAuth())
        .then(data => {
            if (data.anyDomainFree) {
                $("#no-data-container").hide();
                updateTable(data);
                $(".table-container").hide().slideDown("fast");
            } else {
                $(".table-container").hide()
                $("#no-data-container").hide().slideDown("fast");
            }
        });
}

function updateTable(data) {
    // TODO: nacist data z databaze, obnovit obsah tabulky
};

function getDomain(domain) {
    post('/api/get_domain.php', valueToData('domain', domain), getAuth())
    .then(data => {
        // TODO!
    });
}