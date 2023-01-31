<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
  table {
    border-collapse: collapse;
  }

  td {
    border: 1px solid black;
    width: 30px;
    height: 30px;
    text-align: center;
  }

  .empty {
    background: black;
  }

  .key {
    background-color: yellow;
  }
</style>

<div class="container align-items-center mb-3">


  <div class="row justify-content-center align-items-center mt-3">
    <div class="col-auto border border-dark rounded p-4">
      <h3 class="text-center mt-2">
        Round 4 - Crossword
      </h3>
      <p><b>Task:</b>
        Solve the given crossword to obtain the keyword.
        <br>
        Enter the keyword below and submit.
      </p>
    </div>
  </div>

  <div class="row my-3 justify-content-center">
    <div class="col-auto">
      <table id="crossword">
        <?php
        $arr = array(
          array(5, 9),
          array(6, 10),
          array(4, 10),
          array(0, 7),
          array(5, 10),
        );
        for ($j = 0; $j < 5; $j++) : ?>
          <tr>
            <?php for ($k = 0; $k < 11; $k++) : ?>
              <?php if ($k >= $arr[$j][0] && $k <= $arr[$j][1]) : ?>
                <td class="value <?= $k == 6 ? 'key' : '' ?>"></td>
              <?php else : ?>
                <td class="empty"></td>
              <?php endif ?>
            <?php endfor ?>
          </tr>
        <?php endfor ?>
      </table>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-auto" id="questions">
      <h5>Questions</h5>
      <div class="col mb-3">
        <label for="q1">1. Which word can be read the same upside down or rightside up?</label>
        <input type="text" id="q1" data-id=0>
      </div>
      <div class="col mb-3">
        <label for="q2">2. I am a solitary word, behead me once, I am the same, behead me again, I am still the same.</label>
        <input type="text" id="q2" data-id=1>
      </div>
      <div class="col mb-3">
        <label for="q3">3. The poor have me; the rich need me. Eat me and you will die. Who am I?</label>
        <input type="text" id="q3" data-id=2>
      </div>
      <div class="col mb-3">
        <label for="q4">4. What word contains all of the 26 letters?</label>
        <input type="text" id="q4" data-id=3>
      </div>
      <div class="col mb-3">
        <label for="q5">5. What colour can you eat?</label>
        <input type="text" id="q5" data-id=4>
      </div>
    </div>
  </div>

  <div class="row justify-content-center align-items-center mt-3">
    <div class="col-auto border border-dark rounded p-4">
      <?php if (isset($validation)) : ?>
        <div class="row">
          <div class="text-danger">
            <?= $validation->listErrors() ?>
          </div>
        </div>
      <?php endif ?>


      <form action="/user" method="post" id="keyForm" onsubmit="return submitForm()">
        <div class="row align-items-center">
          <div class="col">
            <div class="form-floating">
              <input name="key" type="text" class="form-control" id="key" placeholder="Answer">
              <label for="key">Keyword</label>
            </div>
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-dark">Submit</button>
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
const rows=document.getElementById('crossword').querySelectorAll('tr');
document.getElementById('questions').querySelectorAll('input').forEach((ele)=>{
ele.addEventListener('change',(ele)=>{
const value= ele.target.value.toUpperCase();
const id= ele.target.dataset.id;
const row=rows[id].querySelectorAll('.value');
for(i=0;i<row.length;i++)
{
  if(value[i]!=undefined)
  row[i].innerText=value[i];
}
//console.log(id)
})
})
</script>
<?= $this->endSection() ?>