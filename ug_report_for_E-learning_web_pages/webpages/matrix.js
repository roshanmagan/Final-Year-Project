window.onload = function(){
  var button = document.getElementById('mButton');
  // button.addEventListener("click", createFeild_C);
  button.addEventListener("click", mCalculation);
}
var row = parseInt(document.getElementById('rowSize').value);
var column = parseInt(document.getElementById('colSize').value);
var count = 0;
var inc = 0;
const arrCID = ["rR1C1","rR1C2","rR1C3","rR2C1","rR2C2","rR2C3","rR3C1","rR3C2","rR3C3","rR4C1","rR4C2","rR4C3","rR5C1","rR5C2","rR5C3","rR6C1","rR6C2","rR6C3"];
function increament(){
  count+=1;
}

function counts (){
  inc +=1;
}

function mCalculation(){
  const arrID = ["aR1C1","aR1C2","aR1C3","aR2C1","aR2C2","aR2C3","aR3C1","aR3C2","aR3C3","bR1C1","bR1C2","bR1C3","bR2C1","bR2C2","bR2C3","bR3C1","bR3C2","bR3C3"];
  let arrCells = [];
// createFeild_C();
  for(let i = 0;i < arrID.length;i++){
    arrCells[i] = document.getElementById(arrID[i]).value;
    console.log(arrCells[i]);
    console.log(arrID.length);

  }
      var A = $M([
                  [+arrCells[0],+arrCells[1],+arrCells[2]],
                  [+arrCells[3],+arrCells[4],+arrCells[5]],
                  [+arrCells[6],+arrCells[7],+arrCells[8]]
                  ]);
      var B = $M([
                  [+arrCells[9],+arrCells[10],+arrCells[11]],
                  [+arrCells[12],+arrCells[13],+arrCells[14]],
                  [+arrCells[15],+arrCells[16],+arrCells[17]]
                  ]);


      var res = A.x(B);
      if(document.getElementById('times').checked == true){
          res = A.x(B);
      }else if(document.getElementById('plus').checked == true){
        res = A.add(B);
        console.log(typeof A.e(1,1));
      }else if (document.getElementById('minus').checked == true){
        res = A.subtract(B);
      }else{
        console.log("select the given option");
      }
      for(i = 1;i < row+1; i++){
        for(j = 1;j < column+1; j++){
          counts();
          console.log("counts: " + inc);
        arrCID[inc] =  document.getElementById("rR"+i+"C"+j).value = res.e(i,j);
        console.log("C array content"+ arrCID[inc]);
        }
      }
      // document.getElementById('rR1C1').value = res.e(1,1);
      // document.getElementById('rR1C2').value = res.e(1,2);
      // document.getElementById('rR1C3').value = res.e(1,3);
      // document.getElementById('rR2C1').value = res.e(2,1);
      // document.getElementById('rR2C2').value = res.e(2,2);
      // document.getElementById('rR2C3').value = res.e(2,3);
      // document.getElementById('rR3C1').value = res.e(3,1);
      // document.getElementById('rR3C2').value = res.e(3,2);
      // document.getElementById('rR3C3').value = res.e(3,3);
}

function createFeild(){
  if((document.getElementById('Matrix_a').children.length == 0)){

  row = parseInt(document.getElementById('rowSize').value);
  column = parseInt(document.getElementById('colSize').value);
  for(i = 1;i < row+1; i++){
    for(j = 1;j < column+1; j++){
      //creating field for matrices A
      const matrixA = document.createElement("INPUT");
      matrixA.setAttribute("type","text");
      increament();
      matrixA.setAttribute("value",count);
      matrixA.setAttribute("id","aR"+i+"C"+j);
      matrixA.setAttribute("class", "inputA");
      document.getElementById('Matrix_a').appendChild(matrixA);
      console.log("checking");
      if(j == sizeCheck){
        var br = document.createElement('br');
        var divAID = document.getElementById('Matrix_a');
        br.setAttribute("class","brIDA");
        divAID.appendChild(br);
      }

      //creating field for matrices B
      const matrixB = document.createElement("INPUT");
      matrixB.setAttribute("type","text");
      matrixB.setAttribute("value",count);
      matrixB.setAttribute("id","bR"+i+"C"+j);
      matrixB.setAttribute("class", "inputB");
      document.getElementById('Matrix_b').appendChild(matrixB);

      var sizeCheck = parseInt(row);
      console.log(j);
      console.log(sizeCheck);
      if(j == sizeCheck){
          console.log("inside: "+j);
          var br = document.createElement('br');
          var divBID = document.getElementById('Matrix_b');
          br.setAttribute("class","brIDB");
           divBID.appendChild(br);
        console.log("its working");
      }

      //creating field for matrices C
      const matrixC = document.createElement("INPUT");
      matrixC.setAttribute("type","text");
      counts();
      matrixC.setAttribute("value",arrCID[inc]);
      matrixC.setAttribute("id","rR"+i+"C"+j);
      matrixC.setAttribute("class", "inputC");
      document.getElementById('Matrix_c').appendChild(matrixC);
      console.log("checking: "+count);
      if(j == sizeCheck){
        var br = document.createElement('br');
        var divCID = document.getElementById('Matrix_c');
        br.setAttribute("class","brIDC");
        divCID.appendChild(br);
      }

       var sizeCheck = parseInt(row);
      // console.log(j);
      // console.log(sizeCheck);
      // if(j == sizeCheck){
      //     console.log("inside: "+j);
      //     var br = document.createElement('br');
      //     var divCID = document.getElementById('Matrix_c');
      //     br.setAttribute("class","brID");
      //      divCID.appendChild(br);
      //   console.log("its working");
      // }
    }
  }
}else if (!(document.getElementById('Matrix_a').children.length == 0)){
  let inputFeild_A = document.querySelectorAll(".inputA");
  let brA = document.querySelectorAll(".brIDA");
  let inputFeild_B = document.querySelectorAll(".inputB");
  let brB = document.querySelectorAll(".brIDB");
  let inputFeild_C = document.querySelectorAll(".inputC");
  let brC = document.querySelectorAll(".brIDA");
clearFeild(inputFeild_A,brA);
clearFeild(inputFeild_B,brB);
clearFeild(inputFeild_C,brC);
}

}

function clearFeild(inputFeild,brElement){

  inputFeild.forEach(function(item){
    item.remove();
  });
  brElement.forEach(function(item){
    item.remove();
  });


  console.log(document.getElementById('Matrix_a').children.length);
}
