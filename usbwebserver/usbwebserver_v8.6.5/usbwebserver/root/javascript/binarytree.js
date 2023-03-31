// let numbers = [10, 5, 15, 2, 7, 12, 18];
// let nodes = [];

// // Create HTML nodes for each number in the list
// for (let i = 0; i < numbers.length; i++) {
//   nodes.push(`<div class="node level-${Math.floor(Math.log2(i + 1))}">${numbers[i]}</div>`);

//   // Add arrows between nodes (except for the root node)
//   if (i > 0) {
//     let arrowIndex = Math.floor((i - 1) / 2) * 2;
//     let arrowDirection = i % 2 == 0 ? 'right' : 'left';
//     nodes.splice(arrowIndex, 0, `<div class="arrow ${arrowDirection}"></div>`);
//   }
// }

// // Add the HTML nodes to the DOM
// let tree = document.createElement('div');
// tree.classList.add('tree');
// tree.innerHTML = nodes.join('');
// document.body.appendChild(tree);

class Node {
  constructor(value) {
    this.value = value;
    this.left = null;
    this.right = null;
  }
}

class BinaryTree {
  constructor() {
    this.root = null;
  }

  add(value) {
    const node = new Node(value);

    if (!this.root) {
      this.root = node;
    } else {
      this.insertNode(this.root, node);
    }
  }

  insertNode(node, newNode) {
    if (newNode.value < node.value) {
      if (!node.left) {
        node.left = newNode;
      } else {
        this.insertNode(node.left, newNode);
      }
    } else {
      if (!node.right) {
        node.right = newNode;
      } else {
        this.insertNode(node.right, newNode);
      }
    }
  }
}

const binaryTree = new BinaryTree();

binaryTree.add(10);
binaryTree.add(5);
binaryTree.add(20);
binaryTree.add(8);
binaryTree.add(3);

function createTreeHTML(node) {
  if (!node) {
    return '';
  }

  const leftHTML = createTreeHTML(node.left);
  const rightHTML = createTreeHTML(node.right);

  return `
    <div class="node">
      <div class="value">${node.value}</div>
      <div class="left">${leftHTML}</div>
      <div class="right">${rightHTML}</div>
    </div>
  `;
}

const treeDiv = document.querySelector('.tree');
treeDiv.innerHTML = createTreeHTML(binaryTree.root);
