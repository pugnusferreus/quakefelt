<?php

/**
 * quake actions.
 *
 * @package    quakefelt
 * @subpackage quake
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quakeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    
  }
  
  public function executeApiList(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);
    
    $quakes = EarthquakeTable::getInstance()->findAll(Doctrine::HYDRATE_ARRAY);
    
    $this->getResponse()->setContentType('application/json');
    return $this->renderText(json_encode($quakes));
  }
  
  public function executeApiQuakeReports(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);

    $reports = ReportTable::getInstance()->findByEarthquakeId($request->getParameter('id'), Doctrine::HYDRATE_ARRAY);

    $this->getResponse()->setContentType('application/json');
    return $this->renderText(json_encode($reports));
  }
}
