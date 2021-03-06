<?php

namespace Drupal\Tests\taxonomy\Kernel\Plugin\migrate\source\d7;

use Drupal\Tests\migrate\Kernel\MigrateSqlSourceTestBase;

/**
 * Tests taxonomy term source plugin.
 *
 * @covers \Drupal\taxonomy\Plugin\migrate\source\d7\Term
 * @group taxonomy
 */
class TermTest extends MigrateSqlSourceTestBase {

  /**
   * {@inheritdoc}
   */
  public static $modules = ['taxonomy', 'migrate_drupal'];

  /**
   * {@inheritdoc}
   */
  public function providerSource() {
    $tests = [];

    // The source data.
    $tests[0]['source_data']['taxonomy_term_data'] = [
      [
        'tid' => 1,
        'vid' => 5,
        'name' => 'name value 1',
        'description' => 'description value 1',
        'weight' => 0,
      ],
      [
        'tid' => 2,
        'vid' => 6,
        'name' => 'name value 2',
        'description' => 'description value 2',
        'weight' => 0,
      ],
      [
        'tid' => 3,
        'vid' => 6,
        'name' => 'name value 3',
        'description' => 'description value 3',
        'weight' => 0,
      ],
      [
        'tid' => 4,
        'vid' => 5,
        'name' => 'name value 4',
        'description' => 'description value 4',
        'weight' => 1,
      ],
      [
        'tid' => 5,
        'vid' => 6,
        'name' => 'name value 5',
        'description' => 'description value 5',
        'weight' => 1,
      ],
      [
        'tid' => 6,
        'vid' => 6,
        'name' => 'name value 6',
        'description' => 'description value 6',
        'weight' => 0,
      ],
    ];
    $tests[0]['source_data']['taxonomy_term_hierarchy'] = [
      [
        'tid' => 1,
        'parent' => 0,
      ],
      [
        'tid' => 2,
        'parent' => 0,
      ],
      [
        'tid' => 3,
        'parent' => 0,
      ],
      [
        'tid' => 4,
        'parent' => 1,
      ],
      [
        'tid' => 5,
        'parent' => 2,
      ],
      [
        'tid' => 6,
        'parent' => 3,
      ],
      [
        'tid' => 6,
        'parent' => 2,
      ],
    ];
    $tests[0]['source_data']['taxonomy_vocabulary'] = [
      [
        'vid' => 5,
        'machine_name' => 'tags',
      ],
      [
        'vid' => 6,
        'machine_name' => 'categories',
      ],
    ];
    $tests[0]['source_data']['field_config_instance'] = [
      [
        'field_name' => 'field_term_field',
        'entity_type' => 'taxonomy_term',
        'bundle' => 'tags',
        'deleted' => 0,
      ],
      [
        'field_name' => 'field_term_field',
        'entity_type' => 'taxonomy_term',
        'bundle' => 'categories',
        'deleted' => 0,
      ],
    ];
    $tests[0]['source_data']['field_data_field_term_field'] = [
      [
        'entity_type' => 'taxonomy_term',
        'bundle' => 'tags',
        'deleted' => 0,
        'entity_id' => 1,
        'delta' => 0,
      ],
      [
        'entity_type' => 'taxonomy_term',
        'bundle' => 'categories',
        'deleted' => 0,
        'entity_id' => 1,
        'delta' => 0,
      ],
    ];

    // The expected results.
    $tests[0]['expected_data'] = [
      [
        'tid' => 1,
        'vid' => 5,
        'name' => 'name value 1',
        'description' => 'description value 1',
        'weight' => 0,
        'parent' => [0],
      ],
      [
        'tid' => 2,
        'vid' => 6,
        'name' => 'name value 2',
        'description' => 'description value 2',
        'weight' => 0,
        'parent' => [0],
      ],
      [
        'tid' => 3,
        'vid' => 6,
        'name' => 'name value 3',
        'description' => 'description value 3',
        'weight' => 0,
        'parent' => [0],
      ],
      [
        'tid' => 4,
        'vid' => 5,
        'name' => 'name value 4',
        'description' => 'description value 4',
        'weight' => 1,
        'parent' => [1],
      ],
      [
        'tid' => 5,
        'vid' => 6,
        'name' => 'name value 5',
        'description' => 'description value 5',
        'weight' => 1,
        'parent' => [2],
      ],
      [
        'tid' => 6,
        'vid' => 6,
        'name' => 'name value 6',
        'description' => 'description value 6',
        'weight' => 0,
        'parent' => [3, 2],
      ],
    ];

    return $tests;
  }

}
