<?php

	use Smooth\Libraries\Db;

	class TestModel extends Smooth\Model
	{

		public function get_data()
		{
			return Db::fetch('');
		}
		
	}