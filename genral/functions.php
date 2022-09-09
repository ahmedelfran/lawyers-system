<?php

function testMessage($condation, $message)
{

    if ($condation) {
        echo "
        <div style='margin-top: 100px' class='alert alert-success mx-auto w-50'>
            $message success
        </div>
        ";
    } else {
        echo "
        <div style='margin-top: 100px'  class='alert alert-danger mx-auto w-50''>
            $message Failed
        </div>
        ";
    };
};

function go($path){
    echo "<script>
    window.location.replace('/lawyer/$path');
    </script>";
};

function auth(){
    if(isset($_SESSION['admin'])){
    
    } else {
        go("pages-login.php");
    }
}

auth();



// Role
function authrization($authNumber1=0 , $authNumber2=0 , $authNumber3=0 ){
    if($_SESSION['role'] == $authNumber1 || $_SESSION['role'] == $authNumber2 || $_SESSION['role'] == $authNumber3 ){

    }else{
        go("pages-error-404.php");
    }
}
?>