
export function matrice_transpose(matrice) {
    // Get the number of rows and columns in the matrix
    const rows = matrice.length;
    const cols = matrice[0].length;
  
    // Create a new matrix to hold the transpose
    const transpose = new Array(cols);
    for (let i = 0; i < cols; i++) {
      transpose[i] = new Array(rows);
    }
  
    // Compute the transpose of the matrix
    for (let i = 0; i < rows; i++) {
      for (let j = 0; j < cols; j++) {
        transpose[j][i] = matrice[i][j];
      }
    }
  
    return transpose;
  }
  
