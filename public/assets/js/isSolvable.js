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
    [0,2337.725],
    [112.5,337.725],
    [225,337.725],
    [337.5,337.725],
];
er=[];
br=[];
setTimeout(()=>{
const divs=document.querySelectorAll('.puzzleDiv');
// console.log(divs)
function isSolvable(){
for(i=0;i<16;i++){
for(j=0;j<16;j++){
if(arr[j][0]==divs[i].style.left.replace('px','') && arr[j][1]==divs[i].style.top.replace('px',''))
{
  er[i]=[j];
  br[j]=[i];
}
}
}
//  console.log(er)
//  console.log(br)
count=0;
for(i=0;i<15;i++)
{
for(j=0;j<er[i];j++)
{
if(br[j]>br[er[i]] && br[j]!=15)
{
  count++;
}
}

}
pos=[

]
//console.log(count)
count=count+Math.ceil((er[15][0]+1)/4);
console.log(count);
if(count%2==0)
{
puzzle.shuffle();
isSolvable();
}
}
isSolvable();
},1)