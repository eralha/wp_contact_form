<?php

// No direct access to this file
defined('ABSPATH') or die('Restricted access');


	class ajax__component extends er_base_plugin {

		var $ajaxHoocks = array(
		        "getContacts" => "priv",
		        "deleteContact" => "priv",
		        "saveContact" => "nopriv"
		    );

		function ajax__component(){
			
		}

		function getContacts(){
			if(!current_user_can( 'manage_options' )){
				wp_die();
			}
			$this->verifyNonce('getContacts');
			global $wpdb;

			$query = "SELECT * FROM ";
			$query .= "$this->table_contactos WHERE iEstado = 1 ";
			$query .= "ORDER BY iData DESC";

			$query = $wpdb->prepare($query, false);

			$results = $wpdb->get_results($query, OBJECT);

			echo json_encode($results);

			wp_die();
		}

		function sendEmail($message){
			$email = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">';
    		$email .= '<html xmlns="http://www.w3.org/1999/xhtml">';
    		$email .= '<head>';
    			$email .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
    			$email .= '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
    		$email .= '</head>';
    		$email .= '<body>';

    		  $email .= '<p><b>Contacto recebido de:</b></p>';
    	      $email .= '<p><b>Nome:</b> '.$message->clientname.' '.$message->last_name.'</p>';
    	      $email .= '<p><b>Email:</b> '.$message->_email.'</p>';
    	      $email .= '<p><b>Assunto:</b> '.$message->assunto.'</p>';
    	      $email .= '<p><b>Mensagem:</b> '.$message->message.'</p>';
    			
    		$email .= '</body>';
    		$email .= '</html>';

    		$headers = array('Content-Type: text/html; charset=UTF-8;');

        	wp_mail('geral.teamtransformerz@gmail.com', 'Contacto Cliente', $email, $headers);
		}

		function deleteContact(){
			if(!current_user_can( 'manage_options' )){
				wp_die();
			}
			$this->verifyNonce('deleteContact');

			global $wpdb;
			
			$msg = $_POST["msgId"];
			$msg = addslashes($msg);


			$query = "UPDATE $this->table_contactos ";
			$query .= "SET iEstado = 0 ";
			$query .= "WHERE iIDContacto = %d";

			$query = $wpdb->prepare($query, $msg);

			$results = $wpdb->query($query);

			echo json_encode($results);

			wp_die();
		}

		function saveContact(){
			$this->verifyNonce('saveContact');

			$data = $_POST["data"];

			global $wpdb;

			$message = json_decode(stripslashes($data));

			$msg = (object)[];
			$msg->vchNome = sanitize_text_field($message->clientname);
			$msg->vchApelido = sanitize_text_field($message->last_name);
			$msg->vchEmail = sanitize_text_field($message->_email);
			$msg->vchAssunto = sanitize_text_field($message->assunto);
			$msg->vchMensagem = sanitize_text_field($message->message);
			$msg->iEstado = 1;
			$msg->iData = time();

			$this->sendEmail($message);

			$results = $wpdb->insert($this->table_contactos, get_object_vars($msg));

			echo json_encode($results);

			wp_die();
		}


	}


?>