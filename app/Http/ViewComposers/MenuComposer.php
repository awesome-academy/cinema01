<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

use App\Models\Movie;

class MenuComposer
{
    /**
     * Create a new profile composer.
     *
     * @return  void
     */
    public function __construct()
    {
        //
    }

    /**
     * Bind data to the view.
     *
     * @param    View  $view
     * @return  void
     */
    protected function movie()
    {
        $movie = Movie::with('votes')
                    ->orderBy('day_start', 'DESC')
                    ->take(config('const.menu_movie'));

        return $movie;
    }
    public function compose(View $view)
    {
        $new = $this->movie()->where('status', 0)->get();
        $soon = $this->movie()->where('status', 1)->get();
        $view->with('new', $new);
        $view->with('soon', $soon);
    }
}
