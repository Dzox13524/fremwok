$(document).ready(function () {
        const dataKota = {
          "Jawa Timur": ["Surabaya", "Malang", "Jember"],
          "Jawa Tengah": ["Semarang", "Solo", "Magelang"],
        };
        $("#provinsi").on("change", function () {
          const provinsiTerpilih = $(this).val();
          const comboKota = $("#kota");
          comboKota.empty();
          if (provinsiTerpilih) {
            comboKota.prop("disabled", false);
            comboKota.append('<option value="">-- Pilih Kota --</option>');
            dataKota[provinsiTerpilih].forEach(function (kota) {
              comboKota.append(`<option value="${kota}">${kota}</option>`);
            });
          } else {
            comboKota.prop("disabled", true);
            comboKota.append("<option>-- Pilih provinsi dulu --</option>");
          }
        });

        const canvas = document.getElementById("myCanvas");
        const ctx = canvas.getContext("2d");
        const clearButton = document.getElementById("clearCanvas");
        let isDrawing = false;
        let lastX = 0;
        let lastY = 0;
        function draw(e) {
          if (!isDrawing) return;
          const rect = canvas.getBoundingClientRect();
          const x = e.offsetX || e.touches[0].clientX - rect.left;
          const y = e.offsetY || e.touches[0].clientY - rect.top;
          ctx.strokeStyle = "#000"; ctx.lineWidth = 2; ctx.lineCap = "round"; ctx.lineJoin = "round";
          ctx.beginPath(); ctx.moveTo(lastX, lastY); ctx.lineTo(x, y); ctx.stroke();
          [lastX, lastY] = [x, y];
        }
        function startDrawing(e) {
          isDrawing = true;
          const rect = canvas.getBoundingClientRect();
          [lastX, lastY] = [ e.offsetX || e.touches[0].clientX - rect.left, e.offsetY || e.touches[0].clientY - rect.top, ];
        }
        canvas.addEventListener("mousedown", startDrawing);
        canvas.addEventListener("mousemove", draw);
        canvas.addEventListener("mouseup", () => (isDrawing = false));
        canvas.addEventListener("mouseleave", () => (isDrawing = false));
        canvas.addEventListener("touchstart", startDrawing);
        canvas.addEventListener("touchmove", draw);
        canvas.addEventListener("touchend", () => (isDrawing = false));
        if (clearButton) {
          clearButton.addEventListener("click", () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
          });
        }

        $("#registrationForm").on("submit", function (e) {
            const isCanvasBlank = !ctx.getImageData(0, 0, canvas.width, canvas.height).data.some(channel => channel !== 0);
            if (isCanvasBlank) {
                alert("Tanda tangan tidak boleh kosong!");
                e.preventDefault();
                return;
            }
            const signatureDataUrl = canvas.toDataURL("image/png");
            $("#signature").val(signatureDataUrl);
        });
      });