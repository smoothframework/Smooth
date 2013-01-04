<?php
	use Smooth\Libraries\Db;

	class TestModel extends Model
	{

		public function get_data()
		{
			return Db::fetch('');
		}
		
	}