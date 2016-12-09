<?php

	namespace frontend\components\widgets;

	use yii\helpers\Html;

	class AuthChoice extends \yii\authclient\widgets\AuthChoice
	{
		public $options = [
			'class' => 'b-social-auth row'
		];

		protected function renderMainContent() {
			foreach ($this->getClients() as $externalService) {
				$this->clientLink($externalService);
			}
		}

		public function clientLink($client, $text = null, array $htmlOptions = []) {
			$htmlOptions = [
				'class' => 'btn btn-login-'.$client->getId().' col-md-5'
			];

			if ($this->popupMode) {
				$viewOptions = $client->getViewOptions();
				isset($viewOptions['popupWidth']) && $htmlOptions['data-popup-width'] = $viewOptions['popupWidth'];
				isset($viewOptions['popupHeight']) && $htmlOptions['data-popup-height'] = $viewOptions['popupHeight'];
			}

			echo Html::a(
				'<i class="fa fa-'.$client->getId().'"></i>',
				$this->createClientUrl($client),
				$htmlOptions
			);
		}
	}