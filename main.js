
  
  // var heart = document.getElementById('heart');
  // heart.addEventListener('click', function() {
  //   this.classList.toggle('red');
  // });



   /////////////ЛАЙКИ ТРЕКОВ/////////////////
   var hearts = document.querySelectorAll('#heart');
   hearts.forEach((heart)=>{
     heart.addEventListener('click', function() {
       this.classList.toggle('red');
     });
   })
 /////////////////////////////////


 
   // function togglePlayStop(trackElement) {
   //   var music = trackElement.querySelector('audio');
   //   var playIcon = trackElement.querySelector('.play-icon');
   //   var stopIcon = trackElement.querySelector('.stop-icon');
   
   //   if (music.paused) {
   //     music.play();
   //     playIcon.style.display = 'none';
   //     stopIcon.style.display = 'block';
   //   } else {
   //     music.pause();
   //     playIcon.style.display = 'block';
   //     stopIcon.style.display = 'none';
   //   }
   // }
 
   /////////////Включание и выключание трека и смена иконки/////////////////
 var currentPlaying = null;
 
 function togglePlayStop(trackElement) {
   var music = trackElement.querySelector('audio');
   var playIcon = trackElement.querySelector('.play-icon');
   var stopIcon = trackElement.querySelector('.stop-icon');
 
   if (currentPlaying && currentPlaying !== music) {
     currentPlaying.pause();
     currentPlaying.currentTime = 0;
     currentPlaying.parentNode.querySelector('.play-icon').style.display = 'block';
     currentPlaying.parentNode.querySelector('.stop-icon').style.display = 'none';
   }
 
   if (music.paused) {
     music.play();
     playIcon.style.display = 'none';
     stopIcon.style.display = 'block';
     currentPlaying = music; 
   } else {
     music.pause();
     playIcon.style.display = 'block';
     stopIcon.style.display = 'none';
     currentPlaying = null; 
   }
 }
 /////////////ПОП АП РЕГИСТРАИЦИИИ/////////////////
 const registrationPopup = document.getElementById('registrationPopup');
 const loginPopup = document.getElementById('loginPopup');
 const closeRegistrationPopup = document.getElementById('closeRegistrationPopup');
 const closeLoginPopup = document.getElementById('closeLoginPopup');
 const showPassword = document.getElementById('showPassword');
 const showConfirmPassword = document.getElementById('showConfirmPassword');
 const passwordInput = document.getElementById('password');
 const confirmPasswordInput = document.getElementById('confirm-password');
 const switchToLogin = document.getElementById('switchToLogin');
 const switchToRegistration = document.getElementById('switchToRegistration');
 
 document.getElementById('openRegistrationPopup').addEventListener('click', () => {
  registrationPopup.style.display = 'block';
});

 
 function openPopup(popup) {
   popup.style.display = 'block';
 }
 

 function closePopup(popup) {
   popup.style.display = 'none';
 }
 

 switchToLogin.addEventListener('click', () => {
   closePopup(registrationPopup);
   openPopup(loginPopup);
 });
 
 switchToRegistration.addEventListener('click', () => {
   closePopup(loginPopup);
   openPopup(registrationPopup);
 });
 

 closeRegistrationPopup.addEventListener('click', () => {
   closePopup(registrationPopup);
 });
 
 closeLoginPopup.addEventListener('click', () => {
   closePopup(loginPopup);
 });
 

 showPassword.addEventListener('click', () => {
   if (passwordInput.type === 'password') {
     passwordInput.type = 'text';
     showPassword.classList.remove('fa-eye');
     showPassword.classList.add('fa-eye-slash');
   } else {
     passwordInput.type = 'password';
     showPassword.classList.remove('fa-eye-slash');
     showPassword.classList.add('fa-eye');
   }
 });




  


    /////////////БУРГЕЕЕР////////////////
const burgerMenu = document.getElementById('burgerMenu');
const mobileNav = document.getElementById('mobileNav');

burgerMenu.addEventListener('click', () => {
  burgerMenu.classList.toggle('active');
  mobileNav.classList.toggle('active');
});


/////////////////////////ЛАЙКИИИИИИИ////////////////////////////////////







///////////////ПОПАП ОШИБКИ ИЛИ УСПЕХА РЕГА И АВТОРИЗ/////////////////////
