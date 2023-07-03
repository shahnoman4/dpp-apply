	  </div><!-- card -->
	  
	  <footer class="my-5 text-muted text-center text-small">
        <p class="mb-1">&copy; <?= date("Y"); ?> <?= $this->lang->line('dpp'); ?></p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="https://dpp.org/privacy-policy"><?= $this->lang->line('privacy'); ?></a></li>
          <!-- <li class="list-inline-item"><a href="#"><?= $this->lang->line('terms'); ?></a></li> -->
        </ul>

        <div>
          <label class="btn language-button">
            <input type="radio" name="language" value="english" id="english" autocomplete="off" <?php if($this->session->userdata('language') == 'english') echo 'checked="checked"'; ?>> English
          </label>
          <label class="btn language-button">
            <input type="radio" name="language" value="spanish" id="spanish" autocomplete="off" <?php if($this->session->userdata('language') == 'spanish') echo 'checked="checked"'; ?>> Espa&nacute;ol
          </label>
        </div>


      </footer>
    </div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  <script>
    $(document).ready(function(){
        $(".language-button").click(function(){
            var language = $(this).find("input[name='language']").val();
            window.location.href='<?= base_url(); ?>LanguageSwitcher/switchLang/'+language+'?redirect=<?= urlencode(current_url()) ?>';
        });
        $(".chosen-select").chosen({
          enable_split_word_search: false
        }); 
    });
  </script>
  </body>
</html>
