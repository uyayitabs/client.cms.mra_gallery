<?php

namespace App\Widgets;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;

class EventDimmer extends BaseDimmer
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
                $userCategories = $authUser->categories()->get();
                $userEventIds = [];
                foreach ($userCategories as $category) {
                    $categoryEventIds = $category->events()->pluck('id')->toArray();
                    $userEventIds = array_unique(array_merge($userEventIds, $categoryEventIds));
                }
                $count = count($userEventIds);
                break;
            default:
                $count = Event::count();
                break;
        }
        $eventSnippet = $count > 1 ? 'Events' : 'Event';
        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-calendar',
            'title'  => "$count $eventSnippet",
            'text'   => "",
            'button' => [
                'text' => "View all Events",
                'link' => route('voyager.events.index'),
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
