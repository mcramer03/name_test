<?php

class Controller_Home extends Controller
{

    public function action_index()
    {
        return Response::forge(View::forge('home'));
    }
    
}
