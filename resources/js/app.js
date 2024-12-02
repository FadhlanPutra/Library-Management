import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// // Elemen tombol dan ikon
// var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
// var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");
// var themeToggleSystemIcon = document.getElementById("theme-toggle-system-icon");
// var themeToggleDarkMsg = document.getElementById("theme-toogle-dark-msg");
// var themeToggleLightMsg = document.getElementById("theme-toogle-light-msg");
// var themeToggleSystemMsg = document.getElementById("theme-toogle-system-msg");

// // Fungsi untuk menampilkan ikon dan pesan sesuai tema
// function updateThemeIcons(theme) {
//     themeToggleDarkIcon.classList.add("hidden");
//     themeToggleLightIcon.classList.add("hidden");
//     themeToggleSystemIcon.classList.add("hidden");
//     themeToggleDarkMsg.classList.add("hidden");
//     themeToggleLightMsg.classList.add("hidden");
//     themeToggleSystemMsg.classList.add("hidden");

//     if (theme === "dark") {
//         themeToggleDarkIcon.classList.remove("hidden");
//         themeToggleDarkMsg.classList.remove("hidden");
//     } else if (theme === "light") {
//         themeToggleLightIcon.classList.remove("hidden");
//         themeToggleLightMsg.classList.remove("hidden");
//     } else {
//         themeToggleSystemIcon.classList.remove("hidden");
//         themeToggleSystemMsg.classList.remove("hidden");
//     }
// }

// // Inisialisasi tema awal
// var currentTheme =
//     localStorage.getItem("color-theme") ||
//     (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "system");

// if (currentTheme === "dark") {
//     document.documentElement.classList.add("dark");
//     updateThemeIcons("dark");
// } else if (currentTheme === "light") {
//     document.documentElement.classList.remove("dark");
//     updateThemeIcons("light");
// } else {
//     updateThemeIcons("system");
// }

// // Tambahkan event listener ke tombol
// var themeToggleBtn = document.getElementById("theme-toggle");

// themeToggleBtn.addEventListener("click", function () {
//     if (currentTheme === "dark") {
//         currentTheme = "light";
//         document.documentElement.classList.remove("dark");
//     } else if (currentTheme === "light") {
//         currentTheme = "system";
//         if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
//             document.documentElement.classList.add("dark");
//         } else {
//             document.documentElement.classList.remove("dark");
//         }
//     } else {
//         currentTheme = "dark";
//         document.documentElement.classList.add("dark");
//     }

//     localStorage.setItem("color-theme", currentTheme);
//     updateThemeIcons(currentTheme);
// });

// // Perbarui tema berdasarkan perubahan preferensi sistem
// window
//     .matchMedia("(prefers-color-scheme: dark)")
//     .addEventListener("change", function (e) {
//         if (currentTheme === "system") {
//             if (e.matches) {
//                 document.documentElement.classList.add("dark");
//             } else {
//                 document.documentElement.classList.remove("dark");
//             }
//             updateThemeIcons("system");
//         }
//     });



// Elemen select dan body
var themeSelector = document.getElementById("theme-selector");

// Fungsi untuk menerapkan tema berdasarkan pilihan
function applyTheme(theme) {
    if (theme === "dark") {
        document.documentElement.classList.add("dark");
        localStorage.setItem("color-theme", "dark");
    } else if (theme === "light") {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("color-theme", "light");
    } else {
        localStorage.removeItem("color-theme");
        if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
            document.documentElement.classList.add("dark");
        } else {
            document.documentElement.classList.remove("dark");
        }
    }
}

// Inisialisasi tema awal
var currentTheme =
    localStorage.getItem("color-theme") ||
    (window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "system");

themeSelector.value = currentTheme;
applyTheme(currentTheme);

// Event listener untuk perubahan tema
themeSelector.addEventListener("change", function () {
    var selectedTheme = themeSelector.value;
    applyTheme(selectedTheme);
});

// Perbarui tema secara otomatis jika mode sistem berubah
window
    .matchMedia("(prefers-color-scheme: dark)")
    .addEventListener("change", function (e) {
        if (!localStorage.getItem("color-theme")) {
            if (e.matches) {
                document.documentElement.classList.add("dark");
            } else {
                document.documentElement.classList.remove("dark");
            }
        }
    });
