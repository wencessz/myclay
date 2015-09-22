<?php
class MemberExtension extends DataExtension {
	
	private static $has_many = array(
        'Keys' => 'Key' //my keys to open doors if Im user.
	);
	private static $many_many = array(
        'Doors' => 'Door', //doors that I have for administrate if Im admin.
    );

    public function getAccessDoors(){
    	return $this->Keys;
    }	

} 