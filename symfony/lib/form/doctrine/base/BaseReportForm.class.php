<?php

/**
 * Report form base class.
 *
 * @method Report getObject() Returns the current form's model object
 *
 * @package    quakefelt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReportForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                      => new sfWidgetFormInputHidden(),
      'earthquake_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Earthquake'), 'add_empty' => false)),
      'reporter_name'           => new sfWidgetFormInputText(),
      'contact_phone'           => new sfWidgetFormInputText(),
      'contact_email'           => new sfWidgetFormInputText(),
      'situation'               => new sfWidgetFormChoice(array('choices' => array('INSIDE' => 'INSIDE', 'OUTSIDE' => 'OUTSIDE', 'STOPPED_VEHICLE' => 'STOPPED_VEHICLE', 'MOVING_VEHICLE' => 'MOVING_VEHICLE', 'OTHER' => 'OTHER'))),
      'latitude'                => new sfWidgetFormInputText(),
      'longitude'               => new sfWidgetFormInputText(),
      'building'                => new sfWidgetFormInputText(),
      'asleep'                  => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SLEPT_THROUGH' => 'SLEPT_THROUGH', 'WOKE_UP' => 'WOKE_UP'))),
      'felt'                    => new sfWidgetFormInputText(),
      'other_felt'              => new sfWidgetFormChoice(array('choices' => array('NO_ANSWER' => 'NO_ANSWER', 'NO_OTHERS' => 'NO_OTHERS', 'SOME_FELT' => 'SOME_FELT', 'MOST_FELT' => 'MOST_FELT', 'ALMOST_ALL' => 'ALMOST_ALL'))),
      'motion'                  => new sfWidgetFormChoice(array('choices' => array('NOT_FELT' => 'NOT_FELT', 'WEAK' => 'WEAK', 'MILD' => 'MILD', 'MODERATE' => 'MODERATE', 'STRONG' => 'STRONG', 'VIOLENT' => 'VIOLENT'))),
      'duration'                => new sfWidgetFormInputText(),
      'reaction'                => new sfWidgetFormChoice(array('choices' => array('NONE' => 'NONE', 'LITTLE' => 'LITTLE', 'EXCITEMENT' => 'EXCITEMENT', 'SOMEWHAT_FRIGHTENED' => 'SOMEWHAT_FRIGHTENED', 'VERY_FRIGHTENED' => 'VERY_FRIGHTENED', 'EXTREMELY_FRIGHTENED' => 'EXTREMELY_FRIGHTENED'))),
      'response'                => new sfWidgetFormChoice(array('choices' => array('TOOK_NO_ACTION' => 'TOOK_NO_ACTION', 'DOORWAY' => 'DOORWAY', 'DUCKED' => 'DUCKED', 'RAN_OUTSIDE' => 'RAN_OUTSIDE', 'OTHER' => 'OTHER'))),
      'stand'                   => new sfWidgetFormChoice(array('choices' => array('YES' => 'YES', 'NO' => 'NO'))),
      'sway'                    => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'VIOLENT' => 'VIOLENT'))),
      'creak'                   => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'LOUD' => 'LOUD'))),
      'shelf'                   => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'RATTLED_SLIGHTLY' => 'RATTLED_SLIGHTLY', 'RATTLED_LOUDLY' => 'RATTLED_LOUDLY', 'FEW_TOPPLED' => 'FEW_TOPPLED', 'MANY_FELL' => 'MANY_FELL', 'MOST_FELL' => 'MOST_FELL'))),
      'picture'                 => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'NONE_FELL' => 'NONE_FELL', 'SOME_FELL' => 'SOME_FELL'))),
      'furniture'               => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'YES' => 'YES'))),
      'heavy_appliance'         => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SOME_CONTENTS_FELL' => 'SOME_CONTENTS_FELL', 'SHIFTED_CM' => 'SHIFTED_CM', 'SHIFTED_M' => 'SHIFTED_M', 'OVERTURNED' => 'OVERTURNED'))),
      'walls'                   => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SOME_CRACKED' => 'SOME_CRACKED', 'PARTIAL_FALL' => 'PARTIAL_FALL', 'COMPLETE_FALL' => 'COMPLETE_FALL'))),
      'd_text'                  => new sfWidgetFormTextarea(),
      'mmi'                     => new sfWidgetFormInputText(),
      'distance_from_epicentre' => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'earthquake_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Earthquake'))),
      'reporter_name'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contact_phone'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'contact_email'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'situation'               => new sfValidatorChoice(array('choices' => array(0 => 'INSIDE', 1 => 'OUTSIDE', 2 => 'STOPPED_VEHICLE', 3 => 'MOVING_VEHICLE', 4 => 'OTHER'))),
      'latitude'                => new sfValidatorString(array('max_length' => 255)),
      'longitude'               => new sfValidatorString(array('max_length' => 255)),
      'building'                => new sfValidatorString(array('max_length' => 100)),
      'asleep'                  => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SLEPT_THROUGH', 2 => 'WOKE_UP'))),
      'felt'                    => new sfValidatorInteger(),
      'other_felt'              => new sfValidatorChoice(array('choices' => array(0 => 'NO_ANSWER', 1 => 'NO_OTHERS', 2 => 'SOME_FELT', 3 => 'MOST_FELT', 4 => 'ALMOST_ALL'))),
      'motion'                  => new sfValidatorChoice(array('choices' => array(0 => 'NOT_FELT', 1 => 'WEAK', 2 => 'MILD', 3 => 'MODERATE', 4 => 'STRONG', 5 => 'VIOLENT'))),
      'duration'                => new sfValidatorInteger(array('required' => false)),
      'reaction'                => new sfValidatorChoice(array('choices' => array(0 => 'NONE', 1 => 'LITTLE', 2 => 'EXCITEMENT', 3 => 'SOMEWHAT_FRIGHTENED', 4 => 'VERY_FRIGHTENED', 5 => 'EXTREMELY_FRIGHTENED'))),
      'response'                => new sfValidatorChoice(array('choices' => array(0 => 'TOOK_NO_ACTION', 1 => 'DOORWAY', 2 => 'DUCKED', 3 => 'RAN_OUTSIDE', 4 => 'OTHER'))),
      'stand'                   => new sfValidatorChoice(array('choices' => array(0 => 'YES', 1 => 'NO'))),
      'sway'                    => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SLIGHT', 2 => 'VIOLENT'))),
      'creak'                   => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SLIGHT', 2 => 'LOUD'))),
      'shelf'                   => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'RATTLED_SLIGHTLY', 2 => 'RATTLED_LOUDLY', 3 => 'FEW_TOPPLED', 4 => 'MANY_FELL', 5 => 'MOST_FELL'))),
      'picture'                 => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'NONE_FELL', 2 => 'SOME_FELL'))),
      'furniture'               => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'YES'))),
      'heavy_appliance'         => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SOME_CONTENTS_FELL', 2 => 'SHIFTED_CM', 3 => 'SHIFTED_M', 4 => 'OVERTURNED'))),
      'walls'                   => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SOME_CRACKED', 2 => 'PARTIAL_FALL', 3 => 'COMPLETE_FALL'))),
      'd_text'                  => new sfValidatorString(array('max_length' => 1000, 'required' => false)),
      'mmi'                     => new sfValidatorNumber(array('required' => false)),
      'distance_from_epicentre' => new sfValidatorNumber(array('required' => false)),
      'created_at'              => new sfValidatorDateTime(),
      'updated_at'              => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Report', 'column' => array('id')))
    );

    $this->widgetSchema->setNameFormat('report[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Report';
  }

}
