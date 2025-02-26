<div login-section class="<?php echo $this->subPage === "register" ? "hidden" : ""; ?>">
    <div class="mt-2 text-2xl text-center">Connexion</div>
    <form class="mt-6" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="POST">
        <input type="hidden" name="action" value="login" />
        <?php echo $this->nonce(); ?>
        <label class="block">
            <span>Email</span>
            <input type="email" placeholder="Email" name="email" class="block w-full mt-1 text-gray-600 form-input">
        </label>
        <?php if ($this->subPage !== "register") foreach ($this->getErrors("email") as $error) { ?><div class="form-error"><?php echo esc_html($error); ?></div><?php } ?>
        <label class="block mt-6">
            <span>Mot de passe</span>
            <input type="password" placeholder="********" name="password" class="block w-full mt-1 text-gray-600 form-input">
        </label>
        <div class="flex justify-end mt-6">
            <a href="https://account.ad.ink/auth/password/reset" target="_blank">Mot de passe oublié ?</a>
        </div>
        <button class="w-full px-4 py-2 mt-6 font-bold text-white uppercase transition-all duration-75 bg-green-500 rounded hover:bg-green-600" type="submit">
            Connexion
        </button>
        <div class="mt-3 text-sm text-center">
            Pas encore de compte ?
            <span register-handler class="font-bold cursor-pointer">Créer un compte</span>
        </div>
    </form>
</div>