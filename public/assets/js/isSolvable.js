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
//er=[];
br=[];
setTimeout(()=>{
const divs=document.querySelectorAll('.puzzleDiv');
// console.log(divs)


function isSolvable(){
for(i=0;i<16;i++){
for(j=0;j<16;j++){
if(arr[j][0]==divs[i].style.left.replace('px','') && arr[j][1]==divs[i].style.top.replace('px',''))
{
  //er[i]=[j];
  br[j]=i+1;
}
}
}
// for(i=0;i<16;i++){
//   if(br[i]==undefined)
//   br[i]=1;
// }
//console.log(br);
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
//console.log(jr);

function  getInvCount(arr)
{
    N=4
     inv_count = 0;
    for (i = 0; i < (N*N - 1); i++)
    {
        for (j = i + 1; j < (N * N); j++)
        {
            // count pairs(arr[i], arr[j]) such that
              // i < j but arr[i] > arr[j]
                inv_count++;
        }
    }
    return inv_count;
}
// find Position of blank from bottom
function findXPosition(puzzle)
{
    N=4;
    // start from bottom-right corner of matrix
    for (i = N - 1; i >= 0; i--)
        for (j = N - 1; j >= 0; j--)
            if (puzzle[i][j] == 16)
                return N - i;
}

// This function returns true if given
// instance of N*N - 1 puzzle is solvable
function  checkSolvable( puzzle)
{
    N=4;
    // Count inversions in given puzzle
    invCount = getInvCount(puzzle);
 
    // If grid is odd, return true if inversion
    // count is even.
        pos = findXPosition(puzzle);
        if (pos & 1)
            return !(invCount & 1);
        else
            return invCount & 1;
}
if (!checkSolvable(jr))
{
  console.log("false");
  puzzle.shuffle();
  isSolvable();
}
//   //console.log(er)
//   console.log(br)
// count=0;
// for(i=0;i<15;i++)
// {
// for(j=0;j<er[i];j++)
// {
// if(br[j]>br[er[i]] && br[j]!=15)
// {
//   count++;
// }
// }

// }
// pos=[

// ]
// //console.log(count)
// count=count+Math.ceil((er[15][0]+1)/4);
// //console.log(count);
// if(count%2==0)
// {
// // puzzle.shuffle();
// // isSolvable();
// }
}
isSolvable();
},1)