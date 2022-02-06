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
                <div class="uk-width-2-3">
                    <!-- tf questions intro -->
                    <h3><?= $props['introduction_questions_title'] ?></h3>
                    <div><?= $props['introduction_questions_text'] ?></div>
                    <!-- tf questions -->
                    <ul uk-accordion id="questions">
                        <?php foreach ($children as $key => $child) : ?>
                        <?php
                            $child->props['key'] = $key;
                            $child->props['total'] = count($children);
                        ?>
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
                <div class="uk-width-1-3">
                    <!-- tf type a -->
                    <div uk-sticky>
                    <div class="uk-card uk-margin-small-bottom">
                        <div class="uk-card-media-top">
                            <div class="uk-inline">
                                <img src="<?= $props['type_a_image'] ?>" alt="<?= $props['type_a_title'] ?>">
                                <div class="uk-overlay uk-light uk-position-bottom">
                                    <h5><?= $props['type_a_title'] ?> <a uk-toggle="target: #type-info-a" uk-icon="question"></a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-badge uk-label"><span id="percentage_a">0</span>%</div>
                    </div>
                    <!-- tf type b -->
                    <div class="uk-card uk-margin-small-bottom">
                        <div class="uk-card-media-top">
                            <div class="uk-inline">
                                <img src="<?= $props['type_b_image'] ?>" alt="<?= $props['type_b_title'] ?>">
                                <div class="uk-overlay uk-light uk-position-bottom">
                                    <h5><?= $props['type_b_title'] ?> <a uk-toggle="target: #type-info-b" uk-icon="question"></a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-badge uk-label"><span id="percentage_b">0</span>%</div>
                    </div>

                    <?php if($props['types_count'] > 2) { ?>
                    <!-- tf type c -->
                    <div class="uk-card uk-margin-small-bottom">
                        <div class="uk-card-media-top">
                            <div class="uk-inline">
                                <img src="<?= $props['type_c_image'] ?>" alt="<?= $props['type_c_title'] ?>">
                                <div class="uk-overlay uk-light uk-position-bottom">
                                    <h5><?= $props['type_c_title'] ?> <a uk-toggle="target: #type-info-c" uk-icon="question"></a></h5>
                                </div>
                            </div>
                        </div>
                        <div class="uk-card-badge uk-label"><span id="percentage_c">0</span>%</div>
                    </div>
                    <?php } ?>

                    <?php if($props['types_count'] > 3) { ?>
                    <!-- tf type d -->
                    <div class="uk-card">
                        <div class="uk-card-media-top">
                            <div class="uk-inline">
                                <img src="<?= $props['type_d_image'] ?>" alt="<?= $props['type_d_title'] ?>">
                                <div class="uk-overlay uk-light uk-position-bottom">
                                    <h5><?= $props['type_d_title'] ?> <a uk-toggle="target: #type-info-d" uk-icon="question"></a></h5>
                                </div>
                        </div>
                        <div class="uk-card-badge uk-label"><span id="percentage_d">0</span>%</div>
                    </div>
                    <?php } ?>
                    </div>
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

  function updateQuestion(question = 0, a = 0, b = 0, c = 0, d = 0) {
      questions.set(question, [a, b, c, d]);
      calculate();
      render();

    button = document.getElementById('nextButton-' + question );

    if(questionsCount == (question+1)) {
        if(questions.size == questionsCount) {
            button.disabled = false;
        }
    } else {
        button.disabled = false;
    }
  }

  function calculate() {
    typeA = 0;
    typeB = 0;
    typeC = 0;
    typeD = 0;
    questions.forEach((item, i) => {
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

  function nextQuestion(i) {
      var element = document.getElementById('questions');
        UIkit.accordion(element).toggle(i+1, true);
  }

  function selectImage(question, answer, maxPoints) {
      var selectedImages = Array.from(document.getElementsByClassName('selected question_' + question));

      // select current clicked image if < maxPoints or remove selection if it was already selected
      var image = document.getElementById('question_' + question + '_answer_' + answer);
      if(image.classList.contains('selected')) {
          image.classList.remove('selected');
      } else if(selectedImages.length < maxPoints) {
        image.classList.add('selected');
      }

      // count type points and update percentages
      selectedImages = Array.from(document.getElementsByClassName('selected question_' + question));
      var a = 0, b = 0, c = 0, d = 0;
      selectedImages.forEach((item, i) => {
          if(parseInt(item.dataset.typea) > 0) { a++; }
          if(parseInt(item.dataset.typeb) > 0) { b++; }
          if(parseInt(item.dataset.typec) > 0) { c++; }
          if(parseInt(item.dataset.typed) > 0) { d++; }
      });

      updateQuestion(question, a, b, c, d);
  }

  function result() {
      var linkTypeA = '<?= $props['type_a_result_link'] ?>';
      var linkTypeB = '<?= $props['type_b_result_link'] ?>';
      var linkTypeC = '<?= $props['type_c_result_link'] ?>';
      var linkTypeD = '<?= $props['type_d_result_link'] ?>';

      var url_params = '&a=' + typeA + '&b=' + typeB + '&c=' + typeC + '&d=' + typeD + '&total=' + totalPoints + '&types=' + typesCount;

      var max = Math.max(typeA, typeB, typeC, typeD);
      switch(max) {
          case typeA: window.location.href = linkTypeA + url_params; break;
          case typeB: window.location.href = linkTypeB + url_params; break;
          case typeC: window.location.href = linkTypeC + url_params; break;
          case typeD: window.location.href = linkTypeD + url_params; break;
      }
  }

</script>
