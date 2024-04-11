searchForm=document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
}


// loginformForm=document.querySelector('.search-form');
// document.querySelector('#close-login-btn').onclick = () =>{
//     loginform.classList.remove('active');
// }
document.getElementById('#close-login-btn').addEventListener('click', function() {
    // Navigate back to the main page (replace 'main_page.html' with your main page URL)
    window.location.href = 'index.php';
});


window.onscroll = () =>{

     searchForm.classList.remove('active');
if(window.scrollY>80){
        document.querySelector('.header .header-2').classList.add('active');
        
    }
    else{
        document.querySelector('.header .header-2').classList.remove('active');
    }
}

window.onload = () =>{
     
if(window.scrollY>80){
        document.querySelector('.header .header-2').classList.add('active');
        
    }
    else{
        document.querySelector('.header .header-2').classList.remove('active');
    }
}
 //////////////////////////////////////////////////
//login 



