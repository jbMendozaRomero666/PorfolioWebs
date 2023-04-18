song();

function song() {

  window.addEventListener('keydown', function (e) {
    audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
    // console.log(e.keyCode);
    const key = document.querySelector(`.key[data-key="${e.keyCode}"]`);
    // console.log(audio);
    // console.log(key);
    if (!audio) return;
    audio.currentTime = 0;
    audio.play();
    key.classList.add('playing');
  });



  function removeTransition(e) {

    if (e.propertyName !== 'transform') return;

    this.classList.remove('playing');
  }

  const keys = document.querySelectorAll('.key');

  keys.forEach(key => key.addEventListener('transitionend', removeTransition));
  // window.addEventListener('keydown',playSound);

}
// song();
// function song(){

//   // const audio = document.querySelector(`[data-key=""]`)
//   window.addEventListener('keydown',function(e){
//     // console.log(e.keyCode);
//     const audio = document.querySelector(`[data-key="${e.keyCode}"]`);
//     console.log(audio);
//   })
   
  
// }