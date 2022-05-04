<?php 
    include_once('connectionDB.php');

	class LoginClass
	{
		function __construct() {			

		}

        function new_user($data) {
            $names = $data["names"];
            $fatherly_surname = $data["fatherly_surname"];
            $maternal_surname = $data["maternal_surname"];
            $address = $data["address"];
            $email = $data["email"];
            $password = $data["password"];
            
            $cnnMavi = connectionDB::getConnection();
        
            $query = "INSERT INTO users (names, fatherly_surname, maternal_surname, address, email, password)
                        VALUES ('$names', '$fatherly_surname', '$maternal_surname', '$address', '$email', '$password')";
        
        
            $result = $cnnMavi->query($query);
            echo $cnnMavi->error;
            return $result;
		}

        function update_password($data){
            $email = $data["email"];
            $password = $data["password"];

            $cnnMavi = connectionDB::getConnection();

            $query = "UPDATE users SET password = '$password' WHERE email = '$email'";
    
            $result = $cnnMavi->query($query);
            echo $cnnMavi->error;
            return $result;
        }

        function login_user($data){
            $email = $data["email"];
            $password = $data["password"];

            $cnnMavi = connectionDB::getConnection();

            $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    
            $result = $cnnMavi->query($query);
            echo $cnnMavi->error;

            $data = [];
			while($row = $result->fetch_assoc()){
				array_push($data, $row);
			}

            return $data;
        }

        function delete_account($data){
            $email = $data["email"];

            $cnnMavi = connectionDB::getConnection();

            $query = "DELETE FROM users WHERE email = '$email'";
    
            $result = $cnnMavi->query($query);
            echo $cnnMavi->error;

            return $result;
        }
		
	

	}

?>