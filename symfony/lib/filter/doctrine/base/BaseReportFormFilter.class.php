<?php

/**
 * Report filter form base class.
 *
 * @package    quakefelt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseReportFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'earthquake_id'           => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Earthquake'), 'add_empty' => true)),
      'reporter_name'           => new sfWidgetFormFilterInput(),
      'contact_phone'           => new sfWidgetFormFilterInput(),
      'contact_email'           => new sfWidgetFormFilterInput(),
      'situation'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'INSIDE' => 'INSIDE', 'OUTSIDE' => 'OUTSIDE', 'STOPPED_VEHICLE' => 'STOPPED_VEHICLE', 'MOVING_VEHICLE' => 'MOVING_VEHICLE', 'OTHER' => 'OTHER'))),
      'latitude'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'longitude'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'building'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'asleep'                  => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SLEPT_THROUGH' => 'SLEPT_THROUGH', 'WOKE_UP' => 'WOKE_UP'))),
      'felt'                    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'other_felt'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO_ANSWER' => 'NO_ANSWER', 'NO_OTHERS' => 'NO_OTHERS', 'SOME_FELT' => 'SOME_FELT', 'MOST_FELT' => 'MOST_FELT', 'ALMOST_ALL' => 'ALMOST_ALL'))),
      'motion'                  => new sfWidgetFormChoice(array('choices' => array('' => '', 'NOT_FELT' => 'NOT_FELT', 'WEAK' => 'WEAK', 'MILD' => 'MILD', 'MODERATE' => 'MODERATE', 'STRONG' => 'STRONG', 'VIOLENT' => 'VIOLENT'))),
      'duration'                => new sfWidgetFormFilterInput(),
      'reaction'                => new sfWidgetFormChoice(array('choices' => array('' => '', 'NONE' => 'NONE', 'LITTLE' => 'LITTLE', 'EXCITEMENT' => 'EXCITEMENT', 'SOMEWHAT_FRIGHTENED' => 'SOMEWHAT_FRIGHTENED', 'VERY_FRIGHTENED' => 'VERY_FRIGHTENED', 'EXTREMELY_FRIGHTENED' => 'EXTREMELY_FRIGHTENED'))),
      'response'                => new sfWidgetFormChoice(array('choices' => array('' => '', 'TOOK_NO_ACTION' => 'TOOK_NO_ACTION', 'DOORWAY' => 'DOORWAY', 'DUCKED' => 'DUCKED', 'RAN_OUTSIDE' => 'RAN_OUTSIDE', 'OTHER' => 'OTHER'))),
      'stand'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'YES' => 'YES', 'NO' => 'NO'))),
      'sway'                    => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'VIOLENT' => 'VIOLENT'))),
      'creak'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'LOUD' => 'LOUD'))),
      'shelf'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'RATTLED_SLIGHTLY' => 'RATTLED_SLIGHTLY', 'RATTLED_LOUDLY' => 'RATTLED_LOUDLY', 'FEW_TOPPLED' => 'FEW_TOPPLED', 'MANY_FELL' => 'MANY_FELL', 'MOST_FELL' => 'MOST_FELL'))),
      'picture'                 => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'NONE_FELL' => 'NONE_FELL', 'SOME_FELL' => 'SOME_FELL'))),
      'furniture'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'YES' => 'YES'))),
      'heavy_appliance'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SOME_CONTENTS_FELL' => 'SOME_CONTENTS_FELL', 'SHIFTED_CM' => 'SHIFTED_CM', 'SHIFTED_M' => 'SHIFTED_M', 'OVERTURNED' => 'OVERTURNED'))),
      'walls'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SOME_CRACKED' => 'SOME_CRACKED', 'PARTIAL_FALL' => 'PARTIAL_FALL', 'COMPLETE_FALL' => 'COMPLETE_FALL'))),
      'd_text'                  => new sfWidgetFormFilterInput(),
      'mmi'                     => new sfWidgetFormFilterInput(),
      'distance_from_epicentre' => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'earthquake_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Earthquake'), 'column' => 'id')),
      'reporter_name'           => new sfValidatorPass(array('required' => false)),
      'contact_phone'           => new sfValidatorPass(array('required' => false)),
      'contact_email'           => new sfValidatorPass(array('required' => false)),
      'situation'               => new sfValidatorChoice(array('required' => false, 'choices' => array('INSIDE' => 'INSIDE', 'OUTSIDE' => 'OUTSIDE', 'STOPPED_VEHICLE' => 'STOPPED_VEHICLE', 'MOVING_VEHICLE' => 'MOVING_VEHICLE', 'OTHER' => 'OTHER'))),
      'latitude'                => new sfValidatorPass(array('required' => false)),
      'longitude'               => new sfValidatorPass(array('required' => false)),
      'building'                => new sfValidatorPass(array('required' => false)),
      'asleep'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SLEPT_THROUGH' => 'SLEPT_THROUGH', 'WOKE_UP' => 'WOKE_UP'))),
      'felt'                    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'other_felt'              => new sfValidatorChoice(array('required' => false, 'choices' => array('NO_ANSWER' => 'NO_ANSWER', 'NO_OTHERS' => 'NO_OTHERS', 'SOME_FELT' => 'SOME_FELT', 'MOST_FELT' => 'MOST_FELT', 'ALMOST_ALL' => 'ALMOST_ALL'))),
      'motion'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('NOT_FELT' => 'NOT_FELT', 'WEAK' => 'WEAK', 'MILD' => 'MILD', 'MODERATE' => 'MODERATE', 'STRONG' => 'STRONG', 'VIOLENT' => 'VIOLENT'))),
      'duration'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'reaction'                => new sfValidatorChoice(array('required' => false, 'choices' => array('NONE' => 'NONE', 'LITTLE' => 'LITTLE', 'EXCITEMENT' => 'EXCITEMENT', 'SOMEWHAT_FRIGHTENED' => 'SOMEWHAT_FRIGHTENED', 'VERY_FRIGHTENED' => 'VERY_FRIGHTENED', 'EXTREMELY_FRIGHTENED' => 'EXTREMELY_FRIGHTENED'))),
      'response'                => new sfValidatorChoice(array('required' => false, 'choices' => array('TOOK_NO_ACTION' => 'TOOK_NO_ACTION', 'DOORWAY' => 'DOORWAY', 'DUCKED' => 'DUCKED', 'RAN_OUTSIDE' => 'RAN_OUTSIDE', 'OTHER' => 'OTHER'))),
      'stand'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('YES' => 'YES', 'NO' => 'NO'))),
      'sway'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'VIOLENT' => 'VIOLENT'))),
      'creak'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'LOUD' => 'LOUD'))),
      'shelf'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'RATTLED_SLIGHTLY' => 'RATTLED_SLIGHTLY', 'RATTLED_LOUDLY' => 'RATTLED_LOUDLY', 'FEW_TOPPLED' => 'FEW_TOPPLED', 'MANY_FELL' => 'MANY_FELL', 'MOST_FELL' => 'MOST_FELL'))),
      'picture'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'NONE_FELL' => 'NONE_FELL', 'SOME_FELL' => 'SOME_FELL'))),
      'furniture'               => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'YES' => 'YES'))),
      'heavy_appliance'         => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SOME_CONTENTS_FELL' => 'SOME_CONTENTS_FELL', 'SHIFTED_CM' => 'SHIFTED_CM', 'SHIFTED_M' => 'SHIFTED_M', 'OVERTURNED' => 'OVERTURNED'))),
      'walls'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SOME_CRACKED' => 'SOME_CRACKED', 'PARTIAL_FALL' => 'PARTIAL_FALL', 'COMPLETE_FALL' => 'COMPLETE_FALL'))),
      'd_text'                  => new sfValidatorPass(array('required' => false)),
      'mmi'                     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'distance_from_epicentre' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'              => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('report_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Report';
  }

  public function getFields()
  {
    return array(
      'id'                      => 'Number',
      'earthquake_id'           => 'ForeignKey',
      'reporter_name'           => 'Text',
      'contact_phone'           => 'Text',
      'contact_email'           => 'Text',
      'situation'               => 'Enum',
      'latitude'                => 'Text',
      'longitude'               => 'Text',
      'building'                => 'Text',
      'asleep'                  => 'Enum',
      'felt'                    => 'Number',
      'other_felt'              => 'Enum',
      'motion'                  => 'Enum',
      'duration'                => 'Number',
      'reaction'                => 'Enum',
      'response'                => 'Enum',
      'stand'                   => 'Enum',
      'sway'                    => 'Enum',
      'creak'                   => 'Enum',
      'shelf'                   => 'Enum',
      'picture'                 => 'Enum',
      'furniture'               => 'Enum',
      'heavy_appliance'         => 'Enum',
      'walls'                   => 'Enum',
      'd_text'                  => 'Text',
      'mmi'                     => 'Number',
      'distance_from_epicentre' => 'Number',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
