<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 11/5/18
 * Time: 5:34 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;

class NavigationViewComposer
{
    public function compose(View $view) {
        if(auth()->check()) {
            $view->with('companies', auth()->user()->companies);
        }

    }
}