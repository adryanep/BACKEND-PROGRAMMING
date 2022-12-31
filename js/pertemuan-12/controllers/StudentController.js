// import Model Student
const Student = require("../models/Student");

class StudentController {
  // menambahkan keyword async
  async index(req, res) {
    // memanggil method static all dengan async await.
    const students = await Student.all();

    const data = {
      message: "Menampilkkan semua students",
      data: students,
    };

    res.json(data);
  }

  async store(req, res) {
    /**
     * TODO 2: memanggil method create.
     * Method create mengembalikan data yang baru diinsert.
     * Mengembalikan response dalam bentuk json.
     */
    await Student.create(req.body, (student) => {
      const data = {
        message: "Menambahkan data student",
        data: student,
      };

      res.json(data);
    });
  }

  async update(req, res) {
    const { id } = req.params;
    // cari id student yang ingin di update
    const student = await Student.find(id);

    if (student) {
      //melakukan update data
      const student = await Student.update(id, req.body);
      const data = {
        message: `mengedit data students`,
        data: student,
      };
      res.status(200).json(data);
    }
    else {
      const data = {
        message: `student not found`,
      };

      res.status(404).json(data);
    }
  }

  async destroy(req, res) {
    const { id } = req.params;
    const student = await Student.find(id);

    if (student) {
      await Student.delete(id);
      const data = {
        message: `Menghapus data students`,
      };

      res.status(200).json(data);
    } else {
      const data = {
        message: `Student Not Found`,
      };

      res.status(404).json(data);
    }
  }

  async show(req, res) {
    const { id } = req.params;
    // cari student berdasarkan id
    const student = await Student.find(id);

    if (student) {
      const data = {
        message: `Menampilkan detail students`,
        data:student,
      };

      res.status(200).json(data);
    }
    else {
      const data = {
        message: `Student Not Found`,
      };

      res.status(404).json(data);
    }
  }
}

// Membuat object StudentController
const object = new StudentController();

// Export object StudentController
module.exports = object;
