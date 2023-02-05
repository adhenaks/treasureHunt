<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container align-items-center mb-3">
  <div class="row mt-3 justify-content-center">
    <div class="col-6 border border-dark bg-light rounded bg-opacity-75">
      <h2 class="text-center mt-2 autumn">
        Round <span style="font-family: 'Times New Roman', Times, serif;">1</span> - Find the Word
      </h2>
      <p><b>Task:</b>
        Go to this <a href="https://unbounce.com/landing-page-articles/what-is-a-landing-page/" target="__blank">link</a> and find the word that corresponds to the clue given below.
        <br>
        Submit the word below to move to the next round.
        <br>
        <span>
          <b>Clue</b>: Rhymes with paper, related to money, also has something that we do on a computer.
            <br>
            <b>Hint</b>: The required word is styled different from normal text.
        </span>
      </p>
    </div>
  </div>


  <div class="row justify-content-center mt-3">
    <div class="col-auto border border-dark p-3 rounded bg-light bg-opacity-25">
    <?php if (isset($validation)) : ?>
        <div class="row">
          <div class="text-danger handwriting">
            <?= $validation->listErrors() ?>
          </div>
        </div>
      <?php endif ?>

      <form action="/user" method="post" id="keyForm" onsubmit="return submitForm()">
        <div class="row align-items-center">
        <div class="col ">
            <div class="form-floating position-relative">
              <img src="/assets/eye-slash.svg" class="key-eye">
              <input name="key" type="password" class="form-control bg-light bg-opacity-75" id="key" placeholder="Answer">
              <label for="key">Keyword</label>
            </div>
          </div>
          <div class="col-auto">
            <button type="submit" class=" animation-button autumn">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  function submitForm() {
    document.getElementById('key').value = document.getElementById('key').value.toLowerCase();
    return true;
  }

  document.querySelectorAll('.key').forEach((div) => {
    div.addEventListener('click', (e) => {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          alert(this.responseText.split('\n')[0]);
        }
      };
      xmlhttp.open("GET", "/key?q=" + e.target.dataset.value, true);
      xmlhttp.send();
      // document.getElementById()();
    })
  })
</script>
<?= $this->endSection() ?>