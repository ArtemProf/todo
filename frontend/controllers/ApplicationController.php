<?php

	namespace app\controllers;

	use app\components\Controller;

	use Yii;

	class ApplicationController extends Controller
	{
		public function actionIndex() {
			$professions = Profession::find()
				->where(['published' => true])
				->limit(4)
				->all();

			$courses = Course::find()
				->where(['published' => true])
				->orderBy(['sort' => 'asc'])
				->limit(4)
				->all();

			$facts = Post::find()
				->orderBy('sort ASC, id DESC')
				->limit(14)
				->all();

			return $this->render('index', [
				'professions' => $professions,
				'courses' => $courses,
				'facts' => $facts
			]);
		}

		public function actionSearch() {
			$search = Yii::$app->request->post('search');
			return $this->render('search', [
				'search' => $search
			]);
		}

		public function actionAbout() {
			return $this->render('../about/index');
		}

		public function actionPost($id) {
			/** @var Post $post */
			$post = Post::find()
				->where(['id' => $id])
				->with(['tag'])
				->one();

			return $this->render('post', [
				'post' => $post
			]);
		}

		public function actionPartners() {
			return $this->render('partners');
		}
	}