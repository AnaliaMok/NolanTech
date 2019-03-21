<?php

namespace Drupal\nolanextensions;

use Drupal\Core\Entity\Sql\SqlContentEntityStorage;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\nolanextensions\Entity\CarEntityInterface;

/**
 * Defines the storage handler class for Car entity entities.
 *
 * This extends the base storage class, adding required special handling for
 * Car entity entities.
 *
 * @ingroup nolanextensions
 */
class CarEntityStorage extends SqlContentEntityStorage implements CarEntityStorageInterface {

  /**
   * {@inheritdoc}
   */
  public function revisionIds(CarEntityInterface $entity) {
    return $this->database->query(
      'SELECT vid FROM {car_entity_revision} WHERE id=:id ORDER BY vid',
      [':id' => $entity->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function userRevisionIds(AccountInterface $account) {
    return $this->database->query(
      'SELECT vid FROM {car_entity_field_revision} WHERE uid = :uid ORDER BY vid',
      [':uid' => $account->id()]
    )->fetchCol();
  }

  /**
   * {@inheritdoc}
   */
  public function countDefaultLanguageRevisions(CarEntityInterface $entity) {
    return $this->database->query('SELECT COUNT(*) FROM {car_entity_field_revision} WHERE id = :id AND default_langcode = 1', [':id' => $entity->id()])
      ->fetchField();
  }

  /**
   * {@inheritdoc}
   */
  public function clearRevisionsLanguage(LanguageInterface $language) {
    return $this->database->update('car_entity_revision')
      ->fields(['langcode' => LanguageInterface::LANGCODE_NOT_SPECIFIED])
      ->condition('langcode', $language->getId())
      ->execute();
  }

}
