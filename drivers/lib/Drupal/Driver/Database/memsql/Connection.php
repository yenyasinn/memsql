<?php

namespace Drupal\Driver\Database\memsql;

use Drupal\Core\Database\Driver\mysql\Connection as MysqlConnection;

/**
 * MemSQL implementation of \Drupal\Core\Database\Connection.
 */
class Connection extends MysqlConnection {

  /**
   * Provides a map of condition operators to condition operator options.
   */
  protected static $memsqlConditionOperatorMap = [
    'LIKE' => ['postfix' => " "],
    'NOT LIKE' => ['postfix' => " "],
  ];

  /**
   * {@inheritdoc}
   */
  public function mapConditionOperator($operator) {
    return isset(static::$memsqlConditionOperatorMap[$operator]) ? static::$memsqlConditionOperatorMap[$operator] : NULL;
  }

  public function driver() {
    return 'memsql';
  }

  public function databaseType() {
    return 'memsql';
  }

}
