<?php

	/** @var \app\components\View $this */
	/** @var \common\models\course\Course[] $courses */
	/** @var \common\models\profession\Profession[] $professions */
	/** @var \common\models\content\Post[] $facts */

	use app\components\View;
	use yii\helpers\Url;
	use yii\widgets\ActiveForm;

	$this->title = 'БудуГуру';
	$this->headerStyle = View::HEADER_WHITE;
	$this->containerStyle = View::CONTAINER_NONE;

?>

	<div class="b-profession">
		<div class="shader"></div>
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
				<div class="b-profession-title">iT - моя будущая профессия</div>
				<div class="b-profession-description col-md-10 col-md-offset-1">Узнай, как стать настоящим интернет-профессионалом</div>
			</div>
			<div class="col-md-10 col-md-offset-1">
				<a class="btn btn-primary btn-lg" href="#profession">Кем стать?</a>&nbsp;&nbsp;&nbsp;
				<a class="btn btn-primary btn-lg" href="#what-can-i-be">Что нужно знать?</a>&nbsp;&nbsp;&nbsp;
				<a class="btn btn-primary btn-lg" href="#where-to-study">Где учиться?</a>
			</div>
			<?$form = ActiveForm::begin(['action' => Url::toRoute(['/user/subscribe'])])?>
			<div class="row" style="position:relative;top:20px;margin-bottom:60px">
				<div class="col-md-6 col-md-offset-3">
					<h3 style="font-weight:normal;font-family:GTWalsheimProLight, 'Helvetica Neue', Helvetica, Arial, sans-serif">Подписаться на рассылку</h3>
					<div class="input-group">
						<input type="text" name="Subscriber[email]" class="form-control" placeholder="Ваш E-mail..." style="height:39px;z-index:1">
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit">Подписаться</button>
						</span>
					</div>
				</div>
			</div>
			<?$form->end()?>
			<div class="col-sm-8 col-sm-offset-3">
				<br><br>
				<div class="row b-links">
					<div class="col-sm-6">
						При поддержке:
						<img src="/img/index.mks.png" width="300" class="img-responsive">
					</div>
					<div class="col-sm-6">
						Проект реализует:
						<img src="/img/index.rocit.png" width="180" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="b-index-block">
		<a name="profession"></a>
		<div class="container">
			<div class="row">
				<div class="col-md-12 b-header">
					<a class="b-header-title" href="<?=Url::toRoute(['competence/test'])?>">Какую профессию выбрать?</a>
					<p class="b-header-description b-header-description__bold">Ты - это твои личные интересы, таланты и особенности пути.<br>Наш тест поможет выбрать ту профессию, которая подходит тебе больше всего<br>Атлас профессий расскажет, чем занимаются специалисты мира IT.<br>Раздел Экосистема IT расскажет, в каких отраслях работают профессионалы индустрии.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="b-analitycs row">
						<div class="b-analitycs-widget col-md-4">
							<div class="b-analitycs-widget-icon icon-analytics-widget-1"></div>
							<div class="b-analitycs-widget-value">71 000 р.</div>
							<div class="b-analitycs-widget-description">средний заработок в&nbsp;IT&nbsp;отрасли по&nbsp;данным&nbsp;Superjob</div>
						</div>
						<div class="b-analitycs-widget col-md-4">
							<div class="b-analitycs-widget-icon icon-analytics-widget-2"></div>
							<div class="b-analitycs-widget-value">78%</div>
							<div class="b-analitycs-widget-description">программистов довольны своим&nbsp;выбором</div>
						</div>
						<div class="b-analitycs-widget col-md-4">
							<div class="b-analitycs-widget-icon icon-analytics-widget-3"></div>
							<div class="b-analitycs-widget-value">33 160</div>
							<div class="b-analitycs-widget-description">вакансий по данным<br>hh.ru</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<ul class="b-banner">
		<li class="prof-atlas">
			<div class="shader"></div>
			<div class="eco-system-it-text">
				<div class="b-block-title">Атлас профессий</div>
				Подробное описание профессий<br>мира IT
				<a class="btn btn-primary" href="<?=Url::toRoute(['profession/index'])?>">Перейти в раздел</a>
			</div>
		</li>
		<li class="eco-system-it">
			<div class="fa-items">
				<i class="fa fa-university color-1"></i>
				<i class="fa fa-bullhorn color-2"></i>
				<i class="fa fa-keyboard-o color-1"></i>
				<i class="fa fa-sitemap color-4"></i>
				<i class="fa fa-graduation-cap color-1"></i>
				<i class="fa fa-search color-9"></i>
				<i class="fa fa-map-marker color-5"></i>
				<i class="fa fa-user-secret color-6"></i>
				<i class="fa fa-lock color-7"></i>
				<i class="fa fa-users color-6"></i>
				<i class="fa fa-gamepad color-1"></i>
				<i class="fa fa-pencil color-3"></i>
				<i class="fa fa-pencil color-1"></i>
				<i class="fa fa-bar-chart color-4"></i>
				<i class="fa fa-mobile color-1"></i>
				<i class="fa fa-university color-1"></i>
				<i class="fa fa-bullhorn color-2"></i>
				<i class="fa fa-keyboard-o color-1"></i>
				<i class="fa fa-sitemap color-4"></i>
				<i class="fa fa-graduation-cap color-1"></i>
				<i class="fa fa-search color-9"></i>
				<i class="fa fa-map-marker color-5"></i>
				<i class="fa fa-user-secret color-6"></i>
				<i class="fa fa-lock color-7"></i>
				<i class="fa fa-users color-6"></i>
				<i class="fa fa-gamepad color-1"></i>
				<i class="fa fa-pencil color-3"></i>
				<i class="fa fa-pencil color-1"></i>
				<i class="fa fa-bar-chart color-4"></i>
				<i class="fa fa-mobile color-1"></i>
				<div class="shader"></div>
			</div>
			<div class="eco-system-it-text">
				<div class="b-block-title">Экосистема IT</div>
				Профессиональные области рынка<br>информационных технологий
				<a class="btn btn-primary" href="<?=Url::toRoute(['area/index'])?>">Перейти в раздел</a>
			</div>
		</li>

	</ul>

	<div class="b-documents">
		<a name="what-can-i-be"></a>
		<div class="container">
			<div class="col-md-8 col-md-offset-2 b-header">
				<h2 class="b-header-title">Что нужно знать?</h2>
				<p class="b-header-description b-header-description__gray">Добро пожаловать в Атлас IT-профессий. Мы расскажем, чем занимаются IT-специалисты, на кого равняться и как стать настоящим гуру технологий</p>
			</div>
		</div>

		<?='</div>'?>

		<div class="b-container-gray b-index-media-items">
			<div class="media-items">
				<?foreach($facts as $post):?>
					<a class="media-item" href="<?=Url::toRoute(['/application/post', 'id' => $post->id])?>">
						<span class="gradient"></span>
						<div class="media-item-background" style="background-image:url('/img/pages/<?=$post->id?>/280x180.jpg')"></div>
						<div class="media-item-text">
							<h4><?=$post->name?><?if($post->id_tag == 2):?><br><?=$post->description?><?endif?></h4>
							<div class="media-item-links">
								<span><i class="fa fa-file-text-o"></i><?=$post->tag->name?></span>
								<?if($post->sourceHost):?><span class="media-item-link"><i class="fa fa-link"></i><?=$post->sourceHost?></span><?endif?>
								<div class="hider"></div>
							</div>
						</div>
					</a>
				<?endforeach?>
			</div>
			<a href="<?=Url::toRoute(['media/index'])?>" class="btn btn-primary btn-lg">Больше материалов</a>
		</div>

		<?='<div class="b-documents">'?>

		<div class="col-md-12 b-header-description b-header-description__gray">
			<div class="col-md-7 col-md-offset-2">
				1 000 000 материалов на it- тематику, цифры, полезные инструменты, ссылки на профильные ресурсы ...
			</div>
			<div class="col-md-3"><a href="#" class="b-blue-button btn btn-default">Все материалы</a></div>
		</div>
	</div>

	<div class="b-where">
		<div class="shader"></div>
		<a name="where-to-study"></a>
		<div class="container">
			<div class="col-md-8 col-md-offset-2 b-header">
				<h2 class="b-header-title" style="color:white">Гид по карьере в IT</h2>
				<p class="b-header-description b-header-description__white">Набор инструментов для развития твоих<br>профессиональных навыков и знаний</p>
			</div>
			<div class="b-where-row">
				<div class="col-md-3">
					<div class="b-where-place">
						<div class="icon-where-place-1"></div>
						<div class="b-where-text">
							<div class="b-where-title">Пройти тест</div>
							<div class="b-where-description">Найди подходящую<br>IT-профессию</div>
						</div>
						<a class="btn btn-default" href="<?=Url::toRoute(['competence/test'])?>">Пройти тест</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="b-where-place">
						<div class="icon-where-place-4"></div>
						<div class="b-where-text">
							<div class="b-where-title">Атлас профессий</div>
							<div class="b-where-description">Узнай, кто работает в&nbsp;отрасли</div>
						</div>
						<a class="btn btn-default" href="<?=Url::toRoute(['profession/index'])?>">Подобрать профессию</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="b-where-place">
						<div class="icon-where-place-2"></div>
						<div class="b-where-text">
							<div class="b-where-title">Найти курс</div>
							<div class="b-where-description">Учись тому что пригодиться<br>у тех, кто знает что говорит</div>
						</div>
						<a class="btn btn-default" href="<?=Url::toRoute(['course/index'])?>">
							<span class="hidden-md">Найти курс</span>
							<span class="visible-md">Программа</span>
						</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="b-where-place">
						<div class="icon-where-place-3"></div>
						<div class="b-where-text">
							<div class="b-where-title">Найти стажировку</div>
							<div class="b-where-description">Получи опыт и заработай<br>очки для своего резюме</div>
						</div>
						<a class="btn btn-default" href="<?=Url::toRoute(['vacancy/list'])?>?2">
							<span class="hidden-md">Выбрать стажировку</span>
							<span class="visible-md">Стажировка</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?/*
<h2>Востребованные профессии</h2>
<ol>
	<?foreach($professions as $profession):?>
		<?php

			$demandAndSalary = [];
			if ($profession->demand) $demandAndSalary[] = $profession->demand->name;
			if ($profession->salary) $demandAndSalary[] = sprintf('от %d руб.', $profession->salary);

		?>
		<li><b><?=Html::a($profession->name, ['/profession/show', 'id' => $profession->id])?></b>
			<?if($demandAndSalary):?>
				/ <?=implode(', ', $demandAndSalary)?>
			<?endif?>
		</li>
	<?endforeach?>
</ol>
<?=Html::a('все профессии...', ['/profession/index'])?>

<h2>Популярные курсы</h2>
<ol>
	<?foreach($courses as $course):?>
		<li><b><?=Html::a($course->name, ['/course/show', 'id' => $course->id])?></b> / просмотров: <?=$course->viewsCount?><br><?=$course->announce?></li>
	<?endforeach?>
</ol>
<?=Html::a('все курсы...', ['/course/index'])?>
*/?>