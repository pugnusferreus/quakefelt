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
    
    $quakes = EarthquakeTable::getInstance()->createQuery('quakes')
              ->addSelect('quakes.*, COUNT(reports.id) as report_count')
              ->leftJoin('quakes.Reports reports')
              ->execute(array(), Doctrine::HYDRATE_ARRAY);
    
    //$this->getResponse()->setContentType('application/json');
    return $this->renderText(json_encode($quakes));
  }
  
  public function executeApiQuakeReports(sfWebRequest $request)
  {
    sfConfig::set('sf_web_debug', false);

    $reports = ReportTable::getInstance()->createQuery('reports')
              ->innerJoin('reports.Damages damages')
              ->where('reports.earthquake_id = ?', $request->getParameter('id'))
              ->execute(array(), Doctrine::HYDRATE_ARRAY);

    //$this->getResponse()->setContentType('application/json');
    return $this->renderText(json_encode($reports));
  }
}
