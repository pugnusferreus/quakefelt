<?php

/**
 * Damage filter form base class.
 *
 * @package    quakefelt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseDamageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'report_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Report'), 'add_empty' => true)),
      'damage'     => new sfWidgetFormChoice(array('choices' => array('' => '', 'NONE' => 'NONE', 'HAIRLINE_CRACKS' => 'HAIRLINE_CRACKS', 'CRACKED_WINDOW' => 'CRACKED_WINDOW', 'SOME_LARGE_WALL_CRACKS' => 'SOME_LARGE_WALL_CRACKS', 'MANY_LARGE_WALL_CRACKS' => 'MANY_LARGE_WALL_CRACKS', 'TILES_FELL' => 'TILES_FELL', 'CHIMNEY_CRACKS' => 'CHIMNEY_CRACKS', 'BROKEN_WINDOWS' => 'BROKEN_WINDOWS', 'MASONRY_FELL' => 'MASONRY_FELL', 'OLD_CHIMNEY_FELL' => 'OLD_CHIMNEY_FELL', 'NEW_CHIMNEY_FELL' => 'NEW_CHIMNEY_FELL', 'WALL_COLLAPSED' => 'WALL_COLLAPSED', 'ADDITION_SEPARATED' => 'ADDITION_SEPARATED', 'BUILDING_MOVED' => 'BUILDING_MOVED'))),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'report_id'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Report'), 'column' => 'id')),
      'damage'     => new sfValidatorChoice(array('required' => false, 'choices' => array('NONE' => 'NONE', 'HAIRLINE_CRACKS' => 'HAIRLINE_CRACKS', 'CRACKED_WINDOW' => 'CRACKED_WINDOW', 'SOME_LARGE_WALL_CRACKS' => 'SOME_LARGE_WALL_CRACKS', 'MANY_LARGE_WALL_CRACKS' => 'MANY_LARGE_WALL_CRACKS', 'TILES_FELL' => 'TILES_FELL', 'CHIMNEY_CRACKS' => 'CHIMNEY_CRACKS', 'BROKEN_WINDOWS' => 'BROKEN_WINDOWS', 'MASONRY_FELL' => 'MASONRY_FELL', 'OLD_CHIMNEY_FELL' => 'OLD_CHIMNEY_FELL', 'NEW_CHIMNEY_FELL' => 'NEW_CHIMNEY_FELL', 'WALL_COLLAPSED' => 'WALL_COLLAPSED', 'ADDITION_SEPARATED' => 'ADDITION_SEPARATED', 'BUILDING_MOVED' => 'BUILDING_MOVED'))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('damage_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Damage';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'report_id'  => 'ForeignKey',
      'damage'     => 'Enum',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
