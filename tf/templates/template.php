<div id="tf">
<ul class="uk-subnav uk-subnav-divider" uk-switcher="animation: uk-animation-fade">
    <li><a href="#"><span uk-icon="info"></span> Einleitung</a></li>
    <li><a href="#"><span uk-icon="comments"></span> Fragen</a></li>
</ul>


<ul class="uk-switcher">
  <li>
    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
    <div class="uk-card-media-left uk-cover-container">
        <img src="<?= $props['introduction_image'] ?>" alt="" uk-cover>
    </div>
    <div>
        <div class="uk-card-body">
            <h3   class="uk-card-title"><?= $props['introduction_title'] ?></h3>
            <?= $props['introduction_description'] ?>
            <button class="uk-button uk-button-primary" uk-switcher-item="1"><?= $props['introduction_button_caption'] ?></button>
        </div>
    </div>
  </li>
  <li>
    <div uk-grid>
      <div class="uk-width-1-2">
        <h3><?= $props['introduction_questions_title'] ?></h3>
        <div><?= $props['introduction_questions_text'] ?></div>
        <ul uk-accordion>
          <?php foreach ($children as $key => $child) : ?>
          <?php $child->props['key'] = $key; ?>
          <li<?php if($key == 0) { echo ' class="uk-open"';} ?>><?= $builder->render($child, ['element' => $props]) ?></li>
          <?php endforeach ?>
        </ul>
        <?php foreach ($children as $key => $child) : ?>
          <div id="item-info-<?= $key ?>" class="uk-flex-top" uk-modal>
              <div class="uk-modal-dialog uk-margin-auto-vertical uk-modal-body">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title"><?= $child->props['title'] ?></h3>
                </div>
                <div class="uk-modal-body"><?= $child->props['meta'] ?></div>
              </div>
          </div>
        <?php endforeach ?>
      </div>
      <div class="uk-width-1-2 uk-grid-divider uk-grid-column-small" uk-grid>
        <div class="uk-card uk-width-1-2">
            <div class="uk-card-media-top">
                <img src="<?= $props['type_a_image'] ?>" alt="<?= $props['type_a_title'] ?>">
            </div>
            <div class="uk-card-body">
              <h5><?= $props['type_a_title'] ?> <a uk-toggle="target: #type-info-a" uk-icon="question"></a></h5>
                <div class="uk-card-badge uk-label"><span id="percentage_a">0</span>%</div>
            </div>
        </div>
        <div class="uk-card uk-width-1-2">
            <div class="uk-card-media-top">
                <img src="<?= $props['type_b_image'] ?>" alt="<?= $props['type_b_title'] ?>">
            </div>
            <div class="uk-card-body">
                <h5><?= $props['type_b_title'] ?> <a uk-toggle="target: #type-info-b" uk-icon="question"></a></h5>
                <div class="uk-card-badge uk-label"><span id="percentage_b">0</span>%</div>
            </div>
        </div>
      </div>
    </div>
  </li>
</ul>
<div id="type-info-a" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical uk-modal-body">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <div class="uk-modal-header">
          <h3 class="uk-modal-title"><?= $props['type_a_title'] ?></h3>
      </div>
      <div class="uk-modal-body">
            <?= $props['type_a_description'] ?>
      </div>
    </div>
</div>
<div id="type-info-b" class="uk-flex-top" uk-modal>
    <div class="uk-modal-dialog uk-margin-auto-vertical uk-modal-body">
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <div class="uk-modal-header">
          <h3 class="uk-modal-title"><?= $props['type_b_title'] ?></h3>
      </div>
      <div class="uk-modal-body">
            <?= $props['type_b_description'] ?>
      </div>
    </div>
</div>
</div>
<?php
  $totalWeighting = 0;
  foreach ($children as $key => $child) {
    $totalWeighting += $child->props['weighting'];
  }
 ?>
<script type="text/javascript">
  var questionsCount = <?= count($children)?>;
  var questions = new Map();
  var totalWeighting = <?= $totalWeighting ?>;
  var types_count = <?= $props['types_count']; ?>;
  var typeA = 0;
  var typeB = 0;
  var typeC = 0;
  var typeD = 0;

  function updateQuestion(question = 0, weighting = 1, a = 0, b = 0, c = 0, d = 0) {
    questions.set(question, [weighting, a, b, c, d]);
    calculate();
    render();
  }

  function calculate() {
    typeA = 0;
    typeB = 0;
    typeC = 0;
    typeD = 0;
    questions.forEach((item, i) => {
      console.log(item);
      toCount = 0;
      if(item[1] != 0) { toCount++; }
      if(item[2] != 0) { toCount++; }
      if(item[3] != 0) { toCount++; }
      if(item[4] != 0) { toCount++; }

      if(item[1] != 0) { typeA = typeA + item[0] / toCount; }
      if(item[2] != 0) { typeB = typeB + item[0] / toCount; }
      if(item[3] != 0) { typeC = typeC + item[0] / toCount; }
      if(item[4] != 0) { typeD = typeD + item[0] / toCount; }

    });

  }

  function render() {
    pA = Math.round(typeA*100/totalWeighting);
    pB = Math.round(typeB*100/totalWeighting);

    document.getElementById('percentage_a').textContent = pA;
    document.getElementById('percentage_b').textContent = pB;

  }

</script>
