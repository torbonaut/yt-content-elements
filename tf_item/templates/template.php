<?php if($props['question_or_images'] == 0) { ?>
      <a class="uk-accordion-title" href="#"><?= $props['title'] ?></a>
      <div class="uk-accordion-content">
          <?php
            $answers = explode(',', $props['content']);

            if(count($answers)) {
              echo '<ul class="answers">';
              foreach ($answers as $key => $answer) {
                $values = explode('|', $answer);
                $text = array_key_exists(0, $values) ? trim($values[0]) : 'Leer / Fehler';
                $a = array_key_exists(1, $values) ? intval($values[1]) : 0;
                $b = array_key_exists(2, $values) ? intval($values[2]) : 0;
                $c = array_key_exists(3, $values) ? intval($values[3]) : 0;
                $d = array_key_exists(4, $values) ? intval($values[4]) : 0;
                $id = 'question_' . $props['key'] . '_answer_' . $key;
                $name = 'question_' . $props['key'];

                echo '<li><input type="radio" onclick="updateQuestion('.$props['key'].', '.$props['weighting'].', '.$a.', '.$b.', '.$c.', '.$d.')" name="'.$name.'" id="'.$id.'" /><label for="'.$id.'">'.$text.'</label></li>';
              }
              echo '</ul>';
            } else {
              echo 'Keine Antwortmöglichkeiten vorhanden - Frage wurde nicht konfiguriert';
            }
          ?>
          <a uk-toggle="target: #item-info-<?= $props['key'] ?>" uk-icon="question"></a>
      </div>
<?php } else { ?>
      <a class="uk-accordion-title" href="#"><?= $props['title'] ?></a>
      <div class="uk-accordion-content">
        <?php
          $answers = explode(',', $props['content']);

          if(count($answers)) {
            echo '<ul class="answers images">';
            foreach ($answers as $key => $answer) {
              $values = explode('|', $answer);
              $text = array_key_exists(0, $values) ? trim($values[0]) : 'Leer / Fehler';
              $a = array_key_exists(1, $values) ? intval($values[1]) : 0;
              $b = array_key_exists(2, $values) ? intval($values[2]) : 0;
              $c = array_key_exists(3, $values) ? intval($values[3]) : 0;
              $d = array_key_exists(4, $values) ? intval($values[4]) : 0;
              $id = 'question_' . $props['key'] . '_answer_' . $key;
              $name = 'question_' . $props['key'];

              echo '<li><input type="radio" value="" onclick="updateQuestion('.$props['key'].', '.$props['weighting'].', '.$a.', '.$b.', '.$c.', '.$d.')" name="'.$name.'" id="'.$id.'" /><label for="'.$id.'"><img src="'.$props['image'.($key+1)].'" alt="'.$props['title'].'" /></label></li>';
            }
            echo '</ul>';
          } else {
            echo 'Keine Antwortmöglichkeiten vorhanden - Frage wurde nicht konfiguriert';
          }
          ?>
          <a uk-toggle="target: #item-info-<?= $props['key'] ?>" uk-icon="question"></a>
      </div>
<?php } ?>
