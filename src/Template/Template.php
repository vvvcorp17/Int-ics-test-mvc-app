<?php

namespace App\Template;

use App\Handlers\OutputData;

/**
 *
 */
class Template
{
    /**
     * @param string $template
     * @param array $params
     * @return void
     */
    public function view(string $template, array $params = []): void
    {
        $templatePath = "../src/Template/{$template}.html.php";
        require "../src/Template/header.html.php";

        if (!file_exists($templatePath)) {
            $message = "The template '$template' doesn't exists";
            require "../src/Template/system/error.html.php";
            return;
        }

        OutputData::setData($params);

        require $templatePath;
        require "../src/Template/footer.html.php";
    }
}