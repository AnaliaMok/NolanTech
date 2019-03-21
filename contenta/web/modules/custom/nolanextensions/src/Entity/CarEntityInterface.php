<?php

namespace Drupal\nolanextensions\Entity;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\RevisionLogInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Car entity entities.
 *
 * @ingroup nolanextensions
 */
interface CarEntityInterface extends ContentEntityInterface, RevisionLogInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Car entity name.
   *
   * @return string
   *   Name of the Car entity.
   */
  public function getName();

  /**
   * Sets the Car entity name.
   *
   * @param string $name
   *   The Car entity name.
   *
   * @return \Drupal\nolanextensions\Entity\CarEntityInterface
   *   The called Car entity entity.
   */
  public function setName($name);

  /**
   * Gets the Car entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Car entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Car entity creation timestamp.
   *
   * @param int $timestamp
   *   The Car entity creation timestamp.
   *
   * @return \Drupal\nolanextensions\Entity\CarEntityInterface
   *   The called Car entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Car entity published status indicator.
   *
   * Unpublished Car entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Car entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Car entity.
   *
   * @param bool $published
   *   TRUE to set this Car entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\nolanextensions\Entity\CarEntityInterface
   *   The called Car entity entity.
   */
  public function setPublished($published);

  /**
   * Gets the Car entity revision creation timestamp.
   *
   * @return int
   *   The UNIX timestamp of when this revision was created.
   */
  public function getRevisionCreationTime();

  /**
   * Sets the Car entity revision creation timestamp.
   *
   * @param int $timestamp
   *   The UNIX timestamp of when this revision was created.
   *
   * @return \Drupal\nolanextensions\Entity\CarEntityInterface
   *   The called Car entity entity.
   */
  public function setRevisionCreationTime($timestamp);

  /**
   * Gets the Car entity revision author.
   *
   * @return \Drupal\user\UserInterface
   *   The user entity for the revision author.
   */
  public function getRevisionUser();

  /**
   * Sets the Car entity revision author.
   *
   * @param int $uid
   *   The user ID of the revision author.
   *
   * @return \Drupal\nolanextensions\Entity\CarEntityInterface
   *   The called Car entity entity.
   */
  public function setRevisionUserId($uid);

}
