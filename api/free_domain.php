// TODO:
// přijde POST request s polem "domain" = string se jménem domény (bez koncovky)
// ověř, které domény typu domain.cz, domain.com, domain.org jsou volné
/* vrátí JSON objekt {
    'freeDomains': array objektů {
        'name': jméno domény (s koncovkou!)
        'cost': cena domény (třeba 99 za .cz, 299 za .com a 199 za .org)
    }
}*/

<?php
    $domain = $_POST['domain'];

    

    return json_encode(array("name"=>$is_success, "credentials"=>$credentials));
?>