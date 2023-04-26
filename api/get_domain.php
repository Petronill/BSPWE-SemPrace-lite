<?php
    $domain = $_POST['domain'];

    $username = $domain."_".substr(uniqid(""), 6);
    $passwordDB = substr(uniqid("", true), -8);
    $passwordFTP = substr(uniqid("", true), -8);

    // Create DB
    $output = shell_exec(sprintf("/var/www/scripts/create_database.sh '%s' '%s' '%s'", 
        $username."_db", $username, $passwordDB));

    // Create FTP
    if(is_string($output)) {
        $output = shell_exec(sprintf("sudo /var/www/scripts/create_ftp.sh '%s' '%s'", 
        $username, $passwordFTP));
    }
    
    // Create web
    if(is_string($output)) {
        $output = shell_exec(sprintf("sudo /var/www/scripts/create_web.sh '%s' '%s'", 
            $username, $domain));
    }

    $is_success = is_string($output) ? true : false;
    $credentials = array("username"=>$username, "passwordDB"=>$passwordDB, "passwordFTP"=>$passwordFTP);
    
    echo json_encode(array("success"=>$is_success, "credentials"=>$credentials));
?>