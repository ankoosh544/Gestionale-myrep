<?php
$csrfToken = $this->request->getAttribute('csrfToken');
?>
<style type="text/css">
    .verify_email{
        width: 25%;
    }
    .verify-card{
        width: 100%;
    }
</style>

<div class="verify_email" style="margin-top: 10%;">
     <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><strong>Negozio</strong></a>
        </div>
        
        <div class="card-body verify-card">
            <!-- Account Form -->
            <form action="/registrations/validate-email-link">
                <div class="form-group">
                    <label><?= __('E-mail') ?> <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="email" placeholder="Email" required>
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-primary account-btn" type="submit"><?= __('Send') ?></button>
        
                </div>
                <div class="account-footer">
                    <p>Already have an account? <a href="/users/login">Login</a></p>
                </div>
            </form>
            <!-- /Account Form -->
        </div>
    </div>
</div>
