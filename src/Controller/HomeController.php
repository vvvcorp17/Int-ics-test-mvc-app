<?php

namespace App\Controller;

use App\Handlers\Request;
use App\Model\Message;
use App\Repository\MessageRepository;
use App\Template\Template;

/**
 *
 */
class HomeController
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
        $repository = new MessageRepository();

        if ($request->isPost()) {
            $body = $request->get('body');

            if (!$body) {
                $this->render->view('system/400', ['message' => 'Message is required']);
                return;
            }

            $message = new Message();
            $message->setBody($body);
            $repository->save($message);
        }

        $this->render->view('home/index', ['messages' => $repository->getAll()]);
    }
}
