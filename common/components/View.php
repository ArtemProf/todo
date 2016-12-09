<?php

	namespace common\components;

	use common\components\helpers\ArrayHelper;
	use Yii;
	
	class View extends \yii\web\View
	{
		public function jsGate($var, $model = null, $schema = false) {
			if ($model === null && is_array($var)) {
				foreach ($var as $vvar => $model)
					$this->jsGate($vvar, $model);
				return;
			}

			if ($schema !== false)
				$model = ArrayHelper::toArray($model, $schema);

			if (is_array($model) || is_object($model))
				$model = json_encode(
					ArrayHelper::htmlEncode($model),
					JSON_UNESCAPED_UNICODE
				);

			$this->registerJs("$var = $model", View::POS_HEAD);
		}

		public function usePageScript() {
			$pageKey = $this->getPageKey();
			$pageScript = sprintf('/js/%s.js?%d', $pageKey, filemtime(Yii::getAlias("@frontend/web/js/{$pageKey}.js")));

			$this->registerJsFile($pageScript, [
				'depends' => 'yii\web\JqueryAsset'
			]);
		}

		private function getPageKey() {
			static $pageKey = null; if ($pageKey === null) {
				$pageComponents = pathinfo($this->viewFile);
				$pageKey = implode('.', [
					basename($pageComponents['dirname']),
					$pageComponents['filename']
				]);
			}

			return $pageKey;
		}
	}