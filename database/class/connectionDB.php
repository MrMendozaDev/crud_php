<?php 

	class connectionDB
	{

		private const server = "localhost";

		function __construct() {			

		}

		public static function getConnection($db= "") {

			$config = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"]."/config.json"));

			$connectiondb = $config->db;

			if($db != ""){
				$connectiondb = $db;
			}

			$cnn = mysqli_connect($config->server, $config->user, $config->password, $connectiondb);

			echo $cnn->error;

			if ($cnn->error) {

				die();
			}

			return $cnn;
		}
		
	

	}

?>