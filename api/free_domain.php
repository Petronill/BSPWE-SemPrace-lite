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

    $shell_format = "if test -d /etc/apache2/sites-available/%s_%s.conf; then echo 'exists'; fi";

    $cz_exists = shell_exec(sprintf($shell_format, $domain, "cz"));
    $com_exists = shell_exec(sprintf($shell_format, $domain, "com"));
    $org_exists = shell_exec(sprintf($shell_format, $domain, "org"));

    $free_domains = array();

    if(strcmp($cz_exists, "exists") != 0) {
        array_push($free_domains, array("name"=>$domain + ".cz", "cost"=>99));
    }

    if(strcmp($com_exists, "exists") != 0) {
        array_push($free_domains, array("name"=>$domain + ".com", "cost"=>299));
    }

    if(strcmp($org_exists, "exists") != 0) {
        array_push($free_domains, array("name"=>$domain + ".org", "cost"=>199));
    }

    return json_encode($free_domains);
?>