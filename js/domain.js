$(document).ready(function () {
    $("#domain-table-container").hide();
    $("#no-data-container").hide();
    $("#credentials-container").hide();

    $("#verify-button").click(function () {
        var domain = $("input").val();
        if (domain) {
            seeDomain(domain);
        } else {
            showMessageDialog("Neuvedl jste žádnou doménu!");
        }
    });
})

function seeDomain(domain) {
    post('api/free_domain.php', valueToData('domain', domain))
        .then(data => {
            $("#credentials-container").hide();
            if (data.length > 0) {
                $("#no-data-container").hide();
                updateTable(data);
                $("#domain-table-container").show().slideDown("fast");
            } else {
                $("#domain-table-container").hide()
                $("#no-data-container").show().slideDown("fast");
            }
        });
}

function updateTable(freeDomains) {
    let contents = ``;
    freeDomains.forEach(domain => {
        contents += `
    <tr>
        <th scope="row">${domain.name}</th>
        <td>${domain.cost} Kč</td>
        <td class="td-button"><button class="btn btn-outline-success order-button" onclick="getDomain('${domain.name}')">Objednat</button>
        </td>
    </tr>`;
    });

    $('#table-body').html(contents);
};

function getDomain(domain) {
    post('api/get_domain.php', valueToData('domain', domain))
    .then(data => {
        if (data.success) {
            $("#credentials-container").html(`
            <h6>Web ${domain} zaregistrován, přihlašovací údaje:</h6>
            <table class="table table-bordered ">
                <tr>
                    <th scope="row">Uživatelské jméno:</th>
                    <td>${data.credentials.username}</td>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PIN k FTP:</th>
                    <td>${data.credentials.passwordFTP}</td>
                    </td>
                </tr>
                <tr>
                    <th scope="row">PIN k databázi:</th>
                    <td>${data.credentials.passwordDB}</td>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Název databáze:</th>
                    <td>${data.credentials.dbname}</td>
                    </td>
                </tr>
            </table>`);
            $("#credentials-container").show().slideDown("fast");
        } else {
            $("#credentials-container").hide();
            showMessageDialog("Doménu se nepodařilo zaregistrovat!");
        }
    });
}