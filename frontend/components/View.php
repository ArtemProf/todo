<?php

	namespace app\components;

	use common\models\user\form\LoginForm;
	use Yii;

	class View extends \common\components\View
	{

		public $description = null;
		public $headerStyle = '';
		public $containerStyle = '';
		public $authModel;
		public $customHeader = null;

		/**
		 * @var string[] Список классов тега body
		 */
		private $bodyClasses = [];

		/**
		 * @var bool Управляет отображением кнопок соцсетей в подвале.
		 */
		public $showFooterSonets = true;


		public function useAngular() {
			$this->registerJsFile('/js/angular.js', ['position' => View::POS_HEAD]);
			$this->registerJsFile('/js/angular.sanitize.js', ['position' => View::POS_HEAD]);
		}

        public function useAngularMaterial() {
            $this->registerJsFile('/js/angular-animate/angular-animate.js', ['position' => View::POS_HEAD]);
            $this->registerJsFile('/js/angular-aria/angular-aria.js', ['position' => View::POS_HEAD]);
            $this->registerJsFile('/js/angular-messages/angular-messages.js', ['position' => View::POS_HEAD]);
            $this->registerJsFile('/js/angular-material/angular-material.js', ['position' => View::POS_HEAD]);
            $this->registerCssFile('/js/angular-material/angular-material.css');
            $this->registerCssFile('/css/angular-material-customization.css');
        }

		public function useJQuery() {

		}

		public function useSelect2(){
            $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js', [
                'position' => View::POS_HEAD,
                'depends' => 'yii\web\JqueryAsset'
            ]);
            $this->registerCssFile('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css');
            $this->registerCssFile('/css/select2-customization.css');
        }

		public function useSlider() {
			$this->registerCssFile('/js/bxSlider/jquery.bxslider.min.css');
			$this->registerJsFile('/js/bxSlider/jquery.bxslider.min.js', [
				'depends' => 'yii\web\JqueryAsset'
			]);
		}

		public function useD3() {
			$this->registerJsFile('http://d3js.org/d3.v3.js');
		}

		public function useDatatable(){

            $this->registerCssFile('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css');
            $this->registerJsFile('//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',[
                'depends' => 'yii\web\JqueryAsset'
            ]);

        }

		/**
		 * Отключение отображения кнопок социальных сетей в подвале
		 */
		public function hideFooterSonets() {
			$this->bodyClasses[] = 'b-body__noFooterSonets';
			$this->showFooterSonets = false;
		}

		public function getBodyClasses() {
			/** @noinspection PhpUndefinedFieldInspection */
			return array_merge(['b-body-'.$this->context->id, $this->headerStyle, $this->containerStyle], $this->bodyClasses);
		}

		public function addBodyClass($class) {
			$this->bodyClasses[] = $class;
		}
	}