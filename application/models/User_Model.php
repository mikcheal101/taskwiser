<?php

class User_Model extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function getCategories () {
		$parents = $this->db->get_where ('categories', ['_parent' => null])->result_array ();
		foreach ($parents as $key => $parent) {
			$parents[$key]['_children'] = $this->db->get_where ('categories', ['_parent' => $parent['_id']])->result_array ();
		}
		return $parents;
	}
}
?>