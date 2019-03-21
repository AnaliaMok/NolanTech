<?php

namespace Drupal\nolanextensions;

use Drupal\Core\Entity\ContentEntityStorageInterface;
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
interface CarEntityStorageInterface extends ContentEntityStorageInterface {

  /**
   * Gets a list of Car entity revision IDs for a specific Car entity.
   *
   * @param \Drupal\nolanextensions\Entity\CarEntityInterface $entity
   *   The Car entity entity.
   *
   * @return int[]
   *   Car entity revision IDs (in ascending order).
   */
  public function revisionIds(CarEntityInterface $entity);

  /**
   * Gets a list of revision IDs having a given user as Car entity author.
   *
   * @param \Drupal\Core\Session\AccountInterface $account
   *   The user entity.
   *
   * @return int[]
   *   Car entity revision IDs (in ascending order).
   */
  public function userRevisionIds(AccountInterface $account);

  /**
   * Counts the number of revisions in the default language.
   *
   * @param \Drupal\nolanextensions\Entity\CarEntityInterface $entity
   *   The Car entity entity.
   *
   * @return int
   *   The number of revisions in the default language.
   */
  public function countDefaultLanguageRevisions(CarEntityInterface $entity);

  /**
   * Unsets the language for all Car entity with the given language.
   *
   * @param \Drupal\Core\Language\LanguageInterface $language
   *   The language object.
   */
  public function clearRevisionsLanguage(LanguageInterface $language);

}
