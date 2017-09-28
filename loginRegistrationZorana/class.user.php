
<?php 
//uradi i filter sanitize
//i password verify

include "class.db.php";
  class User{

    protected $db;

    public function __construct(){
		$db = new DB_con();
        $this->db = new DB_con();
		
		$this->db = $this->db->ret_obj();

    }

    public function registration($username, $email, $password)
	{
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT * FROM korisnici WHERE `username`='$username' OR `email`='$email'";
			
		$result = $this->db->query($query) or die($this->db->error);
			
		$count_row = $result->num_rows;

		if($count_row == 0){
			$query = "INSERT INTO korisnici SET 
						`username`='$username', 
						`email`='$email',
						`password`='$password'
						";
				
			$result = $this->db->query($query) or die($this->db->error);
				
			return true;
		}
		else{
			return false;
		}
			
			
	}

            
    public function login()
	{	
        $email = ISSET($_POST["email"]) ? trim($_POST["email"]) : "";
        $password = ISSET($_POST["password"]) ? trim($_POST["password"]) : "";
        $query ="SELECT `id_korisnik` from `korisnici`
					WHERE `email`='$email'  
					or `password`='$password'";


        $result = $this->db->query($query) or die($this->db->error);

        $user_data = $result->fetch_array(MYSQLI_ASSOC);

        $count_row = $result->num_rows;

        if ($count_row == 1) 
		{
            $_SESSION['login'] = true;
            $_SESSION['id_korisnik'] = $user_data['id_korisnik'];
            return true;
        }
          else{
              return false;
          }
	 
	}

    public function get_fullname($id_k)
	{
        $query="SELECT `username` FROM `korisnici` WHERE `id_korisnik` = $id_k";

        $result = $this->db->query($query) or die($this->db->error);
		
		$user_data = $result->fetch_array(MYSQLI_ASSOC);

        echo $user_data['username'];

    }


    public function get_session()
	{
          return $_SESSION['login'];

    }



    public function user_logout() 
	{
		$_SESSION['login'] = FALSE;
		unset($_SESSION);
		session_destroy();
	}

	public function search($term)
	{
        $query = "SELECT * FROM korisnici WHERE username like '%$term%' OR email like '%$term%' ";
		$result = $this->db->query($query) or die($this->db->error);
		$user_data = $result->fetch_array(MYSQLI_ASSOC);
		
		echo "Ime korisnika:" . " " . $user_data['username'];
		echo "<br>";
		echo "Email korisnika:" . " " . $user_data['email'];
    }

  }
?>