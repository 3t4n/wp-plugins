<div register-section class="<?php echo $this->subPage !== "register" ? "hidden" : ""; ?>">
    <div class="mt-2 text-2xl text-center">Créer un compte</div>
    <form class="mt-6" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="POST">
        <input type="hidden" name="action" value="register" />
        <?php echo $this->nonce(); ?>
        <label class="block mt-6">
            <span>Catégorie de <?php echo esc_html($this->getSiteUrl()); ?></span>
            <select class="block w-full mt-1 form-select" name="category">
                <option value="1">Sport</option>
                <option value="2">Divertissement</option>
                <option value="3">Lifestyle</option>
                <option value="4">Nature</option>
                <option value="5">High Tech</option>
                <option value="6">Voyage</option>
                <option value="7">Science</option>
            </select>
        </label>
        <?php if ($this->subPage === "register") foreach ($this->getErrors("category") as $error) { ?><div class="form-error"><?php echo esc_html($error); ?></div><?php } ?>
        <label class="block mt-6">
            <span>Email</span>
            <input type="email" placeholder="Email" name="email" class="block w-full mt-1 text-gray-600 form-input">
        </label>
        <?php if ($this->subPage === "register") foreach ($this->getErrors("email") as $error) { ?><div class="form-error"><?php echo esc_html($error); ?></div><?php } ?>
        <label class="block mt-6">
            <span>Mot de passe</span>
            <input type="password" placeholder="********" name="password" class="block w-full mt-1 text-gray-600 form-input">
        </label>
        <?php if ($this->subPage === "register") foreach ($this->getErrors("password") as $error) { ?><div class="form-error"><?php echo esc_html($error); ?></div><?php } ?>
        <label class="block mt-6">
            <span>Confirmation</span>
            <input type="password" placeholder="********" name="password_confirmation" class="block w-full mt-1 text-gray-600 form-input">
        </label>
        <label class="flex items-center mt-6">
            <input type="checkbox" name="eula" class="text-green-500 form-checkbox">
            <span class="ml-2">J'accepte les <a href="https://ad.ink/conditions.html" target="_blank" class="font-bold text-green-500">conditions générales de ad.ink</a></span>
        </label>
        <?php if ($this->subPage === "register") foreach ($this->getErrors("eula") as $error) { ?><div class="form-error"><?php echo esc_html($error); ?></div><?php } ?>
        <button class="w-full px-4 py-2 mt-6 font-bold text-white uppercase transition-all duration-75 bg-green-500 rounded hover:bg-green-600" type="submit">
            C'est parti
        </button>
        <div class="mt-3 text-sm text-center">
            Vous avez déjà un compte ?
            <span class="font-bold cursor-pointer" login-handler>Connectez-vous</span>
        </div>
    </form>
</div>