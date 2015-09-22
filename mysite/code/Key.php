<?php
class Key extends DataObject {

    private static $db = array(
        'Description' => 'Varchar(255)',
    );

    private static $has_one = array(
        'Owner' => 'Member', //the owner of this key
    );

    private static $belongs_many_many = array(
        'Doors' => 'Door', // the doors that this key can open
    );

    public function canView($member = null) {
        return Permission::check('CMS_ACCESS_KeyAdmin', 'any', $member);
    }

    public function canEdit($member = null) {
        return Permission::check('CMS_ACCESS_KeyAdmin', 'any', $member);
    }

    public function canDelete($member = null) {
        return Permission::check('CMS_ACCESS_KeyAdmin', 'any', $member);
    }

    public function canCreate($member = null) {
        return Permission::check('CMS_ACCESS_KeyAdmin', 'any', $member);
    }

	public function getCMSValidator() {
		return new RequiredFields(array('Description', 'Owner'));
	}
}