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

  // menambah data student
  static async create(data, callback) {
    //melakukan insert data ke database
      const sql = "INSERT INTO students SET ?";
      db.query(sql, data, (err, results) => {

        // query ke dua: select data berdasarkan id
        const id = results.insertId;
        const sql = "SELECT * FROM students WHERE id = ?";
        db.query(sql, id, (err, results) => {

          //callback ketiga: kirim results
          Callback(results);
        });
      });
  }

  // mengupdate data student
  static async update(id, data) {
    await new Promise((resolve, reject)=> {
      const sql = "UPDATE students SET ?WHERE id = ?";
      db.query(sql, [data, id], (err, results) => {
        resolve(results);
      });
    });
       
    // Mencari data yang baru di update
    const student = await this.find(id);
    return student;
  }

  static find(id) {
    return new Promise((resolve, reject) => {
      const sql = "UPDATE students SET ?WHERE id = ?";
      db.query(sql, id,(err, results) => {
        // destructing array
        const [student] = results;
        resolve(student);
      });
    });
  }

 // menghapus data student 
  static delete(id) {
  return new Promise((resolve, reject)=> {
    const sql = "DELETE FROM students WHERE id = ?";
    db.query(sql, id, (err, results) => {
      resolve(results);
    });
  });
  } 

 //  mencari data berdasarkan id
 static find(id) {
  return new Promise((resolve, reject) => {
    const sql = "SELECT * FROM students WHERE id = ?";
    db.query(sql, id, (err, results) => {
      //descructing array
      const [student] = results;
      resolve(student);
    });
  });
 }
}

// export class Student
module.exports = Student;