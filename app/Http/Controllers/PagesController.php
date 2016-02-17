<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function getIndex()
    {
        return view('pages.index');
    }

    public function getMail()
    {
        \Mail::send('emails.test', ['name' => 'Lol'], function ($message) {
            $message->to('bob@email.com', 'Bob')->subject('Привет!');
            // $message->to('bob@email.com', 'Bob')->from('local@jost.com')->subject('Привет!');
        });
        return view('pages.index');
    }
}
