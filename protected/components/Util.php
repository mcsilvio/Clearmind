<?php

class Util {

	/**
	 * Required for making a http request
	 * @param string $url The URL to send the request to
	 */
	public static function curl($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		return curl_exec($ch);
		curl_close ($ch);
	}
	
	public static function curlLowPriority($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT,2);
		return curl_exec($ch);
		curl_close ($ch);
	}
	
	public static function mailcurl($url, $args){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Tell curl not to return headers, but do return the response
		curl_setopt($ch, CURLOPT_HEADER, false);
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
		 // Set the POST arguments to pass on
		curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
		return curl_exec($ch);
		curl_close ($ch);
	}
	
	public static function imageToPNG($srcFile, $type){
		switch ($type)
		{
			case IMAGETYPE_GIF:
				return imagecreatefromgif($srcFile);
				break;
			case IMAGETYPE_JPEG:
				return imagecreatefromjpeg($srcFile);
				break;
			case IMAGETYPE_PNG:
				return imagecreatefrompng($srcFile);
				break;
			default:
				throw new Exception('Unrecognized image type ' . $type);
		}
	}
	
	public static function sendTransactionalEmail($toAddress, $subject, $htmlMessage, $encryptedId = null){
	
		// for now the encryptedId is just the hash that was made for activation
		$header = '
			<div id="container" style="width: 750px; margin: 0 auto; border: 2px solid gray; padding: 25px;">
				<div id="header">
					<a href="http://www.funisher.com"><img src="http://www.funisher.com/images/funisherlogo.png" border="0" style="border: none;" /></a>
				</div>
				<div id="message" style="min-height: 200px; padding: 20px;">
			';
		$footer = ($encryptedId) ? '
			</div>
			<div id="footer" style="font-size: 10px;">
				Your security is important to us. For details, see our <a href="http://www.funisher.com/user/privacy">Privacy Policy</a>.
				You are receiving this email at mcsilvio@gmail.com because you are a member of Funisher Games. 
				If you would like to update your email preferences or no longer wish to receive our promotional emails, 
				please <a href="http://www.funisher.com/profile/emailPreferences/?cd=' . $encryptedId . '">click here</a>. 
				Please allow up to 7 business days for your request to be processed.
				Please do not reply to this email. Questions or comments may be sent to info@funisher.com.
				Funisher Games
				Toronto, Ontario, Canada
			</div>
			</div>
			' : '
			</div>
			</div>
			';
			
		$args = array(
				'key' => 'sIpsBz2nZLo4gTo3Raya7Q',
				'message' => array(
						"html" => $header . $htmlMessage . $footer,
						"text" => null,
						"from_email" => "info@clearmindapp.com",
						"from_name" => "ClearMind's Monkey",
						"subject" => $subject,
						"to" => array(array("email" => $toAddress)),
						"track_opens" => true,
						"track_clicks" => true,
						"auto_text" => true
				)
		);
			
		Util::mailcurl('https://mandrillapp.com/api/1.0/messages/send.json', json_encode($args));
	
	}
	
	public static function isValidAuthor(){
		return in_array(Yii::app()->user->id, Yii::app()->params['articleAuthors']);
	}
	
	public static function isValidForumModerator(){
		return in_array(Yii::app()->user->id, Yii::app()->params['forumModerators']);
	}
	
	public static function getUnreadNotificationCount($user_id = null){
		$user = ($user_id) ? $user_id : Yii::app()->user->id;
		$unreadNotifications = Notification::model()->findAll('user_id = ' . $user . ' AND `read` = 0');
		return count($unreadNotifications);
	}
	
	public static function getUnreadMessageCount($user_id = null){
		$user = ($user_id) ? $user_id : Yii::app()->user->id;
		$unreadMessages = Comment::model()->findAll('(owner_id = ' . $user . ' AND owner_read = 0) OR (author_id = ' . $user . ' AND author_read = 0)  AND type = \'PMTopic\'');
		return count($unreadMessages);
	}
	
	public static function getArticleCommentCount($id){
		$comments = Comment::model()->findAll('owner_id = ' . $id . ' AND type = \'ArticleComment\'');
		return count($comments );
	}
}