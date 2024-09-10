//Sidebar
const menuItems = document.querySelectorAll('.menu-item');
//Messages
const messagesNotification = document.querySelector('#messages-notifications');
const messages = document.querySelector('.messages');
const message = messages.querySelectorAll('.message');
const messageSearch = document.querySelector('#message-search');
//Theme
const theme = document.querySelector('#theme');
const themeModal = document.querySelector('.customize-theme');
const fontSizes = document.querySelectorAll('.choose-size span');
const root = document.querySelector(':root');
const colorPalette = document.querySelectorAll('.choose-color span');

const Bg1 = document.querySelector('.bg-1');
const Bg2 = document.querySelector('.bg-2');
const Bg3 = document.querySelector('.bg-3');

//  ----- Messages -----
const searchMessage = ()=>{
    const value = messageSearch.value.toLowerCase();
    console.log(value)
    message.forEach(chat => {
        let name = chat.querySelector('h5').textContent.toLowerCase();
        if(name.indexOf(value) != -1){
            chat.style.display = 'flex';
        }else{
            chat.style.display = 'none';
        }
    })
}

messageSearch.addEventListener('keyup', searchMessage);

messagesNotification.addEventListener('click',()=> {
    messages.style.boxShadow = '0 0 1rem var(--color-primary)';
    messagesNotification.querySelector('.notification-count').style.display = 'none';
    setTimeout(()=>{
        messages.style.boxShadow = 'none';
    }, 2000);
})

//  ----- ThemeModel -----
const openThemeModel = ()=>{
    themeModal.style.display = 'grid';
}

const closeThemeModal = (e)=>{
    if(e.target.classList.contains('customize-theme')){
        themeModal.style.display = 'none';
    }
}

themeModal.addEventListener('click', closeThemeModal);
theme.addEventListener('click', openThemeModel);


//change the primary color
const changeActive = () =>{
    colorPalette.forEach(colorPicker => {
        colorPicker.classList.remove('active');
    })
}

colorPalette.forEach(color => {
    color.addEventListener('click', () => {
        let primaryHue;
        changeActive();
        
        if(color.classList.contains('color-1')){
            primaryHue = 252;
        }else if(color.classList.contains('color-2')){
            primaryHue = 52;
        }else if(color.classList.contains('color-3')){
            primaryHue = 352;
        }else if(color.classList.contains('color-4')){
            primaryHue = 152;
        }else if(color.classList.contains('color-5')){
            primaryHue = 202;
        }
        color.classList.add('active');

        root.style.setProperty('--color-primary-hue', primaryHue);
    })
})

// ---- Theme background -----
let lightColorLightness;
let whiteColorLightness;
let darkColorLightness;

const changeBG = () =>{
    root.style.setProperty('--light-color-lightness', lightColorLightness);
    root.style.setProperty('--white-color-lightness', whiteColorLightness);
    root.style.setProperty('--dark-color-lightness', darkColorLightness);
} 

Bg1.addEventListener('click', ()=> {
    Bg1.classList.add('active');
    Bg2.classList.remove('active');
    Bg3.classList.remove('active');

    window.location.reload();
})

Bg2.addEventListener('click', ()=> {
    darkColorLightness = '95%';
    whiteColorLightness = '20%';
    lightColorLightness = '15%';

    Bg2.classList.add('active');
    Bg1.classList.remove('active');
    Bg3.classList.remove('active');

    changeBG();
})

Bg3.addEventListener('click', ()=> {
    darkColorLightness = '95%';
    whiteColorLightness = '10%';
    lightColorLightness = '0%';

    Bg3.classList.add('active');
    Bg1.classList.remove('active');
    Bg2.classList.remove('active');

    changeBG();
})

let btn1 = document.getElementById("heart1");

function toggle1(){
    if(btn1.style.color == "red"){
        btn1.style.color = "black";
    }
    else{
        btn1.style.color = "red";
    }
}
let btn2 = document.getElementById("heart2");

function toggle2(){
    if(btn2.style.color == "red"){
        btn2.style.color = "black";
    }
    else{
        btn2.style.color = "red";
    }
}
let btn3 = document.getElementById("heart3");

function toggle3(){
    if(btn3.style.color == "red"){
        btn3.style.color = "black";
    }
    else{
        btn3.style.color = "red";
    }
}
let btn4 = document.getElementById("heart4");

function toggle4(){
    if(btn4.style.color == "red"){
        btn4.style.color = "black";
    }
    else{
        btn4.style.color = "red";
    }
}
let btn5 = document.getElementById("heart5");

function toggle5(){
    if(btn5.style.color == "red"){
        btn5.style.color = "black";
    }
    else{
        btn5.style.color = "red";
    }
}
let btn6 = document.getElementById("heart6");

function toggle6(){
    if(btn6.style.color == "red"){
        btn6.style.color = "black";
    }
    else{
        btn6.style.color = "red";
    }
}
let btn7 = document.getElementById("heart7");

function toggle7(){
    if(btn7.style.color == "red"){
        btn7.style.color = "black";
    }
    else{
        btn7.style.color = "red";
    }
}