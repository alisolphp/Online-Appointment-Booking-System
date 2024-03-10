<?php
function view($viewFileRelativeAddress, $data = []){

    $viewFileAbsoluteAddress = __DIR__."/views/".$viewFileRelativeAddress.".php";

    if( file_exists($viewFileAbsoluteAddress) ){
        require $viewFileAbsoluteAddress;
    }
}