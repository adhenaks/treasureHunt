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
    <div class="col-auto border border-dark rounded p-4 bg-light bg-opacity-75">
      <h2 class="text-center mt-2 autumn">
        Round <span style="font-family: 'Times New Roman', Times, serif;">3</span> - Crossword
      </h2>
      <p><b>Task:</b>
        Solve the given crossword to obtain the keyword.
        <br>
        The word in yellow is you keyword.
        <br>
        Enter the keyword below and submit.
      </p>
    </div>
  </div>

  <div class="row my-3 justify-content-center">
    <div class="col-auto bg-light bg-opacity-75 m-0 p-0 handwriting">
      <table id="crossword">
        <?php
        $arr = array(
          array(5, 9),
          array(6, 10),
          array(4, 10),
          array(0, 7),
          array(5, 10),
        );
        $vals=[
          [[5,'S'],[7,'I']],
          [[8,'O']],
          [[10,'G']],
        ];
        for ($j = 0; $j < 5; $j++) : ?>
          <tr>
            <?php for ($k = 0; $k < 11; $k++) : ?>
              <?php if ($k >= $arr[$j][0] && $k <= $arr[$j][1]) : ?>
                <td class="value <?= $k == 6 ? 'key' : '' ?> <?php
                  if($j<3) 
                  foreach($vals[$j] as $val)
                  {
                    if($k==$val[0])
                    echo " filled";
                  }
                  ?>">
                <?php
                  if($j<3) 
                  foreach($vals[$j] as $val)
                  {
                    if($k==$val[0])
                    echo $val[1];
                  }
                  ?>
              </td>
              <?php else : ?>
                <td class="empty">
                </td>
              <?php endif ?>
            <?php endfor ?>
          </tr>
        <?php endfor ?>
      </table>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-10 border rounded border-dark bg-light bg-opacity-75 p-3" id="questions">
      <h2 class="autumn">Questions</h2>
      <div class="col mb-3">
        <label class="handwriting" for="q1" style="font-size:20px">1. Which word can be read the same when kept upside down?</label>
        <input class="rounded border border-dark bg-light bg-opacity-75" type="text" id="q1" data-id=0>
      </div>
      <div class="col mb-3">
        <label class="handwriting" for="q2" style="font-size:20px">2. I am a solitary word, behead me once, I am the same, behead me again, I am still the same.</label>
        <input class="rounded border border-dark bg-light bg-opacity-75" type="text" id="q2" data-id=1>
      </div>
      <div class="col mb-3">
        <label class="handwriting" for="q3" style="font-size:20px">3. The poor have me; the rich need me. Eat me and you will die. Who am I?</label>
        <input class="rounded border border-dark bg-light bg-opacity-75" type="text" id="q3" data-id=2>
      </div>
      <div class="col mb-3">
        <label class="handwriting" for="q4" style="font-size:20px">4. What word contains all of the 26 letters?</label>
        <input class="rounded border border-dark bg-light bg-opacity-75" type="text" id="q4" data-id=3>
      </div>
      <div class="col mb-3">
        <label class="handwriting" for="q5" style="font-size:20px">5. What colour can you eat?</label>
        <input class="rounded border border-dark bg-light bg-opacity-75" type="text" id="q5" data-id=4>
      </div>
    </div>
  </div>

  <div class="row justify-content-center align-items-center mt-3">
    <div class="col-auto border border-dark rounded p-4 bg-light bg-opacity-25">
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
              <input name="key" type="password" class="form-control bg-light bg-opacity-75" id="key" placeholder="Answer">
              <label for="key">Keyword</label>
            </div>
          </div>
          <div class="col-auto">
            <button type="submit" class="animation-button">Submit</button>
          </div>
        </div>
      </form>


    </div>
  </div>
</div>

<script>
  function submitForm() {
    document.getElementById('key').value = document.getElementById('key').value.toLowerCase();
    // console.log(document.getElementById('key').value);
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
        if(value[i]!=undefined && value[i]!=null)
        {if(!(row[i].classList.contains('filled')))
        row[i].innerText=value[i];
        }
        else
        {
          if(!(row[i].classList.contains('filled')))
          row[i].innerText='';
        }
      }
      //console.log(id)
    })
  })

</script>
<?= $this->endSection() ?>