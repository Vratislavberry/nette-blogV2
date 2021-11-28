<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    private Nette\Database\Explorer $database;

    public function __construct(Nette\Database\Explorer $database)
    {
        $this->database = $database;
    }

    //Co se pošle do view sablony
    public function renderDefault(): void
    {
        $this->template->posts = $this->database
            // Posleme tabulku posts, serazenou podle datumu vytvoreni sestupně a 
            // zobrazi jich to max 5 
            ->table('posts')
            ->order('created_at DESC')
            ->limit(5);
    }
}