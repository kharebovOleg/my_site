function myJSFunction() {
    console.log("Function is working");
}

document.getElementsByName("register").forEach(el => {
    el.style.backgroundColor = "red";
});

const elem = document.createElement('p');
elem.textContent = "Пользователь с такой почтой уже существует";
elem.style.color = 'red';
const parent = document.getElementsByTagName('form');
for(let i = 0; i < parent.length; i++) {
    console.log(parent[i]);
}