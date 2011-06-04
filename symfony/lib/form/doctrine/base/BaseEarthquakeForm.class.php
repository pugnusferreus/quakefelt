<?php

/**
 * Earthquake form base class.
 *
 * @method Earthquake getObject() Returns the current form's model object
 *
 * @package    quakefelt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEarthquakeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'magnitude'     => new sfWidgetFormInputText(),
      'link'          => new sfWidgetFormTextarea(),
      'description'   => new sfWidgetFormInputText(),
      'latitude'      => new sfWidgetFormInputText(),
      'longitude'     => new sfWidgetFormInputText(),
      'time_of_quake' => new sfWidgetFormInputText(),
      'depth'         => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'magnitude'     => new sfValidatorNumber(array('required' => false)),
      'link'          => new sfValidatorString(array('max_length' => 400, 'required' => false)),
      'description'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'latitude'      => new sfValidatorNumber(array('required' => false)),
      'longitude'     => new sfValidatorNumber(array('required' => false)),
      'time_of_quake' => new sfValidatorPass(array('required' => false)),
      'depth'         => new sfValidatorNumber(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Earthquake', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('earthquake[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Earthquake';
  }

}
