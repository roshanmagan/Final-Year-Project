const canvas = document.getElementById('canvas');
const ctx = canvas.getContext('2d');
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
    this.nodeRadius = 25; // radius of the circle to represent each node
    this.verticalSpacing = 30; // vertical distance between two levels of nodes
    this.horizontalSpacing = 200; // horizontal distance between two nodes
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

  // Helper function to get the height of the tree
  getHeight(node) {
    if (!node) {
      return 0;
    }
    const leftHeight = this.getHeight(node.left);
    console.log("leftheight: "+ leftHeight);
    const rightHeight = this.getHeight(node.right);
    console.log("height: "+ (1 + Math.max(leftHeight, rightHeight)));
    return 1+ Math.max(leftHeight, rightHeight);
  }

  // Helper function to get the x-coordinate of the center of the canvas
  getCenterX() {
    return canvas.width / 2;
  }

  // Helper function to draw a circle representing a node
  drawCircle(x, y, radius, color) {
    ctx.beginPath();
    ctx.arc(x, y, radius, 0, 2 * Math.PI);
    ctx.fillStyle = color;
    ctx.fill();
    ctx.stroke();
  }

  // Helper function to draw text inside a circle
  drawText(x, y, text, color) {
    ctx.fillStyle = color;
    ctx.fillText(text, x, y);
  }

  // Recursive function to draw the binary tree
  drawNode(node, level, x, y) {
    if (!node) {
      return;
    }

    // Calculate the y-coordinate of the node based on its level and the vertical spacing
    const nodeY = y + level * this.verticalSpacing;

    // Draw the left child recursively
    if (node.left) {
      const leftX = x - this.horizontalSpacing / Math.pow(2, level);
      const leftY = nodeY + this.verticalSpacing;
      // ctx.beginPath();
      // ctx.moveTo(x, nodeY + this.nodeRadius);
      // ctx.lineTo(leftX + this.nodeRadius * 2, leftY);
      // ctx.stroke();
      this.drawNode(node.left, level + 1, leftX, leftY);
      console.log("level"+level)
    }

    // Draw the right child recursively
    if (node.right) {
      const rightX = x + this.horizontalSpacing / Math.pow(2, level);
      const rightY = nodeY + this.verticalSpacing;
      // ctx.beginPath();
      // ctx.moveTo(x, nodeY + this.nodeRadius);
      // ctx.lineTo(rightX - this.nodeRadius * 2, rightY);
      // ctx.stroke();
      this.drawNode(node.right, level + 1, rightX, rightY);
    }

    // Draw the current node
    const color = 'white';
    this.drawCircle(x, nodeY, this.nodeRadius, color);
    this.drawText(x, nodeY, node.value.toString(), 'black');
  }

  // Public function to draw the binary tree onto a canvas element

 draw(canvas) {
    ctx.font = '20px Arial';
    ctx.textAlign = 'center';
    const height = this.getHeight(this.root);
    const width = Math.pow(1.5, height - 2) * this.horizontalSpacing + this.nodeRadius * 8;
    canvas.width = width;
    canvas.height = height * this.verticalSpacing + this.nodeRadius * 20;
    const centerX = this.getCenterX();
    this.drawNode(this.root, 1, centerX, this.nodeRadius);
  }
}
// Usage example:
const tree = new BinaryTree();
for (let i = 0; i< 7;i++){
  let rand = Math.floor(Math.random() * 100); 
  tree.add(rand+i);
  console.log(rand+i);
}
// tree.add(50);
// tree.add(30);
// tree.add(70);
// tree.add(20);
// tree.add(40);
// tree.add(60);
// tree.add(80);

tree.draw(canvas);
