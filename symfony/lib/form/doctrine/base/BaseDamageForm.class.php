<?php

/**
 * Damage form base class.
 *
 * @method Damage getObject() Returns the current form's model object
 *
 * @package    quakefelt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDamageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'report_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Report'), 'add_empty' => false)),
      'damage'     => new sfWidgetFormChoice(array('choices' => array('NONE' => 'NONE', 'HAIRLINE_CRACKS' => 'HAIRLINE_CRACKS', 'CRACKED_WINDOW' => 'CRACKED_WINDOW', 'SOME_LARGE_WALL_CRACKS' => 'SOME_LARGE_WALL_CRACKS', 'MANY_LARGE_WALL_CRACKS' => 'MANY_LARGE_WALL_CRACKS', 'TILES_FELL' => 'TILES_FELL', 'CHIMNEY_CRACKS' => 'CHIMNEY_CRACKS', 'BROKEN_WINDOWS' => 'BROKEN_WINDOWS', 'MASONRY_FELL' => 'MASONRY_FELL', 'OLD_CHIMNEY_FELL' => 'OLD_CHIMNEY_FELL', 'NEW_CHIMNEY_FELL' => 'NEW_CHIMNEY_FELL', 'WALL_COLLAPSED' => 'WALL_COLLAPSED', 'ADDITION_SEPARATED' => 'ADDITION_SEPARATED', 'BUILDING_MOVED' => 'BUILDING_MOVED'))),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'report_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Report'))),
      'damage'     => new sfValidatorChoice(array('choices' => array(0 => 'NONE', 1 => 'HAIRLINE_CRACKS', 2 => 'CRACKED_WINDOW', 3 => 'SOME_LARGE_WALL_CRACKS', 4 => 'MANY_LARGE_WALL_CRACKS', 5 => 'TILES_FELL', 6 => 'CHIMNEY_CRACKS', 7 => 'BROKEN_WINDOWS', 8 => 'MASONRY_FELL', 9 => 'OLD_CHIMNEY_FELL', 10 => 'NEW_CHIMNEY_FELL', 11 => 'WALL_COLLAPSED', 12 => 'ADDITION_SEPARATED', 13 => 'BUILDING_MOVED'))),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Damage', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('damage[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Damage';
  }

}
