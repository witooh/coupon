<?php

class ShopController extends BaseController {

	public function Create()
	{
        $shop = ShopManager::create(Input::all());

        return Response::json($shop->toArray());
	}

}