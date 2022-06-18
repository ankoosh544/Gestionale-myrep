<?php
$csrfToken = $this->request->getAttribute('csrfToken');
?>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1"><strong>Negozio</strong></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"><?= __('Inserisci la tua e-mail e la tua password') ?></p>

      <form action="/users/login" method="POST">
        <input type="hidden" name="_csrfToken" value="<?= $csrfToken ?>" />
        <div class="input-group mb-3">
          <input type="email" id="email" class="form-control" name="email" placeholder="example@domain.ext">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" id="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                <?= __('Ricorda i dati') ?>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?= __('Entra') ?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mb-1">
        <a href="forgot-password.html"><?= __('Clicca qui se ti sei dimenticato la password') ?></a>
      </p>
      <p class="mb-0">
        <a href="/registrations/register" class="text-center"><?= __('Clicca qui se non sei registrato') ?></a>
      </p>
        
       <p><a href="/registrations/verifymail"> <?= __("Registrata, Non hai ricevuto l'email di verifica ? Clicca qui ") ?> </a>.</p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
