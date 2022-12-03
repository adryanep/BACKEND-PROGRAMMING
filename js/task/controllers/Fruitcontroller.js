// import data fruits dari data/fruits.js
//  refactor variable ke ES6 variable
const fruits = require("../data/fruits.js");

// membuat fungsi index
function index() {
    for (const fruit of fruits) {
        console.log(fruit);
    }
};

// membuat fungsi store(tambah)
function store(name) {
    fruits.push(name);
    index();
};

// membuat fungsi update(mengubah)
 function update(position, name) {
    fruits[position] = name;
    index();
 }

// membuat fungsi delete(hapus)
function destroy (position) {
    fruits.splice(position, 1);
    index();
};

// eksport function index,store
module.exports = { index, store, update, destroy};
