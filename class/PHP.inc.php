<?php
include_once ("../config.inc.php");
class PHP extends ConfigSystem
{

	public function Inc($page)
	{
		include($page);
	}
	public function IncOne($page)
	{
		include_once($page);
	}
	public function Content($page,$permission)
	{	
		include ($this->phpFunction); 
		$PHP	= new PHP();
		$HTML	= new HTML();
		$HTML2	= new HTML2();
		$DB		= new Con_DB();
		$FORM	= new FORM();
		$BS		= new Bootstarp();
		$TABLE	= new TABLE();
		
		$mainpage = "UserMain.php";

		if(!$page){$page=$mainpage;}
				include($page);	
	}
	public function ContentAdmin($page,$permission)
	{	
		include ($this->phpFunction); 
		$PHP	= new PHP();
		$HTML	= new HTML();
		$HTML2	= new HTML2();
		$DB		= new Con_DB();
		$FORM	= new FORM();
		$BS		= new Bootstarp();
		$TABLE	= new TABLE();
		
		$mainpage = "BackendMain.php";

		if(!$page){$page=$mainpage;}
// ---- ตรวจสอบคนที่มีสิทธิ์แก้ไข
//$chk_perEdit = permissions_edit($_SESSION['log_loginfinance']);
			echo "<div id='content'>";
				include($page);
			echo "<div>";			
	}
	public function Menu($login)
	{
			if($login == '')
			{
				include_once($this->NaviUser);
			}else
			{
				include_once($this->NaviBackend);
			}
	}
	public function S_SESSION($name)
	{
		for($i=0;$i<count($name);$i++)
		{
		//echo "s_".$name[$i];
		$_SESSION["s_".$name[$i]] = $_POST[$name[$i]];
		}
	}
	public function UNSET_SESSION($name)
	{
		for($i=0;$i<count($name);$i++)
		{
		//echo "s_".$name[$i];
		unset($_SESSION["s_".$name[$i]]);
		}
	}
	public function Mail($Subject,$Body,$mailto)
	{
		include "../plugin/PHPMailer_v5.0.2/class.phpmailer.php";
	     $mail = new PHPMailer(true);
        $mail->IsSMTP();
        try {
            $mail->Encoding = "quoted-printable";
            $mail->CharSet = "utf-8";

          // send mail by gmail
          $mail->Host = 'ssl://smtp.gmail.com';
		 $mail->Port = 465;
		 $mail->SMTPAuth = true; 
		 $mail->Username = 'korniop@gmail.com';
		 $mail->Password = 'iop69789269'; 
		 $mail->From = "IAP"; 
		 $mail->FromName = "IAP";
		 $mail->Subject  = $Subject; 
		 $mail->MsgHTML($Body);
		 $mail->AddAddress($mailto);
		 $mail->Send();    
        }
        catch (phpmailerException$e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        }
        catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
	}

	public function QRCode($Text,$matrixPointSize="20")
	{
		include "../plugin/php_qrcode/qrlib.php";
		$PNG_TEMP_DIR = "../images/qrcode/";
		$errorCorrectionLevel = 'L';
		$filename = $PNG_TEMP_DIR.$Text.'.png';	   
		//echo $filename;
		QRcode::png($Text, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
		return '<img src="'.$PNG_TEMP_DIR.basename($filename).'" />';
	}


}

?>