$(function() {
  // 権限作成バリデーション
  $('#role_submit').click(function() {
    $(this).attr('disabled', 'disabled');
    $('#role #name_err').remove();
    var error = false;
    var name = $('#role input[name="name"]').val();
    if (name.length == 0) {
      $('#role input[name="name"]').parent().after('<p id="name_err" class="alert alert-danger">権限名は入力必須です。</p>');
      error = true;
    }
    if (error == false) {
      $('#role_form').submit();
    }
    $(this).removeAttr('disabled');
  });
  // 権限のダイアログを閉じたときの処理
  $('#role').on('hidden.bs.modal', function () {
	  $('#role #name_err').remove();
  });
});