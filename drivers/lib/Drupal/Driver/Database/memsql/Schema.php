<?php

namespace Drupal\Driver\Database\memsql;

use Drupal\Core\Database\Driver\mysql\Schema as MysqlSchema;

/**
 * MemSQL implementation of \Drupal\Core\Database\Schema.
 */
class Schema extends MysqlSchema {

  protected function createKeysSql($spec) {
    $keys = [];

    if (!empty($spec['primary key'])) {
      $keys[] = 'PRIMARY KEY (' . $this->createKeySql($spec['primary key']) . ')';
    }
    if (!empty($spec['unique keys'])) {
      foreach ($spec['unique keys'] as $key => $fields) {
        $fields = array_merge($spec['primary key'], $fields);
        $fields = array_unique($fields);
        $keys[] = 'UNIQUE KEY `' . $key . '` (' . $this->createKeySql($fields) . ')';
      }
    }
    if (!empty($spec['indexes'])) {
      $indexes = $this->getNormalizedIndexes($spec);
      foreach ($indexes as $index => $fields) {
        $keys[] = 'INDEX `' . $index . '` (' . $this->createKeySql($fields) . ')';
      }
    }

    return $keys;
  }

}
