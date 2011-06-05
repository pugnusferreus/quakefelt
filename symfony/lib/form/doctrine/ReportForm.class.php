<?php

/**
 * Report form.
 *
 * @package    quakefelt
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReportForm extends BaseReportForm
{
  public function configure()
  {

    unset($this['updated_at'], $this['created_at'], $this['latitude'], $this['longitude']);
  }
}
