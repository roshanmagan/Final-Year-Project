window.onload = function(){
  var button = document.getElementById('mButton');
  button.addEventListener("click", mCalculation);
}

var row = parseInt(document.getElementById('rowSize').value);
var column = parseInt(document.getElementById('colSize').value);
var count = 0;
var inc = 0;

function increament(){
  count+=1;
}


function mCalculation(){
  let arrIDA = [["aR1C1","aR1C2","aR1C3","aR1C4","aR1C5","aR1C6"],
                ["aR2C1","aR2C2","aR2C3","aR2C4","aR2C5","aR2C6"],
                ["aR3C1","aR3C2","aR3C3","aR3C4","aR3C5","aR3C6"],
                ["aR4C1","aR4C2","aR4C3","aR4C4","aR4C5","aR4C6"],
                ["aR5C1","aR5C2","aR5C3","aR5C4","aR5C5","aR5C6"],
                ["aR6C1","aR6C2","aR6C3","aR6C4","aR6C5","aR6C6"]];
  let arrIDB = [["bR1C1","bR1C2","bR1C3","bR1C4","bR1C5","bR1C6"],
                ["bR2C1","bR2C2","bR2C3","bR2C4","bR2C5","bR2C6"],
                ["bR3C1","bR3C2","bR3C3","bR3C4","bR3C5","bR3C6"],
                ["bR4C1","bR4C2","bR4C3","bR4C4","bR4C5","bR4C6"],
                ["bR5C1","bR5C2","bR5C3","bR5C4","bR5C5","bR5C6"],
                ["bR6C1","bR6C2","bR6C3","bR6C4","bR6C5","bR6C6"]];
  let arrCellsA = [];
  let arrCellsB = [];
  console.log(arrIDA);
 // createFeild_C();
for (var i = 0; i < row; i++) {
    arrCellsA[i] = [];
    arrCellsB[i] = [];
    for (var j = 0; j < column; j++) {
      arrCellsA[i][j] = document.getElementById(arrIDA[i][j]).value;
      arrCellsB[i][j] = document.getElementById(arrIDB[i][j]).value;
      console.log("arr A: "+arrCellsA[i]);
      console.log("arr B: "+arrCellsB[i]);
    }
  }


      // var A = $M([
      //             [+arrCells[0],+arrCells[1],+arrCells[2]],
      //             [+arrCells[3],+arrCells[4],+arrCells[5]],
      //             [+arrCells[6],+arrCells[7],+arrCells[8]]
      //             ]);
      // var B = $M([
      //             [+arrCells[9],+arrCells[10],+arrCells[11]],
      //             [+arrCells[12],+arrCells[13],+arrCells[14]],
      //             [+arrCells[15],+arrCells[16],+arrCells[17]]
      //             ]);


      var res = [];
      if(document.getElementById('times').checked == true){
          res = multiplyMatrices(arrCellsA,arrCellsB);
      }else if(document.getElementById('plus').checked == true){
        res = addingMatrices(arrCellsA,arrCellsB);
        console.log(res);
      }else if (document.getElementById('minus').checked == true){
        res = subMatrices(arrCellsA,arrCellsB);
      }else{
        console.log("select the given option");
      }
for(i = 1; i < row+1;i++){
  for(j = 1; j < column+1;j++){
        document.getElementById("rR"+i+"C"+j).value = res[i-1][j-1];
  }
}
}

function multiplyMatrices(a, b) {
var result = [];
for (var i = 0; i < a.length; i++) {
  result[i] = [];
  for (var j = 0; j < b[0].length; j++) {
    var sum = 0;
    for (var k = 0; k < a[0].length; k++) {
      sum += a[i][k] * b[k][j];
    }
    result[i][j] = sum;
  }
}
return result;
}

function addingMatrices(a,b){
  var result = [];
  for (var i = 0; i < a.length; i++) {
    result[i] = [];
    for (var j = 0; j < a[0].length; j++) {
      result[i][j] = a[i][j] + b[i][j];
    }
  }

  return result;
}

function subMatrices(a,b){
  var result = [];
  for (var i = 0; i < a.length; i++) {
    result[i] = [];
    for (var j = 0; j < a[0].length; j++) {
      result[i][j] = a[i][j] - b[i][j];
    }
  }

  return result;
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
      matrixC.setAttribute("value", 0);
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
