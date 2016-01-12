<?php
error_reporting(1);
 class  Bot{
      var $token;
      var $base_url;
      function __construct( $par1, $par2 ){
   $this->base_url = $par1;
   $this->token = $par2;
}
      
       //get message update
      function getUpdates($state){
         echo $this->price ."<br/>";
		 if($state=="all" || $state=="ALL"){
			 $url=$this->base_url.$this->token.'/getUpdates';
			 $feed = file_get_contents($url);
			 if(!empty($feed)){
				 $obj = json_decode($feed);
                  $result=$obj; 
			 } 
			 
          }
		  if($state=="last"|| $state=="LAST"){
		      $result=array_pop($obj->result);
              
		 }else {$result=null;}
		 return $result;
		}
		
		//send message 
	   function sendMessage($chat_id,$message){
            $sendmessage=$base_url.$token.'/sendmessage?chat_id='.$chat_id.'&text='.$message;
			$result = file_get_contents($sendmessage);
			$obj = json_decode($result);
			if($obj->ok==1){
			echo "message sent ";
			}else{echo "failed to send";}

      }
      
     
   }

//write to bot
  ?>
