<?php if($props['question_or_images'] == 0) { ?>
      <a class="uk-accordion-title" href="#"><?= $props['title'] ?></a>
      <div class="uk-accordion-content">
          <?php
            if(count($children)) {
              echo '<ul id="question_' . $props['key'].'" class="answers">';
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
            $points = intval($props['points']);
            echo '<p>';
            switch($points) {
                case 0: echo 'Fehler. Frage hat keine Punkteanzahl vergeben.'; break;
                case 1: echo 'Bitte wählen Sie genau 1 Bild aus.'; break;
                default: echo 'Bitte wählen Sie genau ' . $points . ' Bilder aus.'; break;
            }
            echo '</p>';

            echo '<div id="question_' . $props['key'].'" class="uk-grid-small image_answers uk-child-width-1-3" uk-grid>';
            foreach ($children as $key => $answer) {
              $text = $answer->props['title'];
              $a = intval($answer->props['pointsA']);
              $b = intval($answer->props['pointsB']);
              $c = intval($answer->props['pointsC']);
              $d = intval($answer->props['pointsD']);
              $id = 'question_' . $props['key'] . '_answer_' . $key;
              $name = 'question_' . $props['key'];
            ?>
              <div>
                  <label for="<?= $id ?>">
                      <img
                        data-typea="<?= $a ?>"
                        data-typeb="<?= $b ?>"
                        data-typec="<?= $c ?>"
                        data-typed="<?= $d ?>"
                        data-maxpoints="<?= $props['points'] ?>"
                        class="<?= $name ?>"
                        onclick="selectImage(<?= $props['key'] ?>, <?= $key ?>, <?= $props['points'] ?>)"
                        id="<?= $id ?>"
                        src="<?= $answer->props['image'] ?>"
                        alt="<?= $props['title'] ?>"
                      />
                  </label>
              </div>
            <?php
            }
            echo '</div>';
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
