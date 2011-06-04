<?php

/**
 * Earthquake filter form base class.
 *
 * @package    quakefelt
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEarthquakeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'magnitude'     => new sfWidgetFormFilterInput(),
      'link'          => new sfWidgetFormFilterInput(),
      'description'   => new sfWidgetFormFilterInput(),
      'latitude'      => new sfWidgetFormFilterInput(),
      'longitude'     => new sfWidgetFormFilterInput(),
      'time_of_quake' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'depth'         => new sfWidgetFormFilterInput(),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'magnitude'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'link'          => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'latitude'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'longitude'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'time_of_quake' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'depth'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('earthquake_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Earthquake';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'magnitude'     => 'Number',
      'link'          => 'Text',
      'description'   => 'Text',
      'latitude'      => 'Number',
      'longitude'     => 'Number',
      'time_of_quake' => 'Date',
      'depth'         => 'Number',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
