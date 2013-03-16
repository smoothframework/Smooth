<?php

	/**
	 * @package    Smooth Export Library
	 */
	
	namespace Smooth\Libraries;

	use Smooth\Libraries\Db;

	class Export
	{

		public static function data($fileName, $tableName)
		{
			// Db::query("SELECT * FROM $tableName INTO OUTFILE " . $fileName);
			// output headers so that the file is downloaded rather than displayed
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename=data.csv');

			// create a file pointer connected to the output stream
			$output = fopen('php://output', 'w');

			// output the column headings
			fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

			$rows = Db::query("SELECT * FROM users");

			// loop over the rows, outputting them
			while ($row = implode('', $rows)) fputcsv($output, $row);
		}

	}