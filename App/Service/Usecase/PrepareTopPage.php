<?php

namespace App\Service\Usecase;

use Core\Di\DiContainer as Di;
use App\Service\Presenter\Page\TopPagePresenter;

class PrepareTopPage {

	public function execute(): TopPagePresenter {
		return Di::get(TopPagePresenter::class);
	}
}