<?php

namespace Drupal\nolanextensions\Controller;

use Drupal\Component\Utility\Xss;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Url;
use Drupal\nolanextensions\Entity\CarEntityInterface;

/**
 * Class CarEntityController.
 *
 *  Returns responses for Car entity routes.
 */
class CarEntityController extends ControllerBase implements ContainerInjectionInterface {

  /**
   * Displays a Car entity  revision.
   *
   * @param int $car_entity_revision
   *   The Car entity  revision ID.
   *
   * @return array
   *   An array suitable for drupal_render().
   */
  public function revisionShow($car_entity_revision) {
    $car_entity = $this->entityManager()->getStorage('car_entity')->loadRevision($car_entity_revision);
    $view_builder = $this->entityManager()->getViewBuilder('car_entity');

    return $view_builder->view($car_entity);
  }

  /**
   * Page title callback for a Car entity  revision.
   *
   * @param int $car_entity_revision
   *   The Car entity  revision ID.
   *
   * @return string
   *   The page title.
   */
  public function revisionPageTitle($car_entity_revision) {
    $car_entity = $this->entityManager()->getStorage('car_entity')->loadRevision($car_entity_revision);
    return $this->t('Revision of %title from %date', ['%title' => $car_entity->label(), '%date' => format_date($car_entity->getRevisionCreationTime())]);
  }

  /**
   * Generates an overview table of older revisions of a Car entity .
   *
   * @param \Drupal\nolanextensions\Entity\CarEntityInterface $car_entity
   *   A Car entity  object.
   *
   * @return array
   *   An array as expected by drupal_render().
   */
  public function revisionOverview(CarEntityInterface $car_entity) {
    $account = $this->currentUser();
    $langcode = $car_entity->language()->getId();
    $langname = $car_entity->language()->getName();
    $languages = $car_entity->getTranslationLanguages();
    $has_translations = (count($languages) > 1);
    $car_entity_storage = $this->entityManager()->getStorage('car_entity');

    $build['#title'] = $has_translations ? $this->t('@langname revisions for %title', ['@langname' => $langname, '%title' => $car_entity->label()]) : $this->t('Revisions for %title', ['%title' => $car_entity->label()]);
    $header = [$this->t('Revision'), $this->t('Operations')];

    $revert_permission = (($account->hasPermission("revert all car entity revisions") || $account->hasPermission('administer car entity entities')));
    $delete_permission = (($account->hasPermission("delete all car entity revisions") || $account->hasPermission('administer car entity entities')));

    $rows = [];

    $vids = $car_entity_storage->revisionIds($car_entity);

    $latest_revision = TRUE;

    foreach (array_reverse($vids) as $vid) {
      /** @var \Drupal\nolanextensions\CarEntityInterface $revision */
      $revision = $car_entity_storage->loadRevision($vid);
      // Only show revisions that are affected by the language that is being
      // displayed.
      if ($revision->hasTranslation($langcode) && $revision->getTranslation($langcode)->isRevisionTranslationAffected()) {
        $username = [
          '#theme' => 'username',
          '#account' => $revision->getRevisionUser(),
        ];

        // Use revision link to link to revisions that are not active.
        $date = \Drupal::service('date.formatter')->format($revision->getRevisionCreationTime(), 'short');
        if ($vid != $car_entity->getRevisionId()) {
          $link = $this->l($date, new Url('entity.car_entity.revision', ['car_entity' => $car_entity->id(), 'car_entity_revision' => $vid]));
        }
        else {
          $link = $car_entity->link($date);
        }

        $row = [];
        $column = [
          'data' => [
            '#type' => 'inline_template',
            '#template' => '{% trans %}{{ date }} by {{ username }}{% endtrans %}{% if message %}<p class="revision-log">{{ message }}</p>{% endif %}',
            '#context' => [
              'date' => $link,
              'username' => \Drupal::service('renderer')->renderPlain($username),
              'message' => ['#markup' => $revision->getRevisionLogMessage(), '#allowed_tags' => Xss::getHtmlTagList()],
            ],
          ],
        ];
        $row[] = $column;

        if ($latest_revision) {
          $row[] = [
            'data' => [
              '#prefix' => '<em>',
              '#markup' => $this->t('Current revision'),
              '#suffix' => '</em>',
            ],
          ];
          foreach ($row as &$current) {
            $current['class'] = ['revision-current'];
          }
          $latest_revision = FALSE;
        }
        else {
          $links = [];
          if ($revert_permission) {
            $links['revert'] = [
              'title' => $this->t('Revert'),
              'url' => $has_translations ?
              Url::fromRoute('entity.car_entity.translation_revert', ['car_entity' => $car_entity->id(), 'car_entity_revision' => $vid, 'langcode' => $langcode]) :
              Url::fromRoute('entity.car_entity.revision_revert', ['car_entity' => $car_entity->id(), 'car_entity_revision' => $vid]),
            ];
          }

          if ($delete_permission) {
            $links['delete'] = [
              'title' => $this->t('Delete'),
              'url' => Url::fromRoute('entity.car_entity.revision_delete', ['car_entity' => $car_entity->id(), 'car_entity_revision' => $vid]),
            ];
          }

          $row[] = [
            'data' => [
              '#type' => 'operations',
              '#links' => $links,
            ],
          ];
        }

        $rows[] = $row;
      }
    }

    $build['car_entity_revisions_table'] = [
      '#theme' => 'table',
      '#rows' => $rows,
      '#header' => $header,
    ];

    return $build;
  }

}
