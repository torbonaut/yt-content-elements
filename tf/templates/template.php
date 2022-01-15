<!-- tf cointainer -->
<div id="tf">
    <!-- tf top navigation -->
    <ul class="uk-subnav uk-subnav-divider" uk-switcher="animation: uk-animation-fade">
        <li><a href="#"><span uk-icon="info"></span> Einleitung</a></li>
        <li><a href="#"><span uk-icon="comments"></span> Fragen</a></li>
    </ul>

    <!-- tf switcher -->
    <ul class="uk-switcher">
        <!-- tf intro page -->
        <li>
            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
                <div class="uk-card-media-left uk-cover-container">
                    <img src="<?= $props['introduction_image'] ?>" alt="" uk-cover>
                </div>
                <div>
                    <div class="uk-card-body">
                        <h3 class="uk-card-title"><?= $props['introduction_title'] ?></h3>
                        <?= $props['introduction_description'] ?>
                        <button class="uk-button uk-button-primary" uk-switcher-item="1"><?= $props['introduction_button_caption'] ?></button>
                    </div>
                </div>
            </div>
        </li>
        <!-- tf questions -->
        <li>
            <div uk-grid>
                <div class="uk-width-2-5">
                    <!-- tf questions intro -->
                    <h3><?= $props['introduction_questions_title'] ?></h3>
                    <div><?= $props['introduction_questions_text'] ?></div>
                    <!-- tf questions -->
                    <ul uk-accordion>
                        <?php foreach ($children as $key => $child) : ?>
                        <?php $child->props['key'] = $key; ?>
                        <li<?php if($key == 0) { echo ' class="uk-open"';} ?>><?= $builder->render($child, ['element' => $props]) ?></li>
                        <?php endforeach ?>
                    </ul>

                    <!-- tf questions info popups -->
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

                <!-- tf types -->
                <div class="uk-width-3-5 uk-grid-divider uk-grid-column-small" uk-grid>
                    <!-- tf type a -->
                    <div class="uk-card uk-width-1-<?= $props['types_count'] ?>">
                        <div class="uk-card-media-top">
                            <img src="<?= $props['type_a_image'] ?>" alt="<?= $props['type_a_title'] ?>">
                        </div>
                        <div class="uk-card-body">
                            <h5><?= $props['type_a_title'] ?> <a uk-toggle="target: #type-info-a" uk-icon="question"></a></h5>
                            <div class="uk-card-badge uk-label"><span id="percentage_a">0</span>%</div>
                        </div>
                    </div>
                    <!-- tf type b -->
                    <div class="uk-card uk-width-1-<?= $props['types_count'] ?>">
                        <div class="uk-card-media-top">
                            <img src="<?= $props['type_b_image'] ?>" alt="<?= $props['type_b_title'] ?>">
                        </div>
                        <div class="uk-card-body">
                            <h5><?= $props['type_b_title'] ?> <a uk-toggle="target: #type-info-b" uk-icon="question"></a></h5>
                            <div class="uk-card-badge uk-label"><span id="percentage_b">0</span>%</div>
                        </div>
                    </div>

                    <?php if($props['types_count'] > 2) { ?>
                    <!-- tf type c -->
                    <div class="uk-card uk-width-1-<?= $props['types_count'] ?>">
                        <div class="uk-card-media-top">
                            <img src="<?= $props['type_c_image'] ?>" alt="<?= $props['type_c_title'] ?>">
                        </div>
                        <div class="uk-card-body">
                            <h5><?= $props['type_c_title'] ?> <a uk-toggle="target: #type-info-c" uk-icon="question"></a></h5>
                            <div class="uk-card-badge uk-label"><span id="percentage_c">0</span>%</div>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if($props['types_count'] > 3) { ?>
                    <!-- tf type d -->
                    <div class="uk-card uk-width-1-<?= $props['types_count'] ?>">
                        <div class="uk-card-media-top">
                            <img src="<?= $props['type_d_image'] ?>" alt="<?= $props['type_d_title'] ?>">
                        </div>
                        <div class="uk-card-body">
                            <h5><?= $props['type_d_title'] ?> <a uk-toggle="target: #type-info-d" uk-icon="question"></a></h5>
                            <div class="uk-card-badge uk-label"><span id="percentage_d">0</span>%</div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </li>
    </ul>

    <!-- tf types info popups -->

    <!-- tf type a info popup -->
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

    <!-- tf type b info popup -->
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

    <?php if($props['types_count'] > 2) { ?>
    <!-- tf type c info popup -->
    <div id="type-info-c" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-margin-auto-vertical uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h3 class="uk-modal-title"><?= $props['type_c_title'] ?></h3>
            </div>
            <div class="uk-modal-body">
                <?= $props['type_c_description'] ?>
            </div>
        </div>
    </div>
    <?php } ?>

    <?php if($props['types_count'] > 3) { ?>
    <!-- tf type d info popup -->
    <div id="type-info-d" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-margin-auto-vertical uk-modal-body">
            <button class="uk-modal-close-default" type="button" uk-close></button>
            <div class="uk-modal-header">
                <h3 class="uk-modal-title"><?= $props['type_d_title'] ?></h3>
            </div>
            <div class="uk-modal-body">
                <?= $props['type_d_description'] ?>
            </div>
        </div>
    </div>
    <?php } ?>

<!-- container div end -->
</div>


<?php
  $totalPoints = 0;
  foreach ($children as $key => $child) {
    $totalPoints += $child->props['points'];
  }
 ?>
<script type="text/javascript">
  var questionsCount = <?= count($children)?>;
  var questions = new Map();
  var totalPoints = <?= $totalPoints ?>;
  var typesCount = <?= $props['types_count']; ?>;
  var typeA = 0;
  var typeB = 0;
  var typeC = 0;
  var typeD = 0;

  // console.log('question count', questionsCount);
  // console.log('totalPoints', totalPoints);
  // console.log('typesCount', typesCount);

  function updateQuestion(question = 0, a = 0, b = 0, c = 0, d = 0) {
    questions.set(question, [a, b, c, d]);
    calculate();
    render();
  }

  function calculate() {
    typeA = 0;
    typeB = 0;
    typeC = 0;
    typeD = 0;
    questions.forEach((item, i) => {
        //console.log('item', item);
        if(item[0] != 0) { typeA = typeA + item[0]; }
        if(item[1] != 0) { typeB = typeB + item[1]; }
        if(item[2] != 0) { typeC = typeC + item[2]; }
        if(item[3] != 0) { typeD = typeD + item[3]; }
    });
  }

  function render() {
    pA = Math.round(typeA*100/totalPoints);
    document.getElementById('percentage_a').textContent = pA;

    pB = Math.round(typeB*100/totalPoints);
    document.getElementById('percentage_b').textContent = pB;

    if(typesCount > 2) {
        pC = Math.round(typeC*100/totalPoints);
        document.getElementById('percentage_c').textContent = pC;
    }

    if(typesCount > 3) {
        pD = Math.round(typeD*100/totalPoints);
        document.getElementById('percentage_d').textContent = pD;
    }
  }

</script>
