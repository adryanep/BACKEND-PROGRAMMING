const showDownload = (resolve) => {
    console.log(`Download selesai`);
    console.log(`Hasil Download: ` + resolve);
    }
    
    const download = () => {
      return new Promise((resolve) => {
          setTimeout(function () {
             // const result = `windows-10.exe`;
              resolve(`windows-10.exe`);
              // callShowDownload(result);
          }, 3000);
      });
    }
    
  download().then(showDownload);
  download().then((res)=>{console.log(res)});

  const main = async () => {
    console.log(await download());
  }