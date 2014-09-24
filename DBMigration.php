<?php
namespace Asgard\Migration;

/**
 * Migration class for database
 */
abstract class DBMigration extends Migration {
	/**
	 * {@inheritDoc}
	 */
	public function _up() {
		$db = $this->container['db'];

		$db->beginTransaction();
		try {
			parent::_up();
			$db->commit();
		} catch(\Exception $e) {
			$db->rollback();
			throw $e;
		}
	}

	/**
	 * {@inheritDoc}
	 */
	public function _down() {
		$db = $this->container['db'];
		
		$db->beginTransaction();
		try {
			parent::_down();
			$db->commit();
		} catch(\Exception $e) {
			$db->rollback();
			throw $e;
		}
	}
}