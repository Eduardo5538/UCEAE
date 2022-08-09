document.addEventListener('DOMContentLoaded', function(){
  let requiredInput = document.querySelectorAll('input[required]');
  let signUpButton = document.querySelector('#sign-up-button');
  var checkValidForm = () => {
    if (
      _.every(requiredInput, (input) => {
        return !_.isEmpty(input.value)
      })
    ){
      if (signUpButton.hasAttribute('disabled')) return
      signUpButton.removeAttribute('disabled')
    } else {
      if (!signUpButton.hasAttribute('disabled')) return
      signUpButton.addAttribute('disabled')
    }
  }
  _.forEach(requiredInput, (input) => {
    input.addEventListener('change', function(e){
      console.log(e.target.value)
      checkValidForm()
    })
  })
});
