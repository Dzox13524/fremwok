let calender = function () {
  const date = new Date();
  return date;
};

document.addEventListener("DOMContentLoaded", () => {
  let nomorBarSaatIni = 1;
  function jalankanSatuAnimasi(ProgresBarId, barId, idImg) {
    const progressBarFill = document.getElementById(ProgresBarId);
    const bar = document.getElementById(barId);
    const img = document.getElementById(idImg);

    const targetProgress = 100;
    let progressSekarang = 0;
    progressBarFill.style.width = "0%";
    bar.style.opacity = "100%";
    bar.style.backgroundColor = "#0e0e13";
    img.style.display = "inline";

    const interval = setInterval(() => {
      if (progressSekarang >= targetProgress) {
        progressBarFill.style.width = "0%";
        bar.style.opacity = "60%";
        bar.style.backgroundColor = "#20202eb1";
        img.style.display = "none";

        clearInterval(interval);

        mulaiAnimasiBerikutnya();
      } else {
        progressSekarang++;
        progressBarFill.style.width = progressSekarang + "%";
      }
    }, 50);
  }

  function mulaiAnimasiBerikutnya() {
    nomorBarSaatIni++;

    if (nomorBarSaatIni > 4) {
      nomorBarSaatIni = 1;
    }

    const idBerikutnya = "progres" + nomorBarSaatIni;
    const barBerikutnya = "card" + nomorBarSaatIni;
    const imgBerikutnya = "project" + nomorBarSaatIni;

    jalankanSatuAnimasi(idBerikutnya, barBerikutnya, imgBerikutnya);
  }

  jalankanSatuAnimasi(
    "progres" + nomorBarSaatIni,
    "card" + nomorBarSaatIni,
    "project" + nomorBarSaatIni
  );

});
