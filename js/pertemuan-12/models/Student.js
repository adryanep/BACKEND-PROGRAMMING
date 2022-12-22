// import database
const db = require("../config/database");

// membuat class Model Student
class Student {
  /**
   * Membuat method static all.
   */
  static all() {
    // return Promise sebagai solusi Asynchronous
    return new Promise((resolve, reject) => {
      const sql = "SELECT * from students";
      /**
       * Melakukan query menggunakan method query.
       * Menerima 2 params: query dan callback
       */
      db.query(sql, (err, results) => {
        resolve(results);
      });
    });
  }

  /**
   * TODO 1: Buat fungsi untuk insert data.
   * Method menerima parameter data yang akan diinsert.
   * Method mengembalikan data student yang baru diinsert.
   */
  static create() {
      const db = require("./config/database");
      const sql = `INSERT INTO student (name, nim, email, jurusan)
      VALUES ('adryan eka pramudita', '0110221012', 'adryan@gmail.com', 'tekink informatika')`;

      db.query(sql, function (err, results) {
        if (err) throw err;
        console.log("Menambahkan data student");
      });
  }
}

// export class Student
module.exports = Student;
