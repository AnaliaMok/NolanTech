<?php

namespace Drupal\nolanextensions;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Car entity entity.
 *
 * @see \Drupal\nolanextensions\Entity\CarEntity.
 */
class CarEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\nolanextensions\Entity\CarEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished car entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published car entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit car entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete car entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add car entity entities');
  }

}
