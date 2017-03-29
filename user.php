<?php 
class User{
	private $db;
	private $error;

	function __construct($DB_con)
	{
		$this->db = $DB_con;

		//mulai session
		if(!isset($_SESSION))
		{
		   session_start();
		}
	}

	//Fungsi Regiterasi
	public function register($uname, $umail, $upass)
	{
		try{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);

			//variable statment=$stmt atau query=$query 
			$stmt = $this->db->prepare("INSERT INTO users (user_name, user_email, user_pass)
										VALUES (:uname, :umail, :upass)");

			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);
			$stmt->execute();

			return true;
		}
		catch (PDOException $e)
		{
				//Jika terjadi error
				if($e->errorInfo[0] == 23000){
				//errorInfo[0] berisi informasi error query
				//23000 adalah kode error ketika ada data yang sama pada kolom y di set unique
				$this->error = "Email sudah digunakan!";
				return false;		
				}else{
				echo $e->getMessage();
				return false;
				}
		}
	}

	//Fungsi Login 
	public function login($uname, $umail, $upass)
	{
		try
		{
			//ambil data dari DB
			$stmt = $this->db->prepare("SELECT * FROM users WHERE user_name=:uname OR user_email=:umail LIMIT 1");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			
			//jika jumlah baris > 0
			if($stmt->rowCount() > 0)
			{
				//cek jika password yang dimasukan sesuai dengan yg ada di DB
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] =$userRow['user_id'];
					return true;
				}else{
					$this->error = "Wrong Email or password ";
					return false;
				} 
			}

		}catch(PDOException $e){
					echo $e->getMessage();
					return false;
				}	
	}

	//cek user apakah sudah login?
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}

	//Fungsi default redirect link page ini hanya sebagai contoh !
	public function redirect($url) 
	{
		header("Location: $url ");
	}

	//Ambil data user yang sudah login
	public function getUser()
	{
		//cek apakah sudah login
		if(!$this->is_loggedin){
			return false;
		}
			try
			{
			   //ambil data user dari DB
				$stmt = $this->db->prepare("SELECT * FROM users WHERE user_id = :user_id");
				$stmt->bindparam(":user_id", $_SESSION['user_session']);
				$stmt->execute();
				return $stmt->fetch();
			}catch (PDOException $e){
				echo $e->getMessage();
				return false;
			}
	}


	//Fungsi keluar /logout
	public function logout()
	{
		//hapus session
		session_destroy();
		//hapus user_session
		unset($_SESSION['user_session']);
		return true;
	}

	//mengambil error terakhir yg disimpan di variable error
	public function getLastError(){
		return $this->error;
	}

}

?>