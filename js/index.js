console.log('This is index.js for sidebar')
let btn = document.getElementById('btn')
let sidebar = document.querySelector('.sidebar')
let searchBtn = document.querySelector('.bx-search')
let homeContent = document.querySelector('.home_content')

btn.onclick = function() {
    sidebar.classList.toggle("active")
    homeContent.classList.toggle("home")
}

searchBtn.onclick = function() {
    sidebar.classList.toggle("active")
    homeContent.classList.toggle("home")
}

let sortOpt = document.querySelector('.sort')

sortOpt.onclick = function(){
   let opt = document.querySelector('.options')
   opt.classList.toggle("activeOpt")
}


