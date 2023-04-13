<?php

namespace App\Widgets;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class CategoryDimmer extends BaseDimmer
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
        $authUser = Auth::user();       
        switch ($authUser->role->name) {
            case "category":
                $count = $authUser->categories()->count();
                break;
            default:
                $count = Category::count();
                break;
        }
        $categorySnippet = $count > 1 ? 'Categories' : 'Category';
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-categories',
            'title'  => "$count $categorySnippet",
            'text'   => "",
            'button' => [
                'text' => "View all Categories",
                'link' => route('voyager.categories.index'),
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
        return in_array(Auth::user()->role->name, ["admin", "category"]);
    }
}
