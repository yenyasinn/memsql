<?php

namespace Drush\Sql;

/**
 * Memsql plugin for drush.
 */
class SqlMemsql extends SqlMysql {

  /**
   * {@inheritdoc}
   */
  public function command() {
    return 'memsql';
  }

  /**
   * {@inheritdoc}
   */
  public function creds($hide_password = TRUE) {
    parent::creds(FALSE);
  }

}
