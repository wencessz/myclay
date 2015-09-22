<?php
 
class CustomLogin extends MemberLoginForm {
 
	// this function is overloaded on our sublcass (this) to do something different
    public function dologin($data) {
        parent::dologin($data);
        if(Member::currentUserID()) {
            return $this->redirectByGroup($data);
        }else{
        	return Controller::redirectBack();
        }
    }
 
	public function redirectByGroup($data) { 	
		// gets the current member that is logging in.
		$member = Member::currentUser();
		if($member->inGroup("administrators") || $member->inGroup("doors-administrators")){
			//redirect to the admin page
 			return Controller::redirect( Director::baseURL()."admin");
		}else{
			return Controller::redirect( Director::baseURL()."door");
		}
		//otherwise if none of the above worked return fase
		return false;
	}
					
	
}	 