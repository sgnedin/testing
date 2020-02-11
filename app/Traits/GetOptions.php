<?php

namespace App\Traits;

/**
 * This is for options in AjaxController
 */
trait GetOptions
{
    public function getOptions(Request $request) {
        return $options = [
            'user' => $request->get('user'),
            'id' => $request->get('id')
        ];
    }

    public function getUser(Request $request) {
        return $request->get('user');
    }
}
