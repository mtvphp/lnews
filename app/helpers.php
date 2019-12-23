<?php

function get_user_name($id) {
    return \App\User::where('id', $id)->first()->name;
}
