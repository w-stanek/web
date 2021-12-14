$(document).ready(function () {

  $('.form-control').focus(function () {
    $('#emailSendResult').html('')
    $(this).attr('placeholder', '')
  })

  $('#contactForm').on('submit', function (event) {

    if (validation()) {

      $('#emailSendResult').html('Odesílám')
      $('#send').attr('disabled', true)
      request = $.ajax({
        url: 'mailForm.php',
        type: 'post',
        data: $('#contactForm').serialize(),
        success: function (result) {
          $('#emailSendResult').html(result)
          $('#send').attr('disabled', false)
          $('#contactForm')['0'].reset()
        },
        fail: function () {
          $('#emailSendResult').html('Chyba při zpracování, zkus to znovu')
          $('#send').attr('disabled', false)
        },
      })
    }
    event.preventDefault();
  })

  function validation() {
    let validate = true
    let validMail = false

    let subject = $('#subject')
    if (subject.val() == '') {
      subject.val('')
      subject.attr('placeholder', 'Vyplň předmět')
      validate = false
    }

    let mail = $('#mail')
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (mail.val().match(regexEmail)) {
      validMail = true
    }

    if (!validMail) {
      mail.val('')
      mail.attr('placeholder', 'Zadej email')
      validate = false
    }
    let text = $('#contactTextarea')
    if (text.val() == '') {
      text.val('')
      text.attr('placeholder', 'Napiš něco :)')
      validate = false
    }
    return validate
  }
})