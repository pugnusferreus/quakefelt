
<form action="<?php echo url_for('report/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

  <input type="hidden" name="report[earthquake_id]" value="<?php echo $sf_request->getParameter('earthquake_id') ?>" />
  <?php echo $form->renderHiddenFields() ?>

  <div class="question-set" data-role="collapsible" data-collapsed="false">
    <h3>What did you experience?</h3>
    <div data-role="fieldcontain">
      <label id="feelit-label" for="feelit">Did you feel it?:</label>
      <select name="report[felt]" id="feelit" data-role="slider">
        <option value="1">Yes</option>
        <option value="0">No</option>
      </select>
    </div>


    <div data-role="fieldcontain">
      <fieldset data-role="controlgroup" data-type="horizontal">
        <div role="heading" >How many others felt it too?:</div>
        <input name="report[other_felt]" id="others-choice-1" value="NONE" type="radio"><label data-theme="c" for="others-choice-1">None</label>
        <input name="report[other_felt]" id="others-choice-2" value="SOME" type="radio"><label data-theme="c" for="others-choice-2">Some</label>
        <input name="report[other_felt]" id="others-choice-3" value="MOST" type="radio"><label data-theme="c" for="others-choice-3">Most</label>
        <input name="report[other_felt]" id="others-choice-4" value="EVERYONE" type="radio"><label data-theme="c" for="others-choice-4">Everyone</label>
      </fieldset>
    </div>


    <div data-role="fieldcontain">
      <fieldset data-role="controlgroup" data-type="horizontal">
        <div role="heading">I was:</div>
        <input name="report[asleep]" id="awake-choice-1" value="NO" type="radio"><label data-theme="c" for="awake-choice-1">Awake</label>
        <input name="report[asleep]" id="awake-choice-2" value="SLEPT_THROUGH" type="radio"><label data-theme="c" for="awake-choice-2">Asleep</label>
        <input name="report[asleep]" id="awake-choice-3" value="WOKE_UP" type="radio"><label data-theme="c" for="awake-choice-3">Woken Up</label>
      </fieldset>
    </div>


    <div data-role="fieldcontain">
      <label for="situation">Where were you?:</label>
      <div data-theme="c">
        <select name="report[situation]" id="situation">
          <option value="INSIDE">Inside</option>
          <option value="OUTSIDE">Outside</option>
          <option value="MOVING_VEHICLE">Moving vehicle</option>
          <option value="STOPPED_VEHICLE">Stationary vehicle</option>
          <option value="OTHER" class="show-next">Other</option>
        </select>
      </div>
    </div>

    <div data-role="situation" class="hidden-field">
      <label for="SITUATION-OTHER">Other:</label>
      <input name="report[situation_other]" id="SITUATION-OTHER" value="" type="text">
    </div>


    <div data-role="fieldcontain">
      <label for="motion">Shaking strength?:</label>
      <div data-theme="c">
        <select name="report[motion]" id="motion">
          <option value="NOT_FELT">Not felt</option>
          <option value="WEAK">Weak</option>
          <option value="MILD">Mild</option>
          <option value="MODERATE">Moderate</option>
          <option value="STRONG">Strong</option>
          <option value="VIOLENT">Violent</option>
        </select>
      </div>
    </div>

    <div data-role="fieldcontain">
      <label for="duration">Shaking Duration:</label>
      <div data-theme="c">
        <select name="report[duration]" id="duration">
          <option value="1_SEC">1 second</option>
          <option value="10_SEC">10 seconds</option>
          <option value="20_SEC">20 seconds</option>
          <option value="30_SEC">30 seconds</option>
          <option value="40_SEC">40 seconds</option>
          <option value="50_SEC">50 seconds</option>
          <option value="1_MIN">1 minute</option>
          <option value="1_30_MIN">1 minute 30 seconds</option>
          <option value="2_MIN">2 minutes</option>
          <option value="2_30_MIN">2 minutes 30 seconds</option>
          <option value="3_MIN">3 minutes</option>
          <option value="3_30_MIN">3 minutes 30 seconds</option>
          <option value="4_MIN">4 minutes</option>
          <option value="4_30_MIN">4 minutes 30 seconds</option>
          <option value="5_MIN">5 minutes</option>
        </select>
      </div>
    </div>

    <div data-role="fieldcontain">
      <label for="response">Your reaction?:</label>
      <div data-theme="c">
        <select name="report[response]" id="response">
          <option value="NONE">Took no action</option>
          <option value="DOORWAY">Moved to doorway</option>
          <option value="DUCKED">Dropped and covered</option>
          <option value="RAN_OUTSIDE">Ran outside</option>
          <option value="OTHER" class="show-next">Other</option>
        </select>
      </div>
    </div>

    <div data-role="fieldcontain" class="hidden-field">
      <label for="response_other">Other:</label>
      <input name="report[response_other]" id="response_other" value="" type="text">
    </div>

    <div data-role="fieldcontain">
      <label for="reaction">Your response?:</label>
      <div data-theme="c">
        <select name="report[response]" id="response">
          <option value="NONE">No reaction/Not felt</option>
          <option value="LITTLE">Very little reaction</option>
          <option value="EXCITEMENT">Excitement</option>
          <option value="SOMEWHAT_FRIGHTENED">Somewhat frightened</option>
          <option value="VERY_FRIGHTENED">Very frightened</option>
          <option value="EXTREMELY_FRIGHTENED">Extremely frightened</option>
        </select>
      </div>
    </div>


    <div data-role="fieldcontain">
      <label id="standing-label" for="standing">Was it difficult to stand or walk?:</label>
      <select name="report[stand]" id="standing" data-role="slider">
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
    </div>

  </div>

  <div class="question-set" data-role="collapsible" data-collapsed="true">
    <h3>If you were in a building, what happened?</h3>
    <div data-role="fieldcontain">
      <fieldset data-role="controlgroup" data-type="horizontal">
        <div role="heading">Were objects or fittings swinging?:</div>
        <input name="report[sway]" id="swing-choice-1" value="NO" type="radio"><label data-theme="c" for="swing-choice-1">None</label>
        <input name="report[sway]" id="swing-choice-2" value="SLIGHT" type="radio"><label data-theme="c" for="swing-choice-2">Slightly</label>
        <input name="report[sway]" id="swing-choice-3" value="VIOLENT" type="radio"><label data-theme="c" for="swing-choice-3">Violently</label>
      </fieldset>
    </div>


    <div data-role="fieldcontain">
      <fieldset data-role="controlgroup" data-type="horizontal">
        <div role="heading">Did you hear any noises?:</div>
        <input name="report[creak]" id="noise-choice-1" value="NO" type="radio"><label data-theme="c" for="noise-choice-1">None</label>
        <input name="report[creak]" id="noise-choice-2" value="SLIGHT" type="radio"><label data-theme="c" for="noise-choice-2">Slight</label>
        <input name="report[creak]" id="noise-choice-3" value="LOUD" type="radio"><label data-theme="c" for="noise-choice-3">Loud</label>
      </fieldset>
    </div>


    <div data-role="fieldcontain">
      <label for="object-shift">Did objects on shelves shift position?:</label>
      <div data-theme="c">
        <select name="report[shelf]" id="object-shift">
          <option value="NO">No</option>
          <option value="RATTLED_SLIGHTLY">Rattled slightly</option>
          <option value="RATTLED_LOUDLY">Rattled loudly</option>
          <option value="FEW_TOPPLED">A few objects toppled or fell off</option>
          <option value="MANY_FELL">Many objects fell off</option>
          <option value="MOST_FELL">Nearly everything fell off</option>
        </select>
      </div>
    </div>

    <div data-role="fieldcontain">
      <label for="pictures">Did pictures on wall move?:</label>
      <div data-theme="c">
        <select name="report[picture]" id="pictures">
          <option value="NO">No</option>
          <option value="NONE_FELL">Yes, but did not fall</option>
          <option value="SOME_FELL">Yes, and some fell</option>
        </select>
      </div>
    </div>


    <div data-role="fieldcontain">
      <label id="furniture-label" for="furniture">Did any furniture move or topple over?:</label>
      <select name="report[furniture]" id="furniture" data-role="slider">
        <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
    </div>

    <div data-role="fieldcontain">
      <label for="appliance">Was a heavy appliance affected?:</label>
      <div data-theme="c">
        <select name="report[heavy_appliance]" id="appliance">
          <option value="NO">No</option>
          <option value="SOME_CONTENTS_FELL">Some contents fell out</option>
          <option value="SHIFTED_CM">Shifted slightly</option>
          <option value="SHIFTED_M">Shifted greatly</option>
          <option value="OVERTURNED">Overturned</option>
        </select>
      </div>
    </div>

    <div data-role="fieldcontain">
      <label for="wall">Were free standing walls or fences damaged?:</label>
      <div data-theme="c">
        <select name="report[walls]" id="wall">
          <option value="NO">No</option>
          <option value="SOME_CRACKED">Some were cracked</option>
          <option value="PARTIAL_FALL">Some partially fell</option>
          <option value="COMPLETE_FALL">Some fell completely</option>
        </select>
      </div>
    </div>


    <div data-role="collapsible" data-collapsed="false">
      <h3>Was there any damage to the building?</h3>
      <fieldset data-role="controlgroup">
        <input name="report[damage]" id="building-1a" value="NONE" class="custom" type="checkbox"><label data-theme="c" for="building-1a">No damage</label>
        <input name="report[damage]" id="building-2a" value="HAIRLINE_CRACKS" class="custom" type="checkbox"><label data-theme="c" for="building-2a">Hairline cracks in walls</label>
        <input name="report[damage]" id="building-3a" value="SOME_LARGE_WALL_CRACKS" class="custom" type="checkbox"><label data-theme="c" for="building-3a">A few large cracks in walls</label>
        <input name="report[damage]" id="building-4a" value="MANY_LARGE_WALL_CRACKS" class="custom" type="checkbox"><label data-theme="c" for="building-4a">Many large cracks in walls</label>
        <input name="report[damage]" id="building-5a" value="TILES_FELL" class="custom" type="checkbox"><label data-theme="c" for="building-5a">Ceiling tiles or lighting fixtures fell</label>
        <input name="report[damage]" id="building-6a" value="CHIMNY_CRACKS" class="custom" type="checkbox"><label data-theme="c" for="building-6a">Cracks in chimney</label>
        <input name="report[damage]" id="building-7a" value="CRACKED_WINDOW" class="custom" type="checkbox"><label data-theme="c" for="building-7a">One or several cracked windows</label>
        <input name="report[damage]" id="building-8a" value="BROKEN_WINDOWS" class="custom" type="checkbox"><label data-theme="c" for="building-8a">Many windows cracked or broken out</label>
        <input name="report[damage]" id="building-9a" value="MASONRY_FELL" class="custom" type="checkbox"><label data-theme="c" for="building-9a">Masonry fell from block or brick walls</label>
        <input name="report[damage]" id="building-10a" value="OLD_CHIMNEY_FELL" class="custom" type="checkbox"><label data-theme="c" for="building-10a">Old chimney - major damage or fell down </label>
        <input name="report[damage]" id="building-11a" value="NEW_CHIMNEY_FELL" class="custom" type="checkbox"><label data-theme="c" for="building-11a">Modern chimney - major damage or fell down </label>
        <input name="report[damage]" id="building-12a" value="WALL_COLLAPSED" class="custom" type="checkbox"><label data-theme="c" for="building-12a">Outside walls tilted over or collapsed completely</label>
        <input name="report[damage]" id="building-13a" value="ADDITION_SEPERATED" class="custom" type="checkbox"><label data-theme="c" for="building-13a">Separation of porch, balcony or other addition from building</label>
        <input name="report[damage]" id="building-14a" value="BUILDING_MOVED" class="custom" type="checkbox"><label data-theme="c" for="building-14a">Building permenantly shifted over foundation</label>
      </fieldset>
    </div>

    <div data-role="collapsible" data-collapsed="false">
      <h3>Structure description</h3>
      <p>Please indicate the general type of structure you were in at the time of the earthquake and your approximate location withing the structure. (eg. wood, brick, etc... basement, penthouse, etc...)</p>

      <div data-role="fieldcontain">
        <label for="structure">Description:</label>
        <input name="report[building]" id="structure" value="" type="text">
      </div>
    </div>
  </div>

  <div class="question-set" data-role="collapsible" data-collapsed="true">
    <h3>Share your story</h3>
    <div data-role="fieldcontain">
      <label for="name">Name (doesn't have to be real):</label>
      <input name="report[reporter_name]" id="name" value="" type="text">
    </div>
    <div data-role="fieldcontain">
      <label for="textarea">Tell your story:</label>
      <textarea cols="40" rows="8" name="report[story]" id="textarea"></textarea>
    </div>

    <p>Your responses in this section will be available for public view.</p>
  </div>

  <fieldset class="ui-grid-a">
    <div data-theme="a"><button type="submit" data-theme="a">Submit</button></div>
  </fieldset>

</form>