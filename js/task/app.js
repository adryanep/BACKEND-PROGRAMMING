// mengambil semua function Fruitcontroller
// refactor variable ke ES6 variable
// mengguankan destructing object
const { index, store, update, destroy } = require("./controllers/Fruitcontroller.js");

// fungsi main tidak perlu diubah
const main = () => {
  console.log("Method index - Menampilkan Buah");
  index();
  console.log("\nMethod store - Menambahkan buah Pisang");
  store("Pisang");
  console.log("\nMethod update - Update data 0 menjadi Kelapa");
  update(0, "Kelapa");
  console.log("\nMethod destroy - Menghapus data 0");
  destroy(0);
};

main();
