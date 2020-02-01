<?php

namespace Drupal\Driver\Database\memsql\Install;

use Drupal\Core\Database\Driver\mysql\Install\Tasks as MysqlTasks;

/**
 * Specifies installation tasks for MySQL and equivalent databases.
 */
class Tasks extends MysqlTasks {

  /**
   * Structure that describes each task to run.
   *
   * @var array
   *
   * Each value of the tasks array is an associative array defining the function
   * to call (optional) and any arguments to be passed to the function.
   */
  protected $tasks = [
    [
      'function'    => 'checkEngineVersion',
      'arguments'   => [],
    ],
    [
      'arguments'   => [
        'CREATE TABLE {drupal_install_test} (id int NOT NULL PRIMARY KEY)',
        'Drupal can use CREATE TABLE database commands.',
        'Failed to <strong>CREATE</strong> a test table on your database server with the command %query. The server reports the following message: %error.<p>Are you sure the configured username has the necessary permissions to create tables in the database?</p>',
        TRUE,
      ],
    ],
    [
      'arguments'   => [
        'INSERT INTO {drupal_install_test} (id) VALUES (1)',
        'Drupal can use INSERT database commands.',
        'Failed to <strong>INSERT</strong> a value into a test table on your database server. We tried inserting a value with the command %query and the server reported the following error: %error.',
      ],
    ],
    /*    [
          'arguments'   => [
            'UPDATE {drupal_install_test} SET id = 2',
            'Drupal can use UPDATE database commands.',
            'Failed to <strong>UPDATE</strong> a value in a test table on your database server. We tried updating a value with the command %query and the server reported the following error: %error.',
          ],
        ],*/
    [
      'arguments'   => [
        'DELETE FROM {drupal_install_test}',
        'Drupal can use DELETE database commands.',
        'Failed to <strong>DELETE</strong> a value from a test table on your database server. We tried deleting a value with the command %query and the server reported the following error: %error.',
      ],
    ],
    [
      'arguments'   => [
        'DROP TABLE {drupal_install_test}',
        'Drupal can use DROP TABLE database commands.',
        'Failed to <strong>DROP</strong> a test table from your database server. We tried dropping a table with the command %query and the server reported the following error %error.',
      ],
    ],
  ];

  /**
   * {@inheritdoc}
   */
  public function name() {
    return t('MemSQL');
  }

  /**
   * {@inheritdoc}
   */
  public function getFormOptions(array $database) {
    $form = parent::getFormOptions($database);
    if (!empty($form['advanced_options']['host'])) {
      $form['advanced_options']['host']['#default_value'] = empty($database['host']) ? '127.0.0.1' : $database['host'];
    }

    return $form;
  }

}
