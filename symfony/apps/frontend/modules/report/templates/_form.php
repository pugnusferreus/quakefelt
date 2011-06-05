<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('report/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('report/index') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'report/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['earthquake_id']->renderLabel() ?></th>
        <td>
          <?php echo $form['earthquake_id']->renderError() ?>
          <?php echo $form['earthquake_id'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['felt']->renderLabel() ?></th>
        <td>
          <?php echo $form['felt']->renderError() ?>
          <?php echo $form['felt'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['other_felt']->renderLabel() ?></th>
        <td>
          <?php echo $form['other_felt']->renderError() ?>
          <?php echo $form['other_felt'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['asleep']->renderLabel() ?></th>
        <td>
          <?php echo $form['asleep']->renderError() ?>
          <?php echo $form['asleep'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['situation']->renderLabel() ?></th>
        <td>
          <?php echo $form['situation']->renderError() ?>
          <?php echo $form['situation'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['situation_other']->renderLabel() ?></th>
        <td>
          <?php echo $form['situation_other']->renderError() ?>
          <?php echo $form['situation_other'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['motion']->renderLabel() ?></th>
        <td>
          <?php echo $form['motion']->renderError() ?>
          <?php echo $form['motion'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['duration']->renderLabel() ?></th>
        <td>
          <?php echo $form['duration']->renderError() ?>
          <?php echo $form['duration'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['reaction']->renderLabel() ?></th>
        <td>
          <?php echo $form['reaction']->renderError() ?>
          <?php echo $form['reaction'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['response']->renderLabel() ?></th>
        <td>
          <?php echo $form['response']->renderError() ?>
          <?php echo $form['response'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['stand']->renderLabel() ?></th>
        <td>
          <?php echo $form['stand']->renderError() ?>
          <?php echo $form['stand'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['sway']->renderLabel() ?></th>
        <td>
          <?php echo $form['sway']->renderError() ?>
          <?php echo $form['sway'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['creak']->renderLabel() ?></th>
        <td>
          <?php echo $form['creak']->renderError() ?>
          <?php echo $form['creak'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['shelf']->renderLabel() ?></th>
        <td>
          <?php echo $form['shelf']->renderError() ?>
          <?php echo $form['shelf'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['picture']->renderLabel() ?></th>
        <td>
          <?php echo $form['picture']->renderError() ?>
          <?php echo $form['picture'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['furniture']->renderLabel() ?></th>
        <td>
          <?php echo $form['furniture']->renderError() ?>
          <?php echo $form['furniture'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['heavy_appliance']->renderLabel() ?></th>
        <td>
          <?php echo $form['heavy_appliance']->renderError() ?>
          <?php echo $form['heavy_appliance'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['walls']->renderLabel() ?></th>
        <td>
          <?php echo $form['walls']->renderError() ?>
          <?php echo $form['walls'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['reporter_name']->renderLabel() ?></th>
        <td>
          <?php echo $form['reporter_name']->renderError() ?>
          <?php echo $form['reporter_name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contact_phone']->renderLabel() ?></th>
        <td>
          <?php echo $form['contact_phone']->renderError() ?>
          <?php echo $form['contact_phone'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['contact_email']->renderLabel() ?></th>
        <td>
          <?php echo $form['contact_email']->renderError() ?>
          <?php echo $form['contact_email'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['latitude']->renderLabel() ?></th>
        <td>
          <?php echo $form['latitude']->renderError() ?>
          <?php echo $form['latitude'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['longitude']->renderLabel() ?></th>
        <td>
          <?php echo $form['longitude']->renderError() ?>
          <?php echo $form['longitude'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['building']->renderLabel() ?></th>
        <td>
          <?php echo $form['building']->renderError() ?>
          <?php echo $form['building'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['story']->renderLabel() ?></th>
        <td>
          <?php echo $form['story']->renderError() ?>
          <?php echo $form['story'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['mmi']->renderLabel() ?></th>
        <td>
          <?php echo $form['mmi']->renderError() ?>
          <?php echo $form['mmi'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['distance_from_epicentre']->renderLabel() ?></th>
        <td>
          <?php echo $form['distance_from_epicentre']->renderError() ?>
          <?php echo $form['distance_from_epicentre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['created_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['created_at']->renderError() ?>
          <?php echo $form['created_at'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['updated_at']->renderLabel() ?></th>
        <td>
          <?php echo $form['updated_at']->renderError() ?>
          <?php echo $form['updated_at'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
