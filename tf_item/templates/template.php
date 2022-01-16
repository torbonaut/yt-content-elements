<?php if($props['question_or_images'] == 0) { ?>
      <a class="uk-accordion-title" href="#"><?= $props['title'] ?></a>
      <div class="uk-accordion-content">
          <?php
            if(count($children)) {
              echo '<ul class="answers">';
              foreach ($children as $key => $answer) {
                $text = $answer->props['title'];
                $a = intval($answer->props['pointsA']);
                $b = intval($answer->props['pointsB']);
                $c = intval($answer->props['pointsC']);
                $d = intval($answer->props['pointsD']);
                $id = 'question_' . $props['key'] . '_answer_' . $key;
                $name = 'question_' . $props['key'];

                echo '<li><input type="radio" onclick="updateQuestion('.$props['key'].', '.$a.', '.$b.', '.$c.', '.$d.')" name="'.$name.'" id="'.$id.'" /><label for="'.$id.'">'.$text.'</label></li>';
              }
              echo '</ul>';
            } else {
              echo 'Keine Antwortmöglichkeiten vorhanden - Frage wurde nicht konfiguriert';
            }
          ?>
          <a uk-toggle="target: #item-info-<?= $props['key'] ?>" uk-icon="question"></a>
          <?php if($props['key'] == ($props['total'] - 1)) { ?>
              <button id="nextButton-<?= $props['key'] ?>" disabled class="uk-button uk-button-primary" onclick="result()">Ergebnis</button>
          <?php } else { ?>
              <button id="nextButton-<?= $props['key'] ?>" disabled class="uk-button uk-button-primary" onclick="nextQuestion(<?= $props['key'] ?>)">weiter</button>
          <?php } ?>
      </div>
<?php } else { ?>
      <a class="uk-accordion-title" href="#"><?= $props['title'] ?></a>
      <div class="uk-accordion-content">
        <?php
          if(count($children)) {
            echo '<ul class="answers images">';
            foreach ($children as $key => $answer) {
              $text = $answer->props['title'];
              $a = intval($answer->props['pointsA']);
              $b = intval($answer->props['pointsB']);
              $c = intval($answer->props['pointsC']);
              $d = intval($answer->props['pointsD']);
              $id = 'question_' . $props['key'] . '_answer_' . $key;
              $name = 'question_' . $props['key'];

              echo '<li><input type="radio" value="" onclick="updateQuestion('.$props['key'].', '.$a.', '.$b.', '.$c.', '.$d.')" name="'.$name.'" id="'.$id.'" /><label for="'.$id.'"><img src="'.$answer->props['image'].'" alt="'.$props['title'].'" /></label></li>';
            }
            echo '</ul>';
          } else {
            echo 'Keine Antwortmöglichkeiten vorhanden - Frage wurde nicht konfiguriert';
          }
          ?>
          <a uk-toggle="target: #item-info-<?= $props['key'] ?>" uk-icon="question"></a>
          <?php if($props['key'] == ($props['total'] - 1)) { ?>
              <button id="nextButton-<?= $props['key'] ?>" disabled class="uk-button uk-button-primary" onclick="result()">Ergebnis</button>
          <?php } else { ?>
              <button id="nextButton-<?= $props['key'] ?>" disabled class="uk-button uk-button-primary" onclick="nextQuestion(<?= $props['key'] ?>)">weiter</button>
          <?php } ?>
      </div>
<?php } ?>
