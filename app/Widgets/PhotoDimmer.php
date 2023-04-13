<?php

namespace App\Widgets;

use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class PhotoDimmer extends BaseDimmer
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
            case "photographer":
                $count = Photo::where('photographer_id', $authUser->id)->count();
                break;
            case "category":                
                $count = Photo::whereIn('category_id', $authUser->categories()->pluck('id')->toArray())->count();
                break;
            default:
                $count = Photo::count();
                break;
        }
        $photoSnippet = $count > 1 ? 'Photos' : 'Photo';
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-photos',
            'title'  => "$count $photoSnippet",
            'text'   => "",
            'button' => [
                'text' => "View all Photos",
                'link' => route('voyager.photos.index'),
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
        return in_array(Auth::user()->role->name, ["admin", "photographer", "category"]);
    }
}
