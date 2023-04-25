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
})

function seeDomain(domain) {
    post('api/free_domain.php', valueToData('domain', domain))
        .then(data => {
            if (data.length > 0) {
                $("#no-data-container").hide();
                updateTable(data);
                $(".table-container").show().slideDown("fast");
            } else {
                $(".table-container").hide()
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
            showMessageDialog(`Uživatelské jméno: ${data.credentials.username},
heslo do databáze: ${data.credentials.passwordDB},
heslo k FTP: ${data.credentials.passwordFTP}`); // OK?
        } else {
            showMessageDialog("Doménu se nepodařilo zaregistrovat!");
        }
    });
}