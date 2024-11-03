const btn = document.querySelector('#swithc_btn');
const root = document.querySelector(":root");

const themes = {
    default: {
        "--bg-color": "white",
        "--text-color": "black",
        "--btn-color": "black"
    },
    dark: {
        "--bg-color": "rgb(66,66,66)",
        "--text-color": "white",
        "--btn-color": "white"     
    }
}

if(!localStorage.getItem("isDarkTheme")) {
    localStorage.setItem("isDarkTheme", false);
}

let isDarkTheme = JSON.parse(localStorage.getItem("isDarkTheme"));
changeTheme(isDarkTheme);

btn.addEventListener("click", btnSwitch);

function btnSwitch(e) {
    e.preventDefault();
    isDarkTheme = !isDarkTheme;
    localStorage.setItem("isDarkTheme", isDarkTheme);
    changeTheme(isDarkTheme);
}

function changeTheme(isDarkTheme) {
    const theme = isDarkTheme ? "dark" : "default";
    Object.entries(themes[theme]).forEach(([key, value]) => {
        root.style.setProperty(key, value);
    })
    
}