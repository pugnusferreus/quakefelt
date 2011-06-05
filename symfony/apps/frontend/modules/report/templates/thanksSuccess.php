   <!-- Start of second page -->
   <div data-role="page" id="bar">

  <div data-role="header" data-backbtn="false">

    <h1>QuakeFelt</h1>
  </div><!-- /header -->
  <div class="brownBar">
    <div class="richter">4.4</div>
    <div class="event">
      <span class="locn">Dandenong</span>
      <span class="detail">1.4 km away, 1:33 h ago, 12 reports</span>
    </div>
    <a href="#" class="home-button">home</a>
  </div>

  <div data-role="content">

  <div class="k-thanks">

    Thank You!
    <p>Your experience helps us with evaluating this earthquake. Here's what you reported:</p>

  </div><!-- END .k-thanks -->

  <div class="k-report k-myown">

    <div class="reporter">

      <div class="name">

        <span class="mmi4">IV</span>
        <strong>Michelle</strong>
        <p>1.5 km, 12:33pm 12.04.2011</p>
      </div><!-- END .name -->

      <div class="story">

        <img src="/images/bubble.png" />

        <p>On <strong>Monday</strong> I <strong>felt/was woken by/slept through (asleep)</strong> a quake while <strong>inside/outside (physical situation)</strong>. In <strong>Melbourne</strong> at <strong>20 (distance to epicentre)</strong> km from the epicentre. The shaking was <strong>violent (strength)</strong> and I felt <strong>frightened (emotions)</strong>. I <strong>hid under a table (action)</strong> during the <strong>30 seconds (time)</strong> of shaking.</p>
         <p><strong>Personal notes:</strong> This is a little story I can add to my report. Maxium of x characters would be good.</p>

      </div><!-- END .story -->

    </div><!-- END .reporter -->

  </div><!-- END .k-report -->

  <div id="button-row">
      <div id="toggleView">
        <a href="<?php echo url_for('quake/map?id=3052276') ?>" class="c-button grey ui-corner-all">Back to Map</a>
      </div>
  </div>

    </div><!-- /content -->
   </div><!-- /page -->