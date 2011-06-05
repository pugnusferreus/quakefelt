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
      'felt'                    => new sfWidgetFormInputCheckbox(),
      'other_felt'              => new sfWidgetFormChoice(array('choices' => array('NONE' => 'NONE', 'SOME' => 'SOME', 'MOST' => 'MOST', 'EVERYONE' => 'EVERYONE'))),
      'asleep'                  => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SLEPT_THROUGH' => 'SLEPT_THROUGH', 'WOKE_UP' => 'WOKE_UP'))),
      'situation'               => new sfWidgetFormChoice(array('choices' => array('INSIDE' => 'INSIDE', 'OUTSIDE' => 'OUTSIDE', 'STOPPED_VEHICLE' => 'STOPPED_VEHICLE', 'MOVING_VEHICLE' => 'MOVING_VEHICLE', 'OTHER' => 'OTHER'))),
      'situation_other'         => new sfWidgetFormInputText(),
      'motion'                  => new sfWidgetFormChoice(array('choices' => array('NOT_FELT' => 'NOT_FELT', 'WEAK' => 'WEAK', 'MILD' => 'MILD', 'MODERATE' => 'MODERATE', 'STRONG' => 'STRONG', 'VIOLENT' => 'VIOLENT'))),
      'duration'                => new sfWidgetFormChoice(array('choices' => array('1_SEC' => '1_SEC', '10_SEC' => '10_SEC', '20_SEC' => '20_SEC', '30_SEC' => '30_SEC', '40_SEC' => '40_SEC', '50_SEC' => '50_SEC', '1_MIN' => '1_MIN', '1_30_MIN,' => '1_30_MIN,', '2_MIN\'' => '2_MIN\'', '2_30_MIN' => '2_30_MIN', '3_MIN' => '3_MIN', '3_30_MIN' => '3_30_MIN', '4_MIN' => '4_MIN', '4_30_MIN' => '4_30_MIN', '5_MIN' => '5_MIN'))),
      'reaction'                => new sfWidgetFormChoice(array('choices' => array('NONE' => 'NONE', 'LITTLE' => 'LITTLE', 'EXCITEMENT' => 'EXCITEMENT', 'SOMEWHAT_FRIGHTENED' => 'SOMEWHAT_FRIGHTENED', 'VERY_FRIGHTENED' => 'VERY_FRIGHTENED', 'EXTREMELY_FRIGHTENED' => 'EXTREMELY_FRIGHTENED'))),
      'response'                => new sfWidgetFormChoice(array('choices' => array('NONE' => 'NONE', 'DOORWAY' => 'DOORWAY', 'DUCKED' => 'DUCKED', 'RAN_OUTSIDE' => 'RAN_OUTSIDE', 'OTHER' => 'OTHER'))),
      'response_other'          => new sfWidgetFormInputText(),
      'stand'                   => new sfWidgetFormInputCheckbox(),
      'sway'                    => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'VIOLENT' => 'VIOLENT'))),
      'creak'                   => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'LOUD' => 'LOUD'))),
      'shelf'                   => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'RATTLED_SLIGHTLY' => 'RATTLED_SLIGHTLY', 'RATTLED_LOUDLY' => 'RATTLED_LOUDLY', 'FEW_TOPPLED' => 'FEW_TOPPLED', 'MANY_FELL' => 'MANY_FELL', 'MOST_FELL' => 'MOST_FELL'))),
      'picture'                 => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'NONE_FELL' => 'NONE_FELL', 'SOME_FELL' => 'SOME_FELL'))),
      'furniture'               => new sfWidgetFormInputCheckbox(),
      'heavy_appliance'         => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SOME_CONTENTS_FELL' => 'SOME_CONTENTS_FELL', 'SHIFTED_CM' => 'SHIFTED_CM', 'SHIFTED_M' => 'SHIFTED_M', 'OVERTURNED' => 'OVERTURNED'))),
      'walls'                   => new sfWidgetFormChoice(array('choices' => array('NO' => 'NO', 'SOME_CRACKED' => 'SOME_CRACKED', 'PARTIAL_FALL' => 'PARTIAL_FALL', 'COMPLETE_FALL' => 'COMPLETE_FALL'))),
      'reporter_name'           => new sfWidgetFormInputText(),
      'contact_phone'           => new sfWidgetFormInputText(),
      'contact_email'           => new sfWidgetFormInputText(),
      'latitude'                => new sfWidgetFormInputText(),
      'longitude'               => new sfWidgetFormInputText(),
      'building'                => new sfWidgetFormInputText(),
      'story'                   => new sfWidgetFormInputText(),
      'mmi'                     => new sfWidgetFormInputText(),
      'distance_from_epicentre' => new sfWidgetFormInputText(),
      'created_at'              => new sfWidgetFormDateTime(),
      'updated_at'              => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'earthquake_id'           => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Earthquake'))),
      'felt'                    => new sfValidatorBoolean(array('required' => false)),
      'other_felt'              => new sfValidatorChoice(array('choices' => array(0 => 'NONE', 1 => 'SOME', 2 => 'MOST', 3 => 'EVERYONE'), 'required' => false)),
      'asleep'                  => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SLEPT_THROUGH', 2 => 'WOKE_UP'), 'required' => false)),
      'situation'               => new sfValidatorChoice(array('choices' => array(0 => 'INSIDE', 1 => 'OUTSIDE', 2 => 'STOPPED_VEHICLE', 3 => 'MOVING_VEHICLE', 4 => 'OTHER'), 'required' => false)),
      'situation_other'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'motion'                  => new sfValidatorChoice(array('choices' => array(0 => 'NOT_FELT', 1 => 'WEAK', 2 => 'MILD', 3 => 'MODERATE', 4 => 'STRONG', 5 => 'VIOLENT'), 'required' => false)),
      'duration'                => new sfValidatorChoice(array('choices' => array(0 => '1_SEC', 1 => '10_SEC', 2 => '20_SEC', 3 => '30_SEC', 4 => '40_SEC', 5 => '50_SEC', 6 => '1_MIN', 7 => '1_30_MIN,', 8 => '2_MIN\'', 9 => '2_30_MIN', 10 => '3_MIN', 11 => '3_30_MIN', 12 => '4_MIN', 13 => '4_30_MIN', 14 => '5_MIN'), 'required' => false)),
      'reaction'                => new sfValidatorChoice(array('choices' => array(0 => 'NONE', 1 => 'LITTLE', 2 => 'EXCITEMENT', 3 => 'SOMEWHAT_FRIGHTENED', 4 => 'VERY_FRIGHTENED', 5 => 'EXTREMELY_FRIGHTENED'), 'required' => false)),
      'response'                => new sfValidatorChoice(array('choices' => array(0 => 'NONE', 1 => 'DOORWAY', 2 => 'DUCKED', 3 => 'RAN_OUTSIDE', 4 => 'OTHER'), 'required' => false)),
      'response_other'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'stand'                   => new sfValidatorBoolean(array('required' => false)),
      'sway'                    => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SLIGHT', 2 => 'VIOLENT'), 'required' => false)),
      'creak'                   => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SLIGHT', 2 => 'LOUD'), 'required' => false)),
      'shelf'                   => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'RATTLED_SLIGHTLY', 2 => 'RATTLED_LOUDLY', 3 => 'FEW_TOPPLED', 4 => 'MANY_FELL', 5 => 'MOST_FELL'), 'required' => false)),
      'picture'                 => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'NONE_FELL', 2 => 'SOME_FELL'), 'required' => false)),
      'furniture'               => new sfValidatorBoolean(array('required' => false)),
      'heavy_appliance'         => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SOME_CONTENTS_FELL', 2 => 'SHIFTED_CM', 3 => 'SHIFTED_M', 4 => 'OVERTURNED'), 'required' => false)),
      'walls'                   => new sfValidatorChoice(array('choices' => array(0 => 'NO', 1 => 'SOME_CRACKED', 2 => 'PARTIAL_FALL', 3 => 'COMPLETE_FALL'), 'required' => false)),
      'reporter_name'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'contact_phone'           => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'contact_email'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'latitude'                => new sfValidatorString(array('max_length' => 255)),
      'longitude'               => new sfValidatorString(array('max_length' => 255)),
      'building'                => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'story'                   => new sfValidatorPass(array('required' => false)),
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
