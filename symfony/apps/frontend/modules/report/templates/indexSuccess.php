<h1>Reports List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Earthquake</th>
      <th>Felt</th>
      <th>Other felt</th>
      <th>Asleep</th>
      <th>Situation</th>
      <th>Situation other</th>
      <th>Motion</th>
      <th>Duration</th>
      <th>Reaction</th>
      <th>Response</th>
      <th>Stand</th>
      <th>Sway</th>
      <th>Creak</th>
      <th>Shelf</th>
      <th>Picture</th>
      <th>Furniture</th>
      <th>Heavy appliance</th>
      <th>Walls</th>
      <th>Reporter name</th>
      <th>Contact phone</th>
      <th>Contact email</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Building</th>
      <th>Story</th>
      <th>Mmi</th>
      <th>Distance from epicentre</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($reports as $report): ?>
    <tr>
      <td><a href="<?php echo url_for('report/edit?id='.$report->getId()) ?>"><?php echo $report->getId() ?></a></td>
      <td><?php echo $report->getEarthquakeId() ?></td>
      <td><?php echo $report->getFelt() ?></td>
      <td><?php echo $report->getOtherFelt() ?></td>
      <td><?php echo $report->getAsleep() ?></td>
      <td><?php echo $report->getSituation() ?></td>
      <td><?php echo $report->getSituationOther() ?></td>
      <td><?php echo $report->getMotion() ?></td>
      <td><?php echo $report->getDuration() ?></td>
      <td><?php echo $report->getReaction() ?></td>
      <td><?php echo $report->getResponse() ?></td>
      <td><?php echo $report->getStand() ?></td>
      <td><?php echo $report->getSway() ?></td>
      <td><?php echo $report->getCreak() ?></td>
      <td><?php echo $report->getShelf() ?></td>
      <td><?php echo $report->getPicture() ?></td>
      <td><?php echo $report->getFurniture() ?></td>
      <td><?php echo $report->getHeavyAppliance() ?></td>
      <td><?php echo $report->getWalls() ?></td>
      <td><?php echo $report->getReporterName() ?></td>
      <td><?php echo $report->getContactPhone() ?></td>
      <td><?php echo $report->getContactEmail() ?></td>
      <td><?php echo $report->getLatitude() ?></td>
      <td><?php echo $report->getLongitude() ?></td>
      <td><?php echo $report->getBuilding() ?></td>
      <td><?php echo $report->getStory() ?></td>
      <td><?php echo $report->getMmi() ?></td>
      <td><?php echo $report->getDistanceFromEpicentre() ?></td>
      <td><?php echo $report->getCreatedAt() ?></td>
      <td><?php echo $report->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('report/new') ?>">New</a>
