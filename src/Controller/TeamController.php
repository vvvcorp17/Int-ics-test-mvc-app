<?php

namespace App\Controller;

use App\Handlers\Request;
use App\Template\Template;

/**
 *
 */
class TeamController
{
    /**
     * @var Template
     */
    private Template $render;

    /**
     *
     */
    public function __construct()
    {
        $this->render = new Template();
    }

    /**
     * @param Request $request
     * @return void
     */
    public function index(Request $request): void
    {
        $this->render->view('empty/index', ['message' => 'Welcome to TeamController, index method']);
    }
}
