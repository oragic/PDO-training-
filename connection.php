<?php

	abstract class Connection
	{
		private static $conn;

		public static function getConn()
		{
            if (self::$conn == null) 
			{
                try
                {
                    self::$conn = new PDO('mysql: host=localhost; dbname=testt;', 'root', '');
                }
                catch(PDOExcepton $error)
                {
                    echo "Sorry, error corred with database".$error->getMessage();
                }
                catch(Exception $error)
                {
                    echo "sorry,ocorred an error unexpected".$error->getMessage();
                }    
			}
			
			return self::$conn;
		}
	}