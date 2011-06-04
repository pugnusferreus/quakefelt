<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 * (c) Jonathan H. Wage <jonwage@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Inserts SQL for current model.
 *
 * @package    symfony
 * @subpackage doctrine
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @author     Jonathan H. Wage <jonwage@gmail.com>
 * @version    SVN: $Id: sfDoctrineInsertSqlTask.class.php 27942 2010-02-12 14:05:53Z Kris.Wallsmith $
 */
class qfFetchRssFeedTask extends sfDoctrineBaseTask
{
  /**
   * @see sfTask
   */
  protected function configure()
  {
    $this->addOptions(array(
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
    ));

    $this->namespace = 'quakefelt';
    $this->name = 'fetch-rss';
    $this->briefDescription = 'Fetches the most curent QuakeFelt RSS feed';

    $this->detailedDescription = <<<EOF
EOF;
  }

  /**
   * @see sfTask
   */
  protected function execute($arguments = array(), $options = array())
  {
    $this->logSection('quakefelt', 'fetching RSS');

    $databaseManager = new sfDatabaseManager($this->configuration);
    
    $rss = file_get_contents('http://www.ga.gov.au/earthquakes/all_recent.rss');
    $rss = str_replace('georss:point', 'georsspoint', $rss);
    $xml = simplexml_load_string($rss);
    
    $newest = EarthquakeTable::getInstance()->createQuery()
              ->orderBy('id DESC')
              ->limit('0,1')
              ->fetchOne(array(), Doctrine::HYDRATE_ARRAY);
    
    $quakes = new Doctrine_Collection('Earthquake');
    
    foreach($xml->channel->item as $item)
    {
      preg_match('/quakeId=(\d+)/', (string)$item->link, $matches);
      $itemId = $matches[1];

      if((int)$itemId <= $newest['id']) break;

      list($latitude, $longitude) = explode(' ', (string)$item->georsspoint);
      
      preg_match('/Magnitude\s+([\d\.]+),\s+(.*)/', (string)$item->title, $matches);

      list($magnitude, $description) = array_slice($matches, 1);

      preg_match('/UTC: ([\w\s\d:]+).*?Depth.*?([\d\.]+)/', (string)$item->description, $matches);
      list($datetime, $depth) = array_slice($matches, 1);
      
      $record = new Earthquake();
      $record->fromArray(array(
        'id'            => $itemId,
        'link'          => (string)$item->link,
        'description'   => $description,
        'magnitude'     => $magnitude,
        'latitude'      => $latitude,
        'longitude'     => $longitude,
        'time_of_quake' => date('Y-m-d H:i:s', strtotime($datetime)),
        'depth'         => $depth,
      ));

      $quakes->add($record);
    }

     $quakes->save();
     $this->logSection('quakefelt', $quakes->count() . ' records added');
  }
}
