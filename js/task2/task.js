/**
 * Fungsi untuk menampilkan hasil download
 * @param {string} result - Nama file yang didownload
 */
/**function showDownload(result) {
  console.log("Download selesai");
  console.log("Hasil Download: " + result);
}

/**
 * Fungsi untuk download file
 * @param {function} callback - Function callback show
 */
/**function download(callShowDownload) {
  setTimeout(function () {
    const result = "windows-10.exe";
    callShowDownload(result);
  }, 3000);
}

download(showDownload);

/**
 * TODO:
 * - Refactor callback ke Promise atau Async Await
 * - Refactor function ke ES6 Arrow Function
 * - Refactor string ke ES6 Template Literals
 */

const download = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("Mendownload File...");
    }, 3000);
  });
};

const selesai = () => {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve("Download Selesai...");
    }, 3000);
  });
};

const main = async () => {
  console.log(await download());
  console.log(await selesai());
};

//const name = "Windows-10.exe"
// console.log(`${name} BERHASIL DI DOWNLOAD`)
