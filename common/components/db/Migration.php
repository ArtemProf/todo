<?php

	namespace common\components\db;

	class Migration extends \yii\db\Migration
	{
		public function select($table, $columns) {
			$columns = is_array($columns)
				? implode(', ', $columns)
				: $columns;

			echo "    > select($columns) from $table ...";
			$time = microtime(true);
			$rows = $this->db->createCommand("SELECT $columns FROM $table")->queryAll();
			echo " done (time: " . sprintf('%.3f', microtime(true) - $time) . "s)\n";

			return $rows;
		}
	}