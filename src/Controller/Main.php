<?php

namespace App\Controller;

class Main extends AbstractController
{
    public function actionIndex(): void
    {
        $this
            ->view
            ->setTemplate("Main/index");
    }
}