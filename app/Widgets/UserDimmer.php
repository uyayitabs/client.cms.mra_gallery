<?php

namespace App\Widgets;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class UserDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = User::count();
        $userSnippet = $count > 1 ? 'Users' : 'User';
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-person',
            'title'  => "$count $userSnippet",
            'text'   => "",
            'button' => [
                'text' => "View all Users",
                'link' => route('voyager.users.index'),
            ],
            'image' => Voyager::image(setting('admin.dimmer_bg')),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->role->name === "admin";
    }
}
