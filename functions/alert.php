<?php

    function print_message (){
        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            print "<span style='color:green'>" . $_SESSION['message'] . "</span>";
            unset($_SESSION['message']);
            
       }
    }


    function print_error (){
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            print "<span style='color:red'>" . $_SESSION['error'] . "</span>";
            unset($_SESSION['error']);
       }
    }

    function print_alert (){
        $types = ["message", "error"];
        $colors = ["green", "red"];
        
        for($i = 0; $i < count($types); $i++){
            if(isset($_SESSION[$types[$i]]) && !empty($_SESSION[$types[$i]])){
                print "<span style='color:". $colors[$i]."'>" . $_SESSION[$types[$i]] . "</span>";
                
            }
        }
        session_unset(); 

    }

    function set_alert($type = "message", $content = ""){
        switch($type){
            case "message":
                $_SESSION['message'] = $content;
            break;
            case "error":
                $_SESSION['error'] = $content;
            break;
            default:
            $_SESSION['message'] = $content;
        break;
        }
        

    }
?>