const arr = [
    [0,0],
    [112.5,0],
    [225,0],
    [337.5,0],
    [0,112.575],
    [112.5,112.575],
    [225,112.575],
    [337.5,112.575],
    [0,225.15],
    [112.5,225.15],
    [225,225.15],
    [337.5,225.15],
    [0,337.725],
    [112.5,337.725],
    [225,337.725],
    [337.5,337.725],
];
br=[];
setTimeout(()=>{
const divs=document.querySelectorAll('.puzzleDiv');

function isSolvable(){
for(i=0;i<16;i++){
for(j=0;j<16;j++){
if(arr[j][0]==divs[i].style.left.replace('px','') && arr[j][1]==divs[i].style.top.replace('px',''))
{
  br[j]=i+1;
}
}
}

jr=[
  [],
  [],
  [],
  []
];
for(i=0;i<16;i++)
{
 jr[Math.floor(i/4)][i%4]=br[i];
}


function  getInvCount(arr)
{
     inv_count = 0;
    for (i = 0; i < 16; i++)
    {
      if(arr[i]!=16)
        for (j = i+1; j < 16; j++)
        {
              if(arr[j]!=16 && arr[i]>arr[j])
                inv_count++;
        }
    }
    return inv_count;
  }
// find Position of blank from bottom
function findXPosition(puzzle)
{
    // start from bottom-right corner of matrix
    for (i = 0; i < 4; i++)
        for (j = 0; j < 4; j++)
            if (puzzle[i][j] == 16)
                return i;
}

// This function returns true if given
// instance of N*N - 1 puzzle is solvable
function  checkSolvable(jr,br)
{
    // Count inversions in given puzzle
    invCount = getInvCount(br);
 console.log(invCount);
    // If grid is odd, return true if inversion
    // count is even.
        pos = findXPosition(jr);
        console.log(pos);
        return((pos+invCount)%2==1)
}
if (!checkSolvable(jr,br))
{
  console.log("false");
  puzzle.shuffle();
  isSolvable();
}
else{
console.log("true");
}
}
isSolvable();
},1000)