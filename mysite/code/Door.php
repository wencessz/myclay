<?php
class Door extends DataObject {

    private static $db = array(
        'Description' => 'Varchar(255)',
    );

    private static $belongs_many_many = array(
        'Administrators' => 'Member', // the administrators of this door
    );

    private static $many_many = array(
        'Keys' => 'Key' // the keys that can open this door
    );

    public function hasAccess($member) {
    	$keys = $this->Keys()->filter('Owner.ID', $member->ID);
        return ($keys->count() || $member->inGroup('Administrators'));
    }

    public function canView($member = null) {
        return Permission::check('CMS_ACCESS_DoorAdmin', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_DoorAdmin', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_DoorAdmin', 'any', $member);
    }

    public function canCreate($member = null) {
        return Permission::check('CMS_ACCESS_DoorAdmin', 'any', $member);
    }

	public function getCMSValidator() {
		return new RequiredFields(array('Description'));
	}

	public function Link($action = ''){
		if($action){
			return "door/" . $action . "/" . $this->ID;		
		}
		return "door/" . $this->ID;
	}

}
class Door_Controller extends Page_Controller {

    private static $allowed_actions = array(
    	'index' => 'SITETREE_VIEW_ALL',
        'open' => 'SITETREE_VIEW_ALL',
    );

	public function open(SS_HTTPRequest $request) {
		$door = Door::get()->byId($request->param('ID'));
		if($door->hasAccess(Member::currentUser())){
			$access = "ok";
		}else{
			$access = "denied";
		}
		if($request->isAjax()) {
        	return $access;
    	}else{
        	return $access;
    	}
	}

	public function index(SS_HTTPRequest $request) {
		Requirements::javascript('http://code.jquery.com/jquery-2.1.4.min.js');
		Requirements::javascriptTemplate('mysite/plugin/HoldOn.min.js'); //loading HoldOn plugin
		Requirements::javascriptTemplate('mysite/javascript/openDoor.js', array(
			'basePath' => Director::BaseURL(),
		)); // loading opendoor managment
		Requirements::block(THIRDPARTY_DIR . '/jquery/jquery.js');
		$arrayData = new ArrayData(array(
		    'doors' => Door::get()
		));
		
		Requirements::css("mysite/plugin/HoldOn.min.css");
		return array(
	        'Title' => 'Doors list',
	        'Content' => $arrayData->renderWith('Door_List')
	    );
	}

}