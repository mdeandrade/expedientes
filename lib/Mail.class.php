<?php

    class Mail {
   
    function __construct() 
    {
        $this->smtp = "server-0116a.gconex.net";
        $this->port = 465;
        $this->secure = "ssl";
        $this->username = "contactenos@tugruero.com.ve";
        $this->password = "230386";
        
    }
    
    
    
    function send($to = array(), $from = array() , $subject , $message ) 
    {
        $transport = Swift_SmtpTransport::newInstance( $this->smtp, $this->port, $this->secure)
          ->setUsername($this->username)
          ->setPassword($this->password);
        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);

        // Create a message
        $send = Swift_Message::newInstance($subject)
          ->setFrom($from)
          ->setTo($to)
          ->setBody($message,'text/html')
          ;

        // Send the message
        $result = $mailer->send($send);        
    }
		public function mail1($values){
			
        $transport = Swift_SmtpTransport::newInstance( $this->smtp, $this->port, $this->secure)
          ->setUsername($this->username)
          ->setPassword($this->password);
        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);
			
			$message = Swift_Message::newInstance('Siga con su proceso de registro en TU/GRUERO®');
			$message->setBody("
				<html>
				<head></head>
				<body style='font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;font-size: 18px;'>
				<p align='center'><strong>Para seguir con su proceso de registro en nuestra plataforma como gruero Master, dele click al siguiente botón.</strong></p>

				<p align='center'>
				<a href='".$values['url']."'><img src='".$message->embed(Swift_Image::fromPath('http://www.tugruero.com/web/img/haz_click_aqui.png'))."' alt='' /></a>
				</p>
				
				
				<p align='justify'><strong>Gracias.</strong></p>
				<p align='justify'>Equipo – <strong>TU/GRUERO®</strong></p>

				<br><br>
				<p align='center'>
				<img src='".$message->embed(Swift_Image::fromPath('http://www.tugruero.com/web/img/logo_tugruero_mail.png'))."' alt='' />
					
				</p>
				<p align='center' style='color: #f1452b !important;font-style: italic !important;'>
					Revolucionando la industria del auxilio vial
				</p>
				</body>
				</html>","text/html");			
			
        $message  ->setFrom(array (mail_from => 'TU/GRUERO®'));
		$message   ->setTo($values['email']);
        // Send the message
        $result = $mailer->send($message); 
			return $result;
		}
		public function mail2($values){
		

        $transport = Swift_SmtpTransport::newInstance( $this->smtp, $this->port, $this->secure)
          ->setUsername($this->username)
          ->setPassword($this->password);
        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);
			
			$UsersData = new UsersData();
			$master = $UsersData->getMasterByIdCompany($values['id']);

			$login =  $master['login'];
			$name =  ucwords(strtolower($master['first_name']))." ".ucwords(strtolower($master['first_last_name']));
			
			$email =  $master['mail'];
			
			$message = Swift_Message::newInstance('Información registrada con éxito – TU/GRUERO®');
			$message->setBody("
				<html>
				<head></head>
				<body style='font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;font-size: 18px;'>
				<p align='left'><strong> <br><br>Sr(a). ".$name."</strong></p>
				
				<p align='justify'>Hemos registrado con éxito toda su información. Ahora debe esperar a que el equipo de 
				validación de proveedores apruebe su registro, después, ingresar en la página web de <strong>TU/GRUERO®</strong> 
				y registrar todas sus grúas y choferes/operadores para luego empezar a trabajar con la aplicación móvil <strong>TU/GRUERO®</strong>.</p>
				
				<p align='justify'>
				Recuerde que sus datos con los que podrá iniciar sesión en su cuenta tanto en la página web como en la aplicación móvil, son los siguientes:	

				</p>
	
				<p align='left'> - <strong> Usuario: </strong>".$login."</p>
				<p align='left'> - <strong> Clave: </strong>".$values['password']."</p>	
				<p align='left'> - <strong> Placa: </strong>".$values['placa']." (ésta solo la usará para la aplicación móvil)</p>	

				<p align='justify'>Puede cambiar su clave una vez inicie sesión, en el módulo de <strong>Modificación de Clave</strong> dentro de su cuenta.</p>


				
				<p align='justify'><strong>Gracias.</strong></p>
				<p align='justify'>Equipo – <strong>TU/GRUERO®</strong></p>

				<br><br>
				<p align='center'>
				<img src='".$message->embed(Swift_Image::fromPath('http://www.tugruero.com/web/img/logo_tugruero_mail.png'))."' alt='' />
					
				</p>
				<p align='center' style='color: #f1452b !important;font-style: italic !important;'>
					Revolucionando la industria del auxilio vial
				</p>
				</body>
				</html>","text/html");			
			
        $message  ->setFrom(array (mail_from => 'TU/GRUERO®'));
		$message   ->setTo($email);
        // Send the message
        $result = $mailer->send($message); 
			return $result;
		}
		public function mail3($values){
			
        $transport = Swift_SmtpTransport::newInstance( $this->smtp, $this->port, $this->secure)
          ->setUsername($this->username)
          ->setPassword($this->password);
        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);
			
			$UsersData = new UsersData();
			$master = $UsersData->getMasterByIdCompany($values['id']);
			$email = $master['mail'];
			$login =  $master['login'];
			$name =  ucwords(strtolower($master['first_name']))." ".ucwords(strtolower($master['first_last_name']));
			
			
			
			$message = Swift_Message::newInstance('¡Felicidades! Ha sido aceptado en TU/GRUERO®');
			$message->setBody("
				<html>
				<head></head>
				<body style='font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;font-size: 18px;'>
				<p align='left'><strong>Sr(a). ".$name."</strong></p>
				<p align='center' style='color: #f1452b !important;'>LEA CON DETENIMIENTO</p>

				<p align='justify'><strong>¡Felicidades!</strong> Nuestro equipo de validación de proveedores ha
				confirmado todos sus documentos y le da la bienvenida a <strong>TU/GRUERO®</strong>.</p>
				
				<p align='justify'>A partir de este momento puede iniciar sesión en la página web de <strong>TU/GRUERO®</strong> donde podrá 
				registrar sus grúas y sus choferes/operadores, para luego entrar en la aplicación 
				de <strong>TU/GRUERO®</strong> y tomar las solicitudes de servicio que tengan nuestros clientes accidentados.</p>
				
				<p align='justify'>Registre primero sus grúas disponibles y posteriormente los operadores/choferes que las conducirán.</p>
				
				<p align='justify'>Si usted mismo es quien conduce su grúa, agregue primero la grúa y luego asígnesela en el módulo <strong>Admin. Operadores</strong>.</p>
				
				<p align='justify'>EL <strong>Usuario</strong>, <strong>Placa</strong> y <strong>Clave</strong> para acceder a la página web y aplicación móvil <strong>TU/GRUERO®</strong> son 
				los que le enviamos en el correo anterior a éste. 
				Recuerde escribir ".'"<strong>V-</strong>", "<strong>E-</strong>" o "<strong>J-</strong>"'." seguido de su número de 
				identificación cuando vaya a indicar su <strong>Usuario</strong>.</p>
				
				<p align='justify'>Puede cambiar su clave una vez inicie sesión en el módulo de <strong>Modificación de Clave</strong> dentro de su cuenta.</p>
				<p align='center'>
				<a href='".full_url."/ap/index.php'><img src='".$message->embed(Swift_Image::fromPath('http://www.tugruero.com/web/img/inicie_sesion.png'))."' alt='' /></a>
				</p>
				
				<p align='justify'>Si aún no ha descargado la aplicación en su teléfono, le invitamos
				a buscarla en la tienda de aplicaciones de acuerdo al teléfono
				inteligente que tenga (Play Store o App Store), con el
				nombre de: <strong>Tu Gruero</strong></p>
				<p align='center'>
				<a href='#'><img src='".$message->embed(Swift_Image::fromPath('http://www.tugruero.com/web/img/apps_store.png'))."' alt='' /></a>
				<a href='#'><img src='".$message->embed(Swift_Image::fromPath('http://www.tugruero.com/web/img/google_play.png'))."' alt='' /></a>
					
				</p>
				
				<p align='justify'>Por cualquier duda en la descarga, uso y funcionalidad de la aplicación
				puede llamarnos al <strong>0212-227-5273</strong> o escribirnos a: <strong>tugruero@gmail.com</strong>.</p>
				
				<p align='left'>¡Gracias y disfrute de ofrecer el mejor	servicio de auxilio vial con <strong>TU/GRUERO®!</strong></p>
				<p align='left'>Equipo – <strong>TU/GRUERO®</strong></p>
				<br><br>
				<p align='center'>
				<img src='".$message->embed(Swift_Image::fromPath('http://www.tugruero.com/web/img/logo_tugruero_mail.png'))."' alt='' />
					
				</p>
				<p align='center' style='color: #f1452b !important;font-style: italic !important;'>
					Revolucionando la industria del auxilio vial
				</p>
				</body>
				</html>","text/html");			
			
        $message  ->setFrom(array (mail_from => 'TU/GRUERO®'));
		$message   ->setTo($email);
        // Send the message
        $result = $mailer->send($message); 
			return $result;
		}
		public function mail4($values){
			
			$UsersData = new UsersData();
			$master = $UsersData->getUsersDataById($values);
			$email = $master['mail'];
			$login =  $master['login'];
			$name =  ucwords(strtolower($master['first_name']))." ".ucwords(strtolower($master['first_last_name']));
			
        $transport = Swift_SmtpTransport::newInstance( $this->smtp, $this->port, $this->secure)
          ->setUsername($this->username)
          ->setPassword($this->password);
        // Create the Mailer using your created Transport
        $mailer = Swift_Mailer::newInstance($transport);
			
			$message = Swift_Message::newInstance('Recuperación de clave – TU/GRUERO®');
			$message->setBody("
				<html>
				<head></head>
				<body style='font-family: Century Gothic,CenturyGothic,AppleGothic,sans-serif;font-size: 18px;'>
				<p align='left'><strong> Sr(a). ".$name."</strong></p>
				<p align='left'><label style='color: #f1452b !important;'>Esta es su nueva clave:</label> <strong>".$values['password']."</strong></p>
					
				<p align='justify'>Recuerde que esta clave puede modificarla dentro de su cuenta
				en el módulo de Modificación de Clave. Y que ésta es la misma
				tanto para el acceso a su cuenta en la Página web como en la
				Aplicación móvil.</p>
				
				<p align='justify'><strong>Gracias.</strong></p>
				<p align='justify'>Equipo – <strong>TU/GRUERO®</strong></p>

				<br><br>
				<p align='center'>
				<img src='".$message->embed(Swift_Image::fromPath('http://www.tugruero.com/web/img/logo_tugruero_mail.png'))."' alt='' />
					
				</p>
				<p align='center' style='color: #f1452b !important;font-style: italic !important;'>
					Revolucionando la industria del auxilio vial
				</p>
				</body>
				</html>","text/html");			
			
        $message  ->setFrom(array (mail_from => 'TU/GRUERO®'));
		$message   ->setTo($email);
        // Send the message
        $result = $mailer->send($message); 
			return $result;
		}
}

