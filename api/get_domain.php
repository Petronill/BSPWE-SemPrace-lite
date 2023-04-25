//TODO:
// přijde POST request s polem "domain" = string se jménem domény (s koncovkou!)
// zavolej skript na založení domény
// vrátí JSON objekt {
    'success': true/false
    'credentials': array objektů s přihlašovacími údaji k DB a FTP
}

<?php
    $domain = $_POST['domain'];

    $username = "TODO generate";
    while(username_exists($username)) {
        $username = "TODO generate";
    }

    function username_exists($uname) {
        $exists = shell_exec("if test -d /home/" + $uname + "; then echo 'exists'; fi");
        return strcmp($exists, "exists") == 0;
    }

    $password = "TODO generate - at least 6 char/num long";

    // Create DB
    $output = shell_exec(sprintf("/var/www/scripts/create_database.sh '%s' '%s' '%s'", 
        $username + "_db", $username, $password));

    // Create FTP
    if(is_string($output)) {
        $output = shell_exec(sprintf("sudo /var/www/scripts/create_ftp.sh '%s' '%s'", 
        $username, $password));
    }
    
    // Create web
    if(is_string($output)) {
        $output = shell_exec(sprintf("sudo /var/www/scripts/create_web.sh '%s' '%s'", 
            $username, $domain));
    }

    $is_success = is_string($output) ? true : false;
    $credentials = array("username"=>$username, "password"=>$password);
    
    return json_encode(array("success"=>$is_success, "credentials"=>$credentials));
?>