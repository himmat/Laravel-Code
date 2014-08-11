<?php

class IndexController extends BaseController
{
    protected $layout = 'layouts.base';
    public function __construct()
    {
        $this->beforeFilter('auth');
    }

    public function index()
    {
        $this->layout->content = View::make('dashboard.dashboard');
    }
}
