<?php

function token_generator(){
    $token = "";
    $alphabets = [
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", 'y', 'z',
        "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", 'Y', 'Z'
    ];

    for ($i = 0; $i <= 20; $i++) {

        $index = mt_rand(0, count($alphabets) - 1);
        $token .= $alphabets[$index];
    }
    return $token;
}


function is_token_set(){

    if(isset($_GET['token'])){
        return true;
    }
     return false;

}


function find_token($email = ""){

    //ResetPassword here
    $allUsersTokens = scandir("db/token/");
    $countAllUsersTokens = count($allUsersTokens);


    for ($counter = 0; $counter < $countAllUsersTokens; $counter++) {
        $currentTokenFile = $allUsersTokens[$counter];

        //send reset link to user
        if (($currentTokenFile == $email . ".json") || (is_user_loggedIn())) {

            $tokenContent = json_decode(file_get_contents("db/token/" . $currentTokenFile));
            return $tokenContent;


        }
    }
    return false;

}

function verify_token(){
    
}
?>