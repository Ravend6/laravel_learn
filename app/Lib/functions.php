<?php

use App\Lib\Message;

if (!function_exists('delete_to_route')) {
    function delete_to_route($routeName, $id) {
        $form = Form::open(['route' => [$routeName, $id], 'method' => 'delete']);
        $form .= Form::submit(Message::DELETE_BUTTON, [
            'class' => 'btn btn-danger',
            'onclick' => 'return confirm("' . Message::DELETE_CONFIRM .'");']);
        $form .= Form::close();
        return $form;
    }
}