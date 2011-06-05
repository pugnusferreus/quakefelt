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
      'felt'                    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'other_felt'              => new sfWidgetFormChoice(array('choices' => array('' => '', 'NONE' => 'NONE', 'SOME' => 'SOME', 'MOST' => 'MOST', 'EVERYONE' => 'EVERYONE'))),
      'asleep'                  => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SLEPT_THROUGH' => 'SLEPT_THROUGH', 'WOKE_UP' => 'WOKE_UP'))),
      'situation'               => new sfWidgetFormChoice(array('choices' => array('' => '', 'INSIDE' => 'INSIDE', 'OUTSIDE' => 'OUTSIDE', 'STOPPED_VEHICLE' => 'STOPPED_VEHICLE', 'MOVING_VEHICLE' => 'MOVING_VEHICLE', 'OTHER' => 'OTHER'))),
      'situation_other'         => new sfWidgetFormFilterInput(),
      'motion'                  => new sfWidgetFormChoice(array('choices' => array('' => '', 'NOT_FELT' => 'NOT_FELT', 'WEAK' => 'WEAK', 'MILD' => 'MILD', 'MODERATE' => 'MODERATE', 'STRONG' => 'STRONG', 'VIOLENT' => 'VIOLENT'))),
      'duration'                => new sfWidgetFormChoice(array('choices' => array('' => '', '1_SEC' => '1_SEC', '10_SEC' => '10_SEC', '20_SEC' => '20_SEC', '30_SEC' => '30_SEC', '40_SEC' => '40_SEC', '50_SEC' => '50_SEC', '1_MIN' => '1_MIN', '1_30_MIN,' => '1_30_MIN,', '2_MIN\'' => '2_MIN\'', '2_30_MIN' => '2_30_MIN', '3_MIN' => '3_MIN', '3_30_MIN' => '3_30_MIN', '4_MIN' => '4_MIN', '4_30_MIN' => '4_30_MIN', '5_MIN' => '5_MIN'))),
      'reaction'                => new sfWidgetFormChoice(array('choices' => array('' => '', 'NONE' => 'NONE', 'LITTLE' => 'LITTLE', 'EXCITEMENT' => 'EXCITEMENT', 'SOMEWHAT_FRIGHTENED' => 'SOMEWHAT_FRIGHTENED', 'VERY_FRIGHTENED' => 'VERY_FRIGHTENED', 'EXTREMELY_FRIGHTENED' => 'EXTREMELY_FRIGHTENED'))),
      'response'                => new sfWidgetFormChoice(array('choices' => array('' => '', 'NONE' => 'NONE', 'DOORWAY' => 'DOORWAY', 'DUCKED' => 'DUCKED', 'RAN_OUTSIDE' => 'RAN_OUTSIDE', 'OTHER' => 'OTHER'))),
      'response_other'          => new sfWidgetFormFilterInput(),
      'stand'                   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'sway'                    => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'VIOLENT' => 'VIOLENT'))),
      'creak'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'LOUD' => 'LOUD'))),
      'shelf'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'RATTLED_SLIGHTLY' => 'RATTLED_SLIGHTLY', 'RATTLED_LOUDLY' => 'RATTLED_LOUDLY', 'FEW_TOPPLED' => 'FEW_TOPPLED', 'MANY_FELL' => 'MANY_FELL', 'MOST_FELL' => 'MOST_FELL'))),
      'picture'                 => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'NONE_FELL' => 'NONE_FELL', 'SOME_FELL' => 'SOME_FELL'))),
      'furniture'               => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'heavy_appliance'         => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SOME_CONTENTS_FELL' => 'SOME_CONTENTS_FELL', 'SHIFTED_CM' => 'SHIFTED_CM', 'SHIFTED_M' => 'SHIFTED_M', 'OVERTURNED' => 'OVERTURNED'))),
      'walls'                   => new sfWidgetFormChoice(array('choices' => array('' => '', 'NO' => 'NO', 'SOME_CRACKED' => 'SOME_CRACKED', 'PARTIAL_FALL' => 'PARTIAL_FALL', 'COMPLETE_FALL' => 'COMPLETE_FALL'))),
      'reporter_name'           => new sfWidgetFormFilterInput(),
      'contact_phone'           => new sfWidgetFormFilterInput(),
      'contact_email'           => new sfWidgetFormFilterInput(),
      'latitude'                => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'longitude'               => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'building'                => new sfWidgetFormFilterInput(),
      'story'                   => new sfWidgetFormFilterInput(),
      'mmi'                     => new sfWidgetFormFilterInput(),
      'distance_from_epicentre' => new sfWidgetFormFilterInput(),
      'created_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'              => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'earthquake_id'           => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Earthquake'), 'column' => 'id')),
      'felt'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'other_felt'              => new sfValidatorChoice(array('required' => false, 'choices' => array('NONE' => 'NONE', 'SOME' => 'SOME', 'MOST' => 'MOST', 'EVERYONE' => 'EVERYONE'))),
      'asleep'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SLEPT_THROUGH' => 'SLEPT_THROUGH', 'WOKE_UP' => 'WOKE_UP'))),
      'situation'               => new sfValidatorChoice(array('required' => false, 'choices' => array('INSIDE' => 'INSIDE', 'OUTSIDE' => 'OUTSIDE', 'STOPPED_VEHICLE' => 'STOPPED_VEHICLE', 'MOVING_VEHICLE' => 'MOVING_VEHICLE', 'OTHER' => 'OTHER'))),
      'situation_other'         => new sfValidatorPass(array('required' => false)),
      'motion'                  => new sfValidatorChoice(array('required' => false, 'choices' => array('NOT_FELT' => 'NOT_FELT', 'WEAK' => 'WEAK', 'MILD' => 'MILD', 'MODERATE' => 'MODERATE', 'STRONG' => 'STRONG', 'VIOLENT' => 'VIOLENT'))),
      'duration'                => new sfValidatorChoice(array('required' => false, 'choices' => array('1_SEC' => '1_SEC', '10_SEC' => '10_SEC', '20_SEC' => '20_SEC', '30_SEC' => '30_SEC', '40_SEC' => '40_SEC', '50_SEC' => '50_SEC', '1_MIN' => '1_MIN', '1_30_MIN,' => '1_30_MIN,', '2_MIN\'' => '2_MIN\'', '2_30_MIN' => '2_30_MIN', '3_MIN' => '3_MIN', '3_30_MIN' => '3_30_MIN', '4_MIN' => '4_MIN', '4_30_MIN' => '4_30_MIN', '5_MIN' => '5_MIN'))),
      'reaction'                => new sfValidatorChoice(array('required' => false, 'choices' => array('NONE' => 'NONE', 'LITTLE' => 'LITTLE', 'EXCITEMENT' => 'EXCITEMENT', 'SOMEWHAT_FRIGHTENED' => 'SOMEWHAT_FRIGHTENED', 'VERY_FRIGHTENED' => 'VERY_FRIGHTENED', 'EXTREMELY_FRIGHTENED' => 'EXTREMELY_FRIGHTENED'))),
      'response'                => new sfValidatorChoice(array('required' => false, 'choices' => array('NONE' => 'NONE', 'DOORWAY' => 'DOORWAY', 'DUCKED' => 'DUCKED', 'RAN_OUTSIDE' => 'RAN_OUTSIDE', 'OTHER' => 'OTHER'))),
      'response_other'          => new sfValidatorPass(array('required' => false)),
      'stand'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'sway'                    => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'VIOLENT' => 'VIOLENT'))),
      'creak'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SLIGHT' => 'SLIGHT', 'LOUD' => 'LOUD'))),
      'shelf'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'RATTLED_SLIGHTLY' => 'RATTLED_SLIGHTLY', 'RATTLED_LOUDLY' => 'RATTLED_LOUDLY', 'FEW_TOPPLED' => 'FEW_TOPPLED', 'MANY_FELL' => 'MANY_FELL', 'MOST_FELL' => 'MOST_FELL'))),
      'picture'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'NONE_FELL' => 'NONE_FELL', 'SOME_FELL' => 'SOME_FELL'))),
      'furniture'               => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'heavy_appliance'         => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SOME_CONTENTS_FELL' => 'SOME_CONTENTS_FELL', 'SHIFTED_CM' => 'SHIFTED_CM', 'SHIFTED_M' => 'SHIFTED_M', 'OVERTURNED' => 'OVERTURNED'))),
      'walls'                   => new sfValidatorChoice(array('required' => false, 'choices' => array('NO' => 'NO', 'SOME_CRACKED' => 'SOME_CRACKED', 'PARTIAL_FALL' => 'PARTIAL_FALL', 'COMPLETE_FALL' => 'COMPLETE_FALL'))),
      'reporter_name'           => new sfValidatorPass(array('required' => false)),
      'contact_phone'           => new sfValidatorPass(array('required' => false)),
      'contact_email'           => new sfValidatorPass(array('required' => false)),
      'latitude'                => new sfValidatorPass(array('required' => false)),
      'longitude'               => new sfValidatorPass(array('required' => false)),
      'building'                => new sfValidatorPass(array('required' => false)),
      'story'                   => new sfValidatorPass(array('required' => false)),
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
      'felt'                    => 'Boolean',
      'other_felt'              => 'Enum',
      'asleep'                  => 'Enum',
      'situation'               => 'Enum',
      'situation_other'         => 'Text',
      'motion'                  => 'Enum',
      'duration'                => 'Enum',
      'reaction'                => 'Enum',
      'response'                => 'Enum',
      'response_other'          => 'Text',
      'stand'                   => 'Boolean',
      'sway'                    => 'Enum',
      'creak'                   => 'Enum',
      'shelf'                   => 'Enum',
      'picture'                 => 'Enum',
      'furniture'               => 'Boolean',
      'heavy_appliance'         => 'Enum',
      'walls'                   => 'Enum',
      'reporter_name'           => 'Text',
      'contact_phone'           => 'Text',
      'contact_email'           => 'Text',
      'latitude'                => 'Text',
      'longitude'               => 'Text',
      'building'                => 'Text',
      'story'                   => 'Text',
      'mmi'                     => 'Number',
      'distance_from_epicentre' => 'Number',
      'created_at'              => 'Date',
      'updated_at'              => 'Date',
    );
  }
}
